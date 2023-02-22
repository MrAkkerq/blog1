@extends('layout.master')
@section('title', 'Admin | Feedback')
@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Управление статьями
        </h3>
        <table class="table table-striped">
{{--            <tr>--}}
{{--                <th scope="col">Название статьи</th>--}}
{{--                <th scope="col">Изменить</th>--}}
{{--                <th scope="col">Опубликовать</th>--}}
{{--                <th scope="col">Снять с публикации</th>--}}

{{--            </tr>--}}
            @foreach($articles as $article)
                @include('admin.articles.item', ['article' => $article])
            @endforeach

        </table>
    </div>
@endsection
