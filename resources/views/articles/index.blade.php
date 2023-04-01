@extends('layout.master')
@section('title', 'Articles')
@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Список статей
        </h3>
{{--        @foreach($articles as $article)--}}
{{--            @include('articles.item', ['article' => $article])--}}
{{--        @endforeach--}}
        @each('articles.item', $articles, 'article')
        <div>
            <br>
        </div>

        {{ $articles->links() }}
{{--        <nav class="blog-pagination" aria-label="Pagination">--}}
{{--            <a class="btn btn-outline-primary rounded-pill" href="#">Older</a>--}}
{{--            <a class="btn btn-outline-secondary rounded-pill disabled">Newer</a>--}}
{{--        </nav>--}}
    </div>
@endsection
