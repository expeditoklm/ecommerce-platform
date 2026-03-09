@extends('admin/base')
@section('contenue')

<main class="main-content-wrapper">
    <div class="container">

        {{-- Header --}}
        <div class="row mb-8">
            <div class="col-md-12">
                <div class="d-md-flex justify-content-between align-items-center">
                    <div>
                        <h2>Détail de la commande</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.index') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.order-list') }}">Commandes</a>
                                </li>
                                <li class="breadcrumb-item active">{{ $order->order_number }}</li>
                            </ol>
                        </nav>
                    </div>
                    <div>
                        <a href="{{ route('admin.order-list') }}" class="btn btn-outline-secondary me-2">
                            <i class="bi bi-arrow-left me-2"></i>Retour
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-12 mb-5">
                <div class="card h-100 card-lg">

                    {{-- En-tête commande --}}
                    <div class="card-body p-6">
                        <div class="d-md-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center gap-3 mb-2 mb-md-0">
                                <h2 class="mb-0">{{ $order->order_number }}</h2>

                                {{-- Badge type --}}
                                @php
                                    $typeInfo = \App\Models\Order::TYPES[$order->type]
                                        ?? ['label' => $order->type, 'badge' => 'bg-secondary', 'icon' => 'bi-tag'];
                                    $statusInfo = \App\Models\Order::STATUSES[$order->status]
                                        ?? ['label' => $order->status, 'badge' => 'bg-secondary'];
                                @endphp
                                <span class="badge {{ $typeInfo['badge'] }}">
                                    <i class="bi {{ $typeInfo['icon'] }} me-1"></i>
                                    {{ $typeInfo['label'] }}
                                </span>
                                <span class="badge {{ $statusInfo['badge'] }}">
                                    {{ $statusInfo['label'] }}
                                </span>
                            </div>

                            {{-- Changer le statut --}}
                            <div class="d-flex gap-2">
                                @foreach(\App\Models\Order::STATUSES as $statusKey => $statusData)
                                    @if($statusKey !== $order->status)
                                    <button class="btn btn-sm btn-outline-secondary"
                                            onclick="updateStatus('{{ $order->uuid }}', '{{ $statusKey }}')">
                                        {{ $statusData['label'] }}
                                    </button>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        {{-- Infos principales --}}
                        <div class="mt-8">
                            <div class="row">

                                {{-- Client demandeur --}}
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="mb-6">
                                        <h6><i class="bi bi-person me-2"></i>Client demandeur</h6>
                                        @if($order->user)
                                        <p class="mb-1 lh-lg">
                                            <strong>{{ $order->user->firstname }} {{ $order->user->name }}</strong><br>
                                            {{ $order->user->email }}<br>
                                            {{ $order->user->phone ?? 'Téléphone non renseigné' }}
                                        </p>
                                        @else
                                            <p class="text-muted">Client supprimé</p>
                                        @endif
                                    </div>
                                </div>

                                {{-- Propriétaire boutique --}}
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="mb-6">
                                        <h6><i class="bi bi-shop me-2"></i>Propriétaire boutique</h6>
                                        @if($order->owner)
                                        <p class="mb-1 lh-lg">
                                            <strong>{{ $order->owner->firstname }} {{ $order->owner->name }}</strong><br>
                                            {{ $order->owner->email }}<br>
                                            {{ $order->owner->phone ?? 'Téléphone non renseigné' }}
                                        </p>
                                        @else
                                            <p class="text-muted">Propriétaire non renseigné</p>
                                        @endif
                                    </div>
                                </div>

                                {{-- Détails commande --}}
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="mb-6">
                                        <h6><i class="bi bi-receipt me-2"></i>Détails</h6>
                                        <p class="mb-1 lh-lg">
                                            N° commande : <span class="text-dark fw-bold">{{ $order->order_number }}</span><br>
                                            Date : <span class="text-dark">{{ $order->created_at->format('d M Y à H:i') }}</span><br>
                                            @if($order->type !== 'exchange')
                                                Total : <span class="text-dark fw-bold">{{ number_format($order->total, 0, ',', ' ') }} FCFA</span><br>
                                            @endif
                                            @if($order->type === 'rental')
                                                Période : <span class="text-dark">
                                                    {{ $order->rental_start_date?->format('d/m/Y') }}
                                                    → {{ $order->rental_end_date?->format('d/m/Y') }}
                                                    ({{ $order->rental_days }} jours)
                                                </span>
                                            @endif
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- Table produits --}}
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table mb-0 text-nowrap table-centered">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>
                                                @if($order->type === 'exchange')
                                                    Produits échangés
                                                @elseif($order->type === 'rental')
                                                    Article en location
                                                @else
                                                    Service demandé
                                                @endif
                                            </th>
                                            <th>Détails</th>
                                            <th>Prix</th>
                                            <th>Statut</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if($order->type === 'exchange')
                                        {{-- ── TROC : deux produits ── --}}
                                        {{-- Produit ciblé --}}
                                        <tr>
                                            <td>
                                                <a href="{{ route('shop.single', ['uuid' => $order->product?->uuid ?? '#']) }}"
                                                   class="text-inherit" target="_blank">
                                                    <div class="d-flex align-items-center">
                                                        @if($order->product?->images->count() > 0)
                                                            <img src="{{ asset($order->product->images->first()->url) }}"
                                                                 alt="" class="icon-shape icon-lg rounded">
                                                        @else
                                                            <div class="icon-shape icon-lg bg-light rounded d-flex align-items-center justify-content-center">
                                                                <i class="bi bi-box text-muted"></i>
                                                            </div>
                                                        @endif
                                                        <div class="ms-lg-4 mt-2 mt-lg-0">
                                                            <h5 class="mb-0 h6">{{ $order->product?->name ?? 'Produit supprimé' }}</h5>
                                                            <small class="text-muted">Produit ciblé</small>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>
                                                <small class="text-muted">
                                                    Code: {{ $order->product?->code ?? 'N/A' }}<br>
                                                    État: {{ $order->product?->condition?->value ?? 'N/A' }}
                                                </small>
                                            </td>
                                            <td>
                                                <span class="fw-bold">
                                                    {{ number_format($order->product?->price ?? 0, 0, ',', ' ') }} FCFA
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge bg-primary">Demandé</span>
                                            </td>
                                        </tr>

                                        {{-- Séparateur troc --}}
                                        <tr>
                                            <td colspan="4" class="text-center py-2 bg-light">
                                                <i class="bi bi-arrow-left-right me-2"></i>
                                                <strong>Échange proposé contre</strong>
                                            </td>
                                        </tr>

                                        {{-- Produit proposé --}}
                                        <tr>
                                            <td>
                                                @if($order->offeredProduct)
                                                <a href="{{ route('shop.single', ['uuid' => $order->offeredProduct->uuid]) }}"
                                                   class="text-inherit" target="_blank">
                                                    <div class="d-flex align-items-center">
                                                        @if($order->offeredProduct->images->count() > 0)
                                                            <img src="{{ asset($order->offeredProduct->images->first()->url) }}"
                                                                 alt="" class="icon-shape icon-lg rounded">
                                                        @else
                                                            <div class="icon-shape icon-lg bg-light rounded d-flex align-items-center justify-content-center">
                                                                <i class="bi bi-box text-muted"></i>
                                                            </div>
                                                        @endif
                                                        <div class="ms-lg-4 mt-2 mt-lg-0">
                                                            <h5 class="mb-0 h6">{{ $order->offeredProduct->name }}</h5>
                                                            <small class="text-muted">Produit proposé</small>
                                                        </div>
                                                    </div>
                                                </a>
                                                @else
                                                    <span class="text-muted">Aucun produit proposé</span>
                                                @endif
                                            </td>
                                            <td>
                                                <small class="text-muted">
                                                    Code: {{ $order->offeredProduct?->code ?? 'N/A' }}<br>
                                                    État: {{ $order->offeredProduct?->condition?->value ?? 'N/A' }}
                                                </small>
                                            </td>
                                            <td>
                                                <span class="fw-bold">
                                                    {{ number_format($order->offeredProduct?->price ?? 0, 0, ',', ' ') }} FCFA
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge bg-success">Proposé</span>
                                            </td>
                                        </tr>

                                        {{-- Différence de prix si déséquilibre --}}
                                        @php
                                            $diff = abs(($order->product?->price ?? 0) - ($order->offeredProduct?->price ?? 0));
                                        @endphp
                                        @if($diff > 0)
                                        <tr>
                                            <td colspan="2" class="border-bottom-0"></td>
                                            <td class="fw-bold text-dark">Montant à compléter</td>
                                            <td class="fw-bold text-danger">
                                                {{ number_format($diff, 0, ',', ' ') }} FCFA
                                            </td>
                                        </tr>
                                        @endif

                                        @else
                                        {{-- ── SERVICE ou LOCATION ── --}}
                                        <tr>
                                            <td>
                                                <a href="{{ route('shop.single', ['uuid' => $order->product?->uuid ?? '#']) }}"
                                                   class="text-inherit" target="_blank">
                                                    <div class="d-flex align-items-center">
                                                        @if($order->product?->images->count() > 0)
                                                            <img src="{{ asset($order->product->images->first()->url) }}"
                                                                 alt="" class="icon-shape icon-lg rounded">
                                                        @else
                                                            <div class="icon-shape icon-lg bg-light rounded d-flex align-items-center justify-content-center">
                                                                <i class="bi bi-box text-muted"></i>
                                                            </div>
                                                        @endif
                                                        <div class="ms-lg-4 mt-2 mt-lg-0">
                                                            <h5 class="mb-0 h6">{{ $order->product?->name ?? 'Supprimé' }}</h5>
                                                            @if($order->type === 'rental')
                                                                <small class="text-muted">
                                                                    {{ $order->rental_start_date?->format('d/m/Y') }}
                                                                    → {{ $order->rental_end_date?->format('d/m/Y') }}
                                                                </small>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>
                                                <small class="text-muted">
                                                    @if($order->type === 'rental')
                                                        Durée : {{ $order->rental_days }} jours
                                                    @else
                                                        Qté : {{ $order->quantity }}
                                                    @endif
                                                </small>
                                            </td>
                                            <td>
                                                <span class="fw-bold">
                                                    {{ number_format($order->total, 0, ',', ' ') }} FCFA
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge {{ $statusInfo['badge'] }}">
                                                    {{ $statusInfo['label'] }}
                                                </span>
                                            </td>
                                        </tr>
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    {{-- Message du client --}}
                    @if($order->message)
                    <div class="card-body p-6 border-top">
                        <div class="row">
                            <div class="col-md-6">
                                <h5><i class="bi bi-chat-text me-2"></i>Message du client</h5>
                                <p class="p-3 bg-light rounded">{{ $order->message }}</p>
                            </div>
                            @if($order->rejection_reason)
                            <div class="col-md-6">
                                <h5><i class="bi bi-x-circle text-danger me-2"></i>Raison du refus</h5>
                                <p class="p-3 bg-light rounded text-danger">{{ $order->rejection_reason }}</p>
                            </div>
                            @endif
                        </div>
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

function updateStatus(uuid, newStatus) {
    if (!confirm('Confirmer le changement de statut ?')) return;

    fetch(`/admin/orders/${uuid}/status`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json'
        },
        body: JSON.stringify({ status: newStatus })
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) window.location.reload();
    });
}
</script>
@endsection