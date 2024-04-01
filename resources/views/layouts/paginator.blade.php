@if ($paginator->hasPages())
<nav>
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled" aria-disabled="true">
                <span>
                    &larr;
                </span>
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev">
                    &larr;
                </a>
            </li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" rel="next">
                    &rarr;
                </a>
            </li>
        @else
            <li class="disabled" aria-disabled="true">
                <span>
                    &rarr;
                </span>
            </li>
        @endif
    </ul>
</nav>
@endif