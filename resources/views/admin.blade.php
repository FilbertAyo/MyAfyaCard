<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

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

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

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
  <!------ Include the above in your HEAD tag ---------->
  

    </head>
    <body>
        <div class="container-scroller">
           

          
<nav class="navbar default-layout col-lg-12 col-12 p-0  fixed-top d-flex align-items-top flex-row border-bottom">
   
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
      
      <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
      </div>

      <div>
          <a class="navbar-brand brand-logo text-danger" href="{{ route('pat_progress.index') }}">
              My Afya Card
          </a>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
      </div>
  </div>

  <div class="navbar-menu-wrapper d-flex align-items-top">

      <ul class="navbar-nav ms-auto">

          <x-dropdown align="right" width="48">
              <x-slot name="trigger">
          <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
              <div>{{ Auth::user()->name }}</div>
              <div class="ms-1">
                  <i class="mdi mdi-chevron-down text-danger"></i>
              </div>
          </button>
              </x-slot>


          <x-slot name="content">
              <x-dropdown-link class="text-center border-bottom">
                  <p class="mb-1 mt-3 font-weight-semibold">  {{ Auth::user()->name }}</p>
                  <p class="fw-light text-muted mb-0">  {{ Auth::user()->email }}</p>
              </x-dropdown-link>
              <x-dropdown-link :href="route('profile.edit')" class="border-bottom flex gap-3">
                <span class="mdi mdi-account text-primary"></span> <span> Profile </span>
              </x-dropdown-link>

              <!-- Authentication -->
              <form method="POST" action="{{ route('logout') }}">
                  @csrf

                  <x-dropdown-link :href="route('logout')"
                  class="flex gap-3"
                          onclick="event.preventDefault();
                                      this.closest('form').submit();">
                      {{-- {{ __('Log Out') }} --}}
                      <span class="mdi mdi-logout text-danger"></span> <span> Log out </span>
                  </x-dropdown-link>
              </form>
          </x-slot>
          </x-dropdown>

      </ul>
   
     
  </div>
</nav>


            <div class="container-fluid page-body-wrapper">

                <nav class="sidebar sidebar-offcanvas" id="sidebar">
  
                    <ul class="nav">
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.index') }}">
                          <i class="mdi mdi-chart-areaspline menu-icon"></i>
                          <span class="menu-title">Hospitals</span>
                        </a>
                      </li>
            
                    
            
                    </ul>
                  </nav>
            

            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="theme-setting-wrapper">
                        <div id="settings-trigger"><i class="ti-settings"></i></div>
                        <div id="theme-settings" class="settings-panel">
                          <i class="settings-close ti-close"></i>
                          <p class="settings-heading">SIDEBAR SKINS</p>
                          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border me-3"></div>Light</div>
                          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border me-3"></div>Dark</div>

                        </div>
                      </div>


                      <div class="col-sm-12">
                        <div class="home-tab">
                
                
                    <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                        <ul class="nav nav-tabs" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">All hospital</a>
                          </li>
                          {{-- <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab" aria-selected="false">Progress</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#demographics" role="tab" aria-selected="false">Progress</a>
                          </li> --}}
                
                        </ul>
                        <div>
                          <div class="btn-wrapper">
                            <btton class="btn btn-primary text-white" type="button" data-toggle="modal" data-target="#exampleModal"> Register hospital</btton>
                          </div>
                        </div>
                      </div>

                      @if(Session::has('success'))
                      <div class="alert alert-success" role="alert">
                      {{ Session::get('success') }}
                      </div>
                        @endif

                      <div class="row flex-grow mt-3">

                        @if($user->count()>0)
                        @foreach ($user as $user)


                        <div class="col-6 grid-margin stretch-card">
                            <div class="card card-rounded">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <div>
                                                    <h4 class="card-title card-title-dash">{{ $user->name }}</h4>
                                                </div>
                                                <div>
     
                                                  @if($user->userType === '0')
                                             
                                                  <form action="{{ route('admin.destroy',$user->id) }}" method="POST" type= "button" class=" height-auto p-0" onsubmit="return confirm('Delete')">
                                                    @csrf
                                                    @method('DELETE')
                
                                                                        <button class="mdi mdi-delete text-danger"></button>
                                                                    </form>

                                              @else

                                              <div><h4 class="card-title card-title-dash text-danger">Admin</h4></div>
                                             
                                              @endif

                                           
                    
                                              
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <div class="wrapper d-flex align-items-center justify-content-between py-2 ">
                                                    <div class="d-flex">
                                                       
                                                        <div class="wrapper ms-3">
                                                            <p class="ms-1 mb-1 fw-bold">Email: {{ $user->email }} </p>
                                                            <small class="text-muted mb-0">Location: {{ $user->location }}</small>
                                                        </div>
                                                    </div>
                                                    <div class="text-muted text-small">
                                                        registered at: {{ $user->created_at }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        @endforeach
                        @else
                      
                        <div class="col-12 grid-margin stretch-card">
                          <div class="card card-rounded">
                              <div class="card-body">
                                  <div class="row">
                                      <div class="col-lg-12">
                                          <div class="d-flex justify-content-between align-items-center mb-3">
                                              <div>
                                                  <h4 class="card-title card-title-dash">No hospital found</h4>
                                              </div>
                                          </div>
                                       
                                      </div>
                                  </div>
                                  
                              </div>
                          </div>
                      </div>
                    @endif



                    </div>

                        </div>
                      </div>
                </div>
            </div>

            </div>
        </div>


        {{-- model  --}}

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="card">
                <div class="modal-header">
                  <h5 class="modal-title text-danger" id="exampleModalLabel">Sign in</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <div aria-hidden="true" class="icon icon-box-danger ">
                      <span class="mdi mdi-close-box text-danger"></span>
                  </div>
                  </button>
                </div>
                <div class="modal-body">
              

 
  <form method="POST" action="{{ route('reg.store') }}" enctype="multipart/form-data">
     {!!  csrf_field() !!}

    <!-- Name -->
    <div>
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <!-- Email Address -->
    <div class="mt-4">
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div class="mt-4">
      <x-input-label for="location" :value="__('Location')" />
      <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" :value="old('location')" required autofocus autocomplete="location" />
      <x-input-error :messages="$errors->get('location')" class="mt-2" />
  </div>

  <div class="mt-4" style="display: none;">
    <x-input-label for="userType" :value="__('userType')" />
    <x-text-input id="userType" class="block mt-1 w-full" type="text" name="userType" value="0" required autofocus autocomplete="userType" />
   
</div>

    <!-- Password -->
    <div class="mt-4">
        <x-input-label for="password" :value="__('Password')" />

        <x-text-input id="password" class="block mt-1 w-full"
                        type="password"
                        name="password"
                        value="12345678"
                        required autocomplete="new-password" />

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Confirm Password -->
    <div class="mt-4">
        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                        type="password"
                        value="12345678"
                        name="password_confirmation" required autocomplete="new-password" />

        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
            {{ __('Already registered?') }}
        </a>

        <x-primary-button class="ms-4">
            {{ __('Register') }}
        </x-primary-button>
    </div>
</form>
     

                </div>

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
  <!-- this below for the charts-->
{{-- 
  <script src="{{ asset('chart/line_chart.js') }}"></script>
  <script src="{{ asset('chart/pie.js') }}"></script>
  <script src="{{ asset('chart/area.js') }}"></script> --}}

  <script>
    $(document).ready(function () {
        $("#myInput").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

    </body>
</html>
