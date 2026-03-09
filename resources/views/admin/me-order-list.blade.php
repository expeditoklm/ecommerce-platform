@extends('admin/base')
@section('contenue')

<main class="main-content-wrapper">
    <div class="container">

        {{-- Header --}}
        <div class="row mb-8">
            <div class="col-md-12">
                <div class="d-md-flex justify-content-between align-items-center">
                    <div>
                        <h2>Mes commandes</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Mes commandes</li>
                            </ol>
                        </nav>
                    </div>
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

        {{-- Tabs statuts --}}
        <div class="row mb-4">
            <div class="col-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link {{ !request('status') ? 'active' : '' }}"
                            href="{{ route('admin.order-list', request()->except('status','page')) }}">
                            Toutes <span class="badge bg-secondary ms-1">{{ $counts['all'] }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('status') == 'pending' ? 'active' : '' }}"
                            href="{{ route('admin.order-list', array_merge(request()->except('status','page'), ['status'=>'pending'])) }}">
                            En attente <span class="badge bg-warning ms-1">{{ $counts['pending'] }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('status') == 'accepted' ? 'active' : '' }}"
                            href="{{ route('admin.order-list', array_merge(request()->except('status','page'), ['status'=>'accepted'])) }}">
                            Acceptées <span class="badge bg-success ms-1">{{ $counts['accepted'] }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('status') == 'completed' ? 'active' : '' }}"
                            href="{{ route('admin.order-list', array_merge(request()->except('status','page'), ['status'=>'completed'])) }}">
                            Terminées <span class="badge bg-primary ms-1">{{ $counts['completed'] }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('status') == 'rejected' ? 'active' : '' }}"
                            href="{{ route('admin.order-list', array_merge(request()->except('status','page'), ['status'=>'rejected'])) }}">
                            Refusées <span class="badge bg-danger ms-1">{{ $counts['rejected'] }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request('status') == 'cancelled' ? 'active' : '' }}"
                            href="{{ route('admin.order-list', array_merge(request()->except('status','page'), ['status'=>'cancelled'])) }}">
                            Annulées <span class="badge bg-secondary ms-1">{{ $counts['cancelled'] }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-5">
                <div class="card h-100 card-lg">

                    {{-- Filtres --}}
                    <div class="p-6">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-md-4 col-12 mb-2 mb-md-0">
                                <form action="{{ route('admin.order-list') }}" method="GET" class="d-flex">
                                    @if(request('status'))
                                    <input type="hidden" name="status" value="{{ request('status') }}">
                                    @endif
                                    @if(request('section'))
                                    <input type="hidden" name="section" value="{{ request('section') }}">
                                    @endif
                                    <div class="input-group">
                                        <input class="form-control" type="search" name="search"
                                            placeholder="Rechercher client ou produit"
                                            value="{{ request('search') }}">
                                        <button class="btn btn-outline-secondary" type="submit">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-3 col-md-4 col-12">
                                <select class="form-select" onchange="filterSection(this.value)">
                                    <option value="">Toutes les sections</option>
                                    <option value="product" {{ request('section') == 'product'  ? 'selected' : '' }}>
                                        Produits
                                    </option>
                                    <option value="service" {{ request('section') == 'service'  ? 'selected' : '' }}>
                                        Services
                                    </option>
                                    <option value="rental" {{ request('section') == 'rental'   ? 'selected' : '' }}>
                                        Locations
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- Table --}}
                    <div class="card-body p-0">
                        @if($orders->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-centered table-hover text-nowrap table-borderless mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Image</th>
                                        <th>N° Commande</th>
                                        <th>Client</th>
                                        <th>Produit</th>
                                        <th>Echange</th>
                                        <th>Section</th>
                                        <th>Total</th>
                                        <th>Date</th>
                                        <th>Statut</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                    @php
                                    $statusInfo = \App\Models\Order::STATUSES[$order->status]
                                    ?? ['label' => $order->status, 'badge' => 'bg-secondary'];
                                    $section = $order->product?->section?->value ?? null;
                                    $sectionInfo = match($section) {
                                    'product' => ['bg-primary', 'Produit'],
                                    'service' => ['bg-success', 'Service'],
                                    'rental' => ['bg-warning', 'Location'],
                                    default => ['bg-secondary', 'N/A'],
                                    };
                                    @endphp
                                    <tr id="order-{{ $order->id }}">
                                        <td>
                                            @if($order->product && $order->product->images->count() > 0)
                                            <img src="{{ asset($order->product->images->first()->url) }}"
                                                alt="" class="icon-shape icon-md rounded">
                                            @else
                                            <div class="icon-shape icon-md bg-light rounded d-flex align-items-center justify-content-center">
                                                <i class="bi bi-box text-muted"></i>
                                            </div>
                                            @endif
                                        </td>
                                        <td>
    <a href="{{ route('admin.me-order-single', ['uuid' => $order->uuid]) }}"
       class="fw-bold text-primary">
        {{ $order->order_number }}
    </a>
</td>
                                        <td>
                                            <div>
                                                <span class="fw-bold">
                                                    {{ $order->offeredProduct->shop->name ?? 'N/A' }} 
                                                </span>
                                                <br>
                                                <small class="text-muted">{{ $order->offeredProduct->shop->user->firstname ?? '' }} {{ $order->offeredProduct->shop->user->name ?? '' }}</small>
                                            </div>
                                        </td>
                                        <td>
                                            @if($order->product)
                                            <a href="{{ route('shop.single', ['uuid' => $order->product->uuid]) }}"
                                                class="text-reset fw-bold" target="_blank">
                                                {{ Str::limit($order->product->name, 30) }}
                                            </a>
                                            <br>
                                            <small class="text-muted">Qté: {{ $order->quantity }}</small>
                                            @else
                                            <span class="text-muted">Produit supprimé</span>
                                            @endif
                                        </td>
                                        {{-- Colonne Produit -- affichage différent selon le type --}}
                                        <td>
                                            @if($order->type === 'exchange')
                                            {{-- TROC : afficher les deux produits --}}
                                            <div class="d-flex align-items-center gap-2">
                                                {{-- Produit demandé --}}
                                                <div class="text-center">
                                                    <small class="text-muted d-block">Je veux</small>
                                                    @if($order->product)
                                                    <a href="{{ route('shop.single', ['uuid' => $order->product->uuid]) }}"
                                                        class="text-primary fw-bold small" target="_blank">
                                                        {{ Str::limit($order->product->name, 20) }}
                                                    </a>
                                                    @else
                                                    <span class="text-muted small">Supprimé</span>
                                                    @endif
                                                </div>

                                                {{-- Flèche --}}
                                                <i class="bi bi-arrow-left-right text-muted"></i>

                                                {{-- Produit proposé --}}
                                                <div class="text-center">
                                                    <small class="text-muted d-block">Je propose</small>
                                                    @if($order->offeredProduct)
                                                    <a href="{{ route('shop.single', ['uuid' => $order->offeredProduct->uuid]) }}"
                                                        class="text-success fw-bold small" target="_blank">
                                                        {{ Str::limit($order->offeredProduct->name, 20) }}
                                                    </a>
                                                    @else
                                                    <span class="text-muted small">Non précisé</span>
                                                    @endif
                                                </div>
                                            </div>

                                            @elseif($order->type === 'rental')
                                            {{-- LOCATION : produit + dates --}}
                                            @if($order->product)
                                            <a href="{{ route('shop.single', ['uuid' => $order->product->uuid]) }}"
                                                class="text-reset fw-bold small" target="_blank">
                                                {{ Str::limit($order->product->name, 30) }}
                                            </a>
                                            @endif
                                            <br>
                                            <small class="text-muted">
                                                <i class="bi bi-calendar me-1"></i>
                                                {{ $order->rental_start_date?->format('d/m/Y') }}
                                                → {{ $order->rental_end_date?->format('d/m/Y') }}
                                                ({{ $order->rental_days }} j)
                                            </small>

                                            @else
                                            {{-- SERVICE : produit simple --}}
                                            @if($order->product)
                                            <a href="{{ route('shop.single', ['uuid' => $order->product->uuid]) }}"
                                                class="text-reset fw-bold small" target="_blank">
                                                {{ Str::limit($order->product->name, 30) }}
                                            </a>
                                            <br>
                                            <small class="text-muted">Qté: {{ $order->quantity }}</small>
                                            @else
                                            <span class="text-muted">Supprimé</span>
                                            @endif
                                            @endif
                                        </td>

                                        {{-- Message du demandeur --}}
                                        @if($order->message)
                                        <td>
                                            <span data-bs-toggle="tooltip" title="{{ $order->message }}">
                                                <i class="bi bi-chat-text text-muted"></i>
                                            </span>
                                        </td>
                                        @endif
                                        <td>
                                            <span class="badge {{ $sectionInfo[0] }}">{{ $sectionInfo[1] }}</span>
                                        </td>
                                        <td>
                                            <span class="fw-bold">
                                                {{ number_format($order->total, 0, ',', ' ') }} FCFA
                                            </span>
                                        </td>

                                        <td>
                                            <small class="text-muted">
                                                {{ $order->created_at->format('d M Y') }}<br>
                                                {{ $order->created_at->format('H:i') }}
                                            </small>
                                        </td>
                                        <td>
                                            <span class="badge {{ $statusInfo['badge'] }}">
                                                {{ $statusInfo['label'] }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="text-reset" data-bs-toggle="dropdown">
                                                    <i class="feather-icon icon-more-vertical fs-5"></i>
                                                </a>
                                                <ul class="dropdown-menu">
    {{-- Seulement le bouton Annuler --}}
    @if($order->status !== 'cancelled')
    <li>
        <a class="dropdown-item" href="#"
           onclick="updateStatus('{{ $order->uuid }}', 'cancelled')">
            <span class="badge bg-secondary me-2">Annuler</span>
        </a>
    </li>
    @endif
    <li><hr class="dropdown-divider"></li>
    <li>
        <a class="dropdown-item text-danger" href="#"
           onclick="deleteOrder('{{ $order->uuid }}')">
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
                            <i class="bi bi-bag display-4 text-muted"></i>
                            <h4 class="mt-4">Aucune commande trouvée</h4>
                            <p class="text-muted">Aucune commande ne correspond à vos critères.</p>
                        </div>
                        @endif
                    </div>

                    {{-- Pagination --}}
                    @if($orders->hasPages())
                    <div class="border-top d-md-flex justify-content-between align-items-center p-6">
                        <span>
                            Affichage {{ $orders->firstItem() }} à {{ $orders->lastItem() }}
                            sur {{ $orders->total() }} commandes
                        </span>
                        <nav class="mt-2 mt-md-0">
                            {{ $orders->links('pagination::bootstrap-5') }}
                        </nav>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</main>

@endsection

@section('scripts')
<script>
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    function filterSection(value) {
        const url = new URL(window.location.href);
        if (value) url.searchParams.set('section', value);
        else url.searchParams.delete('section');
        url.searchParams.delete('page');
        window.location.href = url.toString();
    }

    function updateStatus(orderId, newStatus) {
        fetch(`/admin/orders/${orderId}/status`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    status: newStatus
                })
            })
            .then(r => r.json())
            .then(data => {
                if (data.success) {
                    showAlert('success', data.message);
                    setTimeout(() => window.location.reload(), 800);
                }
            });
    }

    function deleteOrder(id) {
        if (!confirm('Supprimer cette commande ?')) return;
        fetch(`/admin/orders/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                }
            })
            .then(r => r.json())
            .then(data => {
                if (data.success) {
                    document.getElementById(`order-${id}`).remove();
                    showAlert('success', data.message);
                }
            });
    }

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