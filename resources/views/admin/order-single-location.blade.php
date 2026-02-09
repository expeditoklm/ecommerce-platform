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
                        <h6>Shipping Address</h6>
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
                          Order Total: <span class="text-dark">$734.28</span></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">

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