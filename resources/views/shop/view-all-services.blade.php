
@extends('base')
@section('content')

<main>

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






















      </div>
      
        <div class="row mt-8">
          <div class="col  mt-8">
            <!-- nav -->
            <nav>
              <ul class="pagination">
                <li class="page-item disabled">
                  <a class="page-link mx-1 " href="#" aria-label="Previous">
                    <i class="feather-icon icon-chevron-left"></i>
                  </a>
                </li>
                <li class="page-item">
                  <a class="page-link mx-1 active" href="#">1</a>
                </li>
                <li class="page-item">
                  <a class="page-link mx-1 text-body" href="#">2</a>
                </li>

                <li class="page-item">
                  <a class="page-link mx-1 text-body" href="#">...</a>
                </li>
                <li class="page-item">
                  <a class="page-link mx-1 text-body" href="#">12</a>
                </li>
                <li class="page-item">
                  <a class="page-link mx-1 text-body" href="#" aria-label="Next">
                    <i class="feather-icon icon-chevron-right"></i>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
    </div>
    
    </div>
    
  </section>


    <!-- Menu -->


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
                <a class="btn btn-light " href="{{ route('shop.select-product') }}" data-bs-toggle="tooltip" data-bs-html="true" aria-label="Compare"><i class="bi bi-arrow-left-right"></i></a>
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

