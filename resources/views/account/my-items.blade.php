@extends('base') 
@section('content')

<main class="main-content-wrapper py-8">
<div class="container">

    {{-- Header --}}
    <div class="row mb-6">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-1">Mes articles à troquer</h2>
                    <p class="text-muted mb-0">Gérez les articles que vous proposez à l'échange</p>
                </div>
                <a href="{{ route('account.my-items-create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-2"></i>Ajouter un article
                </a>
            </div>
        </div>
    </div>

    {{-- Alertes --}}
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    {{-- Grille des articles --}}
    @if($items->count() > 0)
    <div class="row g-4">
        @foreach($items as $item)
        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="card h-100 border-0 shadow-sm">

                {{-- Image --}}
                <div class="position-relative">
                    @if($item->file_url)
                    <img src="{{ asset('storage/' . $item->file_url) }}"
                         class="card-img-top"
                         style="height:180px;object-fit:cover;"
                         alt="{{ $item->name }}">
                    @else
                    <div class="bg-light d-flex align-items-center justify-content-center"
                         style="height:180px;">
                        <i class="bi bi-image text-muted fs-1"></i>
                    </div>
                    @endif

                    {{-- Badge section --}}
                    <span class="badge position-absolute top-0 start-0 m-2
                        {{ $item->section === 'product' ? 'bg-primary' : ($item->section === 'service' ? 'bg-success' : 'bg-warning text-dark') }}">
                        {{ $item->section === 'product' ? 'Produit' : ($item->section === 'service' ? 'Service' : 'Location') }}
                    </span>

                    {{-- Badge statut --}}
                    <span class="badge bg-light text-dark border position-absolute top-0 end-0 m-2">
                        @if($item->exchange_status === 'available')
                            <i class="bi bi-check-circle text-success me-1"></i>Disponible
                        @elseif($item->exchange_status === 'pending')
                            <i class="bi bi-clock text-warning me-1"></i>En négociation
                        @else
                            <i class="bi bi-x-circle text-danger me-1"></i>Échangé
                        @endif
                    </span>
                </div>

                <div class="card-body p-3">
                    <h6 class="card-title mb-1 fw-semibold">{{ $item->name }}</h6>

                    @if($item->city)
                    <small class="text-muted">
                        <i class="bi bi-geo-alt me-1"></i>{{ $item->city }}
                    </small>
                    @endif

                    @if($item->condition)
                    <div class="mt-1">
                        <small class="badge bg-light text-dark border">{{ $item->condition }}</small>
                    </div>
                    @endif

                    @if($item->price > 0)
                    <div class="mt-2">
                        <span class="text-success fw-semibold">
                            + {{ number_format($item->price, 0, ',', ' ') }} FCFA
                            <small class="text-muted fw-normal">(complément)</small>
                        </span>
                    </div>
                    @else
                    <div class="mt-2">
                        <span class="text-primary fw-semibold small">
                            <i class="bi bi-arrow-left-right me-1"></i>Troc pur
                        </span>
                    </div>
                    @endif
                </div>

                {{-- Actions --}}
                <div class="card-footer bg-transparent border-top-0 p-3 pt-0">
                    <div class="d-flex gap-2">
                        <a href="{{ route('account.my-items-edit', $item->uuid) }}"
                           class="btn btn-sm btn-outline-secondary flex-grow-1">
                            <i class="bi bi-pencil me-1"></i>Modifier
                        </a>
                        <form action="{{ route('account.my-items-delete', $item->uuid) }}"
                              method="POST"
                              onsubmit="return confirm('Supprimer cet article ?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="mt-6">
        {{ $items->links() }}
    </div>

    @else
    {{-- État vide --}}
    <div class="text-center py-12">
        <div class="mb-4">
            <i class="bi bi-box-seam text-muted" style="font-size:4rem;"></i>
        </div>
        <h4 class="text-muted mb-2">Vous n'avez pas encore d'articles</h4>
        <p class="text-muted mb-4">
            Ajoutez des articles, services ou locations que vous souhaitez échanger.
        </p>
        <a href="{{ route('account.my-items-create') }}" class="btn btn-primary btn-lg">
            <i class="bi bi-plus-circle me-2"></i>Ajouter mon premier article
        </a>
    </div>
    @endif

</div>
</main>

@endsection