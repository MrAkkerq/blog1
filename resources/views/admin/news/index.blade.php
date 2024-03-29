@extends('layout.master')
@section('title', 'Admin | News')
@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Управление Новостями
        </h3>

        <a href="/news/create" class="btn btn-primary">Break News!</a>

        <table class="table table-striped">
            <tr>
                <th scope="col">Новости</th>
                <th scope="col">Дата публикации</th>
            </tr>

            @each('admin.news.item', $news, 'theNew')

        </table>

        {{ $news->links() }}

    </div>
@endsection
