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
   
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-space-start">
      

      <div>
          <a class="navbar-brand brand-logo text-danger" href="{{ route('pat_progress.index') }}">
              My Afya Card
          </a>
        
      </div>
     
  </div>

  <div class="navbar-menu-wrapper d-flex align-items-top">

    <ul class="navbar-nav ms-auto">
        <h2 class="welcome-text">Welcome, <span class="text-black fw-bold">{{ $patient->first_name }} {{ $patient->last_name }}</span></h2>
    </ul>
  </div>
 
</nav>


<div class="container-fluid page-body-wrapper">
   
        <div class="content-wrapper">

            <div class="row flex-grow">
                
            <div class="col-md-4 col-lg-4 grid-margin">
                <div class="card bg-danger card-rounded">
                    <div class="card-body pb-0">
                        <h4 class="card-title card-title-dash text-white mb-4">Name : {{ $patient->first_name }} {{ $patient->last_name }}</h4>
                        <div class="row">
                            <div class="col-sm-8">
                                <p class="status-summary-ight-white text-dark mb-1">Registration Number</p>
                                <h2 class="text-info text-white">{{ $patient->card_no }}</h2>
                                <h4 class="mt-3 text-white">{{ $patient->stage }}</h4>
                            </div>
                            
                            <div class="col-sm-4">
                                <div class="status-summary-chart-wrapper pb-2">
                                    <canvas id="status-summary"></canvas>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

<div class="col-12 col-lg-8 col-lg-6 grid-margin stretch-card">
    <div class="card card-rounded">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h4 class="card-title card-title-dash">My profile data</h4>
                @if( $patient->mark === 'good')
                    <p class="mb-0"> <span class="btn btn-success btn-rounded">good progress</span></p>
                @elseif($patient->mark === 'poor')
                    <p class="mb-0"><span class="btn btn-danger btn-rounded">poor progress</span></p> 
                @elseif($patient->mark === 'satisfying')
                <p class="mb-0"><span class="btn btn-info btn-rounded">satisfying</span></p> 
                @else
                <p class="mb-0 text-danger">No records yet</p> 
                {{-- <p class="mb-0"><span class="btn btn-sm btn-info btn-rounded">No records</span></p>  --}}
                @endif
                
            </div>
            <ul class="bullet-line-list">
                <li>
                    <div class="d-flex justify-content-between">
                        <div> Full Name : <span class="text-light-green">{{ $patient->first_name }} {{ $patient->last_name }}</span></div>
                        <p>{{ $patient->gender }}</p>
                    </div>
                </li>
             
                <li>
                    <div class="d-flex justify-content-between">
                        <div> Phone Number : <span class="text-light-green">{{ $patient->phone_number }}</span></div>
                        <p>Address : {{ $patient->street }}, {{ $patient->district }}, {{ $patient->city }}</p>
                    </div>
                </li>
                <li>
                    <div class="d-flex justify-content-between">
                        <div> Date of birth : <span class="text-light-green">{{ $patient->birth_date }}</span></div>
                        <p>{{ $patient->country }}</p>
                    </div>
                </li>
                <li>
                    <div class="d-flex justify-content-between">
                        <div> Family exposure: <span class="text-light-green">{{ $patient->family_exposure }}</span> & Partner status: <span class="text-light-green">{{ $patient->partner }}</span></div>
                        <p>Year: {{ $patient->co_year }}</p>
                    </div>
                </li>
                <li>
                    <div class="d-flex justify-content-between">
                        <div> Supporter: <span class="text-light-green">{{ $patient->supporter }}, {{ $patient->sup_address }}, {{ $patient->sup_contact }}</span> </div>
                        <p>Year: {{ $patient->relation }}</p>
                    </div>
                </li>
                <li>
                    <div class="d-flex justify-content-between">
                        <div> Local leader: <span class="text-light-green">{{ $patient->local_leader }}</span> </div>
                        <p>Year: {{ $patient->local_contact }}</p>
                    </div>
                </li>
                <li>
                    <div class="d-flex justify-content-between">
                        <div> HIV confirmed at <span class="text-light-green">{{ $patient->confirmed }}</span> and reason for visit: {{ $patient->reason }}</div>
                        
                        <p>Year: {{ $patient->co_year }}</p>
                    </div>
                </li>
             

            </ul>
            <div class="list align-items-center pt-3">

            </div>
        </div>
    </div>
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


    </body>
</html>
