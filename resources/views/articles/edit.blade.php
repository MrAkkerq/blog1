@extends('layout.master')
@section('title', 'Edit Article')
@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Редактирование статьи
        </h3>
        @include('layout.errors')
        <form method="POST" action="/articles/{{ $article->getRouteKey() }}">
            @csrf
            @method('PATCH')
            @include('articles.forms')
            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
        <br>
        <form method="POST" action="/articles/{{ $article->getRouteKey() }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Удалить</button>
        </form>
    </div>
@endsection
