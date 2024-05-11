<x-app-layout>

    <div class="col-sm-12">
        <div class="home-tab">

            <di class="d-sm-flex align-items-center justify-content-between border-bottom">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Patient details</a>
                  </li>
                  {{-- <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab" aria-selected="false">Progress</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#demographics" role="tab" aria-selected="false">Progress</a>
                  </li> --}}
        
                </ul>
                
                  <div class="btn-wrapper">
                    <a href="{{ route('patient_register.index') }}" class="btn btn-primary text-white"><i class="mdi mdi-arrow-left"></i> Back</a>
                  </div>
                
              </div>

              <div class="row mt-3">

              <div class="col-md-6 col-lg-6 grid-margin stretch-card">
                <div class="card card-rounded">
                    <div class="card-body card-rounded">
                
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h4 class="card-title card-title-dash">Patient details</h4>
                            {{-- <p class="mb-0"><i class="mdi mdi-timer text-primary"></i>{{ $patient_register->co_year }}</p> --}}
                        </div>
                        <div class="list align-items-center border-bottom py-2">
                            <div class="wrapper w-100">
                                <p class="mb-2 font-weight-medium">
                                    Patient Name:
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-account text-muted me-1"></i>
                                        <p class="mb-0 text-small text-muted">{{ $patient_register->first_name }} {{ $patient_register->last_name }}</p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-account text-muted me-1"></i>
                                        <p class="mb-0 text-small text-muted">Family exposure: {{ $patient_register->family_exposure }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list align-items-center border-bottom py-2">
                            <div class="wrapper w-100">
                                <p class="mb-2 font-weight-medium">
                                   Testing confirmation
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-account text-muted me-1"></i>
                                        <p class="mb-0 text-small text-muted">HIV confirmed by {{ $patient_register->confirmed }} in {{ $patient_register->co_year }}</p>
                                    </div>
                                   
                        
                                </div>
                            </div>
                        </div>
                        <div class="list align-items-center border-bottom py-2">
                            <div class="wrapper w-100">
                                <p class="mb-2 font-weight-medium">
                                    Birth details:
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-calendar text-muted me-1"></i>
                                        <p class="mb-0 text-small text-muted">born in {{ $patient_register->birth_date }}</p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-account text-muted me-1"></i>
                                        <p class="mb-0 text-small text-muted">Allergy of : {{ $patient_register->allergy }} </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list align-items-center border-bottom py-2">
                            <div class="wrapper w-100">
                                <p class="mb-2 font-weight-medium">
                                    Gender:
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-account-multiple-outline text-muted me-1"></i>
                                        <p class="mb-0 text-small text-muted">{{ $patient_register->gender }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list align-items-center border-bottom py-2">
                            <div class="wrapper w-100">
                                <p class="mb-2 font-weight-medium">
                                   Location:
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-map-marker text-muted me-1"></i>
                                        <p class="mb-0 text-small text-muted">{{ $patient_register->street }}, {{ $patient_register->district }}, {{ $patient_register->city }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list align-items-center border-bottom py-2">
                            <div class="wrapper w-100">
                                <p class="mb-2 font-weight-medium">
                                    Nationality
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-nature text-muted me-1"></i>
                                        <p class="mb-0 text-small text-muted">{{ $patient_register->country }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list align-items-center border-bottom py-2">
                            <div class="wrapper w-100">
                                <p class="mb-2 font-weight-medium">
                                    Taken care by <strong class="text-danger">{{ $patient_register->relation }}</strong>
                                </p> 
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-nature text-muted me-1"></i>
                                        <p class="mb-0 text-small text-muted">{{ $patient_register->supporter }}, {{ $patient_register->sup_address }}, {{ $patient_register->sup_contact }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list align-items-center border-bottom py-2">
                            <div class="wrapper w-100">
                                <p class="mb-2 font-weight-medium">
                                  Partner status
                                </p> 
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-nature text-muted me-1"></i>
                                        <p class="mb-0 text-small text-muted">{{ $patient_register->partner }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list align-items-center border-bottom py-2">
                            <div class="wrapper w-100">
                                <p class="mb-2 font-weight-medium">
                                   Local leader information
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-nature text-muted me-1"></i>
                                        <p class="mb-0 text-small text-muted">{{ $patient_register->local_leader }}, {{ $patient_register->local_contact }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 grid-margin stretch-card">
                <div class="card card-rounded">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h4 class="card-title card-title-dash">Health facility sessions</h4>
                            <p class="mb-0"><i class="mdi mdi-timer text-primary"></i></p>
                        </div>
                        <ul class="bullet-line-list">
                            <li>
                                <div class="d-flex justify-content-between">
                                    <div><span class="text-danger">{{ $patient_register->first_name }} {{ $patient_register->last_name }}'s</span> profile created on </div>                 
                                    <p class="btn btn-inverse-warning">{{ $patient_register->created_at }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex justify-content-between">
                                    <div><span class="text-danger">{{ $patient_register->first_name }} {{ $patient_register->last_name }}'s</span> profile updated on </div>
                                    <p class="btn btn-inverse-warning">{{ $patient_register->updated_at }}</p>
                                </div>
                            </li>

                            @foreach ($user as $user)
                            <li>
                                <div class="d-flex justify-content-between">
                                    <div><span class="text-light-green">{{ $user->name }}</span> visited this profile at</div>
                                    <p class="btn btn-inverse-info">{{ $currentTime->toDateTimeString() }}</p>
                                </div>
                            </li>
                                        @endforeach
                           

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

</x-app-layout>