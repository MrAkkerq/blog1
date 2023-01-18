<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список задач</title>
</head>
<body>
    <ul>
        @foreach ($tasks as $task)
            <li>{{$task->body}}</li>
        @endforeach
    </ul>
</body>
</html>
