<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MyAfyaCard</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="css/style.css">

<!-- plugins:css -->
<link rel="stylesheet" href="vendors/feather/feather.css">
<link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
<link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
<link rel="stylesheet" href="vendors/typicons/typicons.css">
<link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
<link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
<!-- endinject -->
<!-- Plugin css for this page -->
<link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
<link rel="stylesheet" href="js/select.dataTables.min.css">
<!-- End plugin css for this page -->
<!-- inject:css -->
<link rel="stylesheet" href="css/vertical-layout-light/style.css">
<!-- endinject -->
<link rel="shortcut icon" href="images/favicon.png" />

    </head>
    <body>
        <div class="container-scroller">

            <nav class="navbar default-layout col-lg-12 col-12 p-0  d-flex align-items-top flex-row">
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">

                  <div class="me-3">
                    <a class="navbar-brand brand-logo" href="index.html">
                      My Afya Card
                    </a>
                    <a class="navbar-brand brand-logo-mini" href="index.html">
                      MAC
                    </a>
                  </div>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-top">

                  <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown d-none d-lg-block">
                      <a class="nav-link dropdown-bordered dropdown-toggle dropdown-toggle-split" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false"> Our services </a>
                      <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">
                        <a class="dropdown-item py-3" >
                          <p class="mb-0 font-weight-medium float-left">services</p>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                          <div class="preview-item-content flex-grow py-2">
                            <p class="preview-subject ellipsis font-weight-medium text-dark">Bootstrap Bundle </p>
                            <p class="fw-light small-text mb-0">This is a Bundle featuring 16 unique dashboards</p>
                          </div>
                        </a>
                        <a class="dropdown-item preview-item">
                          <div class="preview-item-content flex-grow py-2">
                            <p class="preview-subject ellipsis font-weight-medium text-dark">Angular Bundle</p>
                            <p class="fw-light small-text mb-0">Everything you’ll ever need for your Angular projects</p>
                          </div>
                        </a>
                        <a class="dropdown-item preview-item">
                          <div class="preview-item-content flex-grow py-2">
                            <p class="preview-subject ellipsis font-weight-medium text-dark">VUE Bundle</p>
                            <p class="fw-light small-text mb-0">Bundle of 6 Premium Vue Admin Dashboard</p>
                          </div>
                        </a>
                        <a class="dropdown-item preview-item">
                          <div class="preview-item-content flex-grow py-2">
                            <p class="preview-subject ellipsis font-weight-medium text-dark">React Bundle</p>
                            <p class="fw-light small-text mb-0">Bundle of 8 Premium React Admin Dashboard</p>
                          </div>
                        </a>
                      </div>
                    </li>

                  </ul>
                  <ul>
                    <li>
                        {{-- <a href="" class="btn btn-danger">Login</a> --}}
                        @if (Route::has('login'))

                        @auth
                            <a
                                href="{{ url('/dashboard') }}"
                                class="btn btn-danger"
                            >
                                Log in
                            </a>
                        @else
                            <a
                                href="{{ route('login') }}"
                                class="btn btn-danger"
                            >
                                Log in
                            </a>


                        @endauth

                @endif
                    </li>

                  </ul>
                  <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                  </button>
                </div>
              </nav>


              <div class="container flex" >


                <div class="left-content col-lg-6" style="margin-top: 10%;">
                    <h1>Easy track of an HIV patient</h1>
                    <ul  class="list-ticked">
                        <li>Lorem ipsum dolor sit amet</li>
                        <li>Lorem ipsum dolor sit amet</li>
                        <li>Lorem ipsum dolor sit amet</li>
                    </ul>


                    <div class="mt-4 text-gray-300 btn-s">

                        @if (Route::has('login'))

                        @auth
                            <a
                                href="{{ url('/dashboard') }}"
                                class="btn btn-danger"
                            >
                                Log in
                            </a>
                        @else
                            <a
                                href="{{ route('login') }}"
                                class="btn btn-danger"
                            >
                                Log in
                            </a>


                        @endauth

                @endif

                    </div>
                </div>


                          <div class="right-content" col-lg-6>
                            <img src="/images/ye.png" alt="">
                        </div>

                    </div>



        </div>










                    <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="vendors/progressbar.js/progressbar.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
    </body>
</html>
