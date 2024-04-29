@if ($paginator->hasPages())
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <span class="select_page_link">&#8592</span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="select_page_link">&#8592</a>
    @endif
    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span class="select_page_link">
                        {{ $page }}
                    </span>
                @else
                    <a href="{{ $url }}" class="select_page_link">
                        {{ $page }}
                    </a>
                @endif
            @endforeach
        @endif
    @endforeach
    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="select_page_link">&#8594</a>
    @else
        <span class="select_page_link" style="cursor: default">&#8594</span>
    @endif
@endif

