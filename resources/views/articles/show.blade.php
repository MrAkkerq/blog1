@extends('layout.master')
@section('title', 'Article')
@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            {{ $article->title }}
        </h3>

        <h5> {{ $article->detail }} </h5>

        {{ $article->body }}

        <div><a href="/">Вернуться к списку статей</a></div>
    </div>
@endsection
