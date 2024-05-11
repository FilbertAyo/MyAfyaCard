<x-app-layout>


   
    <div class="col-sm-12">
        <div class="home-tab">

            <div class="d-sm-flex align-items-center justify-start mb-2">
                <h4 class="text-danger">HIV patient progress</h4>
            </div>

    <div class="d-sm-flex align-items-center justify-content-between border-bottom">
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#" role="tab" aria-controls="overview" aria-selected="true">All</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#" role="tab" aria-selected="false">Progress <i class="mdi mdi-arrow-top-right text-success"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#" role="tab" aria-selected="false">Progress <i class="mdi mdi-arrow-bottom-left text-danger"></i></a>
          </li>

        </ul>
       
          

          <ul class="dropdown">
            <button class="btn btn-secondary dropdown-toggle toggle-dark btn-lg mb-0 me-0 text-primary" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Overview </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                <h6 class="dropdown-header text-primary">Patients data</h6>
                <a class="dropdown-item" href="#">Total patients : 164 </a>
                <a class="dropdown-item" href="#">Good progress: 85</a>
                <a class="dropdown-item" href="#">Poor progress: 79</a>
                <h6 class="dropdown-header text-primary">Percentage progress</h6>
                <a class="dropdown-item" href="#">  <div>
                    <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                        <p class="text-success">79%</p>
                        <p>85/162</p>
                    </div>
                    <div class="progress progress-md">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 85%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </a>
                
            </div>
        </ul>
        
      </div>

      @if(Session::has('success'))
      <div class="alert alert-success" role="alert">
      {{ Session::get('success') }}
      </div>
        @endif

    <div class="col-lg-12 grid-margin stretch-card mt-3">
        <div class="card">
            <div class="card-body">
            
                <div class="d-sm-flex justify-content-between">
                    <h3 class="card-title">HIV Progress report</h3>
                    <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Search any data " style="width: 30%;">
                </div>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered" id="myTable">
                        <thead>
                            <tr>
                                <th>
                                    No.
                                </th>
                                <th>
                                    Name
                                </th>

                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @if($patient->count()>0)
                            @foreach ($patient as $patient)

                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                   {{$patient->first_name}} {{ $patient->last_name }}
                                </td>
                                <td>
                                    <a href="{{ route('pat_progress.show' , $patient->id) }}" class="btn btn-info text-white">progres</a>
                                </td>
                            </tr>

                            @endforeach
                            @else
                            <tr>
                                <td class="text-center" colspan="3">No Patient is found</td>
                            </tr>
                        @endif


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

        </div>
    </div>





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
</x-app-layout>


