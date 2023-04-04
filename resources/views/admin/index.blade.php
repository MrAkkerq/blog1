@extends('layout.without_sidebar')
@section('title', 'Admin')
@section('content')
<nav class="nav flex-column">
    <a class="nav-link" href="/admin/feedback">Feed Back</a>
    <a class="nav-link" href="/admin/articles">Articles</a>
    <a class="nav-link" href="/admin/news">News</a>
</nav>
@endsection
