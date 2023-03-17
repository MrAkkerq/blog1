@extends('layout.master')

@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            {{ $task->title }}
        </h3>

        @include('tasks.tags', ['tags' => $task->tags])

        <br>

        <p>{{ $task->body }}</p>

        @if($task->steps->isNotEmpty())
        <ul class="list-group">
            @foreach($task->steps as $step)
                <li class="list-group-item">
                    <form method="POST" action="/completed-steps/{{ $step->id }}">
                        @if ($step->completed)
                            @method('DELETE')
                        @endif
                        @csrf
                        <div class="form-check">
                            <label class="form-check-label {{ $step->completed ? 'completed' : '' }}">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    name="completed"
                                    onclick="this.form.submit()"
                                    {{ $step->completed ? 'checked' : '' }}
                                >
                                {{ $step->description }}
                            </label>
                        </div>
                    </form>
                </li>

            @endforeach
        </ul>
        @endif

        @can('update', $task)
            <form class="card card-body mb-4" method="POST" action="/tasks/{{ $task->id }}/steps">
                @csrf
                <div class="form-group">
                    <input
                        type="text" class="form-control"
                        placeholder="Step"
                        value="{{ old('description') }}"
                        name="description"
                    >
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        @endcan

        @include('layout.errors')

        <hr>

        @forelse($task->changes as $item)
            <p> {{ $item->email }} - {{ $item->pivot->updated_at->diffForHumans() }} - {{ $item->pivot->before }} - {{ $item->pivot->after }}</p>
        @empty
            <p> Нет изминений</p>
        @endforelse

        <hr>
        <a href="/tasks" class="btn btn-primary">Вернуться к списку задач</a>
        @can('update', $task)
            <a href="/tasks/{{ $task->id }}/edit" class="btn btn-light">Изменить</a>
        @endcan
    </div>
@endsection
