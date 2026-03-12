@extends('admin/base')
@section('contenue')

<main class="main-content-wrapper">
    <div class="container">

        {{-- Header --}}
        <div class="row mb-8">
            <div class="col-md-12">
                <div class="d-md-flex justify-content-between align-items-center">
                    <div>
                        <h2>Mes Clients</h2>
                        <p class="text-muted mb-0">
                            Clients ayant passé une demande sur vos produits
                        </p>
                    </div>
                    <div class="d-flex gap-2 mt-3 mt-md-0">
                        <span class="badge bg-primary fs-6 px-3 py-2">
                            {{ $customers->total() }} client(s)
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-12 mb-5">
                <div class="card h-100 card-lg">

                    {{-- Barre recherche + filtres --}}
                    <div class="p-6">
                        <form action="{{ route('admin.customers') }}" method="GET"
                              class="row g-3 align-items-end" id="customerFilterForm">

                            <div class="col-md-4 col-12">
                                <input class="form-control" type="search" name="search"
                                       value="{{ request('search') }}"
                                       placeholder="Rechercher un client...">
                            </div>

                            <div class="col-md-2 col-6">
                                <select class="form-select" name="type"
                                        onchange="document.getElementById('customerFilterForm').submit()">
                                    <option value="">Tous types</option>
                                    <option value="exchange" {{ request('type') === 'exchange' ? 'selected' : '' }}>Échange</option>
                                    <option value="service"  {{ request('type') === 'service'  ? 'selected' : '' }}>Service</option>
                                    <option value="rental"   {{ request('type') === 'rental'   ? 'selected' : '' }}>Location</option>
                                </select>
                            </div>

                            <div class="col-md-2 col-6">
                                <select class="form-select" name="sort"
                                        onchange="document.getElementById('customerFilterForm').submit()">
                                    <option value=""          {{ !request('sort') ? 'selected' : '' }}>Plus récents</option>
                                    <option value="orders"    {{ request('sort') === 'orders'  ? 'selected' : '' }}>+ de demandes</option>
                                    <option value="total"     {{ request('sort') === 'total'   ? 'selected' : '' }}>+ dépensé</option>
                                </select>
                            </div>

                            <div class="col-md-2 col-6">
                                <button class="btn btn-primary w-100" type="submit">
                                    <i class="bi bi-search me-1"></i>Filtrer
                                </button>
                            </div>

                            @if(request()->hasAny(['search', 'type', 'sort']))
                            <div class="col-md-2 col-6">
                                <a href="{{ route('admin.customers') }}"
                                   class="btn btn-outline-secondary w-100">
                                    <i class="bi bi-x me-1"></i>Réinitialiser
                                </a>
                            </div>
                            @endif

                        </form>
                    </div>

                    {{-- Tableau --}}
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-centered table-hover table-borderless mb-0 text-nowrap">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Client</th>
                                        <th>Email</th>
                                        <th>Téléphone</th>
                                        <th>Demandes</th>
                                        <th>Type(s)</th>
                                        <th>Statut principal</th>
                                        <th>Total estimé</th>
                                        <th>Dernière demande</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                @forelse($customers as $customer)
                                @php
                                    $typeBadges = [
                                        'exchange' => ['bg-primary',   'Échange'],
                                        'service'  => ['bg-info',      'Service'],
                                        'rental'   => ['bg-warning text-dark', 'Location'],
                                    ];
                                    $statusBadges = [
                                        'pending'       => ['bg-secondary', 'En attente'],
                                        'accepted'      => ['bg-success',   'Accepté'],
                                        'rejected'      => ['bg-danger',    'Rejeté'],
                                        'completed'     => ['bg-primary',   'Complété'],
                                        'cancelled'     => ['bg-dark',      'Annulé'],
                                        'counter_offer' => ['bg-warning text-dark', 'Contre-offre'],
                                    ];
                                    $lastStatus = $customer->last_status ?? 'pending';
                                    [$statusClass, $statusLabel] = $statusBadges[$lastStatus] ?? ['bg-secondary', $lastStatus];
                                @endphp
                                <tr>
                                    {{-- Avatar + Nom --}}
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if($customer->avatar_url)
                                                <img src="{{ asset('storage/' . $customer->avatar_url) }}"
                                                     alt="{{ $customer->name }}"
                                                     class="avatar avatar-xs rounded-circle">
                                            @else
                                                <div class="avatar avatar-xs rounded-circle bg-light
                                                            d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-person text-muted small"></i>
                                                </div>
                                            @endif
                                            <div class="ms-2">
                                                <span class="text-inherit fw-medium">
                                                    {{ $customer->name }}
                                                </span>
                                            </div>
                                        </div>
                                    </td>

                                    {{-- Email --}}
                                    <td>
                                        <a href="mailto:{{ $customer->email }}" class="text-muted">
                                            {{ $customer->email }}
                                        </a>
                                    </td>

                                    {{-- Téléphone --}}
                                    <td>{{ $customer->phone ?? '—' }}</td>

                                    {{-- Nombre de demandes --}}
                                    <td>
                                        <span class="badge bg-light text-dark border">
                                            {{ $customer->orders_count }}
                                        </span>
                                    </td>

                                    {{-- Types de demandes --}}
                                    <td>
                                        @foreach(explode(',', $customer->order_types ?? '') as $type)
                                            @php $type = trim($type); @endphp
                                            @if(isset($typeBadges[$type]))
                                            <span class="badge {{ $typeBadges[$type][0] }} me-1">
                                                {{ $typeBadges[$type][1] }}
                                            </span>
                                            @endif
                                        @endforeach
                                    </td>

                                    {{-- Statut dernière demande --}}
                                    <td>
                                        <span class="badge {{ $statusClass }}">
                                            {{ $statusLabel }}
                                        </span>
                                    </td>

                                    {{-- Total --}}
                                    <td>
                                        <span class="fw-medium">
                                            {{ number_format($customer->total_spent ?? 0, 0, ',', ' ') }} FCFA
                                        </span>
                                    </td>

                                    {{-- Date dernière demande --}}
                                    <td>
                                        <span class="text-muted small">
                                            {{ \Carbon\Carbon::parse($customer->last_order_date)->diffForHumans() }}
                                        </span>
                                        <br>
                                        <small class="text-muted">
                                            {{ \Carbon\Carbon::parse($customer->last_order_date)->format('d M Y') }}
                                        </small>
                                    </td>

                                    {{-- Actions --}}
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" class="text-reset"
                                               data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="feather-icon icon-more-vertical fs-5"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    {{-- Remplace ligne 201 --}}
