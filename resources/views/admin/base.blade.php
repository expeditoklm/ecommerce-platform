<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta content="Codescandy" name="author">

  <link href="{{ asset('assets/libs/dropzone/dist/min/dropzone.min.css') }}" rel="stylesheet">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon/favicon.ico') }}">

  <!-- Libs CSS -->
  <link href="{{ asset('assets/libs/bootstrap-icons/font/bootstrap-icons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/libs/feather-webfont/dist/feather-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/libs/simplebar/dist/simplebar.min.css') }}" rel="stylesheet">

  <!-- Theme CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}">

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'MakeTroc') }} - Admin</title>
</head>

<body>
  <div>
    <nav class="navbar navbar-expand-lg navbar-glass">
      <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center w-100">
          <div class="d-flex align-items-center">
            <a class="text-inherit d-block d-xl-none me-4" data-bs-toggle="offcanvas" href="#offcanvasExample"
              role="button" aria-controls="offcanvasExample">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                class="bi bi-text-indent-right" viewBox="0 0 16 16">
                <path d="M2 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm10.646 2.146a.5.5 0 0 1 .708.708L11.707 8l1.647 1.646a.5.5 0 0 1-.708.708l-2-2a.5.5 0 0 1 0-.708l2-2zM2 6.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
              </svg>
            </a>
          </div>
          <div>
            <ul class="list-unstyled d-flex align-items-center mb-0 ms-5 ms-lg-0">

              <li class="dropdown-center">
                <a class="position-relative btn-icon btn-ghost-secondary btn rounded-circle" href="#" role="button"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-bell fs-5"></i>
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger mt-2 ms-n2">
                    2
                    <span class="visually-hidden">unread messages</span>
                  </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-lg p-0 border-0">
                  <div class="border-bottom p-5 d-flex justify-content-between align-items-center">
                    <div>
                      <h5 class="mb-1">Notifications</h5>
                      <p class="mb-0 small">You have 2 unread messages</p>
                    </div>
                  </div>
                  <div data-simplebar style="height: 250px;">
                    <ul class="list-group list-group-flush notification-list-scroll fs-6">
                      <li class="list-group-item px-5 py-4 list-group-item-action active">
                        <a href="#!" class="text-muted">
                          <div class="d-flex">
                            <img src="{{ asset('assets/images/avatar/avatar-1.jpg') }}" alt=""
                              class="avatar avatar-md rounded-circle">
                            <div class="ms-4">
                              <p class="mb-1">
                                <span class="text-dark">Your order is placed</span> waiting for shipping
                              </p>
                              <span><i class="bi bi-clock text-muted"></i><small class="ms-2">1 minute ago</small></span>
                            </div>
                          </div>
                        </a>
                      </li>
                      <li class="list-group-item px-5 py-4 list-group-item-action">
                        <a href="#!" class="text-muted">
                          <div class="d-flex">
                            <img src="{{ asset('assets/images/avatar/avatar-5.jpg') }}" alt=""
                              class="avatar avatar-md rounded-circle">
                            <div class="ms-4">
                              <p class="mb-1">
                                <span class="text-dark">Jitu Chauhan</span> answered to your pending order
                              </p>
                              <span><i class="bi bi-clock text-muted"></i><small class="ms-2">2 days ago</small></span>
                            </div>
                          </div>
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="border-top px-5 py-4 text-center">
                    <a href="{{ route('account.notification') }}">View All</a>
                  </div>
                </div>
              </li>

              <li class="dropdown ms-4">
                <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="{{ asset('assets/images/avatar/avatar-1.jpg') }}" alt="" class="avatar avatar-md rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end p-0">
                  <div class="lh-1 px-5 py-4 border-bottom">
                    <h5 class="mb-1 h6">{{ Auth::user()->name ?? 'Admin' }}</h5>
                    <small>{{ Auth::user()->email ?? '' }}</small>
                  </div>
                  <ul class="list-unstyled px-2 py-3">
                    <li><a class="dropdown-item" href="{{ route('store') }}">Home</a></li>
                    <li><a class="dropdown-item" href="{{ route('account.profile') }}">Profile</a></li>
                    <li><a class="dropdown-item" href="{{ route('account.settings') }}">Settings</a></li>
                  </ul>
                  <div class="border-top px-5 py-3">
                    <form method="post" action="{{ route('logout') }}">
                      @csrf
                      <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                        Log Out
                      </a>
                    </form>
                  </div>
                </div>
              </li>

            </ul>
          </div>
        </div>
      </div>
    </nav>

    <div class="main-wrapper">

      <!-- Sidebar desktop -->
      <nav class="navbar-vertical-nav d-none d-xl-block">
        <div class="navbar-vertical">
          <div class="px-4 py-5">
            <a href="{{ route('welcome') }}" class="navbar-brand">
              <img src="{{ asset('assets/images/logo/freshcart-logo.svg') }}" alt="">
            </a>
          </div>
          <div class="navbar-vertical-content flex-grow-1" data-simplebar="">
            <ul class="navbar-nav flex-column" id="sideNavbar">

              <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.index') ? 'active' : '' }}" href="{{ route('admin.index') }}">
                  <div class="d-flex align-items-center">
                    <span class="nav-link-icon"><i class="bi bi-house"></i></span>
                    <span class="nav-link-text">Dashboard</span>
                  </div>
                </a>
              </li>

              <li class="nav-item mt-6 mb-3">
                <span class="nav-label">Store Managements</span>
              </li>
