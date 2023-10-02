<li>
    {{ $task->title }}
    @if ($task->completed)
        (Completada)
    @else
        <form method="POST" action="{{ route('tasks.update', $task) }}">
            @csrf
            @method('PUT')
            <button type="submit">Marcar como Completada</button>
        </form>
    @endif
</li>