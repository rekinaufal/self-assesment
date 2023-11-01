@extends('layouts.app')

@section('title', 'List Kebutuhan')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/select2/dist/css/select2.min.css') }}">

    <style>
        /* nav */
        /* .card {
        max-width: 25rem;
        padding: 0;
        border: none;
        border-radius: 0.5rem;
        } */
        a {
            color: black; /* Set your desired text color */
            text-decoration: none; /* Remove underline */
        }

        a.active {
        border-bottom: 2px solid #55c57a;
        }

        .nav-link {
        color: rgb(110, 110, 110);
        /* font-weight: 500; */
        }
        .nav-link:hover {
        color: #55c57a;
        }

        .nav-pills .nav-link.active {
        color: black;
        background-color: white;
        border-radius: 0.5rem 0.5rem 0 0;
        font-weight: 600;
        }

        .tab-content {
        padding-bottom: 1.3rem;
        }

        /* .form-control {
        background-color: rgb(241, 243, 247);
        border: none;
        } */

        /* 3nd card */
        /* span {
        margin-left: 0.5rem;
        padding: 1px 10px;
        color: white;
        background-color: rgb(143, 143, 143);
        border-radius: 4px;
        font-weight: 600;
        } */

        .third {
        padding: 0 1.5rem 0 1.5rem;
        }

        /* label {
        font-weight: 500;
        color: rgb(104, 104, 104);
        } */

        /* .btn-success {
        float: right;
        } */

        .form-control:focus {
        box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset, 0px 0px 7px rgba(0, 0, 0, 0.2);
        }

        select {
        -webkit-appearance: none;
        -moz-appearance: none;
        text-indent: 1px;
        text-overflow: "";
        }

        /* 1st card */

        ul {
        list-style: none;
        margin-top: 1rem;
        padding-inline-start: 0;
        }

        /* .search {
        padding: 0 1rem 0 1rem;
        } */

        .ccontent li .wrapp {
        padding: 0.3rem 1rem 0.001rem 1rem;
        }

        /* .ccontent li .wrapp div {
        font-weight: 600;
        }

        .ccontent li .wrapp p {
        font-weight: 360;
        }  */

        .ccontent li:hover {
        background-color: rgb(117, 93, 255);
        color: white;
        }

        /* 2nd card */

        /* .addinfo {
        padding: 0 1rem;
        } */
    </style>
