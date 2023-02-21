<article class="blog-post">
    <h2 class="blog-post-title mb-1"><a href="/tasks/{{ $task->id }}">{{ $task->title }}</a></h2>
{{--    <p class="blog-post-meta">{{ $task->created_at->toFormattedDateString() }}</p>--}}
    <p class="blog-post-meta">@datetime($task->created_at)</p>

    @include('tasks.tags', ['tags' => $task->tags])

    {{ $task->body }}

</article>
