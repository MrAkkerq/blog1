@extends('layout.master')
@section('title', 'Admin | News')
@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Управление Новостями
        </h3>
        <table class="table table-striped">
            <tr>
                <th scope="col">Новость</th>
                <th scope="col">Скрыта</th>
            </tr>
{{--            @foreach($news as $theNew)--}}
{{--                @include('admin.news.item', ['theNew' => $theNew])--}}
{{--            @endforeach--}}
            @each('admin.news.item', $news, 'theNew')
        </table>
    </div>
@endsection
