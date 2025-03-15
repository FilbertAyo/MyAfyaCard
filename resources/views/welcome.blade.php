<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MyAfyaCard</title>

           {{-- added  --}}
           <link rel="canonical" href="https://v5.getbootstrap.com/docs/5.0/examples/dashboard/">

           <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
             integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
           <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
             integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
             crossorigin="anonymous"></script>
           <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
             integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
             crossorigin="anonymous"></script>


 <!-- Scripts -->
 @vite(['resources/css/app.css', 'resources/js/app.js'])

 <!-- Fonts -->
 <link rel="preconnect" href="https://fonts.bunny.net">
 <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

 <!-- Styles -->
 <link rel="stylesheet" href="{{ asset('css/style.css') }}">


<!-- plugins:css -->
<link rel="stylesheet" href="{{ asset('vendors/feather/feather.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/typicons/typicons.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/simple-line-icons/css/simple-line-icons.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
<!-- endinject -->
<!-- Plugin css for this page -->
<link rel="stylesheet" href="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('js/select.dataTables.min.css') }}">
<!-- End plugin css for this page -->
<!-- inject:css -->
<link rel="stylesheet" href="{{ asset('css/vertical-layout-light/style.css') }}">
<!-- endinject -->
<link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />

{{-- search  --}}

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    </head>
    <body>
        <div class="container-scroller">

            <nav class="navbar col-lg-12 col-12 p-0  d-flex align-items-top flex-row">
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">

                  <div class="me-3">
                    <a class="navbar-brand brand-logo text-danger" href="{{ url('/') }}">
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
                            <p class="preview-subject ellipsis font-weight-medium text-dark">Patient monitoring registration </p>
                            <p class="fw-light small-text mb-0">Easy register HIV patients for continous health monitoring</p>
                          </div>
                        </a>
                        <a class="dropdown-item preview-item">
                          <div class="preview-item-content flex-grow py-2">
                            <p class="preview-subject ellipsis font-weight-medium text-dark">Patient progress tracking</p>
                            <p class="fw-light small-text mb-0">Hospitals track HIV patient progress without physical cards</p>
                          </div>
                        </a>
                        <a class="dropdown-item preview-item">
                          <div class="preview-item-content flex-grow py-2">
                            <p class="preview-subject ellipsis font-weight-medium text-dark">HIV progress recording</p>
                            <p class="fw-light small-text mb-0">Detailed tracking of HIV progress and treatment metrics</p>
                          </div>
                        </a>
                        <a class="dropdown-item preview-item">
                          <div class="preview-item-content flex-grow py-2">
                            <p class="preview-subject ellipsis font-weight-medium text-dark">Family History access</p>
                            <p class="fw-light small-text mb-0">Access comprehensive family medical history and related data</p>
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
                            href="{{ url('/login') }}"
                                class="btn btn-danger"
                            >
                                Log in
                            </a>
                        @endauth

                @endif

              
                    </li>

                  </ul>
                 
                </div>
              </nav>


              <div class="container flex" >


                <div class="row mt-3">
                  <div class="col-lg-6 grid-margin stretch-card mt-5">


                   <div class="mt-5">
                    <h1 class="mt-5">Adult HIV confidential card </h1>
                    <ul  class="list-ticked">
                        <li>Full heath visibility and transparency</li>
                        <li>Efficiency and private record recalls</li>
                        <li>Unique and confidential information</li>
                       
                    </ul>
                   
                    <div class="mt-4 text-gray-300 btn-s ">

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
                          href="{{ url('/login') }}"
                              class="btn btn-danger"
                          >
                              Log in
                          </a>

                      @endauth

              @endif

              <a
              href="{{ url('/patient/login') }}"
                  class="btn btn-outline-danger ml-3"
              >
                  Patient credentials
              </a>
            
                  </div>
                </div>
                </div>

                  <div class="col-lg-6 grid-margin stretch-card">
                    <img src="/images/ye.png" alt="">
                  </div> 
                 
              </div>


                    </div>



        </div>

       








                         <!-- plugins:js -->
                         <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
                         <!-- endinject -->
                         <!-- Plugin js for this page -->
                         <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
                         <script src="{{ asset('vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
                         <script src="{{ asset('vendors/progressbar.js/progressbar.min.js') }}"></script>
                       
                         <!-- End plugin js for this page -->
                         <!-- inject:js -->
                         <script src="{{ asset('js/off-canvas.js') }}"></script>
                         <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
                         <script src="{{ asset('js/template.js') }}"></script>
                         <script src="{{ asset('js/settings.js') }}"></script>
                         <script src="{{ asset('js/todolist.js') }}"></script>
                         <!-- endinject -->
                         <!-- Custom js for this page-->
                         <script src="{{ asset('js/dashboard.js') }}"></script>
                         <script src="{{ asset('js/Chart.roundedBarCharts.js') }}"></script>
    </body>
</html>
