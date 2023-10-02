@section('content')
<div class="container">
    <h1>Tareas Pendientes</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <ul>
        @foreach($tasks as $task)
            <li>
                {{ $task->title }} - Fecha de Vencimiento: {{ $task->due_date}}
                @if(!$task->completed)
                    <form method="POST" action="{{ route('tasks.update', $task->id) }}" style="display:inline">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success btn-sm">Marcar como Completada</button>
                    </form>
                @endif
            </li>
        @endforeach
    </ul>

    <h2>Agregar Nueva Tarea</h2>
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="due_date">Fecha de Vencimiento</label>
            <input type="date" name="due_date" id="due_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Agregar Tarea</button>
    </form>
</div>
@endsection
