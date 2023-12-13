@extends('layouts.app')

@section('title', 'Admin Dashboard')

@push('style')
    <link href="{{ asset('assets/libs/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <style>
        #overflow_canvas {
            overflow: auto;
            white-space: nowrap;
        }

        /* width */
        #overflow_canvas::-webkit-scrollbar {
            width: 5px;
            height: 7px;
        }

        /* Track */
        #overflow_canvas::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey;
            border-radius: 10px;
        }

        /* Handle */
        #overflow_canvas::-webkit-scrollbar-thumb {
            background: red;
            border-radius: 10px;
        }

        /* Handle on hover */
        #overflow_canvas::-webkit-scrollbar-thumb:hover {
            background: #b30000;
        }

        /* css charts bar user diagram */
        canvas {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }

        .container-canvas {
            width: 150%;
            background-color: #ffffff;
        }

        /* charts bar user diagram */

        /* charts dounat  */
        .radial p {
            margin: 0;
            position: absolute;
            font-size: 10px;
            color: #000000;
            top: 43%;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .radia-bar-container {
            display: flex;
            justify-content: center;
            position: relative;
        }

        /* charts dounat  */

        .color-count {
            width: 100px;
            height: 7em;
        }

        .donut {
            width: 20px;
            height: 20px;
            /* border: 5px solid #f06; */
            border-radius: 50%;
            background-color: white;
            display: inline-block;
            margin-right: 5px;
        }
    </style>
@endpush

@section('main')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                {{-- <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Good Morning Jason!</h3> --}}
                <div class="align-items-center">
                    <h4>Selamat Datang {{ $user->fullname }}</h4>
                    <p>Dashboard admin</p>
                </div>
            </div>
            <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <select
                        class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius">
                        <option selected>Aug 19</option>
                        <option value="1">July 19</option>
                        <option value="2">Jun 19</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- *************************************************************** -->
        <!-- Start First Cards -->
        <!-- *************************************************************** -->
        <div class="card-group">
            <div class="card border-right mr-3">
                <div class="card-body" style="background: linear-gradient(to bottom, #00cc99 0%, #339966 100%);">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h2 class="mb-1 font-weight-medium text-white">{{ $userCount }}</h2>
                                {{-- <span
                                    class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none">+18.33%</span> --}}
                            </div>
                            <h6 class="font-weight-normal mb-0 w-100 text-truncate text-white">Data Pengguna</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="text-white opacity-7">
                                <i data-feather="users" class="color-count"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right mr-3">
                <div class="card-body" style="background: linear-gradient(to bottom, #3366cc 0%, #006699 100%);">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-white mb-1 w-100 text-truncate font-weight-medium">{{ $userPremiumCount }}
                            </h2>
                            <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Pengguna Premium
                            </h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="text-white opacity-7">
                                <i data-feather="users" class="color-count"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right mr-3">
                <div class="card-body" style="background: linear-gradient(to bottom, #993399 0%, #660066 100%);">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h2 class="text-white mb-1 font-weight-medium">{{ $permenperinCount }}</h2>
                                {{-- <span
                                    class="badge bg-danger font-12 text-white font-weight-medium badge-pill ml-2 d-md-none d-lg-block">-18.33%</span> --}}
                            </div>
                            <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Kategori Regulasi</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="text-white opacity-7">
                                <i data-feather="file-plus" class="color-count"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body" style="background: linear-gradient(to bottom, #cc6600 0%, #996600 100%);">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-white mb-1 font-weight-medium">{{ $computations->count() }}</h2>
                            <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">File Perhitungan</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="text-white opacity-7">
                                <i data-feather="trello" class="color-count"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- *************************************************************** -->
        <!-- End First Cards -->
        <!-- *************************************************************** -->
        <!-- *************************************************************** -->
        <!-- Start Sales Charts Section -->
        <!-- *************************************************************** -->
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div class="card" style="height: 450px">
                    <div class="card-body">
                        <h4 class="card-title">Pemilihan Permenperin</h4>
                        <div class="radial">
                            <p>Total 4231</p>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div>
                                    <span class="donut" style="border: 5px solid #1991EB;"></span>
                                    <span>Permenperin 1</span>
                                </div>
                                <div>
                                    <span class="donut" style="border: 5px solid #FF5733;"></span>
                                    <span>Permenperin 2</span>
                                </div>
                                <div>
                                    <span class="donut" style="border: 5px solid #FF0000;"></span>
                                    <span>Permenperin 3</span>
                                </div>
                            </div>
                            <div class="col-4">
                                <div>36.4 %</div>
                                <div>32.7 %</div>
                                <div>21.8 %</div>
                            </div>
                        </div>
                        {{-- <div id="campaign-v2" class="mt-2" style="height:283px; width:100%;"></div>
                        <ul class="list-style-none mb-0">
                            <li>
                                <i class="fas fa-circle text-primary font-10 mr-2"></i>
                                <span class="text-muted">Permenperin 1</span>
                                <span class="text-dark float-right font-weight-medium">36.4 %</span>
                            </li>
                            <li class="mt-3">
                                <i class="fas fa-circle text-danger font-10 mr-2"></i>
                                <span class="text-muted">Permenperin 2</span>
                                <span class="text-dark float-right font-weight-medium">32.7 %</span>
                            </li>
                            <li class="mt-3">
                                <i class="fas fa-circle text-cyan font-10 mr-2"></i>
                                <span class="text-muted">Permenperin 3</span>
                                <span class="text-dark float-right font-weight-medium">21.8 %</span>
                            </li>
                        </ul> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card" style="height: 450px">
                    <div class="card-header bg-transparent">
                        <div class="form-group pb-4">
                            <select class="form-control" style="width:130px; float:right">
                                <option value="">Oct 2023</option>
                            </select>
                        </div>
                        <h4 class="card-title">Grafik Pengguna</h4>
                        <div class="float-left" style="display: flex; justify-content: space-between; align-items: center;">
                            <span class="donut" style="border: 5px solid #FF0000;"></span>
                            <span>Premium</span>
                        </div>
                        <div class="float-right"
                            style="display: flex; justify-content: space-between; align-items: center;">
                            <span class="donut" style="border: 5px solid #1991EB;"></span>
                            <span>Regular</span>
                        </div>
                    </div>
                    <div class="card-body" id="overflow_canvas">
                        <div class="container-canvas">
                            <canvas id="canvas"></canvas>
                        </div>
                        {{-- <div class="net-income position-relative" style="height:294px;"></div>
                        <ul class="list-inline text-center mt-5 mb-2">
                            <li class="list-inline-item text-muted font-italic"></li>
                        </ul> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card" style="height: 450px">
                    <div class="card-body">
                        <h4 class="card-title">Pengguna Aktif</h4>
                        <h6>Last 6 Months</h6>
                        <canvas id="marksChart" width="600" height="600"></canvas>
                        {{-- <div class="net-income2 mt-4 position-relative" style="height:294px;"></div>
                        <ul class="list-inline text-center mt-5 mb-2">
                            <li class="list-inline-item text-muted font-italic"></li>
                        </ul> --}}
                    </div>
                </div>
            </div>

        </div>
        <!-- *************************************************************** -->
        <!-- End Sales Charts Section -->
        <!-- *************************************************************** -->
        <!-- *************************************************************** -->
        <!-- Start Location and Earnings Charts Section -->
        <!-- *************************************************************** -->
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start">
                            <h4 class="card-title mb-0">File perhitungan pengguna</h4>
                        </div>
                        <div class="pl-4 mb-5">
                            <div class="position-relative">
                                <!-- basic table -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="table-responsive"style="overflow-y:scroll; height:400px;">
                                                    <table id="zero_config"
                                                        class="table table-striped table-bordered no-wrap">
                                                        <thead>
                                                            <tr align="center" style=" position:sticky; top: 0;">
                                                                <th>No</th>
                                                                <th>Pengguna</th>
                                                                <th>File</th>
                                                                <th>Aksi</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $i = 1;
                                                            @endphp
                                                            @forelse ($computations as $computation)
                                                                <tr>
                                                                    <td align="center">{{ $i++ }}</td>
                                                                    <td>{{ $computation->user->user_profile->fullname }}
                                                                    </td>
                                                                    <td align="center"> <i data-feather="file"></i> <i
                                                                            data-feather="file-text"></i></td>
                                                                    <td>
                                                                        <div class="dropdown sub-dropdown">
                                                                            <button
                                                                                class="d-flex btn btn-link text-muted dropdown-toggle"
                                                                                type="button" id="dd1"
                                                                                data-toggle="dropdown"
                                                                                aria-haspopup="true"
                                                                                aria-expanded="false">
                                                                                <i data-feather="download"> </i>
                                                                                <p>&nbsp;&nbsp;&nbsp;Unduh</p>
                                                                            </button>
                                                                            <div class="dropdown-menu dropdown-menu-right"
                                                                                aria-labelledby="dd1">
                                                                                <a class="dropdown-item" href="{{ route('exportPdfComputation', $computation) }}">
                                                                                    <i data-feather="file"></i> Pdf
                                                                                </a>
                                                                                <a class="dropdown-item" href="{{ url('/exportExcelComputation', $computation) }}">
                                                                                    <i data-feather="file-text"></i> Xlsx
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td align="center">
                                                                        @if ($computation->status == 'Finished')
                                                                            <span class="badge badge-pill badge-success">
                                                                                Finished
                                                                            </span>
                                                                        @else
                                                                            <button class="btn btn-sm btn-warning">
                                                                                Tinjau
                                                                            </button>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            @empty
                                                                <tr>
                                                                    <td colspan="5">
                                                                        Belum Ada File Perhitungan!
                                                                    </td>
                                                                </tr>
                                                            @endforelse
                                                        </tbody>
                                                        <tfoot>
                                                            {{-- <tr>
                                                                <th>No</th>
                                                                <th>Pengguna</th>
                                                                <th>File</th>
                                                                <th>Aksi</th>
                                                                <th>Status</th>
                                                            </tr> --}}
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('scripts')
        <script src="{{ asset('assets/libs/chartist/dist/chartist.min.js') }}"></script>
        <script src="{{ asset('assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>
        <script src="{{ asset('dist/js/pages/dashboards/dashboard1.min.js') }}"></script>

        <script src="{{ asset('path/jquery.radialBar.min.js') }}"></script>

        {{-- charts bar user diagram --}}
        <script type="text/javascript">
            var data = [{
                    primaryColor: "#1991EB",
                    secondaryColor: "#EAF3FB",
                    progress: "60",
                    labelText: "Permenperin 1"
                },
                {
                    primaryColor: "#FF5733",
                    secondaryColor: "#ECEDFF",
                    progress: "30",
                    labelText: "Permenperin 2"
                },
                {
                    primaryColor: "#FF0000",
                    secondaryColor: "#FBECFF",
                    progress: "20",
                    labelText: "Permenperin 3"
                },
            ];

            $(".radial").radialBar({
                data: data,
                width: "300",
                height: "300",
                strokeWidth: 12,
            });
        </script>
        {{-- charts bar user diagram --}}

        {{-- charts dounat  --}}
        <script>
            var barChartData = {
                labels: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'],
                datasets: [
                    // {
                    //     label: '% FOIR',
                    //     type: 'line',
                    //     backgroundColor: '#444444',
                    //     fill: false,
                    //     yAxisID: 'y-axis-2',
                    //     lineTension: 0,
                    //     data: [
                    //         50,
                    //         50,
                    //         50,
                    //         50,
                    //         56,
                    //         56,
                    //         56,
                    //         56,
                    //         62,
                    //         62,
                    //         62,
                    //         62
                    //     ]
                    // },
                    {
                        label: 'Premium',
                        type: 'bar',
                        backgroundColor: '#1991EB',
                        yAxisID: 'y-axis-1',
                        data: [
                            20,
                            33,
                            25,
                            15,
                            30,
                            31,
                            22,
                            23,
                            16,
                            17,
                            25,
                            13
                        ]
                    }, {
                        label: 'Regular',
                        backgroundColor: '#ba1f00',
                        type: 'bar',
                        yAxisID: 'y-axis-1',
                        data: [
                            25,
                            23,
                            15,
                            15,
                            15,
                            30,
                            35,
                            13,
                            14,
                            25,
                            23,
                            11
                        ]
                    }
                ]
            };

            window.onload = function() {
                var ctx = document.getElementById('canvas').getContext('2d');
                var myBar = new Chart(ctx, {
                    type: 'bar',
                    data: barChartData,
                    options: {
                        responsive: true,
                        title: {
                            display: true,
                            text: 'User Diagram'
                        },
                        tooltips: {
                            mode: 'index',
                            intersect: true
                        },
                        scales: {
                            yAxes: [{
                                    type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                                    display: true,
                                    position: 'left',
                                    id: 'y-axis-1',
                                },
                                // {
                                //     type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                                //     display: true,
                                //     position: 'right',
                                //     id: 'y-axis-2',
                                //     gridLines: {
                                //         drawOnChartArea: false
                                //     }
                                // }
                            ],
                        }
                    }
                });
            };
        </script>
        {{-- charts dounat  --}}

        {{-- charts radar --}}
        <script>
            var marksCanvas = document.getElementById("marksChart");

            var marksData = {
                labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun"],
                datasets: [{
                    label: "Premium",
                    backgroundColor: "rgba(200,0,0,0.2)",
                    data: [65, 75, 70, 80, 60, 80]
                }, {
                    label: "Regular",
                    backgroundColor: "rgba(0,0,200,0.2)",
                    data: [54, 65, 60, 70, 70, 75]
                }]
            };

            var radarChart = new Chart(marksCanvas, {
                type: 'radar',
                data: marksData
            });
        </script>
    @endpush
