
@extends('base')
@section('content')

<main>

 <!-- section -->
  <section class="mt-8">
    <div class="container">
       <!-- row -->
      <div class="row">
        <div class="col-xxl-8 col-xl-7 ">
           <!-- hero slider -->
          <div class="hero-slider">
            <div
              style="background: url(../assets/images/slider/slider-image-1.jpg)no-repeat; background-size: cover; border-radius: .5rem;">
              <div class="ps-lg-12 py-lg-16 col-xxl-7 col-lg-9 py-14 px-8 text-xs-center">
                 <!-- badge -->
                <div class="d-flex align-items-center mb-4"><span>Exclusive Offer</span> <span
                    class="badge bg-primary ms-2">15%</span></div>
                     <!-- title -->
                <h2 class="text-dark display-5 fw-bold mb-3">Best Online Deals, Free Stuff </h2>
                <p class="fs-5 text-dark">Only on this week... Don’t miss</p>
                 <!-- price -->
                <div class="mb-4 mt-4"><span class="text-dark">Start from<span
                      class="fs-4 text-danger ms-1">$5.99</span></span></div>
                       <!-- btn -->
                <a href="{{ route('shop.single', ['slug' => 1]) }}" class="btn btn-primary">Get Best Deal <i
                    class="feather-icon icon-arrow-right ms-1"></i></a>

              </div>

            </div>
             <!-- img -->
            <div class=" "
              style="background: url(../assets/images/slider/slider-image-2.jpg)no-repeat; background-size: cover; border-radius: .5rem;">
              <div class="ps-lg-12 py-lg-16 col-xxl-7 col-lg-9 py-14 ps-8 text-xs-center">
                 <!-- badge -->
                <div class="d-flex align-items-center mb-4"><span>Exclusive Offer</span> <span
                    class="badge bg-primary ms-2">35%</span></div>

       <!-- title -->
                <h2 class="text-dark display-5 fw-bold mb-3">Chocozay wafer-rolls Deals </h2>
                       <!-- para -->
                <p class="fs-5 text-dark">Only on this week... Don’t miss</p>
                <div class="mb-4 mt-4"><span class="text-dark">Start from<span
                      class="fs-4 text-danger ms-1">$34.99</span></span></div>
                             <!-- btn -->
                <a href="{{ route('shop.single', ['slug' => 1]) }}" class="btn btn-primary">Shop Deals Now<i
                    class="feather-icon icon-arrow-right ms-1"></i></a>
              </div>
            </div>
                   <!-- img -->
            <div class=" "
              style="background: url(../assets/images/slider/slider-image-3.jpg)no-repeat; background-size: cover; border-radius: .5rem;">
              <div class="ps-lg-12 py-lg-16 col-xxl-7 col-lg-9 py-14 ps-8 text-xs-center">
                       <!-- badge -->
                <div class="d-flex align-items-center mb-4"><span>Exclusive Offer</span> <span
                    class="badge bg-primary ms-2">20%</span></div>
       <!-- title -->
                <h2 class="text-dark display-5 fw-bold mb-3">Cokoladni Kolutici
                  Lasta</h2>
                         <!-- para -->
                <p class="fs-5 text-dark">Only on this week... Don’t miss</p>
                <div class="mb-4 mt-4"><span class="text-dark">Start from<span
                      class="fs-4 text-primary ms-1">$5.99</span></span></div>
                             <!-- btn -->
                <a href="{{ route('shop.single', ['slug' => 1]) }}" class="btn btn-primary">Shop This Week Offer <i
                    class="feather-icon icon-arrow-right ms-1"></i></a>
              </div>

            </div>
          </div>
        </div>
        <div class="col-xxl-4 col-xl-5 col-12 d-lg-flex d-xl-block gap-3 gap-xl-0">

          <div class="flex-fill px-8 py-9 mb-6 mb-md-0 mb-xl-6 rounded" style="background:url(../assets/images/banner/ad-banner-1.jpg)no-repeat; background-size: cover;">
            <div>


                <h3 class="mb-0 fw-bold">10% cashback on <br>
                  personal care </h3>
                <div class="mt-4 mb-5 fs-5">
                  <p class="mb-0">Max cashback: $12</p>
                  <span>Code: <span class="fw-bold text-dark">CARE12</span></span>
                </div>
                <a href="{{ route('shop.single', ['slug' => 1]) }}" class="btn btn-dark">Shop Now</a>
              </div>

          </div>


          <div class="flex-fill px-8 py-8 rounded " style="background:url(../assets/images/banner/ad-banner-2.jpg)no-repeat; background-size: cover;">

            <!-- Banner Content -->
