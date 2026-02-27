
@extends('base')
@section('content')


<main>
    <!-- section -->
    <section>
      <div class="container">
        <!-- row -->
        <div class="row">
          <!-- col -->
          <div class="col-12">
            <div class="d-flex justify-content-between align-items-center d-md-none py-4">
              <!-- heading -->
              <h3 class="fs-5 mb-0">Account Setting</h3>
              <!-- button -->
              <button class="btn btn-outline-gray-400 text-muted d-md-none btn-icon btn-sm ms-3 " type="button"
                data-bs-toggle="offcanvas" data-bs-target="#offcanvasAccount" aria-controls="offcanvasAccount">
                <i class="bi bi-text-indent-left fs-3"></i>
              </button>
            </div>
          </div>
          <!-- col -->
          <div class="col-lg-3 col-md-4 col-12 border-end  d-none d-md-block">
            <div class="pt-10 pe-lg-10">
              <!-- nav -->
              <ul class="nav flex-column nav-pills nav-pills-dark">
                <!-- nav item -->
                <li class="nav-item">
                  <a class="nav-link " aria-current="page" href="{{ route('account.profile') }}"><i
                      class="feather-icon icon-shopping-bag me-2"></i>Profile</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " aria-current="page" href="{{ route('account.orders') }}"><i
                      class="feather-icon icon-shopping-bag me-2"></i>Your Orders</a>
                </li>
                <!-- nav item -->
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('account.settings') }}"><i
                      class="feather-icon icon-settings me-2"></i>Settings</a>
                </li>
                <!-- nav item -->
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('account.address') }}"><i
                      class="feather-icon icon-map-pin me-2"></i>Address</a>
                </li>

                <!-- nav item -->
                <li class="nav-item">
                  <a class="nav-link active" href="{{ route('account.notification') }}"><i
                      class="feather-icon icon-bell me-2"></i>Notification</a>
                </li>
                <!-- nav item -->
                <li class="nav-item">
                  <hr>
                </li>
                <!-- nav item -->
                <li class="nav-item">
                  <a class="nav-link " href="../index-2.html"><i class="feather-icon icon-log-out me-2"></i>Log out</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-9 col-md-8 col-12">
            <div class="py-6 p-md-6 p-lg-10">
              <!-- heading -->
              <h2 class="mb-6">Notification</h2>

              <div class="table-responsive-xxl border-0">
                <!-- Table -->
                <table class="table mb-0 text-nowrap table-centered ">
                  <!-- Table Head -->
                  <thead class="bg-light">
                    <tr>
                     
                      <th>Who?</th>
                      <th></th>

                      <th>What?</th>
                      <th></th>

                      <th>When?</th>
                      <th></th>

                     

                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Table body -->
                    <tr>
                   
                      <td class="align-middle border-top-0">
                        <a href="{{ route('shop.single', ['uuid' => "rui"]) }}" class="fw-semi-bold text-inherit">
                          <h6 class="mb-0">Haldiram's Nagpur Aloo Bhujia</h6>
                        </a>
                        <span><small class="text-muted">Catégorie</small></span>
                      </td>

                      <td></td>
                      <td class="align-middle border-top-0">
                        <a href="{{ route('shop.single', ['uuid' => "rui"]) }}" class="text-inherit">#14899</a>
                      </td>

                      <td></td>

                      <td class="align-middle border-top-0">
                        March 5, 2023
                      </td>
                 
                      <td></td>
                      <td></td>
                    
                    </tr>

                    <tr>
                   
                      <td class="align-middle border-top-0">
                        <a href="{{ route('shop.single', ['uuid' => "rui"]) }}" class="fw-semi-bold text-inherit">
                          <h6 class="mb-0">Haldiram's Nagpur Aloo Bhujia</h6>
                        </a>
                        <span><small class="text-muted">Catégorie</small></span>
                      </td>

                      <td></td>
                      <td class="align-middle border-top-0">
                        <a href="{{ route('shop.single', ['uuid' => "rui"]) }}" class="text-inherit">#14899</a>
                      </td>

                      <td></td>

                      <td class="align-middle border-top-0">
                        March 5, 2023
                      </td>
                 
                      <td></td>
                      <td></td>
                    
                    </tr>

                    <tr>
                   
                      <td class="align-middle border-top-0">
                        <a href="{{ route('shop.single', ['uuid' => "rui"]) }}" class="fw-semi-bold text-inherit">
                          <h6 class="mb-0">Haldiram's Nagpur Aloo Bhujia</h6>
                        </a>
                        <span><small class="text-muted">Catégorie</small></span>
                      </td>

                      <td></td>
                      <td class="align-middle border-top-0">
                        <a href="{{ route('shop.single', ['uuid' => "rui"]) }}" class="text-inherit">#14899</a>
                      </td>

                      <td></td>

                      <td class="align-middle border-top-0">
                        March 5, 2023
                      </td>
                 
                      <td></td>
                      <td></td>
                    
                    </tr>

                    <tr>
                   
                      <td class="align-middle border-top-0">
                        <a href="{{ route('shop.single', ['uuid' => "rui"]) }}" class="fw-semi-bold text-inherit">
                          <h6 class="mb-0">Haldiram's Nagpur Aloo Bhujia</h6>
                        </a>
                        <span><small class="text-muted">Catégorie</small></span>
                      </td>

                      <td></td>
                      <td class="align-middle border-top-0">
                        <a href="{{ route('shop.single', ['uuid' => "rui"]) }}" class="text-inherit">#14899</a>
                      </td>

                      <td></td>

                      <td class="align-middle border-top-0">
                        March 5, 2023
                      </td>
                 
                      <td></td>
                      <td></td>
                    
                    </tr>

                    <tr>
                   
                      <td class="align-middle border-top-0">
                        <a href="{{ route('shop.single', ['uuid' => "rui"]) }}" class="fw-semi-bold text-inherit">
                          <h6 class="mb-0">Haldiram's Nagpur Aloo Bhujia</h6>
                        </a>
                        <span><small class="text-muted">Catégorie</small></span>
                      </td>

                      <td></td>
                      <td class="align-middle border-top-0">
                        <p  class="text-inherit">
                          Lorem ipsum dolor sit amet consectetur adipderit inventore.
                        </p>
                      </td>

                      <td></td>

                      <td class="align-middle border-top-0">
                        March 5, 2023
                      </td>
                 
                      <td></td>
                      <td></td>
                    
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