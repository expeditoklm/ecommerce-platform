@extends('base')
@section('content')

<main>
    <div class="mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Accueil</a></li>
                            <li class="breadcrumb-item active">Boutiques</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    {{-- Bannière --}}
    <section class="mt-8">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bg-light d-flex justify-content-between ps-md-10 ps-6 rounded">
                        <div class="d-flex align-items-center">
                            <h1 class="mb-0 fw-bold">Boutiques</h1>
                        </div>
                        <div class="py-6">
                            <img src="{{ asset('assets/images/svg-graphics/store-graphics.svg') }}"
                                 alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Liste des boutiques --}}
    <section class="mt-8 mb-lg-14 mb-8">
        <div class="container">

            {{-- Header + recherche --}}
            <div class="row mb-6">
                <div class="col-md-6">
                    <h6 class="mb-0">
                        Nous avons <span class="text-primary">{{ $shops->total() }}</span> boutique(s) disponible(s)
                    </h6>
                </div>
                <div class="col-md-6 mt-3 mt-md-0">
                    <form action="{{ route('store.grid') }}" method="GET" class="d-flex gap-2">
                        <input type="search" class="form-control form-control-sm"
                               name="search"
                               value="{{ request('search') }}"
                               placeholder="Rechercher une boutique...">
                        <button class="btn btn-outline-primary btn-sm" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                        @if(request('search'))
                        <a href="{{ route('store.grid') }}" class="btn btn-outline-secondary btn-sm">
                            <i class="bi bi-x"></i>
                        </a>
                        @endif
                    </form>
                </div>
            </div>

            {{-- Grille --}}
            @if($shops->count() > 0)
            <div class="row row-cols-1 row-cols-lg-4 row-cols-md-3 g-4 g-lg-4">

                @foreach($shops as $shop)
                @php
                    $avg   = round(($shop->average_rating ?? 0) * 2) / 2;
                    $full  = floor($avg);
                    $half  = ($avg - $full) >= 0.5 ? 1 : 0;
                    $empty = 5 - $full - $half;
                @endphp

                <div class="col">
                    <div class="card p-6 card-product h-100">

                        {{-- Logo + bouton favori --}}
                        <div class="d-flex justify-content-between align-items-start">
                            @if($shop->logo_url)
                                <img src="{{ asset('storage/' . $shop->logo_url) }}"
                                     alt="{{ $shop->name }}"
                                     class="rounded-circle icon-shape icon-xl"
                                     style="object-fit:cover;">
                            @else
                                <div class="rounded-circle icon-shape icon-xl bg-light d-flex align-items-center justify-content-center">
                                    <i class="bi bi-shop fs-4 text-muted"></i>
                                </div>
                            @endif

                            {{-- Bouton favori boutique --}}
                            @auth
                            <button type="button"
                                    class="btn-action border-0"
                                    onclick="toggleShopFavorite('{{ $shop->uuid }}', this)"
                                    data-bs-toggle="tooltip" title="Favori">
                                <i class="bi bi-heart"></i>
                            </button>
                            @else
                            <a href="{{ route('login') }}" class="btn-action"
                               data-bs-toggle="tooltip" title="Favori">
                                <i class="bi bi-heart"></i>
                            </a>
                            @endauth
                        </div>

                        <div class="mt-4">

                            {{-- Nom --}}
                            <h2 class="mb-1 h5">
                                <a href="{{ route('store.single', ['uuid' => $shop->uuid]) }}"
                                   class="text-inherit">
                                    {{ $shop->name }}
                                </a>
                            </h2>

                            {{-- Catégorie --}}
                            {{-- Catégories des produits --}}
@php $cats = $shop->getProductCategories()->unique('id'); @endphp

@if($cats->count() > 0)
@php
    $maxVisible = 2;
    $visible    = $cats->take($maxVisible);
    $remaining  = $cats->count() - $maxVisible;
@endphp

@foreach($visible as $cat)
<span class="badge bg-light text-dark border me-1 flex-shrink-0">
    {{ $cat->name }}
</span>
@endforeach

@if($remaining > 0)
<span class="badge bg-light text-muted border flex-shrink-0"
      data-bs-toggle="tooltip"
      title="{{ $cats->skip($maxVisible)->pluck('name')->join(', ') }}">
    +{{ $remaining }}
</span>
@endif
@endif
                            {{-- Description / Slogan --}}
                            @if($shop->description)
                            <div class="py-3">
                                <p class="text-primary m-0 small">
                                    "{{ Str::limit($shop->description, 80) }}"
                                </p>
                            </div>
                            @else
                            <div class="py-3">
                                <ul class="list-unstyled mb-0 small">
                                    @if($shop->location)
                                    <li>
                                        <i class="bi bi-geo-alt me-1 text-muted"></i>
                                        {{ $shop->location }}
                                    </li>
                                    @endif
                                    @if($shop->contact_phone)
                                    <li>
                                        <i class="bi bi-telephone me-1 text-muted"></i>
                                        {{ $shop->contact_phone }}
                                    </li>
                                    @endif
                                </ul>
                            </div>
                            @endif

                            {{-- Nombre de produits --}}
                            <div class="small text-muted mb-2">
                                <i class="bi bi-box-seam me-1"></i>
                                {{ $shop->products_count ?? 0 }} produit(s)
                            </div>

                            {{-- Rating --}}
                            <div class="row justify-content-center">
                                <div class="mt-2">
                                    <small class="text-warning">
                                        @for($i = 0; $i < $full; $i++)<i class="bi bi-star-fill"></i>@endfor
                                        @if($half)<i class="bi bi-star-half"></i>@endif
                                        @for($i = 0; $i < $empty; $i++)<i class="bi bi-star"></i>@endfor
                                    </small>
                                    <span class="ms-2">{{ number_format($shop->average_rating ?? 0, 1) }}</span>
                                    <span class="text-muted ms-1 small">
                                        ({{ number_format($shop->reviews_count ?? 0) }} avis)
                                    </span>
                                </div>
                            </div>

                            {{-- Bouton voir --}}
                            <div class="mt-4">
                                <a href="{{ route('store.single', ['uuid' => $shop->uuid]) }}"
                                   class="btn btn-outline-primary btn-sm w-100">
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
                <div class="col mt-8">
                    {{ $shops->withQueryString()->links('vendor.pagination.custom') }}
                </div>
            </div>
            @endif

            @else
            <div class="text-center py-10">
                <i class="bi bi-shop display-4 text-muted"></i>
                <h4 class="mt-4">Aucune boutique trouvée</h4>
                @if(request('search'))
                <p class="text-muted">Aucun résultat pour "{{ request('search') }}".</p>
                <a href="{{ route('store.grid') }}" class="btn btn-outline-secondary mt-2">
                    Voir toutes les boutiques
                </a>
                @endif
            </div>
            @endif

        </div>
    </section>
</main>

@endsection