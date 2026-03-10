@extends('base')
@section('content')

<main>
    <div class="mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Accueil</a></li>
                            <li class="breadcrumb-item active">Ma Wishlist</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="mt-8 mb-14">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="mb-8">
                        <h1 class="mb-1">Ma Wishlist</h1>
                        <p class="text-muted">
                            {{ $wishlists->total() }} produit(s) dans votre wishlist.
                        </p>
                    </div>

                    {{-- Flash messages --}}
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif

                    @if($wishlists->count() > 0)
                    <div class="table-responsive">
                        <table class="table text-nowrap table-with-checkbox">
                            <thead class="table-light">
                                <tr>
                                    <th>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkAll">
                                            <label class="form-check-label" for="checkAll"></label>
                                        </div>
                                    </th>
                                    <th></th>
                                    <th>Produit</th>
                                    <th>Boutique</th>
                                    <th>Prix</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                    <th>Retirer</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($wishlists as $wishlist)
                                @php $product = $wishlist->product; @endphp

                                @if(!$product) @continue @endif

                                <tr id="wishlist-row-{{ $wishlist->uuid }}">

                                    {{-- Checkbox --}}
                                    <td class="align-middle">
                                        <div class="form-check">
                                            <input class="form-check-input wishlist-checkbox"
                                                   type="checkbox"
                                                   value="{{ $wishlist->uuid }}"
                                                   id="check-{{ $wishlist->uuid }}">
                                            <label class="form-check-label" for="check-{{ $wishlist->uuid }}"></label>
                                        </div>
                                    </td>

                                    {{-- Image --}}
                                    <td class="align-middle">
                                        <a href="{{ route('shop.single', ['uuid' => $product->uuid]) }}">
                                            @if($product->images->count() > 0)
                                                <img src="{{ asset($product->images->first()->url) }}"
                                                     class="icon-shape icon-xxl rounded" alt="{{ $product->name }}"
                                                     style="object-fit:cover;">
                                            @else
                                                <div class="icon-shape icon-xxl bg-light d-flex align-items-center justify-content-center rounded">
                                                    <i class="bi bi-image text-muted"></i>
                                                </div>
                                            @endif
                                        </a>
                                    </td>

                                    {{-- Nom produit --}}
                                    <td class="align-middle">
                                        <div>
                                            <h5 class="fs-6 mb-0">
                                                <a href="{{ route('shop.single', ['uuid' => $product->uuid]) }}"
                                                   class="text-inherit">
                                                    {{ $product->name }}
                                                </a>
                                            </h5>
                                            @if($product->categories->count() > 0)
                                            <small class="text-muted">{{ $product->categories->first()->name }}</small>
                                            @endif
                                            {{-- Badge section --}}
                                            @if($product->section->value === 'service')
                                                <span class="badge bg-info ms-1">Service</span>
                                            @elseif($product->section->value === 'rental')
                                                <span class="badge bg-warning text-dark ms-1">Location</span>
                                            @endif
                                        </div>
                                    </td>

                                    {{-- Boutique --}}
                                    <td class="align-middle">
                                        @if($product->shop)
                                        <a href="{{ route('store.single', ['uuid' => $product->shop->uuid]) }}"
                                           class="text-success text-decoration-none small">
                                            <i class="bi bi-shop me-1"></i>{{ $product->shop->name }}
                                        </a>
                                        @else
                                        <span class="text-muted small">—</span>
                                        @endif
                                    </td>

                                    {{-- Prix --}}
                                    <td class="align-middle">
                                        @if($product->is_on_sale && $product->sale_price)
                                            <span class="text-danger fw-bold">
                                                {{ number_format($product->sale_price, 0, ',', ' ') }} FCFA
                                            </span>
                                            <br>
                                            <small class="text-decoration-line-through text-muted">
                                                {{ number_format($product->price, 0, ',', ' ') }}
                                            </small>
                                        @else
                                            <span class="fw-bold">
                                                {{ number_format($product->price, 0, ',', ' ') }} FCFA
                                            </span>
                                        @endif
                                    </td>

                                    {{-- Statut stock --}}
                                    <td class="align-middle">
                                        @if($product->stock > 0)
                                            <span class="badge bg-success">Disponible</span>
                                        @else
                                            <span class="badge bg-danger">Indisponible</span>
                                        @endif
                                    </td>

                                    {{-- Actions --}}
                                    <td class="align-middle">
                                        <a href="{{ route('shop.single', ['uuid' => $product->uuid]) }}"
                                           class="btn btn-primary btn-sm">
                                            @if($product->section->value === 'service')
                                                <i class="bi bi-arrow-right me-1"></i>Voir
                                            @elseif($product->section->value === 'rental')
                                                <i class="bi bi-calendar-check me-1"></i>Louer
                                            @else
                                                <i class="bi bi-arrow-left-right me-1"></i>Troquer
                                            @endif
                                        </a>
                                    </td>

                                    {{-- Retirer --}}
                                    {{-- Retirer --}}
