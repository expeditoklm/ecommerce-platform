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
                            <li class="breadcrumb-item"><a href="{{ route('store.grid') }}">Boutiques</a></li>
                            <li class="breadcrumb-item active">{{ $category->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="mt-8 mb-lg-14 mb-8">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    {{-- Header catégorie --}}
                    <div class="card mb-4 bg-light border-0">
                        <div class="card-body p-9">
                            <div class="d-flex align-items-center gap-3">
                                @if($category->icon_cat)
                                <i class="{{ $category->icon_cat }} fs-1 text-primary"></i>
                                @endif
                                <div>
                                    <h2 class="mb-0 fs-1">{{ $category->name }}</h2>
                                    @if($category->description)
                                    <p class="mb-0 text-muted mt-1">{{ $category->description }}</p>
                                    @endif
                                </div>
                                <div class="ms-auto">
                                    <span class="badge bg-primary fs-6">
                                        @if($category->section === 'product') Produit
                                        @elseif($category->section === 'service') Service
                                        @else Location
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Catégories similaires --}}
                    @if($relatedCategories->count() > 1)
                    <div class="mb-6 d-flex align-items-center flex-wrap gap-2">
                        <small class="text-muted me-2">Catégories similaires :</small>
                        @foreach($relatedCategories as $related)
                        <a href="{{ route('shop.by-category', ['uuid' => $related->uuid]) }}"
                           class="badge {{ $related->uuid === $category->uuid ? 'bg-primary' : 'bg-light text-dark border' }} text-decoration-none">
                            @if($related->icon_cat)<i class="{{ $related->icon_cat }} me-1"></i>@endif
                            {{ $related->name }}
                        </a>
                        @endforeach
                    </div>
                    @endif

                    {{-- Barre filtres --}}
                    <div class="d-lg-flex justify-content-between align-items-center mb-4">
                        <div>
                            <p class="mb-3 mb-md-0">
                                <span class="text-dark fw-bold">{{ $products->total() }}</span> produit(s) trouvé(s)
                                @if(request('search'))
                                    pour "<strong>{{ request('search') }}</strong>"
                                @endif
                            </p>
                        </div>
                        <div class="d-md-flex gap-2 align-items-center">

                            {{-- Recherche --}}
                            <form action="{{ route('shop.by-category', ['uuid' => $category->uuid]) }}"
                                  method="GET" class="d-flex gap-2" id="filterForm">
                                <input type="search" class="form-control form-control-sm"
                                       name="search" value="{{ request('search') }}"
                                       placeholder="Rechercher dans {{ $category->name }}...">

                                {{-- Tri --}}
                                <select class="form-select form-select-sm" name="sort"
                                        onchange="document.getElementById('filterForm').submit()">
                                    <option value=""       {{ !request('sort') ? 'selected' : '' }}>Plus récents</option>
                                    <option value="price_asc"  {{ request('sort') === 'price_asc'  ? 'selected' : '' }}>Prix croissant</option>
                                    <option value="price_desc" {{ request('sort') === 'price_desc' ? 'selected' : '' }}>Prix décroissant</option>
                                    <option value="rating"     {{ request('sort') === 'rating'     ? 'selected' : '' }}>Mieux notés</option>
                                    <option value="popular"    {{ request('sort') === 'popular'    ? 'selected' : '' }}>Populaires</option>
                                </select>

                                {{-- Nb par page --}}
                                <select class="form-select form-select-sm" name="per_page"
                                        onchange="document.getElementById('filterForm').submit()">
                                    <option value="16" {{ request('per_page', 16) == 16 ? 'selected' : '' }}>16</option>
                                    <option value="32" {{ request('per_page') == 32 ? 'selected' : '' }}>32</option>
                                    <option value="48" {{ request('per_page') == 48 ? 'selected' : '' }}>48</option>
                                </select>

                                <button class="btn btn-primary btn-sm" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                                @if(request('search'))
                                <a href="{{ route('shop.by-category', ['uuid' => $category->uuid]) }}"
                                   class="btn btn-outline-secondary btn-sm">
                                    <i class="bi bi-x"></i>
                                </a>
                                @endif
                            </form>

                        </div>
                    </div>

                    {{-- Grille produits --}}
                    @if($products->count() > 0)
                    <div class="row g-4 row-cols-lg-5 row-cols-2 row-cols-md-3 mt-2">

                        @foreach($products as $product)
                        @php
                            $avgRating = round(($product->reviews_avg_rating ?? 0) * 2) / 2;
                            $fullStars = floor($avgRating);
                            $halfStar  = ($avgRating - $fullStars) >= 0.5 ? 1 : 0;
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
                                                     style="height:160px; object-fit:cover;">
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
                                               class="btn-action"
                                               data-bs-toggle="tooltip" title="Voir le produit">
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

                                    {{-- Catégorie --}}
                                    <div class="text-small mb-1">
                                        <a href="{{ route('shop.by-category', ['uuid' => $category->uuid]) }}"
                                           class="text-decoration-none text-muted">
                                            <small>{{ $category->name }}</small>
                                        </a>
                                    </div>

                                    {{-- Nom produit --}}
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
                        <i class="bi bi-box-seam display-4 text-muted"></i>
                        <h4 class="mt-4">Aucun produit trouvé</h4>
                        <p class="text-muted">
                            @if(request('search'))
                                Aucun résultat pour "{{ request('search') }}" dans {{ $category->name }}.
                            @else
                                Aucun produit dans cette catégorie pour le moment.
                            @endif
                        </p>
                        @if(request('search'))
                        <a href="{{ route('shop.by-category', ['uuid' => $category->uuid]) }}"
                           class="btn btn-outline-secondary mt-2">
                            <i class="bi bi-arrow-left me-2"></i>Voir tous les produits
                        </a>
                        @endif
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </section>
</main>

@endsection