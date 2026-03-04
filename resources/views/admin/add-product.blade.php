@php
    use App\Enums\ProductCondition;
@endphp
@extends('admin/base')
@section('contenue')

<main class="main-content-wrapper">
    <div class="container">
        <!-- En-tête -->
        <div class="row mb-8">
            <div class="col-md-12">
                <div class="d-md-flex justify-content-between align-items-center">
                    <div>
                        <h2>{{ isset($product) ? 'Modifier le produit' : 'Ajouter un produit' }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Tableau de bord</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.products') }}">Produits</a></li>
                                <li class="breadcrumb-item active">{{ isset($product) ? 'Modifier' : 'Ajouter' }}</li>
                            </ol>
                        </nav>
                    </div>
                    <div>
                        <a href="{{ route('admin.products') }}" class="btn btn-light">
                            <i class="bi bi-arrow-left me-2"></i>Retour aux produits
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Messages d'erreur -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Erreurs:</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Formulaire -->
        <form action="{{ isset($product) ? route('admin.update-product', $product->id) : route('admin.add-product') }}"
              method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <!-- Colonne gauche - Informations principales -->
                <div class="col-lg-8 col-12">

                    <!-- Informations de base -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="mb-0">Informations de base</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <!-- Nom du produit -->
                                <div class="col-lg-12 mb-3">
                                    <label class="form-label">Nom du produit <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           name="name" value="{{ old('name', $product->name ?? '') }}"
                                           placeholder="Ex: iPhone 13 Pro Max" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Type -->
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label">Type de produit <span class="text-danger">*</span></label>
                                    <select class="form-select @error('type_id') is-invalid @enderror" name="type_id" required>
                                        <option value="">Sélectionner un type</option>
                                        @foreach($types as $type)
                                            <option value="{{ $type->id }}"
                                                {{ old('type_id', $product->type_id ?? '') == $type->id ? 'selected' : '' }}>
                                                {{ $type->label }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('type_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Catégories -->
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label">Catégories <span class="text-danger">*</span></label>
                                    <select class="form-select @error('categories') is-invalid @enderror"
                                            name="categories[]" multiple size="4" required>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ isset($product) && $product->categories->contains($category->id) ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('categories')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">Ctrl (Windows) ou Cmd (Mac) pour sélection multiple</small>
                                </div>


                                <!-- Segment cible -->
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label">Segment cible</label>
                                    <input type="text" class="form-control" name="target_segment"
                                           value="{{ old('target_segment', $product->target_segment ?? '') }}"
                                           placeholder="Ex: Premium, Budget, Familial">
                                </div>

                                <!-- Prix -->
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label">Prix (FCFA) <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control @error('price') is-invalid @enderror"
                                           name="price" value="{{ old('price', $product->price ?? '') }}"
                                           step="0.01" min="0" required>
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Stock -->
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label">Stock disponible <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control @error('stock') is-invalid @enderror"
                                           name="stock" value="{{ old('stock', $product->stock ?? '') }}"
                                           min="0" required>
                                    @error('stock')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="col-12 mb-3">
                                    <label class="form-label">Description du produit</label>
                                    <textarea class="form-control" name="description" rows="5"
                                              placeholder="Décrivez les caractéristiques du produit...">{{ old('description', $product->description ?? '') }}</textarea>
                                </div>
<div class="col-12 mb-3">
    <label class="form-label">Etat du produit</label>
    <div class="d-flex flex-wrap gap-3 mt-2">

        @foreach(\App\Enums\ProductCondition::cases() as $condition)
            @php
                $conditionColor = match($condition) {
                    ProductCondition::Neuf           => 'success',
    ProductCondition::TresBonEtat    => 'primary',
    ProductCondition::BonEtat        => 'info',
    ProductCondition::EtatAcceptable => 'warning',
    ProductCondition::Usage          => 'danger',
                };
                $isChecked = old('condition', $product->condition ?? '') === $condition->value;
            @endphp

            <div class="form-check">
                <input class="form-check-input" 
                       type="radio" 
                       name="condition"
                       id="condition_{{ $loop->index }}"
                       value="{{ $condition->value }}"
                       {{ $isChecked ? 'checked' : '' }}>
                <label class="form-check-label" for="condition_{{ $loop->index }}">
                    <span class="badge bg-{{ $conditionColor }}">
                        {{ $condition->value }}
                    </span>
                </label>
            </div>
        @endforeach

    </div>
    @error('condition')
        <div class="text-danger small mt-1">{{ $message }}</div>
    @enderror
</div>

                            </div>
                        </div>
                    </div>

                    <!-- Localisation du produit -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="mb-0">Localisation du produit</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <!-- Ville -->
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label">Ville <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('city') is-invalid @enderror"
                                           name="city" value="{{ old('city', $product->city ?? '') }}"
                                           placeholder="Ex: Cotonou, Abidjan, Dakar" required>
                                    @error('city')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Quartier -->
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label">Quartier</label>
                                    <input type="text" class="form-control @error('district') is-invalid @enderror"
                                           name="district" value="{{ old('district', $product->district ?? '') }}"
                                           placeholder="Ex: Akpakpa, Cadjehoun...">
                                    @error('district')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Promotion -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="mb-0">Promotion et réductions</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-12 mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="is_on_sale"
                                               id="isOnSale" value="1"
                                               {{ old('is_on_sale', $product->is_on_sale ?? false) ? 'checked' : '' }}
                                               onchange="toggleSaleFields()">
                                        <label class="form-check-label" for="isOnSale">
                                            Activer la promotion
                                        </label>
                                    </div>
                                </div>

                                <div id="saleFields" class="row"
                                     style="display: {{ old('is_on_sale', $product->is_on_sale ?? false) ? 'block' : 'none' }};">

                                    <div class="col-lg-6 mb-3">
                                        <label class="form-label">Prix en promotion (FCFA)</label>
                                        <input type="number" class="form-control" name="sale_price"
                                               value="{{ old('sale_price', $product->sale_price ?? '') }}"
                                               step="0.01" min="0">
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label class="form-label">Date de fin de promotion</label>
                                        <input type="date" class="form-control" name="sale_end_date"
                                               value="{{ old('sale_end_date', isset($product->sale_end_date) ? $product->sale_end_date->format('Y-m-d') : '') }}">
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label class="form-label">Remise exclusive (%)</label>
                                        <input type="number" class="form-control" name="exclusive_discount"
                                               value="{{ old('exclusive_discount', $product->exclusive_discount ?? '') }}"
                                               step="0.01" min="0" max="100">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Images existantes (si édition) -->
                    @if(isset($product) && $product->images->count() > 0)
                        <div class="card mb-4">
                            <div class="card-header">
                                <h4 class="mb-0">Images actuelles</h4>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    @foreach($product->images as $image)
                                        <div class="col-md-2" id="image-{{ $image->id }}">
                                            <div class="position-relative">
                                                <img src="{{ asset($image->url) }}" class="img-fluid rounded">
                                                <button type="button"
                                                        class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1"
                                                        onclick="deleteImage({{ $image->id }})">
                                                    <i class="bi bi-x"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Images et fichiers -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="mb-0">{{ isset($product) ? 'Ajouter de nouvelles images' : 'Images du produit' }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="dropzone-wrapper border-dashed rounded-2 p-4 text-center bg-light">
                                    <input type="file" class="form-control d-none" id="imageInput"
                                           name="images[]" accept="image/*" multiple
                                           onchange="previewImages(event)">
                                    <label for="imageInput" class="cursor-pointer">
                                        <i class="bi bi-cloud-upload fs-1 text-muted"></i>
                                        <p class="mb-0 text-muted">Cliquez pour sélectionner des images ou glissez-déposez</p>
                                        <small class="text-muted">Formats acceptés: JPG, PNG, GIF (Max 5MB par image)</small>
                                    </label>
                                </div>
                                <div id="imagePreview" class="mt-3 row g-3"></div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Fichier document (Fiche technique, Manuel, etc.)</label>
                                <input type="file" class="form-control" name="file_url" accept=".pdf,.doc,.docx">
                                <small class="text-muted">Formats acceptés: PDF, DOC, DOCX (Max 10MB)</small>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Colonne droite - Paramètres -->
                <div class="col-lg-4 col-12">

                    <!-- Statut et visibilité -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="mb-0">Statut et visibilité</h4>
                        </div>
                        <div class="card-body">

                            <div class="mb-3">
                                <label class="form-label">Statut <span class="text-danger">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status"
                                           id="statusActive" value="1"
                                           {{ old('status', $product->status ?? 1) == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="statusActive">
                                        <i class="bi bi-check-circle text-success"></i> Actif
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status"
                                           id="statusInactive" value="0"
                                           {{ old('status', $product->status ?? 1) == 0 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="statusInactive">
                                        <i class="bi bi-x-circle text-danger"></i> Inactif
                                    </label>
                                </div>
                            </div>

                            <hr>

                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="auto_display"
                                           id="autoDisplay" value="1"
                                           {{ old('auto_display', $product->auto_display ?? true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="autoDisplay">
                                        Affichage automatique
                                    </label>
                                </div>
                                <small class="text-muted">Affiché automatiquement selon les critères du système</small>
                            </div>

                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="manual_display"
                                           id="manualDisplay" value="1"
                                           {{ old('manual_display', $product->manual_display ?? false) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="manualDisplay">
                                        Affichage manuel prioritaire
                                    </label>
                                </div>
                                <small class="text-muted">Force l'affichage du produit en priorité</small>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Priorité dans le carrousel</label>
                                <input type="number" class="form-control" name="carousel_priority"
                                       value="{{ old('carousel_priority', $product->carousel_priority ?? 0) }}"
                                       min="0" max="100">
                                <small class="text-muted">Plus le nombre est élevé, plus le produit sera visible (0-100)</small>
                            </div>

                        </div>
                    </div>

                    <!-- Infos générées automatiquement (lecture seule en édition) -->
                    @if(isset($product))
                        <div class="card mb-4">
                            <div class="card-header">
                                <h4 class="mb-0">Informations système</h4>
                            </div>
                            <div class="card-body">
                                <div class="mb-2">
                                    <label class="form-label text-muted small">Code produit</label>
                                    <input type="text" class="form-control form-control-sm"
                                           value="{{ $product->code ?? 'N/A' }}" readonly disabled>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label text-muted small">Date de mise en ligne</label>
                                    <input type="text" class="form-control form-control-sm"
                                           value="{{ isset($product->online_date) ? $product->online_date->format('d/m/Y') : 'N/A' }}"
                                           readonly disabled>
                                </div>
                                <small class="text-muted">Ces informations sont générées automatiquement.</small>
                            </div>
                        </div>
                    @endif

                    <!-- Actions -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-lg me-2"></i>
                                    {{ isset($product) ? 'Mettre à jour' : 'Créer le produit' }}
                                </button>
                                <a href="{{ route('admin.products') }}" class="btn btn-outline-secondary">
                                    <i class="bi bi-x-lg me-2"></i>Annuler
                                </a>
                            </div>

                            <hr class="my-3">

                            <div class="text-muted small">
                                <p class="mb-1"><strong>Note:</strong></p>
                                <ul class="ps-3 mb-0">
                                    <li>Les champs avec <span class="text-danger">*</span> sont obligatoires</li>
                                    <li>Le slug et le code seront générés automatiquement</li>
                                    <li>Le produit sera lié à votre boutique</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</main>

<style>
.cursor-pointer { cursor: pointer; }
.border-dashed { border: 2px dashed #dee2e6; }
.dropzone-wrapper:hover { border-color: #0d6efd; background-color: #f8f9fa; }
.image-preview-container { position: relative; }
.image-preview-container .btn-remove { position: absolute; top: 5px; right: 5px; z-index: 10; }
</style>

<script>
let selectedFiles = [];

function toggleSaleFields() {
    const isChecked = document.getElementById('isOnSale').checked;
    document.getElementById('saleFields').style.display = isChecked ? 'block' : 'none';
}

function previewImages(event) {
    const preview = document.getElementById('imagePreview');
    const files = Array.from(event.target.files);

    files.forEach(file => {
        if (!selectedFiles.find(f => f.name === file.name && f.size === file.size)) {
            selectedFiles.push(file);
        }
    });

    renderPreviews();
}

function removeImage(index) {
    selectedFiles.splice(index, 1);
    renderPreviews();
}

function renderPreviews() {
    const preview = document.getElementById('imagePreview');
    preview.innerHTML = '';

    selectedFiles.forEach((file, index) => {
        const reader = new FileReader();
        reader.onload = function(e) {
            const col = document.createElement('div');
            col.className = 'col-md-3';
            col.innerHTML = `
                <div class="card image-preview-container">
                    <button type="button" class="btn btn-danger btn-sm btn-remove" onclick="removeImage(${index})">
                        <i class="bi bi-trash"></i>
                    </button>
                    <img src="${e.target.result}" class="card-img-top" style="height: 150px; object-fit: cover;">
                    <div class="card-body p-2">
                        <small class="text-muted d-block text-truncate">${file.name}</small>
                        <small class="text-muted">${(file.size / 1024).toFixed(2)} KB</small>
                    </div>
                </div>`;
            preview.appendChild(col);
        };
        reader.readAsDataURL(file);
    });

    updateFileInput();
}

function updateFileInput() {
    const input = document.getElementById('imageInput');
    const dataTransfer = new DataTransfer();
    selectedFiles.forEach(file => dataTransfer.items.add(file));
    input.files = dataTransfer.files;
}
</script>

@endsection