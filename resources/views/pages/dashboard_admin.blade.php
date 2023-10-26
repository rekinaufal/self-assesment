@extends('layouts.app')

@section('title', 'Admin Dashboard')

@push('style')
    <link href="{{ asset('assets/libs/chartist/dist/chartist.min.css') }}" rel="stylesheet">
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
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h2 class="text-dark mb-1 font-weight-medium">{{ $userCount }}</h2>
                                {{-- <span
                                    class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none">+18.33%</span> --}}
                            </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Data Pengguna</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="users"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">{{ $allUserPremiumCount }}
                            </h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Pengguna Premium
                            </h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="users"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h2 class="text-dark mb-1 font-weight-medium">{{ $permenperinCount }}</h2>
                                {{-- <span
                                    class="badge bg-danger font-12 text-white font-weight-medium badge-pill ml-2 d-md-none d-lg-block">-18.33%</span> --}}
                            </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Kategori Regulasi</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 font-weight-medium">124</h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">File Perhitungan</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="trello"></i></span>
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
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pemilihan Permenperin</h4>
                        <div id="campaign-v2" class="mt-2" style="height:283px; width:100%;"></div>
                        <ul class="list-style-none mb-0">
                            <li>
                                <i class="fas fa-circle text-primary font-10 mr-2"></i>
                                <span class="text-muted">Permenperin 1</span>
                                <span class="text-dark float-right font-weight-medium">$2346</span>
                            </li>
                            <li class="mt-3">
                                <i class="fas fa-circle text-danger font-10 mr-2"></i>
                                <span class="text-muted">Permenperin 2</span>
                                <span class="text-dark float-right font-weight-medium">$2108</span>
                            </li>
                            <li class="mt-3">
                                <i class="fas fa-circle text-cyan font-10 mr-2"></i>
                                <span class="text-muted">Permenperin 3</span>
                                <span class="text-dark float-right font-weight-medium">$1204</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Grafik Pengguna</h4>
                        <div class="net-income mt-4 position-relative" style="height:294px;"></div>
                        <ul class="list-inline text-center mt-5 mb-2">
                            <li class="list-inline-item text-muted font-italic">Sales for this month</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pengguna Aktif</h4>
                        <div class="net-income2 mt-4 position-relative" style="height:294px;"></div>
                        <ul class="list-inline text-center mt-5 mb-2">
                            <li class="list-inline-item text-muted font-italic">Sales for this month</li>
                        </ul>
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
                            <div class="ml-auto">
                                {{-- <div class="dropdown sub-dropdown">
                                    <button class="btn btn-link text-muted dropdown-toggle" type="button" id="dd1"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i data-feather="more-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd1">
                                        <a class="dropdown-item" href="#">Insert</a>
                                        <a class="dropdown-item" href="#">Update</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="pl-4 mb-5">
                            <div class="position-relative" style="height: 315px;">
                                <!-- basic table -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table id="zero_config"
                                                        class="table table-striped table-bordered no-wrap">
                                                        <thead>
                                                            <tr align="center">
                                                                <th>No</th>
                                                                <th>Pengguna</th>
                                                                <th>File</th>
                                                                <th>Aksi</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td align="center">1</td>
                                                                <td>Bambang</td>
                                                                <td align="center"> <i data-feather="file"></i> <i
                                                                        data-feather="file-text"></i></td>
                                                                <td>
                                                                    <div class="dropdown sub-dropdown">
                                                                        <button
                                                                            class="d-flex btn btn-link text-muted dropdown-toggle"
                                                                            type="button" id="dd1"
                                                                            data-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="false">
                                                                            <i data-feather="download"> </i>
                                                                            <p>&nbsp;&nbsp;&nbsp;Unduh</p>
                                                                        </button>
                                                                        <div class="dropdown-menu dropdown-menu-right"
                                                                            aria-labelledby="dd1">
                                                                            <a class="dropdown-item" href="#">
                                                                                <i data-feather="file"></i>&nbsp;&nbsp;
                                                                                Pdf</a>
                                                                            <a class="dropdown-item" href="#">
                                                                                <i
                                                                                    data-feather="file-text"></i>&nbsp;&nbsp;
                                                                                Xlsx</a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td align="center"><button
                                                                        class="btn btn-sm btn-warning">Tinjau</button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center">2</td>
                                                                <td>Pamungkas</td>
                                                                <td align="center"> <i data-feather="file"></i> <i
                                                                        data-feather="file-text"></i></td>
                                                                <td>
                                                                    <div class="dropdown sub-dropdown">
                                                                        <button
                                                                            class="d-flex btn btn-link text-muted dropdown-toggle"
                                                                            type="button" id="dd1"
                                                                            data-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="true">
                                                                            <i data-feather="download"></i>
                                                                            <p>&nbsp;&nbsp;&nbsp;Unduh</p>
                                                                        </button>
                                                                        <div class="dropdown-menu dropdown-menu-right"
                                                                            aria-labelledby="dd1">
                                                                            <a class="dropdown-item" href="#">
                                                                                <i
                                                                                    data-feather="file"></i>&nbsp;&nbsp;Pdf</a>
                                                                            <a class="dropdown-item" href="#">
                                                                                <i
                                                                                    data-feather="file-text"></i>&nbsp;&nbsp;Xlsx</a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td align="center"><button
                                                                        class="btn btn-sm btn-warning">Tinjau</button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center">3</td>
                                                                <td>Jamal</td>
                                                                <td align="center"> <i data-feather="file"></i> <i
                                                                        data-feather="file-text"></i></td>
                                                                <td>
                                                                    <div class="dropdown sub-dropdown">
                                                                        <button
                                                                            class="d-flex btn btn-link text-muted dropdown-toggle"
                                                                            type="button" id="dd1"
                                                                            data-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="true">
                                                                            <i data-feather="download"></i>
                                                                            <p>&nbsp;&nbsp;&nbsp;Unduh</p>
                                                                        </button>
                                                                        <div class="dropdown-menu dropdown-menu-right"
                                                                            aria-labelledby="dd1">
                                                                            <a class="dropdown-item" href="#">
                                                                                <i
                                                                                    data-feather="file"></i>&nbsp;&nbsp;Pdf</a>
                                                                            <a class="dropdown-item" href="#">
                                                                                <i
                                                                                    data-feather="file-text"></i>&nbsp;&nbsp;Xlsx</a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td align="center"><button
                                                                        class="btn btn-sm btn-warning">Tinjau</button>
                                                                </td>
                                                            </tr>
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
                            <ul class="list-inline text-center mt-4 mb-0">
                                <li class="list-inline-item text-muted font-italic">Earnings for this month</li>
                            </ul>
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
    @endpush
