{{--@dd(request())--}}
<div class="col-md-8">
    <h3 class="pb-4 mb-4 fst-italic border-bottom">
        Комментарий
    </h3>
    @include('layout.errors')
    <form method="POST" action="/articles/{{ $article->getRouteKey() }}/comments">
        @csrf
        <div class="mb-3">
            <label for="inputComment" class="form-label">Комментарий</label>
            <textarea class="form-control" id="inputComment" name="comment">{{ old('comment') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Опубликовать комментарий</button>
    </form>
</div>


