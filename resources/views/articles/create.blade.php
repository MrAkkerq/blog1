@extends('layout.master')
@section('title', 'Create Article')
@section('content')
<div class="col-md-8">
    <h3 class="pb-4 mb-4 fst-italic border-bottom">
        Создание статьи
    </h3>
    @include('layout.errors')
    <form method="POST" action="/articles">
        @csrf
        @include('articles.forms')
        <button type="submit" class="btn btn-primary">Опубликовать статью</button>
    </form>
</div>
@endsection
