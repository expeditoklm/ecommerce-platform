@extends('base')
@section('content')

<main>

    {{-- Breadcrumb --}}
    <div class="mt-4">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Accueil</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('blog') }}">Blog</a></li>
                    <li class="breadcrumb-item active text-truncate" style="max-width:200px;">{{ $blog->title }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <section class="my-lg-14 my-8">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">

                    {{-- ══════════════════════════════ --}}
                    {{-- EN-TÊTE                        --}}
                    {{-- ══════════════════════════════ --}}

                    {{-- Catégorie --}}
                    @if($blog->category)
                    <div class="mb-3 text-center">
                        <a href="{{ route('shop.by-category', ['uuid' => $blog->category->uuid]) }}"
                           class="text-decoration-none text-muted small text-uppercase fw-semibold">
                            {{ $blog->category->name }}
                        </a>
                    </div>
                    @endif

                    {{-- Titre --}}
                    <h1 class="fw-bold text-center">{{ $blog->title }}</h1>

                    {{-- Meta --}}
                    <div class="d-flex justify-content-center text-muted mt-4 gap-3 flex-wrap">
                        <span><small>{{ \Carbon\Carbon::parse($blog->publication_date)->translatedFormat('d F Y') }}</small></span>
                        @if($blog->reading_time)
                        <span><small>Read time: <span class="text-dark fw-bold">{{ $blog->reading_time }}</span></small></span>
                        @endif
                        @foreach($blog->blogCategories as $tag)
                        <a href="{{ route('shop.by-category', ['uuid' => $tag->uuid]) }}"
                           class="badge bg-light text-dark border text-decoration-none fw-normal">
                            {{ $tag->name }}
                        </a>
                        @endforeach
                    </div>

                    {{-- ══════════════════════════════ --}}
                    {{-- IMAGE DE COUVERTURE            --}}
                    {{-- ══════════════════════════════ --}}
                    @if($blog->cover_url)
                    <div class="mb-8 mt-6">
                        <img src="{{ asset('storage/' . $blog->cover_url) }}"
                             alt="{{ $blog->title }}"
                             class="img-fluid rounded w-100"
                             style="max-height:480px; object-fit:cover;">
                    </div>
                    @endif

                    {{-- ══════════════════════════════ --}}
                    {{-- CONTENU PRINCIPAL              --}}
                    {{-- ══════════════════════════════ --}}
                    <div class="mb-4">
                        {!! $blog->content !!}
                    </div>

                    {{-- ══════════════════════════════ --}}
                    {{-- CITATION                       --}}
                    {{-- ══════════════════════════════ --}}
                    @if($blog->quote)
                    <hr class="mt-lg-10 mb-lg-6 my-md-6">
                    <blockquote class="blockquote text-center">
                        <p class="text-primary fst-italic lh-base h1 px-2 px-lg-14">
                            "{{ $blog->quote }}"
                        </p>
                        @if($blog->quote_author)
                        <footer class="blockquote-footer mt-3 text-muted">
                            <cite>{{ $blog->quote_author }}</cite>
                        </footer>
                        @endif
                    </blockquote>
                    <hr class="mt-lg-6 mb-lg-10 my-md-6">
                    @endif

                    {{-- ══════════════════════════════════════════════════════ --}}
                    {{-- BLOC IMAGE GAUCHE                                      --}}
                    {{-- Image flottante à gauche, content_left enroule à droite --}}
                    {{-- ══════════════════════════════════════════════════════ --}}
                    @if($blog->leftImage || $blog->content_left)
                    <div class="mb-5">

                        @if($blog->leftImage)
                        <img src="{{ asset('storage/' . $blog->leftImage->url) }}"
                             alt="Image"
                             class="rounded d-none d-md-block"
                             style="float:left; width:260px; margin: 4px 24px 16px 0; object-fit:cover;">
                        @endif

                        @if($blog->content_left)
                            {!! nl2br(e($blog->content_left)) !!}
                        @elseif($blog->product_features)
                            <p>{{ $blog->product_features }}</p>
                        @endif

                        <div style="clear:both;"></div>
                    </div>
                    @endif

                    {{-- ══════════════════════════════════════════════════════ --}}
                    {{-- BLOC IMAGE DROITE                                       --}}
                    {{-- Image flottante à droite, content_right enroule à gauche --}}
                    {{-- ══════════════════════════════════════════════════════ --}}
                    @if($blog->rightImage || $blog->content_right)
                    <div class="mb-4">

                        @if($blog->rightImage)
                        <img src="{{ asset('storage/' . $blog->rightImage->url) }}"
                             alt="Image"
                             class="rounded d-none d-md-block"
                             style="float:right; width:260px; margin: 4px 0 16px 24px; object-fit:cover;">
                        @endif

                        @if($blog->content_right)
                            {!! nl2br(e($blog->content_right)) !!}
                        @elseif($blog->product_status)
                            <p>{{ $blog->product_status }}</p>
                        @endif

                        <div style="clear:both;"></div>
                    </div>
                    @endif

                    {{-- ══════════════════════════════ --}}
                    {{-- AUTEUR + PARTAGE               --}}
                    {{-- ══════════════════════════════ --}}
                    <hr class="mt-8 mb-5">
                    <div class="d-flex justify-content-between align-items-center mb-5 flex-wrap gap-3">

                        {{-- Auteur --}}
                        <div class="d-flex align-items-center">
                            @php $author = $blog->shop?->user; @endphp
                            @if($author?->avatar_url)
                                <img src="{{ asset('storage/' . $author->avatar_url) }}"
                                     alt="{{ $author->name }}"
                                     class="rounded-circle"
                                     style="width:50px;height:50px;object-fit:cover;">
                            @else
                                <div class="rounded-circle bg-light d-flex align-items-center justify-content-center border"
                                     style="width:50px;height:50px;">
                                    <i class="bi bi-person fs-4 text-muted"></i>
                                </div>
                            @endif
                            <div class="ms-2 lh-1">
                                <h5 class="mb-1">
                                    {{ trim(($author?->firstname ?? '') . ' ' . ($author?->name ?? '')) ?: 'Auteur inconnu' }}
                                </h5>
                                @if($blog->shop)
                                <a href="{{ route('store.single', ['uuid' => $blog->shop->uuid]) }}"
                                   class="text-primary small text-decoration-none">
                                    <i class="bi bi-shop me-1"></i>{{ $blog->shop->name }}
                                </a>
                                @endif
                            </div>
                        </div>

                        {{-- Partage --}}
                        <div class="d-flex align-items-center gap-2">
                            <span class="text-muted small">Share</span>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                               target="_blank" class="ms-1 text-muted"><i class="bi bi-facebook fs-6"></i></a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($blog->title) }}"
                               target="_blank" class="ms-1 text-muted"><i class="bi bi-twitter fs-6"></i></a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->url()) }}&title={{ urlencode($blog->title) }}"
                               target="_blank" class="ms-1 text-muted"><i class="bi bi-linkedin fs-6"></i></a>
                            <a href="https://wa.me/?text={{ urlencode($blog->title . ' ' . request()->url()) }}"
                               target="_blank" class="ms-1 text-muted"><i class="bi bi-whatsapp fs-6"></i></a>
                        </div>

                    </div>

                    {{-- ══════════════════════════════ --}}
                    {{-- ARTICLES SIMILAIRES            --}}
                    {{-- ══════════════════════════════ --}}
                    @if($relatedBlogs->count() > 0)
                    <div class="mt-8">
                        <h4 class="mb-4">Articles similaires</h4>
                        <div class="row g-4">
                            @foreach($relatedBlogs as $related)
                            <div class="col-md-4">
                                <div class="card h-100 card-product">
                                    @if($related->cover_url)
                                    <img src="{{ asset('storage/' . $related->cover_url) }}"
                                         alt="{{ $related->title }}"
                                         class="card-img-top rounded-top"
                                         style="height:150px;object-fit:cover;">
                                    @endif
                                    <div class="card-body p-3">
                                        @if($related->category)
                                        <span class="badge bg-light text-dark border small mb-1">
                                            {{ $related->category->name }}
                                        </span>
                                        @endif
                                        <h6 class="mb-1">
                                            <a href="{{ route('blog.single', ['uuid' => $related->uuid]) }}"
                                               class="text-inherit text-decoration-none">
                                                {{ Str::limit($related->title, 55) }}
                                            </a>
                                        </h6>
                                        <small class="text-muted">
                                            <i class="bi bi-calendar3 me-1"></i>
                                            {{ \Carbon\Carbon::parse($related->publication_date)->format('d M Y') }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </section>
</main>

@endsection