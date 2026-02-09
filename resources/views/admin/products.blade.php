@extends('admin/base')
@section('contenue')

<!-- main -->
<main class="main-content-wrapper">
    <div class="container">
        <div class="row mb-8">
            <div class="col-md-12">
                <!-- page header -->
                <div class="d-md-flex justify-content-between align-items-center">
                    <div>
                        <h2>Products</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Products</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- button -->
                    <div>
                        <a href="{{ route('admin.add-product') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-2"></i>Add Product
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Messages de succès -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-12 mb-5">
                <!-- card -->
                <div class="card h-100 card-lg">
                    <div class="px-6 py-6">
                        <div class="row justify-content-between align-items-center">
                            <!-- form recherche -->
                            <div class="col-lg-4 col-md-6 col-12 mb-2 mb-lg-0">
                                <form action="{{ route('admin.products') }}" method="GET" class="d-flex" role="search">
                                    <div class="input-group">
                                        <input class="form-control" type="search" name="search" 
                                               placeholder="Search Products" value="{{ request('search') }}">
                                        <button class="btn btn-outline-secondary" type="submit">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <!-- Actions groupées -->
                            <div class="col-lg-2 col-md-6 col-12 mb-2 mb-lg-0">
                                <button type="button" class="btn btn-outline-danger w-100" onclick="bulkDelete()">
                                    <i class="bi bi-trash me-2"></i>Delete Selected
                                </button>
                            </div>

                            <!-- Filtres -->
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="row g-2">
                                    <!-- Filtre Status -->
                                    <div class="col-md-4">
                                        <select class="form-select" id="statusFilter" onchange="filterProducts()">
                                            <option value="">All Status</option>
                                            <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>

                                    <!-- Filtre Type -->
                                    <div class="col-md-4">
                                        <select class="form-select" id="typeFilter" onchange="filterProducts()">
                                            <option value="">All Types</option>
                                            @foreach($types as $type)
                                                <option value="{{ $type->id }}" {{ request('type_id') == $type->id ? 'selected' : '' }}>
                                                    {{ $type->label }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Filtre Promotion -->
                                    <div class="col-md-4">
                                        <select class="form-select" id="saleFilter" onchange="filterProducts()">
                                            <option value="">All Products</option>
                                            <option value="1" {{ request('is_on_sale') == '1' ? 'selected' : '' }}>On Sale</option>
                                            <option value="0" {{ request('is_on_sale') == '0' ? 'selected' : '' }}>Regular Price</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- card body -->
                    <div class="card-body p-0">
                        @if($products->count() > 0)
                            <!-- table -->
                            <div class="table-responsive">
                                <table class="table table-centered table-hover text-nowrap table-borderless mb-0 table-with-checkbox">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkAll">
                                                </div>
                                            </th>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Type</th>
                                            <th>Categories</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                            <th>Status</th>
                                            <th>Created</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $product)
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="{{ $product->id }}">
                                                    </div>
                                                </td>
                                                <td>
                                                    @if($product->images->count() > 0)
                                                        <img src="{{ asset($product->images->first()->url) }}" 
                                                             alt="{{ $product->name }}" 
                                                             class="icon-shape icon-md rounded">
                                                    @else
                                                        <img src="{{ asset('assets/images/products/default.jpg') }}" 
                                                             alt="No image" 
                                                             class="icon-shape icon-md rounded bg-light">
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('shop.single', ['slug' => $product->slug]) }}" class="text-reset fw-bold">
                                                        {{ $product->name }}
                                                    </a>
                                                    @if($product->is_on_sale)
                                                        <span class="badge bg-danger ms-2">
                                                            <i class="bi bi-tag-fill"></i> Sale
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($product->type)
                                                        <span class="badge bg-info">{{ $product->type->label }}</span>
                                                    @else
                                                        <span class="text-muted">-</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($product->categories->count() > 0)
                                                        @foreach($product->categories->take(2) as $category)
                                                            <span class="badge bg-secondary mb-1">{{ $category->name }}</span>
                                                        @endforeach
                                                        @if($product->categories->count() > 2)
                                                            <span class="badge bg-light text-dark">+{{ $product->categories->count() - 2 }}</span>
                                                        @endif
                                                    @else
                                                        <span class="text-muted">-</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($product->is_on_sale && $product->sale_price)
                                                        <div>
                                                            <span class="text-decoration-line-through text-muted small">
                                                                {{ number_format($product->price, 0, ',', ' ') }} FCFA
                                                            </span>
                                                            <br>
                                                            <span class="text-danger fw-bold">
                                                                {{ number_format($product->sale_price, 0, ',', ' ') }} FCFA
                                                            </span>
                                                        </div>
                                                    @else
                                                        <span class="fw-bold">{{ number_format($product->price, 0, ',', ' ') }} FCFA</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($product->stock > 0)
                                                        <span class="badge bg-light-success text-dark-success">
                                                            {{ $product->stock }} units
                                                        </span>
                                                    @else
                                                        <span class="badge bg-light-danger text-dark-danger">
                                                            Out of stock
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($product->status == 1)
                                                        <span class="badge bg-light-primary text-dark-primary">
                                                            <i class="bi bi-check-circle"></i> Active
                                                        </span>
                                                    @else
                                                        <span class="badge bg-light-danger text-dark-danger">
                                                            <i class="bi bi-x-circle"></i> Inactive
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <small class="text-muted">
                                                        {{ $product->created_at->format('d M Y') }}
                                                    </small>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" class="text-reset" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="feather-icon icon-more-vertical fs-5"></i>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a class="dropdown-item" href="#">
                                                                    <i class="bi bi-eye me-3"></i>View
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="#">
                                                                    <i class="bi bi-pencil-square me-3"></i>Edit
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="#" 
                                                                   onclick="toggleStatus({{ $product->id }}, {{ $product->status }})">
                                                                    <i class="bi bi-toggle-{{ $product->status ? 'off' : 'on' }} me-3"></i>
                                                                    {{ $product->status ? 'Deactivate' : 'Activate' }}
                                                                </a>
                                                            </li>
                                                            <li><hr class="dropdown-divider"></li>
                                                            <li>
                                                                <a class="dropdown-item text-danger" href="#" 
                                                                   onclick="deleteProduct({{ $product->id }})">
                                                                    <i class="bi bi-trash me-3"></i>Delete
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
                            <!-- Message si aucun produit -->
                            <div class="text-center py-8">
                                <i class="bi bi-inbox display-4 text-muted"></i>
                                <h4 class="mt-4">No products found</h4>
                                <p class="text-muted">Try adjusting your search or filter to find what you're looking for.</p>
                                <a href="{{ route('admin.add-product') }}" class="btn btn-primary mt-3">
                                    <i class="bi bi-plus-circle me-2"></i>Add Your First Product
                                </a>
                            </div>
                        @endif
                    </div>

                    <!-- Pagination -->
                    @if($products->count() > 0)
                        <div class="border-top d-md-flex justify-content-between align-items-center px-6 py-6">
                            <span>Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} entries</span>
                            <nav class="mt-2 mt-md-0">
                                {{ $products->links('pagination::bootstrap-5') }}
                            </nav>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</main>

