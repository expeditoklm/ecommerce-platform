@extends('admin/base')
@section('contenue')

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
              method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($blog)) @method('PUT') @endif

        <div class="row">

            {{-- Colonne gauche --}}
            <div class="col-lg-8 col-12">

                {{-- Informations principales --}}
                <div class="card mb-6 card-lg">
                    <div class="card-body p-6">
                        <h4 class="mb-4 h5">Informations du blog</h4>
                        <div class="row">

                            {{-- Titre --}}
                            <div class="mb-3 col-lg-6">
                                <label class="form-label">Titre <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
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

                            {{-- Date de publication --}}
                            <div class="mb-3 col-lg-6">
                                <label class="form-label">Date de publication <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('publication_date') is-invalid @enderror"
                                       name="publication_date"
                                       value="{{ old('publication_date', isset($blog) ? $blog->publication_date : now()->format('Y-m-d')) }}"
                                       required>
                                @error('publication_date')
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

                            {{-- Slug --}}
                            <div class="mb-3 col-lg-6">
                                <label class="form-label">Slug URL</label>
                                <input type="text" class="form-control @error('slug_url') is-invalid @enderror"
                                       name="slug_url" id="slug_url"
                                       value="{{ old('slug_url', $blog->slug_url ?? '') }}"
                                       placeholder="généré automatiquement">
                                @error('slug_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
                        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                {{-- Image de couverture --}}
                <div class="card mb-6 card-lg">
                    <div class="card-body p-6">
                        <h4 class="mb-3 h5">Image de couverture</h4>

                        @if(isset($blog) && $blog->cover_url)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $blog->cover_url) }}"
                                 alt="Couverture actuelle" class="img-fluid rounded" style="max-height:200px;">
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox"
                                       name="remove_cover" id="removeCover">
                                <label class="form-check-label text-danger" for="removeCover">
                                    Supprimer l'image de couverture
                                </label>
                            </div>
                        </div>
                        @endif

                        <input type="file" class="form-control @error('cover') is-invalid @enderror"
                               name="cover" accept="image/*">
                        <small class="text-muted">Formats acceptés : JPG, PNG, WebP. Max 2MB.</small>
                        @error('cover') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
                                     class="img-fluid rounded" style="height:100px;object-fit:cover;">
                                <span class="badge bg-secondary position-absolute top-0 start-0 m-1">
                                    {{ $img->role }}
                                </span>
                                <div class="form-check position-absolute top-0 end-0 m-1">
                                    <input class="form-check-input" type="checkbox"
                                           name="remove_images[]" value="{{ $img->id }}">
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <small class="text-muted d-block mb-3">Cochez les images à supprimer.</small>
                        @endif

                        <div class="mb-3">
                            <label class="form-label">Image gauche</label>
                            <input type="file" class="form-control" name="image_left" accept="image/*">
                        </div>
                        <div class="mb-3">
    <label class="form-label">Texte bloc image gauche</label>
    <textarea class="form-control" name="content_left" rows="5"
        placeholder="Texte affiché à droite de l'image gauche...">{{ old('content_left', $blog->content_left ?? '') }}</textarea>
</div>
                        <div class="mb-3">
                            <label class="form-label">Image droite</label>
                            <input type="file" class="form-control" name="image_right" accept="image/*">
                        </div>
                        <div class="mb-3">
    <label class="form-label">Texte bloc image droite</label>
    <textarea class="form-control" name="content_right" rows="5"
        placeholder="Texte affiché à gauche de l'image droite...">{{ old('content_right', $blog->content_right ?? '') }}</textarea>
</div>
                    </div>
                </div>

                {{-- Contenu principal --}}
                <div class="card mb-6 card-lg">
                    <div class="card-body p-6">
                        <h4 class="mb-3 h5">Contenu <span class="text-danger">*</span></h4>
                        <textarea class="form-control @error('content') is-invalid @enderror"
                                  name="content" id="editor" rows="15"
                                  placeholder="Contenu principal du blog...">{{ old('content', $blog->content ?? '') }}</textarea>
                        @error('content') <div class="invalid-feedback">{{ $message }}</div> @enderror
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

            {{-- Colonne droite --}}
            <div class="col-lg-4 col-12">

                {{-- Statut --}}
                <div class="card mb-6 card-lg">
                    <div class="card-body p-6">
                        <h4 class="mb-4 h5">Publication</h4>

                        <div class="form-check form-switch mb-4">
                            <input class="form-check-input" type="checkbox"
                                   role="switch" id="isPublished" name="is_published"
                                   value="1"
                                   {{ old('is_published', $blog->is_published ?? 0) ? 'checked' : '' }}>
                            <label class="form-check-label" for="isPublished">
                                Publié
                            </label>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Statut</label>
                            <div class="d-flex gap-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio"
                                           name="product_status" id="statusActive" value="active"
                                           {{ old('product_status', $blog->product_status ?? '') === 'active' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="statusActive">Actif</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio"
                                           name="product_status" id="statusDisabled" value="disabled"
                                           {{ old('product_status', $blog->product_status ?? 'disabled') === 'disabled' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="statusDisabled">Désactivé</label>
                                </div>
                            </div>
                        </div>
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
                            <label class="form-label">Auteur de la citation</label>
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

                        <div class="mb-3">
                            <label class="form-label">État du produit</label>
                            <input type="text" class="form-control"
                                   name="product_status_text"
                                   value="{{ old('product_status_text', '') }}"
                                   placeholder="ex: Neuf, Occasion...">
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
                    <a href="{{route('blog.single', ['uuid' => $blog->uuid]) }}"
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

@push('page_scripts')
<script>
    // Auto-génération du slug depuis le titre
    document.querySelector('[name="title"]').addEventListener('input', function () {
        const slugField = document.getElementById('slug_url');
        if (!slugField.dataset.manual) {
            slugField.value = this.value
                .toLowerCase()
                .normalize('NFD').replace(/[\u0300-\u036f]/g, '')
                .replace(/[^a-z0-9\s-]/g, '')
                .trim()
                .replace(/\s+/g, '-');
        }
    });

    document.getElementById('slug_url').addEventListener('input', function () {
        this.dataset.manual = 'true';
    });
</script>
@endpush

@endsection