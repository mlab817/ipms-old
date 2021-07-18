<div role="navigation" aria-label="Pagination" class="pagination">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <span class="previous_page disabled">Previous</span>
    @else
        <a class="previous_page" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">Previous</a>
    @endif

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <a class="next_page" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">Next</a>
    @else
        <a class="next_page disabled" aria-disabled="true" aria-label="@lang('pagination.next')">Next</a>
    @endif
</div>
