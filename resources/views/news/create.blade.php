@extends('layout.master')
@section('title', 'Break News')
@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Break News!
        </h3>
        @include('layout.errors')
        <form method="POST" action="/news">
            @csrf
            <div class="mb-3">
                <label for="inputTitle" class="form-label">Новость</label>
                <input type="text" class="form-control" id="inputTitle" placeholder="Введите название статьи" name="title" value="{{ old('theNew', isset($theNew) ? $theNew->title : '') }}">
            </div>
            <div class="mb-3">
                <label for="inputBody" class="form-label">Текст новости</label>
                <textarea class="form-control" id="inputBody" name="body">{{ old('body', isset($theNew) ? $theNew->body : '') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="inputTags" class="form-label">Теги</label>
                <input type="text" name="tags" class="form-control" id="inputTags" value="{{ old('tags', isset($theNew) ? $theNew->tags->pluck('name')->implode(',') : '') }}">
            </div>
            <button type="submit" class="btn btn-primary">Break News!</button>
        </form>
    </div>
@endsection
