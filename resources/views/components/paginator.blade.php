<div class="col-md-12">
    <ul class="pages">
    @if (!$paginator->onFirstPage())
        <li><a href="{{  $paginator->withQueryString()->url(1) }}"><i class="fa fa-angle-double-left"></i></a></li>
    @endif

    @if ($paginator->onFirstPage())
        @for ($i = $paginator->currentPage(); $i < ($paginator->hasMorePages() ? $paginator->currentPage()+(($paginator->total() / $paginator->perPage()) > 6 ? 6 : ($paginator->total() / $paginator->perPage()))  : 1); $i++)
            <li class="{{ $paginator->currentPage() == $i ? "active" : ""}}"><a href="{{ $paginator->withQueryString()->url($i) }}">{{ $i }}</a></li>
        @endfor
    @elseif ($paginator->currentPage() == $paginator->lastPage() && $paginator->lastPage() > 6) 
        @for ($i = $paginator->currentPage()-5 ; $i <= $paginator->currentPage(); $i++)
            <li class="{{ $paginator->currentPage() == $i ? "active" : ""}}"><a href="{{ $paginator->withQueryString()->url($i) }}">{{ $i }}</a></li>
        @endfor
    @elseif ($paginator->currentPage() == $paginator->lastPage() && $paginator->lastPage() < 6) 
        @for ($i = $paginator->currentPage()-(($paginator->total() / $paginator->perPage()) > 6 ? 4 : intdiv($paginator->total(), $paginator->perPage())) ; $i <= $paginator->currentPage(); $i++)
            <li class="{{ $paginator->currentPage() == $i ? "active" : ""}}"><a href="{{ $paginator->withQueryString()->url($i) }}">{{ $i }}</a></li>
        @endfor
    @elseif (($paginator->lastPage() - $paginator->currentPage()) < 5) 
        @if (($paginator->lastPage() - $paginator->currentPage()) + ($paginator->currentPage() - 1) > 5)
            @for ($i = $paginator->currentPage()+1 - (6 - ($paginator->lastPage() - $paginator->currentPage())); $i <= $paginator->currentPage()+($paginator->lastPage() - $paginator->currentPage()); $i++)
                <li class="{{ $paginator->currentPage() == $i ? "active" : ""}}"><a href="{{ $paginator->withQueryString()->url($i) }}">{{ $i }}</a></li>
            @endfor
        @else
            @for ($i = $paginator->currentPage() - (($paginator->lastPage()-1) - ($paginator->lastPage() - $paginator->currentPage())); $i <= $paginator->currentPage()+($paginator->lastPage() - $paginator->currentPage()); $i++)
                <li class="{{ $paginator->currentPage() == $i ? "active" : ""}}"><a href="{{ $paginator->withQueryString()->url($i) }}">{{ $i }}</a></li>
            @endfor
        @endif
    @else
        @for ($i = $paginator->currentPage()-1; $i < $paginator->currentPage()+5; $i++)
            <li class="{{ $paginator->currentPage() == $i ? "active" : ""}}"><a href="{{ $paginator->withQueryString()->url($i) }}">{{ $i }}</a></li>
        @endfor
    @endif
    @if ($paginator->lastPage() != $paginator->currentPage())
        <li><a href="{{  $paginator->withQueryString()->url($paginator->lastPage()) }}"><i class="fa fa-angle-double-right"></i></a></li>
    @endif
    </ul>
</div>