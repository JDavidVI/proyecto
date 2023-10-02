
    <h1>Agregar Nueva Tarea</h1>

    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <label for="title">Título:</label>
        <input type="text" name="title" required>

        <label for="description">Descripción:</label>
        <textarea name="description"></textarea>

        <label for="due_date">Fecha de Vencimiento:</label>
        <input type="date" name="due_date" required>

        <button type="submit">Guardar Tarea</button>
    </form>

