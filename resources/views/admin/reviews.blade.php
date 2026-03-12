@extends('admin/base')
@section('contenue')

<main class="main-content-wrapper">
    <div class="container">

        {{-- Header --}}
        <div class="row mb-8">
            <div class="col-md-12">
                <div class="d-md-flex justify-content-between align-items-center">
                    <div>
                        <h2>Avis clients</h2>
                        <p class="text-muted mb-0">
                            Avis reçus sur vos produits, services et locations
                        </p>
                    </div>
                    <div class="d-flex gap-3 mt-3 mt-md-0">
                        {{-- Moyenne globale --}}
                        <div class="text-center">
                            <div class="fs-4 fw-bold text-warning">
                                {{ number_format($averageRating, 1) }}
                                <i class="bi bi-star-fill fs-5"></i>
                            </div>
                            <small class="text-muted">{{ $totalReviews }} avis</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-12 mb-5">
                <div class="card h-100 card-lg">

                    {{-- Filtres --}}
                    <div class="p-6">
                        <form action="{{ route('admin.reviews') }}" method="GET"
                              class="row g-3 align-items-end" id="reviewFilterForm">

                            <div class="col-md-4 col-12">
                                <input class="form-control" type="search" name="search"
                                       value="{{ request('search') }}"
                                       placeholder="Rechercher dans les avis...">
                            </div>

                            <div class="col-md-2 col-6">
                                <select class="form-select" name="rating"
                                        onchange="document.getElementById('reviewFilterForm').submit()">
                                    <option value="">Toutes notes</option>
                                    @for($i = 5; $i >= 1; $i--)
                                    <option value="{{ $i }}" {{ request('rating') == $i ? 'selected' : '' }}>
                                        {{ $i }} étoile{{ $i > 1 ? 's' : '' }}
                                    </option>
                                    @endfor
                                </select>
                            </div>

                            <div class="col-md-2 col-6">
                                <select class="form-select" name="section"
                                        onchange="document.getElementById('reviewFilterForm').submit()">
                                    <option value="">Tous types</option>
                                    <option value="product" {{ request('section') === 'product' ? 'selected' : '' }}>Produits</option>
                                    <option value="service" {{ request('section') === 'service' ? 'selected' : '' }}>Services</option>
                                    <option value="rental"  {{ request('section') === 'rental'  ? 'selected' : '' }}>Locations</option>
                                    <option value="shop"    {{ request('section') === 'shop'    ? 'selected' : '' }}>Boutique</option>
                                </select>
                            </div>

                            <div class="col-md-2 col-6">
                                <select class="form-select" name="sort"
                                        onchange="document.getElementById('reviewFilterForm').submit()">
                                    <option value=""         {{ !request('sort') ? 'selected' : '' }}>Plus récents</option>
                                    <option value="rating_desc" {{ request('sort') === 'rating_desc' ? 'selected' : '' }}>Mieux notés</option>
                                    <option value="rating_asc"  {{ request('sort') === 'rating_asc'  ? 'selected' : '' }}>Moins notés</option>
                                    <option value="likes"       {{ request('sort') === 'likes'       ? 'selected' : '' }}>Plus utiles</option>
                                </select>
                            </div>

                            <div class="col-md-1 col-6">
                                <button class="btn btn-primary w-100" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>

                            @if(request()->hasAny(['search', 'rating', 'section', 'sort']))
                            <div class="col-md-1 col-6">
                                <a href="{{ route('admin.reviews') }}"
                                   class="btn btn-outline-secondary w-100">
                                    <i class="bi bi-x"></i>
                                </a>
                            </div>
                            @endif

                        </form>
                    </div>

                    {{-- Tableau --}}
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-centered table-hover table-borderless mb-0 text-nowrap">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Client</th>
                                        <th>Produit / Boutique</th>
                                        <th>Type</th>
                                        <th>Avis</th>
                                        <th>Note</th>
                                        <th>Utile</th>
                                        <th>Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                @forelse($reviews as $review)
                                @php
                                    $fullStars  = floor($review->rating);
                                    $emptyStars = 5 - $fullStars;

                                    // Type badge
                                    if ($review->shop_id && !$review->product_id) {
                                        $typeBadge = ['bg-dark', 'Boutique'];
                                    } elseif ($review->product && $review->product->section->value === 'service') {
                                        $typeBadge = ['bg-info', 'Service'];
                                    } elseif ($review->product && $review->product->section->value === 'rental') {
                                        $typeBadge = ['bg-warning text-dark', 'Location'];
                                    } else {
                                        $typeBadge = ['bg-primary', 'Produit'];
                                    }
                                @endphp
                                <tr>

                                    {{-- Client --}}
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if($review->user?->avatar_url)
                                                <img src="{{ asset('storage/' . $review->user->avatar_url) }}"
                                                     alt="{{ $review->user->name }}"
                                                     class="avatar avatar-xs rounded-circle">
                                            @else
                                                <div class="avatar avatar-xs rounded-circle bg-light
                                                            d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-person text-muted small"></i>
                                                </div>
                                            @endif
                                            <div class="ms-2">
                                                <span class="fw-medium">
                                                    {{ $review->user?->name ?? 'Anonyme' }}
                                                </span>
                                                @if($review->title)
                                                <br>
                                                <small class="text-muted">{{ $review->title }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    </td>

                                    {{-- Produit ou Boutique --}}
                                    <td>
                                        @if($review->product)
                                            <a href="{{ route('shop.single', ['uuid' => $review->product->uuid]) }}"
                                               class="text-inherit text-decoration-none">
                                                {{ Str::limit($review->product->name, 30) }}
                                            </a>
                                        @elseif($review->shop)
                                            <a href="{{ route('store.single', ['uuid' => $review->shop->uuid]) }}"
                                               class="text-inherit text-decoration-none">
                                                {{ $review->shop->name }}
                                            </a>
                                        @else
                                            <span class="text-muted">—</span>
                                        @endif
                                    </td>

                                    {{-- Type --}}
                                    <td>
                                        <span class="badge {{ $typeBadge[0] }}">
                                            {{ $typeBadge[1] }}
                                        </span>
                                    </td>

                                    {{-- Commentaire --}}
                                    <td style="max-width: 250px; white-space: normal;">
                                        <span class="text-muted small">
                                            {{ Str::limit($review->comment, 80) }}
                                        </span>
                                    </td>

                                    {{-- Étoiles --}}
                                    <td>
                                        <div class="d-flex align-items-center gap-1">
                                            @for($i = 0; $i < $fullStars; $i++)
                                                <i class="bi bi-star-fill text-warning"></i>
                                            @endfor
                                            @for($i = 0; $i < $emptyStars; $i++)
                                                <i class="bi bi-star text-warning"></i>
                                            @endfor
                                            <span class="text-muted small ms-1">{{ $review->rating }}/5</span>
                                        </div>
                                    </td>

                                    {{-- Likes --}}
                                    <td>
                                        <span class="badge bg-light text-dark border">
                                            <i class="bi bi-hand-thumbs-up me-1"></i>
                                            {{ $review->likes_count ?? 0 }}
                                        </span>
                                    </td>

                                    {{-- Date --}}
                                    <td>
                                        <span class="text-muted small">
                                            {{ \Carbon\Carbon::parse($review->created_at)->format('d M Y') }}
                                        </span>
                                        <br>
                                        <small class="text-muted">
                                            {{ \Carbon\Carbon::parse($review->created_at)->diffForHumans() }}
                                        </small>
                                    </td>

                                    {{-- Actions --}}
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" class="text-reset"
                                               data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="feather-icon icon-more-vertical fs-5"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <form action="{{ route('admin.review-delete', ['uuid' => $review->uuid]) }}"
                                                          method="POST"
                                                          onsubmit="return confirm('Supprimer cet avis ?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item text-danger">
                                                            <i class="bi bi-trash me-3"></i>Supprimer
                                                        </button>
                                                    </form>
                                                </li>
                                                @if($review->product)
                                                <li>
                                                    <a class="dropdown-item"
                                                       href="{{ route('shop.single', ['uuid' => $review->product->uuid]) }}">
                                                        <i class="bi bi-eye me-3"></i>Voir le produit
                                                    </a>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </td>

                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center py-8">
                                        <i class="bi bi-chat-square-text display-4 text-muted d-block mb-3"></i>
                                        <p class="text-muted mb-0">Aucun avis trouvé</p>
                                        @if(request()->hasAny(['search', 'rating', 'section']))
                                        <a href="{{ route('admin.reviews') }}"
                                           class="btn btn-outline-secondary btn-sm mt-3">
                                            Voir tous les avis
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforelse

                                </tbody>
                            </table>
                        </div>

                        {{-- Pagination --}}
                        <div class="border-top d-md-flex justify-content-between align-items-center p-6">
                            <span class="text-muted small">
                                @if($reviews->total() > 0)
                                    Affichage {{ $reviews->firstItem() }}–{{ $reviews->lastItem() }}
                                    sur {{ $reviews->total() }} avis
                                @else
                                    Aucun avis
                                @endif
                            </span>
                            <nav class="mt-2 mt-md-0">
                                {{ $reviews->appends(request()->query())->links('vendor.pagination.custom') }}
                            </nav>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

@endsection