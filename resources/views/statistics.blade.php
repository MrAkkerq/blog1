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
        <p>Самая длинная статья (символов) - {{ $maxArticleBody }}</p>
        <p>Самая короткая статья (символов) - {{ $minArticleBody }}</p>
    </div>
@endsection
