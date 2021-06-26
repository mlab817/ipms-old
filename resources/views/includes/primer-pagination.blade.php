{{--    <nav>--}}
<div role="navigation" aria-label="Pagination" class="pagination">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <span class="previous_page disabled">Previous</span>
    @else
        <a class="previous_page" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">Previous</a>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <span class="gap" aria-disabled="true">{{ $element }}</span>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <em class="current" aria-label="{{ $page }}">{{ $page }}</em>
                @else
                    <a aria-label="{{ $page }}" href="{{ $url }}">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <a class="next_page" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">Next</a>
    @else
        <a class="next_page disabled" aria-disabled="true" aria-label="@lang('pagination.next')">Next</a>
    @endif
</div>
{{--    </nav>--}}