<!-- 
              <li class="nav-item">
                <a class="nav-link collapsed" href="#"
                   data-bs-toggle="collapse" data-bs-target="#navArticles"
                   aria-expanded="false" aria-controls="navArticles">
                  <div class="d-flex align-items-center">
                    <span class="nav-link-icon"><i class="bi bi-cart"></i></span>
                    <span class="nav-link-text">My articles</span>
                  </div>
                </a>
                <div id="navArticles" class="collapse" data-bs-parent="#sideNavbar">
                  <ul class="nav flex-column">
                    <li class="nav-item">
                      <a class="nav-link {{ request()->routeIs('admin.products') ? 'active' : '' }}"
                         href="{{ route('admin.products') }}">Products</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{ request()->routeIs('admin.services') ? 'active' : '' }}"
                         href="{{ route('admin.services') }}">Services</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{ request()->routeIs('admin.locations') ? 'active' : '' }}"
                         href="{{ route('admin.locations') }}">Location</a>
                    </li>
                  </ul>
                </div>
              </li> -->

              <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.products') ? 'active' : '' }}" href="{{ route('admin.products') }}">
                  <div class="d-flex align-items-center">
               <span class="nav-link-icon"><i class="bi bi-cart"></i></span>
                    <span class="nav-link-text">My articles</span>
                  </div>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.categories') ? 'active' : '' }}" href="{{ route('admin.categories') }}">
                  <div class="d-flex align-items-center">
                    <span class="nav-link-icon"><i class="bi bi-list-task"></i></span>
                    <span class="nav-link-text">Categories</span>
                  </div>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.order-list') ? 'active' : '' }}" href="{{ route('admin.order-list') }}">
                  <div class="d-flex align-items-center">
                    <span class="nav-link-icon"><i class="bi bi-bag"></i></span>
                    <span class="nav-link-text">Orders</span>
                  </div>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.me-order-list') ? 'active' : '' }}" href="{{ route('admin.me-order-list') }}">
                  <div class="d-flex align-items-center">
                    <span class="nav-link-icon"><i class="bi bi-bag"></i></span>
                    <span class="nav-link-text">My orders</span>
                  </div>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.vendor-grid') ? 'active' : '' }}" href="{{ route('admin.vendor-grid') }}">
                  <div class="d-flex align-items-center">
                    <span class="nav-link-icon"><i class="bi bi-shop"></i></span>
                    <span class="nav-link-text">Mes Boutiques</span>
                  </div>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.customers') ? 'active' : '' }}" href="{{ route('admin.customers') }}">
                  <div class="d-flex align-items-center">
                    <span class="nav-link-icon"><i class="bi bi-people"></i></span>
                    <span class="nav-link-text">Mes Clients</span>
                  </div>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.reviews') ? 'active' : '' }}" href="{{ route('admin.reviews') }}">
                  <div class="d-flex align-items-center">
                    <span class="nav-link-icon"><i class="bi bi-star"></i></span>
                    <span class="nav-link-text">Reviews</span>
                  </div>
                </a>
              </li>

              <li class="nav-item mt-6 mb-3">
                <span class="nav-label">Site Settings</span>
                <span class="badge bg-light-info text-dark-info">Coming Soon</span>
              </li>

              <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('blog') ? 'active' : '' }}" href="{{ route('blog') }}">
                  <div class="d-flex align-items-center">
                    <span class="nav-link-icon"><i class="bi bi-newspaper"></i></span>
                    <span class="nav-link-text">Blog</span>
                  </div>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.blog-setting') ? 'active' : '' }}" href="{{ route('admin.blog-setting') }}">
                  <div class="d-flex align-items-center">
                    <span class="nav-link-icon"><i class="bi bi-gear"></i></span>
                    <span class="nav-link-text">Blog Settings</span>
                  </div>
                </a>
              </li>

              <li class="nav-item mt-6 mb-3">
                <span class="nav-label">Support</span>
                <span class="badge bg-light-info text-dark-info">Coming Soon</span>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#!">
                  <div class="d-flex align-items-center">
                    <span class="nav-link-icon"><i class="bi bi-headphones"></i></span>
                    <span class="nav-link-text">Support Ticket</span>
                  </div>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#">
                  <div class="d-flex align-items-center">
                    <span class="nav-link-icon"><i class="bi bi-question-circle"></i></span>
                    <span class="nav-link-text">Help Center</span>
                  </div>
                </a>
              </li>

              <li class="nav-item mt-6 mb-3">
                <span class="nav-label">Our Apps</span>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#!">
                  <div class="d-flex align-items-center">
                    <span class="nav-link-icon"><i class="bi bi-apple"></i></span>
                    <span class="nav-link-text">Apple Store</span>
                  </div>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#!">
                  <div class="d-flex align-items-center">
                    <span class="nav-link-icon"><i class="bi bi-google-play"></i></span>
                    <span class="nav-link-text">Google Play Store</span>
                  </div>
                </a>
              </li>

            </ul>
          </div>
        </div>
      </nav>

      <!-- Sidebar mobile offcanvas -->
      <nav class="navbar-vertical-nav offcanvas offcanvas-start navbar-offcanvac" tabindex="-1" id="offcanvasExample">
        <div class="navbar-vertical">
          <div class="px-4 py-5 d-flex justify-content-between align-items-center">
            <a href="{{ route('welcome') }}" class="navbar-brand">
              <img src="{{ asset('assets/images/logo/freshcart-logo.svg') }}" alt="">
            </a>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="navbar-vertical-content flex-grow-1" data-simplebar="">
            <ul class="navbar-nav flex-column" id="sideNavbarMobile">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.index') }}">
                  <div class="d-flex align-items-center">
                    <span class="nav-link-icon"><i class="bi bi-house"></i></span>
                    <span class="nav-link-text">Dashboard</span>
                  </div>
                </a>
              </li>
              <li class="nav-item mt-6 mb-3">
                <span class="nav-label">Store Managements</span>
              </li>
              <li class="nav-item">
                <a class="nav-link collapsed" href="#"
                   data-bs-toggle="collapse" data-bs-target="#navArticlesMobile"
                   aria-expanded="false">
                  <div class="d-flex align-items-center">
                    <span class="nav-link-icon"><i class="bi bi-cart"></i></span>
                    <span class="nav-link-text">My articles</span>
                  </div>
                </a>
                <div id="navArticlesMobile" class="collapse">
                  <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.products') }}">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.services') }}">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.locations') }}">Location</a></li>
                  </ul>
                </div>
              </li>
              <li class="nav-item"><a class="nav-link" href="{{ route('admin.categories') }}">
                <div class="d-flex align-items-center">
                  <span class="nav-link-icon"><i class="bi bi-list-task"></i></span>
                  <span class="nav-link-text">Categories</span>
                </div></a>
              </li>
              <li class="nav-item"><a class="nav-link" href="{{ route('admin.order-list') }}">
                <div class="d-flex align-items-center">
                  <span class="nav-link-icon"><i class="bi bi-bag"></i></span>
                  <span class="nav-link-text">Orders</span>
                </div></a>
              </li>
              <li class="nav-item"><a class="nav-link" href="{{ route('admin.reviews') }}">
                <div class="d-flex align-items-center">
                  <span class="nav-link-icon"><i class="bi bi-star"></i></span>
                  <span class="nav-link-text">Reviews</span>
                </div></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      @yield('contenue')

    </div>
  </div>

  <!-- Libs JS -->
  <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }}"></script>

  <!-- Theme JS -->
  <script src="{{ asset('assets/js/theme.min.js') }}"></script>
  <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/js/vendors/chart.js') }}"></script>
  <script src="{{ asset('assets/libs/jquery-countdown/dist/jquery.countdown.min.js') }}"></script>
  <script src="{{ asset('assets/js/vendors/countdown.js') }}"></script>
  <script src="{{ asset('assets/libs/slick-carousel/slick/slick.min.js') }}"></script>
  <script src="{{ asset('assets/js/vendors/slick-slider.js') }}"></script>
  <script src="{{ asset('assets/libs/tiny-slider/dist/min/tiny-slider.js') }}"></script>
  <script src="{{ asset('assets/js/vendors/tns-slider.js') }}"></script>
  <script src="{{ asset('assets/js/vendors/zoom.js') }}"></script>
  <script src="{{ asset('assets/js/vendors/increment-value.js') }}"></script>
  <script src="{{ asset('assets/libs/quill/dist/quill.min.js') }}"></script>
  <script src="{{ asset('assets/js/vendors/editor.js') }}"></script>
  <script src="{{ asset('assets/libs/dropzone/dist/min/dropzone.min.js') }}"></script>

  @yield('scripts')

</body>
</html>