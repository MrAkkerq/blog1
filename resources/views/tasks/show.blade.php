@extends('layout.master')

@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            {{ $task->title }}
        </h3>

        <p>{{ $task->body }}</p>

        <a href="/tasks" class="btn btn-primary">Вернуться к списку задач</a>
        <a href="/tasks/{{ $task->id }}/edit" class="btn btn-light">Изменить</a>
    </div>
@endsection
