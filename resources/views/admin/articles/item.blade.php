<tr>
    <td><a href="/articles/{{ $article->getRouteKey() }}/edit"> {{ $article->title }} </a></td>
    <td><p class="blog-post-meta">{{ $article->created_at->toFormattedDateString() }}</p></td>
    <td>
        <form method="POST" action="/admin/articles/{{$article->code}}">
            @if ($article->published)
                @method('DELETE')
            @endif
            @csrf
            <div class="form-check">
                <label class="form-check-label {{ $article->published ? 'completed' : '' }}">
                    <input
                        class="form-check-input"
                        type="checkbox"
                        name="completed"
                        onclick="this.form.submit()"
                        {{ $article->published ? 'checked' : '' }}
                    >
                </label>
            </div>
        </form>
    </td>

</tr>

