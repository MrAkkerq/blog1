

    <tr>
        {{--    @dd($article)--}}
        <td>{{ $article->title }}</td>
        <td><a href="/articles/{{ $article->getRouteKey() }}/edit" class="btn btn-primary">Изменить</a></td>
        <td><input type="checkbox" id="inputPublished" name="published" value="1" {{ old('published', isset($article) ? $article->published : '') ? 'checked' : '' }}></td>
        {{--    <td><input type="checkbox" id="inputPublished" name="published" value="1" {{ old('published', isset($article) ? $article->published : '') ? 'checked' : '' }}></td>--}}
        <td>{{ $article->published }}</td>
    </tr>

