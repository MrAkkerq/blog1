@extends('layout.master')
@section('title', 'Articles')
@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Список статей
        </h3>

        @each('articles.item', $articles, 'article')

        <div>
            <br>
        </div>

        {{ $articles->links() }}

    </div>
@endsection
