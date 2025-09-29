@if ($rows instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator && $rows->lastPage() > 1)
  @php $p = $rows->withQueryString(); @endphp
  <div class="d-flex justify-content-center my-3 pagination-wrap" role="navigation" aria-label="Pagination">
    <ul class="pagination mb-0">

      {{-- Prev --}}
      <li class="page-item {{ $p->onFirstPage() ? 'disabled' : '' }}">
        <a class="page-link" href="{{ $p->previousPageUrl() ?? '#' }}" rel="prev" aria-label="Previous"
           aria-disabled="{{ $p->onFirstPage() ? 'true' : 'false' }}"
           tabindex="{{ $p->onFirstPage() ? '-1' : '0' }}">&lsaquo;</a>
      </li>

      {{-- Numbers (window حول الصفحة الحالية) --}}
      @for ($i = 1; $i <= $p->lastPage(); $i++)
        @php $show = $i == 1 || $i == $p->lastPage() || abs($i - $p->currentPage()) <= 2; @endphp
        @if ($show)
          <li class="page-item {{ $p->currentPage() == $i ? 'active' : '' }}">
            <a class="page-link" href="{{ $p->url($i) }}" aria-current="{{ $p->currentPage() == $i ? 'page' : 'false' }}">{{ $i }}</a>
          </li>
        @elseif ($i == 2 || $i == $p->lastPage()-1)
          <li class="page-item disabled"><span class="page-link">…</span></li>
        @endif
      @endfor

      {{-- Next --}}
      <li class="page-item {{ $p->currentPage() == $p->lastPage() ? 'disabled' : '' }}">
        <a class="page-link" href="{{ $p->nextPageUrl() ?? '#' }}" rel="next" aria-label="Next"
           aria-disabled="{{ $p->currentPage() == $p->lastPage() ? 'true' : 'false' }}"
           tabindex="{{ $p->currentPage() == $p->lastPage() ? '-1' : '0' }}">&rsaquo;</a>
      </li>

    </ul>
  </div>
@endif

<style>

:root{
  --brand-50:#f5f0fa; --brand-100:#efe6f7; --brand-200:#e4d7f1;
  --brand-600:#00A651; --brand-700:#5d4a6b; --brand-text:#2b2b2b;
}

.pagination { gap:.25rem; }
.pagination .page-link{
  min-width: 38px; text-align:center;
  border:1px solid var(--brand-200);
  background: var(--brand-50);
  color: var(--brand-700);
  border-radius: 10px;
  box-shadow: none;
}
.pagination .page-link:hover,
.pagination .page-link:focus{
  background: var(--brand-100);
  color: var(--brand-700);
}
.pagination .page-item.active .page-link{
  background: var(--brand-600);
  border-color: var(--brand-600);
  color:#fff;
  box-shadow: 0 0 0 .2rem rgba(126,95,166,.15);
}
.pagination .page-item.disabled .page-link{
  color:#9aa0a6; background:#f9f9fb; border-color:#eee;
}

</style>
<script>
document.addEventListener('click', e=>{
  if(e.target.closest('.pagination .page-link')){
    window.scrollTo({ top: 0, behavior: 'smooth' });
  }
});
</script>
