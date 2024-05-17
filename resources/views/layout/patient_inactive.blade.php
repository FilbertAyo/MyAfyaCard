<x-app-layout>


    <div class="col-sm-12">
        <div class="home-tab">

            <div class="d-sm-flex align-items-center justify-start mb-2 mt-3">
                <h4 class="text-danger">HIV Registered patient</h4>
           
            </div>


    <div class="d-sm-flex align-items-center justify-content-between border-bottom">
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link ps-0" href="{{ route('patient_register.index') }}">All Registered Patient</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/patient_active') }}">Active Patient</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ url('/patient_inactive') }}">Inactive Patient</a>
          </li>

          {{-- <li class="nav-item">
            <a class="nav-link" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">All Registered Patient</a>
          </li> --}}

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
                    <h3 class="card-title">HIV Registered Patients</h3>
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
                                    Phone number
                                </th>
                                <th>
                                    Gender
                                </th>
                                <th>
                                    Age
                                </th>
                                <th>
                                    Address
                                </th>

                                <th>
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @if($patient_register->count()>0)
                            @foreach ($patient_register as $pat_reg)

                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                   {{$pat_reg->first_name}} {{ $pat_reg->last_name }}
                                </td>
                                <td>
                                  {{ $pat_reg->phone_number }}
                                </td>
                                <td>
                                    {{ $pat_reg->gender }}
                                </td>
                                <td>

                                @php

                              $birthdate = $pat_reg->birth_date ;
                                $age = null;
                                if($birthdate){
                                    $age = \Carbon\Carbon::parse($birthdate)->age;
                                }
                                @endphp

                                    {{ $age }}
                                </td>

                                <td>
                                    {{ $pat_reg->street }}, {{ $pat_reg->district }}, {{ $pat_reg->city }}
                                </td>

                                <td class="flex">
                                    @if(!$pat_reg->trashed())
                        
                                    <a href="{{ route('patient_register.show',$pat_reg->id) }}" class="btn btn-info mdi mdi-eye text-white"> active</a>

                                @else
                                    <span class="btn btn-danger text-white">inactive</span>
                                @endif
                                </td>
                            </tr>

                            @endforeach
                            @else
                            <tr>
                                <td class="text-center" colspan="7">No inactive patient found</td>
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










    <style>
        .custom-modal .modal-dialog{
            max-width: 900px;
        }
    </style>


</x-app-layout>
