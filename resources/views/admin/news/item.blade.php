<tr>
    <td><a href="/news/{{ $theNew->id }}/edit"> {{ $theNew->title }} </a></td>
    <td>
        <form method="POST" action="/admin/news/{{$theNew->id}}">
            @if ($theNew->hidden)
                @method('DELETE')
            @endif
            @csrf
            <div class="form-check">
                <label class="form-check-label {{ $theNew->hidden ? 'completed' : '' }}">
                    <input
                        class="form-check-input"
                        type="checkbox"
                        name="completed"
                        onclick="this.form.submit()"
                        {{ $theNew->hidden ? 'checked' : '' }}
                    >
                </label>
            </div>
        </form>
    </td>
</tr>
