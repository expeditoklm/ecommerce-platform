{{-- resources/views/vendor/pagination/custom.blade.php --}}

@if ($paginator->hasPages())
<div class="row mt-8">
    <div class="col mt-8">
        <nav>
            <ul class="pagination">

                {{-- Bouton Précédent --}}
                <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link mx-1"
                       href="{{ $paginator->onFirstPage() ? '#' : $paginator->previousPageUrl() }}"
                       aria-label="Previous">
                        <i class="feather-icon icon-chevron-left"></i>
                    </a>
                </li>

                {{-- Numéros de pages --}}
                @foreach ($elements as $element)

                    {{-- Séparateur "..." --}}
                    @if (is_string($element))
                        <li class="page-item disabled">
                            <a class="page-link mx-1 text-body" href="#">{{ $element }}</a>
                        </li>
                    @endif

                    {{-- Pages numérotées --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            <li class="page-item">
                                <a class="page-link mx-1 {{ $page == $paginator->currentPage() ? 'active' : 'text-body' }}"
                                   href="{{ $url }}">
                                    {{ $page }}
                                </a>
                            </li>
                        @endforeach
                    @endif

                @endforeach

                {{-- Bouton Suivant --}}
                <li class="page-item {{ $paginator->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link mx-1"
                       href="{{ $paginator->hasMorePages() ? $paginator->nextPageUrl() : '#' }}"
                       aria-label="Next">
                        <i class="feather-icon icon-chevron-right"></i>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</div>
@endif