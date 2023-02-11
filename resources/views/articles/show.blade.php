@extends('layout.master')
@section('title', 'Article')
@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            {{ $article->title }}
        </h3>

        <p> {{ $article->detail }} </p>

        @include('articles.tags', ['tags' => $article->tags])

        <br>

        {{ $article->body }}
        <hr>
        <a href="/" class="btn btn-primary">Вернуться к списку статей</a>
        <a href="/articles/{{ $article->getRouteKey() }}/edit" class="btn btn-light">Изменить</a>
    </div>
@endsection
