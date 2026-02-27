
@extends('base')
@section('content')

<main>
    <div class="mt-4">
      <div class="container">
        <!-- row -->
        <div class="row">
          <!-- col -->
          <div class="col-12">
            <!-- breadcrumb -->

          </div>
        </div>
      </div>
    </div>
    <!-- section -->
    <section class="mb-lg-14 mb-8 mt-8">
      <div class="container">
        <!-- row -->
        <div class="row">
          <div class="col-12 col-lg-3 col-md-4 mb-4 mb-md-0">
            <div class="d-flex flex-column">
              <div>
                <!-- img -->
                <!-- img -->
                <img src="../assets/images/stores-logo/stores-logo-1.svg" alt=""
                  class="rounded-circle icon-shape icon-xxl" />
              </div>
              <!-- heading -->
              <div class="mt-4">
                <h1 class="mb-1 h4">E-Grocery Super Market</h1>

                <div>
                  <span><small><a href="#!"> "Slogan" 100% satisfaction guarantee</a></small></span>
                </div>
                <!-- rating -->
                <div class="mt-2">
                  <!-- rating -->
                  <small class="text-warning">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-half"></i></small><span class="ms-2">5.0</span>
                  <!-- text --><span class="text-muted ms-1">(3,400 reviews)</span>
                </div>
              </div>
            </div>
            <hr />
            <!-- nav -->
            <ul class="nav flex-column nav-pills nav-pills-dark">
              <!-- nav item -->
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#"><i
                    class="feather-icon icon-shopping-bag me-2"></i>Shop</a>
              </li>
              <!-- nav item -->
              <li class="nav-item">
                <a class="nav-link" href="{{ route('blog') }}"><i class="feather-icon icon-gift me-2"></i>Blog</a>
              </li>

              <!-- nav item -->
              <li class="nav-item">
                <a class="nav-link" href="{{ route('store.reviews') }}"><i class="feather-icon icon-star me-2"></i>Reviews</a>
              </li>
              <!-- nav item -->
         
              <!-- nav item -->
              <li class="nav-item">
                <a class="nav-link" href="{{ route('store.contact') }}"><i class="feather-icon icon-phone-call me-2"></i>Contact</a>
              </li>

            </ul>
            <hr />
            <div>
              <ul class="nav flex-column nav-links">
                <!-- nav item -->
                <li class="nav-item">
                  <a href="#!" class="nav-link">Produce</a>
                </li>
                <!-- nav item -->
                <li class="nav-item">
                  <a href="#!" class="nav-link">Dairy & Eggs</a>
                </li>
                <!-- nav item -->
                <li class="nav-item">
                  <a href="#!" class="nav-link">Beverages</a>
                </li>
                <!-- nav item -->
                <li class="nav-item">
                  <a href="#!" class="nav-link">Meat & Seafood</a>
                </li>
                <!-- nav item -->
                <li class="nav-item">
                  <a href="#!" class="nav-link">Snacks & Candy</a>
                </li>
                <!-- nav item -->
                <li class="nav-item">
                  <a href="#!" class="nav-link">Frozen</a>
                </li>
                <!-- nav item -->
                <li class="nav-item">
                  <a href="#!" class="nav-link">Bakery</a>
                </li>
                <!-- nav item -->
                <li class="nav-item">
                  <a href="#!" class="nav-link">Prepared Foods</a>
                </li>
                <!-- nav item -->
                <li class="nav-item">
                  <a href="#!" class="nav-link">Alcohol</a>
                </li>
                <!-- nav item -->
                <li class="nav-item">
                  <a href="#!" class="nav-link">Dry Goods & Pasta</a>
                </li>
                <!-- nav item -->
                <li class="nav-item">
                  <a href="#!" class="nav-link">Condiments & Sauces</a>
                </li>
                <!-- nav item -->
                <li class="nav-item">
                  <a href="#!" class="nav-link">Canned Goods & Soups</a>
                </li>
                <!-- nav item -->
                <li class="nav-item">
                  <a href="#!" class="nav-link">Breakfast</a>
                </li>
                <!-- nav item -->
                <li class="nav-item">
                  <a href="#!" class="nav-link">Household</a>
                </li>
                <!-- nav item -->
                <li class="nav-item">
                  <a href="#!" class="nav-link">Baking Essentials</a>
                </li>
                <!-- nav item -->
                <li class="nav-item">
                  <a href="#!" class="nav-link">Oils, Vinegars, & Spices</a>
                </li>
                <!-- nav item -->
                <li class="nav-item">
                  <a href="#!" class="nav-link">Health Care</a>
                </li>
                <!-- nav item -->
                <li class="nav-item">
                  <a href="#!" class="nav-link">Personal Care</a>
                </li>
                <!-- nav item -->
                <li class="nav-item">
                  <a href="#!" class="nav-link">Kitchen Supplies</a>
                </li>
                <!-- nav item -->
                <li class="nav-item">
                  <a href="#!" class="nav-link">Floral</a>
                </li>
                <!-- nav item -->
                <li class="nav-item">
                  <a href="#!" class="nav-link">Party & Gift Supplies</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-12 col-lg-9 col-md-8">
            <div class="mb-8 bg-light d-lg-flex justify-content-lg-between rounded">
              <div class="align-self-center p-8">
                <div class="mb-3">
                  <h5 class="mb-0 fw-bold">E-Grocery Super Market</h5>
                  <p class="mb-0 text-muted">
                    Trouver ce que vous cherchez ici ...
                  </p>
                </div>
                <div class="position-relative">
                  <input type="email" class="form-control" id="exampleFormControlInput1"
                    placeholder="Search E-Grocery Super Market" />
                  <span class="position-absolute end-0 top-0 mt-2 me-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="feather feather-search">
                      <circle cx="11" cy="11" r="8"></circle>
                      <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                  </span>
                </div>
              </div>
              <div class="py-4">
                <!-- img -->
                <img src="../assets/images/svg-graphics/store-graphics.svg" alt="" class="img-fluid" />
              </div>
            </div>

            <div class="d-md-flex justify-content-between mb-3 align-items-center">
              <div>
                <p class="mb-3 mb-md-0">24 Products found</p>
              </div>
              <div class="d-flex justify-content-md-between align-items-center">
                <div class="me-2">
                  <!-- select option -->
                  <select class="form-select">
                    <option selected>Show: 50</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                  </select>
                </div>

              </div>
            </div>
            <!-- row -->
            <div class="row g-4 row-cols-xl-4 row-cols-lg-3 row-cols-2 row-cols-md-2 mt-2">
              <div class="col">
                <!-- card -->
                <div class="card card-product">
                  <div class="card-body">
                    <div class="text-center position-relative">
                      <!-- badge -->
                      <div class="position-absolute top-0 start-0">
                        <span class="badge bg-danger">Sale</span>
                      </div>
                      <a href="#!">
                        <!-- img --><img src="../assets/images/products/product-img-1.jpg"
                          alt="Grocery Ecommerce Template" class="mb-3 img-fluid" /></a>
                      <!-- btn action -->
                      <div class="card-product-action">
                        <a href="#!" class="btn-action" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                            class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>

                      </div>
                    </div>
                    <div class="text-small mb-1">
                      <a href="#!" class="text-decoration-none text-muted"><small>Snack & Munchies</small></a>
                    </div>
                    <h2 class="fs-6">
                      <a href="{{ route('shop.single', ['uuid' => "rui"]) }}" class="text-inherit text-decoration-none">Haldiram's Sev Bhujia</a>
                    </h2>

                    <!-- price -->
                    <div class="d-flex justify-content-between align-items-center mt-3">
                      <div>
     
                      </div>
                        <div class="mt-8 ">
                        <!-- dropdown -->
                        <div class="dropdown ">
                            <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button"
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
              <div class="col">
                <!-- card -->
                <div class="card card-product">
                  <div class="card-body">
                    <div class="text-center position-relative">
                      <!-- badge -->
                      <a href="#!">
                        <!-- img --><img src="../assets/images/products/product-img-2.jpg"
                          alt="Grocery Ecommerce Template" class="mb-3 img-fluid" /></a>
                      <!-- btn action -->
                      <div class="card-product-action">
                        <a href="#!" class="btn-action" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                            class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
             
                      </div>
                    </div>
                    <div class="text-small mb-1">
                      <a href="#!" class="text-decoration-none text-muted"><small>Bakery & Biscuits</small></a>
                    </div>
                    <h2 class="fs-6">
                      <a href="{{ route('shop.single', ['uuid' => "rui"]) }}" class="text-inherit text-decoration-none">NutriChoice Digestive
                      </a>
                    </h2>

                    <!-- price -->
                    <div class="d-flex justify-content-between align-items-center mt-3">
                      <div></div>
                        <div class="mt-8 ">
                        <!-- dropdown -->
                        <div class="dropdown ">
                            <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button"
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
              <div class="col">
                <!-- card -->
                <div class="card card-product">
                  <div class="card-body">
                    <div class="text-center position-relative">
                      <!-- badge -->
                      <a href="#!">
                        <!-- img --><img src="../assets/images/products/product-img-3.jpg"
                          alt="Grocery Ecommerce Template" class="mb-3 img-fluid" /></a>
                      <!-- btn action -->
                      <div class="card-product-action">
                        <a href="#!" class="btn-action" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                            class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>

                      </div>
                    </div>
                    <div class="text-small mb-1">
                      <a href="#!" class="text-decoration-none text-muted"><small>Bakery & Biscuits</small></a>
                    </div>
                    <h2 class="fs-6">
                      <a href="{{ route('shop.single', ['uuid' => "rui"]) }}" class="text-inherit text-decoration-none">Cadbury 5 Star Chocolate</a>
                    </h2>

                    <!-- price -->
                    <div class="d-flex justify-content-between align-items-center mt-3">
                      <div>
                        
                      </div>
                        <div class="mt-8 ">
                        <!-- dropdown -->
                        <div class="dropdown ">
                            <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button"
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
              <div class="col">
                <!-- card -->
                <div class="card card-product">
                  <div class="card-body">
                    <div class="text-center position-relative">
                      <!-- badge -->
                      <a href="#!">
                        <!-- img --><img src="../assets/images/products/product-img-4.jpg"
                          alt="Grocery Ecommerce Template" class="mb-3 img-fluid" /></a>
                      <!-- btn action -->
                      <div class="card-product-action">
                        <a href="#!" class="btn-action" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                            class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>

                      </div>
                    </div>
                    <div class="text-small mb-1">
                      <a href="#!" class="text-decoration-none text-muted"><small>Snack & Munchies</small></a>
                    </div>
                    <h2 class="fs-6">
                      <a href="{{ route('shop.single', ['uuid' => "rui"]) }}" class="text-inherit text-decoration-none">Onion Flavour Potato</a>
                    </h2>

                    <!-- price -->
                    <div class="d-flex justify-content-between align-items-center mt-3">
                      <div>
             
                      </div>
                        <div class="mt-8 ">
                        <!-- dropdown -->
                        <div class="dropdown ">
                            <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button"
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
              <div class="col">
                <!-- card -->
                <div class="card card-product">
                  <div class="card-body">
                    <div class="text-center position-relative">
                      <!-- badge -->
                      <a href="#!">
                        <!-- img --><img src="../assets/images/products/product-img-5.jpg"
                          alt="Grocery Ecommerce Template" class="mb-3 img-fluid" /></a>
                      <!-- btn action -->
                      <div class="card-product-action">
                        <a href="#!" class="btn-action" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                            class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
      
                      </div>
                    </div>
                    <div class="text-small mb-1">
                      <a href="#!" class="text-decoration-none text-muted"><small>Instant Food</small></a>
                    </div>
                    <h2 class="fs-6">
                      <a href="{{ route('shop.single', ['uuid' => "rui"]) }}" class="text-inherit text-decoration-none">Salted Instant Popcorn
                      </a>
                    </h2>
   
                    <div class="d-flex justify-content-between mt-4">
                      <div>
                    
                      </div>
                        <div class="mt-8 ">
                        <!-- dropdown -->
                        <div class="dropdown ">
                            <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button"
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
              <div class="col">
                <!-- card -->
                <div class="card card-product">
                  <div class="card-body">
                    <div class="text-center position-relative">
                      <!-- badge -->
                      <div class="position-absolute top-0 start-0">
                        <span class="badge bg-danger">Sale</span>
                      </div>
                      <a href="#!">
                        <!-- img --><img src="../assets/images/products/product-img-6.jpg"
                          alt="Grocery Ecommerce Template" class="mb-3 img-fluid" /></a>
                      <!-- btn action -->
                      <div class="card-product-action">
                        <a href="#!" class="btn-action" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                            class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
            
                      </div>
                    </div>
                    <div class="text-small mb-1">
                      <a href="#!" class="text-decoration-none text-muted"><small>Dairy, Bread & Eggs</small></a>
                    </div>
                    <h2 class="fs-6">
                      <a href="{{ route('shop.single', ['uuid' => "rui"]) }}" class="text-inherit text-decoration-none">Blueberry Greek Yogurt</a>
                    </h2>

                    <!-- price -->
                    <div class="d-flex justify-content-between align-items-center mt-3">
                      <div>
                 
                      </div>
                        <div class="mt-8 ">
                        <!-- dropdown -->
                        <div class="dropdown ">
                            <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button"
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
              <div class="col">
                <!-- card -->
                <div class="card card-product">
                  <div class="card-body">
                    <div class="text-center position-relative">
                      <!-- badge -->
                      <a href="#!">
                        <!-- img --><img src="../assets/images/products/product-img-7.jpg"
                          alt="Grocery Ecommerce Template" class="mb-3 img-fluid" /></a>
                      <!-- btn action -->
                      <div class="card-product-action">
                        <a href="#!" class="btn-action" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                            class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
   
                      </div>
                    </div>
                    <div class="text-small mb-1">
                      <a href="#!" class="text-decoration-none text-muted"><small>Dairy, Bread & Eggs</small></a>
                    </div>
                    <h2 class="fs-6">
                      <a href="{{ route('shop.single', ['uuid' => "rui"]) }}" class="text-inherit text-decoration-none">Britannia Cheese Slices</a>
                    </h2>

                    <!-- price -->
                    <div class="d-flex justify-content-between align-items-center mt-3">
                      <div></div>
                        <div class="mt-8 ">
                        <!-- dropdown -->
                        <div class="dropdown ">
                            <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button"
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
              <div class="col">
                <!-- card -->
                <div class="card card-product">
                  <div class="card-body">
                    <div class="text-center position-relative">
                      <!-- badge -->
                      <a href="#!">
                        <!-- img --><img src="../assets/images/products/product-img-8.jpg"
                          alt="Grocery Ecommerce Template" class="mb-3 img-fluid" /></a>
                      <!-- btn action -->
                      <div class="card-product-action">
                        <a href="#!" class="btn-action" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                            class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
                    
                      </div>
                    </div>
                    <div class="text-small mb-1">
                      <a href="#!" class="text-decoration-none text-muted"><small>Instant Food</small></a>
                    </div>
                    <h2 class="fs-6">
                      <a href="{{ route('shop.single', ['uuid' => "rui"]) }}" class="text-inherit text-decoration-none">Kellogg's Original Cereals</a>
                    </h2>

                    <!-- price -->
                    <div class="d-flex justify-content-between align-items-center mt-3">
                      <div>
                    
                      </div>
                        <div class="mt-8 ">
                        <!-- dropdown -->
                        <div class="dropdown ">
                            <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button"
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
              <div class="col">
                <!-- card -->
                <div class="card card-product">
                  <div class="card-body">
                    <div class="text-center position-relative">
                      <!-- badge -->
                      <a href="#!">
                        <!-- img --><img src="../assets/images/products/product-img-9.jpg"
                          alt="Grocery Ecommerce Template" class="mb-3 img-fluid" /></a>
                      <!-- btn action -->
                      <div class="card-product-action">
                        <a href="#!" class="btn-action" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                            class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
                       
                      </div>
                    </div>
                    <div class="text-small mb-1">
                      <a href="#!" class="text-decoration-none text-muted"><small>Snack & Munchies</small></a>
                    </div>
                    <h2 class="fs-6">
                      <a href="{{ route('shop.single', ['uuid' => "rui"]) }}" class="text-inherit text-decoration-none">Slurrp Millet Chocolate
                      </a>
                    </h2>

                    <!-- price -->
                    <div class="d-flex justify-content-between align-items-center mt-3">
                      <div>
             
                      </div>
                        <div class="mt-8 ">
                        <!-- dropdown -->
                        <div class="dropdown ">
                            <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button"
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
              <div class="col">
                <!-- card -->
                <div class="card card-product">
                  <div class="card-body">
                    <div class="text-center position-relative">
                      <!-- badge -->
                      <a href="#!">
                        <!-- img --><img src="../assets/images/products/product-img-10.jpg"
                          alt="Grocery Ecommerce Template" class="mb-3 img-fluid" /></a>
                      <!-- btn action -->
                      <div class="card-product-action">
                        <a href="#!" class="btn-action" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                            class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
                       
                      </div>
                    </div>
                    <div class="text-small mb-1">
                      <a href="#!" class="text-decoration-none text-muted"><small>Dairy, Bread & Eggs</small></a>
                    </div>
                    <h2 class="fs-6">
                      <a href="{{ route('shop.single', ['uuid' => "rui"]) }}" class="text-inherit text-decoration-none">Amul Butter - 500 g</a>
                    </h2>

                    <div class="d-flex justify-content-between mt-4">
                      <div>
                 
                      </div>
                        <div class="mt-8 ">
                        <!-- dropdown -->
                        <div class="dropdown ">
                            <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button"
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
            <!-- row -->
            <div class="row mt-8">
              <div class="col">
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