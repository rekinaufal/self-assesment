@extends('layouts.app')

@section('title', 'Users Data')

@push('style')
    <link href="{{ asset('assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet">
@endpush

@section('main')
    {{-- @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p class="m-0">{{ $message }}</p>
        </div>
    @endif
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $pageTitle }}</h1>
                <div class="section-header-button">
                    <a href="{{ route('users.create') }}" class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">{{ $pageTitle }}</a></div>
                    <div class="breadcrumb-item">All {{ $pageTitle }}</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">{{ $pageTitle }}</h2>
                <p class="section-lead">
                    You can manage all posts, such as editing, deleting and more.
                </p>
                @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close"
                                data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            <strong>{{ session('success') }}</strong>
                        </div>
                    </div>
                @endif
                @if(session()->has('failed'))
                    <div class="alert alert-danger alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close"
                                data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            <strong>{{ session('failed') }}</strong>
                        </div>
                    </div>
                @endif
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All {{ $pageTitle }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="float-left">
                                    @can('user-pdf')
                                        <div class="input-group">
                                            <a href="{{ url('/exportPdfUsers') }}" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
                                                <i class="fas fa-file-pdf fa-sm text-white-75">&nbsp;Export PDF</i>
                                            </a>
                                        </div>
                                    @endcan
                                </div>
                                <div class="float-right">
                                    @can('user-excel')
                                        <div class="input-group">
                                            <a href="{{ url('/exportExcelUsers') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                                <i class="fas fa-file-excel fa-sm text-white-75">&nbsp;Export Excel</i>
                                            </a>
                                        </div>
                                    @endcan
                                </div>
                                <div class="clearfix mb-3"></div>
                                <div class="table-responsive">
                                    <div id="table-wrapper">
                                        <div id="table-scroll">                        
                                            <table class="table-striped table" id="table-users">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Name</th>
                                                        <th>Username</th>
                                                        <th>Email</th>
                                                        <th>Created At</th>
                                                        <th class="text-center" width="1%">#</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($users as $item)
                                                        <tr>
                                                            <td class="text-center">
                                                                {{ $loop->iteration }}.
                                                            </td>
                                                            <td>{{ $item->name }}
                                                                <div class="table-links">
                                                                    <a href="{{ route('users.show', $item->id) }}">View</a>
                                                                    <div class="bullet"></div>
                                                                    <a href="{{ route('users.edit', $item->id) }}">Edit</a>
                                                                    <div class="bullet"></div>
                                                                    <a href="{{ route('users.destroy', $item->id) }}" class="text-danger">Trash</a>
                                                                </div>
                                                            </td>
                                                            <td>{{ $item->username }}</td>
                                                            <td>{{ $item->email }}</td>
                                                            <td>{{ $item->created_at }}</td>
                                                            <td>
                                                                <form id="myForm-{{ $item->id }}" action="{{ route('users.destroy',$item->id) }}" method="POST" class="d-flex">
                                                                    @can('user-show')
                                                                        <a id="modal-user-show" data-user="{{ $item->name.'-'.$item->username.'-'.$item->email }}" class="btn btn-primary mr-1" href="{{ route('users.show',$item->id) }}" title="Show">
                                                                            <i class="fa fa-fw fa-eye p-0"></i>
                                                                        </a>
                                                                    @endcan
                                                                    @can('user-edit')
                                                                        <a class="btn btn-success btn-action mr-1" href="{{ route('users.edit',$item->id) }}" data-toggle="tooltip" title="Edit">
                                                                            <i class="fa fa-pencil-alt p-0"></i>
                                                                        </a>
                                                                    @endcan
                                                                    @can('user-delete')
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger btn-action" title="Delete" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="confirmDelete({{ $item->id }})">
                                                                            <i class="fa fa-trash-alt p-0"></i>
                                                                        </button>
                                                                    @endcan
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <table class="table-striped table" id="table-users"></table>
                                        </div>
                                    </div>
                                </div>
                                <div class="float-right">
                                    <nav>
                                        <ul class="pagination">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                            </li>
                                            <li class="page-item active">
                                                <a class="page-link" href="#">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div> --}}
    {{-- ========================== --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @if(session()->has('success'))
                            <div class="alert alert-success alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close"
                                        data-dismiss="alert">
                                        <span>&times;</span>
                                    </button>
                                    <strong>{{ session('success') }}</strong>
                                </div>
                            </div>
                        @endif
                        @if(session()->has('failed'))
                            <div class="alert alert-danger alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close"
                                        data-dismiss="alert">
                                        <span>&times;</span>
                                    </button>
                                    <strong>{{ session('failed') }}</strong>
                                </div>
                            </div>
                        @endif
                        <div class="float-left">
                            <h4 class="card-title">{{ $pageTitle }} Data</h4>
                            @can('user-pdf')
                                <div class="input-group">
                                    <a href="{{ url('/exportPdfUsers') }}" class="btn btn-sm btn-warning">
                                        Export PDF &nbsp;
                                        <i class="fas fa-file-pdf fa-sm"></i>
                                    </a>
                                </div>
                            @endcan
                        </div>
                        
                        <div class="float-right">
                            <a href="{{ route('roles.create') }}" class="btn btn-primary mb-1">
                                Add New &nbsp;<i class="fas fa-plus"></i>
                            </a>
                            @can('user-excel')
                                <div class="input-group">
                                    <a href="{{ url('/exportExcelUsers') }}" class="btn btn-sm btn-success mb-1">
                                        Export Excel
                                        <i class="fas fa-file-excel fa-sm"></i>
                                    </a>
                                </div>
                            @endcan
                        </div>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Created At</th>
                                        <th class="text-center" width="1%">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $item)
                                        <tr>
                                            <td class="text-center">
                                                {{ $loop->iteration }}.
                                            </td>
                                            <td>
                                                {{ $item->name }}
                                            </td>
                                            <td>
                                                {{ $item->username }}
                                            </td>
                                            <td>
                                                {{ $item->email }}
                                            </td>
                                            <td>
                                                {{ $item->created_at }}
                                            </td>
                                            <td>
                                                <form id="myForm-{{ $item->id }}" action="{{ route('users.destroy',$item->id) }}" method="POST" class="d-flex">
                                                    @can('user-show')
                                                        <a id="modal-user-show" data-user="{{ $item->name.'-'.$item->username.'-'.$item->email }}" class="btn btn-primary mr-1" href="{{ route('users.show',$item->id) }}" title="Show">
                                                            <i class="fa fa-fw fa-eye p-0"></i>
                                                        </a>
                                                    @endcan
                                                    @can('user-edit')
                                                        <a class="btn btn-success btn-action mr-1" href="{{ route('users.edit',$item->id) }}" data-toggle="tooltip" title="Edit">
                                                            <i class="fa fa-pencil-alt p-0"></i>
                                                        </a>
                                                    @endcan
                                                    @can('user-delete')
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-action" title="Delete" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="confirmDelete({{ $item->id }})">
                                                            <i class="fa fa-trash-alt p-0"></i>
                                                        </button>
                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('dist/js/feather.min.js') }}"></script>
    <script src="{{ asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('dist/js/custom.min.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dist/js/pages/datatable/datatable-basic.init.js') }}"></script>
@endpush
