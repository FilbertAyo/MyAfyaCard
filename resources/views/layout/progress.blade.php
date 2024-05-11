<x-app-layout>

    <div class="col-sm-12">
        <div class="home-tab">

    <div class="d-sm-flex align-items-center justify-content-between border-bottom">
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item inline">
            <a class="nav-link active ps-0" id="home-tab" href="{{ route('pat_progress.index') }}" role="tab"  ><i class="mdi mdi-arrow-left"></i>Back</a>
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
                <h4 class="card-title">Patient progress</h4>
                <p class="card-description">
                    Metrics<code>table</code>
                    
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

                            @if($metrics->count()>0)
                            @foreach ($metrics as $metric)

                            <tr>
                                <td>{{ $metric->cd }}</td>
                                <td>{{ $metric->viral_load }}</td>
                                <td>{{ $metric->ratio }}</td>
                                <td> {{ $metric->weight }}</td>                              
                                <td>{{ $metric->medicine }}</td>
                                <td>{{ $metric->dosage }}</td>
                                <td>{{ $metric->other_med }}</td>
                                <td><label class="badge badge-danger">{{ $metric->visit_date }}<i class="ti-arrow-down"></i></label></td>
                            </tr>

                            @endforeach
                            @else
                            <tr>
                                <td class="text-center" colspan="8">No Patient record found</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">cd4 patient graph presentation</h4>
                    <canvas id="cdChart"></canvas>
                </div>
            </div>
        </div>
    </div>

<div class="row mt-3">
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">CD4/CD8 Ratio</h4>
                <canvas id="areaChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Weight of the patient</h4>
                <canvas id="barChart"></canvas>
            </div>
        </div>
    </div> 
   
</div>
{{-- <div class="row">
   

     {{-- <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Area chart</h4>
                <canvas id="areaChart"></canvas>
            </div>
        </div>
    </div> --}}

    {{-- <div class="col-lg-6 grid-margin grid-margin-lg-0 stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Pie chart</h4>
                <canvas id="pieChart"></canvas>
            </div>
        </div>
    </div>
</div>  --}}

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

            <form class="form-sample" method="POST" action="{{ route('pat_progress.store') }}" enctype="multipart/form-data">
                {!!  csrf_field() !!}

                <input type="hidden" name="patient_id" value="{{ $patient->id }}">
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
  <!-- End custom js for this page-->

  <script>

    var weightData = JSON.parse('{!! json_encode($data) !!}')
    var dates = weightData.map(data=>data.x);

    var data = {
    labels: dates,
    datasets: [{
        label: 'weight',
        data: weightData,
        backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1,
        fill: false
    },
    // {
    //     label: 'weight',
    //     data: [23,42,2,5],
    //     backgroundColor: [
    //         'rgba(255, 99, 132, 0.2)',
    //         'rgba(54, 162, 235, 0.2)',
    //         'rgba(255, 206, 86, 0.2)',
    //         'rgba(75, 192, 192, 0.2)',
    //         'rgba(153, 102, 255, 0.2)',
    //         'rgba(255, 159, 64, 0.2)'
    //     ],
    //     borderColor: [
    //         'rgba(255,99,132,1)',
    //         'rgba(54, 162, 235, 1)',
    //         'rgba(255, 206, 86, 1)',
    //         'rgba(75, 192, 192, 1)',
    //         'rgba(153, 102, 255, 1)',
    //         'rgba(255, 159, 64, 1)'
    //     ],
    //     borderWidth: 1,
    //     fill: false  
    // }
]
};

var options = {
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    },
    legend: {
        display: false
    },
    elements: {
        point: {
            radius: 0
        }
    }

};




if ($("#barChart").length) {
    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas, {
        type: 'bar',
        data: data,
        options: options
    });
}

  </script>



<script>

    var cd = JSON.parse('{!! json_encode($cdData) !!}')
    var dates = cd.map(data=>data.x);

    var data = {
    labels: dates,
    datasets: [{
        label: 'cd4',
        data: cd,
        borderColor: [
            'rgba(255,99,132,1)',
            'rgba(255,99,132,1)',
            'rgba(255,99,132,1)',
            'rgba(255,99,132,1)',
            'rgba(255,99,132,1)',
            'rgba(255,99,132,1)',
           
        ],
        borderWidth: 3,
        fill: false
    }
]
};

var options = {
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    },
    legend: {
        display: false
    }

};


if ($("#cdChart").length) {
    var lineChartCanvas = $("#cdChart").get(0).getContext("2d");
    var lineChart = new Chart(lineChartCanvas, {
        type: 'line',
        data: data,
        options: options
    });
}



  </script>

  <script>

var ratio = JSON.parse('{!! json_encode($ratio) !!}')
    var dates = ratio.map(data=>data.x);

var areaData = {
    labels: dates,
    datasets: [{
        label: 'ratio',
        data: ratio,
        backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1,
        fill: true, // 3: no fill
    }]
};

var areaOptions = {
    plugins: {
        filler: {
            propagate: true
        }
    }
}




if ($("#areaChart").length) {
    var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
    var areaChart = new Chart(areaChartCanvas, {
        type: 'line',
        data: areaData,
        options: areaOptions
    });
}
  </script>


</x-app-layout>