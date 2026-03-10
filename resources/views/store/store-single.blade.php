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
              <li class="breadcrumb-item"><a href="{{ route('store') }}">Boutiques</a></li>
              <li class="breadcrumb-item active">{{ $shop->name }}</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>

  <section class="mb-lg-14 mb-8 mt-8">
    <div class="container">
      <div class="row">

        {{-- Sidebar --}}
        @include('store.partials.sidebar')

        {{-- Contenu principal --}}
        <div class="col-12 col-lg-9 col-md-8">

          {{-- Bannière boutique --}}
          <div class="mb-8 bg-light d-lg-flex justify-content-lg-between rounded">
            <div class="align-self-center p-8">
              <div class="mb-3">
                <h5 class="mb-0 fw-bold">{{ $shop->name }}</h5>
                <p class="mb-0 text-muted">
                  {{ $shop->description ? Str::limit($shop->description, 80) : 'Trouvez tout ce que vous cherchez ici...' }}
                </p>
              </div>
              <form action="{{ route('store.single', ['uuid' => $shop->uuid]) }}" method="GET">
                <div class="position-relative">
                  <input type="search" class="form-control"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Rechercher dans {{ $shop->name }}">
                  <button type="submit" class="position-absolute end-0 top-0 mt-2 me-3 btn btn-link p-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                      fill="none" stroke="currentColor" stroke-width="2"
                      stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                      <circle cx="11" cy="11" r="8"></circle>
                      <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                  </button>
                </div>
              </form>
            </div>
            <div class="py-4">
              <img src="{{ asset('assets/images/svg-graphics/store-graphics.svg') }}"
                alt="" class="img-fluid">
            </div>
          </div>

          {{-- Filtres et compteur --}}
          <div class="d-md-flex justify-content-between mb-3 align-items-center">
            <div>
              <p class="mb-3 mb-md-0">
                <strong>{{ $products->total() }}</strong> produit(s) trouvé(s)
                @if(request('category'))
                dans <strong>{{ $shopCategories->firstWhere('id', request('category'))?->name }}</strong>
                @endif
                @if(request('search'))
                pour "<strong>{{ request('search') }}</strong>"
                @endif
              </p>
            </div>
            <div class="d-flex gap-2 align-items-center">
              {{-- Filtre section --}}
              <form action="{{ route('store.single', ['uuid' => $shop->uuid]) }}"
                method="GET" id="filterForm" class="d-flex gap-2">
                @if(request('search'))
                <input type="hidden" name="search" value="{{ request('search') }}">
                @endif
                <select class="form-select form-select-sm"
                  name="section"
                  onchange="document.getElementById('filterForm').submit()">
                  <option value="">Tous</option>
                  <option value="product" {{ request('section') == 'product'  ? 'selected' : '' }}>Produits</option>
                  <option value="service" {{ request('section') == 'service'  ? 'selected' : '' }}>Services</option>
                  <option value="rental" {{ request('section') == 'rental'   ? 'selected' : '' }}>Locations</option>
                </select>
                <select class="form-select form-select-sm"
                  name="per_page"
                  onchange="document.getElementById('filterForm').submit()">
                  <option value="12" {{ request('per_page', 12) == 12 ? 'selected' : '' }}>12</option>
                  <option value="24" {{ request('per_page') == 24 ? 'selected' : '' }}>24</option>
                  <option value="48" {{ request('per_page') == 48 ? 'selected' : '' }}>48</option>
                </select>
              </form>
            </div>
          </div>

          {{-- Flash messages --}}
          @if(session('success'))
          <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
          @endif

          {{-- Grille produits --}}
          @if($products->count() > 0)
          <div class="row g-4 row-cols-xl-4 row-cols-lg-3 row-cols-2 row-cols-md-2 mt-2">

            @foreach($products as $product)
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
                    <div class="position-absolute top-0 end-0">
                      @if($product->section->value === 'service')
                      <span class="badge bg-info">Service</span>
                      @elseif($product->section->value === 'rental')
                      <span class="badge bg-warning text-dark">Location</span>
                      @endif
                    </div>

                    {{-- Image --}}
                    <a href="{{ route('shop.single', ['uuid' => $product->uuid]) }}">
                      @if($product->images->count() > 0)
                      <img src="{{ asset($product->images->first()->url) }}"
                        alt="{{ $product->name }}"
                        class="mb-3 img-fluid"
                        style="height:180px; object-fit:cover;">
                      @else
                      <div class="mb-3 bg-light d-flex align-items-center justify-content-center"
                        style="height:180px;">
                        <i class="bi bi-image fs-1 text-muted"></i>
                      </div>
                      @endif
                    </a>

                    {{-- Actions rapides --}}
                    <div class="card-product-action">
                      <a href="{{ route('shop.single', ['uuid' => $product->uuid]) }}"
                        class="btn-action"
                        data-bs-toggle="tooltip" title="Voir le produit">
                        <i class="bi bi-eye"></i>
                      </a>
                   @auth
