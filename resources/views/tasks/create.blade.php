@extends('layout.master')

@section('content')
    <div class="col-md-8" xmlns="http://www.w3.org/1999/html">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Создание задачи
        </h3>
        @include('layout.errors')
        <form method="POST" action="/tasks">
            @csrf
            <div class="mb-3">
                <label for="inputTitle" class="form-label">Название задачи</label>
                <input type="text" class="form-control" id="inputTitle" placeholder="Введите название задачи" name="title" value="{{ old('title') }}">
            </div>
            <div class="mb-3">
                <label for="inputBody" class="form-label">Описание задачи</label>
                <textarea class="form-control" id="inputBody" name="body">{{ old('body') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Создать задачу</button>
        </form>
    </div>
@endsection
