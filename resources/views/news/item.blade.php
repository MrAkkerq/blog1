<article class="blog-post">
    <h2 class="blog-post-title mb-1"><a href="/news/{{ $theNew->id }}">{{ $theNew->title }}</a></h2>
    <p class="blog-post-meta">{{ $theNew->created_at->toFormattedDateString() }}</p>
    {{ $theNew->body }}
    @include('layout.tags', ['tags' => $theNew->tags])
</article>
