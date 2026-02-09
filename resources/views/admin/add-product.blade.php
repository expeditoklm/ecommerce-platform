@extends('admin/base')
@section('contenue')

<main class="main-content-wrapper">
    <div class="container">
        <!-- En-tête -->
        <div class="row mb-8">
            <div class="col-md-12">
                <div class="d-md-flex justify-content-between align-items-center">
                    <div>
                         <h2>{{ isset($product) ? 'Edit Product' : 'Add New Product' }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Tableau de bord</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.products') }}">Produits</a></li>
                           <li class="breadcrumb-item active">{{ isset($product) ? 'Edit' : 'Add' }}</li>
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
        <form action="{{ isset($product) ? route('admin.update-product', $product->id) : route('admin.add-product2') }}" 
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
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" 
                                          value="{{ old('name', $product->name ?? '') }}"  placeholder="Ex: iPhone 13 Pro Max"
                                           required>
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

                                <!-- Catégories (Sélection multiple) -->
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label">Catégories <span class="text-danger">*</span></label>
                                    <select class="form-select @error('categories') is-invalid @enderror" name="categories[]" multiple size="4" required>
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
                                    <small class="text-muted">Maintenez Ctrl (Windows) ou Cmd (Mac) pour sélectionner plusieurs catégories</small>
                                </div>

                                <!-- Prix -->
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label">Prix (FCFA) <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="price" 
                                          value="{{ old('price', $product->price ?? '') }}" step="0.01" min="0" required>
                                           @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Stock -->
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label">Stock disponible <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="stock" 
                                          value="{{ old('stock', $product->stock ?? '') }}"  min="0" required>
                                          @error('stock')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Segment cible -->
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label">Segment cible</label>
                                    <input type="text" class="form-control" name="target_segment" 
                                           value="{{ old('target_segment', $product->target_segment ?? '') }}" 
                                           placeholder="Ex: Premium, Budget, Familial">
                                </div>

                                <!-- Description -->
                                <div class="col-12 mb-3">
                                    <label class="form-label">Description du produit</label>
                                    <textarea class="form-control" name="description" rows="5" 
                                              placeholder="Décrivez les caractéristiques du produit...">{{ old('description', $product->description ?? '') }}</textarea>
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
                                <!-- En promotion -->
                                <div class="col-12 mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="is_on_sale" 
                                               id="isOnSale" value="1" 
                                               {{ old('is_on_sale') ? 'checked' : '' }}
                                               onchange="toggleSaleFields()">
                                        <label class="form-check-label" for="isOnSale">
                                            Activer la promotion
                                        </label>
                                    </div>
                                </div>

                                <div id="saleFields" class="row" style="display: {{ old('is_on_sale') ? 'block' : 'none' }};">
                                    <!-- Prix promo -->
                                    <div class="col-lg-6 mb-3">
                                        <label class="form-label">Prix en promotion (FCFA)</label>
                                        <input type="number" class="form-control" name="sale_price" 
                                               value="{{ old('sale_price', $product->sale_price ?? '') }}" step="0.01" min="0">
                                    </div>

                                    <!-- Date fin promo -->
                                    <div class="col-lg-6 mb-3">
                                        <label class="form-label">Date de fin de promotion</label>
                                        <input type="date" class="form-control" name="sale_end_date" 
                                               value="{{ old('sale_end_date', $product->sale_end_date ?? '') }}">
                                    </div>

                                    <!-- Remise exclusive -->
                                    <div class="col-lg-6 mb-3">
                                        <label class="form-label">Remise exclusive (%)</label>
                                        <input type="number" class="form-control" name="exclusive_discount" 
                                               value="{{ old('exclusive_discount', $product->exclusive_discount ?? '') }}" step="0.01" min="0" max="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- Images existantes (si édition) -->
                            @if(isset($product) && $product->images->count() > 0)
                                <div class="mb-4">
                                    <label class="form-label">Current Images</label>
                                    <div class="row g-3">
                                        @foreach($product->images as $image)
                                            <div class="col-md-2" id="image-{{ $image->id }}">
                                                <div class="position-relative">
                                                    <img src="{{ asset($image->url) }}" class="img-fluid rounded">
                                                    <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1"
                                                            onclick="deleteImage({{ $image->id }})">
                                                        <i class="bi bi-x"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif




                    <!-- Images et fichiers -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="mb-0">Images et fichiers</h4>
                        </div>
                        <div class="card-body">
                            <!-- Images du produit avec style Dropzone -->
                            <div class="mb-4">
                                <label class="form-label">{{ isset($product) ? 'Add New Images' : 'Product Images' }}</label>
                                <div class="dropzone-wrapper border-dashed rounded-2 p-4 text-center bg-light">
                                    <input type="file" class="form-control d-none" id="imageInput" name="images[]" 
                                           accept="image/*" multiple onchange="previewImages(event)">
                                    <label for="imageInput" class="cursor-pointer">
                                        <i class="bi bi-cloud-upload fs-1 text-muted"></i>
                                        <p class="mb-0 text-muted">Cliquez pour sélectionner des images ou glissez-déposez</p>
                                        <small class="text-muted">Formats acceptés: JPG, PNG, GIF (Max 5MB par image)</small>
                                    </label>
                                </div>
                                
                                <!-- Prévisualisation des images -->
                                <div id="imagePreview" class="mt-3 row g-3"></div>
                            </div>

                            <!-- Fichier document -->
                            <div class="mb-3">
                                <label class="form-label">Fichier document (Fiche technique, Manuel, etc.)</label>
                                <input type="file" class="form-control" name="file_url" 
                                       accept=".pdf,.doc,.docx">
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
                            <!-- Statut -->
                            <div class="mb-3">
                                <label class="form-label">Statut <span class="text-danger">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" 
                                           id="statusActive" value="1" 
                                           {{ old('status', $product->status ?? 1) == 1 ? 'selected' : '' }}>
                                    <label class="form-check-label" for="statusActive">
                                        <i class="bi bi-check-circle text-success"></i> Actif
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" 
                                           id="statusInactive" value="0"
                                           {{ old('status', $product->status ?? 1) == 0 ? 'selected' : '' }}>
                                    <label class="form-check-label" for="statusInactive">
                                        <i class="bi bi-x-circle text-danger"></i> Inactif
                                    </label>
                                </div>
                            </div>

                            <hr>

                            <!-- Affichage automatique -->
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="auto_display" 
                                           id="autoDisplay" value="1" 
                                           {{ old('auto_display', '1') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="autoDisplay">
                                        Affichage automatique
                                    </label>
                                </div>
                                <small class="text-muted">Le produit sera affiché automatiquement selon les critères du système</small>
                            </div>

                            <!-- Affichage manuel -->
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="manual_display" 
                                           id="manualDisplay" value="1"
                                           {{ old('manual_display') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="manualDisplay">
                                        Affichage manuel prioritaire
                                    </label>
                                </div>
                                <small class="text-muted">Force l'affichage du produit en priorité</small>
                            </div>

                            <!-- Priorité carrousel -->
                            <div class="mb-3">
                                <label class="form-label">Priorité dans le carrousel</label>
                                <input type="number" class="form-control" name="carousel_priority" 
                                       value="{{ old('carousel_priority', $product->carousel_priority ?? 0) }}" min="0" max="100">
                                <small class="text-muted">Plus le nombre est élevé, plus le produit sera visible (0-100)</small>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-lg me-2"></i>Créer le produit
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
                                    <li>Le slug sera généré automatiquement</li>
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
.cursor-pointer {
    cursor: pointer;
}

.border-dashed {
    border: 2px dashed #dee2e6;
}

.dropzone-wrapper:hover {
    border-color: #0d6efd;
    background-color: #f8f9fa;
}

.image-preview-container {
    position: relative;
}

.image-preview-container .btn-remove {
    position: absolute;
    top: 5px;
    right: 5px;
    z-index: 10;
}
</style>

<script>
// Stocker les fichiers sélectionnés
let selectedFiles = [];

// Afficher/cacher les champs de promotion
function toggleSaleFields() {
    const isChecked = document.getElementById('isOnSale').checked;
    document.getElementById('saleFields').style.display = isChecked ? 'block' : 'none';
}

// Prévisualisation des images avec possibilité de suppression
function previewImages(event) {
    const preview = document.getElementById('imagePreview');
    const files = Array.from(event.target.files);
    
    // Ajouter les nouveaux fichiers à la liste
    files.forEach(file => {
        if (!selectedFiles.find(f => f.name === file.name && f.size === file.size)) {
            selectedFiles.push(file);
        }
    });
    
    // Vider la prévisualisation
    preview.innerHTML = '';
    
    // Afficher toutes les images sélectionnées
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
                    <img src="${e.target.result}" class="card-img-top" alt="Preview" style="height: 150px; object-fit: cover;">
                    <div class="card-body p-2">
                        <small class="text-muted d-block text-truncate">${file.name}</small>
                        <small class="text-muted">${(file.size / 1024).toFixed(2)} KB</small>
                    </div>
                </div>
            `;
            preview.appendChild(col);
        };
        
        reader.readAsDataURL(file);
    });
    
    // Mettre à jour l'input avec les fichiers restants
    updateFileInput();
}

// Supprimer une image de la prévisualisation
function removeImage(index) {
    selectedFiles.splice(index, 1);
    
    // Réafficher la prévisualisation
    const preview = document.getElementById('imagePreview');
    preview.innerHTML = '';
    
    selectedFiles.forEach((file, idx) => {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            const col = document.createElement('div');
            col.className = 'col-md-3';
            col.innerHTML = `
                <div class="card image-preview-container">
                    <button type="button" class="btn btn-danger btn-sm btn-remove" onclick="removeImage(${idx})">
                        <i class="bi bi-trash"></i>
                    </button>
                    <img src="${e.target.result}" class="card-img-top" alt="Preview" style="height: 150px; object-fit: cover;">
                    <div class="card-body p-2">
                        <small class="text-muted d-block text-truncate">${file.name}</small>
                        <small class="text-muted">${(file.size / 1024).toFixed(2)} KB</small>
                    </div>
                </div>
            `;
            preview.appendChild(col);
        };
        
        reader.readAsDataURL(file);
    });
    
    updateFileInput();
}

// Mettre à jour l'input file avec les fichiers restants
function updateFileInput() {
    const input = document.getElementById('imageInput');
    const dataTransfer = new DataTransfer();
    
    selectedFiles.forEach(file => {
        dataTransfer.items.add(file);
    });
    
    input.files = dataTransfer.files;
}
</script>

@endsection