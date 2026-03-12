@extends('admin/base')
@section('contenue')

<main class="main-content-wrapper">
    <div class="container">

        {{-- Header --}}
        <div class="row mb-8">
            <div class="col-md-12">
                <div class="d-md-flex justify-content-between align-items-center">
                    <div>
                        <h2>Blogs</h2>
                        <p class="text-muted mb-0">
                            {{ $blogs->total() }} article{{ $blogs->total() > 1 ? 's' : '' }} au total
                        </p>
                    </div>
                    <div>
                        <a href="{{ route('admin.add-blog') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-2"></i>Nouveau blog
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Alertes --}}
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="row">
            <div class="col-xl-12 col-12 mb-5">
                <div class="card h-100 card-lg">

                    {{-- Filtres --}}
                    <div class="px-6 py-6">
                        <form method="GET" action="{{ route('admin.blog-setting') }}">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-lg-4 col-md-6 col-12 mb-2 mb-lg-0">
                                    <input class="form-control" type="search" name="search"
                                           placeholder="Rechercher un blog..."
                                           value="{{ request('search') }}">
                                </div>
                                <div class="col-lg-2 col-md-4 col-12">
                                    <select class="form-select" name="status" onchange="this.form.submit()">
                                        <option value="">Tous les statuts</option>
                                        <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Publié</option>
                                        <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Brouillon</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>

                    {{-- Tableau --}}
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-centered table-hover text-nowrap table-borderless mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Image</th>
                                        <th>Titre</th>
                                        <th>Catégorie</th>
                                        <th>Boutique</th>
                                        <th>Statut</th>
                                        <th>Date</th>
                                        <th>Vues</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($blogs as $blog)
                                    <tr>
                                        {{-- Image --}}
                                        <td>
                                            <a href="{{ route('blog.single', ['uuid' => $blog->uuid]) }}">
                                                @if($blog->cover_url)
                                                    <img src="{{ asset('storage/' . $blog->cover_url) }}"
                                                         alt="{{ $blog->title }}"
                                                         class="icon-shape icon-md rounded"
                                                         style="width:50px;height:50px;object-fit:cover;">
                                                @else
                                                    <div class="icon-shape icon-md bg-light rounded d-flex align-items-center justify-content-center"
                                                         style="width:50px;height:50px;">
                                                        <i class="bi bi-image text-muted"></i>
                                                    </div>
                                                @endif
                                            </a>
                                        </td>

                                        {{-- Titre --}}
                                        <td>
                                            <a href="{{ route('blog.single', ['uuid' => $blog->uuid]) }}"
                                               class="text-reset fw-semibold">
                                                {{ Str::limit($blog->title, 45) }}
                                            </a>
                                        </td>

                                        {{-- Catégorie --}}
                                        <td>
                                            @if($blog->category)
                                                <span class="badge bg-light text-dark border">
                                                    {{ $blog->category->name }}
                                                </span>
                                            @else
                                                <span class="text-muted">—</span>
                                            @endif
                                        </td>

                                        {{-- Boutique --}}
                                        <td>
                                            @if($blog->shop)
                                                <small>{{ $blog->shop->name }}</small>
                                            @else
                                                <span class="text-muted">—</span>
                                            @endif
                                        </td>

                                        {{-- Statut --}}
                                        <td>
                                            @if($blog->is_published)
                                                <span class="badge bg-light-success text-dark-success">Publié</span>
                                            @else
                                                <span class="badge bg-light-warning text-dark-warning">Brouillon</span>
                                            @endif
                                        </td>

                                        {{-- Date --}}
                                        <td>
                                            <small>
                                                {{ \Carbon\Carbon::parse($blog->publication_date)->format('d M Y') }}
                                            </small>
                                        </td>

                                        {{-- Vues --}}
                                        <td>
                                            <small class="text-muted">
                                                <i class="bi bi-eye me-1"></i>{{ number_format($blog->views_count) }}
                                            </small>
                                        </td>

                                        {{-- Actions --}}
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="text-reset" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="feather-icon icon-more-vertical fs-5"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('blog.single', ['uuid' => $blog->uuid]) }}" target="_blank">
                                                            <i class="bi bi-eye me-3"></i>Voir
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('admin.blog-edit', ['uuid' => $blog->uuid]) }}">
                                                            <i class="bi bi-pencil-square me-3"></i>Modifier
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('admin.blog-toggle', ['uuid' => $blog->uuid]) }}"
                                                              method="POST" class="d-inline">
                                                            @csrf @method('PATCH')
                                                            <button type="submit" class="dropdown-item">
                                                                @if($blog->is_published)
                                                                    <i class="bi bi-eye-slash me-3"></i>Dépublier
                                                                @else
                                                                    <i class="bi bi-check-circle me-3"></i>Publier
                                                                @endif
                                                            </button>
                                                        </form>
                                                    </li>
                                                    <li><hr class="dropdown-divider"></li>
                                                    <li>
                                                        <form action="{{ route('admin.blog-delete', ['uuid' => $blog->uuid]) }}"
                                                              method="POST"
                                                              onsubmit="return confirm('Supprimer ce blog ?')">
                                                            @csrf @method('DELETE')
                                                            <button type="submit" class="dropdown-item text-danger">
                                                                <i class="bi bi-trash me-3"></i>Supprimer
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center py-8 text-muted">
                                            <i class="bi bi-journal-x fs-2 d-block mb-2"></i>
                                            Aucun blog trouvé
                                            @if(request('search'))
                                                pour "<strong>{{ request('search') }}</strong>"
                                            @endif
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- Pagination --}}
                    @if($blogs->hasPages())
                    <div class="border-top d-md-flex justify-content-between align-items-center px-6 py-6">
                        <span class="text-muted small">
                            Affichage {{ $blogs->firstItem() }}–{{ $blogs->lastItem() }}
                            sur {{ $blogs->total() }} résultats
                        </span>
                        <nav class="mt-2 mt-md-0">
                            {{ $blogs->appends(request()->query())->links() }}
                        </nav>
                    </div>
                    @endif

                </div>
            </div>
        </div>

    </div>
</main>

@endsection