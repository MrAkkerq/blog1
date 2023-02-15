@extends('layout.master')
@section('title', 'Index')
@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            MAIN PAGE
        </h3>
        @php
            $name = auth()->user()->name ?? 'quest';
            echo "Hello, {$name}";
        @endphp
    </div>
@endsection
