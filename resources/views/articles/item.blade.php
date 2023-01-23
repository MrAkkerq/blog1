<article class="blog-post">
    <h2 class="blog-post-title mb-1"><a href="/articles/{{ $article->code }}">{{ $article->title }}</a></h2>
    <p class="blog-post-meta">{{ $article->created_at->toFormattedDateString() }}</p>
{{--</article>--}}
    <h5> {{ $article->detail }} </h5>
{{ $article->body }}
</article>
