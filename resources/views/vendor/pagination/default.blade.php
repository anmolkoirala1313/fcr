

@if ($paginator->hasPages())

<ul class="list-nav flex-item-center gap-8">


    @if ($paginator->onFirstPage())
        <li class="nav-item bora-4 bg-surface text-button w-40 h-40 flex-center border-line-1px disabled prev">
            <a href="{{ $paginator->previousPageUrl() }}" class="page-link" aria-label="Prev"><i class="fas fa-angle-left"></i></a>
        </li>
    @else
    <li class="nav-item bora-4 bg-surface text-button w-40 h-40 flex-center border-line-1px prev">
            <a href="{{ $paginator->previousPageUrl() }}" class="page-link" aria-label="Prev"><i class="fas fa-angle-left"></i></a>
        </li>
    @endif

    @if($paginator->currentPage() > 3)

    <li class="nav-item bora-4 bg-surface text-button w-40 h-40 flex-center border-line-1px count"><a class="page-link" href="{{ $paginator->url(1) }}"> 1</a></li>
    @endif

    @if($paginator->currentPage() > 4)
    <li class="nav-item bora-4 bg-surface text-button w-40 h-40 flex-center border-line-1pxcount disabled" aria-disabled="true"><span class="page-link seperate-pagination-link">...</span></li>

    @endif

    @foreach(range(1, $paginator->lastPage()) as $i)
        @if($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
            @if ($i == $paginator->currentPage())

                <li class="nav-item bora-4 bg-surface text-button w-40 h-40 flex-center border-line-1px active count">
                    <span class="page-link">
                    {{ $i }}
                        <span class="sr-only">(current)</span>
                    </span>
                </li>
            @else
                <li class="nav-item bora-4 bg-surface text-button w-40 h-40 flex-center border-line-1px count"><a class="page-link" href="{{ $paginator->url($i) }}"> {{ $i }}</a></li>
            @endif
        @endif
    @endforeach
    @if($paginator->currentPage() < $paginator->lastPage() - 3)
    <li class="nav-item bora-4 bg-surface text-button w-40 h-40 flex-center border-line-1px disabled" aria-disabled="true"><span class="page-link seperate-pagination-link">...</span></li>

    @endif

    @if($paginator->currentPage() < $paginator->lastPage() - 2)
        <li class="nav-item bora-4 bg-surface text-button w-40 h-40 flex-center border-line-1px count"><a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a></li>

    @endif


    @if ($paginator->hasMorePages())

    <li class="nav-item bora-4 bg-surface text-button w-40 h-40 flex-center border-line-1px next">
        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next"><i class="fas fa-angle-right"></i></a>
    </li>
    @else

    @endif


</ul>



@endif



