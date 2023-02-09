@extends('layout.master')
@section('title', 'Admin | Feedback')
@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Список обращений
        </h3>
        <table class="table table-striped">
            <tr>
                <th scope="col">Email</th>
                <th scope="col">Message</th>
                <th scope="col">Receiving time</th>
            </tr>
            @foreach($feedBack as $feed)
                @include('admin.feedback.item', ['feed' => $feed])
            @endforeach
        </table>
    </div>
@endsection