<div>
                <!-- Banner Content -->
                <h3 class=" fw-bold mb-3">Say yes to <br>
                  season’s fresh </h3>
                  <div class="mt-4 mb-5 fs-5">
                <p class="fs-5 mb-0">Refresh your day <br>
                  the fruity way</p>
                  </div>


                <a href="{{ route('shop.single-location') }}" class="btn btn-dark">Shop Now</a>
              </div>

          </div>


        </div>

      </div>




    </div>
  </section>
   <!-- section category -->
  <section class="my-lg-14 my-8">
    <div class="container ">
      <div class="row">
        <div class="col-12">
          <div class="mb-6">
             <!-- heading    -->
            <h3 class="mb-0">Shop Popular Categories</h3>
          </div>
        </div>
        <div class="row ">
           <!-- col -->
          <div class="col-lg-2 col-md-4 col-6">
            <div class="text-center mb-10">

 <!-- img -->
              <a href="{{ route('shop.fullwidth') }}"><img src="../assets/images/category/dairy-bread-eggs.png" alt=""
                  class="card-image rounded-circle"></a>
 <!-- text -->
              <div class="mt-4">
                <h5 class="fs-6 mb-0"> <a href="{{ route('shop.fullwidth') }}" class="text-inherit">Dairy, Bread & Eggs</a></h5>
              </div>

            </div>


          </div>
           <!-- col -->
          <div class="col-lg-2 col-md-4 col-6">
            <div class="text-center mb-10">
 <!-- img -->
              <a href="{{ route('shop.fullwidth') }}"><img src="../assets/images/category/fruits-vegetables.png" alt=""
                  class="card-image rounded-circle"></a>
              <div class="mt-4">
                 <!-- text -->
                <h5 class="fs-6 mb-0"> <a href="{{ route('shop.fullwidth') }}" class="text-inherit">Fruits & Vegetables</a></h5>
              </div>

            </div>


          </div>
           <!-- col -->
          <div class="col-lg-2 col-md-4 col-6">

            <div class="text-center mb-10">
               <!-- img -->
              <a href="{{ route('shop.fullwidth') }}"><img src="../assets/images/category/snack-munchies.png" alt=""
                  class="card-image rounded-circle"></a>
                   <!-- text -->
              <div class="mt-4">
                <h5 class="fs-6 mb-0"> <a href="{{ route('shop.fullwidth') }}" class="text-inherit">Snack & Munchies</a></h5>
              </div>

            </div>


          </div>
           <!-- col -->
          <div class="col-lg-2 col-md-4 col-6">
            <div class="text-center mb-10">
 <!-- img -->
              <a href="{{ route('shop.fullwidth') }}"><img src="../assets/images/category/bakery-biscuits.png" alt=""
                  class="card-image rounded-circle"></a>
                   <!-- text -->
              <div class="mt-4">
                <h5 class="fs-6 mb-0"> <a href="{{ route('shop.fullwidth') }}" class="text-inherit">Bakery & Biscuits</a></h5>
              </div>

            </div>


          </div>
           <!-- col -->
          <div class="col-lg-2 col-md-4 col-6">
            <div class="text-center mb-10">
               <!-- img -->
              <a href="{{ route('shop.fullwidth') }}"><img src="../assets/images/category/instant-food.png" alt=""
                  class="card-image rounded-circle"></a>
                   <!-- text -->
              <div class="mt-4">
                <h5 class="fs-6 mb-0"> <a href="{{ route('shop.fullwidth') }}" class="text-inherit">Instant Food</a></h5>
              </div>

            </div>


          </div>
           <!-- col -->
          <div class="col-lg-2 col-md-4 col-6">
            <div class="text-center mb-10">
               <!-- img -->
              <a href="{{ route('shop.fullwidth') }}"><img src="../assets/images/category/tea-coffee-drinks.png" alt=""
                  class="card-image rounded-circle"></a>
                   <!-- text -->
              <div class="mt-4">
                <h5 class="fs-6 mb-0"> <a href="{{ route('shop.fullwidth') }}" class="text-inherit">Tea, Coffee & Drinks</a></h5>
              </div>

            </div>


          </div>
           <!-- col -->
          <div class="col-lg-2 col-md-4 col-6">
            <div class="text-center mb-10">
               <!-- img -->
              <a href="{{ route('shop.fullwidth') }}"><img src="../assets/images/category/cold-drinks-juices.png" alt=""
                  class="card-image rounded-circle"></a>
                   <!-- text -->
              <div class="mt-4">
                <h5 class="fs-6 mb-0"> <a href="{{ route('shop.fullwidth') }}" class="text-inherit">Cold Drinks & Juices</a></h5>
              </div>

            </div>


          </div>
           <!-- col -->
          <div class="col-lg-2 col-md-4 col-6">
            <div class="text-center mb-10">
               <!-- img -->
              <a href="{{ route('shop.fullwidth') }}"><img src="../assets/images/category/chicken-meat-fish.png" alt=""
                  class="card-image rounded-circle"></a>
                   <!-- text -->
              <div class="mt-4">
                <h5 class="fs-6 mb-0"> <a href="{{ route('shop.fullwidth') }}" class="text-inherit">Chicken, Meat & Fish</a></h5>
              </div>

            </div>


          </div>
           <!-- col -->
          <div class="col-lg-2 col-md-4 col-6">
             <!-- text -->
            <div class="text-center mb-10">
               <!-- img -->
              <a href="{{ route('shop.fullwidth') }}"><img src="../assets/images/category/baby-care.png" alt=""
                  class="card-image rounded-circle"></a>
                   <!-- text -->
              <div class="mt-4">
                <h5 class="fs-6 mb-0"> <a href="{{ route('shop.fullwidth') }}" class="text-inherit">Baby Care</a></h5>
              </div>

            </div>


          </div>
           <!-- col -->
          <div class="col-lg-2 col-md-4 col-6">
            <div class="text-center mb-10">
               <!-- img -->
              <a href="{{ route('shop.fullwidth') }}"><img src="../assets/images/category/cleaning-essentials.png" alt=""
                  class="card-image rounded-circle"></a>
                   <!-- img -->
              <div class="mt-4">
                <h5 class="fs-6 mb-0"> <a href="{{ route('shop.fullwidth') }}" class="text-inherit">Cleaning Essentials</a></h5>
              </div>

            </div>


          </div>
           <!-- col -->
          <div class="col-lg-2 col-md-4 col-6">
            <div class="text-center mb-10">
 <!-- img -->
              <a href="{{ route('shop.fullwidth') }}"><img src="../assets/images/category/pet-care.png" alt=""
                  class="card-image rounded-circle"></a>
                   <!-- text -->
              <div class="mt-4">
                <h5 class="fs-6 mb-0"> <a href="{{ route('shop.fullwidth') }}" class="text-inherit">Pet Care</a></h5>
              </div>
            </div>
          </div>
           <!-- col -->
          <div class="col-lg-2 col-md-4 col-6">

            <div class="text-center mb-10">
 <!-- img -->
              <a href="{{ route('shop.fullwidth') }}"><img src="../assets/images/category/atta-rice-dal.png" alt=""
                  class="card-image rounded-circle"></a>
                   <!-- text -->
              <div class="mt-4">
                <h5 class="fs-6 mb-0"><a href="{{ route('shop.fullwidth') }}" class="text-inherit">Atta, Rice & Dal</a></h5>
              </div>

            </div>


          </div>


        </div>

      </div>
    </div>
  </section>
   <!-- section -->
  <section class="mb-lg-14 mb-8">
    <div class="container ">
       <!-- row -->
      <div class="row">
        <div class="col-12">
          <div class="mb-6 d-xl-flex justify-content-between align-items-center">
             <!-- heading -->
            <div class="mb-5 mb-xl-0">
              <h3 class=" mb-0">Biens Disponibles à l'Echange</h3>
              <p class="mb-0">New products with updated stocks</p>
            </div>
            <div>
               <!-- nav -->
              <nav>
                <ul class="nav nav-pills nav-scroll border-bottom-0 gap-1 " id="nav-tab" role="tablist">
 <!-- nav item -->
                  <li class="nav-item ">
                     <!-- nav link -->
                    <a href="#" class="nav-link active " id="nav-fruitsandveg-tab" data-bs-toggle="tab"
                      data-bs-target="#nav-fruitsandveg" role="tab" aria-controls="nav-fruitsandveg"
                      aria-selected="true">Fruits & Vegetables</a>

                  </li>
 <!-- nav item -->

                  <li class="nav-item ">
                     <!-- nav link -->
                    <a href="#" class="nav-link" id="nav-snackMunchies-tab" data-bs-toggle="tab"
                      data-bs-target="#nav-snackMunchies" role="tab" aria-controls="nav-snackMunchies"
                      aria-selected="false">Snack & Munchies</a></li>
                       <!-- nav item -->
                  <li class="nav-item ">
                     <!-- nav link -->
                    <a href="#" class="nav-link" id="nav-bakery-tab" data-bs-toggle="tab"
                      data-bs-target="#nav-bakery" role="tab" aria-controls="nav-bakery" aria-selected="false">Bakery
                      & Biscuits</a></li>
                       <!-- nav item -->
                  <li class="nav-item ">
                     <!-- nav link -->
                    <a href="#" class="nav-link" id="nav-tea-tab" data-bs-toggle="tab"
                      data-bs-target="#nav-tea" role="tab" aria-controls="nav-tea" aria-selected="false">Tea, Coffee &
                      Drinks </a></li>
                       <!-- nav item -->
                  <li class="nav-item">
                     <!-- nav link -->
                    <a href="#" class="nav-link" id="nav-drinks-tab" data-bs-toggle="tab"
                      data-bs-target="#nav-drinks" role="tab" aria-controls="nav-drinks" aria-selected="false">Cold
                      Drinks & Juices</a></li>

                </ul>
              </nav>


            </div>
          </div>
        </div>
      </div>
       <!-- row -->
      <div class="row">
        <div class="col-12">
           <!-- tab -->
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-fruitsandveg" role="tabpanel"
              aria-labelledby="nav-fruitsandveg-tab" tabindex="0">
 <!-- row -->
              <div class="row row-cols-2 row-cols-xl-5 row-cols-md-3 g-4">
                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">
                        <div class=" position-absolute top-0 start-0">
                          <span class="badge bg-primary">New</span>
                        </div>
                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-1.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="{{ route('choice.away') }}" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="{{ route('shop.single', ['slug' => 1]) }}" class="text-inherit text-decoration-none">Haldiram's Sev
                          Bhujia</a></h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5(Nom de la boutique)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">
                        <div>
                        </div>
                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Mettre en attente</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>
                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">

                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-2.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="{{ route('choice.away') }}" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="{{ route('shop.single', ['slug' => 1]) }}" class="text-inherit text-decoration-none">Britannia NutriChoice
                          Digestive Biscuits</a></h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.4(3,149)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">
                        <div><span class="text-dark">$15</span>
                        </div>
                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>
                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">

                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-3.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="{{ route('choice.away') }}" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="{{ route('shop.single', ['slug' => 1]) }}" class="text-inherit text-decoration-none">Cadbury 5 star
                          chocolate</a></h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.7(1,130)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">
                        <div><span class="text-dark">$32</span>
                        </div>
                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>
                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">

                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-4.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="{{ route('choice.away') }}" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="{{ route('shop.single', ['slug' => 1]) }}" class="text-inherit text-decoration-none">Onion Flavour Potato</a>
                      </h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5(140)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">
                        <div><span class="text-danger">$12</span><span
                            class="text-muted text-decoration-line-through ms-1">$18</span>
                        </div>
                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>
                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">
                        <div class=" position-absolute top-0 start-0">
                          <span class="badge bg-warning text-dark">En Echange</span>
                        </div>
                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-5.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="{{ route('choice.away') }}" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="{{ route('shop.single', ['slug' => 1]) }}" class="text-inherit text-decoration-none">Salted Instant
                          Popcorn</a></h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5(Nom de la boutique)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">

                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>
                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">

                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-6.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="{{ route('choice.away') }}" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="{{ route('shop.single', ['slug' => 1]) }}" class="text-inherit text-decoration-none">Epigamia Blueberry Greek
                          Yogurt,
                          90g</a></h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.4(Nom de la boutique)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">

                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>
                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">

                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-8.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="{{ route('shop.single', ['slug' => 1]) }}" class="text-inherit text-decoration-none">Kellogg's Special K
                          Original
                          Cereal</a></h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.7(Nom de la boutique)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">

                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>
                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">

                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-9.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="{{ route('shop.single', ['slug' => 1]) }}" class="text-inherit text-decoration-none">Slurrp Farm No Maida
                          Millet
                          Pancake Mix</a></h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5(Nom de la boutique)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">
           
                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>
                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">

                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-2.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="{{ route('shop.single', ['slug' => 1]) }}" class="text-inherit text-decoration-none">Britannia NutriChoice
                          Digestive Biscuits</a></h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.4(Nom de la boutique)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">
             
                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>
                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">

                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-3.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="{{ route('shop.single', ['slug' => 1]) }}" class="text-inherit text-decoration-none">Cadbury 5 star
                          chocolate</a></h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.7(Nom de la boutique)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">

                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>



              </div>


            </div>
            <div class="tab-pane fade" id="nav-snackMunchies" role="tabpanel" aria-labelledby="nav-snackMunchies-tab"
              tabindex="0">

              <div class="row row-cols-2 row-cols-xl-5 row-cols-md-3 g-4">

                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">

                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-4.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="{{ route('shop.single', ['slug' => 1]) }}" class="text-inherit text-decoration-none">Onion Flavour Potato</a>
                      </h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5(Nom de la boutique)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">

                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>
                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">
                        <div class=" position-absolute top-0 start-0">
                          <span class="badge bg-primary">New</span>
                        </div>
                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-1.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="{{ route('shop.single', ['slug' => 1]) }}" class="text-inherit text-decoration-none">Haldiram's Sev
                          Bhujia</a></h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5(Nom de la boutique)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">

                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>
                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">

                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-2.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="{{ route('shop.single', ['slug' => 1]) }}" class="text-inherit text-decoration-none">Britannia NutriChoice
                          Digestive Biscuits</a></h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.4(Nom de la boutique)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">

                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>
                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">

                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-3.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="{{ route('shop.single', ['slug' => 1]) }}" class="text-inherit text-decoration-none">Cadbury 5 star
                          chocolate</a></h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.7(Nom de la boutique)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">

                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>
                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">
                        <div class=" position-absolute top-0 start-0">
                          <span class="badge bg-warning text-dark">En Echange</span>
                        </div>
                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-5.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="{{ route('shop.single', ['slug' => 1]) }}" class="text-inherit text-decoration-none">Salted Instant
                          Popcorn</a></h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5(Nom de la boutique)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">

                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>
                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">

                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-6.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="{{ route('shop.single', ['slug' => 1]) }}" class="text-inherit text-decoration-none">Epigamia Blueberry Greek
                          Yogurt,
                          90g</a></h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.4(Nom de la boutique)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">

                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>
                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">

                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-8.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="{{ route('shop.single', ['slug' => 1]) }}" class="text-inherit text-decoration-none">Kellogg's Special K
                          Original
                          Cereal</a></h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.7(Nom de la boutique)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">
                        <div><span class="text-danger">$25</span><span
                            class="text-muted text-decoration-line-through ms-1">$28</span>
                        </div>
                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>
                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">

                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-9.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="{{ route('shop.single', ['slug' => 1]) }}" class="text-inherit text-decoration-none">Slurrp Farm No Maida
                          Millet
                          Pancake Mix</a></h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5(212)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">
                        <div><span class="text-danger">$34</span><span
                            class="text-muted text-decoration-line-through ms-1">$38</span>
                        </div>
                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>


              </div>




            </div>
            <div class="tab-pane fade" id="nav-bakery" role="tabpanel" aria-labelledby="nav-bakery-tab" tabindex="0">
              <div class="row row-cols-2 row-cols-xl-5 row-cols-md-3 g-4">
                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">
                        <div class=" position-absolute top-0 start-0">
                          <span class="badge bg-warning text-dark">En Echange</span>
                        </div>
                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-5.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="{{ route('shop.single', ['slug' => 1]) }}" class="text-inherit text-decoration-none">Salted Instant
                          Popcorn</a></h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5(212)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">
                        <div><span class="text-danger">$40</span> <span
                            class="text-decoration-line-through text-muted">$65</span>
                        </div>
                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>
                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">

                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-6.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="{{ route('shop.single', ['slug' => 1]) }}" class="text-inherit text-decoration-none">Epigamia Blueberry Greek
                          Yogurt,
                          90g</a></h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.4(694)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">
                        <div><span class="text-dark">$17</span>
                        </div>
                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>
                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">

                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-8.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="{{ route('shop.single', ['slug' => 1]) }}" class="text-inherit text-decoration-none">Kellogg's Special K
                          Original
                          Cereal</a></h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.7(1,130)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">
                        <div><span class="text-danger">$25</span><span
                            class="text-muted text-decoration-line-through ms-1">$28</span>
                        </div>
                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>
                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">

                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-9.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="{{ route('shop.single', ['slug' => 1]) }}" class="text-inherit text-decoration-none">Slurrp Farm No Maida
                          Millet
                          Pancake Mix</a></h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5(212)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">
                        <div><span class="text-danger">$34</span><span
                            class="text-muted text-decoration-line-through ms-1">$38</span>
                        </div>
                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>

                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">
                        <div class=" position-absolute top-0 start-0">
                          <span class="badge bg-primary">New</span>
                        </div>
                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-1.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="{{ route('shop.single', ['slug' => 1]) }}" class="text-inherit text-decoration-none">Haldiram's Sev
                          Bhujia</a></h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5(149)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">
                        <div><span class="text-danger">$18</span> <span
                            class="text-decoration-line-through text-muted">$24</span>
                        </div>
                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>
                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">

                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-2.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="{{ route('shop.single', ['slug' => 1]) }}" class="text-inherit text-decoration-none">Britannia NutriChoice
                          Digestive Biscuits</a></h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.4(3,149)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">
                        <div><span class="text-dark">$15</span>
                        </div>
                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>
                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">

                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-3.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="{{ route('shop.single', ['slug' => 1]) }}" class="text-inherit text-decoration-none">Cadbury 5 star
                          chocolate</a></h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.7(1,130)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">
                        <div><span class="text-dark">$32</span>
                        </div>
                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>
                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">

                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-4.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="{{ route('shop.single', ['slug' => 1]) }}" class="text-inherit text-decoration-none">Onion Flavour Potato</a>
                      </h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5(140)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">
                        <div><span class="text-danger">$12</span><span
                            class="text-muted text-decoration-line-through ms-1">$18</span>
                        </div>
                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>


              </div>
            </div>
            <div class="tab-pane fade" id="nav-tea" role="tabpanel" aria-labelledby="nav-tea-tab" tabindex="0">
              <div class="row row-cols-2 row-cols-xl-5 row-cols-md-3 g-4">
                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">

                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-4.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="{{ route('shop.single', ['slug' => 1]) }}" class="text-inherit text-decoration-none">Onion Flavour Potato</a>
                      </h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5(140)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">
                        <div><span class="text-danger">$12</span><span
                            class="text-muted text-decoration-line-through ms-1">$18</span>
                        </div>
                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>
                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">
                        <div class=" position-absolute top-0 start-0">
                          <span class="badge bg-warning text-dark">En Echange</span>
                        </div>
                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-5.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="{{ route('shop.single', ['slug' => 1]) }}" class="text-inherit text-decoration-none">Salted Instant
                          Popcorn</a></h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5(212)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">
                        <div><span class="text-danger">$40</span> <span
                            class="text-decoration-line-through text-muted">$65</span>
                        </div>
                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>
                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">

                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-6.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="{{ route('shop.single', ['slug' => 1]) }}" class="text-inherit text-decoration-none">Epigamia Blueberry Greek
                          Yogurt,
                          90g</a></h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.4(694)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">
                        <div><span class="text-dark">$17</span>
                        </div>
                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>
                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">
                        <div class=" position-absolute top-0 start-0">
                          <span class="badge bg-primary">New</span>
                        </div>
                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-1.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="{{ route('shop.single', ['slug' => 1]) }}" class="text-inherit text-decoration-none">Haldiram's Sev
                          Bhujia</a></h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5(149)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">
                        <div><span class="text-danger">$18</span> <span
                            class="text-decoration-line-through text-muted">$24</span>
                        </div>
                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>
                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">

                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-2.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="{{ route('shop.single', ['slug' => 1]) }}" class="text-inherit text-decoration-none">Britannia NutriChoice
                          Digestive Biscuits</a></h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.4(3,149)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">
                        <div><span class="text-dark">$15</span>
                        </div>
                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>
                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">

                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-3.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="{{ route('shop.single', ['slug' => 1]) }}" class="text-inherit text-decoration-none">Cadbury 5 star
                          chocolate</a></h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.7(1,130)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">
                        <div><span class="text-dark">$32</span>
                        </div>
                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>

                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">

                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-8.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="{{ route('shop.single', ['slug' => 1]) }}" class="text-inherit text-decoration-none">Kellogg's Special K
                          Original
                          Cereal</a></h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.7(1,130)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">
                        <div><span class="text-danger">$25</span><span
                            class="text-muted text-decoration-line-through ms-1">$28</span>
                        </div>
                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>
                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">

                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-9.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="{{ route('shop.single', ['slug' => 1]) }}" class="text-inherit text-decoration-none">Slurrp Farm No Maida
                          Millet
                          Pancake Mix</a></h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5(212)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">
                        <div><span class="text-danger">$34</span><span
                            class="text-muted text-decoration-line-through ms-1">$38</span>
                        </div>
                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>


              </div>
            </div>
            <div class="tab-pane fade" id="nav-drinks" role="tabpanel" aria-labelledby="nav-drinks-tab" tabindex="0">
              <div class="row row-cols-2 row-cols-xl-5 row-cols-md-3 g-4">

                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">

                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-4.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Onion Flavour Potato</a>
                      </h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5(140)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">
                        <div><span class="text-danger">$12</span><span
                            class="text-muted text-decoration-line-through ms-1">$18</span>
                        </div>
                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>
                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">
                        <div class=" position-absolute top-0 start-0">
                          <span class="badge bg-warning text-dark">En Echange</span>
                        </div>
                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-5.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Salted Instant
                          Popcorn</a></h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5(212)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">
                        <div><span class="text-danger">$40</span> <span
                            class="text-decoration-line-through text-muted">$65</span>
                        </div>
                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>
                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">

                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-6.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Epigamia Blueberry Greek
                          Yogurt,
                          90g</a></h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.4(694)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">
                        <div><span class="text-dark">$17</span>
                        </div>
                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>
                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">
                        <div class=" position-absolute top-0 start-0">
                          <span class="badge bg-primary">New</span>
                        </div>
                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-1.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Haldiram's Sev
                          Bhujia</a></h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5(149)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">
                        <div><span class="text-danger">$18</span> <span
                            class="text-decoration-line-through text-muted">$24</span>
                        </div>
                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>
                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">

                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-2.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Britannia NutriChoice
                          Digestive Biscuits</a></h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.4(3,149)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">
                        <div><span class="text-dark">$15</span>
                        </div>
                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>
                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">

                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-3.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Cadbury 5 star
                          chocolate</a></h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.7(1,130)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">
                        <div><span class="text-dark">$32</span>
                        </div>
                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>
                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">

                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-8.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Kellogg's Special K
                          Original
                          Cereal</a></h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.7(1,130)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">
                        <div><span class="text-danger">$25</span><span
                            class="text-muted text-decoration-line-through ms-1">$28</span>
                        </div>
                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>
                <div class="col ">
                <!-- card -->
                  <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative">
 <!-- badge -->
                      <div class="text-center position-relative ">

                        <!-- img -->
                        <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-9.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                            <div class="product-action-btn">
                          <a href="#!" class="btn-action mb-1" data-bs-toggle="modal"
                            data-bs-target="#quickViewModal"><i class="bi bi-eye"></i></a>
                          
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                        </div>

                      </div>
                      <!-- title -->
                      <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Slurrp Farm No Maida
                          Millet
                          Pancake Mix</a></h2>
                      <div>
 <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5(212)</span>
                      </div>
                       <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">
                        <div><span class="text-danger">$34</span><span
                            class="text-muted text-decoration-line-through ms-1">$38</span>
                        </div>
                        <div><span class="text-uppercase small text-primary">
                            In Stock</span></div>
                      </div>
                       <!-- btn -->
                      <div class="product-fade-block">
                        <div class="d-grid mt-4">
                          <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                        </div>
                      </div>

                    </div>
                    <!-- hidden class for hover -->
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                  </div>
                </div>


              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12 pt-5">
          <div class="d-md-flex justify-content-between align-items-center mb-8">
            <div>

            </div>
            <div>
              <a href="{{ route('view.all.products') }}">View All <i class="feather-icon icon-chevron-right pt-5"></i></a>
            </div>
          </div>

        </div>
      </div>



    </div>
  </section>
  <section>

    <div class="container ">
      <div class="row">
        <div class="col-12">

          <div class="mb-4 bg-light d-lg-flex justify-content-between align-items-center rounded">
            <div class="  p-10">

              <h2 class="mb-1 fw-bold">Titre d'une bande annonce </h2>
              <p class="mb-0 lead">Ici , la description et et autre details avec le titre de la bande annonce,<br>
                le tout sera gerer par un controller
              </p>
              <a href="#" class="btn btn-dark mt-5">Partger le site</a>

            </div>
            <div class="p-6 d-lg-block d-none"><img src="../assets/images/svg-graphics/store-graphics.svg" alt=""
                class="img-fluid">
            </div>
          </div>


        </div>
      </div>
    </div>
  </section>
  <section class="my-lg-14 my-8">
    <div class="container ">
      <div class="row">
        <div class="col-12">
          <div class="d-md-flex justify-content-between align-items-center mb-8">
            <div>
              <h3 class=" mb-1">Services Proposer à l'Echange </h3>
              <p>Get exclusive ongoing offers, deals, and discount codes of shopping</p>
            </div>
            <div>
              <a href="{{ route('view.all.services') }}">View All <i class="feather-icon icon-chevron-right"></i></a>
            </div>
          </div>

        </div>
      </div>
      <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-0 border border-2 border-danger rounded-3">
        <div class="col  mb-lg-0">
          <div class="card  card-product-v2 h-100">
            <div class="card-body position-relative text-center">

              <div class="text-center position-relative ">
                <div class=" position-absolute top-0">
                  <span class="badge bg-info">New</span>
                </div>

                <!-- img -->
                <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-2.jpg" alt="Grocery Ecommerce Template"
                    class="mb-3 img-fluid"></a>
                <!-- action btn -->
                    <div class="product-action-btn">
                  <a href="#!" class="btn-action mb-1" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                      class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
             
                  <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i
                      class="bi bi-arrow-left-right"></i></a>
                </div>

              </div>
          
              <!-- title -->
              <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Britannia NutriChoice
                  Digestive Biscuits</a></h2>
              <div>
 <!-- rating -->
                <small class="text-warning"> <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.4(Nom de la boutique)</span>
              </div>
              <div class="mt-3"><span class="text-uppercase small text-primary">
                  Disponible</span></div>
              <div class="mt-4">
         
                <div class="my-3">
                  <small>Porto-Novo </small>
                  <small>Tokpota-Vedo </small>
                  <small>Ruelle en face de la maison du Maire</small>
                </div>
              </div>
               <!-- btn -->
              <div class="product-fade-block">
                <div class="d-grid mt-4">
                  <a href="#" class="btn btn-primary rounded-pill">Mettre en attente</a>
                </div>
              </div>

            </div>
            <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
          </div>
        </div>
        <div class="col   mb-lg-0">
          <div class="card  card-product-v2 h-100">
            <div class="card-body position-relative text-center">

              <div class="text-center position-relative ">
                <div class=" position-absolute top-0 text-danger">
                  <small>Buy 1 Get $4.00 Off</small>
                </div>


                <!-- img -->
                <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-3.jpg" alt="Grocery Ecommerce Template"
                    class="mb-3 img-fluid"></a>
                <!-- action btn -->
                    <div class="product-action-btn">
                  <a href="#!" class="btn-action mb-1" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                      class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
             
                  <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i
                      class="bi bi-arrow-left-right"></i></a>
                </div>

              </div>
              <div class="mb-3"><span class="text-dark">$32</span>
              </div>
              <!-- title -->
              <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Cadbury 5 star chocolate</a>
              </h2>
              <div>
 <!-- rating -->
                <small class="text-warning"> <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.7(1,130)</span>
              </div>
              <div class="mt-3"><span class="text-uppercase small text-primary">
                  In Stock</span></div>
              <div class="mt-4">
                <div class="progress mt-6" style="height: 8px;">
                  <div class="progress-bar bg-gray-400" role="progressbar" style="width: 65%;" aria-valuenow="65"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="my-3">
                  <small>the available products : <span class="text-dark fw-bold">34</span></small>
                </div>
              </div>
               <!-- btn -->
              <div class="product-fade-block">
                <div class="d-grid mt-4">
                  <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                </div>
              </div>

            </div>
            <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
          </div>
        </div>
        <div class="col   mb-lg-0">
          <div class="card  card-product-v2 h-100">
            <div class="card-body position-relative text-center">

              <div class="text-center position-relative ">
                <div class=" position-absolute top-0">
                  <span class="badge bg-info">22%</span>
                </div>

                <!-- img -->
                <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-8.jpg" alt="Grocery Ecommerce Template"
                    class="mb-3 img-fluid"></a>
                <!-- action btn -->
                    <div class="product-action-btn">
                  <a href="#!" class="btn-action mb-1" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                      class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
             
                  <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i
                      class="bi bi-arrow-left-right"></i></a>
                </div>
  
              </div>
              <div class="mb-3"><span class="text-danger">$25</span><span
                  class="text-muted text-decoration-line-through ms-1">$28</span>
              </div>
              <!-- title -->
              <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Kellogg's Special K Original
                  Cereal</a></h2>
              <div>
 <!-- rating -->
                <small class="text-warning"> <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.7(1,130)</span>
              </div>
              <div class="mt-3"><span class="text-uppercase small text-primary">
                  In Stock</span></div>
              <div class="mt-4">
                <div class="progress mt-6" style="height: 8px;">
                  <div class="progress-bar bg-gray-400" role="progressbar" style="width: 95%;" aria-valuenow="95"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="my-3">
                  <small>the available products : <span class="text-dark fw-bold">8</span></small>
                </div>
              </div>
               <!-- btn -->
              <div class="product-fade-block">
                <div class="d-grid mt-4">
                  <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                </div>
              </div>

            </div>
            <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
          </div>
        </div>
        <div class="col   mb-lg-0">
          <div class="card  card-product-v2 h-100">
            <div class="card-body position-relative text-center">

              <div class="text-center position-relative ">
                <div class=" position-absolute top-0">
                  <span class="badge bg-info">16%</span>
                </div>

                <!-- img -->
                <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-9.jpg" alt="Grocery Ecommerce Template"
                    class="mb-3 img-fluid"></a>
                <!-- action btn -->
                    <div class="product-action-btn">
                  <a href="#!" class="btn-action mb-1" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                      class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
             
                  <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i
                      class="bi bi-arrow-left-right"></i></a>
                </div>

              </div>
              <div class="mb-3"><span class="text-danger">$34</span><span
                  class="text-muted text-decoration-line-through ms-1">$38</span>
              </div>
              <!-- title -->
              <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Slurrp Farm No Maida Millet
                  Pancake Mix</a></h2>
              <div>
 <!-- rating -->
                <small class="text-warning"> <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5(212)</span>
              </div>

              <div class="mt-3"><span class="text-uppercase small text-primary">
                  In Stock</span></div>
              <div class="mt-4">
                <div class="progress mt-6" style="height: 8px;">
                  <div class="progress-bar bg-gray-400" role="progressbar" style="width: 78%;" aria-valuenow="78"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="my-3">
                  <small>the available products : <span class="text-dark fw-bold">67</span></small>
                </div>
              </div>
               <!-- btn -->
              <div class="product-fade-block">
                <div class="d-grid mt-4">
                  <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                </div>
              </div>

            </div>
            <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
          </div>
        </div>
        <div class="col   mb-lg-0">
          <div class="card  card-product-v2 h-100">
            <div class="card-body position-relative text-center">

              <div class="text-center position-relative ">


                <!-- img -->
                <a href="{{ route('shop.single', ['slug' => 1]) }}"> <img src="../assets/images/products/product-img-10.jpg" alt="Grocery Ecommerce Template"
                    class="mb-3 img-fluid"></a>
                <!-- action btn -->
                    <div class="product-action-btn">
                  <a href="#!" class="btn-action mb-1" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                      class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
             
                  <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i
                      class="bi bi-arrow-left-right"></i></a>
                </div>

              </div>
              <div class="mb-3"><span class="text-danger">$22</span><span
                  class="text-muted text-decoration-line-through ms-1">$29</span>
              </div>
              <!-- title -->
              <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Amul Butter - 500g</a></h2>
              <div>
 <!-- rating -->
                <small class="text-warning"> <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.3(68)</span>
              </div>

              <div class="mt-3"><span class="text-uppercase small text-primary">
                  In Stock</span></div>
              <div class="mt-4">
                <div class="progress mt-6" style="height: 8px;">
                  <div class="progress-bar bg-gray-400" role="progressbar" style="width: 44%;" aria-valuenow="44"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="my-3">
                  <small>the available products : <span class="text-dark fw-bold">44</span></small>
                </div>
              </div>
               <!-- btn -->
              <div class="product-fade-block">
                <div class="d-grid mt-4">
                  <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                </div>
              </div>

            </div>
            <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
          </div>
        </div>


      </div>
    </div>
  </section>
  <section class="my-lg-14 my-8">
    <div class="container ">

      <div class="row">
        <div class="col-12 mb-6">

          <h3 class="mb-1">Propiétés Disponible Pour La Location</h3>
          <p class="mb-0">Find the bestseller products in your area with discount.</p>

        </div>
      </div>
      <div class="product-slider ">
        <div class="item">
        <!-- card -->
          <div class="card  card-product h-100">
            <div class="card-body position-relative">

              <div class="text-center position-relative ">
                <div class=" position-absolute top-0 start-0">
                  <span class="badge bg-primary">New</span>
                </div>
                <!-- img -->
                <a href="{{ route('shop.single-location') }}"> <img src="../assets/images/products/product-img-1.jpg" alt="Grocery Ecommerce Template"
                    class="mb-3 img-fluid"></a>
                <!-- action btn -->
                    <div class="product-action-btn">
                  <a href="#!" class="btn-action mb-1" data-bs-toggle="modal" data-bs-target="#quickViewModal2"><i
                      class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
             
        
                </div>

              </div>
              <!-- title -->
              <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Haldiram's Sev Bhujia</a></h2>
              <div>
 <!-- rating -->
                <small class="text-warning"> <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5(Nom de la boutique)</span>
              </div>
            <!-- price -->
              <div class="d-flex justify-content-between align-items-center mt-3">
                  <div>
                </div>
                <div><span class="text-uppercase small text-primary">
                    In Stock</span></div>
              </div>
              <div>
              <!-- btn -->
                <div class="d-grid mt-4">
                  <a href="#" class="btn btn-primary rounded-pill">Louer maintenant</a>
                </div>
              </div>

            </div>

          </div>
        </div>
        <div class="item">
        <!-- card -->
          <div class="card  card-product h-100">
            <div class="card-body position-relative">

              <div class="text-center position-relative ">

                <!-- img -->
                <a href="{{ route('shop.single-location') }}"> <img src="../assets/images/products/product-img-2.jpg" alt="Grocery Ecommerce Template"
                    class="mb-3 img-fluid"></a>
                <!-- action btn -->
                    <div class="product-action-btn">
                  <a href="#!" class="btn-action mb-1" data-bs-toggle="modal" data-bs-target="#quickViewModal2"><i
                      class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
             
                  <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i
                      class="bi bi-arrow-left-right"></i></a>
                </div>

              </div>
              <!-- title -->
              <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Britannia NutriChoice
                  Digestive Biscuits</a></h2>
              <div>
 <!-- rating -->
                <small class="text-warning"> <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.4(3,149)</span>
              </div>
            <!-- price -->
              <div class="d-flex justify-content-between align-items-center mt-3">
                <div><span class="text-dark">$15</span>
                </div>
                <div><span class="text-uppercase small text-primary">
                    In Stock</span></div>
              </div>
              <div>
              <!-- btn -->
                <div class="d-grid mt-4">
                  <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                </div>
              </div>

            </div>

          </div>
        </div>
        <div class="item">
        <!-- card -->
          <div class="card  card-product h-100">
            <div class="card-body position-relative">

              <div class="text-center position-relative ">

                <!-- img -->
                <a href="{{ route('shop.single-location') }}"> <img src="../assets/images/products/product-img-3.jpg" alt="Grocery Ecommerce Template"
                    class="mb-3 img-fluid"></a>
                <!-- action btn -->
                    <div class="product-action-btn">
                  <a href="#!" class="btn-action mb-1" data-bs-toggle="modal" data-bs-target="#quickViewModal2"><i
                      class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
             
                  <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i
                      class="bi bi-arrow-left-right"></i></a>
                </div>

              </div>
              <!-- title -->
              <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Cadbury 5 star chocolate</a>
              </h2>
              <div>
 <!-- rating -->
                <small class="text-warning"> <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.7(1,130)</span>
              </div>
            <!-- price -->
              <div class="d-flex justify-content-between align-items-center mt-3">
                <div><span class="text-dark">$32</span>
                </div>
                <div><span class="text-uppercase small text-primary">
                    In Stock</span></div>
              </div>
              <div>
              <!-- btn -->
                <div class="d-grid mt-4">
                  <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                </div>
              </div>

            </div>

          </div>
        </div>
        <div class="item">
        <!-- card -->
          <div class="card  card-product h-100">
            <div class="card-body position-relative">

              <div class="text-center position-relative ">

                <!-- img -->
                <a href="{{ route('shop.single-location') }}"> <img src="../assets/images/products/product-img-4.jpg" alt="Grocery Ecommerce Template"
                    class="mb-3 img-fluid"></a>
                <!-- action btn -->
                    <div class="product-action-btn">
                  <a href="#!" class="btn-action mb-1" data-bs-toggle="modal" data-bs-target="#quickViewModal2"><i
                      class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
             
                  <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i
                      class="bi bi-arrow-left-right"></i></a>
                </div>

              </div>
              <!-- title -->
              <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Onion Flavour Potato</a></h2>
              <div>
 <!-- rating -->
                <small class="text-warning"> <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5(140)</span>
              </div>
            <!-- price -->
              <div class="d-flex justify-content-between align-items-center mt-3">
                <div><span class="text-danger">$12</span><span
                    class="text-muted text-decoration-line-through ms-1">$18</span>
                </div>
                <div><span class="text-uppercase small text-primary">
                    In Stock</span></div>
              </div>
              <div>
              <!-- btn -->
                <div class="d-grid mt-4">
                  <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                </div>
              </div>

            </div>

          </div>
        </div>
        <div class="item">
        <!-- card -->
          <div class="card  card-product h-100">
            <div class="card-body position-relative">

              <div class="text-center position-relative ">
                <div class=" position-absolute top-0 start-0">
                  <span class="badge bg-warning text-dark">En Echange</span>
                </div>
                <!-- img -->
                <a href="{{ route('shop.single-location') }}"> <img src="../assets/images/products/product-img-5.jpg" alt="Grocery Ecommerce Template"
                    class="mb-3 img-fluid"></a>
                <!-- action btn -->
                    <div class="product-action-btn">
                  <a href="#!" class="btn-action mb-1" data-bs-toggle="modal" data-bs-target="#quickViewModal2"><i
                      class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
             
                  <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i
                      class="bi bi-arrow-left-right"></i></a>
                </div>

              </div>
              <!-- title -->
              <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Salted Instant Popcorn</a></h2>
              <div>
 <!-- rating -->
                <small class="text-warning"> <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5 (Nom de la boutique)</span>
              </div>
            <!-- price -->
              <div class="d-flex justify-content-between align-items-center mt-3">
                <div><span class="text-danger">$40</span> <span
                    class="text-decoration-line-through text-muted">$65</span>
                </div>
                <div><span class="text-uppercase small text-primary">
                    In Stock</span></div>
              </div>
              <div>
              <!-- btn -->
                <div class="d-grid mt-4">
                  <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                </div>
              </div>

            </div>

          </div>
        </div>
        <div class="item">
        <!-- card -->
          <div class="card  card-product h-100">
            <div class="card-body position-relative">

              <div class="text-center position-relative ">

                <!-- img -->
                <a href="{{ route('shop.single-location') }}"> <img src="../assets/images/products/product-img-6.jpg" alt="Grocery Ecommerce Template"
                    class="mb-3 img-fluid"></a>
                <!-- action btn -->
                    <div class="product-action-btn">
                  <a href="#!" class="btn-action mb-1" data-bs-toggle="modal" data-bs-target="#quickViewModal2"><i
                      class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
             
                  <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i
                      class="bi bi-arrow-left-right"></i></a>
                </div>

              </div>
              <!-- title -->
              <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Epigamia Blueberry Greek Yogurt,
                  90g</a></h2>
              <div>
 <!-- rating -->
                <small class="text-warning"> <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.4(694)</span>
              </div>
            <!-- price -->
              <div class="d-flex justify-content-between align-items-center mt-3">
                <div><span class="text-dark">$17</span>
                </div>
                <div><span class="text-uppercase small text-primary">
                    In Stock</span></div>
              </div>
              <div>
              <!-- btn -->
                <div class="d-grid mt-4">
                  <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                </div>
              </div>

            </div>

          </div>
        </div>
        <div class="item">
        <!-- card -->
          <div class="card  card-product h-100">
            <div class="card-body position-relative">

              <div class="text-center position-relative ">

                <!-- img -->
                <a href="{{ route('shop.single-location') }}"> <img src="../assets/images/products/product-img-8.jpg" alt="Grocery Ecommerce Template"
                    class="mb-3 img-fluid"></a>
                <!-- action btn -->
                    <div class="product-action-btn">
                  <a href="#!" class="btn-action mb-1" data-bs-toggle="modal" data-bs-target="#quickViewModal2"><i
                      class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
             
                  <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i
                      class="bi bi-arrow-left-right"></i></a>
                </div>

              </div>
              <!-- title -->
              <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Kellogg's Special K Original
                  Cereal</a></h2>
              <div>
 <!-- rating -->
                <small class="text-warning"> <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.7(1,130)</span>
              </div>
            <!-- price -->
              <div class="d-flex justify-content-between align-items-center mt-3">
                <div><span class="text-danger">$25</span><span
                    class="text-muted text-decoration-line-through ms-1">$28</span>
                </div>
                <div><span class="text-uppercase small text-primary">
                    In Stock</span></div>
              </div>
              <div>
              <!-- btn -->
                <div class="d-grid mt-4">
                  <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                </div>
              </div>

            </div>

          </div>
        </div>
        <div class="item">
        <!-- card -->
          <div class="card  card-product h-100">
            <div class="card-body position-relative">

              <div class="text-center position-relative ">

                <!-- img -->
                <a href="{{ route('shop.single-location') }}"> <img src="../assets/images/products/product-img-9.jpg" alt="Grocery Ecommerce Template"
                    class="mb-3 img-fluid"></a>
                <!-- action btn -->
                    <div class="product-action-btn">
                  <a href="#!" class="btn-action mb-1" data-bs-toggle="modal" data-bs-target="#quickViewModal2"><i
                      class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
             
                  <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i
                      class="bi bi-arrow-left-right"></i></a>
                </div>

              </div>
              <!-- title -->
              <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Slurrp Farm No Maida Millet
                  Pancake Mix</a></h2>
              <div>
 <!-- rating -->
                <small class="text-warning"> <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5(212)</span>
              </div>
            <!-- price -->
              <div class="d-flex justify-content-between align-items-center mt-3">
                <div><span class="text-danger">$34</span><span
                    class="text-muted text-decoration-line-through ms-1">$38</span>
                </div>
                <div><span class="text-uppercase small text-primary">
                    In Stock</span></div>
              </div>
              <div>
              <!-- btn -->
                <div class="d-grid mt-4">
                  <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                </div>
              </div>

            </div>

          </div>
        </div>
        <div class="item">
        <!-- card -->
          <div class="card  card-product h-100">
            <div class="card-body position-relative">

              <div class="text-center position-relative ">

                <!-- img -->
                <a href="{{ route('shop.single-location') }}"> <img src="../assets/images/products/product-img-2.jpg" alt="Grocery Ecommerce Template"
                    class="mb-3 img-fluid"></a>
                <!-- action btn -->
                    <div class="product-action-btn">
                  <a href="#!" class="btn-action mb-1" data-bs-toggle="modal" data-bs-target="#quickViewModal2"><i
                      class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
             
                  <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i
                      class="bi bi-arrow-left-right"></i></a>
                </div>

              </div>
              <!-- title -->
              <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Britannia NutriChoice
                  Digestive Biscuits</a></h2>
              <div>
 <!-- rating -->
                <small class="text-warning"> <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.4(3,149)</span>
              </div>
            <!-- price -->
              <div class="d-flex justify-content-between align-items-center mt-3">
                <div><span class="text-dark">$15</span>
                </div>
                <div><span class="text-uppercase small text-primary">
                    In Stock</span></div>
              </div>
              <div>
              <!-- btn -->
                <div class="d-grid mt-4">
                  <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                </div>
              </div>

            </div>

          </div>
        </div>
        <div class="item">
        <!-- card -->
          <div class="card  card-product h-100">
            <div class="card-body position-relative">

              <div class="text-center position-relative ">

                <!-- img -->
                <a href="{{ route('shop.single-location') }}"> <img src="../assets/images/products/product-img-3.jpg" alt="Grocery Ecommerce Template"
                    class="mb-3 img-fluid"></a>
                <!-- action btn -->
                    <div class="product-action-btn">
                  <a href="#!" class="btn-action mb-1" data-bs-toggle="modal" data-bs-target="#quickViewModal2"><i
                      class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
             
                  <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i
                      class="bi bi-arrow-left-right"></i></a>
                </div>

              </div>
              <!-- title -->
              <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Cadbury 5 star chocolate</a>
              </h2>
              <div>
 <!-- rating -->
                <small class="text-warning"> <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.7(1,130)</span>
              </div>
            <!-- price -->
              <div class="d-flex justify-content-between align-items-center mt-3">
                <div><span class="text-dark">$32</span>
                </div>
                <div><span class="text-uppercase small text-primary">
                    In Stock</span></div>
              </div>
              <div>
              <!-- btn -->
                <div class="d-grid mt-4">
                  <a href="#" class="btn btn-primary rounded-pill">Add to Cart</a>
                </div>
              </div>

            </div>

          </div>
        </div>




      </div>
      <div class="row">
        <div class="col-12 pt-5">
          <div class="d-md-flex justify-content-between align-items-center mb-8">
            <div>

            </div>
            <div>
              <a href="{{ route('view.all.locations') }}">View All <i class="feather-icon icon-chevron-right pt-5"></i></a>
            </div>
          </div>

        </div>
      </div>

    </div>

  </section>
   <!-- section cta -->
  <section class="bg-dark"
    style="background:url(../assets/images/svg-graphics/pattern.svg)no-repeat; background-size: cover; background-position: center;">
    <div class="container">
       <!-- row -->
      <div class="row">
        <div class="offset-lg-1 col-lg-10">

          <div class="row align-items-center">
             <!-- col -->
            <div class="col-md-6">
              <div class="text-white mt-8 mt-lg-0">
                <span>Votre nouvelle destination préférée</span>
                <h2 class="h2 text-white  my-4">Echangez, découvrez, partager.</h2>
                <p class="text-white-50">Nous sommes ravis de vous acceuillir chez nous! <br>
                En vous inscrivant dès maintenant,vous pouver profiter de nonbreux avatages et privilèges exclusifs.</p>
                   <!-- form -->
                <form class="row g-3">

                  <div class="col-6">
                     <!-- input -->
                    <label for="emailAddress" class="visually-hidden">Email Address</label>
                    <input type="email" class="form-control border-0" id="emailAddress" placeholder="Email Address">
                  </div>
                   <!-- btn -->
                  <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Sign Up</button>
                  </div>
                </form>
              </div>
            </div>
             <!-- col -->
            <div class="col-md-6">
              <div class="text-center">
                 <!-- img -->
                <img src="../assets/images/png/girl-email.png" alt="" class="img-fluid">
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
</main>












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
              <div class="zoom" onmousemove="zoom(event)" style="
                background-image: url(../assets/images/products/product-single-img-1.jpg);
              ">
                <!-- img -->
                <img src="../assets/images/products/product-single-img-1.jpg" alt="">
              </div>
              <div>
                <div class="zoom" onmousemove="zoom(event)" style="
                  background-image: url(../assets/images/products/product-single-img-2.jpg);
                ">
                  <!-- img -->
                  <img src="../assets/images/products/product-single-img-2.jpg" alt="">
                </div>
              </div>
              <div>
                <div class="zoom" onmousemove="zoom(event)" style="
                  background-image: url(../assets/images/products/product-single-img-3.jpg);
                ">
                  <!-- img -->
                  <img src="../assets/images/products/product-single-img-3.jpg" alt="">
                </div>
              </div>
              <div>
                <div class="zoom" onmousemove="zoom(event)" style="
                  background-image: url(../assets/images/products/product-single-img-4.jpg);
                ">
                  <!-- img -->
                  <img src="../assets/images/products/product-single-img-4.jpg" alt="">
                </div>
              </div>
            </div>
            <!-- product tools -->
            <div class="product-tools">
              <div class="thumbnails row g-3" id="productModalThumbnails">
                <div class="col-3" class="tns-nav-active">
                  <div class="thumbnails-img">
                    <!-- img -->
                    <img src="../assets/images/products/product-single-img-1.jpg" alt="">
                  </div>
                </div>
                <div class="col-3">
                  <div class="thumbnails-img">
                    <!-- img -->
                    <img src="../assets/images/products/product-single-img-2.jpg" alt="">
                  </div>
                </div>
                <div class="col-3">
                  <div class="thumbnails-img">
                    <!-- img -->
                    <img src="../assets/images/products/product-single-img-3.jpg" alt="">
                  </div>
                </div>
                <div class="col-3">
                  <div class="thumbnails-img">
                    <!-- img -->
                    <img src="../assets/images/products/product-single-img-4.jpg" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        <div class="col-md-6">
          <div class="ps-lg-10 mt-6 mt-md-0">
            <!-- content -->
            <a href="#!" class="mb-4 d-block">Bakery Biscuits</a>
            <!-- heading -->
            <h1 class="mb-1">Napolitanke Ljesnjak </h1>


            <!-- hr -->
            <hr class="my-6">


            <div class="fs-4">
              <a href="{{ route('store.single') }}"> <span class="text-secondary">E-Grocery Super Market</span></a>
            </div>
             <div class="mb-4">
              <!-- rating -->
              <!-- rating --> <small class="text-warning"> <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-half"></i></small><a href="#" class="ms-2">(30 reviews)</a>
            </div>
              <div>


            </div>
            <div class="mt-3 row justify-content-start g-2 align-items-center">

              <div class="col-xxl-4 col-lg-4 col-md-5 col-5 d-grid">
                <!-- button -->
                <!-- btn --> <button type="button" class="btn btn-primary"><i class="feather-icon icon-shopping-bag me-2"></i>faire attendre </button>
              </div>
              <div class="col-md-4 col-4">
                <!-- btn -->
                <a class="btn btn-light " href="{{ route('choice.away') }}" data-bs-toggle="tooltip" data-bs-html="true" aria-label="Compare"><i class="bi bi-arrow-left-right"></i></a>
              </div>
            </div>
            <!-- hr -->
            <hr class="my-6">
            <div>
              <!-- table -->
              <table class="table table-borderless mb-0">

                <tbody>
                  <tr>
                    <td>Product Code:</td>
                    <td>FBB00255</td>

                  </tr>
                  <tr>
                    <td>Date de mise en ligne:</td>
                    <td>04 Décembre 2023 </td>

                  </tr>
                  <tr>
                    <td>Statut:</td>
                    <td>En Echange</td>

                  </tr>
                  <tr>
                    <td>Adresse:</td>
                    <td><small>Ville<span class="text-muted">( Quartier )</span></small></td>

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

                <ul class="dropdown-menu" >
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
    </div>
  </div>
