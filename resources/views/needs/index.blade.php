@extends('layouts.app')

@section('title', 'Users Data')

@push('style')
    <link href="{{ asset('assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet"> --}}
@endpush

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="float-left">
                    <div class="input-group mb-3">
                        <form action="{{ route('search-need') }}" method="POST" class="form-inline">
                            @csrf
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" style="cursor: pointer;">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="search" value="{{ $search_value ?? '' }}" placeholder="Cari jenis produk" aria-label="Search" aria-describedby="basic-addon1">
                            </div>
                            <button type="submit" class="btn btn-primary ml-2">Search</button>
                        </form>
                    </div>
                </div>
                <div class="float-right">
                    @can('need-create')
                        <button class="btn btn-primary" data-toggle="modal" data-target="#select-create">
                            <i class="fas fa-plus"></i>
                        </button>
                    @endcan
                </div>
            </div>
            <div class="col-12">
                <hr>
            </div>
        </div>

        <!--  Modal content for create list kebutuhan -->
        <div class="modal fade" id="select-create" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        {{-- <h4 class="modal-title" id="myLargeModalLabel">Upgrade Plan</h4> --}}
                        <button type="button" class="close" data-dismiss="modal"aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        {{-- <h2 class="text-center mb-4 mt-0 mt-md-4 px-2">Upgrade akun anda dan dapatkan kelebihannya</h2> --}}
                        <div class="row">
                            <div class="col-6">
                                <a href="{{ route('needs.create', ['type-create' => 'new']) }}" class="text-decoration-none text-dark">
                                    <div class="card border-secondary border shadow-none" style="border-radius: 15px;">
                                        <div class="card-body position-relative">
                                            <div class="my-3 pt-2 pb-2 text-center">
                                                <img src="{{ asset('assets/images/kebutuhan/add-file.png') }}" alt="Pro Image" height="60">
                                            </div>
                                            <h3 class="card-title text-center mb-4">New File</h3>
                                            <p class="text-center pb-4 pt-4">Membuat file list kebutuhan baru dan belum memiliki data perhitungan</p>
                                            <div class="text-center pt-4">
                                                <div class="d-flex justify-content-center">
                                                    <input type="radio" style="transform: scale(1.5);" checked>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="{{ route('needs.create', ['type-create' => 'get']) }}" class="text-decoration-none text-dark">
                                    <div class="card border-secondary border shadow-none" style="border-radius: 15px;">
                                        <div class="card-body position-relative">
                                            <div class="my-3 pt-2 pb-2 text-center">
                                                <img src="{{ asset('assets/images/kebutuhan/file.png') }}" alt="Pro Image" height="60">
                                            </div>
                                            <h3 class="card-title text-center mb-4">Get File</h3>
                                            <p class="text-center pb-4 pt-4">Membuat file list kebutuhan baru dan telah memiliki data perhitungan</p>
                                            <div class="text-center pt-4">
                                                <div class="d-flex justify-content-center">
                                                    <input type="radio" style="transform: scale(1.5);" checked>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($needs as $item)
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header bg-transparent">
                            <div class="float-left">
                                {{-- <input class="text-secondary mt-3 mb-3 selectedUser" type="checkbox" name="ceklis" data-id={{ $item->id }} name="ceklis[]" style="transform: scale(1.5);"> --}}
                                <input class="text-secondary mt-3 mb-3 selectedUser" type="checkbox" name="ceklis" data-id="" name="ceklis[]" style="transform: scale(1.5);">
                            </div>
                            <div class="float-right">
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                            <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                        </svg>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        @can('need-edit')
                                            {{-- <a class="dropdown-item" href="{{ route('users.edit',$item->id) }}"> --}}
                                            <a class="dropdown-item" href="{{ route('needs.edit', $item->id) }}">
                                                <i class="fa fa-pencil-alt p-0"></i>&nbsp;&nbsp;&nbsp;Edit
                                            </a>
                                        @endcan
                                        <a class="dropdown-item" >
                                            <i class="fas fa-download"></i>&nbsp;&nbsp;&nbsp;Download
                                        </a>
                                        @can('need-delete')
                                            {{-- <form id="myForm-{{ $item->id }}" action="{{ route('users.destroy',$item->id) }}" method="POST" class="d-flex">
                                                @csrf
                                                @method('DELETE')
                                                @can('user-delete') --}}
                                                    {{-- <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure?')"  data-confirm-yes="confirmDelete({{ $item->id }})"> --}}
                                                    <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure?')"  data-confirm-yes="confirmDelete()">
                                                        <i class="fas fa-trash-alt"></i>&nbsp;&nbsp;&nbsp;Hapus Data
                                                    </button>
                                                {{-- @endcan
                                            </form> --}}
                                        @endcan
                                    </div>
                                </div>
                            </div>
                            <div class="float-right pr-3">
                                <span class="badge badge-{{ $item->computation->permenperin_category->color ?? '' }}">
                                    {{ $item->computation->permenperin_category->name ?? '' }}
                                </span>
                                {{-- <button class="btn btn-secondary" type="button">
                                    {{ $item->computation->permenperin_category->name }}
                                </button> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-7">
                                    {{-- <h5 class="text-center font-weight-bold">{{ $item->user_profile->company_name }}</h5> --}}
                                    <table>
                                        <tr>
                                            <td>Jenis Produk</td>
                                            <td style="width: 10%" class="text-center">:</td>
                                            <td>{{ $item->computation->product_type ?? ''}}</td>
                                        </tr>
                                        <tr>
                                            <td>Tipe Produk</td>
                                            <td style="width: 10%" class="text-center">:</td>
                                            <td>{{ $item->computation->brand ?? '' }}</td>
                                        </tr>
                                    </table>
                                </div>
                                {{-- <div class="col-sm-6 col-md-5">
                                    <div class="item">
                                        <div class="item__photo d-flex justify-content-center align-items-center">
                                            <img src="{{ asset($item->user_profile->avatar) }}" alt="user" class="rounded-circle" width="100">
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            {{-- <hr> --}}
                            {{-- <div class="float-left">
                                @if ($item->user_category->name == 'Regular')
                                    <img src="{{ asset('assets/images/users/quality.png') }}" alt="reguler" width="20" style="vertical-align: top;">
                                @else    
                                    <img src="{{ asset('assets/images/users/crown.png') }}" alt="premium" width="20" style="vertical-align: top;">
                                @endif
                                {{ $item->user_category->name }}
                            </div>
                            <div class="float-right">
                                @can('user-show')
                                    <a class="btn btn-sm btn-primary mr-1" href="{{ route('users.show',$item->id) }}" title="Show">
                                        Lihat Profil
                                    </a>
                                @endcan
                            </div> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-between">
            <form action="{{ route('needs.index') }}" id="form-perpage" class="pb-3">
                <div class="form-group d-flex align-items-center">
                    <select name="perpage" id="perpage" class="form-control" style="width: 7rem">
                        <option value="6" {{ $perpage == 6 ? 'selected' : '' }}>Default</option>
                        <option value="15" {{ $perpage == 15 ? 'selected' : '' }}>15</option>
                        <option value="30" {{ $perpage == 30 ? 'selected' : '' }}>30</option>
                        <option value="45" {{ $perpage == 45 ? 'selected' : '' }}>45</option>
                        <option value="60" {{ $perpage == 60 ? 'selected' : '' }}>60</option>
                    </select>
                    <label for="perpage" class="pt-2 pl-2">List kebutuhan per page</label>
                </div>
            </form>
            <div>
                {{ $needs->links() }}
            </div>
        </div>
        {{-- <div class="float-left">
            <input class="text-secondary mt-3 mb-3" type="checkbox" id="selectAllCheckbox" style="transform: scale(1.5);">&nbsp;&nbsp;&nbsp;Jumlah : 1 dari 1 List kebutuhan
        </div>
        <div class="float-right">
            for pagination
        </div> --}}
    </div>
@endsection

@push('scripts')
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
@endpush