@extends('base')
@section('content')

<main>
    <div class="mt-4">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Accueil</a></li>
                    <li class="breadcrumb-item active">Résultats de recherche</li>
                </ol>
            </nav>
        </div>
    </div>

    <section class="mt-8 mb-lg-14 mb-8">
        <div class="container">

            {{-- Header --}}
            <div class="card mb-6 bg-light border-0">
                <div class="card-body p-9">
                    <div class="d-flex align-items-center gap-3">
                        <i class="bi bi-search fs-1 text-primary"></i>
                        <div>
                            <h2 class="mb-0 fs-1">
                                Résultats pour "<span class="text-primary">{{ $q }}</span>"
                            </h2>
                            <p class="mb-0 text-muted mt-1">
                                {{ $products->total() }} produit(s)
                                @if($shops->count() > 0)
                                    · {{ $shops->count() }} boutique(s)
                                @endif
                                trouvé(s)
                                @if(session('selected_city'))
                                    <span class="badge bg-success ms-2">
                                        <i class="bi bi-geo-alt me-1"></i>{{ session('selected_city') }}
                                        @if(session('selected_district'))
                                            – {{ session('selected_district') }}
                                        @endif
                                    </span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Boutiques correspondantes --}}
            @if($shops->count() > 0)
            <div class="mb-8">
                <h5 class="mb-4 border-bottom pb-2">
                    <i class="bi bi-shop me-2 text-primary"></i>Boutiques
                </h5>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3">
                    @foreach($shops as $shop)
                    <div class="col">
                        <a href="{{ route('store.single', ['uuid' => $shop->uuid]) }}"
                           class="card card-product text-decoration-none h-100 p-4 d-flex flex-row align-items-center gap-3">
                            @if($shop->logo_url)
                                <img src="{{ asset('storage/' . $shop->logo_url) }}"
                                     class="rounded-circle" style="width:48px;height:48px;object-fit:cover;">
                            @else
                                <div class="rounded-circle bg-light d-flex align-items-center justify-content-center flex-shrink-0"
                                     style="width:48px;height:48px;">
                                    <i class="bi bi-shop text-muted"></i>
                                </div>
                            @endif
                            <div class="overflow-hidden">
                                <div class="fw-bold text-dark text-truncate">{{ $shop->name }}</div>
                                @if($shop->mainCategory)
                                <small class="text-muted">{{ $shop->mainCategory->name }}</small>
                                @endif
                                <div class="small text-warning mt-1">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="bi bi-star{{ $i <= round($shop->average_rating ?? 0) ? '-fill' : '' }}"></i>
                                    @endfor
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            {{-- Barre filtres produits --}}
            <div class="d-lg-flex justify-content-between align-items-center mb-4">
                <h5 class="mb-3 mb-lg-0 border-bottom pb-2 w-100">
                    <i class="bi bi-box-seam me-2 text-primary"></i>
                    Produits
                    <span class="text-muted fs-6 ms-2">({{ $products->total() }})</span>
                </h5>
            </div>

            <div class="d-flex justify-content-end align-items-center gap-2 mb-4">
    <form action="{{ route('search') }}" method="GET"
          class="d-flex align-items-center gap-2" id="searchFilterForm">
        <input type="hidden" name="q" value="{{ $q }}">

        <small class="text-muted text-nowrap">Filtrer :</small>

        <select class="form-select form-select-sm" name="section" style="width:auto"
                onchange="document.getElementById('searchFilterForm').submit()">
            <option value="">Tous types</option>
            <option value="product"  {{ request('section') === 'product'  ? 'selected' : '' }}>Produits</option>
            <option value="service"  {{ request('section') === 'service'  ? 'selected' : '' }}>Services</option>
            <option value="rental"   {{ request('section') === 'rental'   ? 'selected' : '' }}>Locations</option>
        </select>

        <select class="form-select form-select-sm" name="sort" style="width:auto"
                onchange="document.getElementById('searchFilterForm').submit()">
            <option value=""           {{ !request('sort') ? 'selected' : '' }}>Plus récents</option>
            <option value="price_asc"  {{ request('sort') === 'price_asc'  ? 'selected' : '' }}>Prix croissant</option>
            <option value="price_desc" {{ request('sort') === 'price_desc' ? 'selected' : '' }}>Prix décroissant</option>
            <option value="rating"     {{ request('sort') === 'rating'     ? 'selected' : '' }}>Mieux notés</option>
        </select>

        <select class="form-select form-select-sm" name="per_page" style="width:auto"
                onchange="document.getElementById('searchFilterForm').submit()">
            <option value="20" {{ request('per_page', 20) == 20 ? 'selected' : '' }}>20 / page</option>
            <option value="40" {{ request('per_page') == 40 ? 'selected' : '' }}>40 / page</option>
        </select>

    </form>