</div>




<div class="modal fade" id="quickViewModal2" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body p-8">
        <div class="position-absolute top-0 end-0 me-3 mt-3">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <!-- img slide -->
            <div class="product productModal" id="productModal2">
              <div class="zoom" onmousemove="zoom(event)" style="
                background-image: url(../assets/images/products/product-single-img-1.jpg);
              ">
                <!-- img -->
                <img src="../assets/images/products/product-single-img-1.jpg" alt="">
              </div>
              <div>
                <div class="zoom" onmousemove="zoom(event)" style="
                  background-image: url(../assets/images/products/product-single-img-2.jpg);
                ">
                  <!-- img -->
                  <img src="../assets/images/products/product-single-img-2.jpg" alt="">
                </div>
              </div>
              <div>
                <div class="zoom" onmousemove="zoom(event)" style="
                  background-image: url(../assets/images/products/product-single-img-3.jpg);
                ">
                  <!-- img -->
                  <img src="../assets/images/products/product-single-img-3.jpg" alt="">
                </div>
              </div>
              <div>
                <div class="zoom" onmousemove="zoom(event)" style="
                  background-image: url(../assets/images/products/product-single-img-4.jpg);
                ">
                  <!-- img -->
                  <img src="../assets/images/products/product-single-img-4.jpg" alt="">
                </div>
              </div>
            </div>
            <!-- product tools -->
            <div class="product-tools">
              <div class="thumbnails row g-3" id="productModalThumbnails2">
                <div class="col-3" class="tns-nav-active">
                  <div class="thumbnails-img">
                    <!-- img -->
                    <img src="../assets/images/products/product-single-img-1.jpg" alt="">
                  </div>
                </div>
                <div class="col-3">
                  <div class="thumbnails-img">
                    <!-- img -->
                    <img src="../assets/images/products/product-single-img-2.jpg" alt="">
                  </div>
                </div>
                <div class="col-3">
                  <div class="thumbnails-img">
                    <!-- img -->
                    <img src="../assets/images/products/product-single-img-3.jpg" alt="">
                  </div>
                </div>
                <div class="col-3">
                  <div class="thumbnails-img">
                    <!-- img -->
                    <img src="../assets/images/products/product-single-img-4.jpg" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        <div class="col-md-6">
          <div class="ps-lg-10 mt-6 mt-md-0">
            <!-- content -->
            <a href="#!" class="mb-4 d-block">Categorie de location</a>
            <!-- heading -->
            <h1 class="mb-1">Napolitanke Ljesnjak </h1>


            <!-- hr -->
            <hr class="my-6">
            
            <div class="fs-4">
              <a href="{{ route('store.single') }}"> <span class="text-secondary">E-Grocery Super Market</span></a>
            </div>
            <div class="mb-4">
              <!-- rating -->
              <!-- rating --> <small class="text-warning"> <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-half"></i></small><a href="#" class="ms-2">(30 reviews)</a>
            </div>
            <div>
              <p>Prix par jour</p>
              <div class="mb-4">
                <button type="button" class="btn btn-outline-secondary">
                  250f | journée
                </button>
                <button type="button" class="btn btn-outline-secondary">
                 200f | 7jrs + 
                </button>
                <button type="button" class="btn btn-outline-secondary">
                 150f | 30 jrs +
                </button>
              </div>


            </div>
            <div class="mt-3 row justify-content-start g-2 align-items-center">

              <div class="col-xxl-4 col-lg-4 col-md-5 col-5 d-grid">
                <!-- button -->
                <!-- btn --> <button type="button" class="btn btn-primary"><i class="feather-icon icon-shopping-bag me-2"></i>Louer
                 </button>
              </div>
              <div class="col-md-4 col-4">
                <!-- btn -->
              </div>
            </div>
            <!-- hr -->
            <hr class="my-6">
            <div>
              <!-- table -->
              <table class="table table-borderless mb-0">

                <tbody>
                  <tr>
                    <td>Product Code:</td>
                    <td>FBB00255</td>

                  </tr>
                  <tr>
                    <td>Date de mise en ligne:</td>
                    <td>04 Décembre 2023 </td>

                  </tr>
                  <tr>
                    <td>Statut:</td>
                    <td>En Echange</td>

                  </tr>
                  <tr>
                    <td>Adresse:</td>
                    <td><small>Ville<span class="text-muted">( Quartier )</span></small></td>

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

                <ul class="dropdown-menu" >
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
    </div>
  </div>
