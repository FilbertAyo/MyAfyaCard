<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Star Admin2 </title>
    <!-- plugins:css -->
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
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="text-center mb-4">
                                <h3><strong style="color:  #ff6666;">Patient login</strong></h3>
                        
                            </div>
                            {{-- <h4>Hello! See your progress</h4> --}}
                            <h6 class="fw-normal">Sign in to see your progress.</h6>
                            @if(Session::has('fail'))
                            <div class="alert alert-danger" role="alert">
                            {{ Session::get('fail') }}
                            </div>
                              @endif
                            <form method="POST" action="{{ route('patient.login') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control form-control-lg" id="phone_number" name="phone_number" :value="old('phone_number')" placeholder="phone number" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="card_no"  name="card_no" placeholder="Registration number" required> 
                                </div>
                               

                                <button type="submit" class="btn btn-block btn-danger mt-3">Login</button>


                                {{-- <div class="text-center mt-4 fw-light">
                                     <a href="register.html" class="text-primary">Don't have an account?</a>
                                </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../js/off-canvas.js"></script>
    <script src="../../js/hoverable-collapse.js"></script>
    <script src="../../js/template.js"></script>
    <script src="../../js/settings.js"></script>
    <script src="../../js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>