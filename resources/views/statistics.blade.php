@extends('layout.master')
@section('title', 'Statistics')
@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Statistics
        </h3>
        <p>Общее количество опубликованных статей - {{ $articlesCount }}</p>
        <p>Общее количество новостей - {{ $newsCount }}</p>
        @if(!is_null($mostActiveUserName))
            <p>Имя пользователя у которого больше всего созданных статей - {{ $mostActiveUserName }}</p>
        @endif
        @if(!is_null($longArticle))
            <p>Самая длинная статья - {{ $longArticle['title'] }},  <a href="{{url('articles/' . $longArticle['code'])}}">{{ $longArticle['code'] }}</a>, {{ $longArticle['len'] }}</p>
        @endif
        @if(!is_null($shortArticle))
            <p>Самая длинная статья - {{ $shortArticle['title'] }}, <a href="{{url('articles/' . $shortArticle['code'])}}">{{ $shortArticle['code'] }}</a>, {{ $shortArticle['len'] }}</p>
        @endif
        <p>Среднее количество статей у активных пользователей - {{ $avgCountOfArticlesUsers }}</p>
        @if(!is_null($changedArticle))
            <p>Самая непостоянная статья - {{ $changedArticle['title'] }}, <a href="{{url('articles/' . $changedArticle['code'])}}">{{ $changedArticle['code'] }}</a></p>
        @endif
        @if(!is_null($commentedArticle))
            <p>Самая комментируемая статья - {{ $commentedArticle['title'] }}, <a href="{{url('articles/' . $commentedArticle['code'])}}">{{ $commentedArticle['code'] }}</a></p>
        @endif
    </div>
@endsection
