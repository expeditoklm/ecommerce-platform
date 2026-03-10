@extends('admin/base')
@section('contenue')

<main class="main-content-wrapper">
    <div class="container">

        {{-- En-tête --}}
        <div class="row mb-8">
            <div class="col-md-12">
                <div class="d-md-flex justify-content-between align-items-center">
                    <div>
                        <h2>{{ isset($shop) ? 'Modifier la boutique' : 'Créer une boutique' }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Tableau de bord</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.vendor-grid') }}">Mes boutiques</a></li>
                                <li class="breadcrumb-item active">{{ isset($shop) ? 'Modifier' : 'Créer' }}</li>
                            </ol>
                        </nav>
                    </div>
                    <div>
                        <a href="{{ route('admin.vendor-grid') }}" class="btn btn-light">
                            <i class="bi bi-arrow-left me-2"></i>Retour aux boutiques
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Messages d'erreur --}}
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Erreurs :</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        {{-- Formulaire --}}
        <form action="{{ isset($shop) ? route('admin.update-shop', $shop->uuid) : route('admin.store-shop') }}"
              method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($shop))
                @method('PUT')
            @endif

            <div class="row">

                {{-- Colonne gauche --}}
                <div class="col-lg-8 col-12">

                    {{-- Informations principales --}}
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="mb-0">Informations de la boutique</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                {{-- Nom --}}
                                <div class="col-lg-12 mb-3">
                                    <label class="form-label">Nom de la boutique <span class="text-danger">*</span></label>
                                    <input type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           name="name"
                                           value="{{ old('name', $shop->name ?? '') }}"
                                           placeholder="Ex: TechStore Cotonou"
                                           required>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Catégorie principale --}}
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label">Catégorie principale</label>
                                    <select class="form-select @error('main_category_id') is-invalid @enderror"
                                            name="main_category_id">
                                        <option value="">-- Aucune catégorie --</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('main_category_id', $shop->main_category_id ?? '') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('main_category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Website --}}
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label">Site web</label>
                                    <input type="url"
                                           class="form-control @error('website_url') is-invalid @enderror"
                                           name="website_url"
                                           value="{{ old('website_url', $shop->website_url ?? '') }}"
                                           placeholder="https://maboutique.com">
                                    @error('website_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Description --}}
                                <div class="col-12 mb-3">
                                    <label class="form-label">Description de la boutique</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror"
                                              name="description"
                                              rows="4"
                                              placeholder="Décrivez votre boutique, vos produits, votre spécialité...">{{ old('description', $shop->description ?? '') }}</textarea>
                                    @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Politique de retour --}}
                                <div class="col-12 mb-3">
                                    <label class="form-label">Politique de retour</label>
                                    <textarea class="form-control @error('return_policy') is-invalid @enderror"
                                              name="return_policy"
                                              rows="3"
                                              placeholder="Décrivez votre politique de retour et d'échange...">{{ old('return_policy', $shop->return_policy ?? '') }}</textarea>
                                    @error('return_policy')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- Localisation --}}
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="mb-0">Localisation</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                {{-- Adresse --}}
                                <div class="col-lg-12 mb-3">
                                    <label class="form-label">Adresse complète</label>
                                    <input type="text"
                                           class="form-control @error('address') is-invalid @enderror"
                                           name="address"
                                           value="{{ old('address', $shop->address ?? '') }}"
                                           placeholder="Ex: 12 rue de la Paix, Cotonou">
                                    @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Localisation (ville/pays) --}}
                                <div class="col-lg-12 mb-3">
                                    <label class="form-label">Ville / Pays</label>
                                    <input type="text"
                                           class="form-control @error('location') is-invalid @enderror"
                                           name="location"
                                           value="{{ old('location', $shop->location ?? '') }}"
                                           placeholder="Ex: Cotonou, Bénin">
                                    @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- Contacts --}}
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="mb-0">Informations de contact</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                {{-- Email de contact --}}
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label">Email de contact</label>
                                    <input type="email"
                                           class="form-control @error('contact_email') is-invalid @enderror"
                                           name="contact_email"
                                           value="{{ old('contact_email', $shop->contact_email ?? '') }}"
                                           placeholder="contact@maboutique.com">
                                    @error('contact_email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Téléphone de contact --}}
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label">Téléphone de contact</label>
                                    <input type="text"
                                           class="form-control @error('contact_phone') is-invalid @enderror"
                                           name="contact_phone"
                                           value="{{ old('contact_phone', $shop->contact_phone ?? '') }}"
                                           placeholder="+229 97 00 00 00">
                                    @error('contact_phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Téléphone principal --}}
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label">Téléphone principal</label>
                                    <input type="text"
                                           class="form-control @error('phone') is-invalid @enderror"
                                           name="phone"
                                           value="{{ old('phone', $shop->phone ?? '') }}"
                                           placeholder="+229 97 00 00 00">
                                    @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- Logo actuel (si édition) --}}
                    @if(isset($shop) && $shop->logo_url)
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="mb-0">Logo actuel</h4>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-4">
                                <img src="{{ asset('storage/' . $shop->logo_url) }}"
                                     alt="{{ $shop->name }}"
                                     class="rounded-circle"
                                     style="width:80px;height:80px;object-fit:cover;">
                                <div>
                                    <p class="mb-1 text-muted small">Logo actuel de la boutique</p>
                                    <button type="button" class="btn btn-sm btn-outline-danger"
                                            onclick="deleteLogo('{{ $shop->uuid }}')">
                                        <i class="bi bi-trash me-2"></i>Supprimer le logo
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    {{-- Upload logo --}}
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="mb-0">{{ isset($shop) ? 'Changer le logo' : 'Logo de la boutique' }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-info py-2 mb-3">
                                <i class="bi bi-info-circle me-2"></i>
                                <strong>Format conseillé :</strong> Image carrée — JPG, PNG, SVG — Max 1MB
                            </div>

                            <div class="dropzone-wrapper border-dashed rounded-2 p-4 text-center bg-light"
                                 id="logoDropzone">
                                <input type="file"
                                       class="form-control d-none"
                                       id="logoInput"
                                       name="logo_url"
                                       accept="image/jpeg,image/png,image/svg+xml"
                                       onchange="previewLogo(event)">
                                <label for="logoInput" class="cursor-pointer">
                                    <i class="bi bi-shop fs-1 text-muted"></i>
                                    <p class="mb-0 text-muted">Cliquez pour sélectionner un logo</p>
                                    <small class="text-muted">JPG, PNG, SVG — Max 1MB — Format carré recommandé</small>
                                </label>
                            </div>

                            {{-- Preview logo --}}
                            <div id="logoPreview" class="mt-3" style="display:none;">
                                <div class="d-flex align-items-center gap-3">
                                    <img id="logoPreviewImg"
                                         src=""
                                         alt="Preview"
                                         class="rounded-circle"
                                         style="width:80px;height:80px;object-fit:cover;">
                                    <div>
                                        <p class="mb-0 fw-bold" id="logoPreviewName"></p>
                                        <small class="text-success">
                                            <i class="bi bi-check-circle me-1"></i>Logo sélectionné
                                        </small>
                                        <br>
                                        <button type="button" class="btn btn-sm btn-outline-danger mt-1"
                                                onclick="clearLogo()">
                                            <i class="bi bi-x me-1"></i>Retirer
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- Colonne droite --}}
                <div class="col-lg-4 col-12">

                    {{-- Statut --}}
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="mb-0">Statut de la boutique</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio"
                                           name="is_active" id="statusActive" value="1"
                                           {{ old('is_active', $shop->is_active ?? 1) == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="statusActive">
                                        <i class="bi bi-check-circle text-success"></i> Active
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio"
                                           name="is_active" id="statusInactive" value="0"
                                           {{ old('is_active', $shop->is_active ?? 1) == 0 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="statusInactive">
                                        <i class="bi bi-x-circle text-danger"></i> Inactive
                                    </label>
                                </div>
                            </div>
                            <small class="text-muted">
                                Une boutique inactive n'est pas visible par les autres utilisateurs.
                            </small>
                        </div>
                    </div>

                    {{-- Infos système (édition seulement) --}}
                    @if(isset($shop))
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="mb-0">Informations système</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-2">
                                <label class="form-label text-muted small">UUID</label>
                                <input type="text" class="form-control form-control-sm"
                                       value="{{ $shop->uuid }}" readonly disabled>
                            </div>
                            <div class="mb-2">
                                <label class="form-label text-muted small">Note moyenne</label>
                                <input type="text" class="form-control form-control-sm"
                                       value="{{ number_format($shop->average_rating, 2) }} / 5.00 ({{ $shop->reviews_count }} avis)"
                                       readonly disabled>
                            </div>
                            <div class="mb-2">
                                <label class="form-label text-muted small">Date de création</label>
                                <input type="text" class="form-control form-control-sm"
                                       value="{{ $shop->created_at->format('d/m/Y à H:i') }}"
                                       readonly disabled>
                            </div>
                            <small class="text-muted">Ces informations sont générées automatiquement.</small>
                        </div>
                    </div>
                    @endif

                    {{-- Aperçu de la carte boutique --}}
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="mb-0">Aperçu</h4>
                        </div>
                        <div class="card-body text-center">
                            <div id="previewCard">
                                <div class="rounded-circle bg-light d-flex align-items-center justify-content-center mx-auto mb-3"
                                     id="previewLogo"
                                     style="width:64px;height:64px;">
                                    <i class="bi bi-shop fs-3 text-muted"></i>
                                </div>
                                <h6 id="previewName" class="mb-1 text-muted">Nom de la boutique</h6>
                                <small id="previewLocation" class="text-muted">
                                    <i class="bi bi-geo-alt me-1"></i>Localisation
                                </small>
                            </div>
                            <small class="text-muted d-block mt-2">Aperçu en temps réel</small>
                        </div>
                    </div>

                    {{-- Actions --}}
                    <div class="card">
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-lg me-2"></i>
                                    {{ isset($shop) ? 'Mettre à jour' : 'Créer la boutique' }}
                                </button>
                                <a href="{{ route('admin.vendor-grid') }}" class="btn btn-outline-secondary">
                                    <i class="bi bi-x-lg me-2"></i>Annuler
                                </a>
                            </div>

                            <hr class="my-3">

                            <div class="text-muted small">
                                <p class="mb-1"><strong>Note :</strong></p>
                                <ul class="ps-3 mb-0">
                                    <li>Les champs avec <span class="text-danger">*</span> sont obligatoires</li>
                                    <li>Le slug sera généré automatiquement</li>
                                    <li>La boutique sera liée à votre compte</li>
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
</style>

@endsection

@section('scripts')
<script>
const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

// ── Preview logo ─────────────────────────────────────
function previewLogo(event) {
    const file = event.target.files[0];
    if (!file) return;

    // Validation taille
    if (file.size > 1024 * 1024) {
        alert('Le logo ne doit pas dépasser 1MB.');
        event.target.value = '';
        return;
    }

    const reader = new FileReader();
    reader.onload = (e) => {
        document.getElementById('logoPreviewImg').src = e.target.result;
        document.getElementById('logoPreviewName').textContent = file.name;
        document.getElementById('logoPreview').style.display = 'block';

        // Mettre à jour l'aperçu carte
        document.getElementById('previewLogo').innerHTML =
            `<img src="${e.target.result}" class="rounded-circle" style="width:64px;height:64px;object-fit:cover;">`;
    };
    reader.readAsDataURL(file);
}

function clearLogo() {
    document.getElementById('logoInput').value = '';
    document.getElementById('logoPreview').style.display = 'none';
    document.getElementById('previewLogo').innerHTML =
        `<i class="bi bi-shop fs-3 text-muted"></i>`;
}

// ── Aperçu temps réel ─────────────────────────────────────
document.getElementById('name-input') // via listener ci-dessous
const nameInput = document.querySelector('input[name="name"]');
const locationInput = document.querySelector('input[name="location"]');

if (nameInput) {
    nameInput.addEventListener('input', () => {
        const val = nameInput.value.trim();
        document.getElementById('previewName').textContent = val || 'Nom de la boutique';
        document.getElementById('previewName').className = val ? 'mb-1 fw-bold' : 'mb-1 text-muted';
    });
}

if (locationInput) {
    locationInput.addEventListener('input', () => {
        const val = locationInput.value.trim();
        document.getElementById('previewLocation').innerHTML =
            `<i class="bi bi-geo-alt me-1"></i>${val || 'Localisation'}`;
    });
}

// ── Drag & Drop logo ─────────────────────────────────────
const logoDropzone = document.getElementById('logoDropzone');
logoDropzone.addEventListener('dragover', (e) => {
    e.preventDefault();
    logoDropzone.classList.add('border-primary');
});
logoDropzone.addEventListener('dragleave', () => {
    logoDropzone.classList.remove('border-primary');
});
logoDropzone.addEventListener('drop', (e) => {
    e.preventDefault();
    logoDropzone.classList.remove('border-primary');
    const input = document.getElementById('logoInput');
    input.files = e.dataTransfer.files;
    previewLogo({ target: input });
});

// ── Supprimer logo existant (édition) ─────────────────────────────────────
function deleteLogo(shopUuid) {
    if (!confirm('Supprimer le logo actuel ?')) return;
    fetch(`/admin/shops/${shopUuid}/delete-logo`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json'
        }
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            // Masquer la card logo actuel
            const logoCard = document.querySelector('.card.mb-4 img.rounded-circle')?.closest('.card');
            if (logoCard) logoCard.remove();
        }
    });
}
</script>
@endsection