@if ($paginator->hasPages())


    <style>
        .pagination {
            position: relative;
            display: block;
        }

        .pagination li {
            position: relative;
            display: inline-block;
            margin: 0px 3.5px;
        }

        .pagination li a {
            position: relative;
            display: inline-block;
            font-size: 20px;
            font-weight: 700;
            font-family: 'Quicksand', sans-serif;
            height: 50px;
            width: 50px;
            line-height: 50px;
            background: transparent;
            text-align: center;
            color: #232323;
            border: 1px solid #dedbd9;
            border-radius: 50%;
            z-index: 1;
            transition: all 500ms ease;
        }

        .pagination li a:hover,
        .pagination li a.current {
            color: #ffffff;
        }

    </style>

    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page"><span>{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif

