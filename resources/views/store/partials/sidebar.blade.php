<div class="col-12 col-lg-3 col-md-4 mb-4 mb-md-0">
    <div class="d-flex flex-column">
        <div>
            @if($shop->logo_url)
                <img src="{{ asset('storage/' . $shop->logo_url) }}"
                     alt="{{ $shop->name }}"
                     class="rounded-circle icon-shape icon-xxl">
            @else
                <div class="rounded-circle icon-shape icon-xxl bg-light d-flex align-items-center justify-content-center">
                    <i class="bi bi-shop fs-2 text-muted"></i>
                </div>
            @endif
        </div>

        <div class="mt-4">
            <h1 class="mb-1 h4">{{ $shop->name }}</h1>

            @if($shop->description)
            <div class="small text-muted">
                <span>{{ Str::limit($shop->description, 60) }}</span>
            </div>
            @endif

            @if($shop->website_url)
            <div>
                <span><small><a href="{{ $shop->website_url }}" target="_blank">{{ $shop->website_url }}</a></small></span>
            </div>
            @endif

            {{-- Rating --}}
            <div class="mt-2">
                @php
                    $rating = round($shop->average_rating * 2) / 2;
                    $full   = floor($rating);
                    $half   = ($rating - $full) >= 0.5 ? 1 : 0;
                    $empty  = 5 - $full - $half;
                @endphp
                <small class="text-warning">
                    @for($i = 0; $i < $full; $i++)<i class="bi bi-star-fill"></i>@endfor
                    @if($half)<i class="bi bi-star-half"></i>@endif
                    @for($i = 0; $i < $empty; $i++)<i class="bi bi-star"></i>@endfor
                </small>
                <span class="ms-2">{{ number_format($shop->average_rating, 1) }}</span>
                <span class="text-muted ms-1">({{ number_format($shop->reviews_count) }} avis)</span>
            </div>
        </div>
    </div>

    <hr>

    {{-- Navigation principale --}}
    <ul class="nav flex-column nav-pills nav-pills-dark">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('store.single') ? 'active' : '' }}"
               href="{{ route('store.single', ['uuid' => $shop->uuid]) }}">
                <i class="feather-icon icon-shopping-bag me-2"></i>Boutique
            </a>
        </li>
            <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('blog') ? 'active' : '' }}"
               href="{{ route('blog') }}">
                <i class="feather-icon icon-phone-call me-2"></i>Blog
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('store.reviews') ? 'active' : '' }}"
               href="{{ route('store.reviews', ['uuid' => $shop->uuid]) }}">
                <i class="feather-icon icon-star me-2"></i>Avis
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('store.contact') ? 'active' : '' }}"
               href="{{ route('store.contact', ['uuid' => $shop->uuid]) }}">
                <i class="feather-icon icon-phone-call me-2"></i>Contact
            </a>
        </li>

    </ul>

    <hr>

    {{-- Catégories de la boutique --}}
    @if($shop->mainCategory || $shopCategories->count() > 0)
    <div>
        <ul class="nav flex-column nav-links">
            @foreach($shopCategories as $category)
            <li class="nav-item">
                <a href="{{ route('store.single', ['uuid' => $shop->uuid, 'category' => $category->id]) }}"
                   class="nav-link {{ request('category') == $category->id ? 'fw-bold text-dark' : '' }}">
                    {{ $category->name }}
                </a>
            </li>
            @endforeach
        </ul>
    </div>
    @endif
</div>