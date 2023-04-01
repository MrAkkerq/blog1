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

                {{--            <input type="text" class="form-control" id="inputBody" placeholder="Введите описание статьи" name="body">--}}
                <input type="checkbox" id="inputPublished" name="published" value="1" {{ old('published', isset($theNew) ? $theNew->hidden : '') ? 'checked' : '' }}>
                <label for="published">Скрыто</label>
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
