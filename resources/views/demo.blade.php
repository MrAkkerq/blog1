@extends('app')

@section('title', 'Page demo title')

@section('content')
    Содержание Demo
@endsection

@section('sidebar')
    @parent
    <p>
        Переопределение
    </p>

    {{ $data }}
{{--    {{!! $data !! }}--}}
    <script>
        let app = @json($data)
    </script>
@endsection
