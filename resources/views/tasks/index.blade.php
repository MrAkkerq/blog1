@extends('layout.master')

@section('content')

    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Список задач
        </h3>

        @foreach($tasks as $task)

                @include('tasks.item', ['task' => $task])
            </article>
        @endforeach

        <nav class="blog-pagination" aria-label="Pagination">
            <a class="btn btn-outline-primary rounded-pill" href="#">Older</a>
            <a class="btn btn-outline-secondary rounded-pill disabled">Newer</a>
        </nav>

    </div>
@endsection
