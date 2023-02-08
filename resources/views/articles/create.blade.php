@extends('layout.master')
@section('title', 'Create Article')
@section('content')
<div class="col-md-8">
    <h3 class="pb-4 mb-4 fst-italic border-bottom">
        Создание статьи
    </h3>
    @include('layout.errors')
    <form method="POST" action="/">
        @csrf
        <div class="mb-3">
            <label for="inputCode" class="form-label">Символьный статьи</label>
            <input type="text" class="form-control" id="inputCode" placeholder="Введите cимвольный код" name="code" value="{{ old('code') }}">
        </div>
        <div class="mb-3">
            <label for="inputTitle" class="form-label">Название статьи</label>
            <input type="text" class="form-control" id="inputTitle" placeholder="Введите название статьи" name="title" value="{{ old('title') }}">
        </div>
        <div class="mb-3">
            <label for="inputDetail" class="form-label">Краткое описание статьи</label>
            <input type="text" class="form-control" id="inputDetail" placeholder="Введите краткое описание статьи" name="detail" value="{{ old('detail') }}">
        </div>
        <div class="mb-3">
            <label for="inputBody" class="form-label">Текст статьи</label>
            <textarea class="form-control" id="inputBody" name="body">{{ old('body') }}</textarea>
        </div>
        <div class="mb-3">

{{--            <input type="text" class="form-control" id="inputBody" placeholder="Введите описание статьи" name="body">--}}
            <input type="checkbox" id="inputPublished" name="published" value="1">
            <label for="published">Опубликовано</label>
        </div>
        <button type="submit" class="btn btn-primary">Опубликовать статью</button>
    </form>
</div>
@endsection
