@extends('admin/base')
@section('contenue')


    <main class="main-content-wrapper">
      <!-- container -->
      <div class="container">
        <!-- row -->
        <div class="row mb-8">
          <div class="col-md-12">
            <div class="d-md-flex justify-content-between align-items-center">
              <div>
                <!-- page header -->
                <h2>Order Single</h2>

              </div>
              <!-- button -->
              <div>
                <a href="{{ route('admin.order-list') }}" class="btn btn-primary">Back to all orders</a>
              </div>

            </div>
          </div>
        </div>
        <!-- row -->
        <div class="row ">
          <div class="col-xl-12 col-12 mb-5">
            <!-- card -->
            <div class="card h-100 card-lg">
              <div class="card-body p-6">
                <div class="d-md-flex justify-content-between">
                  <div class="d-flex align-items-center mb-2 mb-md-0">
                    <h2 class="mb-0">Order ID: #FC001</h2>
                  </div>
                  <!-- select option -->
                  <div class="d-md-flex">

                    <!-- button -->
                    <div class="ms-md-3">
                      <a href="#" class="btn btn-primary">Save</a>
                      <a href="#" class="btn btn-secondary">Cancel</a>
                    </div>
                  </div>
                </div>
                <div class="mt-8">
                  <div class="row">
                    <!-- address -->
                    <div class="col-lg-4 col-md-4 col-12">
                      <div class="mb-6">
                        <h6>Customer Details</h6>
                        <p class="mb-1 lh-lg">John Alex<br>
                          anderalex@example.com<br>
                          +998 99 22123456</p>
                        <a href="#">View Profile</a>
                      </div>
                    </div>
                    <!-- address -->
                    <div class="col-lg-4 col-md-4 col-12">
                      <div class="mb-6">
                        <h6>Customer Address</h6>
                        <p class="mb-1 lh-lg">Pays<br>
                          Ville<br>
                          Quartier<br>
                        </p>

                      </div>
                    </div>
                    <!-- address -->
                    <div class="col-lg-4 col-md-4 col-12">
                      <div class="mb-6">
                        <h6>Order Details</h6>
                        <p class="mb-1 lh-lg">Order ID: <span class="text-dark">FC001</span><br>
                          Order Date: <span class="text-dark">October 22, 2023</span><br>
                          Montant à complèter: <span class="text-dark">$734.28</span></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <!-- Table -->
                    <table class="table mb-0 text-nowrap table-centered">
                      <!-- Table Head -->
                      <thead class="bg-light">
                        <tr>
                          <th>Products</th>
                          <th></th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <!-- tbody -->
                      <tbody>
                        <tr>
                          <td>
                            <a href="{{ route('shop.single', ['uuid' => "rui"]) }}" class="text-inherit">
                              <div class="d-flex align-items-center">
                                <div>
                                  <img src="../assets/images/products/product-img-1.jpg" alt=""
                                    class="icon-shape icon-lg">
                                </div>
                                <div class="ms-lg-4 mt-2 mt-lg-0">
                                  <h5 class="mb-0 h6">
                                    Haldiram's Sev Bhujia
                                  </h5>

                                </div>
                              </div>
                            </a>
                          </td>
                          <td></td>
                          <td></td>
                          <td></td>

                        </tr>
                        <tr>
                          <td>
                            <a href="{{ route('shop.single', ['uuid' => "rui"]) }}" class="text-inherit">
                              <div class="d-flex align-items-center">
                                <div>
                                  <img src="../assets/images/products/product-img-2.jpg" alt=""
                                    class="icon-shape icon-lg">
                                </div>
                                <div class="ms-lg-4 mt-2 mt-lg-0">
                                  <h5 class="mb-0 h6">
                                    NutriChoice Digestive
                                  </h5>

                                </div>
                              </div>
                            </a>
                          </td>
                          <td></td>
                          <td></td>
                          <td></td>

                        </tr>
                        <tr>
                          <td>
                            <a href="{{ route('shop.single', ['uuid' => "rui"]) }}" class="text-inherit">
                              <div class="d-flex align-items-center">
                                <div>
                                  <img src="../assets/images/products/product-img-3.jpg" alt=""
                                    class="icon-shape icon-lg">
                                </div>
                                <div class="ms-lg-4 mt-2 mt-lg-0">
                                  <h5 class="mb-0 h6">
                                    Cadbury 5 Star Chocolate
                                  </h5>

                                </div>
                              </div>
                            </a>
                          </td>
                          <td></td>
                          <td></td>
                          <td></td>

                        </tr>
                        <tr>
                          <td>
                            <a href="{{ route('shop.single', ['uuid' => "rui"]) }}" class="text-inherit">
                              <div class="d-flex align-items-center">
                                <div>
                                  <img src="../assets/images/products/product-img-4.jpg" alt=""
                                    class="icon-shape icon-lg">
                                </div>
                                <div class="ms-lg-4 mt-2 mt-lg-0">
                                  <h5 class="mb-0 h6">
                                    Onion Flavour Potato
                                  </h5>

                                </div>
                              </div>
                            </a>
                          </td>
                          <td></td>
                          <td></td>
                          <td></td>
        
                        </tr>
                        <tr>
                          <td class="border-bottom-0 pb-0"></td>
                          <td class="border-bottom-0 pb-0"></td>
                          <td colspan="1" class="fw-medium text-dark ">
                            <!-- text -->
                           Monatant à completer :
                          </td>
                          <td class="fw-medium text-dark ">
                            <!-- text -->
                            $80.00
                          </td>
                        </tr>

                        



                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="card-body p-6">
                <div class="row">

                  <div class="col-md-6">
                    <h5>Notes</h5>
                    <p class="form-control mb-3" rows="3">
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae in
                       expedita doloremque ducimus hic excepturi ipsa unde reprehenderit. 
                       Unde quaerat nemo quibusdam consequuntur odit eum eos commodi aliquid 
                       iusto, tempore dolor hic, magni quod deleniti optio harum assumenda co
                       nsectetur! Harum dolorum, voluptatem aut assumenda in obcaecati per,
                        molestiae maiores quas deserunt.
                    </p>

                  </div>
                </div>
              </div>




            </div>

          </div>

        </div>

      </div>

    </main>




@endsection 