</div>

@section('script')
<script>
  var slider; 0 < $(".productModal").length && (slider = tns({ container: "#productModal", items: 1, startIndex: 0, navContainer: "#productModalThumbnails", navAsThumbnails: !0, autoplay: !1, autoplayTimeout: 1500, swipeAngle: !1, speed: 1500, controls: !1, autoplayButtonOutput: !1, loop: !1 })), 1 < $(".product").length && (slider = tns({ container: "#product", items: 1, startIndex: 0, navContainer: "#productThumbnails", navAsThumbnails: !0, autoplay: !1, autoplayTimeout: 1500, swipeAngle: !1, speed: 1500, controls: !1, autoplayButtonOutput: !1 }));
</script>
<script>
  var slider; 0 < $(".productModal").length && (slider = tns({ container: "#productModal2", items: 1, startIndex: 0, navContainer: "#productModalThumbnails2", navAsThumbnails: !0, autoplay: !1, autoplayTimeout: 1500, swipeAngle: !1, speed: 1500, controls: !1, autoplayButtonOutput: !1, loop: !1 })), 1 < $(".product").length && (slider = tns({ container: "#product", items: 1, startIndex: 0, navContainer: "#productThumbnails", navAsThumbnails: !0, autoplay: !1, autoplayTimeout: 1500, swipeAngle: !1, speed: 1500, controls: !1, autoplayButtonOutput: !1 }));
</script>

@endsection











@endsection 

