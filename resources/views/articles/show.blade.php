@extends('layout.master')

@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            {{ $article->title }}
        </h3>

        {{ $article->detail }}
        <br>

        {{ $article->body }}

        <br>
        <a href="/">Вернуться к списку статей</a>
    </div>
    </article>
@endsection
