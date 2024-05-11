<x-app-layout>


    <div class="col-sm-12">
        <div class="home-tab">

            <div class="d-sm-flex align-items-center justify-start mb-2 ">
                <h4 class="text-danger">HIV Registered patient</h4>
            </div>


    <div class="d-sm-flex align-items-center justify-content-between border-bottom">
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">All Registered Patient</a>
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
            <btton class="btn btn-primary text-white" type="button" data-toggle="modal" data-target="#exampleModal"><i class="mdi mdi-account-plus"></i> Register</btton>
          </div>
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
                                    Action
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
                                    <a href="{{ route('patient_register.show',$pat_reg->id) }}" class="btn btn-info mdi mdi-eye text-white"></a>

                                    <form action="{{ route('patient_register.destroy',$pat_reg->id) }}" method="POST" class="" type= "button"  onsubmit="return confirm('Delete')">
                                        @csrf
                                        @method('DELETE')

                                                            <button class="btn btn-danger mdi mdi-delete text-white"></button>
                                                        </form>
                                </td>
                            </tr>

                            @endforeach
                            @else
                            <tr>
                                <td class="text-center" colspan="7">HIV Patient not found</td>
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





{{-- modal  --}}


    <div class="modal fade custom-modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="card">
            <div class="modal-header">
              <h4 class="modal-title" id="exampleModalLabel"><code class="h3">HIV Patient Register</code></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <div aria-hidden="true" class="icon icon-box-danger ">
                  <span class="mdi mdi-close text-danger icon-item"></span>
              </div>
              </button>
            </div>
            <div class="modal-body">

                <form class="form-sample" method="post" action="{{ route('patient_register.store') }}" enctype="multipart/form-data">
                    {!!  csrf_field() !!}
                    <p class="card-description">
                        Personal info
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">First Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="first_name" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Last Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="last_name"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Phone number</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="phone_number" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email *Optional</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="patient_email"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Gender</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="gender">
          <option>Male</option>
          <option>Female</option>
        </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Date of Birth</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" placeholder="dd/mm/yyyy" name="birth_date"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Drug Allergies (if any)</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="" name="allergy"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Family HIV exposure?</label>
                                <div class="col-sm-9 flex gap-5">
                                   
                                        <label>
                                            <input type="radio" class="mr-2 text-danger" name="family_exposure" value="Yes">
                                            Yes
                                        </label>
                                        <label>
                                            <input type="radio" class="mr-2 text-danger" name="family_exposure" value="No">
                                            No
                                        </label>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">confirmed HIV at </label>
                                <div class="col-sm-9 flex gap-2">
                                    <input type="text" class="form-control" placeholder="eg, Amana hospital" name="confirmed" />
                                    <input type="number" class="form-control" min="1900" id="year" name="co_year" step="1" placeholder="YYYY">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Do you have partner?</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="partner">
          <option>No</option>                              
          <option>Yes (-ve HIV)</option>
          <option>Yes (+ve HIV) </option>
         
          
                                 </select>
                                </div>
                            </div>
                        </div>
                      
                    </div>

                    <p class="card-description">
                        Address
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Street</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="street" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">District</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="district" />
                                </div>
                            </div>
                        </div>
                    </div>

                <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">City</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="city"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nationality</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="country">
          <option>Tanzanian</option>
          <option>Kenyan</option>
          <option>Ugandan</option>
          <option>Rwandan</option>
          <option>Burundian</option>
          <option>Sudanese</option>
                                 </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p class="card-description">
                        Patient support
                    </p>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Supporter name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="supporter" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Supporter relation</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="relation">
          <option>Mother</option>
          <option>Father</option>
          <option>Sister</option>
          <option>Brother</option>
          <option>Uncle</option>
          <option>Aunt</option>
          <option>Husband</option>
          <option>Wife</option>
          <option>Partner</option>
          <option>Other</option>
                                 </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="sup_address" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Contact</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="sup_contact" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Local leader</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="local_leader" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Local leader Contact</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="local_contact" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end">
                    <button type="submit" class="btn btn-danger">Register</button>
                </div>

                </form>

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
