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
                                <th>Current status</th>
                                <th>Other med</th>
                                <th>prognosis</th>
                                <th>Next Visit</th>
                                <th>Attended info</th>
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
                                <td>{{ $metric->enrolment }}</td>
                                <td>{{ $metric->other_med }}</td>
                                <td>
                                    
                                    @if($metric->prognosis === 'dropping')
                                    <i class="mdi mdi-arrow-down text-danger"> dropping
                                @elseif($metric->prognosis === 'good')
                                <i class="mdi mdi-arrow-up text-success"> good
                                @else
                                <i class="mdi mdi-swap-vertical text-warning"> average
                                @endif

                                </td>
                                   
                                <td><label class="badge badge-primary">{{ $metric->visit_date }}</label></td>
                                <td>
                                 
                                      <div class="btn-group dropup">
                                      
                                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split text-white" id="dropupMenuSplitButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ti-user"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropupMenuSplitButton1">
                                      
                                          <a class="dropdown-item" href="#">Doctor name:<strong class="text-primary">{{ $metric->doctor }}</strong>  </a>
                                          <div class="dropdown-divider"></div>
                                          <a class="dropdown-item" href="#">Contact No: <strong class="text-primary">{{ $metric->doctor_contact }}</strong> </a>
                                        </div>
                                      </div>
                                </td>
                            </tr>
                        

                            @endforeach
                            @else
                            <tr>
                                <td class="text-center" colspan="11">No Patient record found</td>
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
                                <input type="text" class="form-control" name="cd" placeholder="cells per cubic millimeter"  value="{{ old('cd') }}" required/>
                                @if ($errors->has('cd'))
                                <span class="text-danger text-sm" style="font-size: 10px;">the value is invalid</span>
                            @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Viral Load</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="viral_load" placeholder="copies per millimeter" value="{{ old('viral_load') }}" required/>
                                @if ($errors->has('viral_load'))
                                <span class="text-danger text-sm" style="font-size: 10px;">the value is invalid</span>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">CD4/CD8 ratio</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="ratio" placeholder=""  value="{{ old('ratio') }}" required/> 
                                @if ($errors->has('ratio'))
                                <span class="text-danger text-sm" style="font-size: 10px;">the ratio should be less than 1</span>
                            @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Weight</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="weight" placeholder="kg"  value="{{ old('weight') }}" required/>
                                @if ($errors->has('weight'))
                                <span class="text-danger text-sm" style="font-size: 10px;">the weight is invalid</span>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            <div class="row">
                    <div class="col-md-6">

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">status enrolment</label>
                            
                                <div class="col-sm-9">
                                    <select class="form-control" name="enrolment"  value="{{ old('enrolment') }}">
          <option>Pregnant</option>
          <option>sick with no TB illness</option>
          <option>TB treatment</option>
          <option>Chronic illness</option>
          <option>None</option>
        
                                 </select>
                              
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                    
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Medicine</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="medicine"  value="{{ old('medicine') }}">
      <option>Antiretroviral(ARV)</option>
      <option>dolutegravir</option>
      <option>bictegravir</option>
    
                             </select>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">


                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Dosage</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="dosage"  value="{{ old('dosage') }}" required/>
                            </div>
                        </div>
                    </div>
                
                   
                       {{-- prognosis  --}}
                                <input type="hidden" class="form-control" name="prognosis" value="mark" />
                          
                   
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Other medicine taken *if any</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="other_med" placeholder="eg Chloroquine."  value="{{ old('other_med') }}"/> 
                                @if ($errors->has('other_med'))
                                <span class="text-danger text-sm" style="font-size: 10px;">the field you provide is invalid</span>
                            @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Next visit</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="visit_date" required  value="{{ old('visit_date') }}"/>
                                @if ($errors->has('visit_date'))
                                <span class="text-danger text-sm" style="font-size: 10px;">the schedule is not valid</span>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>

                <p class="card-description">
                   Doctor / health professional information
                </p>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Attended by (name)</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="doctor" placeholder="eg DR. somebody."  value="{{ old('doctor') }}" required/> 
                                @if ($errors->has('doctor'))
                                <span class="text-danger text-sm" style="font-size: 10px;">name is invalid,remove special character</span>
                            @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">contact</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="doctor_contact"  value="{{ old('doctor_contact') }}" required/>
                                @if ($errors->has('doctor_contact'))
                                <span class="text-danger text-sm" style="font-size: 10px;">the contact is invalid</span>
                            @endif
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




  <script>
    @if ($errors->any())
        $(document).ready(function() {
            $('#exampleModal').modal('show');
        });
    @endif
