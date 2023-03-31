@if ($paginator->hasPages())
    {{--        <nav class="blog-pagination" aria-label="Pagination">--}}
    {{--            <a class="btn btn-outline-primary rounded-pill" href="#">Older</a>--}}
    {{--            <a class="btn btn-outline-secondary rounded-pill disabled">Newer</a>--}}
    {{--        </nav>--}}
    <nav class="blog-pagination" aria-label="Pagination">

        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="btn btn-outline-secondary rounded-pill disabled">@lang('pagination.previous')</a>
        @else
            <a class="btn btn-outline-primary rounded-pill" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="btn btn-outline-primary rounded-pill" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
        @else
            <a class="btn btn-outline-secondary rounded-pill disabled">@lang('pagination.next')</a>

        @endif

    </nav>
@endif