<td class="align-middle">
    <form method="POST" action="/wishlist/toggle/{{ $product->uuid }}">
        @csrf
        <button type="submit" class="btn btn-link text-danger p-0"
                data-bs-toggle="tooltip" title="Retirer">
            <i class="feather-icon icon-trash-2"></i>
        </button>
    </form>
</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Actions en masse --}}
                    <div class="d-flex gap-3 mt-4" id="bulk-actions" style="display:none!important">
                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="bulkRemove()">
                            <i class="bi bi-trash me-1"></i>Retirer la sélection
                        </button>
                    </div>

                    {{-- Pagination --}}
                    @if($wishlists->hasPages())
                    <div class="mt-6">
                        {{ $wishlists->links('vendor.pagination.custom') }}
                    </div>
                    @endif

                    @else
                    {{-- Wishlist vide --}}
                    <div class="text-center py-10">
                        <i class="bi bi-heart display-4 text-muted"></i>
                        <h4 class="mt-4">Votre wishlist est vide</h4>
                        <p class="text-muted">Ajoutez des produits en cliquant sur le cœur ❤️</p>
                        <a href="{{ route('store') }}" class="btn btn-primary mt-2">
                            <i class="bi bi-shop me-2"></i>Parcourir les boutiques
                        </a>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </section>
</main>

@section('script')
<script>
// Retirer un article de la wishlist via AJAX
function removeWishlistItem(uuid, btn) {
    if (!confirm('Retirer ce produit de votre wishlist ?')) return;

    btn.disabled = true;

    fetch('/wishlist/toggle/' + uuid.replace(/-wishlist$/, ''), {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ _from_wishlist_page: true })
    })
    .then(r => {
        if (!r.ok) throw new Error('HTTP ' + r.status);
        return r.json();
    })
    .then(() => {
        // Supprimer la ligne du tableau
        const row = document.getElementById('wishlist-row-' + uuid);
        if (row) {
            row.style.transition = 'opacity 0.3s';
            row.style.opacity = '0';
            setTimeout(() => row.remove(), 300);
        }
        showToast('Produit retiré de la wishlist', 'warning');
    })
    .catch(err => {
        btn.disabled = false;
        showToast('Erreur: ' + err.message, 'danger');
    });
}

// Sélection globale
document.getElementById('checkAll')?.addEventListener('change', function () {
    document.querySelectorAll('.wishlist-checkbox').forEach(cb => cb.checked = this.checked);
    toggleBulkActions();
});

document.querySelectorAll('.wishlist-checkbox').forEach(cb => {
    cb.addEventListener('change', toggleBulkActions);
});

function toggleBulkActions() {
    const checked = document.querySelectorAll('.wishlist-checkbox:checked').length;
    const bulk = document.getElementById('bulk-actions');
    if (bulk) bulk.style.display = checked > 0 ? 'flex' : 'none';
}

function bulkRemove() {
    const uuids = [...document.querySelectorAll('.wishlist-checkbox:checked')].map(cb => cb.value);
    if (uuids.length === 0) return;
    if (!confirm('Retirer ' + uuids.length + ' produit(s) de votre wishlist ?')) return;

    Promise.all(uuids.map(uuid =>
        fetch('/wishlist/toggle/' + uuid, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json',
            }
        })
    )).then(() => {
        uuids.forEach(uuid => {
            const row = document.getElementById('wishlist-row-' + uuid);
            if (row) row.remove();
        });
        showToast(uuids.length + ' produit(s) retiré(s)', 'warning');
        document.getElementById('bulk-actions').style.display = 'none';
    });
}
</script>
@endsection

@endsection