<a class="dropdown-item"
   href="{{ $customer->uuid ? route('admin.customer-orders', ['uuid' => $customer->uuid]) : '#' }}">
    <i class="bi bi-list-ul me-3"></i>Voir ses demandes
</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item"
                                                       href="mailto:{{ $customer->email }}">
                                                        <i class="bi bi-envelope me-3"></i>Envoyer un email
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="text-center py-8">
                                        <i class="bi bi-people display-4 text-muted d-block mb-3"></i>
                                        <p class="text-muted mb-0">Aucun client trouvé</p>
                                        @if(request()->hasAny(['search', 'type']))
                                        <a href="{{ route('admin.customers') }}"
                                           class="btn btn-outline-secondary btn-sm mt-3">
                                            Voir tous les clients
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforelse

                                </tbody>
                            </table>
                        </div>

                        {{-- Pagination --}}
                        <div class="border-top d-md-flex justify-content-between align-items-center p-6">
                            <span class="text-muted small">
                                Affichage {{ $customers->firstItem() }}–{{ $customers->lastItem() }}
                                sur {{ $customers->total() }} clients
                            </span>
                            <nav class="mt-2 mt-md-0">
                                {{ $customers->appends(request()->query())->links('vendor.pagination.custom') }}
                            </nav>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

@endsection