</script>


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
  {{-- <script src="{{ asset('js/template.js') }}"></script> --}}
  <script src="{{ asset('js/settings.js') }}"></script>
  <script src="{{ asset('js/todolist.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('js/dashboard.js') }}"></script>
  <script src="{{ asset('js/Chart.roundedBarCharts.js') }}"></script>
  <!-- End custom js for this page-->



  <script>
      'use strict';
    $(function() {
        var body = $('body');
        var contentWrapper = $('.content-wrapper');
        var scroller = $('.container-scroller');
        var footer = $('.footer');
        var sidebar = $('.sidebar');

        function addActiveClass(element) {
            if (current === "") {
                //for root url
                if (element.attr('href').indexOf("index.html") !== -1) {
                    element.parents('.nav-item').last().addClass('active');
                    if (element.parents('.sub-menu').length) {
                        element.closest('.collapse').addClass('show');
                        element.addClass('active');
                    }
                }
            } else {
                //for other url
                if (element.attr('href').indexOf(current) !== -1) {
                    element.parents('.nav-item').last().addClass('active');
                    if (element.parents('.sub-menu').length) {
                        element.closest('.collapse').addClass('show');
                        element.addClass('active');
                    }
                    if (element.parents('.submenu-item').length) {
                        element.addClass('active');
                    }
                }
            }
        }

        var current = location.pathname.split("/").slice(-1)[0].replace(/^\/|\/$/g, '');
        $('.nav li a', sidebar).each(function() {
            var $this = $(this);
            addActiveClass($this);
        })

        $('.horizontal-menu .nav li a').each(function() {
            var $this = $(this);
            addActiveClass($this);
        })

        //Close other submenu in sidebar on opening any

        sidebar.on('show.bs.collapse', '.collapse', function() {
            sidebar.find('.collapse.show').collapse('hide');
        });


        //Change sidebar and content-wrapper height
        applyStyles();

        function applyStyles() {
            //Applying perfect scrollbar
            if (!body.hasClass("rtl")) {
                if ($('.settings-panel .tab-content .tab-pane.scroll-wrapper').length) {
                    const settingsPanelScroll = new PerfectScrollbar('.settings-panel .tab-content .tab-pane.scroll-wrapper');
                }
                if ($('.chats').length) {
                    const chatsScroll = new PerfectScrollbar('.chats');
                }
                if (body.hasClass("sidebar-fixed")) {
                    if ($('#sidebar').length) {
                        var fixedSidebarScroll = new PerfectScrollbar('#sidebar .nav');
                    }
                }
            }
        }

        $('[data-bs-toggle="minimize"]').on("click", function() {
            if ((body.hasClass('sidebar-toggle-display')) || (body.hasClass('sidebar-absolute'))) {
                body.toggleClass('sidebar-hidden');
            } else {
                body.toggleClass('sidebar-icon-only');
            }
        });

        //checkbox and radios
        $(".form-check label,.form-radio label").append('<i class="input-helper"></i>');

        //Horizontal menu in mobile
        $('[data-toggle="horizontal-menu-toggle"]').on("click", function() {
            $(".horizontal-menu .bottom-navbar").toggleClass("header-toggled");
        });
        // Horizontal menu navigation in mobile menu on click
        var navItemClicked = $('.horizontal-menu .page-navigation >.nav-item');
        navItemClicked.on("click", function(event) {
            if (window.matchMedia('(max-width: 991px)').matches) {
                if (!($(this).hasClass('show-submenu'))) {
                    navItemClicked.removeClass('show-submenu');
                }
                $(this).toggleClass('show-submenu');
            }
        })

        $(window).scroll(function() {
            if (window.matchMedia('(min-width: 992px)').matches) {
                var header = $('.horizontal-menu');
                if ($(window).scrollTop() >= 70) {
                    $(header).addClass('fixed-on-scroll');
                } else {
                    $(header).removeClass('fixed-on-scroll');
                }
            }
        });
    });

    // focus input when clicking on search icon
    $('#navbar-search-icon').click(function() {
        $("#navbar-search-input").focus();
    });

  </script>

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

</x-app-layout>