<button type="button"
        class="btn-action border-0 bg-transparent p-1"
        onclick="toggleWishlist('{{ $product->uuid }}', this)"
        title="Wishlist">
    <i class="bi bi-heart{{ in_array($product->id, $wishlistedIds ?? []) ? '-fill text-danger' : '' }}"></i>
</button>
@else
<a href="{{ route('login') }}" class="btn-action" title="Wishlist">
    <i class="bi bi-heart"></i>
</a>
@endauth
                    </div>
                  </div>

                  {{-- Nom boutique --}}
                  <div class="text-small mb-1">
                    <a href="{{ route('store.single', ['uuid' => $shop->uuid]) }}"
                      class="text-decoration-none text-success fw-semibold small">
                      <i class="bi bi-shop me-1"></i>{{ $shop->name }}
                    </a>
                  </div>

                  {{-- Catégorie --}}
                  @if($product->categories->count() > 0)
                  <div class="text-small mb-1">
                    <a href="{{ route('store.single', ['uuid' => $shop->uuid, 'category' => $product->categories->first()->id]) }}"
                      class="text-decoration-none text-muted">
                      <small>{{ $product->categories->first()->name }}</small>
                    </a>
                  </div>
                  @endif

                  {{-- Nom produit --}}
                  <h2 class="fs-6 mb-1">
                    <a href="{{ route('shop.single', ['uuid' => $product->uuid]) }}"
                      class="text-inherit text-decoration-none text-dark fw-semibold">
                      {{ $product->name }}
                    </a>
                  </h2>

                  {{-- Étoiles + note --}}
                  {{-- Étoiles + note --}}
                  <div class="mb-2">
                    <small class="text-warning">
                      @for($i = 1; $i <= 5; $i++)
                        <i class="bi bi-star{{ $i <= round($product->reviews_avg_rating ?? 0) ? '-fill' : '' }} text-warning"></i>
                        @endfor
                    </small>
                    <span class="text-muted small ms-1">
                      {{ number_format($product->reviews_avg_rating ?? 0, 1) }}
                      ({{ $product->reviews_count ?? 0 }})
                    </span>
                  </div>

                  {{-- Prix --}}
                  <div class="d-flex justify-content-between align-items-center mt-3">
                    <div>
                      @if($product->is_on_sale && $product->sale_price)
                      <span class="text-danger fw-bold">
                        {{ number_format($product->sale_price, 0, ',', ' ') }} FCFA
                      </span>
                      <span class="text-decoration-line-through text-muted ms-1 small">
                        {{ number_format($product->price, 0, ',', ' ') }}
                      </span>
                      @else
                      <span class="text-dark fw-bold">
                        {{ number_format($product->price, 0, ',', ' ') }} FCFA
                      </span>
                      @endif

                      @if($product->section->value === 'rental' && $product->price_7days)
                      <div class="text-muted small">
                        <i class="bi bi-calendar3 me-1"></i>
                        {{ number_format($product->price_7days, 0, ',', ' ') }} / 7j
                      </div>
                      @endif
                    </div>

                    {{-- Boutons action + wishlist SÉPARÉS --}}
                    <div class="d-flex align-items-center gap-2">

                      {{-- Wishlist — EN DEHORS du <a> --}}
                      <button type="button"
                        class="btn-action border-0 bg-transparent p-1"
                        onclick="toggleWishlist('{{ $product->uuid }}', this)"
                        title="Wishlist">
                        <i class="bi bi-heart{{ in_array($product->id, $wishlistedIds ?? []) ? '-fill text-danger' : '' }}"></i>
                      </button>

                      {{-- Bouton principal --}}
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
                      $displayPrice = ($product->is_on_sale && $product->sale_price)
                      ? number_format($product->sale_price, 0, ',', ' ')
                      : number_format($product->price, 0, ',', ' ');
                      $displayImage = $product->images->count()
                      ? asset($product->images->first()->url)
                      : asset('assets/images/products/product-img-1.jpg');
                      $displayUrl = route('shop.single', ['uuid' => $product->uuid]);
                      @endphp

                      <button type="button" class="btn btn-primary btn-sm"
                        onclick="addToWaitlist({
        uuid:  '{{ $product->uuid }}',
        name:  '{{ addslashes($product->name) }}',
        shop:  '{{ addslashes($shop->name) }}',
        price: '{{ $displayPrice }} FCFA',
        image: '{{ $displayImage }}',
        url:   '{{ $displayUrl }}'
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
              {{ $products->withQueryString()->links('vendor.pagination.custom') }}
            </div>
          </div>
          @endif

          @else
          {{-- Aucun produit --}}
          <div class="text-center py-8 mt-4">
            <i class="bi bi-box-seam display-4 text-muted"></i>
            <h5 class="mt-4">Aucun produit trouvé</h5>
            <p class="text-muted">
              @if(request('search'))
              Aucun résultat pour "{{ request('search') }}".
              @else
              Cette boutique n'a pas encore de produits.
              @endif
            </p>
            @if(request('search') || request('category') || request('section'))
            <a href="{{ route('store.single', ['uuid' => $shop->uuid]) }}"
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