@extends('layouts.app')

@section('content')


<div class="content-header">
    <div class="container-fluid">
        @if (in_array(Auth::user()->role,Constant::WIDGET_BOX))
            <div class="row">
                @foreach ($widget_box as $widgets)
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon {{$widgets['itemBg']}} elevation-1"><i class="fas {{$widgets['itemIcon']}}"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">{{$widgets['itemDesc']}}</span>
                                <span class="info-box-number"> {{$widgets['itemCount']}} </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="row">
            @if (in_array(Auth::user()->role,Constant::WIDGET_CHART_REGISTRASI))
            <div class="col-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Statistik Registrasi Pasien</h3>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                        <canvas id="statistikChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if (in_array(Auth::user()->role,Constant::WIDGET_DIAGNOSIS))
            <div class="col-4">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">TOP 5 DIAGNOSIS</h3>
                    </div>
                    <div class="card-body p-0">
                        <ul class="products-list product-list-in-card pr-2">
                            @foreach ($topDiagnosis as $diagnosis)
                            <li class="item">
                                <div class="product-info ml-2">
                                    <a href="javascript:void(0)" class="product-title">
                                        {{$diagnosis->nama}}
                                        <span class="badge badge-warning float-right">{{$diagnosis->counter}}</span>
                                    </a>
                                    <span class="product-description">
                                        {{$diagnosis->deskripsi}}
                                    </span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="card-footer text-center">
                        <a href="{{url('master/data-diagnosa')}}" class="uppercase">View All Diagnosis</a>
                    </div>
                </div>
            </div>
            @endif
        </div>

    </div>
</div>
<!-- ChartJS -->
<script src="{{ url('AdminLTE-3.1.0/plugins/Chart.min.js') }}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.11.2/af-2.3.7/b-2.0.0/b-colvis-2.0.0/b-html5-2.0.0/b-print-2.0.0/cr-1.5.4/date-1.1.1/fc-3.3.3/fh-3.1.9/kt-2.6.4/r-2.2.9/rg-1.1.3/rr-1.2.8/sc-2.0.5/sb-1.2.1/sp-1.4.0/sl-1.3.3/datatables.min.js"></script>

<script type="text/javascript">
  $(function () {

    var table = $('#yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('home/get_data') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'username', name: 'username'},
            {data: 'phone', name: 'phone'},
            {data: 'dob', name: 'dob'},
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },
        ]
    });

    var mode = 'index'
    var intersect = true
    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#statistikChart').get(0).getContext('2d')

    var areaChartData = {
      labels  : <?=json_encode($chartPengunjung['chartLabel']);?>,
      datasets: [
        {
          label: 'PASIEN BPJS',
          data: <?=json_encode($chartPengunjungBpjs['chartCounterVisitorBpjs']);?>,
          type: 'line',
          backgroundColor: 'rgb(40,167,69,1)',
          borderColor: '#28A745',
          pointBorderColor: '#28A745',
          pointBackgroundColor: '#28A745',
          pointHoverBackgroundColor: '#28A745',
          pointHoverBorderColor    : '#28A745'
        },
        {
          label: 'PASIEN UMUM',
          data: <?=json_encode($chartPengunjungUmum['chartCounterVisitorUmum']);?>,
          type: 'line',
          backgroundColor: 'rgb(9,127,255,1)',
          borderColor: '#007bff',
          pointBorderColor: '#007bff',
          pointBackgroundColor: '#007bff',
          pointHoverBackgroundColor: '#007bff',
          pointHoverBorderColor    : '#007bff'
        },
        {
          label: 'SEMUA PASIEN',
          data: <?=json_encode($chartPengunjung['chartCounterVisitor']);?>,
          type: 'line',
          backgroundColor: 'rgba(210, 214, 222, 1)',
          borderColor: '#ced4da',
          pointBorderColor: '#ced4da',
          pointBackgroundColor: '#ced4da',
          pointHoverBackgroundColor: '#ced4da',
          pointHoverBorderColor    : '#ced4da'
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      tooltips: {
        mode: mode,
        intersect: intersect
      },
      hover: {
        mode: mode,
        intersect: intersect
      },
      legend: {
        display: true
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })

  });
</script>

@endsection
