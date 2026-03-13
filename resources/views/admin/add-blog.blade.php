@extends('admin/base')
@section('contenue')

{{-- ── Quill CSS chargé ici directement ────────────────────── --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.7/quill.snow.min.css" rel="stylesheet">
<style>
    #quill_editor { background:#fff; }
    .ql-toolbar.ql-snow { border-radius:6px 6px 0 0; border-color:#dee2e6; background:#f8f9fa; }
    .ql-container.ql-snow { border-color:#dee2e6; font-size:15px; line-height:1.75; border-radius:0 0 6px 6px; }
    .ql-editor { min-height:350px; color:#1e293b; }
    .ql-editor p { margin-bottom:0.75em; }
</style>

<main class="main-content-wrapper">
    <div class="container">

        {{-- Header --}}
        <div class="row mb-8">
            <div class="col-md-12">
                <div class="d-md-flex justify-content-between align-items-center">
                    <div>
                        <h2>{{ isset($blog) ? 'Modifier le blog' : 'Nouveau blog' }}</h2>
                    </div>
                    <div>
                        <a href="{{ route('admin.blog-setting') }}" class="btn btn-light">
                            <i class="bi bi-arrow-left me-2"></i>Retour aux blogs
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

        @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        {{-- Formulaire --}}
        <form action="{{ isset($blog) ? route('admin.blog-update', $blog->uuid) : route('admin.blog-store') }}"
              method="POST" enctype="multipart/form-data" id="blogForm">
            @csrf
            @if(isset($blog)) @method('PUT') @endif

            <div class="row">

                {{-- ═══════════════════════════ --}}
                {{-- COLONNE GAUCHE              --}}
                {{-- ═══════════════════════════ --}}
                <div class="col-lg-8 col-12">

                    {{-- Informations principales --}}
                    <div class="card mb-6 card-lg">
                        <div class="card-body p-6">
                            <h4 class="mb-4 h5">Informations du blog</h4>
                            <div class="row">

                                {{-- Titre --}}
                                <div class="mb-3 col-12">
                                    <label class="form-label">Titre <span class="text-danger">*</span></label>
                                    <input type="text"
                                           class="form-control @error('title') is-invalid @enderror"
                                           name="title"
                                           value="{{ old('title', $blog->title ?? '') }}"
                                           placeholder="Titre du blog" required>
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Catégorie principale --}}
                                <div class="mb-3 col-lg-6">
                                    <label class="form-label">Catégorie principale</label>
                                    <select class="form-select @error('category_id') is-invalid @enderror"
                                            name="category_id">
                                        <option value="">-- Choisir une catégorie --</option>
                                        @foreach($categories as $section => $cats)
                                        <optgroup label="{{ $section === 'product' ? 'Produits' : ($section === 'service' ? 'Services' : 'Locations') }}">
                                            @foreach($cats as $cat)
                                            <option value="{{ $cat->id }}"
                                                {{ old('category_id', $blog->category_id ?? '') == $cat->id ? 'selected' : '' }}>
                                                {{ $cat->name }}
                                            </option>
                                            @endforeach
                                        </optgroup>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Boutique --}}
                                <div class="mb-3 col-lg-6">
                                    <label class="form-label">Boutique <span class="text-danger">*</span></label>
                                    <select class="form-select @error('shop_id') is-invalid @enderror"
                                            name="shop_id" required>
                                        <option value="">-- Choisir une boutique --</option>
                                        @foreach($shops as $shop)
                                        <option value="{{ $shop->id }}"
                                            {{ old('shop_id', $blog->shop_id ?? '') == $shop->id ? 'selected' : '' }}>
                                            {{ $shop->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('shop_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Temps de lecture --}}
                                <div class="mb-3 col-lg-6">
                                    <label class="form-label">Temps de lecture</label>
                                    <input type="text" class="form-control"
                                           name="reading_time"
                                           value="{{ old('reading_time', $blog->reading_time ?? '') }}"
                                           placeholder="ex: 5 min">
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- Description / Extrait --}}
                    <div class="card mb-6 card-lg">
                        <div class="card-body p-6">
                            <h4 class="mb-3 h5">Extrait / Résumé</h4>
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                      name="description" rows="3"
                                      placeholder="Courte description affichée dans les listes...">{{ old('description', $blog->description ?? '') }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Contenu principal — Quill.js --}}
                    <div class="card mb-6 card-lg">
                        <div class="card-body p-6">
                            <h4 class="mb-3 h5">Contenu <span class="text-danger">*</span></h4>

                            {{-- Textarea caché qui reçoit le HTML avant submit --}}
                            <textarea name="content" id="content_hidden"
                                      style="display:none;">{{ old('content', $blog->content ?? '') }}</textarea>

                            {{-- Conteneur Quill --}}
                            <div id="quill_editor" style="min-height:350px; font-size:15px;"></div>

                            @error('content')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Image de couverture --}}
                    <div class="card mb-6 card-lg">
                        <div class="card-body p-6">
                            <h4 class="mb-3 h5">Image de couverture</h4>

                            @if(isset($blog) && $blog->cover_url)
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $blog->cover_url) }}"
                                     alt="Couverture actuelle"
                                     class="img-fluid rounded mb-2"
                                     style="max-height:200px;">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"
                                           name="remove_cover" id="removeCover">
                                    <label class="form-check-label text-danger" for="removeCover">
                                        Supprimer l'image de couverture
                                    </label>
                                </div>
                            </div>
                            @endif

                            <input type="file"
                                   class="form-control @error('cover') is-invalid @enderror"
                                   name="cover" accept="image/*">
                            <small class="text-muted">
                                Formats : JPG, PNG, WebP. Max 5MB.
                                L'image sera recadrée à <strong>1060×508px</strong> automatiquement.
                            </small>
                            @error('cover')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Images additionnelles --}}
                    <div class="card mb-6 card-lg">
                        <div class="card-body p-6">
                            <h4 class="mb-3 h5">Images additionnelles</h4>

                            @if(isset($blog) && $blog->images->where('role', '!=', 'cover')->count() > 0)
                            <div class="row g-2 mb-3">
                                @foreach($blog->images->where('role', '!=', 'cover') as $img)
                                <div class="col-4 position-relative">
                                    <img src="{{ asset('storage/' . $img->url) }}"
                                         class="img-fluid rounded w-100"
                                         style="height:200px;object-fit:cover;">
                                    <span class="badge bg-secondary position-absolute top-0 start-0 m-1">
                                        {{ $img->role }}
                                    </span>
                                    <div class="form-check position-absolute top-0 end-0 m-1 bg-white rounded p-1">
                                        <input class="form-check-input" type="checkbox"
                                               name="remove_images[]" value="{{ $img->id }}"
                                               title="Supprimer">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <small class="text-muted d-block mb-3">
                                <i class="bi bi-info-circle me-1"></i>Cochez pour supprimer une image.
                            </small>
                            @endif

                            {{-- Image gauche --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    <i class="bi bi-layout-text-sidebar-reverse me-1"></i>Image gauche
                                </label>
                                <input type="file" class="form-control" name="image_left" accept="image/*">
                                <small class="text-muted">Recadrée à <strong>150×150px</strong>.</small>
                            </div>

                            {{-- Texte image gauche --}}
                            <div class="mb-4">
                                <label class="form-label">Texte affiché à droite de l'image gauche</label>
                                <textarea class="form-control" name="content_left" rows="5"
                                          placeholder="Ce texte s'affiche à côté de l'image gauche...">{{ old('content_left', $blog->content_left ?? '') }}</textarea>
                            </div>

                            {{-- Image droite --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    <i class="bi bi-layout-text-sidebar me-1"></i>Image droite
                                </label>
                                <input type="file" class="form-control" name="image_right" accept="image/*">
                                <small class="text-muted">Recadrée à <strong>150×150px</strong>.</small>
                            </div>

                            {{-- Texte image droite --}}
                            <div class="mb-3">
                                <label class="form-label">Texte affiché à gauche de l'image droite</label>
                                <textarea class="form-control" name="content_right" rows="5"
                                          placeholder="Ce texte s'affiche à côté de l'image droite...">{{ old('content_right', $blog->content_right ?? '') }}</textarea>
                            </div>

                        </div>
                    </div>

                    {{-- Tags / Catégories associées --}}
                    <div class="card mb-6 card-lg">
                        <div class="card-body p-6">
                            <h4 class="mb-3 h5">Tags (catégories associées)</h4>
                            <div class="row g-2">
                                @foreach($allCategories as $cat)
                                <div class="col-lg-4 col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                               name="tags[]" value="{{ $cat->id }}"
                                               id="tag_{{ $cat->id }}"
                                               {{ isset($blog) && $blog->blogCategories->contains($cat->id) ? 'checked' : '' }}
                                               {{ in_array($cat->id, old('tags', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="tag_{{ $cat->id }}">
                                            @if($cat->icon_cat)<i class="{{ $cat->icon_cat }} me-1"></i>@endif
                                            {{ $cat->name }}
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>

                {{-- ═══════════════════════════ --}}
                {{-- COLONNE DROITE              --}}
                {{-- ═══════════════════════════ --}}
                <div class="col-lg-4 col-12">

                    {{-- Publication --}}
                    <div class="card mb-6 card-lg">
                        <div class="card-body p-6">
                            <h4 class="mb-4 h5">Publication</h4>

                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox"
                                       role="switch" id="isPublished" name="is_published"
                                       value="1"
                                       {{ old('is_published', $blog->is_published ?? 0) ? 'checked' : '' }}>
                                <label class="form-check-label" for="isPublished">
                                    Publié
                                </label>
                            </div>

                            @if(isset($blog) && $blog->publication_date)
                            <small class="text-muted">
                                <i class="bi bi-calendar3 me-1"></i>
                                Publié le : {{ \Carbon\Carbon::parse($blog->publication_date)->format('d/m/Y') }}
                            </small>
                            @endif
                        </div>
                    </div>

                    {{-- Citation --}}
                    <div class="card mb-6 card-lg">
                        <div class="card-body p-6">
                            <h4 class="mb-4 h5">Citation</h4>

                            <div class="mb-3">
                                <label class="form-label">Citation</label>
                                <textarea class="form-control" name="quote" rows="3"
                                          placeholder="Citation à mettre en avant...">{{ old('quote', $blog->quote ?? '') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Auteur</label>
                                <input type="text" class="form-control"
                                       name="quote_author"
                                       value="{{ old('quote_author', $blog->quote_author ?? '') }}"
                                       placeholder="ex: Steve Jobs">
                            </div>
                        </div>
                    </div>

                    {{-- Caractéristiques --}}
                    <div class="card mb-6 card-lg">
                        <div class="card-body p-6">
                            <h4 class="mb-4 h5">Compléments</h4>

                            <div class="mb-3">
                                <label class="form-label">Caractéristiques produit</label>
                                <textarea class="form-control" name="product_features" rows="3"
                                          placeholder="Caractéristiques liées au blog...">{{ old('product_features', $blog->product_features ?? '') }}</textarea>
                            </div>
                        </div>
                    </div>

                    {{-- Bouton submit --}}
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle me-2"></i>
                            {{ isset($blog) ? 'Mettre à jour' : 'Publier le blog' }}
                        </button>
                        @if(isset($blog))
                        <a href="{{ route('blog.single', ['uuid' => $blog->uuid]) }}"
                           class="btn btn-outline-secondary" target="_blank">
                            <i class="bi bi-eye me-2"></i>Voir le blog
                        </a>
                        @endif
                    </div>

                </div>

            </div>
        </form>

    </div>
</main>

{{-- JS Quill directement dans la vue --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.7/quill.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {

    var quill = new Quill('#quill_editor', {
        theme: 'snow',
        placeholder: 'Rédigez le contenu de votre article ici...',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, 3, 4, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                [{ 'color': [] }, { 'background': [] }],
                [{ 'align': [] }],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                [{ 'indent': '-1' }, { 'indent': '+1' }],
                ['blockquote', 'code-block'],
                ['link'],
                ['clean']
            ]
        }
    });

    // Pré-remplir en mode édition
    var existingContent = document.getElementById('content_hidden').value;
    if (existingContent && existingContent.trim() !== '') {
        quill.root.innerHTML = existingContent;
    }

    // Copier dans le textarea caché avant submit
    document.getElementById('blogForm').addEventListener('submit', function () {
        document.getElementById('content_hidden').value = quill.root.innerHTML;
    });

});
</script>

@endsection