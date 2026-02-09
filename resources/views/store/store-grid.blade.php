@extends('base')
@section('content')

<main>
    <div class="mt-4">
      <div class="container">
        <!-- row -->
        <div class="row ">
          <!-- col -->
          <div class="col-12">
            <!-- breadcrumb -->

          </div>
        </div>
      </div>
    </div>
    <!-- section -->
    <section class="mt-8 ">
      <!-- container -->
      <div class="container">
        <!-- row -->
        <div class="row ">
          <div class="col-12 ">
            <!-- heading -->
            <div class="bg-light d-flex justify-content-between ps-md-10 ps-6 rounded">
              <div class="d-flex align-items-center">
                <h1 class="mb-0 fw-bold">Stores</h1>

              </div>
              <div class="py-6">
                <!-- img -->
                <!-- img -->
                <img src="../assets/images/svg-graphics/store-graphics.svg" alt="" class="img-fluid">
              </div>
            </div>


          </div>
        </div>
      </div>
    </section>
    <!-- section -->
    <section class="mt-8 mb-lg-14 mb-8">
      <div class="container">
        <!-- row -->
        <div class="row">
          <!-- col -->
          <div class="col-12">
            <div class="mb-3">
              <!-- text -->
              <h6>We have <span class="text-primary">36</span> vendors now</h6>
            </div>
          </div>
        </div>
        <div class="row row-cols-1 row-cols-lg-4 row-cols-md-3 g-4 g-lg-4">

          <!-- col -->
          <div class="col" >
            <!-- card -->
            <div class="card p-6 card-product">
              <div style="justify-content: space-between;">
               <!-- img -->
               <img src="../assets/images/stores-logo/stores-logo-1.svg" alt=""   class="rounded-circle icon-shape icon-xl" >
               <a href="{{ route('shop.wishlist') }}" class="btn-action mb-1 bg-primary text-white " style="margin-left: 150px;" data-bs-toggle="tooltip" data-bs-html="true"title="Wishlist"  >
                <i class="bi bi-heart"></i>
               </a>
              </div>
              <div class="mt-4">
                <!-- content -->
                <h2 class="mb-1 h5"><a href="{{ route('store.single') }}" class="text-inherit">E-Grocery Super Market</a></h2>
                <div class="small text-muted"><span class="me-2">Organic </span><span class="me-2">Groceries</span>
                  <span>Butcher Shop</span>
                </div>
                <div class="py-3">
                  <p class=" text-primary m-0">
                    "un slogan " lor sit amet, consectetur adipisicing elit. Dolorum, quo?
                  </p>
                </div>
              <div class="row justify-content-center ">
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
            </div>
          </div>
          <div class="col">
            <!-- card -->
            <div class="card p-6 card-product">
              <div> <!-- img --><img src="../assets/images/stores-logo/stores-logo-2.svg" alt=""
                  class="rounded-circle icon-shape icon-xl">
              <a href="{{ route('shop.wishlist') }}" class="btn-action mb-1 " style="margin-left: 150px;" data-bs-toggle="tooltip" data-bs-html="true"title="Wishlist"  >
                <i class="bi bi-heart"></i>
              </a>
              </div>
              <div class="mt-4">
                <!-- content -->
                <h2 class="mb-1 h5"><a href="{{ route('store.single') }}" class="text-inherit">DealShare Mart</a></h2>
                <div class="small text-muted"><span class="me-2">Alcohol</span><span class="me-2">Groceries</span></div>
                <div class="py-3">
                  <ul class="list-unstyled mb-0 small">
                    <li>Delivery
                    </li>
                    <li>Pickup available</li>
                  </ul>
                </div>
                <div class="row justify-content-center ">
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
            </div>
          </div>
          <div class="col">
            <!-- card -->
            <div class="card p-6 card-product">
              <div> <!-- img --><img src="../assets/images/stores-logo/stores-logo-3.svg" alt=""
                  class="rounded-circle icon-shape icon-xl"></div>
              <div class="mt-4">
                <!-- content -->
                <h2 class="mb-1 h5"><a href="{{ route('store.single') }}" class="text-inherit">DMart</a></h2>
                <div class="small text-muted"><span class="me-2">Groceries</span><span class="me-2">Bakery</span>
                  <span>Deli</span>
                </div>
                <div class="py-3">
                  <ul class="list-unstyled mb-0 small">
                    <li><span class="text-primary">Delivery by 10:30pm</span>
                    </li>
                    <li>Pickup available</li>
                  </ul>
                </div>
                <div class="row justify-content-center ">
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
            </div>
          </div>
          <div class="col">
            <!-- card -->
            <div class="card p-6 card-product">
              <div> <!-- img --><img src="../assets/images/stores-logo/stores-logo-4.svg" alt=""
                  class="rounded-circle icon-shape icon-xl"></div>
              <div class="mt-4">
                <!-- content -->
                <h2 class="mb-1 h5"><a href="{{ route('store.single') }}" class="text-inherit">Blinkit Store</a></h2>
                <div class="small text-muted"><span class="me-2">Meal Kits</span><span class="me-2">Prepared
                    Meals</span> <span>Organic</span></div>
                <div class="py-3">
                  <ul class="list-unstyled mb-0 small">
                    <li>Delivery
                    </li>
                    <li>Pickup available</li>
                  </ul>
                </div>
                <div class="row justify-content-center ">
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
            </div>
          </div>
          <div class="col">
            <!-- card -->
            <div class="card p-6 card-product">
              <div> <!-- img --><img src="../assets/images/stores-logo/stores-logo-5.svg" alt=""
                  class="rounded-circle icon-shape icon-xl"></div>
              <div class="mt-4">
                <!-- content -->
                <h2 class="mb-1 h5"><a href="{{ route('store.single') }}" class="text-inherit">StoreFront Super Market</a></h2>
                <div class="small text-muted"><span class="me-2">Groceries</span><span class="me-2">Bakery</span></div>
                <div class="py-3">
                  <ul class="list-unstyled mb-0 small">
                    <li><span class="text-primary">Delivery by 11:30pm</span>
                    </li>
                    <li>Pickup available</li>
                  </ul>
                </div>
                <div class="row justify-content-center ">
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
            </div>
          </div>
          <div class="col">
            <!-- card -->
            <div class="card p-6 card-product">
              <div> <!-- img --><img src="../assets/images/stores-logo/stores-logo-6.svg" alt=""
                  class="rounded-circle icon-shape icon-xl"></div>
              <div class="mt-4">
                <!-- content -->
                <h2 class="mb-1 h5"><a href="{{ route('store.single') }}" class="text-inherit">BigBasket</a></h2>
                <div class="small text-muted"><span class="me-2">Groceries</span> <span class="me-2">Deli</span></div>
                <div class="py-3">
                  <ul class="list-unstyled mb-0 small">
                    <li><span class="text-primary">Delivery by 10:30pm</span>
                    </li>
                    <li>Pickup available</li>
                  </ul>
                </div>
                <div class="row justify-content-center ">
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
            </div>
          </div>
          <div class="col">
            <!-- card -->
            <div class="card p-6 card-product">
              <div> <!-- img --><img src="../assets/images/stores-logo/stores-logo-7.svg" alt=""
                  class="rounded-circle icon-shape icon-xl"></div>
              <div class="mt-4">
                <!-- content -->
                <h2 class="mb-1 h5"><a href="{{ route('store.single') }}" class="text-inherit">Swiggy Instamart</a></h2>
                <div class="small text-muted"><span class="me-2">Meal Kits</span><span class="me-2">Prepared
                    Meals</span> <span>Organic</span></div>
                <div class="py-3">
                  <ul class="list-unstyled mb-0 small">
                    <li>Delivery
                    </li>
                    <li>Pickup available</li>
                  </ul>
                </div>
                <div class="row justify-content-center ">
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
            </div>
          </div>
          <div class="col">
            <!-- card -->
            <div class="card p-6 card-product">
              <div> <!-- img --><img src="../assets/images/stores-logo/stores-logo-8.svg" alt=""
                  class="rounded-circle icon-shape icon-xl"></div>
              <div class="mt-4">
                <!-- content -->
                <h2 class="mb-1 h5"><a href="{{ route('store.single') }}" class="text-inherit">Online Grocery Mart</a></h2>
                <div class="small text-muted"><span class="me-2">Groceries</span><span class="me-2">Bakery</span></div>
                <div class="py-3">
                  <ul class="list-unstyled mb-0 small">
                    <li><span class="text-primary">Delivery by 11:30pm</span>
                    </li>
                    <li>Pickup available</li>
                  </ul>
                </div>
                <div class="row justify-content-center ">
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
            </div>
          </div>
          <div class="col">
            <!-- card -->
            <div class="card p-6 card-product">
              <div> <!-- img --><img src="../assets/images/stores-logo/stores-logo-9.svg" alt=""
                  class="rounded-circle icon-shape icon-xl"></div>
              <div class="mt-4">
                <!-- content -->
                <h2 class="mb-1 h5"><a href="{{ route('store.single') }}" class="text-inherit">Spencers</a></h2>
                <div class="small text-muted"><span class="me-2">Groceries</span> <span class="me-2">Deli</span></div>
                <div class="py-3">
                  <ul class="list-unstyled mb-0 small">
                    <li><span class="text-primary">Delivery by 10:30pm</span>
                    </li>
                    <li>Pickup available</li>
                  </ul>
                </div>
                <div class="row justify-content-center ">
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
            </div>
          </div>
          <div class="col">
            <!-- card -->
            <div class="card p-6 card-product">
              <div> <!-- img --><img src="../assets/images/stores-logo/stores-logo-2.svg" alt=""
                  class="rounded-circle icon-shape icon-xl"></div>
              <div class="mt-4">
                <!-- content -->
                <h2 class="mb-1 h5"><a href="{{ route('store.single') }}" class="text-inherit">DealShare Mart</a></h2>
                <div class="small text-muted"><span class="me-2">Alcohol</span><span class="me-2">Groceries</span></div>
                <div class="py-3">
                  <ul class="list-unstyled mb-0 small">
                    <li>Delivery
                    </li>
                    <li>Pickup available</li>
                  </ul>
                </div>
                <div class="row justify-content-center ">
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
            </div>
          </div>
          <div class="col">
            <!-- card -->
            <div class="card p-6 card-product">
              <div> <!-- img --><img src="../assets/images/stores-logo/stores-logo-3.svg" alt=""
                  class="rounded-circle icon-shape icon-xl"></div>
              <div class="mt-4">
                <!-- content -->
                <h2 class="mb-1 h5"><a href="{{ route('store.single') }}" class="text-inherit">DMart</a></h2>
                <div class="small text-muted"><span class="me-2">Groceries</span><span class="me-2">Bakery</span>
                  <span>Deli</span>
                </div>
                <div class="py-3">
                  <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque, quia!

                  </p>
                </div>
                <div class="row justify-content-center ">
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
            </div>
          </div>
          <div class="col">
            <!-- card -->
            <div class="card p-6 card-product">
              <div> <!-- img --><img src="../assets/images/stores-logo/stores-logo-4.svg" alt=""
                  class="rounded-circle icon-shape icon-xl"></div>
              <div class="mt-4">
                <!-- content -->
                <h2 class="mb-1 h5"><a href="{{ route('store.single') }}" class="text-inherit">Blinkit Store</a></h2>
                <div class="small text-muted"><span class="me-2">Meal Kits</span><span class="me-2">Prepared
                    Meals</span> <span>Organic</span></div>
                <div class="py-3">
                  <ul class="list-unstyled mb-0 small">
                    <li>Delivery
                    </li>
                    <li>Pickup available</li>
                  </ul>
                </div>
                <div class="row justify-content-center ">
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


  </main>



@endsection 