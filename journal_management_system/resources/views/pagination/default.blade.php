<div class="d-flex pagination-block row align-items-center">
  <div class="col-lg-4"> {!! __('Showing') !!} <span class="font-medium">{{ $paginator->firstItem() }}</span> {!! __('to') !!} <span class="font-medium">{{ $paginator->lastItem() }}</span> {!! __('of') !!} <span class="font-medium">{{ $paginator->total() }}</span> {!! __('entries') !!} </div>
  @if ($paginator->hasPages())
  <div class="ml-auto col-lg-8 d-flex justify-content-end">
    <ul class="pagination pagination-circle">
      {{-- Previous Page Link --}}
      @if ($paginator->onFirstPage())
        <li class="page-item page-indicator"><a class="page-link" href="javascript:void(0)"><i class="la la-angle-left"></i></a></li>
      @else
        <li class="page-item page-indicator"> <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="page-link" aria-label="{{ __('pagination.previous') }}"><i class="la la-angle-left"></i></a></li>
      @endif

      {{-- Pagination Elements --}}
      @foreach ($elements as $element)
      {{-- "Three Dots" Separator --}}
      @if (is_string($element)) <span aria-disabled="true"> <span class="relative inline-flex items-center px-2 py-1 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5">{{ $element }}</span> </span> @endif

      {{-- Array Of Links --}}
      @if (is_array($element))

      @foreach ($element as $page => $url)
      @if ($page == $paginator->currentPage())
      <li class="page-item active"> <a class="page-link"> {{ $page }} </a> </li>
      @else
      <li class="page-item"> <a href="{{ $url }}" class="page-link"> {{ $page }} </a> </li>
      @endif
      @endforeach
      @endif
      @endforeach

      {{-- Next Page Link --}}
      @if ($paginator->hasMorePages())
        <li class="page-item page-indicator"> <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="page-link" aria-label="{{ __('pagination.next') }}"><i class="la la-angle-right"></i></a></li>
      @else
        <li class="page-item page-indicator"><a class="page-link" href="javascript:void(0)"><i class="la la-angle-right"></i></a></li>
      @endif
    </ul>
  </div>
@endif
</div>
