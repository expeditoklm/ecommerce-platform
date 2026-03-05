@php
use App\Enums\ExchangeStatus;
use App\Enums\ProductCondition;
@endphp

@section('css')
<style>
    .report-option {
        cursor: pointer;
        transition: all 0.2s;
    }

    .report-option:hover {
        background-color: #fff5f5;
        border-color: #dc3545 !important;
    }

    .report-option:has(input:checked) {
        background-color: #fff5f5;
        border-color: #dc3545 !important;
    }

    .report-option input:checked+label {
        color: #dc3545;
        font-weight: 600;
    }
</style>


@endsection


@extends('base')
@section('content')

<main>
    <div class="mt-4">
        <div class="container">
            <!-- row -->
            <div class="row ">
                <!-- col -->
                <div class="col-12">

                </div>
            </div>
        </div>
    </div>
    <section class="mt-8">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <!-- img slide -->
                    <div class="product" id="product">
                        <div class="zoom" onmousemove="zoom(event)"
                            style="background-image: url({{ asset('assets/images/products/product-single-img-1.jpg') }})">
                            <img src="{{ asset('assets/images/products/product-single-img-1.jpg') }}" alt="">
                        </div>
                        <div>
                            <div class="zoom" onmousemove="zoom(event)"
                                style="background-image: url({{ asset('assets/images/products/product-single-img-2.jpg') }})">
                                <img src="{{ asset('assets/images/products/product-single-img-2.jpg') }}" alt="">
                            </div>
                        </div>
                        <div>
                            <div class="zoom" onmousemove="zoom(event)"
                                style="background-image: url({{ asset('assets/images/products/product-single-img-3.jpg') }})">
                                <img src="{{ asset('assets/images/products/product-single-img-3.jpg') }}" alt="">
                            </div>
                        </div>
                        <div>
                            <div class="zoom" onmousemove="zoom(event)"
                                style="background-image: url({{ asset('assets/images/products/product-single-img-4.jpg') }})">
                                <img src="{{ asset('assets/images/products/product-single-img-4.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- product tools -->
                    <div class="product-tools">
                        <div class="thumbnails row g-3" id="productThumbnails">
                            <div class="col-3">
                                <div class="thumbnails-img">
                                    <img src="{{ asset('assets/images/products/product-single-img-1.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="thumbnails-img">
                                    <img src="{{ asset('assets/images/products/product-single-img-2.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="thumbnails-img">
                                    <img src="{{ asset('assets/images/products/product-single-img-3.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="thumbnails-img">
                                    <img src="{{ asset('assets/images/products/product-single-img-4.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="ps-lg-10 mt-6 mt-md-0">
                        <!-- content -->
                        <a href="#!" class="mb-4 d-block">{{ $product->categories[0]->name ?? 'N/A' }}</a>
                        <!-- heading -->
                        <h1 class="mb-1">{{ $product->name }}</h1>

                        <!-- hr -->
                        <hr class="my-6">
                        <div class="fs-4">
                            <a href="{{ route('store.single') }}"> <span class="text-secondary">{{ $product->shop->name ?? 'N/A' }}</span></a>
                        </div>
                        <div class="mb-4">
                            <small class="text-warning">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i></small><a href="#" class="ms-2">(30 reviews)</a>
                        </div>
                        <div class="mt-3 row justify-content-start g-2 align-items-center">
                            <div class="col-xxl-4 col-lg-4 col-md-5 col-5 d-grid">
                                <button type="button" class="btn btn-primary"><i class="feather-icon icon-shopping-bag me-2"></i>Add to cart</button>
                            </div>
                            <div class="col-md-4 col-4">
                                <a class="btn btn-light " href="#" data-bs-toggle="tooltip" data-bs-html="true" aria-label="Compare"><i class="bi bi-arrow-left-right"></i></a>
                            </div>
                        </div>
                        <!-- hr -->
                        <hr class="my-6">
                        <div>
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <td>Product Code:</td>
                                        <td>{{ $product->code ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Date de mise en ligne:</td>
                                        <td>
                                            {{ $product->online_date
    ? \Carbon\Carbon::parse($product->online_date)->locale('fr')->translatedFormat('d F Y')
    : 'N/A'
}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Statut:</td>
                                        <td>
                                            @php
                                            $statusColor = match($product->exchange_status) {
                                            ExchangeStatus::EnEchange => 'success',
                                            ExchangeStatus::EchangeTermine => 'secondary',
                                            ExchangeStatus::Indisponible => 'danger',
                                            };
                                            @endphp
                                            <span class="badge bg-{{ $statusColor }}">
                                                {{ $product->exchange_status ?? 'N/A' }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Adresse:</td>
                                        <td>
                                            <small>
                                                {{ $product->city ?? 'N/A' }}
                                                @if($product->district)
                                                <span class="text-muted">({{ $product->district }})</span>
                                                @endif
                                            </small>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-8">
                            <!-- dropdown -->
                            <div class="dropdown">
                                <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Share
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-facebook me-2"></i>Facebook</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-twitter me-2"></i>Twitter</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-instagram me-2"></i>Instagram</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-lg-14 mt-8 ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills nav-lb-tab" id="myTab" role="tablist">
                        <!-- nav item -->
                        <li class="nav-item" role="presentation">
                            <!-- btn --> <button class="nav-link active" id="product-tab" data-bs-toggle="tab"
                                data-bs-target="#product-tab-pane" type="button" role="tab" aria-controls="product-tab-pane"
                                aria-selected="true">Product Details</button>
                        </li>

                        <!-- nav item -->
                        <li class="nav-item" role="presentation">
                            <!-- btn --> <button class="nav-link" id="reviews-tab" data-bs-toggle="tab"
                                data-bs-target="#reviews-tab-pane" type="button" role="tab" aria-controls="reviews-tab-pane"
                                aria-selected="false">Reviews</button>
                        </li>
                        <!-- nav item -->

                    </ul>
                    <!-- tab content -->
                    <div class="tab-content" id="myTabContent">
                        <!-- tab pane -->
                        <div class="tab-pane fade show active" id="product-tab-pane" role="tabpanel" aria-labelledby="product-tab"
                            tabindex="0">
                            <div class="my-8">
                                <div class="mb-5">
                                    <h4 class="mb-1">Caractéristique</h4>
                                    @if($product->description)
                                    <p class="mb-0">{{ $product->description }}</p>
                                    @else
                                    <p class="mb-0 text-muted fst-italic">Aucune caractéristique renseignée.</p>
                                    @endif
                                </div>

                                <div class="mb-5">
                                    <h5 class="mb-1">Etat</h5>
                                    @if($product->condition)
                                    @php
                                    $conditionColor = match($product->condition) {
                                    ProductCondition::Neuf => 'success',
                                    ProductCondition::TresBonEtat => 'primary',
                                    ProductCondition::BonEtat => 'info',
                                    ProductCondition::EtatAcceptable => 'warning',
                                    ProductCondition::Usage => 'danger',
                                    default => 'secondary',
                                    };
                                    @endphp
                                    <span class="badge bg-{{ $conditionColor }} mb-2">
                                        {{ $product->condition }}
                                    </span>
                                    <p class="mb-0">{{ $product->description ?? '' }}</p>
                                    @else
                                    <p class="mb-0 text-muted fst-italic">Aucun état renseigné.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- tab pane -->

                        <!-- tab pane -->
                        <div class="tab-pane fade" id="reviews-tab-pane" role="tabpanel" aria-labelledby="reviews-tab" tabindex="0">
                            <div class="my-8">
                                <!-- row -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="me-lg-12 mb-6 mb-md-0">
                                            <div class="mb-5">
                                                <h4 class="mb-3">Avis clients</h4>
                                                <span>
                                                    <small class="text-warning">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            @if($i <=floor($averageRating))
                                                            <i class="bi bi-star-fill"></i>
                                                            @elseif($i - $averageRating < 1)
                                                                <i class="bi bi-star-half"></i>
                                                                @else
                                                                <i class="bi bi-star"></i>
                                                                @endif
                                                                @endfor
                                                    </small>
                                                    <span class="ms-3">{{ number_format($averageRating, 1) }} sur 5</span>
                                                    <small class="ms-3">{{ $reviewsCount }} avis</small>
                                                </span>
                                            </div>

                                            {{-- Barres de distribution --}}
                                            <div class="mb-8">
                                                @foreach($ratingDistribution as $star => $data)
                                                <div class="d-flex align-items-center mb-2">
                                                    <div class="text-nowrap me-3 text-muted">
                                                        <span class="d-inline-block align-middle text-muted">{{ $star }}</span>
                                                        <i class="bi bi-star-fill ms-1 small text-warning"></i>
                                                    </div>
                                                    <div class="w-100">
                                                        <div class="progress" style="height: 6px;">
                                                            <div class="progress-bar bg-warning"
                                                                role="progressbar"
                                                                style="width: {{ $data['percentage'] }}%"
                                                                aria-valuenow="{{ $data['percentage'] }}"
                                                                aria-valuemin="0"
                                                                aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span class="text-muted ms-3">{{ $data['percentage'] }}%</span>
                                                </div>
                                                @endforeach
                                            </div>

                                            <div class="d-grid">
                                                <h4>Donner votre avis</h4>
                                                <p class="mb-0">Partagez votre expérience avec les autres clients.</p>
                                                <a href="#createReview" class="btn btn-outline-secondary mt-4 text-muted">
                                                    Écrire un avis
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col-md-8">
                                        <div class="mb-10">
                                            <div class="d-flex justify-content-between align-items-center mb-8">
    <div>
        <h4>Avis ({{ $reviewsCount }})</h4>
    </div>
    <div>
        <select class="form-select" onchange="filterReviews(this.value)">
            <option value="top" {{ request('sort') == 'top' || !request('sort') ? 'selected' : '' }}>
                Top Review
            </option>
            <option value="recent" {{ request('sort') == 'recent' ? 'selected' : '' }}>
                Plus récents
            </option>
            <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>
                Plus anciens
            </option>
            <option value="best" {{ request('sort') == 'best' ? 'selected' : '' }}>
                Meilleures notes
            </option>
            <option value="worst" {{ request('sort') == 'worst' ? 'selected' : '' }}>
                Moins bonnes notes
            </option>
            <option value="helpful" {{ request('sort') == 'helpful' ? 'selected' : '' }}>
                Plus utiles
            </option>
        </select>
    </div>
</div>
                                            @forelse($reviews as $review)
                                            @php
                                            $exchangeColor = match($review->exchange_status) {
                                            'Echange avec succes' => 'primary',
                                            'Echange échoué' => 'danger',
                                            default => 'secondary',
                                            };
                                            @endphp

                                            <div class="d-flex border-bottom pb-6 mb-6 pt-4">
                                                {{-- Avatar --}}
                                                <img src="{{ $review->user->avatar_url
                                ? asset($review->user->avatar_url)
                                : asset('assets/images/avatar/avatar-12.jpg') }}"
                                                    alt="{{ $review->user->name }}"
                                                    class="rounded-circle avatar-lg"
                                                    style="width:50px; height:50px; object-fit:cover;">

                                                <div class="ms-5 flex-grow-1">
                                                    {{-- Nom --}}
                                                    <h6 class="mb-1">
                                                        {{ $review->user->firstname
                                        ? $review->user->firstname . ' ' . $review->user->name
                                        : $review->user->name }}
                                                    </h6>

                                                    {{-- Date + statut échange --}}
                                                    <p class="small">
                                                        <span class="text-muted">
                                                            {{ \Carbon\Carbon::parse($review->created_at)->translatedFormat('d F Y') }}
                                                        </span>
                                                        @if($review->exchange_status)
                                                        <span class="text-{{ $exchangeColor }} ms-3 fw-bold">
                                                            {{ $review->exchange_status }}
                                                        </span>
                                                        @endif
                                                    </p>

                                                    {{-- Étoiles + titre --}}
                                                    <div class="mb-2">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            <i class="bi bi-star{{ $i <= $review->rating ? '-fill' : '' }} text-warning"></i>
                                                            @endfor
                                                            <span class="ms-3 text-dark fw-bold">{{ $review->title }}</span>
                                                    </div>

                                                    {{-- Commentaire --}}
                                                    <p>{{ $review->comment }}</p>

                                                    {{-- Images de la review --}}
                                                    @if($review->images->count() > 0)
                                                    <div class="d-flex flex-wrap gap-2 mb-3">
                                                        @foreach($review->images as $image)
                                                        <div class="border icon-shape icon-lg border-2">
                                                            <img src="{{ asset($image->url) }}"
                                                                alt="Review image"
                                                                class="img-fluid">
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                    @endif

                                                    {{-- Helpful / Report --}}
                                                    <div class="d-flex justify-content-end mt-4">
                                                        @auth
                                                        <form action="{{ route('review.helpful', $review->uuid) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @php
                                                            $hasLiked = in_array($review->id, $userVotes);
                                                            @endphp
                                                            <button type="submit"
                                                                class="btn btn-link p-0 text-decoration-none {{ $hasLiked ? 'text-primary' : 'text-muted' }}">
                                                                <i class="feather-icon icon-thumbs-up me-1 {{ $hasLiked ? 'text-primary' : '' }}"></i>
                                                                Utile
                                                                @if($review->likes_count > 0)
                                                                ({{ $review->likes_count }})
                                                                @endif
                                                            </button>
                                                        </form>

                                                        <form action="{{ route('review.report', $review->uuid) }}"
                                                            method="POST" class="d-inline ms-4">
                                                            @csrf
                                                            <button type="button"
                                                                class="btn btn-link text-muted p-0 text-decoration-none ms-4"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#reportModal{{ $review->id }}">
                                                                <i class="feather-icon icon-flag me-1"></i>
                                                                Signaler
                                                            </button>
                                                        </form>
                                                        @else
                                                        <a href="{{ route('login') }}" class="text-muted">
                                                            <i class="feather-icon icon-thumbs-up me-1"></i>Utile
                                                        </a>
                                                        <a href="{{ route('login') }}" class="text-muted ms-4">
                                                            <i class="feather-icon icon-flag me-2"></i>Signaler
                                                        </a>
                                                        @endauth
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="modal fade" id="reportModal{{ $review->id }}" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content border-0 shadow">

                                                        {{-- Header --}}
                                                        <div class="modal-header bg-danger text-white">
                                                            <h5 class="modal-title">
                                                                <i class="bi bi-flag me-2"></i>Signaler cet avis
                                                            </h5>
                                                            <button type="button" class="btn-close btn-close-white"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>

                                                        {{-- Body --}}
                                                        <form action="{{ route('review.report', $review->uuid) }}" method="POST">
                                                            @csrf
                                                            <div class="modal-body p-4">

                                                                <p class="text-muted mb-4">
                                                                    Pourquoi souhaitez-vous signaler cet avis de
                                                                    <strong>{{ $review->user->name }}</strong> ?
                                                                </p>

                                                                {{-- Raisons prédéfinies --}}
                                                                <div class="mb-4">
                                                                    <label class="form-label fw-bold">Raison du signalement <span class="text-danger">*</span></label>
                                                                    <div class="d-flex flex-column gap-2">
                                                                        @foreach([
                                                                        'Contenu inapproprié',
                                                                        'Spam ou publicité',
                                                                        'Faux avis',
                                                                        'Langage offensant',
                                                                        'Hors sujet',
                                                                        'Autre',
                                                                        ] as $reason)
                                                                        <div class="form-check border rounded p-3 report-option">
                                                                            <input class="form-check-input"
                                                                                type="radio"
                                                                                name="reason"
                                                                                id="reason_{{ $review->id }}_{{ $loop->index }}"
                                                                                value="{{ $reason }}"
                                                                                required>
                                                                            <label class="form-check-label w-100 cursor-pointer"
                                                                                for="reason_{{ $review->id }}_{{ $loop->index }}">
                                                                                {{ $reason }}
                                                                            </label>
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>

                                                                {{-- Champ texte optionnel --}}
                                                                <div class="mb-2">
                                                                    <label class="form-label fw-bold">
                                                                        Détails supplémentaires
                                                                        <span class="text-muted small">(optionnel)</span>
                                                                    </label>
                                                                    <textarea class="form-control"
                                                                        name="reason_detail"
                                                                        rows="3"
                                                                        placeholder="Décrivez le problème en détail..."></textarea>
                                                                </div>

                                                            </div>

                                                            {{-- Footer --}}
                                                            <div class="modal-footer border-0">
                                                                <button type="button"
                                                                    class="btn btn-outline-secondary"
                                                                    data-bs-dismiss="modal">
                                                                    Annuler
                                                                </button>
                                                                <button type="submit" class="btn btn-danger">
                                                                    <i class="bi bi-flag me-2"></i>Envoyer le signalement
                                                                </button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                            @empty
                                            <div class="alert alert-light text-center">
                                                <i class="bi bi-chat-square-text fs-3 d-block mb-2"></i>
                                                Aucun avis pour ce produit. Soyez le premier à donner votre avis !
                                            </div>



                                            @endforelse

                                         {{-- Pagination --}}
@if($reviews->hasPages())
    {{ $reviews->withPath(request()->url())->fragment('reviews-tab-pane')->links('vendor.pagination.custom') }}
@endif

                                            <div>
                                                <a href="#" class="btn btn-outline-gray-400 text-muted">Read More Reviews</a>
                                            </div>
                                        </div>
                                        <div id="createReview">
                                            <h3 class="mb-5">Create Review</h3>

                                            {{-- Messages --}}
                                            @if(session('success'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                            </div>
                                            @endif

                                            @if(session('error'))
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <i class="bi bi-x-circle me-2"></i>{{ session('error') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                            </div>
                                            @endif

                                            @if($errors->any())
                                            <div class="alert alert-danger">
                                                <ul class="mb-0">
                                                    @foreach($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endif

                                            @auth
                                            <form action="{{ route('store.reviews-add', ['uuid' => $product->uuid]) }}" method="POST" enctype="multipart/form-data">
                                                @csrf

                                                {{-- Note --}}
                                                <div class="border-bottom py-4 mb-4">
                                                    <h5>Note <span class="text-danger">*</span></h5>
                                                    <div class="d-flex gap-2">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            <div class="form-check form-check-inline">
                                                            <input class="form-check-input d-none"
                                                                type="radio"
                                                                name="rating"
                                                                id="star{{ $i }}"
                                                                value="{{ $i }}"
                                                                {{ old('rating') == $i ? 'checked' : '' }}>
                                                            <label class="form-check-label fs-4 star-label" for="star{{ $i }}">
                                                                <i class="bi bi-star text-warning"></i>
                                                            </label>
                                                    </div>
                                                    @endfor
                                                </div>
                                                @error('rating')
                                                <div class="text-danger small">{{ $message }}</div>
                                                @enderror
                                        </div>

                                        {{-- Statut échange --}}
                                        <div class="border-bottom py-4 mb-4">
                                            <h5>Résultat de l'échange</h5>
                                            <div class="d-flex gap-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="exchange_status"
                                                        id="exchangeSuccess" value="Echange avec succes"
                                                        {{ old('exchange_status') == 'Echange avec succes' ? 'checked' : '' }}>
                                                    <label class="form-check-label text-success fw-bold" for="exchangeSuccess">
                                                        <i class="bi bi-check-circle me-1"></i>Echange avec succès
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="exchange_status"
                                                        id="exchangeFail" value="Echange échoué"
                                                        {{ old('exchange_status') == 'Echange échoué' ? 'checked' : '' }}>
                                                    <label class="form-check-label text-danger fw-bold" for="exchangeFail">
                                                        <i class="bi bi-x-circle me-1"></i>Echange échoué
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Titre --}}
                                        <div class="border-bottom py-4 mb-4">
                                            <h5>Titre <span class="text-danger">*</span></h5>
                                            <input type="text"
                                                class="form-control @error('title') is-invalid @enderror"
                                                name="title"
                                                value="{{ old('title') }}"
                                                placeholder="Ce qui est le plus important à savoir">
                                            @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Commentaire --}}
                                        <div class="border-bottom py-4 mb-4">
                                            <h5>Votre avis <span class="text-danger">*</span></h5>
                                            <textarea class="form-control @error('comment') is-invalid @enderror"
                                                name="comment" rows="4"
                                                placeholder="Qu'avez-vous aimé ou pas ? Comment avez-vous utilisé ce produit ?">{{ old('comment') }}</textarea>
                                            @error('comment')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Images --}}
                                        <div class="py-4 mb-4">
                                            <h5>Photos <span class="text-muted small">(optionnel)</span></h5>
                                            <input type="file" class="form-control" name="images[]"
                                                accept="image/*" multiple>
                                            <small class="text-muted">JPG, PNG — Max 2MB par image</small>
                                        </div>

                                        {{-- Submit --}}
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="bi bi-send me-2"></i>Publier l'avis
                                            </button>
                                        </div>
                                        </form>

                                        @else
                                        {{-- Utilisateur non connecté --}}
                                        <div class="alert alert-warning">
                                            <i class="bi bi-exclamation-triangle me-2"></i>
                                            Vous devez être <a href="{{ route('login') }}" class="fw-bold">connecté</a>
                                            pour laisser un avis.
                                        </div>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- tab pane -->
                    <div class="tab-pane fade" id="sellerInfo-tab-pane" role="tabpanel" aria-labelledby="sellerInfo-tab"
                        tabindex="0">...</div>
                </div>
            </div>
        </div>
        </div>



    </section>

    <!-- section -->
    <section class="my-lg-14 my-14">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <!-- heading -->
                    <h3>Related Items</h3>
                </div>
            </div>
            <!-- row -->
            <div class="row g-4 row-cols-lg-5 row-cols-2 row-cols-md-2 mt-2">
                <!-- col -->
                <div class="col">
                    <div class="card card-product">
                        <div class="card-body">
                            <!-- badge -->
                            <div class="text-center position-relative ">
                                <div class=" position-absolute top-0 start-0">
                                    <span class="badge bg-danger">Sale</span>
                                </div>
                                <a href="#!">
                                    <img src="{{ asset('assets/images/products/product-img-1.jpg') }}" alt="Grocery Ecommerce Template"
                                        class="mb-3 img-fluid"></a>
                                <!-- action btn -->
                                <div class="card-product-action">
                                    <a href="#!" class="btn-action" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                            class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
                                    <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i
                                            class="bi bi-arrow-left-right"></i></a>
                                </div>
                            </div>
                            <!-- heading -->
                            <div class="text-small mb-1"><a href="#!" class="text-decoration-none text-muted"><small>Snack &
                                        Munchies</small></a></div>
                            <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Haldiram's Sev Bhujia</a></h2>
                            <div>
                                <small class="text-warning"> <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5(149)</span>
                            </div>
                            <!-- price -->
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div><span class="text-dark">$18</span> <span class="text-decoration-line-through text-muted">$24</span>
                                </div>
                                <div><a href="#!" class="btn btn-primary btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-plus">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg> Add</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- col -->
                <div class="col">
                    <div class="card card-product">
                        <div class="card-body">
                            <div class="text-center position-relative"> <a href="#!"><img
                                        src="{{ asset('assets/images/products/product-img-2.jpg') }}" alt="Grocery Ecommerce Template"
                                        class="mb-3 img-fluid"></a>
                                <div class="card-product-action">
                                    <a href="#!" class="btn-action" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                            class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
                                    <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i
                                            class="bi bi-arrow-left-right"></i></a>
                                </div>
                            </div>
                            <div class="text-small mb-1"><a href="#!" class="text-decoration-none text-muted"><small>Bakery &
                                        Biscuits</small></a></div>
                            <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">NutriChoice Digestive </a></h2>
                            <div class="text-warning">
                                <small> <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5 (25)</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div><span class="text-dark">$24</span></div>
                                <div><a href="#!" class="btn btn-primary btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-plus">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg> Add</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- col -->
                <div class="col">
                    <div class="card card-product">
                        <div class="card-body">
                            <div class="text-center position-relative"> <a href="#!"><img
                                        src="{{ asset('assets/images/products/product-img-3.jpg') }}" alt="Grocery Ecommerce Template"
                                        class="mb-3 img-fluid"></a>
                                <div class="card-product-action">
                                    <a href="#!" class="btn-action" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                            class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
                                    <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i
                                            class="bi bi-arrow-left-right"></i></a>
                                </div>
                            </div>
                            <div class="text-small mb-1"><a href="#!" class="text-decoration-none text-muted"><small>Bakery &
                                        Biscuits</small></a></div>
                            <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Cadbury 5 Star Chocolate</a></h2>
                            <div class="text-warning">
                                <small> <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i></small> <span class="text-muted small">5 (469)</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div><span class="text-dark">$32</span> <span class="text-decoration-line-through text-muted">$35</span></div>
                                <div><a href="#!" class="btn btn-primary btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-plus">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg> Add</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- col -->
                <div class="col">
                    <div class="card card-product">
                        <div class="card-body">
                            <div class="text-center position-relative"> <a href="#!"><img
                                        src="{{ asset('assets/images/products/product-img-4.jpg') }}" alt="Grocery Ecommerce Template"
                                        class="mb-3 img-fluid"></a>
                                <div class="card-product-action">
                                    <a href="#!" class="btn-action" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                            class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
                                    <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i
                                            class="bi bi-arrow-left-right"></i></a>
                                </div>
                            </div>
                            <div class="text-small mb-1"><a href="#!" class="text-decoration-none text-muted"><small>Snack &
                                        Munchies</small></a></div>
                            <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Onion Flavour Potato</a></h2>
                            <div class="text-warning">
                                <small> <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i>
                                    <i class="bi bi-star"></i></small> <span class="text-muted small">3.5 (456)</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div><span class="text-dark">$3</span> <span class="text-decoration-line-through text-muted">$5</span></div>
                                <div><a href="#!" class="btn btn-primary btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-plus">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg> Add</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- col -->
                <div class="col">
                    <div class="card card-product">
                        <div class="card-body">
                            <div class="text-center position-relative"> <a href="#!"><img
                                        src="{{ asset('assets/images/products/product-img-9.jpg') }}" alt="Grocery Ecommerce Template"
                                        class="mb-3 img-fluid"></a>
                                <div class="card-product-action">
                                    <a href="#!" class="btn-action" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                            class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
                                    <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i
                                            class="bi bi-arrow-left-right"></i></a>
                                </div>
                            </div>
                            <div class="text-small mb-1"><a href="#!" class="text-decoration-none text-muted"><small>Snack &
                                        Munchies</small></a></div>
                            <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Slurrp Millet Chocolate </a></h2>
                            <div class="text-warning">
                                <small> <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5 (67)</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div><span class="text-dark">$6</span> <span class="text-decoration-line-through text-muted">$10</span></div>
                                <div><a href="#!" class="btn btn-primary btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-plus">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg> Add</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

</main>


<!--  the modal -->


<div class="modal fade" id="quickViewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-8">
                <div class="position-absolute top-0 end-0 me-3 mt-3">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <!-- img slide -->
                        <div class="product productModal" id="productModal">
                            <div class="zoom" onmousemove="zoom(event)"
                                style="background-image: url({{ asset('assets/images/products/product-single-img-1.jpg') }})">
                                <img src="{{ asset('assets/images/products/product-single-img-1.jpg') }}" alt="">
                            </div>
                            <div>
                                <div class="zoom" onmousemove="zoom(event)"
                                    style="background-image: url({{ asset('assets/images/products/product-single-img-2.jpg') }})">
                                    <img src="{{ asset('assets/images/products/product-single-img-2.jpg') }}" alt="">
                                </div>
                            </div>
                            <div>
                                <div class="zoom" onmousemove="zoom(event)"
                                    style="background-image: url({{ asset('assets/images/products/product-single-img-3.jpg') }})">
                                    <img src="{{ asset('assets/images/products/product-single-img-3.jpg') }}" alt="">
                                </div>
                            </div>
                            <div>
                                <div class="zoom" onmousemove="zoom(event)"
                                    style="background-image: url({{ asset('assets/images/products/product-single-img-4.jpg') }})">
                                    <img src="{{ asset('assets/images/products/product-single-img-4.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <!-- product tools -->
                        <div class="product-tools">
                            <div class="thumbnails row g-3" id="productModalThumbnails">
                                <div class="col-3" class="tns-nav-active">
                                    <div class="thumbnails-img">
                                        <img src="{{ asset('assets/images/products/product-single-img-1.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="thumbnails-img">
                                        <img src="{{ asset('assets/images/products/product-single-img-2.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="thumbnails-img">
                                        <img src="{{ asset('assets/images/products/product-single-img-3.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="thumbnails-img">
                                        <img src="{{ asset('assets/images/products/product-single-img-4.jpg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ps-lg-8 mt-6 mt-lg-0">
                            <a href="#!" class="mb-4 d-block">{{ $product->categories[0]->name ?? 'N/A' }}</a>
                            <h2 class="mb-1 h1">{{ $product->name }}</h2>
                            <div class="mb-4">
                                <small class="text-warning">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i></small><a href="#" class="ms-2">(30 reviews)</a>
                            </div>
                            <div class="fs-4">
                                <span class="fw-bold text-dark">$32</span>
                                <span class="text-decoration-line-through text-muted">$35</span><span><small
                                        class="fs-6 ms-2 text-danger">26% Off</small></span>
                            </div>
                            <hr class="my-6">
                            <div class="mb-4">
                                <button type="button" class="btn btn-outline-secondary">250g</button>
                                <button type="button" class="btn btn-outline-secondary">500g</button>
                                <button type="button" class="btn btn-outline-secondary">1kg</button>
                            </div>
                            <div class="mt-3 row justify-content-start g-2 align-items-center">
                                <div class="col-lg-4 col-md-5 col-6 d-grid">
                                    <button type="button" class="btn btn-primary">
                                        <i class="feather-icon icon-shopping-bag me-2"></i>Add to cart
                                    </button>
                                </div>
                                <div class="col-md-4 col-5">
                                    <a class="btn btn-light" href="#" data-bs-toggle="tooltip" data-bs-html="true"
                                        aria-label="Compare"><i class="bi bi-arrow-left-right"></i></a>
                                    <a class="btn btn-light" href="#!" data-bs-toggle="tooltip" data-bs-html="true"
                                        aria-label="Wishlist"><i class="feather-icon icon-heart"></i></a>
                                </div>
                            </div>
                            <hr class="my-6">
                            <div>
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td>Product Code:</td>
                                            <td>FBB00255</td>
                                        </tr>
                                        <tr>
                                            <td>Availability:</td>
                                            <td>In Stock</td>
                                        </tr>
                                        <tr>
                                            <td>Type:</td>
                                            <td>Fruits</td>
                                        </tr>
                                        <tr>
                                            <td>Shipping:</td>
                                            <td>
                                                <small>01 day shipping.<span class="text-muted">( Free pickup today)</span></small>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@section('script')
<script>
    var slider;
    0 < $(".productModal").length && (slider = tns({
        container: "#productModal",
        items: 1,
        startIndex: 0,
        navContainer: "#productModalThumbnails",
        navAsThumbnails: !0,
        autoplay: !1,
        autoplayTimeout: 1500,
        swipeAngle: !1,
        speed: 1500,
        controls: !1,
        autoplayButtonOutput: !1,
        loop: !1
    })), 1 < $(".product").length && (slider = tns({
        container: "#product",
        items: 1,
        startIndex: 0,
        navContainer: "#productThumbnails",
        navAsThumbnails: !0,
        autoplay: !1,
        autoplayTimeout: 1500,
        swipeAngle: !1,
        speed: 1500,
        controls: !1,
        autoplayButtonOutput: !1
    }));
</script>
<script>
    var slider;
    0 < $(".productModal").length && (slider = tns({
        container: "#productModal2",
        items: 1,
        startIndex: 0,
        navContainer: "#productModalThumbnails2",
        navAsThumbnails: !0,
        autoplay: !1,
        autoplayTimeout: 1500,
        swipeAngle: !1,
        speed: 1500,
        controls: !1,
        autoplayButtonOutput: !1,
        loop: !1
    })), 1 < $(".product").length && (slider = tns({
        container: "#product",
        items: 1,
        startIndex: 0,
        navContainer: "#productThumbnails",
        navAsThumbnails: !0,
        autoplay: !1,
        autoplayTimeout: 1500,
        swipeAngle: !1,
        speed: 1500,
        controls: !1,
        autoplayButtonOutput: !1
    }));
</script>


<script>
    document.querySelectorAll('.star-label').forEach((label, index) => {
        label.addEventListener('mouseover', () => highlightStars(index));
        label.addEventListener('mouseout', resetStars);
        label.addEventListener('click', () => selectStar(index));
    });

    function highlightStars(index) {
        document.querySelectorAll('.star-label i').forEach((star, i) => {
            star.className = i <= index ? 'bi bi-star-fill text-warning' : 'bi bi-star text-warning';
        });
    }

    function resetStars() {
        const selected = document.querySelector('input[name="rating"]:checked');
        const selectedIndex = selected ? parseInt(selected.value) - 1 : -1;
        document.querySelectorAll('.star-label i').forEach((star, i) => {
            star.className = i <= selectedIndex ? 'bi bi-star-fill text-warning' : 'bi bi-star text-warning';
        });
    }

    function selectStar(index) {
        document.getElementById(`star${index + 1}`).checked = true;
        resetStars();
    }
</script>


<script>
document.addEventListener('DOMContentLoaded', function () {

    // Si l'URL contient #reviews-tab-pane, activer l'onglet Reviews
    if (window.location.hash === '#reviews-tab-pane') {

        // Activer l'onglet Bootstrap
        const reviewsTab = document.getElementById('reviews-tab');
        if (reviewsTab) {
            const tab = new bootstrap.Tab(reviewsTab);
            tab.show();
        }

        // Scroll smooth vers l'onglet
        setTimeout(() => {
            const tabSection = document.getElementById('reviews-tab-pane');
            if (tabSection) {
                tabSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }, 300);
    }

    // Conserver le hash dans l'URL quand on clique sur l'onglet Reviews
    const reviewsTabBtn = document.getElementById('reviews-tab');
    if (reviewsTabBtn) {
        reviewsTabBtn.addEventListener('shown.bs.tab', function () {
            history.replaceState(null, null, '#reviews-tab-pane');
        });
    }

    // Retirer le hash quand on quitte l'onglet Reviews
    document.querySelectorAll('[data-bs-toggle="tab"]').forEach(function (tabEl) {
        tabEl.addEventListener('shown.bs.tab', function (e) {
            if (e.target.id !== 'reviews-tab') {
                history.replaceState(null, null, ' ');
            }
        });
    });

});
</script>

<script>
function filterReviews(value) {
    const url = new URL(window.location.href);
    url.searchParams.set('sort', value);
    url.searchParams.delete('page'); // reset pagination au changement de tri
    url.hash = 'reviews-tab-pane';
    window.location.href = url.toString();
}
</script>
@endsection

@endsection