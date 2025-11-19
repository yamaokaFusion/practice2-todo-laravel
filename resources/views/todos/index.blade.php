<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ToDo App</title>
</head>
<body>
    <h1>ToDo List</h1>

    <form action="{{ route('todo.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="新しいToDoを追加">
        <button type="submit">追加</button>
    </form>

    <ul>
        @foreach ($todos as $todo)
            <li>
                <form action="{{ route('todo.update', $todo) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PATCH')
                    <button type="submit">
                        {{ $todo->is_done ? '✔' : '○' }}
                    </button>
                </form>

                {{ $todo->title }}

                <form action="{{ route('todo.destroy', $todo) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">削除</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
