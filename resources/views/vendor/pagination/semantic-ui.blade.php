@if ($paginator->hasPages())
    <div class="ui pagination menu" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="icon page-item text-gray-800  hover:bg-gray-700 hover:text-gray-200 hidden " aria-disabled="true" aria-label="@lang('pagination.previous')"> <i class="left chevron icon"></i>Prev</a>
        @else
            <a class="icon page-item  hover:bg-gray-700 hover:text-gray-200" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"> <i class="left chevron icon"></i></a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a class="icon page-item  hover:bg-gray-700 hover:text-gray-200 disabled" aria-disabled="true">{{ $element }}</a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="page-item  hover:bg-gray-700 hover:text-gray-200 active" href="{{ $url }}" aria-current="page">{{ $page }}</a>
                    @else
                        <a class="page-item  hover:bg-gray-700 hover:text-gray-200" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="icon page-item text-gray-800   hover:bg-gray-700 hover:text-gray-200" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"> <i class="right chevron icon"></i>Next</a>
        @else
            <a class="icon page-item  hover:bg-gray-700 hover:text-gray-200 " aria-disabled="true" aria-label="@lang('pagination.next')"> <i class="right chevron icon"></i></a>
        @endif
    </div>
@endif
