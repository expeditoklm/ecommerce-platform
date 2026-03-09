@extends('admin/base')
@section('contenue')

<main class="main-content-wrapper">
    <div class="container">

        {{-- Header --}}
        <div class="row mb-8">
            <div class="col-md-12">
                <div class="d-md-flex justify-content-between align-items-center">
                    <div>
                        <h2>Catégories</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Catégories</li>
                            </ol>
                        </nav>
                    </div>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddCategory">
                        <i class="bi bi-plus-circle me-2"></i>Ajouter une catégorie
                    </button>
                </div>
            </div>
        </div>

        {{-- Alert --}}
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        {{-- Tabs section --}}
        <div class="row mb-4">
            <div class="col-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link {{ !request('section') ? 'active' : '' }}"
                           href="{{ route('admin.categories', request()->except('section', 'page')) }}">
                            <i class="bi bi-grid me-2"></i>Toutes
                            <span class="badge bg-secondary ms-1">{{ $counts['all'] }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('section') == 'product' ? 'active' : '' }}"
                           href="{{ route('admin.categories', array_merge(request()->except('section','page'), ['section'=>'product'])) }}">
                            <i class="bi bi-box-seam me-2"></i>Produits
                            <span class="badge bg-primary ms-1">{{ $counts['product'] }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('section') == 'service' ? 'active' : '' }}"
                           href="{{ route('admin.categories', array_merge(request()->except('section','page'), ['section'=>'service'])) }}">
                            <i class="bi bi-tools me-2"></i>Services
                            <span class="badge bg-success ms-1">{{ $counts['service'] }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('section') == 'rental' ? 'active' : '' }}"
                           href="{{ route('admin.categories', array_merge(request()->except('section','page'), ['section'=>'rental'])) }}">
                            <i class="bi bi-key me-2"></i>Locations
                            <span class="badge bg-warning ms-1">{{ $counts['rental'] }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        {{-- Card liste --}}
        <div class="row">
            <div class="col-12 mb-5">
                <div class="card h-100 card-lg">

                    {{-- Filtres --}}
                    <div class="px-6 py-6">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-lg-4 col-md-6 col-12 mb-2 mb-lg-0">
                                <form action="{{ route('admin.categories') }}" method="GET" class="d-flex">
                                    @if(request('section'))
                                        <input type="hidden" name="section" value="{{ request('section') }}">
                                    @endif
                                    <div class="input-group">
                                        <input class="form-control" type="search" name="search"
                                               placeholder="Rechercher une catégorie"
                                               value="{{ request('search') }}">
                                        <button class="btn btn-outline-secondary" type="submit">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-3 col-md-6 col-12">
                                <select class="form-select" onchange="filterStatus(this.value)">
                                    <option value="">Tous les statuts</option>
                                    <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Actif</option>
                                    <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Inactif</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- Table --}}
                    <div class="card-body p-0">
                        @if($categories->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-centered table-hover text-nowrap table-borderless mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Icône</th>
                                        <th>Nom</th>
                                        <th>Section</th>
                                        <th>Description</th>
                                        <th>Produits liés</th>
                                        <th>Statut</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                    <tr id="category-{{ $category->id }}">
                                        <td>
                                            @if($category->icon_cat)
                                                <img src="{{ asset('storage/' . $category->icon_cat) }}"
                                                     alt="{{ $category->name }}"
                                                     class="icon-shape icon-sm">
                                            @else
                                                <div class="icon-shape icon-sm bg-light rounded d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-tag text-muted"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="fw-bold">{{ $category->name }}</span>
                                        </td>
                                        <td>
                                            @php
                                                $sectionBadge = match($category->section?->value ?? $category->section) {
                                                    'product' => ['bg-primary', 'bi-box-seam', 'Produit'],
                                                    'service' => ['bg-success', 'bi-tools', 'Service'],
                                                    'rental'  => ['bg-warning', 'bi-key', 'Location'],
                                                    default   => ['bg-secondary', 'bi-grid', 'N/A'],
                                                };
                                            @endphp
                                            <span class="badge {{ $sectionBadge[0] }}">
                                                <i class="bi {{ $sectionBadge[1] }} me-1"></i>
                                                {{ $sectionBadge[2] }}
                                            </span>
                                        </td>
                                        <td>
                                            <small class="text-muted">
                                                {{ Str::limit($category->description, 40) ?? '-' }}
                                            </small>
                                        </td>
                                        <td>
                                            <span class="badge bg-light text-dark">
                                                {{ $category->products->count() }} produit(s)
                                            </span>
                                        </td>
                                        <td>
                                            @if($category->status == 1)
                                                <span class="badge bg-light-success text-dark-success">
                                                    <i class="bi bi-check-circle"></i> Actif
                                                </span>
                                            @else
                                                <span class="badge bg-light-danger text-dark-danger">
                                                    <i class="bi bi-x-circle"></i> Inactif
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="text-reset" data-bs-toggle="dropdown">
                                                    <i class="feather-icon icon-more-vertical fs-5"></i>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" href="#"
                                                           onclick="toggleStatus({{ $category->id }}, {{ $category->status }})">
                                                            <i class="bi bi-toggle-{{ $category->status ? 'off' : 'on' }} me-3"></i>
                                                            {{ $category->status ? 'Désactiver' : 'Activer' }}
                                                        </a>
                                                    </li>
                                                    <li><hr class="dropdown-divider"></li>
                                                    <li>
                                                        <a class="dropdown-item text-danger" href="#"
                                                           onclick="deleteCategory({{ $category->id }})">
                                                            <i class="bi bi-trash me-3"></i>Supprimer
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <div class="text-center py-8">
                            <i class="bi bi-tags display-4 text-muted"></i>
                            <h4 class="mt-4">Aucune catégorie trouvée</h4>
                            <p class="text-muted">Commencez par ajouter une catégorie.</p>
                            <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#modalAddCategory">
                                <i class="bi bi-plus-circle me-2"></i>Ajouter une catégorie
                            </button>
                        </div>
                        @endif
                    </div>

                    {{-- Pagination --}}
                    @if($categories->hasPages())
                    <div class="border-top d-md-flex justify-content-between align-items-center px-6 py-6">
                        <span>Affichage {{ $categories->firstItem() }} à {{ $categories->lastItem() }} sur {{ $categories->total() }} entrées</span>
                        <nav class="mt-2 mt-md-0">
                            {{ $categories->links('pagination::bootstrap-5') }}
                        </nav>
                    </div>
                    @endif

                </div>
            </div>
        </div>

    </div>
</main>

{{-- Modal Ajout catégorie --}}
<div class="modal fade" id="modalAddCategory" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="bi bi-plus-circle me-2"></i>Ajouter une catégorie
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">

                    {{-- Erreurs --}}
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    {{-- Section --}}
                    <div class="mb-3">
                        <label class="form-label">Section <span class="text-danger">*</span></label>
                        <select class="form-select @error('section') is-invalid @enderror" name="section" required>
                            <option value="">-- Choisir --</option>
                            <option value="product" {{ old('section') == 'product' ? 'selected' : '' }}>
                                Produit
                            </option>
                            <option value="service" {{ old('section') == 'service' ? 'selected' : '' }}>
                                Service
                            </option>
                            <option value="rental" {{ old('section') == 'rental' ? 'selected' : '' }}>
                                Location
                            </option>
                        </select>
                        @error('section')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Nom --}}
                    <div class="mb-3">
                        <label class="form-label">Nom <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                               name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
                    </div>

                    {{-- Icône --}}
                    <div class="mb-3">
                        <label class="form-label">Icône (SVG, PNG, JPG — max 1MB)</label>
                        <input type="file" class="form-control @error('icon_cat') is-invalid @enderror"
                               name="icon_cat" accept=".svg,.png,.jpg,.jpeg"
                               onchange="previewIcon(event)">
                        @error('icon_cat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div id="iconPreview" class="mt-2" style="display:none;">
                            <img id="iconPreviewImg" src="" alt="Preview"
                                 style="width:48px; height:48px; object-fit:contain;">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-lg me-2"></i>Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

// Ouvrir le modal si erreurs de validation
@if($errors->any())
    const modal = new bootstrap.Modal(document.getElementById('modalAddCategory'));
    modal.show();
@endif

// Preview icône
function previewIcon(event) {
    const file = event.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = e => {
        document.getElementById('iconPreviewImg').src = e.target.result;
        document.getElementById('iconPreview').style.display = 'block';
    };
    reader.readAsDataURL(file);
}

// Filtre statut
function filterStatus(value) {
    const url = new URL(window.location.href);
    if (value) url.searchParams.set('status', value);
    else url.searchParams.delete('status');
    url.searchParams.delete('page');
    window.location.href = url.toString();
}

// Toggle statut
function toggleStatus(id, currentStatus) {
    fetch(`/admin/categories/${id}/toggle-status`, {
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' }
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            showAlert('success', data.message);
            setTimeout(() => window.location.reload(), 800);
        }
    });
}

// Supprimer
function deleteCategory(id) {
    if (!confirm('Supprimer cette catégorie ?')) return;
    fetch(`/admin/categories/${id}`, {
        method: 'DELETE',
        headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' }
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            document.getElementById(`category-${id}`).remove();
            showAlert('success', data.message);
        }
    });
}

// Alerte
function showAlert(type, message) {
    const div = document.createElement('div');
    div.className = `alert alert-${type} alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-3`;
    div.style.zIndex = '9999';
    div.innerHTML = `<i class="bi bi-check-circle me-2"></i>${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>`;
    document.body.appendChild(div);
    setTimeout(() => div.remove(), 4000);
}
</script>
@endsection