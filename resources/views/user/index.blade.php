@extends('layouts.app')

@section('title', 'Users Data')

@push('style')
    <link href="{{ asset('assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet"> --}}
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
                @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        <strong>{{ session('success') }}</strong>
                    </div>
                </div>
                @endif
                @if (session()->has('failed'))
                <div class="alert alert-danger alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
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
                                        <a href="{{ url('/exportPdfUsers') }}"
                                            class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
                                            <i class="fas fa-file-pdf fa-sm text-white-75">&nbsp;Export PDF</i>
                                        </a>
                                    </div>
                                    @endcan
                                </div>
                                <div class="float-right">
                                    @can('user-excel')
                                    <div class="input-group">
                                        <a href="{{ url('/exportExcelUsers') }}"
                                            class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
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
                                                                <a href="{{ route('users.destroy', $item->id) }}"
                                                                    class="text-danger">Trash</a>
                                                            </div>
                                                        </td>
                                                        <td>{{ $item->username }}</td>
                                                        <td>{{ $item->email }}</td>
                                                        <td>{{ $item->created_at }}</td>
                                                        <td>
                                                            <form id="myForm-{{ $item->id }}"
                                                                action="{{ route('users.destroy',$item->id) }}"
                                                                method="POST" class="d-flex">
                                                                @can('user-show')
                                                                <a id="modal-user-show"
                                                                    data-user="{{ $item->name.'-'.$item->username.'-'.$item->email }}"
                                                                    class="btn btn-primary mr-1"
                                                                    href="{{ route('users.show',$item->id) }}" title="Show">
                                                                    <i class="fa fa-fw fa-eye p-0"></i>
                                                                </a>
                                                                @endcan
                                                                @can('user-edit')
                                                                <a class="btn btn-success btn-action mr-1"
                                                                    href="{{ route('users.edit',$item->id) }}"
                                                                    data-toggle="tooltip" title="Edit">
                                                                    <i class="fa fa-pencil-alt p-0"></i>
                                                                </a>
                                                                @endcan
                                                                @can('user-delete')
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-action"
                                                                    title="Delete"
                                                                    data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                                                    data-confirm-yes="confirmDelete({{ $item->id }})">
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
                        {{-- @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible show fade">
                                    <div class="alert-body">
                                        <button class="close" data-dismiss="alert">
                                            <span>&times;</span>
                                        </button>
                                        <strong>{{ session('success') }}</strong>
                    </div>
                </div>
                @endif
                @if (session()->has('failed'))
                <div class="alert alert-danger alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        <strong>{{ session('failed') }}</strong>
                    </div>
                </div>
                @endif --}}
                {{-- <div class="float-left">
                                <h4 class="card-title">{{ $pageTitle }} Data</h4>
                @can('user-pdf')
                <div class="input-group">
                    <a href="{{ url('/exportPdfUsers') }}" class="btn btn-sm btn-warning">
                        Export PDF &nbsp;
                        <i class="fas fa-file-pdf fa-sm"></i>
                    </a>
                </div>
                @endcan
            </div> --}}

            {{-- <div class="float-right">
                                <a href="{{ route('users.create') }}" class="btn btn-primary mb-1">
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
                            {{ $item->fullname }}
                        </td>
                        <td>
                            {{ $item->email }}
                        </td>
                        <td>
                            {{ $item->created_at }}
                        </td>
                        <td>
                            <form id="myForm-{{ $item->id }}" action="{{ route('users.destroy',$item->id) }}" method="POST"
                                class="d-flex">
                                @can('user-show')
                                <a id="modal-user-show" data-user="{{ $item->name.'-'.$item->username.'-'.$item->email }}"
                                    class="btn btn-primary mr-1" href="{{ route('users.show',$item->id) }}" title="Show">
                                    <i class="fa fa-fw fa-eye p-0"></i>
                                </a>
                                @endcan
                                @can('user-edit')
                                <a class="btn btn-success btn-action mr-1" href="{{ route('users.edit',$item->id) }}"
                                    data-toggle="tooltip" title="Edit">
                                    <i class="fa fa-pencil-alt p-0"></i>
                                </a>
                                @endcan
                                @can('user-delete')
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-action" title="Delete"
                                    data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                    data-confirm-yes="confirmDelete({{ $item->id }})">
                                    <i class="fa fa-trash-alt p-0"></i>
                                </button>
                                @endcan
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div> --}}
        {{-- <div class="float-right">
                                <div class="input-group">
                                    <a href="{{ url('/exportExcelUsers') }}" class="d-none d-sm-inline-block btn btn-sm
        btn-success shadow-sm">
        <i class="fas fa-file-excel fa-sm text-white-75">&nbsp;Export Excel</i>
        </a>
    </div>
    </div> --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="float-left">
                    <h4 class="card-title">{{ $pageTitle }} Data</h4>
                    <div class="input-group mb-3">
                        <form action="{{ route('search-user-pengguna') }}" method="POST" class="form-inline">
                            @csrf
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" style="cursor: pointer;">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="search" value="{{ $search_value ?? '' }}" placeholder="Cari Nama Pengguna" aria-label="Search" aria-describedby="basic-addon1">
                            </div>
                            <button type="submit" class="btn btn-primary ml-2">Search</button>
                        </form>
                        {{-- <input type="text" class="form-controller" id="search" name="search"></input> --}}
                    </div>
                </div>
                <div class="float-right pt-4">
                    <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                </div>
                <div class="float-right pt-4 pr-3">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Aksi&nbsp;&nbsp;&nbsp;<i class="fas fa-angle-down"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item"><i class="fas fa-download"></i>&nbsp;&nbsp;&nbsp;Download</a>
                            <form action="{{ route('users.deletedBatch') }}" method="post" id="formDeleteBatch">
                                @csrf
                                <input type="hidden" name="delete_ids" id="usersWantDelete" />
                                <button type="button" class="btn-sm px-lg-3 py-lg-2 text-nowrap dropdown-item"
                                    style="height: min-content" id="deleteSelectedUsers">
                                    <i class="fa fa-trash mr-3"></i>delete selected users
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <tbody>

        </tbody>
        <hr>
        <div class="row">
            @foreach ($users as $item)
            <div class="col-12 col-md-4 col-lg-4">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <div class="float-left">

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input checkbox-users"
                                    style="transform: scale(1.4); cursor: pointer;" data-id="{{ $item->id }}">
                            </div>
                        </div>
                        <div class="float-right">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                        <path
                                            d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                    </svg>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @can('user-edit')
                                    <a class="dropdown-item" href="{{ route('users.edit', $item->id) }}">
                                        <i class="fa fa-pencil-alt p-0"></i>&nbsp;&nbsp;&nbsp;Edit
                                    </a>
                                    @endcan
                                    <a class="dropdown-item">
                                        <i class="fas fa-download"></i>&nbsp;&nbsp;&nbsp;Download
                                    </a>
                                    @can('user-delete')
                                    <form id="myForm-{{ $item->id }}" action="{{ route('users.destroy', $item->id) }}"
                                        method="POST" class="d-flex">
                                        @csrf
                                        @method('DELETE')
                                        @can('user-delete')
                                        <button type="submit" class="dropdown-item"
                                            onclick="return confirm('Are you sure?')"
                                            data-confirm-yes="confirmDelete({{ $item->id }})">
                                            <i class="fas fa-trash-alt"></i>&nbsp;&nbsp;&nbsp;Hapus
                                            Data
                                        </button>
                                        @endcan
                                    </form>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-md-7">
                                <h5 class="text-center font-weight-bold">
                                    {{ $item->user_profile->company_name ?? '' }}</h5>
                                <table>
                                    <tr>
                                        <td>@</td>
                                        <td style="width: 10%" class="text-center">:</td>
                                        <td>{{ $item->user_profile->fullname ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td><i class=" fas fa-hospital"></i></td>
                                        <td style="width: 10%" class="text-center">:</td>
                                        <td>{{ $item->user_profile->company_address ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fas fa-phone"></i></td>
                                        <td style="width: 10%" class="text-center">:</td>
                                        <td>{{ $item->user_profile->phone_number ?? '' }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-sm-6 col-md-5">
                                <div class="item">
                                    <div class="item__photo d-flex justify-content-center align-items-center">
                                        <img src="{{ asset($item->user_profile->avatar != null ? $item->user_profile->getAvatarPath() : 'assets/images/users/not_found.jpg') }}"
                                            style="object-fit:cover;" alt="user" class="rounded-circle" height="100" width="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="float-left">
                            @if(!empty($item->user_category->name))
                            @if ($item->user_category->name == 'Regular')
                            <img src="{{ asset('assets/images/users/quality.png') }}" alt="reguler" width="20"
                                style="vertical-align: top;">
                            @else
                            <img src="{{ asset('assets/images/users/crown.png') }}" alt="premium" width="20"
                                style="vertical-align: top;">
                            @endif
                            @endif
                            {{ $item->user_category->name ?? '' }}
                        </div>
                        <div class="float-right">
                            @can('user-show')
                            <a class="btn btn-sm btn-primary mr-1" href="{{ route('users.show', $item->id) }}" title="Show">
                                Lihat Profil
                            </a>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-between">
            <form action="{{ route('users.index') }}" id="form-perpage" class="pb-3">
                <div class="form-group d-flex align-items-center">
                    <select name="perpage" id="perpage" class="form-control" style="width: 7rem">
                        <option value="6" {{ $perpage == 6 ? 'selected' : '' }}>Default</option>
                        <option value="15" {{ $perpage == 15 ? 'selected' : '' }}>15</option>
                        <option value="30" {{ $perpage == 30 ? 'selected' : '' }}>30</option>
                        <option value="45" {{ $perpage == 45 ? 'selected' : '' }}>45</option>
                        <option value="60" {{ $perpage == 60 ? 'selected' : '' }}>60</option>
                    </select>
                    <label for="perpage" class="pt-2 pl-2">Users per page</label>
                </div>
            </form>
            <div>
                {{ $users->links() }}
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
    <script>
        $("#destroyByCheckbox").click(function () {
            var checked = [];
            $('.selectedUser:checkbox:checked').each(function () {
                checked.push($(this).data("id"));
            });
            if (checked.length > 0) {
                $("#idDownload").val(checked);
            } else {
                alert('No users selected!');
            }
            console.log(checked);
        });

    </script>

    <script>
        // var selectAllCheckbox = document.getElementById('selectAllCheckbox');
        // var ceklisCheckboxes = document.querySelectorAll('input[name="ceklis"]');

        // selectAllCheckbox.addEventListener('change', function() {
        //     if (selectAllCheckbox.checked) {
        //         ceklisCheckboxes.forEach(function(checkbox) {
        //             checkbox.checked = true;
        //         });
        //     } else {
        //         ceklisCheckboxes.forEach(function(checkbox) {
        //             checkbox.checked = false;
        //         });
        //     }
        // });

        // ceklisCheckboxes.forEach(function(checkbox) {
        //     checkbox.addEventListener('change', function() {
        //         if (!this.checked) {
        //             selectAllCheckbox.checked = false;
        //         }
        //     });
        // });

    </script>
    {{-- <script src="{{ asset('assets/extra-libs/sparkline/sparkline.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('dist/js/pages/datatable/datatable-basic.init.js') }}"></script> --}}
    <script src="{{ asset('library/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <script src="{{ asset('dist/js/users/script.js') }}"></script>
    <script>
        let originalPerpage;
        originalPerpage = $("#perpage").val();
        $("#perpage").change(() => {
            swal({
                title: "Warning",
                text: "You have checked some users. If you want to change the 'perpage', you will lose any users that you have checked.",
                icon: "warning",
                buttons: true,
                dangerMode: true
            }).then((willChange) => {
                if (willChange) {
                    sessionStorage.removeItem("selectedUsers");
                    $("#form-perpage").submit();
                } else {
                    $("#perpage option[value='" + originalPerpage + "']").prop('selected', true);
                }
            });
        })

    </script>
    {{-- contoh koding get data ajax untuk search --}}
    {{-- <script type="text/javascript">
        $('#search').on('keyup', function () {
            var valSearch = $(this).val();
            $.ajax({
                type: 'get',
                url: '{{ route('search-user-pengguna') }}',
                data: {
                    'search': valSearch
                },
                success: function (data) {
                    console.log(data);
                    $('tbody').html(data);
                }
            });
        })
    </script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
    </script> --}}
@endpush
