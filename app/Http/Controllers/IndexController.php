<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class IndexController extends Controller
{
    public function index()
    {
        $tasks = auth()->user()->tasks()->orderBy('due_date')->get();
        return view('task.index' , compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
        ]);

        auth()->user()->tasks()->create($validatedData);

        return redirect()->route('tasks/index');
    }

    public function update(Task $task)
    {
        $task->update(['completed' => true]);

        return redirect()->back();
    }
}
