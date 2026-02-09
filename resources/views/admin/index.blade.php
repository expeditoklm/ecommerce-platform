@extends('admin/base')
@section('contenue')


      <main class="main-content-wrapper">
        <section class="container">
          <!-- row -->
          <div class="row mb-8">
            <div class="col-md-12">
              <!-- card -->
              <div class="card bg-light border-0 rounded-4"
                style="background-image: url(../assets/images/slider/slider-image-1.jpg); background-repeat: no-repeat; background-size: cover; background-position: right;">
                <div class="card-body p-lg-12">
                  <h1>Welcome back! FreshCart
                  </h1>
                  <p>FreshCart is simple & clean design for developer and
                    designer.</p>
                  <a href="#" class="btn btn-primary">
                    Create Product
                  </a>
                </div>
              </div>
            </div>
          </div>
          <!-- table -->

          <div class="row">
            <div class="col-lg-4 col-12 mb-6">
              <!-- card -->
              <div class="card h-100 card-lg">
                <!-- card body -->
                <div class="card-body p-6">
                  <!-- heading -->
                  <div class="d-flex justify-content-between align-items-center mb-6">
                    <div>
                      <h4 class="mb-0 fs-5">Products</h4>
                    </div>
                    <div class="icon-shape icon-md bg-light-danger text-dark-danger rounded-circle">
                      <i class="bi bi-currency-dollar fs-5"></i>
                    </div>
                  </div>
                  <!-- project number -->
                  <div class="lh-1">
                    <h1 class=" mb-2 fw-bold fs-2">25</h1>
                    <span><span class="text-dark me-1">15</span>commandes en produit</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-12 mb-6">
              <!-- card -->
              <div class="card h-100 card-lg">
                <!-- card body -->
                <div class="card-body p-6">
                  <!-- heading -->
                  <div class="d-flex justify-content-between align-items-center mb-6">
                    <div>
                      <h4 class="mb-0 fs-5">Services</h4>
                    </div>
                    <div class="icon-shape icon-md bg-light-warning text-dark-warning rounded-circle">
                      <i class="bi bi-cart fs-5"></i>
                    </div>
                  </div>
                  <!-- project number -->
                  <div class="lh-1">
                    <h1 class=" mb-2 fw-bold fs-2">42</h1>
                    <span><span class="text-dark me-1">35</span>commandes en service</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-12 mb-6">
              <!-- card -->
              <div class="card h-100 card-lg">
                <!-- card body -->
                <div class="card-body p-6">
                  <!-- heading -->
                  <div class="d-flex justify-content-between align-items-center mb-6">
                    <div>
                      <h4 class="mb-0 fs-5">Location</h4>
                    </div>
                    <div class="icon-shape icon-md bg-light-info text-dark-info rounded-circle">
                      <i class="bi bi-people fs-5"></i>
                    </div>
                  </div>
                  <!-- project number -->
                  <div class="lh-1">
                    <h1 class=" mb-2 fw-bold fs-2">39</h1>
                    <span><span class="text-dark me-1">30</span>commandes en location</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- row -->
         

          <div class="row ">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 mb-6">
              <div class="card h-100 card-lg">
                <!-- heading -->
                <div class="p-6">
                  <h3 class="mb-0 fs-5">Recent Order</h3>
                </div>
                <div class="card-body p-0">
                  <!-- table -->
                  <div class="table-responsive">
                    <table class="table table-centered table-borderless text-nowrap table-hover">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col">Order Number</th>
                          <th scope="col">Article Name</th>
                          <th scope="col">Order Date</th>
                          <th scope="col">Type</th>
                          <th scope="col">Status</th>

                        </tr>
                      </thead>
                      <tbody>
                        <tr>

                          <td>#FC0005</td>
                          <td>Haldiram's Sev Bhujia</td>
                          <td>28 March 2023</td>
                          <td>$18.00</td>
                          <td>
                            <span class="badge bg-light-primary text-dark-primary">Shipped</span>
                          </td>
                        </tr>
                        <tr>

                          <td>#FC0004</td>
                          <td>NutriChoice Digestive</td>
                          <td>24 March 2023</td>
                          <td>$24.00</td>
                          <td>
                            <span class="badge bg-light-warning text-dark-warning">Pending</span>
                          </td>
                        </tr>
                        <tr>

                          <td>#FC0003</td>
                          <td>Onion Flavour Potato</td>
                          <td>8 Feb 2023</td>
                          <td>$9.00</td>
                          <td>
                            <span class="badge bg-light-danger text-dark-danger">Cancel</span>
                          </td>
                        </tr>
                        <tr>

                          <td>#FC0002</td>
                          <td>Blueberry Greek Yogurt</td>
                          <td>20 Jan 2023</td>
                          <td>$12.00</td>
                          <td>
                            <span class="badge bg-light-warning text-dark-warning">Pending</span>
                          </td>
                        </tr>
                        <tr>

                          <td>#FC0001</td>
                          <td>Slurrp Millet Chocolate</td>
                          <td>14 Jan 2023</td>
                          <td>$8.00</td>
                          <td>
                            <span class="badge bg-light-info text-dark-info">Processing</span>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>


@endsection 