@extends('layout.master')
@section('title', 'Admin | Articles')
@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Управление статьями
        </h3>
        <table class="table table-striped">
            <tr>
                <th scope="col">Статья</th>
                <th scope="col">Создана</th>
                <th scope="col">Опубликовано</th>
            </tr>

            @each('admin.articles.item', $articles, 'article')

        </table>

        {{ $articles->links() }}

    </div>
@endsection
