@extends('admin/base')
@section('contenue')

<main class="main-content-wrapper">
  <div class="container">

    {{-- Header --}}
    <div class="row mb-8">
      <div class="col-md-12">
        <div class="d-md-flex justify-content-between align-items-center">
          <div>
            <h2>Mes Boutiques</h2>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Mes Boutiques</li>
              </ol>
            </nav>
          </div>
          <a href="{{ route('admin.create-shop') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Créer une boutique
          </a>
        </div>
      </div>
    </div>

    {{-- Filtres --}}
    <div class="row mb-6">
      <div class="col-12">
        <div class="card card-lg">
          <div class="card-body py-4 px-6">
            <div class="row align-items-center">
              <div class="col-md-5 col-12 mb-2 mb-md-0">
                <form action="{{ route('admin.vendor-grid') }}" method="GET" class="d-flex">
                  @if(request('status') !== null)
                  <input type="hidden" name="status" value="{{ request('status') }}">
                  @endif
                  <div class="input-group">
                    <input class="form-control" type="search" name="search"
                      placeholder="Rechercher une boutique"
                      value="{{ request('search') }}">
                    <button class="btn btn-outline-secondary" type="submit">
                      <i class="bi bi-search"></i>
                    </button>
                  </div>
                </form>
              </div>
              <div class="col-md-3 col-12">
                <select class="form-select" onchange="filterStatus(this.value)">
                  <option value="">Tous les statuts</option>
                  <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Active</option>
                  <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Inactive</option>
                </select>
              </div>
              <div class="col-md-4 col-12 text-md-end mt-2 mt-md-0">
                <small class="text-muted">
                  {{ $shops->total() }} boutique(s) trouvée(s)
                </small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Grille boutiques --}}
    @if($shops->count() > 0)
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 g-lg-6">

      @foreach($shops as $shop)
      <div class="col">
        <div class="card border-0 text-center card-lg">
          <div class="card-body p-6">

            {{-- Badge statut --}}
            <div class="d-flex justify-content-between align-items-start mb-4">
              <span class="badge {{ $shop->is_active ? 'bg-success' : 'bg-danger' }}">
                <i class="bi bi-circle-fill me-1" style="font-size:8px;"></i>
                {{ $shop->is_active ? 'Active' : 'Inactive' }}
              </span>
              {{-- Dropdown actions --}}
              <div class="dropdown">
                <a href="#" class="text-reset" data-bs-toggle="dropdown">
                  <i class="feather-icon icon-more-vertical fs-5"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="{{ route('store.single', ['uuid' => $shop->uuid]) }}">
                      <i class="bi bi-eye me-3"></i>Voir la boutique
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{ route('admin.edit-shop', ['uuid' => $shop->uuid]) }}">
                      <i class="bi bi-pencil-square me-3"></i>Modifier
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#"
                      onclick="toggleShopStatus('{{ $shop->uuid }}', {{ $shop->is_active ? 1 : 0 }})">
                      <i class="bi bi-toggle-{{ $shop->is_active ? 'off' : 'on' }} me-3"></i>
                      {{ $shop->is_active ? 'Désactiver' : 'Activer' }}
                    </a>
                  </li>
                </ul>
              </div>
            </div>

            {{-- Logo --}}
            @if($shop->logo_url)
            <img src="{{ asset('storage/' . $shop->logo_url) }}"
              alt="{{ $shop->name }}"
              class="rounded-circle icon-shape icon-xxl mb-4"
              style="object-fit:cover;">
            @else
            <div class="rounded-circle icon-shape icon-xxl mb-4 bg-light d-flex align-items-center justify-content-center mx-auto">
              <i class="bi bi-shop fs-2 text-muted"></i>
            </div>
            @endif

            {{-- Nom et infos --}}
            <h2 class="mb-1 h5">
              <a href="{{ route('store.single', ['uuid' => $shop->uuid]) }}" class="text-inherit">
                {{ $shop->name }}
              </a>
            </h2>

            @if($shop->mainCategory)
            <div class="mb-1">
              <span class="badge bg-light text-dark">{{ $shop->mainCategory->name }}</span>
            </div>
            @endif

            <div class="mb-1 text-muted small">
              <i class="bi bi-envelope me-1"></i>{{ $shop->contact_email ?? $shop->user->email }}
            </div>

            @if($shop->location)
            <div class="mb-2 text-muted small">
              <i class="bi bi-geo-alt me-1"></i>{{ $shop->location }}
            </div>
            @endif

            {{-- Rating --}}
            <div class="mt-4">
              <small class="text-warning">
                @for($i = 0; $i < $shop->stars['full']; $i++)
                  <i class="bi bi-star-fill"></i>
                  @endfor
                  @if($shop->stars['half'])
                  <i class="bi bi-star-half"></i>
                  @endif
                  @for($i = 0; $i < $shop->stars['empty']; $i++)
                    <i class="bi bi-star"></i>
                    @endfor
              </small>
              <span class="ms-2 fw-bold">{{ number_format($shop->average_rating, 1) }}</span>
              <span class="text-muted ms-1 small">({{ number_format($shop->reviews_count) }} avis)</span>
            </div>

            {{-- Stats produits --}}
            <div class="mt-4 pt-4 border-top">
              <div class="row g-0 text-center">
                <div class="col">
                  <div class="fw-bold">{{ $shop->products()->where('section','product')->count() }}</div>
                  <small class="text-muted">Produits</small>
                </div>
                <div class="col border-start">
                  <div class="fw-bold">{{ $shop->products()->where('section','service')->count() }}</div>
                  <small class="text-muted">Services</small>
                </div>
                <div class="col border-start">
                  <div class="fw-bold">{{ $shop->products()->where('section','rental')->count() }}</div>
                  <small class="text-muted">Locations</small>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      @endforeach

    </div>

    {{-- Pagination --}}
    @if($shops->hasPages())
    <div class="row mt-8">
      <div class="col mt-8">
        <nav>
          {{ $shops->links('vendor.pagination.custom') }}
        </nav>
      </div>
    </div>
    @endif

    @else
    {{-- Aucune boutique --}}
    <div class="text-center py-8">
      <i class="bi bi-shop display-4 text-muted"></i>
      <h4 class="mt-4">Aucune boutique trouvée</h4>
      <p class="text-muted">Vous n'avez pas encore créé de boutique.</p>
      <a href="#" class="btn btn-primary mt-3">
        <i class="bi bi-plus-circle me-2"></i>Créer ma première boutique
      </a>
    </div>
    @endif

  </div>
</main>

@endsection

@section('scripts')
<script>
  const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

  function filterStatus(value) {
    const url = new URL(window.location.href);
    if (value !== '') url.searchParams.set('status', value);
    else url.searchParams.delete('status');
    url.searchParams.delete('page');
    window.location.href = url.toString();
  }

  function toggleShopStatus(uuid, currentStatus) {
    const action = currentStatus ? 'désactiver' : 'activer';
    if (!confirm(`Voulez-vous ${action} cette boutique ?`)) return;

    fetch(`/admin/shops/${uuid}/toggle-status`, {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': csrfToken,
          'Accept': 'application/json'
        }
      })
      .then(r => r.json())
      .then(data => {
        if (data.success) {
          showAlert('success', data.message);
          setTimeout(() => window.location.reload(), 800);
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