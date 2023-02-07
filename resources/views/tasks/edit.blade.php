@extends('layout.master')

@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Редактирование задачи
        </h3>
        @include('layout.errors')
        <form method="POST" action="/tasks/{{ $task->id }}">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="inputTitle" class="form-label">Название задачи</label>
                <input type="text" class="form-control" id="inputTitle" placeholder="Введите название задачи" name="title"
                       value="{{ old('title', $task->title) }}">
            </div>

            <div class="mb-3">
                <label for="inputBody" class="form-label">Описание задачи</label>
                <textarea name="body" class="form-control" id="inputBody">{{ old('body', $task->body) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="inputTags" class="form-label">Теги</label>
                <input type="text" name="tags" class="form-control" id="inputTags" value="{{ old('tags', $task->tags->pluck('name')->implode(',')) }}">
            </div>

            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
        <br>
        <form method="POST" action="/tasks/{{ $task->id }}">
        @csrf
        @method('DELETE')
            <button type="submit" class="btn btn-danger">Удалить</button>
        </form>

    </div>
@endsection
