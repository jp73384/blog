@if ($paginator->hasPages())
    <nav arria-label="Paginate">
        <div class="clearfix">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="btn btn-primary float-left">Nuevos post →</span>
            @else
                <a class="btn btn-primary float-left" href="{{ $paginator->previousPageUrl() }}" rel="prev">Nuevos post →</a>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a class="btn btn-primary float-right" href="{{ $paginator->nextPageUrl() }}" rel="next">← Post Antiguos</a>
            @else
               <span class="btn btn-primary float-right">← Post Antiguos</span>
            @endif
        </div>
    </nav>
@endif
    