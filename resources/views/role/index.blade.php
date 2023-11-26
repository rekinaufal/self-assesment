@extends('layouts.app')

@section('title', 'Roles')

@push('style')
    <link href="{{ asset('assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet"> --}}
@endpush

@section('main')
{{-- <div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ $pageTitle }}</h1>
            <div class="section-header-button">
                <a href="{{ route('roles.create') }}" class="btn btn-primary">Add New</a>
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
                You can manage all {{ $pageTitle }}s, such as editing, deleting and more.
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
                                <select class="form-control selectric">
                                    <option>Action For Selected</option>
                                    <option>Move to Draft</option>
                                    <option>Move to Pending</option>
                                    <option>Delete Pemanently</option>
                                </select>
                            </div>
                            <div class="float-right">
                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="clearfix mb-3"></div>

                            <div class="table-responsive">
                                <div id="table-wrapper">
                                    <div id="table-scroll"> 
                                        <table class="table-striped table" id="table-roles">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th>Created At</th>
                                                    <th class="text-center" width="1%">#</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($roles as $item)
                                                    <tr>
                                                        <td class="text-center">
                                                            {{ $loop->iteration }}.
                                                        </td>
                                                        <td>{{ $item->name }}
                                                            <div class="table-links">
                                                                <a href="{{ route('roles.show', $item->id) }}">View</a>
                                                                <div class="bullet"></div>
                                                                <a href="{{ route('roles.edit', $item->id) }}">Edit</a>
                                                                <div class="bullet"></div>
                                                                <a href="{{ route('roles.destroy', $item->id) }}" class="text-danger">Trash</a>
                                                            </div>
                                                        </td>
                                                        <td>{{ $item->created_at }}</td>
                                                        <td>
                                                            <form id="myForm-{{ $item->id }}" action="{{ route('roles.destroy', $item->id ?? '') }}" method="POST" class="d-flex">
                                                                @can('role-show')
                                                                    <a class="btn btn-primary mr-1" href="{{ route('roles.show',$item->id) }}" data-toggle="tooltip" title="Show">
                                                                        <i class="fa fa-fw fa-eye p-0"></i>
                                                                    </a>
                                                                @endcan
                                                                @can('role-edit')
                                                                    <a class="btn btn-success btn-action mr-1" href="{{ route('roles.edit',$item->id) }}" data-toggle="tooltip" title="Edit">
                                                                        <i class="fa fa-pencil-alt p-0"></i>
                                                                    </a>
                                                                @endcan
                                                                @can('role-delete')
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

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- @if(session()->has('success'))
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
                    @endif --}}
                    <div class="float-left">
                        <h4 class="card-title">{{ $pageTitle }} Data</h4>
                    </div>
                    <div class="float-right">
                        <a href="{{ route('roles.create') }}" class="btn btn-primary mb-3">Add New &nbsp;<i class="fas fa-plus"></i></a>
                    </div>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th class="text-center" width="1%">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $item)
                                    <tr>
                                        <td class="text-center">
                                            {{ $loop->iteration }}.
                                        </td>
                                        <td>
                                            {{ $item->name }}
                                        </td>
                                        <td>
                                            {{ $item->created_at }}
                                        </td>
                                        <td>
                                            <form id="myForm-{{ $item->id }}" action="{{ route('roles.destroy', $item->id ?? '') }}" method="POST" class="d-flex">
                                                @can('role-show')
                                                    <a class="btn btn-primary mr-1" href="{{ route('roles.show',$item->id) }}" data-toggle="tooltip" title="Show">
                                                        <i class="fa fa-fw fa-eye p-0"></i>
                                                    </a>
                                                @endcan
                                                @can('role-edit')
                                                    <a class="btn btn-success btn-action mr-1" href="{{ route('roles.edit',$item->id) }}" data-toggle="tooltip" title="Edit">
                                                        <i class="fa fa-pencil-alt p-0"></i>
                                                    </a>
                                                @endcan
                                                @can('role-delete')
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
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th class="text-center" width="1%">#</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        // trigger submit for delete data
        function confirmDelete($id) {
            var id = $id;
            $('#myForm-' + id).submit();
        }
    </script>
    {{-- <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/libs/popper.js/dist/umd/popper.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('dist/js/app-style-switcher.js') }}"></script> --}}
    {{-- <script src="{{ asset('dist/js/feather.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script> --}}
    <script src="{{ asset('assets/extra-libs/sparkline/sparkline.js') }}"></script>
    {{-- <script src="{{ asset('dist/js/sidebarmenu.js') }}"></script> --}}
    {{-- <script src="{{ asset('dist/js/custom.min.js') }}"></script> --}}
    <script src="{{ asset('assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dist/js/pages/datatable/datatable-basic.init.js') }}"></script>
@endpush
