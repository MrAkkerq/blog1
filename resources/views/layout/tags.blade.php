@php
    $tags = $tags ?? collect();
@endphp

@if($tags->isNotEmpty())
    <div>
        @foreach($tags as $tag)
            <a href="/tags/{{ $tag->getRouteKey() }}" class="badge bg-secondary">{{ $tag->name }}</a>
        @endforeach
    </div>
@endif
