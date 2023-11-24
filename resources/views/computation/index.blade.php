@extends('layouts.app')

@section('title', 'Perhitungan Data')

@push('style')
    <link href="{{ asset('assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <style>
        .card-padding {
            aspect-ratio: auto;
        }

        @media only screen and (min-width: 768px) and (max-width: 1439) {
            .card-padding {
                aspect-ratio: 16/9;
            }
        }

        @media only screen and (min-width: 1440px) {
            .card-padding {
                aspect-ratio: auto;
            }

            .card-body {
                min-height: 15rem;
            }
        }

        @
    </style>
@endpush

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="float-left">
                                        <h4 class="card-title">{{ $pageTitle }} Data</h4>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i
                                                        class="fas fa-search"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Cari pengguna"
                                                aria-label="Search" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                    <div class="float-right pt-4">
                                        <a href="#" class="btn btn-primary" data-toggle="modal"
                                            data-target="#create-perhitungan">
                                            <i class="fas fa-plus"></i>
                                            Tambah Perhitungan
                                        </a>

                                    </div>
                                </div>
                                <div class="col-12 pt-3 pt-lg-0 container mx-auto">
                                    <div class="row">
                                        @foreach ($computations as $computation)
                                            <div class="card-padding col-12 col-lg-6">
                                                <div class="card px-0 mt-3 mx-0 mx-lg-1"
                                                    style="box-shadow: 0 0 15px -5px gray !important;">
                                                    <div
                                                        class="card-header d-flex justify-content-between align-items-start">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input checkbox-news"
                                                                style="transform: scale(1.4); cursor: pointer;"
                                                                data-id="{{ $computation->id }}">
                                                        </div>
                                                        <div class="badges d-flex align-items-center">
                                                            <div
                                                                class="badge badge-{{ $computation->permenperin_category->color }} text-wrap">{{ $computation->permenperin_category->name }}</div>
                                                            <div class="dropdown">
                                                                <i data-feather="more-vertical" id="dropdownMenuButton"
                                                                    class="feather-icon dropdown-toggle"
                                                                    style="cursor: pointer;" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false"></i>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item" href="{{ route('computation.show', $computation) }}">Detail</a>
                                                                    <a class="dropdown-item buttonEditNews"
                                                                        onclick="editComputation({{ $computation }})">Edit</a>
                                                                    <form action="{{ route('computation.destroy', $computation) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="dropdown-item"
                                                                            type="submit">Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body" style="font-size: 11pt">
                                                        <div class="row">
                                                            <div class="col-12 pt-2">
                                                                <div class="row">
                                                                    <div class="col-12 col-lg-4" style="font-weight: 500">
                                                                        Hasil Produksi</div>
                                                                    <div class="col-12 col-lg-8"><span
                                                                            class="d-none d-lg-inline">:</span>
                                                                        {{ $computation->production_result }}</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 pt-2">
                                                                <div class="row">
                                                                    <div class="col-12 col-lg-4" style="font-weight: 500">
                                                                        Jenis Produk</div>
                                                                    <div class="col-12 col-lg-8"><span
                                                                            class="d-none d-lg-inline">:</span>
                                                                        {{ $computation->product_type }}</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 pt-2">
                                                                <div class="row">
                                                                    <div class="col-12 col-lg-4" style="font-weight: 500">
                                                                        Spesifikasi</div>
                                                                    <div class="col-12 col-lg-8"><span
                                                                            class="d-none d-lg-inline">:</span>
                                                                        {{ $computation->specification }}</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 pt-2">
                                                                <div class="row">
                                                                    <div class="col-12 col-lg-4" style="font-weight: 500">
                                                                        Merk & Tipe</div>
                                                                    <div class="col-12 col-lg-8"><span
                                                                            class="d-none d-lg-inline">:</span>
                                                                        {{ $computation->brand }}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--  Modal content for create perhitungan -->
    <div class="modal fade" id="create-perhitungan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('computation.store') }}" method="POST" id="formComputation">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="modal-body m-4">
                        <table class="w-100">
                            <tr>
                                <td>
                                    <select name="permenperin_category_id" id="permenperin_category_id"
                                        class="form-control">
                                        <option class="permenperin_category_id_default" value="" selected disabled>-- pilih permenperin --</option>
                                        @foreach ($permenperinCategories as $permenperinCategory)
                                            <option class="permenperin_category_id" value="{{ $permenperinCategory->id }}">
                                                {{ $permenperinCategory->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td class="w-25">Hasil Produksi</td>
                                <td>:</td>
                                <td class="w-75">
                                    <input type="text" name="production_result" class="form-control flex-grow-1 ml-2"
                                        id="production_result" placeholder="Hasil">
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>Jenis Produksi</td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="product_type" class="form-control ml-2"
                                        id="product_type" placeholder="Jenis">
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>Spesifikasi</td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="specification" class="form-control flex-grow-1 ml-2"
                                        id="specification" placeholder="Spesifikasi">
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>Merk & Tipe</td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="brand" class="form-control flex-grow-1 ml-2"
                                        id="brand" placeholder="Merk & Tipe">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <button class="btn btn-primary btn-md center-block" Style="width: 100px;" class="close"
                                    data-dismiss="modal"aria-hidden="true">Batal</button>
                                <button type="submit" class="btn btn-danger btn-md center-block"
                                    Style="width: 100px;">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('library/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <script>
        $(document).ready(() => {
            $("#create-perhitungan").on("hidden.bs.modal", () => {
                resetModalForm();
                console.log("Modal Closed")
            })
        })
        function editComputation(data) {
            console.log(data);
            $("#id").val(data.id);
            $(".permenperin_category_id_default").prop("selected", false);
            $(`.permenperin_category_id[value='${data.permenperin_category_id}']`).prop("selected", true);
            $("#production_result").val(data.production_result);
            $("#product_type").val(data.product_type);
            $("#specification").val(data.specification);
            $("#brand").val(data.brand);
            $("#create-perhitungan").modal("show")
        }

        function resetModalForm() {
            $("#id").val("");
            $(`.permenperin_category_id[selected='true']`).prop("selected", false);
            $(".permenperin_category_id_default").prop("selected", true);
            $("#production_result").val("");
            $("#product_type").val("");
            $("#specification").val("");
            $("#brand").val("");
        }
    </script>
    {{-- <script src="{{ asset('dist/js/users/script.js') }}"></script> --}}
@endpush
