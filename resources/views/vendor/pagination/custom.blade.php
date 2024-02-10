@if ($paginator->hasPages())
<nav aria-label="Page navigation">
    <ul class="pagination my-5 d-flex justify-content-center">
        @if (!$paginator->onFirstPage())
        <li class="page-item">
            <a class="page-link" href="/" aria-label="Previous">
                <span aria-hidden="true">«</span>
            </a>
        </li>
        @else
        <li class="page-item disabled" aria-disabled="true">
            <a class="page-link" href="/" aria-label="Previous">
                <span aria-hidden="true">«</span>
            </a>
        </li>
        @endif
        @foreach ($elements as $element)
        @if (is_string($element))
            <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
        @endif
        @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}"  aria-label="Next">
                <span aria-hidden="true">»</span>
            </a>
        </li>
        @else
        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
            <span class="page-link" aria-hidden="true">&rsaquo;</span>
        </li>
        @endif
    </ul>
</nav>
@endif