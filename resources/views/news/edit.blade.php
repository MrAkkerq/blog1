@extends('layout.master')
@section('title', 'Edit News')
@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Редактирование Новости
        </h3>
        @include('layout.errors')
        <form method="POST" action="/news/{{ $theNew->id }}">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="inputTitle" class="form-label">Название статьи</label>
                <input type="text" class="form-control" id="inputTitle" placeholder="Введите название статьи" name="title" value="{{ old('title', isset($theNew) ? $theNew->title : '') }}">
            </div>
            <div class="mb-3">
                <label for="inputBody" class="form-label">Текст статьи</label>
                <textarea class="form-control" id="inputBody" name="body">{{ old('body', isset($theNew) ? $theNew->body : '') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="inputTags" class="form-label">Теги</label>
                <input type="text" name="tags" class="form-control" id="inputTags" value="{{ old('tags', isset($theNew) ? $theNew->tags->pluck('name')->implode(',') : '') }}">
            </div>
            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
        <br>
        <form method="POST" action="/news/{{ $theNew->id }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Удалить</button>
        </form>
    </div>
@endsection
