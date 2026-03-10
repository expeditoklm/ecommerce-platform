@extends('base')
@section('content')

<main>
    <div class="mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Accueil</a></li>
                            <li class="breadcrumb-item active">Boutiques</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="mb-lg-14 mb-8 mt-8">
        <div class="container">

            {{-- En-tête --}}
            <div class="row mb-8">
                <div class="col-md-12">
                    <div class="d-md-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="mb-0">Toutes les boutiques</h2>
                            <p class="text-muted mb-0">{{ $shops->total() }} boutique(s) disponible(s)</p>
                        </div>
                        {{-- Filtres --}}
                        <div class="d-flex gap-3 mt-3 mt-md-0">
                            <form action="{{ route('store') }}" method="GET" class="d-flex gap-2">
                                <input type="search" class="form-control" name="search"
                                       placeholder="Rechercher une boutique"
                                       value="{{ request('search') }}">
                                <button class="btn btn-outline-secondary" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Grille boutiques --}}
            @if($shops->count() > 0)
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 g-lg-6">

                @foreach($shops as $shop)
                <div class="col">
                    <div class="card border-0 text-center card-lg h-100">
                        <div class="card-body p-6">

                            {{-- Logo --}}
                            @if($shop->logo_url)
                                <img src="{{ asset('storage/' . $shop->logo_url) }}"
                                     alt="{{ $shop->name }}"
                                     class="rounded-circle icon-shape icon-xxl mb-4"
                                     style="object-fit:cover;">
                            @else
                                <div class="rounded-circle icon-shape icon-xxl mb-4 bg-light d-flex align-items-center justify-content-center mx-auto">
                                    <i class="bi bi-shop fs-2 text-muted"></i>
                                </div>
                            @endif

                            {{-- Nom --}}
                            <h2 class="mb-1 h5">
                                <a href="{{ route('store.single', ['uuid' => $shop->uuid]) }}"
                                   class="text-inherit">
                                    {{ $shop->name }}
                                </a>
                            </h2>

                            {{-- Catégorie --}}
                            @if($shop->mainCategory)
                            <div class="mb-1">
                                <span class="badge bg-light text-dark">{{ $shop->mainCategory->name }}</span>
                            </div>
                            @endif

                            {{-- Email --}}
                            <div class="mb-1 text-muted small">
                                <i class="bi bi-envelope me-1"></i>
                                {{ $shop->contact_email ?? $shop->user->email }}
                            </div>

                            {{-- Localisation --}}
                            @if($shop->location)
                            <div class="mb-2 text-muted small">
                                <i class="bi bi-geo-alt me-1"></i>{{ $shop->location }}
                            </div>
                            @endif

                            {{-- Rating --}}
                            <div class="mt-3">
                                @php
                                    $rating = round($shop->average_rating * 2) / 2;
                                    $full   = floor($rating);
                                    $half   = ($rating - $full) >= 0.5 ? 1 : 0;
                                    $empty  = 5 - $full - $half;
                                @endphp
                                <small class="text-warning">
                                    @for($i = 0; $i < $full; $i++)<i class="bi bi-star-fill"></i>@endfor
                                    @if($half)<i class="bi bi-star-half"></i>@endif
                                    @for($i = 0; $i < $empty; $i++)<i class="bi bi-star"></i>@endfor
                                </small>
                                <span class="ms-2 fw-bold">{{ number_format($shop->average_rating, 1) }}</span>
                                <span class="text-muted ms-1 small">({{ number_format($shop->reviews_count) }} avis)</span>
                            </div>

                            {{-- Lien --}}
                            <div class="mt-4">
                                <a href="{{ route('store.single', ['uuid' => $shop->uuid]) }}"
                                   class="btn btn-outline-primary btn-sm">
                                    Voir la boutique
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            {{-- Pagination --}}
            @if($shops->hasPages())
            <div class="row mt-8">
                <div class="col">
                    {{ $shops->links('vendor.pagination.custom') }}
                </div>
            </div>
            @endif

            @else
            <div class="text-center py-8">
                <i class="bi bi-shop display-4 text-muted"></i>
                <h4 class="mt-4">Aucune boutique trouvée</h4>
                <p class="text-muted">Essayez une autre recherche.</p>
            </div>
            @endif

        </div>
    </section>
</main>

@endsection