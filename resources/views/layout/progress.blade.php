<x-app-layout>

    <div class="col-sm-12">
        <div class="home-tab">

    <div class="d-sm-flex align-items-center justify-content-between border-bottom">
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Progress</a>
          </li>
         
        </ul>

        <ul>
            
                <h4 class="text-danger">{{ $patient->first_name }} {{ $patient->last_name }}</h4>
    
        </ul>

        <div class="btn-wrapper">
            <btton class="btn btn-primary text-white" type="button" data-toggle="modal" data-target="#exampleModal"><i class="mdi mdi-plus"></i> metrics</btton>
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
                <h4 class="card-title">Patient metrics</h4>
                <p class="card-description">
                    Progress <code>table</code>
                </p>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>CD4</th>
                                <th>Viral load</th>
                                <th>Ratio</th>
                                <th>Weight</th>
                                <th>Medicine</th>
                                <th>Dosage</th>
                                <th>Other medicine</th>
                                <th>Next Visit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($metrics as $metric)

                            <tr>
                                <td>{{ $metric->cd }}</td>
                                <td>Photoshop</td>
                                <td>Photoshop</td>
                                <td class="text-danger"> 28.76% <i class="ti-arrow-down"></i></td>                              
                                <td>Jacob</td>
                                <td>Photoshop</td>
                                <td>Jacob</td>
                                <td><label class="badge badge-danger">Pending</label></td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<div class="row mt-3">
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Line chart</h4>
                <canvas id="lineChart"></canvas>
            </div>
        </div>
    </div>

    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Area chart</h4>
                <canvas id="areaChart"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Bar chart</h4>
                <canvas id="barChart"></canvas>
            </div>
        </div>
    </div>

    <div class="col-lg-6 grid-margin grid-margin-lg-0 stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Pie chart</h4>
                <canvas id="pieChart"></canvas>
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
          <h4 class="modal-title" id="exampleModalLabel"><code class="h4">Patient progress form</code></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <div aria-hidden="true" class="icon icon-box-danger ">
              <span class="mdi mdi-close text-danger icon-item"></span>
          </div>
          </button>
        </div>
        <div class="modal-body">

            <form class="form-sample" method="POST" action="{{ route('dashboard.store') }}" enctype="multipart/form-data">
                {!!  csrf_field() !!}
                <p class="card-description">
                    Patient info per visit
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">CD4</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="cd" placeholder="cells per cubic millimeter"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Viral Load</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="viral_load" placeholder="copies per millimeter"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">CD4/CD8 ratio</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="ratio" placeholder="" /> 
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Weight</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="weight" placeholder="kg"/>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Medicine</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="medicine">
      <option>Antiretroviral(ARV)</option>
      <option>dolutegravir</option>
      <option>bictegravir</option>
    
                             </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Dossage</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="dosage"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Other medicine taken *if any</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="other_med" placeholder="eg Chloroquine." /> 
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Next visit</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="visit_date" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end">
                <button type="submit" class="btn btn-danger">Add</button>
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