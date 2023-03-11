@extends('layout.master')

@section('content')
    <div class="col-md-8" xmlns="http://www.w3.org/1999/html">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Отправить уведомление
        </h3>
        @include('layout.errors')
        <form method="POST" action="/service">
            @csrf
            <div class="mb-3">
                <label for="inputTitle" class="form-label">Заголовок уведомления</label>
                <input type="text" class="form-control" id="inputTitle" placeholder="Введите заголовок уведомления" name="title" value="{{ old('title') }}">
            </div>
            <div class="mb-3">
                <label for="inputText" class="form-label">Текст уведомления</label>
                <textarea class="form-control" id="inputText" name="text">{{ old('text') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
@endsection
