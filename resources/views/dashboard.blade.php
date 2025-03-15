<x-app-layout>


   
    <div class="col-sm-12">
        <div class="home-tab">

            <div class="d-sm-flex align-items-center justify-start mb-2 mt-3">
                <h4 class="text-danger">HIV patient progress</h4>
            </div>

    <div class="d-sm-flex align-items-center justify-content-between border-bottom">
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('pat_progress.index') }}">All</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="{{ url('good_progress') }}">Progress <i class="mdi mdi-arrow-top-right text-success"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('low_progress') }}">Progress <i class="mdi mdi-arrow-bottom-left text-danger"></i></a>
          </li>

        </ul>
       
          

          <ul class="dropdown">
            <button class="btn btn-secondary dropdown-toggle toggle-dark btn-lg mb-0 me-0 text-primary" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Overview </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                <h6 class="dropdown-header text-primary">Patients data</h6>
                <a class="dropdown-item" href="#">Total registered patients : {{ session('activePatient',0) + session('inactivePatient',0) }}  </a>
                <a class="dropdown-item text-success" href="#">Active patients : {{ session('activePatient',0) }} </a>
                <a class="dropdown-item text-danger" href="#">Inactive patients : {{ session('inactivePatient',0) }} </a>
                <h6 class="dropdown-header text-primary">Progress data</h6>
                <a class="dropdown-item text-success" href="#">Good progress: {{ session('goodPatient',0) }} </a>
            
                <a class="dropdown-item" href="#">Average progress: {{ session('averagePatient',0) }} </a>
                <a class="dropdown-item text-danger" href="#">Poor progress: {{ session('poorPatient',0) }} </a>
              
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
                                   Reg No.
                                </th>
                               
                                <th>
                                    Gender
                                </th>
                                <th>
                                    HIV(first visit)
                                </th>
                                <th>
                                    Status (due to last visit)
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
                                    {{$patient->card_no}} 
                                 </td>
                                 <td>
                                    {{$patient->gender}} 
                                 </td>
                                 <td>
                                    {{$patient->stage}} 
                                 </td>
                                <td>
                           
                                     
                                    @if($patient->mark === 'poor')
                                
                                        <i class="badge mdi mdi-arrow-down badge-danger text-danger">poor</i>
                                @elseif($patient->mark === 'good')
                       
                                    <i class="badge mdi mdi-arrow-up badge-success text-success">good</i>
                                @elseif($patient->mark === 'satisfying')
    
                                <i class="badge mdi mdi-swap-vertical badge-warning text-warning">satsfying</i>

                                @else

                                <i class="text-primary"> no records </i>

                                @endif

                                 </td>
                                <td>
                                    <a href="{{ route('pat_progress.show' , $patient->id) }}" class="btn btn-primary text-white">progres</a>
                                </td>
                            </tr>

                            @endforeach
                            @else
                            <tr>
                                <td class="text-center" colspan="7">No Patient record is found</td>
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


