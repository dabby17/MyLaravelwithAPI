<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel To-Do List</title>
<link href = " {{ asset ('style.css') }}" rel = "stylesheet">
</head>
<body>
    <h1>To-Do List</h1>
    
    <form action="/tasks" method="POST">
        @csrf
        <input type="text" name="title" required>
        <button type="submit">Add Task</button>
    </form>

    <ul>
        @foreach($tasks as $task)
            <li>
                <form action="/tasks/{{ $task->id }}/toggle" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit">{{ $task->completed ? 'Undo' : 'Complete' }}</button>
                </form>
                <span class="{{ $task->completed ? 'completed' : '' }}">{{ $task->title }}</span>
                <form action="/tasks/{{ $task->id }}" method="POST" style="display: inline;">
                    @csrf @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
