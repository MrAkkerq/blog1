@extends('layout.master')
@section('title', 'News')
@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            {{ $theNew->title }}
        </h3>

        {{ $theNew->body }}

        <hr>

        <a href="/news" class="btn btn-primary">Вернуться к списку новостей</a>
{{--        @can('update', $article)--}}
        @hasrole('Super-Admin')
            <a href="/news/{{ $theNew->id }}/edit" class="btn btn-light">Изменить</a>
        @endhasrole
{{--        @endcan--}}
{{--        @can('update', $article)--}}
{{--            <a href="/articles/{{ $article->getRouteKey() }}/edit" class="btn btn-light">Изменить</a>--}}
{{--        @endcan--}}
        {{--        @can('edit articles')--}}
        {{--            <a href="/articles/{{ $article->getRouteKey() }}/edit" class="btn btn-light">Изменить</a>--}}
        {{--        @endcan--}}
    </div>
@endsection
