@extends('base') 
@section('style')

<link href="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.7/quill.snow.min.css" rel="stylesheet">
<style>
    .ql-toolbar.ql-snow { border-radius:6px 6px 0 0; border-color:#dee2e6; background:#f8f9fa; }
    .ql-container.ql-snow { border-color:#dee2e6; font-size:15px; line-height:1.75; border-radius:0 0 6px 6px; }
    .ql-editor { min-height:200px; color:#1e293b; }

    .section-card {
        cursor: pointer;
        border: 2px solid #dee2e6;
        border-radius: 12px;
        transition: all .2s;
    }
    .section-card:hover,
    .section-card.active {
        border-color: #0d6efd;
        background: #f0f5ff;
    }
    .section-card.active .section-icon { color: #0d6efd; }

    #imagePreviewBox {
        border: 2px dashed #dee2e6;
        border-radius: 10px;
        min-height: 160px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        cursor: pointer;
        transition: border-color .2s;
    }
    #imagePreviewBox:hover { border-color: #0d6efd; }
    #imagePreviewBox img { width:100%; height:200px; object-fit:cover; border-radius:8px; }
</style>
@endsection
@section('content')


<main class="main-content-wrapper py-8">
<div class="container">

    {{-- Header --}}
    <div class="row mb-6">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-1">
                        {{ isset($item) ? 'Modifier l\'article' : 'Ajouter un article à troquer' }}
                    </h2>
                    <p class="text-muted mb-0">
                        {{ isset($item) ? 'Mettez à jour les informations de votre article' : 'Décrivez ce que vous souhaitez proposer à l\'échange' }}
                    </p>
                </div>
                <a href="{{ route('account.my-items') }}" class="btn btn-light">
                    <i class="bi bi-arrow-left me-2"></i>Retour
                </a>
            </div>
        </div>
    </div>

    {{-- Alertes erreurs --}}
    @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show">
        <ul class="mb-0 small">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <form action="{{ isset($item) ? route('account.my-items-update', $item->uuid) : route('account.my-items-store') }}"
          method="POST" enctype="multipart/form-data" id="itemForm">
        @csrf
        @if(isset($item)) @method('PUT') @endif

        <div class="row g-4">

            {{-- ══════════════════════════ --}}
            {{-- COLONNE GAUCHE            --}}
            {{-- ══════════════════════════ --}}
            <div class="col-lg-8">

                {{-- Type d'article --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h5 class="mb-4">Type d'article <span class="text-danger">*</span></h5>

                        <div class="row g-3">
                            {{-- Produit --}}
                            <div class="col-4">
                                <div class="section-card p-3 text-center {{ old('section', $item->section ?? '') === 'product' ? 'active' : '' }}"
                                     onclick="selectSection('product')">
                                    <i class="bi bi-box-seam section-icon fs-2 text-muted d-block mb-2"></i>
                                    <span class="fw-semibold">Produit</span>
                                    <small class="d-block text-muted mt-1">Objet physique</small>
                                </div>
                            </div>
                            {{-- Service --}}
                            <div class="col-4">
                                <div class="section-card p-3 text-center {{ old('section', $item->section ?? '') === 'service' ? 'active' : '' }}"
                                     onclick="selectSection('service')">
                                    <i class="bi bi-tools section-icon fs-2 text-muted d-block mb-2"></i>
                                    <span class="fw-semibold">Service</span>
                                    <small class="d-block text-muted mt-1">Prestation, savoir-faire</small>
                                </div>
                            </div>
                            {{-- Location --}}
                            <div class="col-4">
                                <div class="section-card p-3 text-center {{ old('section', $item->section ?? '') === 'rental' ? 'active' : '' }}"
                                     onclick="selectSection('rental')">
                                    <i class="bi bi-calendar-check section-icon fs-2 text-muted d-block mb-2"></i>
                                    <span class="fw-semibold">Location</span>
                                    <small class="d-block text-muted mt-1">Mise à disposition temporaire</small>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="section" id="section_input"
                               value="{{ old('section', $item->section ?? 'product') }}">
                        @error('section')
                        <div class="text-danger small mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Informations de base --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h5 class="mb-4">Informations</h5>

                        <div class="row g-3">
                            {{-- Nom --}}
                            <div class="col-12">
                                <label class="form-label fw-medium">
                                    Nom de l'article <span class="text-danger">*</span>
                                </label>
                                <input type="text"
                                       class="form-control form-control-lg @error('name') is-invalid @enderror"
                                       name="name"
                                       value="{{ old('name', $item->name ?? '') }}"
                                       placeholder="Ex: Vélo de montagne, Cours de piano, Studio à louer...">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Catégorie --}}
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Catégorie</label>
                                <select class="form-select" name="type_id" id="type_select">
                                    <option value="">-- Choisir --</option>
                                    @foreach($categories as $section => $cats)
                                    <optgroup label="{{ $section === 'product' ? '📦 Produits' : ($section === 'service' ? '🔧 Services' : '📅 Locations') }}">
                                        @foreach($cats as $cat)
                                        <option value="{{ $cat->id }}"
                                            data-section="{{ $cat->section }}"
                                            {{ old('type_id', $item->type_id ?? '') == $cat->id ? 'selected' : '' }}>
                                            {{ $cat->name }}
                                        </option>
                                        @endforeach
                                    </optgroup>
                                    @endforeach
                                </select>
                            </div>

                            {{-- État --}}
                            <div class="col-md-6">
                                <label class="form-label fw-medium">État / Condition</label>
                                <select class="form-select" name="condition">
                                    <option value="">-- Choisir --</option>
                                    @foreach(['Neuf', 'Très bon état', 'Bon état', 'État correct', 'Pour pièces'] as $cond)
                                    <option value="{{ $cond }}"
                                        {{ old('condition', $item->condition ?? '') === $cond ? 'selected' : '' }}>
                                        {{ $cond }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Ville --}}
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Ville</label>
                                <input type="text" class="form-control" name="city"
                                       value="{{ old('city', $item->city ?? auth()->user()->city ?? '') }}"
                                       placeholder="Votre ville">
                            </div>

                            {{-- Complément monétaire --}}
                            <div class="col-md-6">
                                <label class="form-label fw-medium">
                                    Complément monétaire souhaité
                                    <small class="text-muted fw-normal">(optionnel)</small>
                                </label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="price"
                                           value="{{ old('price', $item->price ?? 0) }}"
                                           min="0" step="100" placeholder="0">
                                    <span class="input-group-text">FCFA</span>
                                </div>
                                <small class="text-muted">Laissez 0 pour un troc sans complément</small>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Description --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h5 class="mb-3">Description</h5>

                        <textarea name="description" id="description_hidden"
                                  style="display:none;">{{ old('description', $item->description ?? '') }}</textarea>
                        <div id="description_editor"></div>
                    </div>
                </div>

                {{-- Ce que vous voulez en échange --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h5 class="mb-3">
                            <i class="bi bi-arrow-left-right me-2 text-primary"></i>
                            Ce que vous recherchez en échange
                            <small class="text-muted fw-normal fs-6">(optionnel)</small>
                        </h5>
                        <textarea class="form-control" name="features" rows="3"
                                  placeholder="Décrivez ce que vous aimeriez recevoir en échange... Ex: smartphone récent, cours de cuisine, matériel photo...">{{ old('features', $item->features ?? '') }}</textarea>
                    </div>
                </div>

            </div>

            {{-- ══════════════════════════ --}}
            {{-- COLONNE DROITE            --}}
            {{-- ══════════════════════════ --}}
            <div class="col-lg-4">

                {{-- Photo --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h5 class="mb-3">Photo de l'article</h5>

                        <div id="imagePreviewBox" onclick="document.getElementById('coverInput').click()">
                            @if(isset($item) && $item->file_url)
                            <img src="{{ asset('storage/' . $item->file_url) }}"
                                 id="imagePreview" alt="Photo actuelle">
                            @else
                            <div class="text-center text-muted" id="imagePlaceholder">
                                <i class="bi bi-camera fs-1 d-block mb-2"></i>
                                <span class="small">Cliquez pour ajouter une photo</span>
                            </div>
                            @endif
                        </div>

                        <input type="file" id="coverInput" name="cover"
                               accept="image/*" class="d-none"
                               onchange="previewImage(this)">

                        <small class="text-muted d-block mt-2 text-center">
                            JPG, PNG, WebP. Max 3MB. Recadrée à 800×600px.
                        </small>
                    </div>
                </div>

                {{-- Disponibilité --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h5 class="mb-3">Disponibilité</h5>

                        @foreach(['available' => ['Disponible', 'success', 'check-circle'], 'pending' => ['En négociation', 'warning', 'clock'], 'exchanged' => ['Échangé', 'danger', 'x-circle']] as $val => $meta)
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio"
                                   name="exchange_status" value="{{ $val }}"
                                   id="status_{{ $val }}"
                                   {{ old('exchange_status', $item->exchange_status ?? 'available') === $val ? 'checked' : '' }}>
                            <label class="form-check-label" for="status_{{ $val }}">
                                <i class="bi bi-{{ $meta[2] }} text-{{ $meta[1] }} me-1"></i>
                                {{ $meta[0] }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Submit --}}
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="bi bi-check-circle me-2"></i>
                        {{ isset($item) ? 'Mettre à jour' : 'Publier l\'article' }}
                    </button>
                    <a href="{{ route('account.my-items') }}" class="btn btn-outline-secondary">
                        Annuler
                    </a>
                </div>

            </div>
        </div>
    </form>

</div>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.7/quill.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {

    // ── Sélection section ──────────────────────────────
    window.selectSection = function(val) {
        document.querySelectorAll('.section-card').forEach(c => c.classList.remove('active'));
        event.currentTarget.classList.add('active');
        document.getElementById('section_input').value = val;
    };

    // Init section active
    const currentSection = document.getElementById('section_input').value;
    document.querySelectorAll('.section-card').forEach((card, i) => {
        const sections = ['product', 'service', 'rental'];
        if (sections[i] === currentSection) card.classList.add('active');
    });

    // ── Quill description ─────────────────────────────
    var quill = new Quill('#description_editor', {
        theme: 'snow',
        placeholder: 'Décrivez votre article en détail : dimensions, marque, historique...',
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline'],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                ['clean']
            ]
        }
    });

    var existing = document.getElementById('description_hidden').value;
    if (existing.trim()) quill.root.innerHTML = existing;

    document.getElementById('itemForm').addEventListener('submit', function () {
        document.getElementById('description_hidden').value = quill.root.innerHTML;
    });

    // ── Preview image ─────────────────────────────────
    window.previewImage = function(input) {
        if (!input.files || !input.files[0]) return;
        const reader = new FileReader();
        reader.onload = function(e) {
            const box = document.getElementById('imagePreviewBox');
            box.innerHTML = `<img src="${e.target.result}" style="width:100%;height:200px;object-fit:cover;border-radius:8px;">`;
        };
        reader.readAsDataURL(input.files[0]);
    };

});
</script>

@endsection