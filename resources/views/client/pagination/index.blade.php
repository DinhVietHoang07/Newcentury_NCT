<style>
    .page-link {
        color: #2cbdb8;
    }
</style>
@if ($paginator->hasPages())
    <ul class="pagination pxp-pagination">
        <?php
        $start = $paginator->currentPage() - 2; // show 3 pagination links before current
        $end = $paginator->currentPage() + 2; // show 3 pagination links after current
        if ($start < 1) {
            $start = 1; // reset start to 1
            $end += 1;
        }
        if ($end >= $paginator->lastPage()) {
            $end = $paginator->lastPage();
        } // reset end to last page
        ?>

        @if ($start > 1)
            <li class="page-item">
                <a href="{{ $paginator->url(1) }}">{{ 1 }}</a>
            </li>
            @if ($paginator->currentPage() != 4)
                {{-- "Three Dots" Separator --}}
                <li class="page-item" aria-disabled="true"><span>...</span></li>
            @endif
        @endif
        @for ($i = $start; $i <= $end; $i++)
            <li class="page-item {{ $paginator->currentPage() == $i ? ' active' : '' }}">
                <a class="{{ $paginator->currentPage() == $i ? ' active' : '' }} page-link" style=""
                    href="{{ $paginator->url($i) }}">{{ $i }}</a>
            </li>
        @endfor
        @if ($end < $paginator->lastPage())
            @if ($paginator->currentPage() + 3 != $paginator->lastPage())
                {{-- "Three Dots" Separator --}}
                <li class="page-item disabled" aria-disabled="true"><span>...</span></li>
            @endif
            <li class="page-item">
                <a class="page-link" style=""
                    href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a>
            </li>
        @endif
    </ul>
@endif
