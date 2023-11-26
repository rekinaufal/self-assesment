@extends('layouts.app')

@section('title', 'List Kebutuhan')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">

    <style>
        /* nav */
        /* .card {
                                                                                                                                                                                                                                max-width: 25rem;
                                                                                                                                                                                                                                padding: 0;
                                                                                                                                                                                                                                border: none;
                                                                                                                                                                                                                                border-radius: 0.5rem;
                                                                                                                                                                                                                                } */
        a {
            color: black;
            /* Set your desired text color */
            text-decoration: none;
            /* Remove underline */
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

        .third {
            padding: 0 1.5rem 0 1.5rem;
        }

        .form-control:focus {
            box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset, 0px 0px 7px rgba(0, 0, 0, 0.2);
        }
        ul {
            list-style: none;
            margin-top: 1rem;
            padding-inline-start: 0;
        }

        .ccontent li .wrapp {
            padding: 0.3rem 1rem 0.001rem 1rem;
        }

        .ccontent li:hover {
            background-color: rgb(117, 93, 255);
            color: white;
        }

        /* checkbox round */
        .checkbox-round {
            width: 13px;
            height: 13px;
            background-color: white;
            border-radius: 50%;
            /* vertical-align: middle; */
            border: 1px solid #838383;
            appearance: none;
            -webkit-appearance: none;
            outline: none;
            cursor: pointer;
        }

        .checkbox-round:checked {
            background-color: rgb(93, 166, 255);
        }

        /* checkbox round */

        .btn-outline-danger {
            color: #000000 !important;
        }

        .btn-outline-danger:hover {
            color: #ffffff !important;
        }
    </style>
@endpush

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Check List Kebutuhan Verifikasi</h3>
                        <h4 class="text-secondary">TKDN Barang</h4>
                        <hr>

                        {{-- @if (request('type-create') == 'get') --}}
                            <div class="form-gorup">
                                <label>Pilih Perhitungan</label>
                                <select name="computation_id" class="form-control" id="selectComputation">
                                    @if (count($computation) > 0)
                                        @foreach ($computation as $item)
                                            @if ($need->computation_id ==  $item->id)
                                                <option value="{{ $item->id }}" selected>{{ $item->id }}</option>
                                            @endif
                                            <option value="{{ $item->id }}">{{ $item->id }}</option>
                                        @endforeach
                                    @else
                                        <option value="">Empty data</option>
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                    @endif
                                </select>
                            </div>
                        {{-- @endif  --}}
                        <div class="form-gorup">
                            <label>Nama Perusahaan</label>
                            <input type="text" class="form-control" name="company_name" value="{{ auth()->user()->user_profile->company_name }}" readonly>
                        </div>
                        <div class="form-gorup">
                            <label>Jenis Produk</label>
                            <input type="text" class="form-control" name="jenis_product" value="{{ $need->computation->brand ?? '' }}" readonly>
                        </div>
                        <div class="form-gorup">
                            <label>Tipe Produk</label>
                            <input type="text" class="form-control" name="type_product" value="{{ $need->computation->product_type ?? '' }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="form-content">
            <div class="col-6">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <h4 class="card-title">I. DATA UMUM DAN ASPEK LEGAL</h4>
                        <p class="h6">PERUSAHAAN PEMOHON (BRAND OWNER)</p>
                    </div>
                    <div class="card-body" id="1-1">
                        {{-- Profil Perusahaan --}}
                        <div class="form-group d-flex align-items-center">
                            <button type="button" class="btn btn-outline-danger mr-2 flex-grow-1 text-left">
                                <i class="far fa-building"></i>
                                Profil Perusahaan
                            </button>
                            <div class="mr-2">
                                <a href="#" data-toggle="tooltip"
                                    title="This is a tooltip example that displays on the top">
                                    <span class="icon-question"></span>
                                </a>
                            </div>
                            <div class="mr-2">
                                <input type="checkbox" name="profil_perusahaan" class="checkbox-round">
                            </div>
                        </div>
                        {{-- Akta Pendidikan dan Akta Perubahan Terakhir --}}
                        <div class="form-group d-flex align-items-center">
                            <button type="button" class="btn btn-outline-danger mr-2 flex-grow-1 text-left">
                                <i class="far fa-file-archive"></i>
                                Akta Pendidikan dan Akta Perubahan Terakhir
                            </button>
                            <div class="mr-2">
                                <a href="#" data-toggle="tooltip"
                                    title="This is a tooltip example that displays on the top">
                                    <span class="icon-question"></span>
                                </a>
                            </div>
                            <div class="mr-2">
                                <input type="checkbox" name="akta_pendidikan" class="checkbox-round">
                            </div>
                        </div>
                        {{-- Izin Usaha IUI/UT/OSS --}}
                        <div class="form-group d-flex align-items-center">
                            <button type="button" class="btn btn-outline-danger mr-2 flex-grow-1 text-left">
                                <i class="far fa-file-code"></i>
                                Izin Usaha (IUI/UT/OSS)
                            </button>
                            <div class="mr-2">
                                <a href="#" data-toggle="tooltip"
                                    title="This is a tooltip example that displays on the top">
                                    <span class="icon-question"></span>
                                </a>
                            </div>
                            <div class="mr-2">
                                <input type="checkbox" name="izin_usaha_iui" class="checkbox-round">
                            </div>
                        </div>
                        {{-- Izin Usaha --}}
                        <div class="form-group d-flex align-items-center">
                            <button type="button" class="btn btn-outline-danger mr-2 flex-grow-1 text-left">
                                <i class="far fa-file-powerpoint"></i>
                                Izin Usaha
                            </button>
                            <div class="mr-2">
                                <a href="#" data-toggle="tooltip"
                                    title="This is a tooltip example that displays on the top">
                                    <span class="icon-question"></span>
                                </a>
                            </div>
                            <div class="mr-2">
                                <input type="checkbox" name="izin_usaha" class="checkbox-round">
                            </div>
                        </div>
                        {{-- Nomor Pokok Wajib Pajak (NPWP) --}}
                        <div class="form-group d-flex align-items-center">
                            <button type="button" class="btn btn-outline-danger mr-2 flex-grow-1 text-left">
                                <i class=" far fa-file"></i>
                                Nomor Pokok Wajib Pajak (NPWP)
                            </button>
                            <div class="mr-2">
                                <a href="#" data-toggle="tooltip"
                                    title="This is a tooltip example that displays on the top">
                                    <span class="icon-question"></span>
                                </a>
                            </div>
                            <div class="mr-2">
                                <input type="checkbox" name="npwp" class="checkbox-round">
                            </div>
                        </div>
                        {{-- Struktur Organisani --}}
                        <div class="form-group d-flex align-items-center">
                            <button type="button" class="btn btn-outline-danger mr-2 flex-grow-1 text-left">
                                <i class="fas fa-sitemap"></i>
                                Struktur Organisani
                            </button>
                            <div class="mr-2">
                                <a href="#" data-toggle="tooltip"
                                    title="This is a tooltip example that displays on the top">
                                    <span class="icon-question"></span>
                                </a>
                            </div>
                            <div class="mr-2">
                                <input type="checkbox" name="struktur_organisasi" class="checkbox-round">
                            </div>
                        </div>
                        {{-- Katalog Produk --}}
                        <div class="form-group d-flex align-items-center">
                            <button type="button" class="btn btn-outline-dark mr-2 flex-grow-1 text-left">
                                <i class="far fa-file-alt"></i>
                                Katalog Produk
                            </button>
                            <div class="mr-2">
                                <a href="#" data-toggle="tooltip"
                                    title="This is a tooltip example that displays on the top">
                                    <span class="icon-question"></span>
                                </a>
                            </div>
                            <div class="mr-2">
                                <input type="checkbox" name="katalog_produk" class="checkbox-round">
                            </div>
                        </div>
                        {{-- Sertifikat Merek --}}
                        <div class="form-group d-flex align-items-center">
                            <button type="button" class="btn btn-outline-dark mr-2 flex-grow-1 text-left">
                                <i class="far fa-file-powerpoint"></i>
                                Sertifikat Merek
                            </button>
                            <div class="mr-2">
                                <a href="#" data-toggle="tooltip"
                                    title="This is a tooltip example that displays on the top">
                                    <span class="icon-question"></span>
                                </a>
                            </div>
                            <div class="mr-2">
                                <input type="checkbox" name="sertifikat_merek" class="checkbox-round">
                            </div>
                        </div>
                        {{-- Surat Pelimpahan Penggunaan Merk --}}
                        <div class="form-group d-flex align-items-center">
                            <button type="button" class="btn btn-outline-dark mr-2 flex-grow-1 text-left">
                                <i class="far fa-file-pdf"></i>
                                Surat Pelimpahan Penggunaan Merk
                            </button>
                            <div class="mr-2">
                                <a href="#" data-toggle="tooltip"
                                    title="This is a tooltip example that displays on the top">
                                    <span class="icon-question"></span>
                                </a>
                            </div>
                            <div class="mr-2">
                                <input type="checkbox" name="surat_pelimpangan" class="checkbox-round">
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
                        <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist"
                            style="font-size: 11px">
                            <li class="nav-item">
                                <a class="nav-link active" id="bahan-baku-tab" data-toggle="pill" href="#bahan-baku"
                                    role="tab" aria-controls="bahan-baku" aria-selected="true">BAHAN BAKU
                                    LANGSUNG</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tenaga-kerja-tab" data-toggle="pill" href="#tenaga-kerja"
                                    role="tab" aria-controls="tenaga-kerja" aria-selected="false">TENAGA KERJA
                                    LANGSUNG</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="overhead-tab" data-toggle="pill" href="#overhead"
                                    role="tab" aria-controls="overhead" aria-selected="false">OVERHEAD PABRIK</a>
                            </li>
                        </ul>

                        <!-- content -->
                        <div class="tab-content" id="pills-tabContent p-3">
                            <!-- bahan baku -->
                            <div class="tab-pane fade show active" id="bahan-baku" role="tabpanel"
                                aria-labelledby="bahan-baku-tab">
                                <ul class="ccontent" id="2-1">
                                    {{-- Daftar Kebutuhan Bahan Baku Untuk Satuan Produk Yang Dinilai --}}
                                    <div class="form-group d-flex align-items-center">
                                        <button type="button"
                                            class="btn btn-outline-danger mr-2 flex-grow-1 text-left h6">
                                            <i class="far fa-file"></i>
                                            Daftar Kebutuhan Bahan Baku Untuk Satuan Produk Yang Dinilai
                                        </button>
                                        <div class="mr-2">
                                            <a href="#" data-toggle="tooltip"
                                                title="This is a tooltip example that displays on the top">
                                                <span class="icon-question"></span>
                                            </a>
                                        </div>
                                        <div class="mr-2">
                                            <input type="checkbox" name="daftar_kebutuhan" class="checkbox-round">
                                        </div>
                                    </div>
                                    {{-- Bukti Pembelian Bahan Baku Terhadap Produk Yang Dinilai --}}
                                    <div class="form-group d-flex align-items-center">
                                        <button type="button" class="btn btn-outline-dark mr-2 flex-grow-1 text-left h6">
                                            <i class="far fa-file"></i>
                                            Bukti Pembelian Bahan Baku Terhadap Produk Yang Dinilai
                                        </button>
                                        <div class="mr-2">
                                            <a href="#" data-toggle="tooltip"
                                                title="This is a tooltip example that displays on the top">
                                                <span class="icon-question"></span>
                                            </a>
                                        </div>
                                        <div class="mr-2">
                                            <input type="checkbox" name="bukti_pembelian" class="checkbox-round">
                                        </div>
                                    </div>
                                    {{-- Jasa Terkait Pembelian Bahan Baku --}}
                                    <div class="form-group d-flex align-items-center">
                                        <button type="button" class="btn btn-outline-dark mr-2 flex-grow-1 text-left h6">
                                            <i class="far fa-file"></i>
                                            Jasa Terkait Pembelian Bahan Baku
                                        </button>
                                        <div class="mr-2">
                                            <a href="#" data-toggle="tooltip"
                                                title="This is a tooltip example that displays on the top">
                                                <span class="icon-question"></span>
                                            </a>
                                        </div>
                                        <div class="mr-2">
                                            <input type="checkbox" name="jasa_bahan_baku" class="checkbox-round">
                                        </div>
                                    </div>
                                </ul>
                            </div>
                            <!-- tenaga kerja -->
                            <div class="tab-pane fade" id="tenaga-kerja" role="tabpanel" aria-labelledby="tenaga-kerja-tab">
                                <ul class="ccontent" id="2-2">
                                    {{-- List Gaji --}}
                                    <div class="form-group d-flex align-items-center">
                                        <button type="button"
                                            class="btn btn-outline-danger mr-2 flex-grow-1 text-left h6">
                                            <i class="fas fa-address-card"></i>
                                            List Gaji
                                        </button>
                                        <div class="mr-2">
                                            <a href="#" data-toggle="tooltip"
                                                title="This is a tooltip example that displays on the top">
                                                <span class="icon-question"></span>
                                            </a>
                                        </div>
                                        <div class="mr-2">
                                            <input type="checkbox" name="list_gaji" class="checkbox-round">
                                        </div>
                                    </div>
                                    {{-- Biaya Lembur --}}
                                    <div class="form-group d-flex align-items-center">
                                        <button type="button" class="btn btn-outline-dark mr-2 flex-grow-1 text-left h6">
                                            <i class="fas fa-address-card"></i>
                                            Biaya Lembur
                                        </button>
                                        <div class="mr-2">
                                            <a href="#" data-toggle="tooltip"
                                                title="This is a tooltip example that displays on the top">
                                                <span class="icon-question"></span>
                                            </a>
                                        </div>
                                        <div class="mr-2">
                                            <input type="checkbox" name="biaya_lembur" class="checkbox-round">
                                        </div>
                                    </div>
                                    {{-- Biaya Tunjangan --}}
                                    <div class="form-group d-flex align-items-center">
                                        <button type="button" class="btn btn-outline-dark mr-2 flex-grow-1 text-left h6">
                                            <i class="fas fa-address-card"></i>
                                            Biaya Tunjangan
                                        </button>
                                        <div class="mr-2">
                                            <a href="#" data-toggle="tooltip"
                                                title="This is a tooltip example that displays on the top">
                                                <span class="icon-question"></span>
                                            </a>
                                        </div>
                                        <div class="mr-2">
                                            <input type="checkbox" name="biaya_tunjangan" class="checkbox-round">
                                        </div>
                                    </div>
                                    {{-- Biaya Asuransi --}}
                                    <div class="form-group d-flex align-items-center">
                                        <button type="button" class="btn btn-outline-dark mr-2 flex-grow-1 text-left h6">
                                            <i class="fas fa-address-card"></i>
                                            Biaya Asuransi
                                        </button>
                                        <div class="mr-2">
                                            <a href="#" data-toggle="tooltip"
                                                title="This is a tooltip example that displays on the top">
                                                <span class="icon-question"></span>
                                            </a>
                                        </div>
                                        <div class="mr-2">
                                            <input type="checkbox" name="biaya_asuransi" class="checkbox-round">
                                        </div>
                                    </div>
                                    {{-- Biaya Pajak Penghasilan --}}
                                    <div class="form-group d-flex align-items-center">
                                        <button type="button" class="btn btn-outline-dark mr-2 flex-grow-1 text-left h6">
                                            <i class="fas fa-address-card"></i>
                                            Biaya Pajak Penghasilan
                                        </button>
                                        <div class="mr-2">
                                            <a href="#" data-toggle="tooltip"
                                                title="This is a tooltip example that displays on the top">
                                                <span class="icon-question"></span>
                                            </a>
                                        </div>
                                        <div class="mr-2">
                                            <input type="checkbox" name="biaya_pajak_penghasilan" class="checkbox-round">
                                        </div>
                                    </div>
                                    {{-- Biaya Lain - lain --}}
                                    <div class="form-group d-flex align-items-center">
                                        <button type="button" class="btn btn-outline-dark mr-2 flex-grow-1 text-left h6">
                                            <i class="fas fa-address-card"></i>
                                            Biaya Lain - lain
                                        </button>
                                        <div class="mr-2">
                                            <a href="#" data-toggle="tooltip"
                                                title="This is a tooltip example that displays on the top">
                                                <span class="icon-question"></span>
                                            </a>
                                        </div>
                                        <div class="mr-2">
                                            <input type="checkbox" name="biaya_lain_lain" class="checkbox-round">
                                        </div>
                                    </div>
                                </ul>
                                
                                <p class="text-danger">* Disertai Dengan Slip Gaji</p>
                            </div>
                            <!-- overhead -->
                            <div class="tab-pane fade third" id="overhead" role="tabpanel" aria-labelledby="overhead-tab">
                                <ul class="ccontent" id="2-3">
                                    {{-- Layout Pabrik --}}
                                    <div class="form-group d-flex align-items-center">
                                        <button type="button"
                                            class="btn btn-outline-danger mr-2 flex-grow-1 text-left h6">
                                            <i class="far fa-building"></i>
                                            Layout Pabrik
                                        </button>
                                        <div class="mr-2">
                                            <a href="#" data-toggle="tooltip"
                                                title="This is a tooltip example that displays on the top">
                                                <span class="icon-question"></span>
                                            </a>
                                        </div>
                                        <div class="mr-2">
                                            <input type="checkbox" name="layout_pabrik" class="checkbox-round">
                                        </div>
                                    </div>
                                    {{-- Daftar Mesin Dan Nilai Depresiasi/Sewa Mesin --}}
                                    <div class="form-group d-flex align-items-center">
                                        <button type="button"
                                            class="btn btn-outline-danger mr-2 flex-grow-1 text-left h6">
                                            <i class="fas fa-address-card"></i>
                                            Daftar Mesin Dan Nilai Depresiasi/Sewa Mesin
                                        </button>
                                        <div class="mr-2">
                                            <a href="#" data-toggle="tooltip"
                                                title="This is a tooltip example that displays on the top">
                                                <span class="icon-question"></span>
                                            </a>
                                        </div>
                                        <div class="mr-2">
                                            <input type="checkbox" name="daftar_mesin" class="checkbox-round">
                                        </div>
                                    </div>
                                    {{-- List Gaji Tenaga Kerja Tidak Langsung --}}
                                    <div class="form-group d-flex align-items-center">
                                        <button type="button"
                                            class="btn btn-outline-danger mr-2 flex-grow-1 text-left h6">
                                            <i class="fas fa-address-card"></i>
                                            List Gaji Tenaga Kerja Tidak Langsung
                                        </button>
                                        <div class="mr-2">
                                            <a href="#" data-toggle="tooltip"
                                                title="This is a tooltip example that displays on the top">
                                                <span class="icon-question"></span>
                                            </a>
                                        </div>
                                        <div class="mr-2">
                                            <input type="checkbox" name="list_gaji_tenaga_kerja_tidak_langsung" class="checkbox-round">
                                        </div>
                                    </div>
                                    {{-- Biaya Asuransi, Pajak Dan Tunjangan Tenaga Kerja Tidak Langsung --}}
                                    <div class="form-group d-flex align-items-center">
                                        <button type="button" class="btn btn-outline-dark mr-2 flex-grow-1 text-left h6">
                                            <i class="fas fa-address-card"></i>
                                            Biaya Asuransi, Pajak Dan Tunjangan Tenaga Kerja Tidak Langsung
                                        </button>
                                        <div class="mr-2">
                                            <a href="#" data-toggle="tooltip"
                                                title="This is a tooltip example that displays on the top">
                                                <span class="icon-question"></span>
                                            </a>
                                        </div>
                                        <div class="mr-2">
                                            <input type="checkbox" name="biaya_asuransi" class="checkbox-round">
                                        </div>
                                    </div>
                                    {{-- Bukti Pembayaran PLN, Air, Telepon Dalam 3 Bulan Terakhir --}}
                                    <div class="form-group d-flex align-items-center">
                                        <button type="button"
                                            class="btn btn-outline-danger mr-2 flex-grow-1 text-left h6">
                                            <i class="fas fa-address-card"></i>
                                            Bukti Pembayaran PLN, Air, Telepon Dalam 3 Bulan Terakhir
                                        </button>
                                        <div class="mr-2">
                                            <a href="#" data-toggle="tooltip"
                                                title="This is a tooltip example that displays on the top">
                                                <span class="icon-question"></span>
                                            </a>
                                        </div>
                                        <div class="mr-2">
                                            <input type="checkbox" name="bukti_pembayaran_pln" class="checkbox-round">
                                        </div>
                                    </div>
                                    {{-- Bukti Pembayaran Consumable --}}
                                    <div class="form-group d-flex align-items-center">
                                        <button type="button" class="btn btn-outline-dark mr-2 flex-grow-1 text-left h6">
                                            <i class="fas fa-address-card"></i>
                                            Bukti Pembayaran Consumable
                                        </button>
                                        <div class="mr-2">
                                            <a href="#" data-toggle="tooltip"
                                                title="This is a tooltip example that displays on the top">
                                                <span class="icon-question"></span>
                                            </a>
                                        </div>
                                        <div class="mr-2">
                                            <input type="checkbox" name="bukti_pembayaran_consumable" class="checkbox-round">
                                        </div>
                                    </div>
                                    {{-- Biaya Depresiasi / Sewa Gedung Pabrik, Tanah --}}
                                    <div class="form-group d-flex align-items-center">
                                        <button type="button" class="btn btn-outline-dark mr-2 flex-grow-1 text-left h6">
                                            <i class="fas fa-address-card"></i>
                                            Biaya Depresiasi / Sewa Gedung Pabrik, Tanah
                                        </button>
                                        <div class="mr-2">
                                            <a href="#" data-toggle="tooltip"
                                                title="This is a tooltip example that displays on the top">
                                                <span class="icon-question"></span>
                                            </a>
                                        </div>
                                        <div class="mr-2">
                                            <input type="checkbox" name="biaya_depresiasi_sewa_gedung_pabrik_tanah" class="checkbox-round">
                                        </div>
                                    </div>
                                    {{-- Asuransi Gedung Pabrik Dan Mesin Produksi --}}
                                    <div class="form-group d-flex align-items-center">
                                        <button type="button" class="btn btn-outline-dark mr-2 flex-grow-1 text-left h6">
                                            <i class="fas fa-address-card"></i>
                                            Asuransi Gedung Pabrik Dan Mesin Produksi
                                        </button>
                                        <div class="mr-2">
                                            <a href="#" data-toggle="tooltip"
                                                title="This is a tooltip example that displays on the top">
                                                <span class="icon-question"></span>
                                            </a>
                                        </div>
                                        <div class="mr-2">
                                            <input type="checkbox" name="asuransi_gedung_pabrik_dan_mesin_produksi" class="checkbox-round">
                                        </div>
                                    </div>
                                    {{-- Biaya Lisensi Dan Patent --}}
                                    <div class="form-group d-flex align-items-center">
                                        <button type="button" class="btn btn-outline-dark mr-2 flex-grow-1 text-left h6">
                                            <i class="fas fa-address-card"></i>
                                            Biaya Lisensi Dan Patent
                                        </button>
                                        <div class="mr-2">
                                            <a href="#" data-toggle="tooltip"
                                                title="This is a tooltip example that displays on the top">
                                                <span class="icon-question"></span>
                                            </a>
                                        </div>
                                        <div class="mr-2">
                                            <input type="checkbox" name="biaya_lisensi_dan_patent" class="checkbox-round">
                                        </div>
                                    </div>
                                    {{-- Biaya Sertifikasi --}}
                                    <div class="form-group d-flex align-items-center">
                                        <button type="button" class="btn btn-outline-dark mr-2 flex-grow-1 text-left h6">
                                            <i class="fas fa-address-card"></i>
                                            Biaya Sertifikasi
                                        </button>
                                        <div class="mr-2">
                                            <a href="#" data-toggle="tooltip"
                                                title="This is a tooltip example that displays on the top">
                                                <span class="icon-question"></span>
                                            </a>
                                        </div>
                                        <div class="mr-2">
                                            <input type="checkbox" name="biaya_sertifikasi" class="checkbox-round">
                                        </div>
                                    </div>
                                    {{-- Biaya Perawatan, Perbaikan, Dan Suku Cadang --}}
                                    <div class="form-group d-flex align-items-center">
                                        <button type="button" class="btn btn-outline-dark mr-2 flex-grow-1 text-left h6">
                                            <i class="fas fa-address-card"></i>
                                            Biaya Perawatan, Perbaikan, Dan Suku Cadang
                                        </button>
                                        <div class="mr-2">
                                            <a href="#" data-toggle="tooltip"
                                                title="This is a tooltip example that displays on the top">
                                                <span class="icon-question"></span>
                                            </a>
                                        </div>
                                        <div class="mr-2">
                                            <input type="checkbox" name="biaya_perawatan_perbaikan_dan_suku_cadang" class="checkbox-round">
                                        </div>
                                    </div>
                                    {{-- Pajak Bumi Dan Bangunan --}}
                                    <div class="form-group d-flex align-items-center">
                                        <button type="button"
                                            class="btn btn-outline-danger mr-2 flex-grow-1 text-left h6">
                                            <i class="fas fa-address-card"></i>
                                            Pajak Bumi Dan Bangunan
                                        </button>
                                        <div class="mr-2">
                                            <a href="#" data-toggle="tooltip"
                                                title="This is a tooltip example that displays on the top">
                                                <span class="icon-question"></span>
                                            </a>
                                        </div>
                                        <div class="mr-2">
                                            <input type="checkbox" name="pajak_bumi_dan_bangunan" class="checkbox-round">
                                        </div>
                                    </div>
                                    {{-- Biaya Pengujian Produk --}}
                                    <div class="form-group d-flex align-items-center">
                                        <button type="button" class="btn btn-outline-dark mr-2 flex-grow-1 text-left h6">
                                            <i class="fas fa-address-card"></i>
                                            Biaya Pengujian Produk
                                        </button>
                                        <div class="mr-2">
                                            <a href="#" data-toggle="tooltip"
                                                title="This is a tooltip example that displays on the top">
                                                <span class="icon-question"></span>
                                            </a>
                                        </div>
                                        <div class="mr-2">
                                            <input type="checkbox" name="biaya_pengujian_produk" class="checkbox-round">
                                        </div>
                                    </div>
                                    {{-- Biaya Program Mutu --}}
                                    <div class="form-group d-flex align-items-center">
                                        <button type="button" class="btn btn-outline-dark mr-2 flex-grow-1 text-left h6">
                                            <i class="fas fa-address-card"></i>
                                            Biaya Program Mutu
                                        </button>
                                        <div class="mr-2">
                                            <a href="#" data-toggle="tooltip"
                                                title="This is a tooltip example that displays on the top">
                                                <span class="icon-question"></span>
                                            </a>
                                        </div>
                                        <div class="mr-2">
                                            <input type="checkbox" name="biaya_program_mutu" class="checkbox-round">
                                        </div>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card p-2">
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-warning mr-2">Reset</button>
                        <button class="btn btn-success" id="simpan"
                            onclick="update('{{ route('needs.store') }}', '{{ route('needs.index') }}', '{{ $need->id }}')">
                            Simpan
                        </button>
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
    <script src="{{ asset('library/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <script>
        // var data = <?= json_encode($need) ?>;
        // datas = JSON.parse(response.jsonNeeds.json_needs);
        
        // var jsonParse = JSON.parse('{{ json_encode($need) }}');
        let formData = {};
        let datas = {};
        // get data
        $.ajax({
            type: 'GET',
            url: '{{ $need->id != null ? route('needs.show', $need->id) : 'fail' }}',
            success: function(response) {
                // datas = JSON.parse(response.jsonNeeds.json_needs);
                datas = response.jsonNeeds.json_needs;
                datas["1-1"].forEach(function(data) {
                    var val = data.value;
                    console.log(val);
                    $('input[name="' + data.name + '"]').prop('checked', val);
                });
                datas["2-1"].forEach(function(data) {
                    var val = data.value;
                    $('input[name="' + data.name + '"]').prop('checked', val);
                });
                datas["2-2"].forEach(function(data) {
                    var val = data.value;
                    $('input[name="' + data.name + '"]').prop('checked', val);
                });
                datas["2-3"].forEach(function(data) {
                    var val = data.value;
                    $('input[name="' + data.name + '"]').prop('checked', val);
                });
            },
            error: function(error) {
                console.log("error");
            }
        });
        // update data 
        function update(url, redirectUrl, id) {
            formData["1-1"] = [];
            $("#1-1 input[type='checkbox']").each(function(){
                var checkboxName = $(this).attr('name');
                var checkboxValue = $(this).prop('checked');
                formData["1-1"].push({ name: checkboxName, value: checkboxValue });
            });

            // Process data for "2-1"
            formData["2-1"] = [];
            $("#2-1 input[type='checkbox']").each(function(){
                var checkboxName = $(this).attr('name');
                var checkboxValue = $(this).prop('checked');
                formData["2-1"].push({ name: checkboxName, value: checkboxValue });
            });

            // Process data for "2-2"
            formData["2-2"] = [];
            $("#2-2 input[type='checkbox']").each(function(){
                var checkboxName = $(this).attr('name');
                var checkboxValue = $(this).prop('checked');
                formData["2-2"].push({ name: checkboxName, value: checkboxValue });
            });

            // Process data for "2-3"
            formData["2-3"] = [];
            $("#2-3 input[type='checkbox']").each(function(){
                var checkboxName = $(this).attr('name');
                var checkboxValue = $(this).prop('checked');
                formData["2-3"].push({ name: checkboxName, value: checkboxValue });
            });
            var arrToString = JSON.stringify(formData);
            var computationId = $('#selectComputation').find(":selected").val();

            formDataStore = {
                json_needs: arrToString,
                computation_id: computationId,
                id: id,
            };
            // console.log(formDataStore);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var approveUrl = $(this).attr('href');
            swal({
                    title: 'Are you sure?',
                    text: 'Do you want to make calculations?',
                    icon: 'warning',
                    buttons: [
                        'No',
                        'Yes'
                    ],
                }).then(function(isConfirm) {
                    if (isConfirm) {
                        window.location.href = approveUrl;
                        // swal({
                        //     title: 'Shortlisted!',
                        //     text: 'Candidates are successfully shortlisted!',
                        //     icon: 'success'
                        // }).then(function() {
                        //     form.submit(); // <--- submit form programmatically
                        // });
                    } else {
                        // simpan list kebutuhan
                        $.ajax({
                            type: 'POST',
                            url: url,
                            data: formDataStore,
                            success: function(response) {
                                swal({
                                    title: "Success",
                                    text: response.success,
                                    icon: "success"
                                }).then((willRedirect) => {
                                    if (willRedirect) {
                                        location.href = redirectUrl
                                    } else {
                                        // calculations = JSON.parse(response.calculationResult.results);
                                    }
                                });
                            },
                            error: function(error) {
                                console.log(error);
                            }
                        });
                    }
                });


        }
        console.log(datas);
    </script>
@endpush