<script>
// Ajouter le token CSRF pour les requêtes AJAX
const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

// Sélectionner tous les checkboxes
document.getElementById('checkAll')?.addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('tbody input[type="checkbox"]');
    checkboxes.forEach(checkbox => checkbox.checked = this.checked);
});

// Fonction de filtrage
function filterProducts() {
    const status = document.getElementById('statusFilter').value;
    const type = document.getElementById('typeFilter').value;
    const sale = document.getElementById('saleFilter').value;
    
    const url = new URL(window.location.href);
    
    if (status) url.searchParams.set('status', status);
    else url.searchParams.delete('status');
    
    if (type) url.searchParams.set('type_id', type);
    else url.searchParams.delete('type_id');
    
    if (sale) url.searchParams.set('is_on_sale', sale);
    else url.searchParams.delete('is_on_sale');
    
    window.location.href = url.toString();
}

// Fonction pour changer le statut
function toggleStatus(productId, currentStatus) {
    const action = currentStatus ? 'deactivate' : 'activate';
    
    if (confirm(`Are you sure you want to ${action} this product?`)) {
        fetch(`/admin/products/${productId}/toggle-status`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Afficher un message de succès
                showAlert('success', data.message);
                // Recharger la page après 1 seconde
                setTimeout(() => window.location.reload(), 1000);
            } else {
                showAlert('danger', data.message);
            }
        })
        .catch(error => {
            showAlert('danger', 'An error occurred. Please try again.');
            console.error('Error:', error);
        });
    }
}

// Fonction pour supprimer
function deleteProduct(productId) {
    if (confirm('Are you sure you want to delete this product? This action cannot be undone.')) {
        fetch(`/admin/products/${productId}/delete`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showAlert('success', data.message);
                // Recharger la page après 1 seconde
                setTimeout(() => window.location.reload(), 1000);
            } else {
                showAlert('danger', data.message);
            }
        })
        .catch(error => {
            showAlert('danger', 'An error occurred. Please try again.');
            console.error('Error:', error);
        });
    }
}

// Fonction pour supprimer en masse
function bulkDelete() {
    const checkedBoxes = document.querySelectorAll('tbody input[type="checkbox"]:checked');
    const productIds = Array.from(checkedBoxes).map(cb => cb.value);
    
    if (productIds.length === 0) {
        showAlert('warning', 'Please select at least one product to delete.');
        return;
    }
    
    if (confirm(`Are you sure you want to delete ${productIds.length} product(s)?`)) {
        fetch('/admin/products/bulk-delete', {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ product_ids: productIds })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showAlert('success', data.message);
                setTimeout(() => window.location.reload(), 1000);
            } else {
                showAlert('danger', data.message);
            }
        })
        .catch(error => {
            showAlert('danger', 'An error occurred. Please try again.');
            console.error('Error:', error);
        });
    }
}

// Fonction pour afficher les alertes
function showAlert(type, message) {
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type} alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-3`;
    alertDiv.style.zIndex = '9999';
    alertDiv.innerHTML = `
        <i class="bi bi-${type === 'success' ? 'check-circle' : 'exclamation-triangle'} me-2"></i>
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    
    document.body.appendChild(alertDiv);
    
    // Supprimer l'alerte après 5 secondes
    setTimeout(() => {
        alertDiv.remove();
    }, 5000);
}
</script>

<style>
.icon-shape {
    width: 60px;
    height: 60px;
    object-fit: cover;
}

.table-with-checkbox tbody tr:hover {
    background-color: #f8f9fa;
}

.badge {
    font-weight: 500;
}
</style>

@endsection