@endpush

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <h4 class="card-title">Check List Kebutuhan Verifikasi</h4>
                        <p class="text-secondary">TKDN Barang</p>
                    </div>
                    <div class="card-body">
                        <div class="form-gorup">
                            <label>Nama Perusahaan</label>
                            <input type="text" class="form-control" name="company_name">
                        </div>
                        <div class="form-gorup">
                            <label>Jenis Produk</label>
                            <input type="text" class="form-control" name="type_product">
                        </div>
                        <div class="form-gorup">
                            <label>Tipe Produk</label>
                            <input type="text" class="form-control" name="type_product">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <h4 class="card-title">1. DATA UMUM DAN ASPEK LEGAL</h4>
                        <p class="h6">PERUSAHAAN PEMOHON (BRAND OWNER)</p>
                    </div>
                    <div class="card-body">
                        {{-- Profil Perusahaan --}}
                        <div class="form-group d-flex align-items-center">
                            <button type="button" class="btn btn-outline-danger mr-2 flex-grow-1 text-left">
                                <div class="text-dark">
                                    <i class="far fa-building"></i>
                                    Profil Perusahaan
                                </div>
                            </button>
                            <div class="mr-2">
                                <a href="#" data-toggle="tooltip" title="This is a tooltip example that displays on the top">
                                    <span class="icon-question"></span>
                                </a>
                            </div>
                            <div class="mr-2">
                                <input type="radio" name="profil_perusahaan" style="transform: scale(1.3);">
                            </div>
                        </div>
                        {{-- Akta Pendidikan dan Akta Perubahan Terakhir --}}
                        <div class="form-group d-flex align-items-center">
                            <button type="button" class="btn btn-outline-danger mr-2 flex-grow-1 text-left">
                                <div class="text-dark">
                                    <i class="far fa-file-archive"></i>
                                    Akta Pendidikan dan Akta Perubahan Terakhir
                                </div>
                            </button>
                            <div class="mr-2">
                                <a href="#" data-toggle="tooltip" title="This is a tooltip example that displays on the top">
                                    <span class="icon-question"></span>
                                </a>
                            </div>
                            <div class="mr-2">
                                <input type="radio" name="profil" style="transform: scale(1.3);">
                            </div>
                        </div>
                        {{-- Izin Usaha IUI/UT/OSS --}}
                        <div class="form-group d-flex align-items-center">
                            <button type="button" class="btn btn-outline-danger mr-2 flex-grow-1 text-left">
                                <div class="text-dark">
                                    <i class="far fa-file-code"></i>
                                    Izin Usaha (IUI/UT/OSS)
                                </div>
                            </button>
                            <div class="mr-2">
                                <a href="#" data-toggle="tooltip" title="This is a tooltip example that displays on the top">
                                    <span class="icon-question"></span>
                                </a>
                            </div>
                            <div class="mr-2">
                                <input type="radio" name="profil" style="transform: scale(1.3);">
                            </div>
                        </div>
                        {{-- Izin Usaha --}}
                        <div class="form-group d-flex align-items-center">
                            <button type="button" class="btn btn-outline-danger mr-2 flex-grow-1 text-left">
                                <div class="text-dark">
                                    <i class="far fa-file-powerpoint"></i>
                                    Izin Usaha
                                </div>
                            </button>
                            <div class="mr-2">
                                <a href="#" data-toggle="tooltip" title="This is a tooltip example that displays on the top">
                                    <span class="icon-question"></span>
                                </a>
                            </div>
                            <div class="mr-2">
                                <input type="radio" name="profil" style="transform: scale(1.3);">
                            </div>
                        </div>
                        {{-- Nomor Pokok Wajib Pajak (NPWP) --}}
                        <div class="form-group d-flex align-items-center">
                            <button type="button" class="btn btn-outline-danger mr-2 flex-grow-1 text-left">
                                <div class="text-dark">
                                    <i class=" far fa-file"></i>
                                    Nomor Pokok Wajib Pajak (NPWP)
                                </div>
                            </button>
                            <div class="mr-2">
                                <a href="#" data-toggle="tooltip" title="This is a tooltip example that displays on the top">
                                    <span class="icon-question"></span>
                                </a>
                            </div>
                            <div class="mr-2">
                                <input type="radio" name="profil" style="transform: scale(1.3);">
                            </div>
                        </div>
                        {{-- Struktur Organisani --}}
                        <div class="form-group d-flex align-items-center">
                            <button type="button" class="btn btn-outline-danger mr-2 flex-grow-1 text-left">
                                <div class="text-dark">
                                    <i class="fas fa-sitemap"></i>
                                    Struktur Organisani
                                </div>
                            </button>
                            <div class="mr-2">
                                <a href="#" data-toggle="tooltip" title="This is a tooltip example that displays on the top">
                                    <span class="icon-question"></span>
                                </a>
                            </div>
                            <div class="mr-2">
                                <input type="radio" name="profil" style="transform: scale(1.3);">
                            </div>
                        </div>
                        {{-- Katalog Produk --}}
                        <div class="form-group d-flex align-items-center">
                            <button type="button" class="btn btn-outline-dark mr-2 flex-grow-1 text-left">
                                <div class="text-dark">
                                    <i class="far fa-file-alt"></i>
                                    Katalog Produk
                                </div>
                            </button>
                            <div class="mr-2">
                                <a href="#" data-toggle="tooltip" title="This is a tooltip example that displays on the top">
                                    <span class="icon-question"></span>
                                </a>
                            </div>
                            <div class="mr-2">
                                <input type="radio" name="profil" style="transform: scale(1.3);">
                            </div>
                        </div>
                        {{-- Sertifikat Merek --}}
                        <div class="form-group d-flex align-items-center">
                            <button type="button" class="btn btn-outline-dark mr-2 flex-grow-1 text-left">
                                <div class="text-dark">
                                    <i class="far fa-file-powerpoint"></i>
                                    Sertifikat Merek
                                </div>
                            </button>
                            <div class="mr-2">
                                <a href="#" data-toggle="tooltip" title="This is a tooltip example that displays on the top">
                                    <span class="icon-question"></span>
                                </a>
                            </div>
                            <div class="mr-2">
                                <input type="radio" name="profil" style="transform: scale(1.3);">
                            </div>
                        </div>
                        {{-- Surat Pelimpahan Penggunaan Merk --}}
                        <div class="form-group d-flex align-items-center">
                            <button type="button" class="btn btn-outline-dark mr-2 flex-grow-1 text-left">
                                <div class="text-dark">
                                    <i class="far fa-file-pdf"></i>
                                    Surat Pelimpahan Penggunaan Merk
                                </div>
                            </button>
                            <div class="mr-2">
                                <a href="#" data-toggle="tooltip" title="This is a tooltip example that displays on the top">
                                    <span class="icon-question"></span>
                                </a>
                            </div>
                            <div class="mr-2">
                                <input type="radio" name="profil" style="transform: scale(1.3);">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <h4 class="card-title">II. TINGKAT KOMPONEN DALAM NEGERI (TKDN)</h4>
                        {{-- <p class="h6">PERUSAHAAN PEMOHON (BRAND OWNER)</p> --}}
                            <!-- nav options -->
                        <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist" style="font-size: 11px">
                            <li class="nav-item">
                                <a class="nav-link active" id="bahan-baku-tab" data-toggle="pill" href="#bahan-baku" role="tab" aria-controls="bahan-baku" aria-selected="true">BAHAN BAKU LANGSUNG</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tenaga-kerja-tab" data-toggle="pill" href="#tenaga-kerja" role="tab" aria-controls="tenaga-kerja" aria-selected="false">TENAGA KERJA LANGSUNG</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="overhead-tab" data-toggle="pill" href="#overhead" role="tab" aria-controls="overhead" aria-selected="false">OVERHEAD PABRIK</a>
                            </li>
                        </ul>

                        <!-- content -->
                        <div class="tab-content" id="pills-tabContent p-3">
                            <!-- bahan baku -->
                            <div class="tab-pane fade show active" id="bahan-baku" role="tabpanel" aria-labelledby="bahan-baku-tab">
                                <ul class="ccontent">
                                    {{-- Daftar Kebutuhan Bahan Baku Untuk Satuan Produk Yang Dinilai --}}
                                    <div class="form-group d-flex align-items-center">
                                        <button type="button" class="btn btn-outline-danger mr-2 flex-grow-1 text-left">
                                            <div class="text-dark h6">
                                                <i class="far fa-file"></i>
                                                Daftar Kebutuhan Bahan Baku Untuk Satuan Produk Yang Dinilai
                                            </div>
                                        </button>
                                        <div class="mr-2">
                                            <a href="#" data-toggle="tooltip" title="This is a tooltip example that displays on the top">
                                                <span class="icon-question"></span>
                                            </a>
                                        </div>
                                        <div class="mr-2">
                                            <input type="radio" name="profil" style="transform: scale(1.3);">
                                        </div>
                                    </div>
                                    {{-- Bukti Pembelian Bahan Baku Terhadap Produk Yang Dinilai --}}
                                    <div class="form-group d-flex align-items-center">
                                        <button type="button" class="btn btn-outline-dark mr-2 flex-grow-1 text-left">
                                            <div class="text-dark h6">
                                                <i class="far fa-file"></i>
                                                Bukti Pembelian Bahan Baku Terhadap Produk Yang Dinilai
                                            </div>
                                        </button>
                                        <div class="mr-2">
                                            <a href="#" data-toggle="tooltip" title="This is a tooltip example that displays on the top">
                                                <span class="icon-question"></span>
                                            </a>
                                        </div>
                                        <div class="mr-2">
                                            <input type="radio" name="profil" style="transform: scale(1.3);">
                                        </div>
                                    </div>
                                    {{-- Jasa Terkait Pembelian Bahan Baku --}}
                                    <div class="form-group d-flex align-items-center">
                                        <button type="button" class="btn btn-outline-dark mr-2 flex-grow-1 text-left">
                                            <div class="text-dark h6">
                                                <i class="far fa-file"></i>
                                                Jasa Terkait Pembelian Bahan Baku
                                            </div>
                                        </button>
                                        <div class="mr-2">
                                            <a href="#" data-toggle="tooltip" title="This is a tooltip example that displays on the top">
                                                <span class="icon-question"></span>
                                            </a>
                                        </div>
                                        <div class="mr-2">
                                            <input type="radio" name="profil" style="transform: scale(1.3);">
                                        </div>
                                    </div>
                                </ul>
                            </div>
                            <!-- tenaga kerja -->
                            <div class="tab-pane fade" id="tenaga-kerja" role="tabpanel" aria-labelledby="tenaga-kerja-tab">
                                <div class="form-group addinfo">
                                    <label for="exampleFormControlTextarea1">Write additional info.</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </div>
                            <!-- overhead -->
                            <div class="tab-pane fade third" id="overhead" role="tabpanel" aria-labelledby="overhead-tab">
                                <div class="form">
                                    <div class="form-group">
                                    <label for="exampleFormControlSelect1">Value Type<span>i</span></label>
                                        <select class="form-control round" id="exampleFormControlSelect1">
                                            <option class="">United States Dollar</option>
                                            <option class="amount">Indian Rupees</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>amount</label>
                                        <input class="form-control amount" placeholder="1500" />
                                    </div>
                                    <button class="btn btn-success">Insert</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/upload-preview/upload-preview.js') }}"></script>

    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
@endpush