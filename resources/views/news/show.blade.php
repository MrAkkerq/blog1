@extends('layout.master')
@section('title', 'News')
@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            {{ $theNew->title }}
        </h3>

        @include('layout.tags', ['tags' => $theNew->tags])

        <br>

        {{ $theNew->body }}

        <hr>

        @include('comments.index', ['item' => $theNew])

        <hr>

        @auth()
            @include('comments.create', ['item' => $theNew])
        @endauth

        <hr>

        <a href="/news" class="btn btn-primary">Вернуться к списку новостей</a>

        @hasrole('Super-Admin')
            <a href="/news/{{ $theNew->id }}/edit" class="btn btn-light">Изменить</a>
        @endhasrole
    </div>
@endsection
