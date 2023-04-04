@extends('layout.master')
@section('title', 'Articles and News')
@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Список статей и новостей по тегам
        </h3>

        <div class="flex-container">

            @if(count($articles) > 0)
            <div class="first">
                <h4>Статьи</h4>
                @each('articles.item', $articles, 'article')

            </div>
            @endif

            @if(count($news) > 0)
            <div class="second">
                <h4>Новости</h4>
                @each('news.item', $news, 'theNew')
            </div>
            @endif

        </div>
    </div>
@endsection
