@extends('layout.master')
@section('title', 'Article')
@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            {{ $article->title }}
        </h3>

        <p> {{ $article->detail }} </p>

        @include('layout.tags', ['tags' => $article->tags])

        <br>

        {{ $article->body }}
        <hr>
            @include('comments.index', ['item' => $article])
        <hr>
        @auth()
            @include('comments.create', ['item' => $article])
        @endauth
        <hr>
        <a href="/articles" class="btn btn-primary">Вернуться к списку статей</a>
        @can('update', $article)
            <a href="/articles/{{ $article->getRouteKey() }}/edit" class="btn btn-light">Изменить</a>
        @endcan
    </div>
@endsection
