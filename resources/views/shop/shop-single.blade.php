@php
use App\Enums\ExchangeStatus;
use App\Enums\ProductCondition;
@endphp

@section('css')
<style>
    .report-option {
        cursor: pointer;
        transition: all 0.2s;
    }

    .report-option:hover {
        background-color: #fff5f5;
        border-color: #dc3545 !important;
    }

    .report-option:has(input:checked) {
        background-color: #fff5f5;
        border-color: #dc3545 !important;
    }

    .report-option input:checked+label {
        color: #dc3545;
        font-weight: 600;
    }
</style>


@endsection


@extends('base')
@section('content')

<main>
    <div class="mt-4">
        <div class="container">
            <!-- row -->
            <div class="row ">
                <!-- col -->
                <div class="col-12">

                </div>
            </div>
        </div>
    </div>
    <section class="mt-8">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <!-- img slide -->
                    <div class="product" id="product">

                        @forelse($product->images->where('deleted', 0) as $image)
                        <div>
                            <div class="zoom" onmousemove="zoom(event)"
                                style="background-image: url({{ asset($image->url) }})">
                                <img src="{{ asset($image->url) }}" alt="{{ $product->name }}">
                            </div>
                        </div>
                        @empty
                        {{-- Image par défaut si aucune image --}}
                        <div>
                            <div class="zoom" onmousemove="zoom(event)"
                                style="background-image: url({{ asset('assets/images/products/placeholder.jpg') }})">
                                <img src="{{ asset('assets/images/products/placeholder.jpg') }}" alt="{{ $product->name }}">
                            </div>
                        </div>
                        @endforelse

                    </div>

                    <!-- product tools / thumbnails -->
                    <div class="product-tools">
                        <div class="thumbnails row g-3" id="productThumbnails">

                            @forelse($product->images->where('deleted', 0) as $image)
                            <div class="col-3">
                                <div class="thumbnails-img">
                                    <img src="{{ asset($image->url) }}" alt="{{ $product->name }}">
                                </div>
                            </div>
                            @empty
                            <div class="col-3">
                                <div class="thumbnails-img">
                                    <img src="{{ asset('assets/images/products/placeholder.jpg') }}" alt="{{ $product->name }}">
                                </div>
                            </div>
                            @endforelse

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="ps-lg-10 mt-6 mt-md-0">
                        <!-- content -->
                        <a href="#!" class="mb-4 d-block">{{ $product->categories[0]->name ?? 'N/A' }}</a>
                        <!-- heading -->
                        <h1 class="mb-1">{{ $product->name }}</h1>

                        <!-- hr -->
                        <hr class="my-6">
                        <div class="fs-4">
                            <a href="{{ route('store.single', ['uuid' => '1f179672-b492-4421-a8ff-0cf3293d131e']) }}"> <span class="text-secondary">{{ $product->shop->name ?? 'N/A' }}</span></a>
                        </div>
                        <div class="mb-4">
                            <small class="text-warning">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i></small><a href="#" class="ms-2">(30 reviews)</a>
                        </div>
                        <div class="mt-3 row justify-content-start g-2 align-items-center">
                            <div class="col-xxl-4 col-lg-4 col-md-5 col-5 d-grid">
                                <button type="button" class="btn btn-primary"><i class="feather-icon icon-shopping-bag me-2"></i>Add to cart</button>
                            </div>
                            <div class="col-md-4 col-4">
                                <a class="btn btn-light " href="#" data-bs-toggle="tooltip" data-bs-html="true" aria-label="Compare"><i class="bi bi-arrow-left-right"></i></a>
                            </div>
                        </div>
                        <!-- hr -->
                        <hr class="my-6">
                        <div>
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <td>Product Code:</td>
                                        <td>{{ $product->code ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Date de mise en ligne:</td>
                                        <td>
                                            {{ $product->online_date
    ? \Carbon\Carbon::parse($product->online_date)->locale('fr')->translatedFormat('d F Y')
    : 'N/A'
}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Statut:</td>
                                        <td>
                                            @php
                                            $statusColor = match($product->exchange_status) {
                                            ExchangeStatus::EnEchange => 'success',
                                            ExchangeStatus::EchangeTermine => 'secondary',
                                            ExchangeStatus::Indisponible => 'danger',
                                            };
                                            @endphp
                                            <span class="badge bg-{{ $statusColor }}">
                                                {{ $product->exchange_status ?? 'N/A' }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Adresse:</td>
                                        <td>
                                            <small>
                                                {{ $product->city ?? 'N/A' }}
                                                @if($product->district)
                                                <span class="text-muted">({{ $product->district }})</span>
                                                @endif
                                            </small>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-8">
                            <!-- dropdown -->
                            <div class="dropdown">
                                <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Share
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-facebook me-2"></i>Facebook</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-twitter me-2"></i>Twitter</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-instagram me-2"></i>Instagram</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-lg-14 mt-8 ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills nav-lb-tab" id="myTab" role="tablist">
                        <!-- nav item -->
                        <li class="nav-item" role="presentation">
                            <!-- btn --> <button class="nav-link active" id="product-tab" data-bs-toggle="tab"
                                data-bs-target="#product-tab-pane" type="button" role="tab" aria-controls="product-tab-pane"
                                aria-selected="true">Product Details</button>
                        </li>

                        <!-- nav item -->
                        <li class="nav-item" role="presentation">
                            <!-- btn --> <button class="nav-link" id="reviews-tab" data-bs-toggle="tab"
                                data-bs-target="#reviews-tab-pane" type="button" role="tab" aria-controls="reviews-tab-pane"
                                aria-selected="false">Reviews</button>
                        </li>
                        <!-- nav item -->

                    </ul>
                    <!-- tab content -->
                    <div class="tab-content" id="myTabContent">
                        <!-- tab pane -->
                        <div class="tab-pane fade show active" id="product-tab-pane" role="tabpanel" aria-labelledby="product-tab"
                            tabindex="0">
                            <div class="my-8">
                                <div class="mb-5">
                                    <h4 class="mb-1">Caractéristique</h4>
                                    @if($product->description)
                                    <p class="mb-0">{{ $product->description }}</p>
                                    @else
                                    <p class="mb-0 text-muted fst-italic">Aucune caractéristique renseignée.</p>
                                    @endif
                                </div>

                                <div class="mb-5">
                                    <h5 class="mb-1">Etat</h5>
                                    @if($product->condition)
                                    @php
                                    $conditionColor = match($product->condition) {
                                    ProductCondition::Neuf => 'success',
                                    ProductCondition::TresBonEtat => 'primary',
                                    ProductCondition::BonEtat => 'info',
                                    ProductCondition::EtatAcceptable => 'warning',
                                    ProductCondition::Usage => 'danger',
                                    default => 'secondary',
                                    };
                                    @endphp
                                    <span class="badge bg-{{ $conditionColor }} mb-2">
                                        {{ $product->condition }}
                                    </span>
                                    <p class="mb-0">{{ $product->description ?? '' }}</p>
                                    @else
                                    <p class="mb-0 text-muted fst-italic">Aucun état renseigné.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- tab pane -->

                        <!-- tab pane -->
                      @include('store.partials.reviews-section', ['wrapInTab' => true])


                    </div>
                    <!-- tab pane -->
                    <div class="tab-pane fade" id="sellerInfo-tab-pane" role="tabpanel" aria-labelledby="sellerInfo-tab"
                        tabindex="0">...</div>
                </div>
            </div>
        </div>
        </div>



    </section>

    <!-- section -->
    <section class="my-lg-14 my-14">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <!-- heading -->
                    <h3>Related Items</h3>
                </div>
            </div>
            <!-- row -->
            <div class="row g-4 row-cols-lg-5 row-cols-2 row-cols-md-2 mt-2">
                <!-- col -->
                <div class="col">
                    <div class="card card-product">
                        <div class="card-body">
                            <!-- badge -->
                            <div class="text-center position-relative ">
                                <div class=" position-absolute top-0 start-0">
                                    <span class="badge bg-danger">Sale</span>
                                </div>
                                <a href="#!">
                                    <img src="{{ asset('assets/images/products/product-img-1.jpg') }}" alt="Grocery Ecommerce Template"
                                        class="mb-3 img-fluid"></a>
                                <!-- action btn -->
                                <div class="card-product-action">
                                    <a href="#!" class="btn-action" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                            class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
                                    <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i
                                            class="bi bi-arrow-left-right"></i></a>
                                </div>
                            </div>
                            <!-- heading -->
                            <div class="text-small mb-1"><a href="#!" class="text-decoration-none text-muted"><small>Snack &
                                        Munchies</small></a></div>
                            <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Haldiram's Sev Bhujia</a></h2>
                            <div>
                                <small class="text-warning"> <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5(149)</span>
                            </div>
                            <!-- price -->
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div><span class="text-dark">$18</span> <span class="text-decoration-line-through text-muted">$24</span>
                                </div>
                                <div><a href="#!" class="btn btn-primary btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-plus">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg> Add</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- col -->
                <div class="col">
                    <div class="card card-product">
                        <div class="card-body">
                            <div class="text-center position-relative"> <a href="#!"><img
                                        src="{{ asset('assets/images/products/product-img-2.jpg') }}" alt="Grocery Ecommerce Template"
                                        class="mb-3 img-fluid"></a>
                                <div class="card-product-action">
                                    <a href="#!" class="btn-action" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                            class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
                                    <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i
                                            class="bi bi-arrow-left-right"></i></a>
                                </div>
                            </div>
                            <div class="text-small mb-1"><a href="#!" class="text-decoration-none text-muted"><small>Bakery &
                                        Biscuits</small></a></div>
                            <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">NutriChoice Digestive </a></h2>
                            <div class="text-warning">
                                <small> <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5 (25)</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div><span class="text-dark">$24</span></div>
                                <div><a href="#!" class="btn btn-primary btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-plus">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg> Add</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- col -->
                <div class="col">
                    <div class="card card-product">
                        <div class="card-body">
                            <div class="text-center position-relative"> <a href="#!"><img
                                        src="{{ asset('assets/images/products/product-img-3.jpg') }}" alt="Grocery Ecommerce Template"
                                        class="mb-3 img-fluid"></a>
                                <div class="card-product-action">
                                    <a href="#!" class="btn-action" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                            class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
                                    <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i
                                            class="bi bi-arrow-left-right"></i></a>
                                </div>
                            </div>
                            <div class="text-small mb-1"><a href="#!" class="text-decoration-none text-muted"><small>Bakery &
                                        Biscuits</small></a></div>
                            <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Cadbury 5 Star Chocolate</a></h2>
                            <div class="text-warning">
                                <small> <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i></small> <span class="text-muted small">5 (469)</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div><span class="text-dark">$32</span> <span class="text-decoration-line-through text-muted">$35</span></div>
                                <div><a href="#!" class="btn btn-primary btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-plus">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg> Add</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- col -->
                <div class="col">
                    <div class="card card-product">
                        <div class="card-body">
                            <div class="text-center position-relative"> <a href="#!"><img
                                        src="{{ asset('assets/images/products/product-img-4.jpg') }}" alt="Grocery Ecommerce Template"
                                        class="mb-3 img-fluid"></a>
                                <div class="card-product-action">
                                    <a href="#!" class="btn-action" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                            class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
                                    <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i
                                            class="bi bi-arrow-left-right"></i></a>
                                </div>
                            </div>
                            <div class="text-small mb-1"><a href="#!" class="text-decoration-none text-muted"><small>Snack &
                                        Munchies</small></a></div>
                            <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Onion Flavour Potato</a></h2>
                            <div class="text-warning">
                                <small> <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i>
                                    <i class="bi bi-star"></i></small> <span class="text-muted small">3.5 (456)</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div><span class="text-dark">$3</span> <span class="text-decoration-line-through text-muted">$5</span></div>
                                <div><a href="#!" class="btn btn-primary btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-plus">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg> Add</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- col -->
                <div class="col">
                    <div class="card card-product">
                        <div class="card-body">
                            <div class="text-center position-relative"> <a href="#!"><img
                                        src="{{ asset('assets/images/products/product-img-9.jpg') }}" alt="Grocery Ecommerce Template"
                                        class="mb-3 img-fluid"></a>
                                <div class="card-product-action">
                                    <a href="#!" class="btn-action" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                            class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
                                    <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i
                                            class="bi bi-arrow-left-right"></i></a>
                                </div>
                            </div>
                            <div class="text-small mb-1"><a href="#!" class="text-decoration-none text-muted"><small>Snack &
                                        Munchies</small></a></div>
                            <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Slurrp Millet Chocolate </a></h2>
                            <div class="text-warning">
                                <small> <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5 (67)</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div><span class="text-dark">$6</span> <span class="text-decoration-line-through text-muted">$10</span></div>
                                <div><a href="#!" class="btn btn-primary btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-plus">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg> Add</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

</main>


<!--  the modal -->


<div class="modal fade" id="quickViewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-8">
                <div class="position-absolute top-0 end-0 me-3 mt-3">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <!-- img slide -->
                        <div class="product productModal" id="productModal">
                            <div class="zoom" onmousemove="zoom(event)"
                                style="background-image: url({{ asset('assets/images/products/product-single-img-1.jpg') }})">
                                <img src="{{ asset('assets/images/products/product-single-img-1.jpg') }}" alt="">
                            </div>
                            <div>
                                <div class="zoom" onmousemove="zoom(event)"
                                    style="background-image: url({{ asset('assets/images/products/product-single-img-2.jpg') }})">
                                    <img src="{{ asset('assets/images/products/product-single-img-2.jpg') }}" alt="">
                                </div>
                            </div>
                            <div>
                                <div class="zoom" onmousemove="zoom(event)"
                                    style="background-image: url({{ asset('assets/images/products/product-single-img-3.jpg') }})">
                                    <img src="{{ asset('assets/images/products/product-single-img-3.jpg') }}" alt="">
                                </div>
                            </div>
                            <div>
                                <div class="zoom" onmousemove="zoom(event)"
                                    style="background-image: url({{ asset('assets/images/products/product-single-img-4.jpg') }})">
                                    <img src="{{ asset('assets/images/products/product-single-img-4.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <!-- product tools -->
                        <div class="product-tools">
                            <div class="thumbnails row g-3" id="productModalThumbnails">
                                <div class="col-3" class="tns-nav-active">
                                    <div class="thumbnails-img">
                                        <img src="{{ asset('assets/images/products/product-single-img-1.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="thumbnails-img">
                                        <img src="{{ asset('assets/images/products/product-single-img-2.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="thumbnails-img">
                                        <img src="{{ asset('assets/images/products/product-single-img-3.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="thumbnails-img">
                                        <img src="{{ asset('assets/images/products/product-single-img-4.jpg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ps-lg-8 mt-6 mt-lg-0">
                            <a href="#!" class="mb-4 d-block">{{ $product->categories[0]->name ?? 'N/A' }}</a>
                            <h2 class="mb-1 h1">{{ $product->name }}</h2>
                            <div class="mb-4">
                                <small class="text-warning">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i></small><a href="#" class="ms-2">(30 reviews)</a>
                            </div>
                            <div class="fs-4">
                                <span class="fw-bold text-dark">$32</span>
                                <span class="text-decoration-line-through text-muted">$35</span><span><small
                                        class="fs-6 ms-2 text-danger">26% Off</small></span>
                            </div>
                            <hr class="my-6">
                            <div class="mb-4">
                                <button type="button" class="btn btn-outline-secondary">250g</button>
                                <button type="button" class="btn btn-outline-secondary">500g</button>
                                <button type="button" class="btn btn-outline-secondary">1kg</button>
                            </div>
                            <div class="mt-3 row justify-content-start g-2 align-items-center">
                                <div class="col-lg-4 col-md-5 col-6 d-grid">
                                    <button type="button" class="btn btn-primary">
                                        <i class="feather-icon icon-shopping-bag me-2"></i>Add to cart
                                    </button>
                                </div>
                                <div class="col-md-4 col-5">
                                    <a class="btn btn-light" href="#" data-bs-toggle="tooltip" data-bs-html="true"
                                        aria-label="Compare"><i class="bi bi-arrow-left-right"></i></a>
                                    <a class="btn btn-light" href="#!" data-bs-toggle="tooltip" data-bs-html="true"
                                        aria-label="Wishlist"><i class="feather-icon icon-heart"></i></a>
                                </div>
                            </div>
                            <hr class="my-6">
                            <div>
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td>Product Code:</td>
                                            <td>FBB00255</td>
                                        </tr>
                                        <tr>
                                            <td>Availability:</td>
                                            <td>In Stock</td>
                                        </tr>
                                        <tr>
                                            <td>Type:</td>
                                            <td>Fruits</td>
                                        </tr>
                                        <tr>
                                            <td>Shipping:</td>
                                            <td>
                                                <small>01 day shipping.<span class="text-muted">( Free pickup today)</span></small>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@section('script')
<script>
    var slider;
    0 < $(".productModal").length && (slider = tns({
        container: "#productModal",
        items: 1,
        startIndex: 0,
        navContainer: "#productModalThumbnails",
        navAsThumbnails: !0,
        autoplay: !1,
        autoplayTimeout: 1500,
        swipeAngle: !1,
        speed: 1500,
        controls: !1,
        autoplayButtonOutput: !1,
        loop: !1
    })), 1 < $(".product").length && (slider = tns({
        container: "#product",
        items: 1,
        startIndex: 0,
        navContainer: "#productThumbnails",
        navAsThumbnails: !0,
        autoplay: !1,
        autoplayTimeout: 1500,
        swipeAngle: !1,
        speed: 1500,
        controls: !1,
        autoplayButtonOutput: !1
    }));
</script>
<script>
    var slider;
    0 < $(".productModal").length && (slider = tns({
        container: "#productModal2",
        items: 1,
        startIndex: 0,
        navContainer: "#productModalThumbnails2",
        navAsThumbnails: !0,
        autoplay: !1,
        autoplayTimeout: 1500,
        swipeAngle: !1,
        speed: 1500,
        controls: !1,
        autoplayButtonOutput: !1,
        loop: !1
    })), 1 < $(".product").length && (slider = tns({
        container: "#product",
        items: 1,
        startIndex: 0,
        navContainer: "#productThumbnails",
        navAsThumbnails: !0,
        autoplay: !1,
        autoplayTimeout: 1500,
        swipeAngle: !1,
        speed: 1500,
        controls: !1,
        autoplayButtonOutput: !1
    }));
</script>


<script>
    document.querySelectorAll('.star-label').forEach((label, index) => {
        label.addEventListener('mouseover', () => highlightStars(index));
        label.addEventListener('mouseout', resetStars);
        label.addEventListener('click', () => selectStar(index));
    });

    function highlightStars(index) {
        document.querySelectorAll('.star-label i').forEach((star, i) => {
            star.className = i <= index ? 'bi bi-star-fill text-warning' : 'bi bi-star text-warning';
        });
    }

    function resetStars() {
        const selected = document.querySelector('input[name="rating"]:checked');
        const selectedIndex = selected ? parseInt(selected.value) - 1 : -1;
        document.querySelectorAll('.star-label i').forEach((star, i) => {
            star.className = i <= selectedIndex ? 'bi bi-star-fill text-warning' : 'bi bi-star text-warning';
        });
    }

    function selectStar(index) {
        document.getElementById(`star${index + 1}`).checked = true;
        resetStars();
    }
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {

        // Si l'URL contient #reviews-tab-pane, activer l'onglet Reviews
        if (window.location.hash === '#reviews-tab-pane') {

            // Activer l'onglet Bootstrap
            const reviewsTab = document.getElementById('reviews-tab');
            if (reviewsTab) {
                const tab = new bootstrap.Tab(reviewsTab);
                tab.show();
            }

            // Scroll smooth vers l'onglet
            setTimeout(() => {
                const tabSection = document.getElementById('reviews-tab-pane');
                if (tabSection) {
                    tabSection.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }, 300);
        }

        // Conserver le hash dans l'URL quand on clique sur l'onglet Reviews
        const reviewsTabBtn = document.getElementById('reviews-tab');
        if (reviewsTabBtn) {
            reviewsTabBtn.addEventListener('shown.bs.tab', function() {
                history.replaceState(null, null, '#reviews-tab-pane');
            });
        }

        // Retirer le hash quand on quitte l'onglet Reviews
        document.querySelectorAll('[data-bs-toggle="tab"]').forEach(function(tabEl) {
            tabEl.addEventListener('shown.bs.tab', function(e) {
                if (e.target.id !== 'reviews-tab') {
                    history.replaceState(null, null, ' ');
                }
            });
        });

    });
</script>

<script>
    function filterReviews(value) {
        const url = new URL(window.location.href);
        url.searchParams.set('sort', value);
        url.searchParams.delete('page'); // reset pagination au changement de tri
        url.hash = 'reviews-tab-pane';
        window.location.href = url.toString();
    }
</script>
@endsection

@endsection