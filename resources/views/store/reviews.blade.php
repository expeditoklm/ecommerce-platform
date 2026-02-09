
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
                <div class="small text-muted">
                  <span>Everyday store prices </span>
                </div>
                <div>
                  <span><small><a href="#!">100% satisfaction guarantee</a></small></span>
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
                <a class="nav-link " aria-current="page" href="{{ route('store') }}"><i
                    class="feather-icon icon-shopping-bag me-2"></i>Shop</a>
              </li>
              <!-- nav item -->
              <li class="nav-item">
                <a class="nav-link" href="{{ route('blog') }}"><i class="feather-icon icon-gift me-2"></i>Blog</a>
              </li>

              <!-- nav item -->
              <li class="nav-item">
                <a class="nav-link active" href="{{ route('store.reviews') }}"><i class="feather-icon icon-star me-2"></i>Reviews</a>
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


            <div class="row mt-8">

                <!-- row -->
                <div class="row">
                <div class="col-md-4">
                    <div class="me-lg-12 mb-6 mb-md-0">
                    <div class="mb-5">
                        <!-- title -->
                        <h4 class="mb-3">Customer reviews</h4>
                        <span>
                        <!-- rating --> <small class="text-warning"> <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i></small><span class="ms-3">4.1 out of 5</span><small class="ms-3">11,130
                            global ratings</small></span>
                    </div>
                    <div class="mb-8">
                        <!-- progress -->
                        <div class="d-flex align-items-center mb-2">
                        <div class="text-nowrap me-3 text-muted"><span class="d-inline-block align-middle text-muted">5</span><i
                            class="bi bi-star-fill ms-1 small text-warning"></i></div>
                        <div class="w-100">
                            <div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 60%;" aria-valuenow="60"
                                aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div><span class="text-muted ms-3">53%</span>
                        </div>
                        <!-- progress -->
                        <div class="d-flex align-items-center mb-2">
                        <div class="text-nowrap me-3 text-muted"><span class="d-inline-block align-middle text-muted">4</span><i
                            class="bi bi-star-fill ms-1 small text-warning"></i></div>
                        <div class="w-100">
                            <div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 50%;" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="50"></div>
                            </div>
                        </div><span class="text-muted ms-3">22%</span>
                        </div>
                        <!-- progress -->
                        <div class="d-flex align-items-center mb-2">
                        <div class="text-nowrap me-3 text-muted"><span class="d-inline-block align-middle text-muted">3</span><i
                            class="bi bi-star-fill ms-1 small text-warning"></i></div>
                        <div class="w-100">
                            <div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 35%;" aria-valuenow="35"
                                aria-valuemin="0" aria-valuemax="35"></div>
                            </div>
                        </div><span class="text-muted ms-3">14%</span>
                        </div>
                        <!-- progress -->
                        <div class="d-flex align-items-center mb-2">
                        <div class="text-nowrap me-3 text-muted"><span class="d-inline-block align-middle text-muted">2</span><i
                            class="bi bi-star-fill ms-1 small text-warning"></i></div>
                        <div class="w-100">
                            <div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 22%;" aria-valuenow="22"
                                aria-valuemin="0" aria-valuemax="22"></div>
                            </div>
                        </div><span class="text-muted ms-3">5%</span>
                        </div>
                        <!-- progress -->
                        <div class="d-flex align-items-center mb-2">
                        <div class="text-nowrap me-3 text-muted"><span class="d-inline-block align-middle text-muted">1</span><i
                            class="bi bi-star-fill ms-1 small text-warning"></i></div>
                        <div class="w-100">
                            <div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 14%;" aria-valuenow="14"
                                aria-valuemin="0" aria-valuemax="14"></div>
                            </div>
                        </div><span class="text-muted ms-3">7%</span>
                        </div>
                    </div>
                    <div class="d-grid">
                        <h4>Review this product</h4>
                        <p class="mb-0">Share your thoughts with other customers.</p>
                        <a href="#" class="btn btn-outline-gray-400 mt-4 text-muted">Write the Review</a>
                    </div>

                    </div>
                </div>
                <!-- col -->
                <div class="col-md-8">
                    <div class="mb-10">
                    <div class="d-flex justify-content-between align-items-center mb-8">
                        <div>
                        <!-- heading -->
                        <h4>Reviews</h4>
                        </div>
                        <div>
                        <select class="form-select">
                            <option selected>Top Review</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        </div>

                    </div>
                    <div class="d-flex border-bottom pb-6 mb-6">
                        <!-- img -->
                        <!-- img --><img src="../assets/images/avatar/avatar-10.jpg" alt="" class="rounded-circle avatar-lg">
                        <div class="ms-5">
                        <h6 class="mb-1">
                            Shankar Subbaraman

                        </h6>
                        <!-- select option -->
                        <!-- content -->
                        <p class="small"> <span class="text-muted">30 December 2022</span>
                            <span class="text-primary ms-3 fw-bold">Echange avec succes</span>
                        </p>
                        <!-- rating -->
                        <div class=" mb-2">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <span class="ms-3 text-dark fw-bold">Need to recheck the weight at delivery point</span>
                        </div>
                        <!-- text-->
                        <p>Product quality is good. But, weight seemed less than 1kg. Since it is being sent in open
                            package, there is a possibility of pilferage in between. FreshCart sends the veggies and
                            fruits through sealed plastic covers and Barcode on the weight etc. .</p>
                        <div>
                            <div class="border icon-shape icon-lg border-2 ">
                            <!-- img --><img src="../assets/images/products/product-img-1.jpg" alt="" class="img-fluid ">
                            </div>
                            <div class="border icon-shape icon-lg border-2 ms-1 ">
                            <!-- img --><img src="../assets/images/products/product-img-2.jpg" alt="" class="img-fluid ">
                            </div>
                            <div class="border icon-shape icon-lg border-2 ms-1 ">
                            <!-- img --><img src="../assets/images/products/product-img-3.jpg" alt="" class="img-fluid ">
                            </div>

                        </div>
                        <!-- icon -->
                        <div class="d-flex justify-content-end mt-4">
                            <a href="#" class="text-muted"><i class="feather-icon icon-thumbs-up me-1"></i>Helpful</a>
                            <a href="#" class="text-muted ms-4"><i class="feather-icon icon-flag me-2"></i>Report
                            abuse</a>
                        </div>
                        </div>
                    </div>
                    <div class="d-flex border-bottom pb-6 mb-6 pt-4">
                        <!-- img --><img src="../assets/images/avatar/avatar-12.jpg" alt="" class="rounded-circle avatar-lg">
                        <div class="ms-5">
                        <h6 class="mb-1">
                            Robert Thomas

                        </h6>
                        <!-- content -->
                        <p class="small"> <span class="text-muted">29 December 2022</span>
                            <span class="text-primary ms-3 fw-bold">Echange avec succe</span>
                        </p>
                        <!-- rating -->
                        <div class=" mb-2">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star text-warning"></i>
                            <span class="ms-3 text-dark fw-bold">Need to recheck the weight at delivery point</span>
                        </div>

                        <p>Product quality is good. But, weight seemed less than 1kg. Since it is being sent in open
                            package, there is a possibility of pilferage in between. FreshCart sends the veggies and
                            fruits through sealed plastic covers and Barcode on the weight etc. .</p>

                        <!-- icon -->
                        <div class="d-flex justify-content-end mt-4">
                            <a href="#" class="text-muted"><i class="feather-icon icon-thumbs-up me-1"></i>Helpful</a>
                            <a href="#" class="text-muted ms-4"><i class="feather-icon icon-flag me-2"></i>Report
                            abuse</a>
                        </div>
                        </div>
                    </div>
                    <div class="d-flex border-bottom pb-6 mb-6 pt-4">
                        <!-- img --><img src="../assets/images/avatar/avatar-9.jpg" alt="" class="rounded-circle avatar-lg">
                        <div class="ms-5">
                        <h6 class="mb-1">
                            Barbara Tay

                        </h6>
                        <!-- content -->
                        <p class="small"> <span class="text-muted">28 December 2022</span>
                            <span class="text-danger ms-3 fw-bold">Echange échoué</span>
                        </p>
                        <!-- rating -->
                        <div class=" mb-2">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star text-warning"></i>
                            <span class="ms-3 text-dark fw-bold">Need to recheck the weight at delivery point</span>
                        </div>

                        <p>Everytime i ordered from fresh i got greenish yellow bananas just like i wanted so go for
                            it , its happens very rare that u get over riped ones.</p>

                        <!-- icon -->
                        <div class="d-flex justify-content-end mt-4">
                            <a href="#" class="text-muted"><i class="feather-icon icon-thumbs-up me-1"></i>Helpful</a>
                            <a href="#" class="text-muted ms-4"><i class="feather-icon icon-flag me-2"></i>Report
                            abuse</a>
                        </div>
                        </div>
                    </div>
                    <div class="d-flex border-bottom pb-6 mb-6 pt-4">
                        <!-- img --><img src="../assets/images/avatar/avatar-8.jpg" alt="" class="rounded-circle avatar-lg">
                        <div class="ms-5 flex-grow-1">
                        <h6 class="mb-1">
                            Sandra Langevin

                        </h6>
                        <!-- content -->
                        <p class="small"> <span class="text-muted">8 December 2022</span>
                            <span class="text-danger ms-3 fw-bold">Echange échoué</span>
                        </p>
                        <!-- rating -->
                        <div class=" mb-2">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star text-warning"></i>
                            <span class="ms-3 text-dark fw-bold">Great product</span>
                        </div>

                        <p>Great product & package. Delivery can be expedited. </p>

                        <!-- icon -->
                        <div class="d-flex justify-content-end mt-4">
                            <a href="#" class="text-muted"><i class="feather-icon icon-thumbs-up me-1"></i>Helpful</a>
                            <a href="#" class="text-muted ms-4"><i class="feather-icon icon-flag me-2"></i>Report
                            abuse</a>
                        </div>
                        </div>
                    </div>
                    <div>
                        <a href="#" class="btn btn-outline-gray-400 text-muted">Read More Reviews</a>
                    </div>
                    </div>
                    <div>
                    <!-- rating -->
                    <h3 class="mb-5">Create Review</h3>
                    <div class="border-bottom py-4 mb-4">
                        <div id="rater"></div>
                    </div>

                    <!-- form control -->
                    <div class="border-bottom py-4 mb-4">
                        <h5>Add a headline</h5>
                        <input type="text" class="form-control" placeholder="What’s most important to know">
                    </div>

                    <div class=" py-4 mb-4">
                        <!-- heading -->
                        <h5>Add a written review</h5>
                        <textarea class="form-control" rows="3"
                        placeholder="What did you like or dislike? What did you use this product for?"></textarea>

                    </div>
                    <!-- button -->
                    <div class="d-flex justify-content-end">
                        <a href="#" class="btn btn-primary">Submit Review</a>
                    </div>
                    </div>
                </div>
                </div>

            </div>
          </div>
        </div>
      </div>
    </section>
  </main>



















@endsection 