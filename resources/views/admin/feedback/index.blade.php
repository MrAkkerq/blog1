@extends('layout.master')

@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Список обращений
        </h3>

        @foreach($feedBack as $feed)
            @include('admin.feedback.item', ['feed' => $feed])
        @endforeach

    </div>
@endsection
