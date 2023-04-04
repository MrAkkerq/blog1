@extends('layout.master')
@section('title', 'News')
@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Новости
        </h3>

        @each('news.item', $news, 'theNew')

        <div>
            <br>
        </div>

        {{ $news->links() }}
    </div>
@endsection
