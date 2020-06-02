@if ($paginator->hasPages())
    <div class="flex items-center justify-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="rounded-l rounded-sm border border-app-blue text-gray-500 px-3 py-2 no-underline">&laquo;</span>
        @else
            <a
                class="rounded-l rounded-sm border border-app-blue px-3 py-2 text-gray-700 hover:bg-app-blue hover:text-white no-underline"
                href="{{ $paginator->previousPageUrl() }}"
                rel="prev"
            >
                &laquo;
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="border-t border-b border-l border-app-blue px-3 py-2 no-underline">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="border-t border-b border-l border-app-blue px-3 py-2 bg-blue-500 text-white no-underline">
                            {{ $page }}
                        </span>
                    @else
                        <a
                            class="border-t border-b border-l border-app-blue px-3 py-2 text-gray-700 hover:bg-app-blue hover:text-white no-underline"
                            href="{{ $url }}"
                        >
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a
                class="rounded-r rounded-sm border border-app-blue px-3 py-2 text-gray-700 hover:bg-app-blue hover:text-white no-underline"
                href="{{ $paginator->nextPageUrl() }}"
                rel="next"
            >
                &raquo;
            </a>
        @else
            <span class="rounded-r rounded-sm border border-app-blue text-gray-500 px-3 py-2 no-underline">&raquo;</span>
        @endif
    </div>
@endif
