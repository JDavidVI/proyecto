<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $user = auth()->user(); // Obtener el usuario autenticado
        $tasks = $user->tasks()->orderBy('due_date', 'asc')->get(); // Obtener tareas ordenadas por fecha de vencimiento
        return view('task/index',compact('tasks'));
    }

    public function store(Request $request)
    {
        $user = auth()->user(); // Obtener el usuario autenticado
        $taskData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
        ]);

        $user->tasks()->create($taskData); // Crear una nueva tarea asociada al usuario
        return redirect()->route('tasks.index')->with('success', 'Tarea creada correctamente.');
    }

    public function update(Task $task)
    {
        // Marcar una tarea como completada
        $task->completed = true;
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Tarea marcada como completada.');
    }
}