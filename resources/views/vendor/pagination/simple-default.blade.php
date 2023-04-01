@if ($paginator->hasPages())
    <nav class="blog-pagination" aria-label="Pagination">
        @if ($paginator->onFirstPage())
            <a class="btn btn-outline-secondary rounded-pill disabled">@lang('pagination.previous')</a>
        @else
            <a class="btn btn-outline-primary rounded-pill" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
        @endif

        @if ($paginator->hasMorePages())
            <a class="btn btn-outline-primary rounded-pill" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
        @else
            <a class="btn btn-outline-secondary rounded-pill disabled">@lang('pagination.next')</a>
        @endif
    </nav>
@endif
