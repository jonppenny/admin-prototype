@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span>&lsaquo;</span></li>
            <li class="disabled"><span>&laquo;</span></li>
        @else
            <li><a href="?page=1" rel="prev" title="First page">&lsaquo;</a></li>
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev" title="Previous page">&laquo;</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next" title="Next page">&raquo;</a></li>
            <li><a href="?page={{ $paginator->lastPage() }}" rel="next" title="Last page">&rsaquo;</a></li>
        @else
            <li class="disabled"><span>&raquo;</span></li>
            <li class="disabled"><span>&rsaquo;</span></li>
        @endif
    </ul>
@endif
