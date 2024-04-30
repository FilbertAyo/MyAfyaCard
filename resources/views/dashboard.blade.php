<x-app-layout>


   
    <div class="col-sm-12">
        <div class="home-tab">

    <div class="d-sm-flex align-items-center justify-content-between border-bottom">
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">All</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab" aria-selected="false">Progress <i class="mdi mdi-arrow-top-right text-success"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#demographics" role="tab" aria-selected="false">Progress <i class="mdi mdi-arrow-bottom-left text-danger"></i></a>
          </li>

        </ul>
       
          <div class="btn-wrapper">
            <h4 class="text-danger">Patient progress report</h4>
          </div>
        
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
                                    <a href="{{ route('dashboard.show' , $patient->id) }}" class="btn btn-info text-white">progres</a>
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


