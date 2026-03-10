{{--
    Partial : store/partials/reviews-section.blade.php
    Variables requises :
        $reviews, $reviewsCount, $averageRating, $ratingDistribution, $userVotes
    Variables optionnelles :
        $product   → si présent : avis sur un produit (shop-single)
        $shop      → si présent sans $product : avis sur la boutique (reviews.blade)
        $wrapInTab → si true, enveloppe dans le tab-pane (pour shop-single)
--}}

@php $wrapInTab = $wrapInTab ?? false; @endphp

@if($wrapInTab)
<div class="tab-pane fade" id="reviews-tab-pane" role="tabpanel" aria-labelledby="reviews-tab" tabindex="0">
<div class="my-8">
@endif

<div class="row">

    {{-- ── Colonne gauche : résumé des notes ────────────────── --}}
    <div class="col-md-4">
        <div class="me-lg-12 mb-6 mb-md-0">

            <div class="mb-5">
                <h4 class="mb-3">Avis clients</h4>
                <span>
                    <small class="text-warning">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= floor($averageRating))
                                <i class="bi bi-star-fill"></i>
                            @elseif($i - $averageRating < 1)
                                <i class="bi bi-star-half"></i>
                            @else
                                <i class="bi bi-star"></i>
                            @endif
                        @endfor
                    </small>
                    <span class="ms-3">{{ number_format($averageRating, 1) }} sur 5</span>
                    <small class="ms-3 text-muted">{{ $reviewsCount }} avis</small>
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
                                 aria-valuemin="0" aria-valuemax="100">
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

    {{-- ── Colonne droite : liste + formulaire ───────────────── --}}
    <div class="col-md-8">
        <div class="mb-10">

            {{-- En-tête + tri --}}
            <div class="d-flex justify-content-between align-items-center mb-8">
                <div>
                    <h4>Avis ({{ $reviewsCount }})</h4>
                </div>
                <div>
                    <select class="form-select" onchange="filterReviews(this.value)">
                        <option value="top"     {{ request('sort') == 'top'     || !request('sort') ? 'selected' : '' }}>Top Review</option>
                        <option value="recent"  {{ request('sort') == 'recent'  ? 'selected' : '' }}>Plus récents</option>
                        <option value="oldest"  {{ request('sort') == 'oldest'  ? 'selected' : '' }}>Plus anciens</option>
                        <option value="best"    {{ request('sort') == 'best'    ? 'selected' : '' }}>Meilleures notes</option>
                        <option value="worst"   {{ request('sort') == 'worst'   ? 'selected' : '' }}>Moins bonnes notes</option>
                        <option value="helpful" {{ request('sort') == 'helpful' ? 'selected' : '' }}>Plus utiles</option>
                    </select>
                </div>
            </div>

            {{-- Flash messages --}}
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif
            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                <i class="bi bi-x-circle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            {{-- ── Liste des avis ─────────────────────────────── --}}
            @forelse($reviews as $review)
            @php
                $exchangeColor = match($review->exchange_status ?? '') {
                    'Echange avec succes' => 'primary',
                    'Echange échoué'      => 'danger',
                    default               => 'secondary',
                };
            @endphp

            <div class="d-flex border-bottom pb-6 mb-6 pt-4">

                {{-- Avatar --}}
                <img src="{{ isset($review->user->avatar_url) && $review->user->avatar_url
                        ? asset($review->user->avatar_url)
                        : asset('assets/images/avatar/avatar-12.jpg') }}"
                     alt="{{ $review->user->name }}"
                     class="rounded-circle avatar-lg flex-shrink-0"
                     style="width:50px; height:50px; object-fit:cover;">

                <div class="ms-5 flex-grow-1">

                    {{-- Nom --}}
                    <h6 class="mb-1">
                        {{ isset($review->user->firstname) && $review->user->firstname
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

                    {{-- Images --}}
                    @if($review->images->count() > 0)
                    <div class="d-flex flex-wrap gap-2 mb-3">
                        @foreach($review->images as $image)
                        <div class="border icon-shape icon-lg border-2">
                            <img src="{{ asset($image->url) }}" alt="Review image" class="img-fluid">
                        </div>
                        @endforeach
                    </div>
                    @endif

                    {{-- Helpful / Report --}}
                    <div class="d-flex justify-content-end mt-4">
                        @auth
                        {{-- Helpful --}}
                        <form action="{{ route('review.helpful', $review->uuid) }}" method="POST" class="d-inline">
                            @csrf
                            @php $hasLiked = in_array($review->id, $userVotes); @endphp
                            <button type="submit"
                                    class="btn btn-link p-0 text-decoration-none {{ $hasLiked ? 'text-primary' : 'text-muted' }}">
                                <i class="feather-icon icon-thumbs-up me-1"></i>
                                Utile @if($review->likes_count > 0)({{ $review->likes_count }})@endif
                            </button>
                        </form>

                        {{-- Bouton Report --}}
                        <button type="button"
                                class="btn btn-link text-muted p-0 text-decoration-none ms-4"
                                data-bs-toggle="modal"
                                data-bs-target="#reportModal{{ $review->id }}">
                            <i class="feather-icon icon-flag me-1"></i>Signaler
                        </button>
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

            {{-- Modal signalement --}}
            <div class="modal fade" id="reportModal{{ $review->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content border-0 shadow">
                        <div class="modal-header bg-danger text-white">
                            <h5 class="modal-title">
                                <i class="bi bi-flag me-2"></i>Signaler cet avis
                            </h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        </div>
                        <form action="{{ route('review.report', $review->uuid) }}" method="POST">
                            @csrf
                            <div class="modal-body p-4">
                                <p class="text-muted mb-4">
                                    Pourquoi souhaitez-vous signaler cet avis de
                                    <strong>{{ $review->user->name }}</strong> ?
                                </p>
                                <div class="mb-4">
                                    <label class="form-label fw-bold">
                                        Raison <span class="text-danger">*</span>
                                    </label>
                                    <div class="d-flex flex-column gap-2">
                                        @foreach(['Contenu inapproprié','Spam ou publicité','Faux avis','Langage offensant','Hors sujet','Autre'] as $reason)
                                        <div class="form-check border rounded p-3 report-option">
                                            <input class="form-check-input" type="radio"
                                                   name="reason"
                                                   id="reason_{{ $review->id }}_{{ $loop->index }}"
                                                   value="{{ $reason }}" required>
                                            <label class="form-check-label w-100 cursor-pointer"
                                                   for="reason_{{ $review->id }}_{{ $loop->index }}">
                                                {{ $reason }}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fw-bold">
                                        Détails <span class="text-muted small">(optionnel)</span>
                                    </label>
                                    <textarea class="form-control" name="reason_detail" rows="3"
                                              placeholder="Décrivez le problème en détail..."></textarea>
                                </div>
                            </div>
                            <div class="modal-footer border-0">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
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
                Aucun avis pour le moment. Soyez le premier à donner votre avis !
            </div>
            @endforelse

            {{-- Pagination --}}
            @if($reviews->hasPages())
            {{ $reviews->withPath(request()->url())->fragment('reviews-tab-pane')->links('vendor.pagination.custom') }}
            @endif

        </div>

        {{-- ── Formulaire d'ajout d'avis ───────────────────── --}}
        <div id="createReview">
            <h3 class="mb-5">Écrire un avis</h3>

            @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                </ul>
            </div>
            @endif

            @auth

            {{-- ── Action selon contexte : produit ou boutique ── --}}
            @isset($product)
                {{-- Avis sur un produit --}}
                <form action="{{ route('store.reviews-add', ['uuid' => $product->uuid]) }}"
                      method="POST" enctype="multipart/form-data">
                @csrf
            @else
                {{-- Avis direct sur la boutique --}}
                <form action="{{ route('store.shop-review-add') }}"
                      method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="shop_uuid" value="{{ $shop->uuid }}">
            @endisset

                {{-- Note --}}
                <div class="border-bottom py-4 mb-4">
                    <h5>Note <span class="text-danger">*</span></h5>
                    <div class="d-flex gap-2">
                        @for($i = 1; $i <= 5; $i++)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input d-none" type="radio"
                                   name="rating" id="star{{ $i }}" value="{{ $i }}"
                                   {{ old('rating') == $i ? 'checked' : '' }}>
                            <label class="form-check-label fs-4 star-label" for="star{{ $i }}">
                                <i class="bi bi-star text-warning"></i>
                            </label>
                        </div>
                        @endfor
                    </div>
                    @error('rating')<div class="text-danger small">{{ $message }}</div>@enderror
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
                                <i class="bi bi-check-circle me-1"></i>Échange avec succès
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exchange_status"
                                   id="exchangeFail" value="Echange échoué"
                                   {{ old('exchange_status') == 'Echange échoué' ? 'checked' : '' }}>
                            <label class="form-check-label text-danger fw-bold" for="exchangeFail">
                                <i class="bi bi-x-circle me-1"></i>Échange échoué
                            </label>
                        </div>
                    </div>
                </div>

                {{-- Titre --}}
                <div class="border-bottom py-4 mb-4">
                    <h5>Titre <span class="text-danger">*</span></h5>
                    <input type="text"
                           class="form-control @error('title') is-invalid @enderror"
                           name="title" value="{{ old('title') }}"
                           placeholder="Ce qui est le plus important à savoir">
                    @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                {{-- Commentaire --}}
                <div class="border-bottom py-4 mb-4">
                    <h5>Votre avis <span class="text-danger">*</span></h5>
                    <textarea class="form-control @error('comment') is-invalid @enderror"
                              name="comment" rows="4"
                              placeholder="Qu'avez-vous aimé ou pas ? Comment avez-vous utilisé ce produit ?">{{ old('comment') }}</textarea>
                    @error('comment')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                {{-- Images --}}
                <div class="py-4 mb-4">
                    <h5>Photos <span class="text-muted small">(optionnel)</span></h5>
                    <input type="file" class="form-control" name="images[]" accept="image/*" multiple>
                    <small class="text-muted">JPG, PNG — Max 2MB par image</small>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-send me-2"></i>Publier l'avis
                    </button>
                </div>

            </form>

            @else
            <div class="alert alert-warning">
                <i class="bi bi-exclamation-triangle me-2"></i>
                Vous devez être <a href="{{ route('login') }}" class="fw-bold">connecté</a>
                pour laisser un avis.
            </div>
            @endauth

        </div>

    </div>
</div>

@if($wrapInTab)
</div>
</div>
@endif