@extends('base')
@section('content')

<main>

    {{-- Breadcrumb --}}
    <div class="mt-4">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Accueil</a></li>
                    <li class="breadcrumb-item active">Blog</li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- Header --}}
    <section class="mt-8">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="fw-bold mb-0">maketroc Blog</h1>
                    <p class="text-muted mt-1 mb-0">{{ $blogs->total() }} article{{ $blogs->total() > 1 ? 's' : '' }}</p>
                </div>
                {{-- Filtres --}}
                <div class="col-md-6 mt-4 mt-md-0">
                    <form method="GET" action="{{ route('blog') }}" class="d-flex gap-2 justify-content-md-end flex-wrap">
                        <input type="text" class="form-control" name="search"
                               value="{{ request('search') }}"
                               placeholder="Rechercher..."
                               style="width:auto; min-width:180px;">
                        <select class="form-select" name="category" onchange="this.form.submit()" style="width:auto;">
                            <option value="">Toutes catégories</option>
                            @foreach($categories as $cat)
                            <option value="{{ $cat->uuid }}"
                                {{ request('category') == $cat->uuid ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                            @endforeach
                        </select>
                        @if(request('search') || request('category'))
                        <a href="{{ route('blog') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-x"></i>
                        </a>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-6 mb-lg-14 mb-8">
        <div class="container">

            @if($blogs->isEmpty())
            {{-- État vide --}}
            <div class="text-center py-14">
                <i class="bi bi-journal-x fs-1 text-muted d-block mb-3"></i>
                <h5 class="text-muted">Aucun article trouvé</h5>
                @if(request('search') || request('category'))
                <a href="{{ route('blog') }}" class="btn btn-outline-primary mt-3">
                    Voir tous les articles
                </a>
                @endif
            </div>

            @else

            {{-- Article à la une (le plus récent) --}}
            @php $featured = $blogs->first(); @endphp
            <div class="row d-flex align-items-center mb-10">
                <div class="col-12 col-md-12 col-lg-8">
                    <a href="{{ route('blog.single', ['uuid' => $featured->uuid]) }}">
                        <div class="img-zoom">
                            @if($featured->cover_url)
                                <img src="{{ asset('storage/' . $featured->cover_url) }}"
                                     alt="{{ $featured->title }}"
                                     class="img-fluid w-100 rounded"
                                     style="height:420px; object-fit:cover;">
                            @else
                                <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                     style="height:420px;">
                                    <i class="bi bi-image fs-1 text-muted"></i>
                                </div>
                            @endif
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-12 col-lg-4">
                    <div class="ps-lg-8 mt-8 mt-lg-0">
                        @if($featured->category)
                        <div class="mb-2">
                            <a href="{{ route('blog') }}?category={{ $featured->category->uuid }}"
                               class="text-primary small fw-semibold text-decoration-none text-uppercase">
                                {{ $featured->category->name }}
                            </a>
                        </div>
                        @endif
                        <h2 class="mb-3">
                            <a href="{{ route('blog.single', ['uuid' => $featured->uuid]) }}"
                               class="text-inherit text-decoration-none">
                                {{ $featured->title }}
                            </a>
                        </h2>
                        @if($featured->description)
                        <p class="text-muted">{{ Str::limit($featured->description, 120) }}</p>
                        @endif
                        <div class="d-flex justify-content-between text-muted mt-4">
                            <span>
                                <small>
                                    {{ \Carbon\Carbon::parse($featured->publication_date)->translatedFormat('d F Y') }}
                                </small>
                            </span>
                            @if($featured->reading_time)
                            <span>
                                <small>Read time: <span class="text-dark fw-bold">{{ $featured->reading_time }}</span></small>
                            </span>
                            @endif
                        </div>
                        <div class="mt-3">
                            <a href="{{ route('blog.single', ['uuid' => $featured->uuid]) }}"
                               class="btn btn-outline-primary btn-sm">
                                Lire l'article <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                        @if($featured->shop)
                        <div class="mt-3 d-flex align-items-center gap-2">
                            @php $author = $featured->shop->user; @endphp
                            @if($author?->avatar_url)
                                <img src="{{ asset('storage/' . $author->avatar_url) }}"
                                     class="rounded-circle"
                                     style="width:28px;height:28px;object-fit:cover;">
                            @else
                                <div class="rounded-circle bg-light border d-flex align-items-center justify-content-center"
                                     style="width:28px;height:28px;">
                                    <i class="bi bi-person text-muted" style="font-size:12px;"></i>
                                </div>
                            @endif
                            <small class="text-muted">
                                {{ trim(($author?->firstname ?? '') . ' ' . ($author?->name ?? '')) ?: $featured->shop->name }}
                            </small>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Grille des autres articles --}}
            <div class="row">
                @foreach($blogs->skip(1) as $blog)
                <div class="col-12 col-md-6 col-lg-4 mb-10">

                    {{-- Image --}}
                    <div class="mb-4">
                        <a href="{{ route('blog.single', ['uuid' => $blog->uuid]) }}">
                            <div class="img-zoom">
                                @if($blog->cover_url)
                                    <img src="{{ asset('storage/' . $blog->cover_url) }}"
                                         alt="{{ $blog->title }}"
                                         class="img-fluid w-100 rounded"
                                         style="height:220px; object-fit:cover;">
                                @else
                                    <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                         style="height:220px;">
                                        <i class="bi bi-image fs-2 text-muted"></i>
                                    </div>
                                @endif
                            </div>
                        </a>
                    </div>

                    {{-- Catégorie --}}
                    @if($blog->category)
                    <div class="mb-2">
                        <a href="{{ route('blog') }}?category={{ $blog->category->uuid }}"
                           class="text-primary small text-decoration-none fw-semibold text-uppercase">
                            {{ $blog->category->name }}
                        </a>
                    </div>
                    @endif

                    {{-- Titre + description --}}
                    <h2 class="h5">
                        <a href="{{ route('blog.single', ['uuid' => $blog->uuid]) }}"
                           class="text-inherit text-decoration-none">
                            {{ Str::limit($blog->title, 60) }}
                        </a>
                    </h2>
                    @if($blog->description)
                    <p class="text-muted small">{{ Str::limit($blog->description, 100) }}</p>
                    @endif

                    {{-- Meta --}}
                    <div class="d-flex justify-content-between text-muted mt-3">
                        <span>
                            <small>
                                {{ \Carbon\Carbon::parse($blog->publication_date)->format('d M Y') }}
                            </small>
                        </span>
                        @if($blog->reading_time)
                        <span>
                            <small>Read time: <span class="text-dark fw-bold">{{ $blog->reading_time }}</span></small>
                        </span>
                        @endif
                    </div>

                    {{-- Auteur --}}
                    @if($blog->shop)
                    @php $author = $blog->shop->user; @endphp
                    <div class="mt-2 d-flex align-items-center gap-2">
                        @if($author?->avatar_url)
                            <img src="{{ asset('storage/' . $author->avatar_url) }}"
                                 class="rounded-circle"
                                 style="width:24px;height:24px;object-fit:cover;">
                        @else
                            <div class="rounded-circle bg-light border d-flex align-items-center justify-content-center"
                                 style="width:24px;height:24px;">
                                <i class="bi bi-person text-muted" style="font-size:11px;"></i>
                            </div>
                        @endif
                        <small class="text-muted">
                            {{ trim(($author?->firstname ?? '') . ' ' . ($author?->name ?? '')) ?: $blog->shop->name }}
                        </small>
                    </div>
                    @endif

                </div>
                @endforeach
            </div>

            @endif

            {{-- Pagination --}}
            @if($blogs->hasPages())
            <div class="col-12 mt-4">
                <nav>
                    {{ $blogs->appends(request()->query())->links() }}
                </nav>
            </div>
            @endif

        </div>
    </section>

</main>

@endsection