</div>

            {{-- Grille produits --}}
            @if($products->count() > 0)
            <div class="row g-4 row-cols-lg-5 row-cols-2 row-cols-md-3">

                @foreach($products as $product)
                @php
                    $avgRating  = round(($product->reviews_avg_rating ?? 0) * 2) / 2;
                    $fullStars  = floor($avgRating);
                    $halfStar   = ($avgRating - $fullStars) >= 0.5 ? 1 : 0;
                    $emptyStars = 5 - $fullStars - $halfStar;
                @endphp

                <div class="col">
                    <div class="card card-product h-100">
                        <div class="card-body">
                            <div class="text-center position-relative">

                                {{-- Badge promo --}}
                                @if($product->is_on_sale && $product->sale_price)
                                <div class="position-absolute top-0 start-0">
                                    <span class="badge bg-danger">
                                        -{{ round((($product->price - $product->sale_price) / $product->price) * 100) }}%
                                    </span>
                                </div>
                                @endif

                                {{-- Badge section --}}
                                @if($product->section->value !== 'product')
                                <div class="position-absolute top-0 end-0">
                                    <span class="badge {{ $product->section->value === 'service' ? 'bg-info' : 'bg-warning text-dark' }}">
                                        {{ $product->section->value === 'service' ? 'Service' : 'Location' }}
                                    </span>
                                </div>
                                @endif

                                {{-- Image --}}
                                <a href="{{ route('shop.single', ['uuid' => $product->uuid]) }}">
                                    @if($product->images->count() > 0)
                                        <img src="{{ asset($product->images->first()->url) }}"
                                             alt="{{ $product->name }}"
                                             class="mb-3 img-fluid"
                                             style="height:160px;object-fit:cover;">
                                    @else
                                        <div class="mb-3 bg-light d-flex align-items-center justify-content-center"
                                             style="height:160px;">
                                            <i class="bi bi-image fs-1 text-muted"></i>
                                        </div>
                                    @endif
                                </a>

                                {{-- Actions --}}
                                <div class="card-product-action">
                                    <a href="{{ route('shop.single', ['uuid' => $product->uuid]) }}"
                                       class="btn-action" data-bs-toggle="tooltip" title="Voir">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    @auth
                                    <button type="button" class="btn-action border-0"
                                            onclick="toggleWishlist('{{ $product->uuid }}', this)"
                                            data-bs-toggle="tooltip" title="Wishlist">
                                        <i class="bi bi-heart{{ in_array($product->id, $wishlistedIds ?? []) ? '-fill text-danger' : '' }}"></i>
                                    </button>
                                    @else
                                    <a href="{{ route('login') }}" class="btn-action"
                                       data-bs-toggle="tooltip" title="Wishlist">
                                        <i class="bi bi-heart"></i>
                                    </a>
                                    @endauth
                                </div>
                            </div>

                            {{-- Catégories --}}
                            @if($product->categories->count() > 0)
                            <div class="text-small mb-1">
                                <small class="text-muted">{{ $product->categories->first()->name }}</small>
                            </div>
                            @endif

                            {{-- Nom --}}
                            <h2 class="fs-6 mb-1">
                                <a href="{{ route('shop.single', ['uuid' => $product->uuid]) }}"
                                   class="text-inherit text-decoration-none">
                                    {{ $product->name }}
                                </a>
                            </h2>

                            {{-- Boutique --}}
                            @if($product->shop)
                            <div class="small mb-1">
                                <a href="{{ route('store.single', ['uuid' => $product->shop->uuid]) }}"
                                   class="text-decoration-none text-success">
                                    <i class="bi bi-shop me-1"></i>{{ $product->shop->name }}
                                </a>
                            </div>
                            @endif

                            {{-- Étoiles --}}
                            <div class="mb-1">
                                <small class="text-warning">
                                    @for($i = 0; $i < $fullStars; $i++)<i class="bi bi-star-fill"></i>@endfor
                                    @if($halfStar)<i class="bi bi-star-half"></i>@endif
                                    @for($i = 0; $i < $emptyStars; $i++)<i class="bi bi-star"></i>@endfor
                                </small>
                                <span class="text-muted small ms-1">
                                    {{ number_format($product->reviews_avg_rating ?? 0, 1) }}
                                    ({{ $product->reviews_count ?? 0 }})
                                </span>
                            </div>

                            {{-- Prix + bouton --}}
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div>
                                    @if($product->is_on_sale && $product->sale_price)
                                        <span class="text-danger fw-bold">
                                            {{ number_format($product->sale_price, 0, ',', ' ') }} FCFA
                                        </span>
                                        <br>
                                        <small class="text-decoration-line-through text-muted">
                                            {{ number_format($product->price, 0, ',', ' ') }}
                                        </small>
                                    @else
                                        <span class="text-dark fw-bold">
                                            {{ number_format($product->price, 0, ',', ' ') }} FCFA
                                        </span>
                                    @endif
                                </div>
                                <div>
                                    @if($product->section->value === 'service')
                                        <a href="{{ route('shop.single', ['uuid' => $product->uuid]) }}"
                                           class="btn btn-primary btn-sm">
                                            <i class="bi bi-arrow-right me-1"></i>Voir
                                        </a>
                                    @elseif($product->section->value === 'rental')
                                        <a href="{{ route('shop.single', ['uuid' => $product->uuid]) }}"
                                           class="btn btn-primary btn-sm">
                                            <i class="bi bi-calendar-check me-1"></i>Louer
                                        </a>
                                    @else
                                        @php
                                            $dp = ($product->is_on_sale && $product->sale_price)
                                                ? number_format($product->sale_price, 0, ',', ' ')
                                                : number_format($product->price, 0, ',', ' ');
                                            $di = $product->images->count()
                                                ? asset($product->images->first()->url)
                                                : asset('assets/images/products/product-img-1.jpg');
                                        @endphp
                                        <button type="button" class="btn btn-primary btn-sm"
                                            onclick="addToWaitlist({
                                                uuid:  '{{ $product->uuid }}',
                                                name:  '{{ addslashes($product->name) }}',
                                                shop:  '{{ $product->shop ? addslashes($product->shop->name) : "" }}',
                                                price: '{{ $dp }} FCFA',
                                                image: '{{ $di }}',
                                                url:   '{{ route("shop.single", ["uuid" => $product->uuid]) }}'
                                            })">
                                            <i class="bi bi-plus me-1"></i>Ajouter
                                        </button>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            {{-- Pagination --}}
            @if($products->hasPages())
            <div class="row mt-8">
                <div class="col">
                    {{ $products->appends(request()->query())->links('vendor.pagination.custom') }}
                </div>
            </div>
            @endif

            @else
            <div class="text-center py-10">
                <i class="bi bi-search display-4 text-muted"></i>
                <h4 class="mt-4">Aucun produit trouvé</h4>
                <p class="text-muted">
                    Aucun résultat pour "<strong>{{ $q }}</strong>".
                    @if(session('selected_city'))
                        Essayez sans le filtre de ville.
                    @endif
                </p>
                <div class="d-flex justify-content-center gap-2 mt-3">
                    @if(session('selected_city'))
                    <a href="{{ route('location.clear') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-geo-alt me-1"></i>Supprimer le filtre ville
                    </a>
                    @endif
                    <a href="{{ route('store.grid') }}" class="btn btn-outline-primary">
                        Voir toutes les boutiques
                    </a>
                </div>
            </div>
            @endif

        </div>
    </section>
</main>

@endsection