@extends('admin/base')
@section('contenue')

<main class="main-content-wrapper">
    <section class="container">

        {{-- Bannière de bienvenue --}}
        <div class="row mb-8">
            <div class="col-md-12">
                <div class="card bg-light border-0 rounded-4"
                     style="background-image: url(../assets/images/slider/slider-image-1.jpg);
                            background-repeat: no-repeat; background-size: cover; background-position: right;">
                    <div class="card-body p-lg-12">
                        <h1>Bienvenue, {{ Auth::user()->firstname ?? Auth::user()->name }} 👋</h1>
                        <p>Gérez vos produits, services, locations et blogs depuis votre espace admin.</p>
                        <a href="{{ route('admin.add-product-form') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-2"></i>Ajouter un produit
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Stats produits / services / locations --}}
        <div class="row">

            {{-- Produits --}}
            <div class="col-lg-4 col-12 mb-6">
                <div class="card h-100 card-lg">
                    <div class="card-body p-6">
                        <div class="d-flex justify-content-between align-items-center mb-6">
                            <h4 class="mb-0 fs-5">Produits</h4>
                            <div class="icon-shape icon-md bg-light-danger text-dark-danger rounded-circle">
                                <i class="bi bi-box-seam fs-5"></i>
                            </div>
                        </div>
                        <div class="lh-1">
                            <h1 class="mb-2 fw-bold fs-2">{{ $stats['products_count'] }}</h1>
                            <span>
                                <span class="text-dark me-1">{{ $stats['orders_product'] }}</span>
                                commande{{ $stats['orders_product'] > 1 ? 's' : '' }} en produit
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Services --}}
            <div class="col-lg-4 col-12 mb-6">
                <div class="card h-100 card-lg">
                    <div class="card-body p-6">
                        <div class="d-flex justify-content-between align-items-center mb-6">
                            <h4 class="mb-0 fs-5">Services</h4>
                            <div class="icon-shape icon-md bg-light-warning text-dark-warning rounded-circle">
                                <i class="bi bi-tools fs-5"></i>
                            </div>
                        </div>
                        <div class="lh-1">
                            <h1 class="mb-2 fw-bold fs-2">{{ $stats['services_count'] }}</h1>
                            <span>
                                <span class="text-dark me-1">{{ $stats['orders_service'] }}</span>
                                commande{{ $stats['orders_service'] > 1 ? 's' : '' }} en service
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Locations --}}
            <div class="col-lg-4 col-12 mb-6">
                <div class="card h-100 card-lg">
                    <div class="card-body p-6">
                        <div class="d-flex justify-content-between align-items-center mb-6">
                            <h4 class="mb-0 fs-5">Locations</h4>
                            <div class="icon-shape icon-md bg-light-info text-dark-info rounded-circle">
                                <i class="bi bi-house-door fs-5"></i>
                            </div>
                        </div>
                        <div class="lh-1">
                            <h1 class="mb-2 fw-bold fs-2">{{ $stats['rentals_count'] }}</h1>
                            <span>
                                <span class="text-dark me-1">{{ $stats['orders_rental'] }}</span>
                                commande{{ $stats['orders_rental'] > 1 ? 's' : '' }} en location
                            </span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- Stats secondaires --}}
        <div class="row mb-6">

            {{-- Revenus totaux --}}
            <div class="col-lg-3 col-6 mb-4">
                <div class="card card-lg h-100">
                    <div class="card-body p-6">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="mb-0 fs-6 text-muted">Revenus</h4>
                            <div class="icon-shape icon-sm bg-light-success text-dark-success rounded-circle">
                                <i class="bi bi-cash-stack"></i>
                            </div>
                        </div>
                        <h2 class="fw-bold mb-0">{{ number_format($stats['total_revenue'], 0, ',', ' ') }} FCFA</h2>
                        <small class="text-muted">Commandes complétées</small>
                    </div>
                </div>
            </div>

            {{-- Clients --}}
            <div class="col-lg-3 col-6 mb-4">
                <div class="card card-lg h-100">
                    <div class="card-body p-6">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="mb-0 fs-6 text-muted">Clients</h4>
                            <div class="icon-shape icon-sm bg-light-primary text-dark-primary rounded-circle">
                                <i class="bi bi-people"></i>
                            </div>
                        </div>
                        <h2 class="fw-bold mb-0">{{ $stats['customers_count'] }}</h2>
                        <small class="text-muted">Clients uniques</small>
                    </div>
                </div>
            </div>

            {{-- Avis --}}
            <div class="col-lg-3 col-6 mb-4">
                <div class="card card-lg h-100">
                    <div class="card-body p-6">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="mb-0 fs-6 text-muted">Avis</h4>
                            <div class="icon-shape icon-sm bg-light-warning text-dark-warning rounded-circle">
                                <i class="bi bi-star"></i>
                            </div>
                        </div>
                        <h2 class="fw-bold mb-0">{{ $stats['reviews_count'] }}</h2>
                        <small class="text-muted">
                            Moy. {{ number_format($stats['avg_rating'], 1) }}/5
                            @for($i = 1; $i <= 5; $i++)
                                <i class="bi bi-star{{ $i <= round($stats['avg_rating']) ? '-fill text-warning' : ' text-muted' }}" style="font-size:10px;"></i>
                            @endfor
                        </small>
                    </div>
                </div>
            </div>

            {{-- Blogs --}}
            <div class="col-lg-3 col-6 mb-4">
                <div class="card card-lg h-100">
                    <div class="card-body p-6">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="mb-0 fs-6 text-muted">Blogs</h4>
                            <div class="icon-shape icon-sm bg-light-danger text-dark-danger rounded-circle">
                                <i class="bi bi-journal-text"></i>
                            </div>
                        </div>
                        <h2 class="fw-bold mb-0">{{ $stats['blogs_count'] }}</h2>
                        <small class="text-muted">{{ $stats['blogs_published'] }} publiés</small>
                    </div>
                </div>
            </div>

        </div>

        {{-- Dernières commandes --}}
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 mb-6">
                <div class="card h-100 card-lg">
                    <div class="p-6 d-flex justify-content-between align-items-center">
                        <h3 class="mb-0 fs-5">Dernières commandes</h3>
                        <a href="{{ route('admin.order-list') }}" class="btn btn-sm btn-outline-secondary">
                            Voir tout
                        </a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-centered table-borderless text-nowrap table-hover mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th>N° commande</th>
                                        <th>Article</th>
                                        <th>Client</th>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Total</th>
                                        <th>Statut</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($recentOrders as $order)
                                    <tr>
                                        {{-- N° commande --}}
                                        <td>
                                            <span class="text-muted">#{{ strtoupper(substr($order->uuid, 0, 8)) }}</span>
                                        </td>

                                        {{-- Article --}}
                                        <td>
                                            @if($order->product)
                                                <div class="d-flex align-items-center gap-2">
                                                    @if($order->product->file_url)
                                                        <img src="{{ asset('storage/' . $order->product->file_url) }}"
                                                             class="rounded" style="width:32px;height:32px;object-fit:cover;">
                                                    @endif
                                                    <span>{{ Str::limit($order->product->name, 30) }}</span>
                                                </div>
                                            @else
                                                <span class="text-muted">—</span>
                                            @endif
                                        </td>

                                        {{-- Client --}}
                                        <td>
                                            @if($order->user)
                                                <div class="d-flex align-items-center gap-2">
                                                    @if($order->user->avatar_url)
                                                        <img src="{{ asset('storage/' . $order->user->avatar_url) }}"
                                                             class="rounded-circle"
                                                             style="width:28px;height:28px;object-fit:cover;">
                                                    @else
                                                        <div class="rounded-circle bg-light border d-flex align-items-center justify-content-center"
                                                             style="width:28px;height:28px;">
                                                            <i class="bi bi-person text-muted" style="font-size:11px;"></i>
                                                        </div>
                                                    @endif
                                                    <span>{{ $order->user->name }}</span>
                                                </div>
                                            @else
                                                <span class="text-muted">—</span>
                                            @endif
                                        </td>

                                        {{-- Date --}}
                                        <td>
                                            <small>{{ $order->created_at->format('d M Y') }}</small>
                                        </td>

                                        {{-- Type --}}
                                        <td>
                                            @php
                                                $typeColor = match($order->type) {
                                                    'exchange' => 'primary',
                                                    'service'  => 'warning',
                                                    'rental'   => 'info',
                                                    default    => 'secondary',
                                                };
                                                $typeLabel = match($order->type) {
                                                    'exchange' => 'Échange',
                                                    'service'  => 'Service',
                                                    'rental'   => 'Location',
                                                    default    => $order->type,
                                                };
                                            @endphp
                                            <span class="badge bg-light-{{ $typeColor }} text-dark-{{ $typeColor }}">
                                                {{ $typeLabel }}
                                            </span>
                                        </td>

                                        {{-- Total --}}
                                        <td>
                                            @if($order->total)
                                                <span class="fw-semibold">{{ number_format($order->total, 0, ',', ' ') }} FCFA</span>
                                            @else
                                                <span class="text-muted">—</span>
                                            @endif
                                        </td>

                                        {{-- Statut --}}
                                        <td>
                                            @php
                                                $statusColor = match($order->status) {
                                                    'completed'     => 'success',
                                                    'accepted'      => 'primary',
                                                    'pending'       => 'warning',
                                                    'rejected',
                                                    'cancelled'     => 'danger',
                                                    'counter_offer' => 'info',
                                                    default         => 'secondary',
                                                };
                                                $statusLabel = match($order->status) {
                                                    'completed'     => 'Complété',
                                                    'accepted'      => 'Accepté',
                                                    'pending'       => 'En attente',
                                                    'rejected'      => 'Refusé',
                                                    'cancelled'     => 'Annulé',
                                                    'counter_offer' => 'Contre-offre',
                                                    default         => $order->status,
                                                };
                                            @endphp
                                            <span class="badge bg-light-{{ $statusColor }} text-dark-{{ $statusColor }}">
                                                {{ $statusLabel }}
                                            </span>
                                        </td>

                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-6 text-muted">
                                            <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                                            Aucune commande pour le moment
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</main>

@endsection