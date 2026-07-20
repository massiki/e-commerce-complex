@if ($paginator->hasPages())
  @php
    $current = $paginator->currentPage();
    $last = $paginator->lastPage();
    $start = max(1, $current - 2);
    $end = min($last, $current + 2);
    $pages = range($start, $end);
  @endphp
  <nav class="shop-pages d-flex justify-content-between mt-3" aria-label="Page navigation">
    @if ($paginator->onFirstPage())
      <span class="btn-link d-inline-flex align-items-center disabled">
        <svg class="me-1" width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg">
          <use href="#icon_prev_sm" />
        </svg>
        <span class="fw-medium">PREV</span>
      </span>
    @else
      <a href="{{ $paginator->previousPageUrl() }}" class="btn-link d-inline-flex align-items-center">
        <svg class="me-1" width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg">
          <use href="#icon_prev_sm" />
        </svg>
        <span class="fw-medium">PREV</span>
      </a>
    @endif

    <ul class="pagination mb-0">
      @if ($start > 1)
        <li class="page-item"><a class="btn-link px-1 mx-2" href="{{ $paginator->url(1) }}">1</a></li>
        @if ($start > 2)
          <li class="page-item disabled"><span class="btn-link px-1 mx-2">...</span></li>
        @endif
      @endif
      @foreach ($pages as $page)
        <li class="page-item">
          <a class="btn-link px-1 mx-2{{ $page == $current ? ' btn-link_active' : '' }}" href="{{ $paginator->url($page) }}">{{ $page }}</a>
        </li>
      @endforeach
      @if ($end < $last)
        @if ($end < $last - 1)
          <li class="page-item disabled"><span class="btn-link px-1 mx-2">...</span></li>
        @endif
        <li class="page-item"><a class="btn-link px-1 mx-2" href="{{ $paginator->url($last) }}">{{ $last }}</a></li>
      @endif
    </ul>

    @if ($paginator->hasMorePages())
      <a href="{{ $paginator->nextPageUrl() }}" class="btn-link d-inline-flex align-items-center">
        <span class="fw-medium me-1">NEXT</span>
        <svg width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg">
          <use href="#icon_next_sm" />
        </svg>
      </a>
    @else
      <span class="btn-link d-inline-flex align-items-center disabled">
        <span class="fw-medium me-1">NEXT</span>
        <svg width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg">
          <use href="#icon_next_sm" />
        </svg>
      </span>
    @endif
  </nav>
@endif