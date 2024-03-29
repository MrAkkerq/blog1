@extends('layout.master')
@section('title', 'Page')
@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Main page
        </h3>
        @php
            $name = auth()->check() ? auth()->user()->name : 'guest';
        @endphp
        <p>Hello, {{ $name }}!</p>
    </div>
@endsection
