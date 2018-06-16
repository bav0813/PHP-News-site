@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span>&laquo;</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
        @endif

        {{-- Pagination Elements --}}
        {{--@foreach ($elements as $element)--}}
            {{-- "Three Dots" Separator --}}
            {{--@if (is_string($element))--}}
                {{--<li class="disabled"><span>{{ $element }}</span></li>--}}
            {{--@endif--}}

            {{-- Array Of Links --}}
            {{--@if (is_array($element))--}}
                {{--@foreach ($element as $page => $url)--}}
                    {{--@if ($page == $paginator->currentPage())--}}
                        {{--<li class="active"><span>{{ $page }}</span></li>--}}
                    {{--@else--}}
                        {{--<li><a href="{{ $url }}">{{ $page }}</a></li>--}}
                    {{--@endif--}}
                {{--@endforeach--}}
            {{--@endif--}}
        {{--@endforeach--}}

        {{-- Pagination Elements --}}


        @php $content='';
        @endphp

        @foreach ($elements as $element)
            {{-- Array Of Links --}}
            @foreach ($element as $page => $url)
                {{--  Use three dots when current page is greater than 1.  --}}
                @if ($paginator->currentPage() > 1 && $page === 1)
                    <li class="page-item disabled"><span class="page-link">...</span></li>
                @endif

                {{--  Show active page else show the first and last two pages from current page.  --}}
                @if ($page == $paginator->currentPage())
                    <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                @elseif ($page === $paginator->currentPage() || $page === $paginator->lastPage() || $page === 1)
                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                @endif

                {{--  Use three dots when current page is awasy from end.  --}}

                @if ($paginator->currentPage() < $paginator->count() - 2 && $page === $paginator->count() - 1)
                    <li class="page-item "><a href="#" id="showpages"><span class="page-link">...</span></a></li>
                    <div id="pageshide" style="display: none">

                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    </div>
                @endif
            @endforeach
        @endforeach





        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
        @else
            <li class="disabled"><span>&raquo;</span></li>
        @endif
    </ul>
@endif
