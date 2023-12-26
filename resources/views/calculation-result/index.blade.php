@extends('layouts.app')

@section('title', 'Perhitungan Data')

@push('style')
    <link href="{{ asset('assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <style>
        tr.spaceUnder>td {
            padding-bottom: 1em;
        }
    </style>
@endpush

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <div class="float-left">
                            <a href="{{ route('computation.index') }}" class="bg-primary px-2 py-1 text-light rounded-lg d-flex align-items-center">
                                <i class="fas fa-chevron-left mr-2"></i> Back To Computation
                            </a>
                        </div>
                        <div class="float-right">
                            <button
                                class="badge badge-{{ $computation->permenperin_category->color }}">{{ $computation->permenperin_category->name }}</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="text-dark h6">
                            <tr class="spaceUnder">
                                <td>Hasil Produksi</td>
                                <td width="10">:</td>
                                <td>{{ $computation->production_result }}</td>
                            </tr>
                            <tr class="spaceUnder">
                                <td>Jenis Produk</td>
                                <td>:</td>
                                <td>{{ $computation->product_type }}</td>
                            </tr>
                            <tr class="spaceUnder">
                                <td>Spesifikasi</td>
                                <td>:</td>
                                <td>{{ $computation->specification }}</td>
                            </tr>
                            <tr class="spaceUnder">
                                <td>Merek & Tipe</td>
                                <td>:</td>
                                <td>{{ $computation->brand }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content" id="v-pills-tabContent">
                            {{-- tab content 1.1 bahan baku --}}
                            <div class="tab-pane fade show active" id="v-bahan-baku" role="tabpanel"
                                aria-labelledby="v-bahan-baku-tab">
                                <div class="row">
                                    <div class="col">
                                        <h5>Form 1.1 : Tingkat Komponen Dalam Negeri Bahan Baku</h5>
                                        <p style="font-size: 13px; opacity: 60%;">List data bahan baku langsung / tidak
                                            langsung</p>
                                    </div>
                                </div>
                                <div class="row card">
                                    <div class="col ">
                                        <form action="" class="d-flex flex-wrap" style="width: 100%" id="form-1"
                                            method="post">
                                            <div class="form-group-sm mx-2 mt-2" style="font-size: 10pt; width : 13rem">
                                                <label for="bahan_baku">Nama Bahan Baku <i data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Nama bahan baku adalah nama yang ditunjukkan pada nama material bahan baku dalam pembuatan produk. Contoh : Biji besi, Bracket dll"
                                                        class="fas fa-info-circle">
                                                    </i></label>
                                                <input type="text" name="bahan_baku"
                                                    class="form-control form-control-sm trigger-enter" id="bahan_baku"
                                                    placeholder="" required>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="spesifikasi">Spesifikasi <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" name="spesifikasi"
                                                    class="form-control form-control-sm trigger-enter" id="spesifikasi"
                                                    placeholder="" required>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="satuan_bahan_baku">Satuan bahan baku <i
                                                        class="fas fa-info-circle" data-toggle="tooltip"
                                                        data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <select class="form-control form-control-sm trigger-enter"
                                                    id="satuan_bahan_baku" name="satuan_bahan_baku" required>
                                                    <option></option>
                                                    <option value="Pcs">Pcs</option>
                                                    <option value="Pack">Pack</option>
                                                    <option value="Kg">Kg</option>
                                                    <option value="Liter">Liter</option>
                                                    <option value="Meter">Meter</option>
                                                </select>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="negara_asal">Negara asal <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <select class="form-control form-control-sm trigger-enter" id="negara_asal"
                                                    name="negara_asal" required>
                                                    <option></option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country }}" {{ $country == "Indonesia" ? "selected" : "" }}>{{ $country }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="pemasok">Pemasok / Produsen Tingkat 2 <i
                                                        class="fas fa-info-circle" data-toggle="tooltip"
                                                        data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" name="pemasok"
                                                    class="form-control form-control-sm trigger-enter" id="pemasok"
                                                    placeholder="" required>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="tkdn">TKDN % <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text"
                                                    class="form-control form-control-sm trigger-enter replaceDot currencyInputFormatter"
                                                    id="tkdn" name="tkdn" placeholder="" value="0,00">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="jumlah">Jumlah / Satuan Bahan Baku <i
                                                        class="fas fa-info-circle" data-toggle="tooltip"
                                                        data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" name="jumlah"
                                                    class="form-control form-control-sm trigger-enter currencyInputFormatter"
                                                    id="jumlah" placeholder="" value="0,00">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="harga_satuan">Harga Satuan Material <i
                                                        class="fas fa-info-circle" data-toggle="tooltip"
                                                        data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <div class="input-group input-group-sm mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control trigger-enter currencyInputFormatter"
                                                        placeholder="" id="harga_satuan" name="harga_satuan" required
                                                        autocomplete="off" value="0,00">
                                                </div>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt;">
                                                <div class="card p-2">
                                                    <div class="col">
                                                        <div class="row">
                                                            <label for="" class="mx-auto">Pajak <i
                                                                    class="fas fa-info-circle" data-toggle="tooltip"
                                                                    data-placement="top" title="Tooltip on top">
                                                                </i></label>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group-sm ml-2" style="font-size: 7pt;">
                                                                <label for="bm">BM %</label>
                                                                <input type="text" name="bm" style="width: 5rem"
                                                                    class="form-control form-control-sm replaceDot trigger-enter currencyInputFormatter"
                                                                    id="bm" placeholder="" value="0,00">
                                                            </div>
                                                            <div class="form-group-sm ml-2" style="font-size: 7pt;">
                                                                <label for="ppn">PPN %</label>
                                                                <input type="text" name="ppn" style="width: 5rem"
                                                                    class="form-control form-control-sm replaceDot trigger-enter currencyInputFormatter"
                                                                    id="ppn" placeholder="" value="0,00">
                                                            </div>
                                                            <div class="form-group-sm ml-2" style="font-size: 7pt;">
                                                                <label for="pph">PPH %</label>
                                                                <input type="text" name="pph" style="width: 5rem"
                                                                    class="form-control form-control-sm replaceDot trigger-enter currencyInputFormatter"
                                                                    id="pph" placeholder="" value="0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end"
                                                style="font-size: 10pt; width : 100%;">
                                                <button class="btn btn-sm btn-success" type="submit"><i
                                                        class="fa fa-save"></i> Simpan</button>
                                            </div>
                                        </form><br>
                                    </div>
                                </div>

                                <div class="row card">
                                    <div class="col p-2">
                                        <form class="form-inline">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="fa fa-search"></i></span>
                                                </div>
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="Search" aria-label="Username"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col p-1">
                                        <div class="table-responsive table-responsive-sm">
                                            <table class="table table-striped table-hover" style="font-size: 8pt">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-nowrap pr-4">Aksi</th>
                                                        <th scope="col" class="text-nowrap pr-4">No</th>
                                                        <th style="width:70%" scope="col" class="text-nowrap pr-4">
                                                            Nama Bahan Baku</th>
                                                        <th scope="col" class="text-nowrap pr-4">Spesifikasi</th>
                                                        <th scope="col" class="text-nowrap pr-4">Satuan Bahan Baku</th>
                                                        <th scope="col" class="text-nowrap pr-4">Negara Asal</th>
                                                        <th scope="col" class="text-nowrap pr-4">Pemasok / Produsen
                                                            Tingkat 2</th>
                                                        <th scope="col" class="text-nowrap pr-4">TKDN %</th>
                                                        <th scope="col" class="text-nowrap pr-4">Jumlah / Satuan Bahan
                                                            Baku</th>
                                                        <th scope="col" class="text-nowrap pr-4">Harga Satuan Material
                                                            (Rp)</th>
                                                        <th scope="col" class="text-nowrap pr-4">KDN</th>
                                                        <th scope="col" class="text-nowrap pr-4">KLN</th>
                                                        <th scope="col" class="text-nowrap pr-4">Total</th>
                                                        <th scope="col" class="text-nowrap pr-4">PPN</th>
                                                        <th scope="col" class="text-nowrap pr-4">BM</th>
                                                        <th scope="col" class="text-nowrap pr-4">PPH</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody-1">
                                                    {{-- append javascript --}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="row card">
                                    <div class="d-flex">
                                        <div class="col pt-4 d-flex align-items-center justify-content-end">
                                            <p class="mr-2 text-right">Total</p>
                                        </div>
                                        <div class="col-7 p-1">
                                            <div class="table-responsive table-responsive-sm">
                                                <table class="table table-bordered table-hover" style="font-size: 8pt">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th scope="col" class="text-nowrap pr-4">KDN</th>
                                                            <th scope="col" class="text-nowrap pr-4">KLN</th>
                                                            <th scope="col" class="text-nowrap pr-4">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td id="sum-kdn">Rp.0</td>
                                                            <td id="sum-kln">Rp.0</td>
                                                            <td id="sum-total">Rp.0</td>
                                                        </tr>
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="col d-flex justify-content-end align-items-center"
                                            style="padding-top: 4.5rem">
                                            <p class="text-right">Total</p>
                                        </div>
                                        <div class="col-9 p-1">
                                            <div class="table-responsive table-responsive-sm">
                                                <table class="table table-bordered table-hover" style="font-size: 8pt">
                                                    <thead style="text-align: center"class="thead-dark">
                                                        <tr>
                                                            <th scope="col" class="text-nowrap pr-4" colspan="4">
                                                                Pajak
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col" class="text-nowrap pr-4">BM</th>
                                                            <th scope="col" class="text-nowrap pr-4">PPN</th>
                                                            <th scope="col" class="text-nowrap pr-4">PPH</th>
                                                            <th scope="col" class="text-nowrap pr-4">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td id="sum-bm">Rp.0</td>
                                                            <td id="sum-ppn">Rp.0</td>
                                                            <td id="sum-pph">Rp.0</td>
                                                            <td id="sum-pajak-total">Rp.0</td>
                                                        </tr>
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- tab content 1.2 jasa bahan baku --}}
                            <div class="tab-pane fade" id="v-jasa-bahan-baku" role="tabpanel"
                                aria-labelledby="v-jasa-bahan-baku-tab">
                                <div class="row">
                                    <div class="col">
                                        <h5>Form 1.2 : Tingkat Komponen Dalam Negeri Bahan Baku</h5>
                                        <p style="font-size: 13px; opacity: 60%;">List data bahan baku untuk jasa jasa
                                            terkait</p>
                                    </div>
                                </div>
                                <div class="row card">
                                    <div class="col ">
                                        <form class="d-flex flex-wrap" style="width: 100%" id="form-2"
                                            method="post">
                                            <div class="form-group-sm mx-2 mt-2" style="font-size: 10pt; width : 13rem">
                                                <label for="">Jasa Terkait <i data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Nama bahan baku adalah nama yang ditunjukkan pada nama material bahan baku dalam pembuatan produk. Contoh : Biji besi, Bracket dll"
                                                        class="fas fa-info-circle">
                                                    </i></label>
                                                <input type="text" name="uraian"
                                                    class="form-control trigger-enter form-control-sm " id=""
                                                    placeholder="" required>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Pemasok / Produsen Tingkat 2 <i
                                                        class="fas fa-info-circle" data-toggle="tooltip"
                                                        data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" name="produsen_tingkat_dua"
                                                    class="form-control trigger-enter form-control-sm" id=""
                                                    placeholder="" required>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Jumlah <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text"
                                                    class="form-control trigger-enter form-control-sm currencyInputFormatter"
                                                    id="" placeholder="" name="jumlah" value="0,00">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">TKDN % <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text"
                                                    class="form-control trigger-enter form-control-sm replaceDot currencyInputFormatter"
                                                    id="" placeholder="" name="tkdn" value="0,00">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Biaya <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <div class="input-group input-group-sm mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control trigger-enter currencyInputFormatter"
                                                        placeholder="" id="1-2-biaya" name="biaya" required
                                                        autocomplete="off" value="0,00">
                                                </div>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Alokasi Biaya % <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text"
                                                    class="form-control trigger-enter form-control-sm replaceDot currencyInputFormatter"
                                                    id="" placeholder="" name="alokasi" value="0,00">
                                            </div>

                                            <div class="d-flex justify-content-end mt-2"
                                                style="font-size: 10pt; width : 100%;">
                                                <button class="btn btn-sm btn-success" type="submit"><i
                                                        class="fa fa-save"></i> Simpan</button>
                                            </div>
                                        </form><br>

                                    </div>
                                </div>
                                <div class="row card">
                                    <div class="col p-2">
                                        <form class="form-inline">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="fa fa-search"></i></span>
                                                </div>
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="Search" aria-label="Username"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col p-1">
                                        <div class="table-responsive table-responsive-sm">
                                            <table class="table table-striped table-hover" style="font-size: 8pt">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-nowrap pr-4">Aksi</th>
                                                        <th scope="col" class="text-nowrap pr-4">No</th>
                                                        <th scope="col" class="text-nowrap pr-4">Uraian</th>
                                                        <th scope="col" class="text-nowrap pr-4">Pemasok / Produsen
                                                            Tingkat 2</th>
                                                        <th scope="col" class="text-nowrap pr-4">Jumlah</th>
                                                        <th scope="col" class="text-nowrap pr-4">TKDN %</th>
                                                        <th scope="col" class="text-nowrap pr-4">Biaya (Rp)</th>
                                                        <th scope="col" class="text-nowrap pr-4">Alokasi</th>
                                                        <th scope="col" class="text-nowrap pr-4">KDN</th>
                                                        <th scope="col" class="text-nowrap pr-4">KLN</th>
                                                        <th scope="col" class="text-nowrap pr-4">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody-2">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row card">
                                    <div class="d-flex">
                                        <div class="col pt-4 d-flex justify-content-end align-items-center">
                                            <p class="mr-2 text-right">Total</p>
                                        </div>
                                        <div class="col-7 p-1">
                                            <div class="table-responsive table-responsive-sm">
                                                <table class="table table-bordered table-hover" style="font-size: 8pt">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th scope="col" class="text-nowrap pr-4">KDN</th>
                                                            <th scope="col" class="text-nowrap pr-4">KLN</th>
                                                            <th scope="col" class="text-nowrap pr-4">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td id="sumKdn-1-2">Rp.0</td>
                                                            <td id="sumKln-1-2">Rp.0</td>
                                                            <td id="sumTotal-1-2">Rp.0</td>
                                                        </tr>
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- tab content 1.3 biaya tenaga kerja langsung --}}
                            <div class="tab-pane fade" id="v-tenaga-kerja-langsung" role="tabpanel"
                                aria-labelledby="v-tenaga-kerja-langsung-tab">

                                <div class="row">
                                    <div class="col">
                                        <h5>Form 1.3 : Tingkat Komponen Dalam Tenaga Kerja Langsung</h5>
                                        <p style="font-size: 13px; opacity: 60%;">List data tenaga kerja langsung</p>
                                    </div>
                                </div>
                                <div class="row card">
                                    <div class="col ">
                                        <form class="d-flex flex-wrap" style="width: 100%" method="post"
                                            id="form-3">
                                            <div class="form-group-sm mx-2 mt-2" style="font-size: 10pt; width : 13rem">
                                                <label for="">Uraian Posisi <i data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Nama bahan baku adalah nama yang ditunjukkan pada nama material bahan baku dalam pembuatan produk. Contoh : Biji besi, Bracket dll"
                                                        class="fas fa-info-circle">
                                                    </i></label>
                                                <input type="text" class="form-control trigger-enter form-control-sm"
                                                    id="" placeholder="" name="uraian_posisi" required>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Kewarganegaraan <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <select class="form-control trigger-enter form-control-sm setTkdn"
                                                    id="" name="kewarganegaraan" required>
                                                    <option></option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country }}" {{ $country == "Indonesia" ? "selected" : "" }}>{{ $country }}</option>
                                                    @endforeach
                                                </select>
                                                <input type="hidden" id="tkdn-1-3" value="" name="tkdn">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Jumlah Orang <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="number" class="form-control trigger-enter form-control-sm"
                                                    id="" placeholder="" name="jumlah_orang" value="" required>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Gaji Perbulan<i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <div class="input-group input-group-sm mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control trigger-enter currencyInputFormatter"
                                                        placeholder="" id="1-2-gaji_perbulan" name="gaji_perbulan"
                                                        required autocomplete="off" value="0,00">
                                                </div>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Alokasi Gaji % <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text"
                                                    class="form-control trigger-enter form-control-sm replaceDot currencyInputFormatter"
                                                    id="" placeholder="" name="alokasi_gaji" value="0,00">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt;">
                                                <div class="card p-2">
                                                    <div class="col">
                                                        <div class="row">
                                                            <label for="" class="mx-auto">Biaya (Rp.) <i
                                                                    class="fas fa-info-circle" data-toggle="tooltip"
                                                                    data-placement="top" title="Tooltip on top">
                                                                </i></label>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group-sm ml-2" style="font-size: 7pt;">
                                                                <label for="">BPJS</label>
                                                                <div class="input-group input-group-sm mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"
                                                                            id="basic-addon1">Rp.</span>
                                                                    </div>
                                                                    <input type="text"
                                                                        class="form-control trigger-enter form-control-sm currencyInputFormatter"
                                                                        placeholder="" id="bpjs" name="bpjs"
                                                                        required autocomplete="off" value="0,00">
                                                                </div>
                                                            </div>
                                                            <div class="form-group-sm ml-2" style="font-size: 7pt;">
                                                                <label for="">Tunjangan Lainnya</label>
                                                                <div class="input-group input-group-sm mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"
                                                                            id="basic-addon1">Rp.</span>
                                                                    </div>
                                                                    <input type="text"
                                                                        class="form-control trigger-enter form-control-sm currencyInputFormatter"
                                                                        placeholder="" id="currency_tunjangan_lainnya"
                                                                        name="currency_tunjangan_lainnya" required
                                                                        autocomplete="off" value="0,00">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-end"
                                                style="font-size: 10pt; width : 100%;">
                                                <button class="btn btn-sm btn-success" type="submit"><i
                                                        class="fa fa-save"></i> Simpan</button>
                                            </div>
                                        </form><br>

                                    </div>
                                </div>
                                <div class="row card">
                                    <div class="col p-2">
                                        <form class="form-inline">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="fa fa-search"></i></span>
                                                </div>
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="Search" aria-label="Username"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col p-1">
                                        <div class="table-responsive table-responsive-sm">
                                            <table class="table table-striped table-hover" style="font-size: 8pt">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-nowrap pr-4">Aksi</th>
                                                        <th scope="col" class="text-nowrap pr-4">No</th>
                                                        <th scope="col" class="text-nowrap pr-4">Uraian Posisi</th>
                                                        <th scope="col" class="text-nowrap pr-4">Kewarganegaraan</th>
                                                        <th scope="col" class="text-nowrap pr-4">TKDN %</th>
                                                        <th scope="col" class="text-nowrap pr-4">Jumlah Orang</th>
                                                        <th scope="col" class="text-nowrap pr-4">Gaji Per Bulan (Rp)
                                                        </th>
                                                        <th scope="col" class="text-nowrap pr-4">Alokasi %</th>
                                                        <th scope="col" class="text-nowrap pr-4">KDN</th>
                                                        <th scope="col" class="text-nowrap pr-4">KLN</th>
                                                        <th scope="col" class="text-nowrap pr-4">Total</th>
                                                        <th scope="col" class="text-nowrap pr-4">BPJS</th>
                                                        <th scope="col" class="text-nowrap pr-4">Tunjangan Lainnya</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody-3">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row card">
                                    <div class="d-flex justify-content-end">
                                        <div class="w-100 p-1">
                                            <div class="w-100">
                                                <table class="table table-bordered table-hover" style="font-size: 8pt">
                                                    <tr class="bg-dark text-light">
                                                        <th rowspan="2"
                                                            class="text-nowrap h-auto align-bottom w-50 bg-white text-dark"
                                                            style="font-size: 10pt">Total</th>
                                                        <th scope="col" class="text-nowrap pr-4">Jumlah Orang</th>
                                                        <th scope="col" class="text-nowrap pr-4">KDN</th>
                                                        <th scope="col" class="text-nowrap pr-4">KLN</th>
                                                        <th scope="col" class="text-nowrap pr-4">Total</th>
                                                    </tr>
                                                    <tr>
                                                        <td id="1-3-sumJumlahOrang">0</td>
                                                        <td id="1-3-sumKdn">Rp.0</td>
                                                        <td id="1-3-sumKln">Rp.0</td>
                                                        <td id="1-3-sumTotal">Rp.0</td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2"
                                                            class="text-nowrap h-auto align-middle w-50 bg-white text-dark"
                                                            style="font-size: 10pt">Kapasitas Normal Perbulan</th>
                                                        <td colspan="3">
                                                            <input type="text"
                                                                class="form-control trigger-enter kapasitasNormalPerbulan kapasitasNormalPerbulan-1-3"
                                                                placeholder="" name="kapasitasNormalPerbulan"
                                                                value="0">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2"
                                                            class="text-nowrap h-auto align-middle w-50 bg-white text-dark"
                                                            style="font-size: 10pt">Biaya Satuan Product</th>
                                                        <td scope="col" class="text-nowrap pr-4"
                                                            id="kdn-biaya-satuan-product-1-3">KDN</td>
                                                        <td scope="col" class="text-nowrap pr-4"
                                                            id="kln-biaya-satuan-product-1-3">KLN</td>
                                                        <td scope="col" class="text-nowrap pr-4"
                                                            id="total-biaya-satuan-product-1-3">Total
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- tab content 1.4 tenaga kerja tidak langsung --}}
                            <div class="tab-pane fade" id="v-biaya-tenaga-langsung" role="tabpanel"
                                aria-labelledby="v-biaya-tenaga-langsung-tab">

                                <div class="row">
                                    <div class="col">
                                        <h5>Form 1.4 : Tingkat Komponen Dalam Negeri Jasa Tenaga Kerja Langsung</h5>
                                        <p style="font-size: 13px; opacity: 60%;">List data untuk biaya terkait lainnya</p>
                                    </div>
                                </div>
                                <div class="row card">
                                    <div class="col ">
                                        <form class="d-flex flex-wrap" style="width: 100%" id="form-4"
                                            method="post">
                                            <div class="form-group-sm mx-2 mt-2" style="font-size: 10pt; width : 13rem">
                                                <label for="uraian_posisi">Uraian Posisi <i data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Nama bahan baku adalah nama yang ditunjukkan pada nama material bahan baku dalam pembuatan produk. Contoh : Biji besi, Bracket dll"
                                                        class="fas fa-info-circle">
                                                    </i></label>
                                                <input type="text" class="form-control trigger-enter form-control-sm "
                                                    id="uraian_posisi" name="uraian_posisi" placeholder="" required>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="produsen_tingkat_dua">Pemasok / Produsen Tingkat 2 <i
                                                        class="fas fa-info-circle" data-toggle="tooltip"
                                                        data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control trigger-enter form-control-sm"
                                                    id="produsen_tingkat_dua" name="produsen_tingkat_dua" placeholder="" required>
                                            </div>


                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="tkdn">TKDN % <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text"
                                                    class="form-control trigger-enter form-control-sm replaceDot currencyInputFormatter"
                                                    id="tkdn" name="tkdn" placeholder="" value="0,00">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="jumlah_orang">Jumlah Orang <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="number" class="form-control trigger-enter form-control-sm"
                                                    id="jumlah_orang" name="jumlah_orang" placeholder="" value="" required>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="biaya_pengurusan_per_bulan">Biaya Pengurusan Per Bulan <i
                                                        class="fas fa-info-circle" data-toggle="tooltip"
                                                        data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <div class="input-group input-group-sm mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control trigger-enter currencyInputFormatter"
                                                        placeholder="" id="biaya_pengurusan_per_bulan"
                                                        name="biaya_pengurusan_per_bulan" required autocomplete="off"
                                                        value="0,00">
                                                </div>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="alokasi">Alokasi % <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text"
                                                    class="form-control trigger-enter form-control-sm replaceDot currencyInputFormatter"
                                                    id="alokasi" name="alokasi" placeholder="" value="0,00">
                                            </div>


                                            <div class="d-flex justify-content-end mt-2"
                                                style="font-size: 10pt; width : 100%;">
                                                <button class="btn btn-sm btn-success" type="submit"><i
                                                        class="fa fa-save"></i> Simpan</button>
                                            </div>
                                        </form><br>

                                    </div>
                                </div>
                                <div class="row card">
                                    <div class="col p-2">
                                        <form class="form-inline">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="fa fa-search"></i></span>
                                                </div>
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="Search" aria-label="Username"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col p-1">
                                        <div class="table-responsive table-responsive-sm">
                                            <table class="table table-striped table-hover" style="font-size: 8pt">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-nowrap pr-4">Aksi</th>
                                                        <th scope="col" class="text-nowrap pr-4">No</th>
                                                        <th scope="col" class="text-nowrap pr-4">Uraian</th>
                                                        <th scope="col" class="text-nowrap pr-4">Pemasok / Produsen
                                                            Tingkat 2</th>
                                                        <th scope="col" class="text-nowrap pr-4">TKDN %</th>
                                                        <th scope="col" class="text-nowrap pr-4">Jumlah</th>
                                                        <th scope="col" class="text-nowrap pr-4">Biaya Pengurusan Per
                                                            Bulan</th>
                                                        <th scope="col" class="text-nowrap pr-4">Alokasi %</th>
                                                        <th scope="col" class="text-nowrap pr-4">KDN</th>
                                                        <th scope="col" class="text-nowrap pr-4">KLN</th>
                                                        <th scope="col" class="text-nowrap pr-4">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody-4">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row card">
                                    <div class="d-flex justify-content-end">
                                        <div class="w-100 p-1">
                                            <div class="w-100">
                                                <table class="table table-bordered table-hover" style="font-size: 8pt">
                                                    <tr class="bg-dark text-light">
                                                        <th rowspan="2"
                                                            class="text-nowrap h-auto align-bottom w-50 bg-white text-dark"
                                                            style="font-size: 10pt">Total</th>
                                                        <th scope="col" class="text-nowrap pr-4">Jumlah Orang</th>
                                                        <th scope="col" class="text-nowrap pr-4">KDN</th>
                                                        <th scope="col" class="text-nowrap pr-4">KLN</th>
                                                        <th scope="col" class="text-nowrap pr-4">Total</th>
                                                    </tr>
                                                    <tr>
                                                        <td id="1-4-sumJumlahOrang">0</td>
                                                        <td id="1-4-sumKdn">Rp.0</td>
                                                        <td id="1-4-sumKln">Rp.0</td>
                                                        <td id="1-4-sumTotal">Rp.0</td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2"
                                                            class="text-nowrap h-auto align-middle w-50 bg-white text-dark"
                                                            style="font-size: 10pt">Kapasitas Normal Perbulan</th>
                                                        <td colspan="3">
                                                            <input type="text"
                                                                class="form-control trigger-enter kapasitasNormalPerbulan kapasitasNormalPerbulan-1-4"
                                                                placeholder="" name="kapasitasNormalPerbulan"
                                                                value="0">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2"
                                                            class="text-nowrap h-auto align-middle w-50 bg-white text-dark"
                                                            style="font-size: 10pt">Biaya Satuan Product</th>
                                                        <td scope="col" class="text-nowrap pr-4"
                                                            id="kdn-biaya-satuan-product-1-4">KDN</td>
                                                        <td scope="col" class="text-nowrap pr-4"
                                                            id="kln-biaya-satuan-product-1-4">KLN</td>
                                                        <td scope="col" class="text-nowrap pr-4"
                                                            id="total-biaya-satuan-product-1-4">Total
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- tab content 1.5 tenaga kerja tidak langsung --}}
                            <div class="tab-pane fade" id="v-tenaga-kerja-tidak-langsung" role="tabpanel"
                                aria-labelledby="v-tenaga-kerja-tidak-langsung-tab">

                                <div class="row">
                                    <div class="col">
                                        <h5>Form 1.5 : Tingkat Komponen Dalam Negeri Biaya Tidak Langsung Pabrik</h5>
                                        <p style="font-size: 13px; opacity: 60%;">List data tenaga kerja tidak langsung /
                                            manajemen</p>
                                    </div>
                                </div>
                                <div class="row card">
                                    <div class="col ">
                                        <form class="d-flex flex-wrap" style="width: 100%" id="form-5"
                                            method="post">
                                            <div class="form-group-sm mx-2 mt-2" style="font-size: 10pt; width : 13rem">
                                                <label for="uraian_posisi">
                                                    Uraian Posisi
                                                    <i data-toggle="tooltip" data-placement="top"
                                                        title="Nama bahan baku adalah nama yang ditunjukkan pada nama material bahan baku dalam pembuatan produk. Contoh : Biji besi, Bracket dll"
                                                        class="fas fa-info-circle" >
                                                    </i>
                                                </label>
                                                <input type="text" class="form-control trigger-enter form-control-sm"
                                                    id="uraian_posisi" name="uraian_posisi" required>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="kewarganegaraan">Kewarganegaraan <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <select class="form-control trigger-enter form-control-sm setTkdn"
                                                    id="" name="kewarganegaraan" required>
                                                    <option></option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country }}" {{ $country == "Indonesia" ? "selected" : "" }}>{{ $country }}</option>
                                                    @endforeach
                                                </select>
                                                <input type="hidden" id="tkdn-1-5" value="" name="tkdn">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label>
                                                    Jumlah Orang
                                                    <i class="fas fa-info-circle" data-toggle="tooltip"
                                                        data-placement="top" title="Tooltip on top"></i>
                                                </label>
                                                <input type="number" class="form-control trigger-enter form-control-sm"
                                                    id="jumlah_orang" name="jumlah_orang" value="" required>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label>
                                                    Gaji Per Bulan
                                                    <i class="fas fa-info-circle" data-toggle="tooltip"
                                                        data-placement="top" title="Tooltip on top"></i>
                                                </label>
                                                <div class="input-group input-group-sm mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control trigger-enter currencyInputFormatter"
                                                        placeholder="" id="gaji_perbulan" name="gaji_perbulan" required
                                                        autocomplete="off" value="0,00">
                                                </div>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label>
                                                    Alokasi Gaji %
                                                    <i class="fas fa-info-circle" data-toggle="tooltip"
                                                        data-placement="top" title="Tooltip on top"></i>
                                                </label>
                                                <input type="text"
                                                    class="form-control trigger-enter form-control-sm replaceDot currencyInputFormatter"
                                                    placeholder="" id="alokasi" name="alokasi" value="0,00">
                                            </div>

                                            <div class="d-flex justify-content-end mt-2"
                                                style="font-size: 10pt; width : 100%;">
                                                <button class="btn btn-sm btn-success" type="submit"><i
                                                        class="fa fa-save"></i> Simpan</button>
                                            </div>
                                        </form><br>

                                    </div>
                                </div>
                                <div class="row card">
                                    <div class="col p-2">
                                        <form class="form-inline">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="fa fa-search"></i></span>
                                                </div>
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="Search" aria-label="Username"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col p-1">
                                        <div class="table-responsive table-responsive-sm">
                                            <table class="table table-striped table-hover" style="font-size: 8pt">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-nowrap pr-4">Aksi</th>
                                                        <th scope="col" class="text-nowrap pr-4">No</th>
                                                        <th scope="col" class="text-nowrap pr-4">Uraian Posisi</th>
                                                        <th scope="col" class="text-nowrap pr-4">Kewarganegaraan</th>
                                                        <th scope="col" class="text-nowrap pr-4">TKDN %</th>
                                                        <th scope="col" class="text-nowrap pr-4">Jumlah Orang</th>
                                                        <th scope="col" class="text-nowrap pr-4">Gaji Per Bulan</th>
                                                        <th scope="col" class="text-nowrap pr-4">Alokasi %</th>
                                                        <th scope="col" class="text-nowrap pr-4">KDN</th>
                                                        <th scope="col" class="text-nowrap pr-4">KLN</th>
                                                        <th scope="col" class="text-nowrap pr-4">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody-5">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row card">
                                    <div class="d-flex justify-content-end">
                                        <div class="w-100 p-1">
                                            <div class="w-100">
                                                <table class="table table-bordered table-hover" style="font-size: 8pt">
                                                    <tr class="bg-dark text-light">
                                                        <th rowspan="2"
                                                            class="text-nowrap h-auto align-bottom w-50 bg-white text-dark"
                                                            style="font-size: 10pt">Total</th>
                                                        <th scope="col" class="text-nowrap pr-4">Jumlah Orang</th>
                                                        <th scope="col" class="text-nowrap pr-4">KDN</th>
                                                        <th scope="col" class="text-nowrap pr-4">KLN</th>
                                                        <th scope="col" class="text-nowrap pr-4">Total</th>
                                                    </tr>
                                                    <tr>
                                                        <td id="1-5-sumJumlahOrang">0</td>
                                                        <td id="1-5-sumKdn">Rp.0</td>
                                                        <td id="1-5-sumKln">Rp.0</td>
                                                        <td id="1-5-sumTotal">Rp.0</td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2"
                                                            class="text-nowrap h-auto align-middle w-50 bg-white text-dark"
                                                            style="font-size: 10pt">Kapasitas Normal Perbulan</th>
                                                        <td colspan="3">
                                                            <input type="text"
                                                                class="form-control trigger-enter kapasitasNormalPerbulan kapasitasNormalPerbulan-1-5"
                                                                placeholder="" name="kapasitasNormalPerbulan"
                                                                value="0">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2"
                                                            class="text-nowrap h-auto align-middle w-50 bg-white text-dark"
                                                            style="font-size: 10pt">Biaya Satuan Product</th>
                                                        <td scope="col" class="text-nowrap pr-4"
                                                            id="kdn-biaya-satuan-product-1-5">KDN</td>
                                                        <td scope="col" class="text-nowrap pr-4"
                                                            id="kln-biaya-satuan-product-1-5">KLN</td>
                                                        <td scope="col" class="text-nowrap pr-4"
                                                            id="total-biaya-satuan-product-1-5">Total
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- tab content 1.6 mesin yang dimiliki sendiri --}}
                            <div class="tab-pane fade" id="v-mesin-sendiri" role="tabpanel"
                                aria-labelledby="v-mesin-sendiri-tab">
                                <div class="row">
                                    <div class="col">
                                        <h5>Form 1.6 : Tingkat Komponen Dalam Biaya Tidak Langsung Pabrik</h5>
                                        <p style="font-size: 13px; opacity: 60%;">List data untuk mesin / alat kerja yang
                                            dimiliki sendiri</p>
                                    </div>
                                </div>
                                <div class="row card">
                                    <div class="col ">
                                        <form class="d-flex flex-wrap" style="width: 100%" id="form-6"
                                            method="post">
                                            <div class="form-group-sm mx-2 mt-2" style="font-size: 10pt; width : 13rem">
                                                <label for="">Uraian <i data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Nama bahan baku adalah nama yang ditunjukkan pada nama material bahan baku dalam pembuatan produk. Contoh : Biji besi, Bracket dll"
                                                        class="fas fa-info-circle" >
                                                    </i></label>
                                                <input type="text"
                                                    class="form-control trigger-enter form-control-sm " id=""
                                                    placeholder="" name="uraian" required>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 "
                                                style="font-size: 10pt; width : 13rem">
                                                <label for="">Spesifikasi <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control trigger-enter form-control-sm"
                                                    id="" placeholder="" name="spesifikasi"
                                                    name="spesifikasi" required>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 "
                                                style="font-size: 10pt; width : 13rem">
                                                <label for="">Jumlah Unit <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="number" class="form-control trigger-enter form-control-sm"
                                                    id="" placeholder="" name="jumlah_unit" value="" required>
                                            </div>


                                            <div class="form-group-sm mx-2 mt-2 "
                                                style="font-size: 10pt; width : 13rem">
                                                <label for="">Biaya Depresiasi Per Bulan<i
                                                        class="fas fa-info-circle" data-toggle="tooltip"
                                                        data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <div class="input-group input-group-sm mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control trigger-enter currencyInputFormatter"
                                                        placeholder="" id="biaya_depresiasi_perbulan"
                                                        name="biaya_depresiasi_perbulan" required autocomplete="off"
                                                        value="0,00">
                                                </div>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 "
                                                style="font-size: 10pt; width : 13rem">
                                                <label for="">Alokasi Mesin % <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text"
                                                    class="form-control trigger-enter form-control-sm replaceDot currencyInputFormatter"
                                                    id="" placeholder="" name="alokasi" value="0,00">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt;">
                                                <div class="card p-2">
                                                    <div class="col">
                                                        <div class="row">
                                                            <label for="" class="mx-auto">Alat Kerja<i
                                                                    class="fas fa-info-circle" data-toggle="tooltip"
                                                                    data-placement="top" title="Tooltip on top">
                                                                </i></label>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group-sm ml-2" style="font-size: 7pt;">
                                                                <label for="">Dibuat</label>
                                                                <select name="dibuat" id="dibuat-1-6"
                                                                    class="form-control trigger-enter form-control-sm"
                                                                    style="width: 8rem">
                                                                    <option value="Dalam Negeri">Dalam Negeri</option>
                                                                    <option value="Luar Negeri">Luar Negeri</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group-sm ml-2" style="font-size: 7pt;">
                                                                <label for="">Dimiliki</label>
                                                                <select name="dimiliki" id="dimiliki-1-6"
                                                                    class="form-control trigger-enter form-control-sm"
                                                                    style="width: 8rem">
                                                                    <option value="Dalam Negeri">Dalam Negeri</option>
                                                                    <option value="Luar Negeri">Luar Negeri</option>
                                                                    <option value="DN + LN">DN + LN</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group-sm ml-2 d-none"
                                                                id="form-group-saham-1-6" style="font-size: 7pt;">
                                                                <label for="">Komposisi Saham</label>
                                                                <input type="text"
                                                                    class="form-control trigger-enter form-control-sm currencyInputFormatter"
                                                                    name="saham" id="saham-1-6" value="0,00">
                                                                <p class="text-danger d-none" id="is-invalid-saham-1-6"
                                                                    style="font-size: 10pt; width: 12rem">Nilai Komposisi
                                                                    Saham Tidak Boleh Lebih Dari 75% Jika Dibuat Di Luar
                                                                    Negeri</p>
                                                            </div>
                                                            <input type="hidden" name="tkdn" id="tkdn-1-6"
                                                                value="100">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-end"
                                                style="font-size: 10pt; width : 100%;">
                                                <button class="btn btn-sm btn-success" type="submit"><i
                                                        class="fa fa-save"></i> Simpan</button>
                                            </div>
                                        </form><br>

                                    </div>
                                </div>
                                <div class="row card">
                                    <div class="col p-2">
                                        <form class="form-inline">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="fa fa-search"></i></span>
                                                </div>
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="Search" aria-label="Username"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col p-1">
                                        <div class="table-responsive table-responsive-sm">
                                            <table class="table table-striped table-hover" style="font-size: 8pt">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-nowrap pr-4">Aksi</th>
                                                        <th scope="col" class="text-nowrap pr-4">No</th>
                                                        <th scope="col" class="text-nowrap pr-4">Uraian</th>
                                                        <th scope="col" class="text-nowrap pr-4">Spesifikasi</th>
                                                        <th scope="col" class="text-nowrap pr-4">Jumlah Unit</th>
                                                        <th scope="col" class="text-nowrap pr-4">Dibuat</th>
                                                        <th scope="col" class="text-nowrap pr-4">Dimiliki</th>
                                                        <th scope="col" class="text-nowrap pr-4">TKDN %</th>
                                                        <th scope="col" class="text-nowrap pr-4">Biaya Per Bulan</th>
                                                        <th scope="col" class="text-nowrap pr-4">Alokasi %</th>
                                                        <th scope="col" class="text-nowrap pr-4">KDN</th>
                                                        <th scope="col" class="text-nowrap pr-4">KLN</th>
                                                        <th scope="col" class="text-nowrap pr-4">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody-6">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row card">
                                    <div class="d-flex justify-content-end">
                                        <div class="w-100 p-1">
                                            <div class="w-100">
                                                <table class="table table-bordered table-hover" style="font-size: 8pt">
                                                    <tr class="bg-dark text-light">
                                                        <th rowspan="2"
                                                            class="text-nowrap h-auto align-bottom w-50 bg-white text-dark"
                                                            style="font-size: 10pt">Total</th>
                                                        <th scope="col" class="text-nowrap pr-4">Jumlah Unit</th>
                                                        <th scope="col" class="text-nowrap pr-4">KDN</th>
                                                        <th scope="col" class="text-nowrap pr-4">KLN</th>
                                                        <th scope="col" class="text-nowrap pr-4">Total</th>
                                                    </tr>
                                                    <tr>
                                                        <td id="1-6-sumJumlahUnit">0</td>
                                                        <td id="1-6-sumKdn">Rp.0</td>
                                                        <td id="1-6-sumKln">Rp.0</td>
                                                        <td id="1-6-sumTotal">Rp.0</td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2"
                                                            class="text-nowrap h-auto align-middle w-50 bg-white text-dark"
                                                            style="font-size: 10pt">Kapasitas Normal Perbulan</th>
                                                        <td colspan="3">
                                                            <input type="text"
                                                                class="form-control trigger-enter kapasitasNormalPerbulan kapasitasNormalPerbulan-1-6"
                                                                placeholder="" name="kapasitasNormalPerbulan"
                                                                value="0">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2"
                                                            class="text-nowrap h-auto align-middle w-50 bg-white text-dark"
                                                            style="font-size: 10pt">Biaya Satuan Product</th>
                                                        <td scope="col" class="text-nowrap pr-4"
                                                            id="kdn-biaya-satuan-product-1-6">KDN</td>
                                                        <td scope="col" class="text-nowrap pr-4"
                                                            id="kln-biaya-satuan-product-1-6">KLN</td>
                                                        <td scope="col" class="text-nowrap pr-4"
                                                            id="total-biaya-satuan-product-1-6">Total
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- tab content 1.7 MESIN / ALAT KERJA / FASILITAS KERJA YANG DISEWA --}}
                            <div class="tab-pane fade" id="v-mesin-sewa" role="tabpanel"
                                aria-labelledby="v-mesin-sewa-tab">
                                <div class="row">
                                    <div class="col">
                                        <h5>Form 1.7 : Tingkat Komponen Dalam Negeri Biaya Tidak Langsung Pabrik</h5>
                                        <p style="font-size: 13px; opacity: 60%;">List data untuk mesin / alat kerja yang
                                            disewa</p>
                                    </div>
                                </div>
                                <div class="row card">
                                    <div class="col ">
                                        <form class="d-flex flex-wrap" style="width: 100%" id="form-7"
                                            method="post">
                                            <div class="form-group-sm mx-2 mt-2" style="font-size: 10pt; width : 13rem">
                                                <label for="">Uraian <i data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Nama bahan baku adalah nama yang ditunjukkan pada nama material bahan baku dalam pembuatan produk. Contoh : Biji besi, Bracket dll"
                                                        class="fas fa-info-circle">
                                                    </i></label>
                                                <input type="text"
                                                    class="form-control trigger-enter form-control-sm " id=""
                                                    placeholder="" name="uraian" required>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 "
                                                style="font-size: 10pt; width : 13rem">
                                                <label for="">Spesifikasi <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control trigger-enter form-control-sm"
                                                    id="" placeholder="" name="spesifikasi"
                                                    name="spesifikasi" required>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 "
                                                style="font-size: 10pt; width : 13rem">
                                                <label for="">Produsen Tingkat 2 <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control trigger-enter form-control-sm"
                                                    id="" placeholder="" name="produsen_tingkat_dua" required>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 "
                                                style="font-size: 10pt; width : 13rem">
                                                <label for="">Jumlah Unit <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="number" class="form-control trigger-enter form-control-sm"
                                                    id="" placeholder="" name="jumlah_unit" value="" required>
                                            </div>


                                            <div class="form-group-sm mx-2 mt-2 "
                                                style="font-size: 10pt; width : 13rem">
                                                <label for="">Biaya Sewa Per Bulan<i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <div class="input-group input-group-sm mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control trigger-enter currencyInputFormatter"
                                                        placeholder="" id="biaya_sewa_perbulan"
                                                        name="biaya_sewa_perbulan" required autocomplete="off"
                                                        value="0,00">
                                                </div>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 "
                                                style="font-size: 10pt; width : 13rem">
                                                <label for="">Alokasi Mesin % <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text"
                                                    class="form-control trigger-enter form-control-sm replaceDot currencyInputFormatter"
                                                    id="" placeholder="" name="alokasi" value="0,00">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt;">
                                                <div class="card p-2">
                                                    <div class="col">
                                                        <div class="row">
                                                            <label for="" class="mx-auto">Alat Kerja<i
                                                                    class="fas fa-info-circle" data-toggle="tooltip"
                                                                    data-placement="top" title="Tooltip on top">
                                                                </i></label>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group-sm ml-2" style="font-size: 7pt;">
                                                                <label for="">Dibuat</label>
                                                                <select name="dibuat" id="dibuat-1-7"
                                                                    class="form-control trigger-enter form-control-sm"
                                                                    style="width: 8rem">
                                                                    <option value="Dalam Negeri">Dalam Negeri</option>
                                                                    <option value="Luar Negeri">Luar Negeri</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group-sm ml-2" style="font-size: 7pt;">
                                                                <label for="">Dimiliki</label>
                                                                <select name="dimiliki" id="dimiliki-1-7"
                                                                    class="form-control trigger-enter form-control-sm"
                                                                    style="width: 8rem">
                                                                    <option value="Dalam Negeri">Dalam Negeri</option>
                                                                    <option value="Luar Negeri">Luar Negeri</option>
                                                                    <option value="DN + LN">DN + LN</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group-sm ml-2 d-none"
                                                                id="form-group-saham-1-7" style="font-size: 7pt;">
                                                                <label for="">Komposisi Saham</label>
                                                                <input type="text"
                                                                    class="form-control trigger-enter form-control-sm currencyInputFormatter"
                                                                    name="saham" id="saham-1-7" value="0,00">
                                                                <p class="text-danger d-none" id="is-invalid-saham-1-7"
                                                                    style="font-size: 10pt; width: 12rem">Nilai Komposisi
                                                                    Saham Tidak Boleh Lebih Dari 75%</p>
                                                            </div>
                                                            <input type="hidden" name="tkdn" id="tkdn-1-7"
                                                                value="100">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-end"
                                                style="font-size: 10pt; width : 100%;">
                                                <button class="btn btn-sm btn-success" type="submit"><i
                                                        class="fa fa-save"></i> Simpan</button>
                                            </div>
                                        </form><br>

                                    </div>
                                </div>
                                <div class="row card">
                                    <div class="col p-2">
                                        <form class="form-inline">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="fa fa-search"></i></span>
                                                </div>
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="Search" aria-label="Username"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col p-1">
                                        <div class="table-responsive table-responsive-sm">
                                            <table class="table table-striped table-hover" style="font-size: 8pt">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-nowrap pr-4">Aksi</th>
                                                        <th scope="col" class="text-nowrap pr-4">No</th>
                                                        <th scope="col" class="text-nowrap pr-4">Uraian</th>
                                                        <th scope="col" class="text-nowrap pr-4">Spesifikasi</th>
                                                        <th scope="col" class="text-nowrap pr-4">Jumlah Unit</th>
                                                        <th scope="col" class="text-nowrap pr-4">Dibuat</th>
                                                        <th scope="col" class="text-nowrap pr-4">Dimiliki</th>
                                                        <th scope="col" class="text-nowrap pr-4">TKDN %</th>
                                                        <th scope="col" class="text-nowrap pr-4">Biaya Per Bulan</th>
                                                        <th scope="col" class="text-nowrap pr-4">Alokasi %</th>
                                                        <th scope="col" class="text-nowrap pr-4">KDN</th>
                                                        <th scope="col" class="text-nowrap pr-4">KLN</th>
                                                        <th scope="col" class="text-nowrap pr-4">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody-7">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row card">
                                    <div class="d-flex justify-content-end">
                                        <div class="w-100 p-1">
                                            <div class="w-100">
                                                <table class="table table-bordered table-hover" style="font-size: 8pt">
                                                    <tr class="bg-dark text-light">
                                                        <th rowspan="2"
                                                            class="text-nowrap h-auto align-bottom w-50 bg-white text-dark"
                                                            style="font-size: 10pt">Total</th>
                                                        <th scope="col" class="text-nowrap pr-4">Jumlah Unit</th>
                                                        <th scope="col" class="text-nowrap pr-4">KDN</th>
                                                        <th scope="col" class="text-nowrap pr-4">KLN</th>
                                                        <th scope="col" class="text-nowrap pr-4">Total</th>
                                                    </tr>
                                                    <tr>
                                                        <td id="1-7-sumJumlahUnit">0</td>
                                                        <td id="1-7-sumKdn">Rp.0</td>
                                                        <td id="1-7-sumKln">Rp.0</td>
                                                        <td id="1-7-sumTotal">Rp.0</td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2"
                                                            class="text-nowrap h-auto align-middle w-50 bg-white text-dark"
                                                            style="font-size: 10pt">Kapasitas Normal Perbulan</th>
                                                        <td colspan="3">
                                                            <input type="text"
                                                                class="form-control trigger-enter kapasitasNormalPerbulan kapasitasNormalPerbulan-1-7"
                                                                placeholder="" name="kapasitasNormalPerbulan"
                                                                value="0">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2"
                                                            class="text-nowrap h-auto align-middle w-50 bg-white text-dark"
                                                            style="font-size: 10pt">Biaya Satuan Product</th>
                                                        <td scope="col" class="text-nowrap pr-4"
                                                            id="kdn-biaya-satuan-product-1-7">KDN</td>
                                                        <td scope="col" class="text-nowrap pr-4"
                                                            id="kln-biaya-satuan-product-1-7">KLN</td>
                                                        <td scope="col" class="text-nowrap pr-4"
                                                            id="total-biaya-satuan-product-1-7">Total
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- tab content 1.8 List data untuk jasa jasa terkait --}}
                            <div class="tab-pane fade" id="v-overhead" role="tabpanel" aria-labelledby="v-overhead">
                                <div class="row">
                                    <div class="col">
                                        <h5>Form 1.8 : Tingkat Komponen Dalam Negeri Biaya Tidak Langsung Pabrik</h5>
                                        <p style="font-size: 13px; opacity: 60%;">List data untuk jasa jasa terkait</p>
                                    </div>
                                </div>
                                <div class="row card">
                                    <div class="col ">
                                        <form class="d-flex flex-wrap" style="width: 100%" id="form-8"
                                            method="post">
                                            <div class="form-group-sm mx-2 mt-2" style="font-size: 10pt; width : 13rem">
                                                <label for="">Uraian <i data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Nama bahan baku adalah nama yang ditunjukkan pada nama material bahan baku dalam pembuatan produk. Contoh : Biji besi, Bracket dll"
                                                        class="fas fa-info-circle">
                                                    </i></label>
                                                <input type="text"
                                                    class="form-control trigger-enter form-control-sm " id=""
                                                    placeholder="" name="uraian" required>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 "
                                                style="font-size: 10pt; width : 13rem">
                                                <label for="">Pemasok <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control trigger-enter form-control-sm"
                                                    id="" placeholder="" name="pemasok" required>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 "
                                                style="font-size: 10pt; width : 13rem">
                                                <label for="">Jumlah <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="number" class="form-control trigger-enter form-control-sm"
                                                    id="" placeholder="" name="jumlah" value="" required>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 "
                                                style="font-size: 10pt; width : 13rem">
                                                <label for="tkdn">TKDN % <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text"
                                                    class="form-control trigger-enter form-control-sm replaceDot currencyInputFormatter"
                                                    id="tkdn" name="tkdn" placeholder="" value="0,00">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 "
                                                style="font-size: 10pt; width : 13rem">
                                                <label for="">Biaya Per Bulan<i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <div class="input-group input-group-sm mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control trigger-enter currencyInputFormatter"
                                                        placeholder="" id="biaya_perbulan" name="biaya_perbulan"
                                                        required autocomplete="off" value="0,00">
                                                </div>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 "
                                                style="font-size: 10pt; width : 13rem">
                                                <label for="">Alokasi Pengguna % <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text"
                                                    class="form-control trigger-enter form-control-sm replaceDot currencyInputFormatter"
                                                    id="" placeholder="" name="alokasi" value="0,00">
                                            </div>

                                            <div class="d-flex justify-content-end"
                                                style="font-size: 10pt; width : 100%;">
                                                <button class="btn btn-sm btn-success" type="submit"><i
                                                        class="fa fa-save"></i> Simpan</button>
                                            </div>
                                        </form><br>

                                    </div>
                                </div>
                                <div class="row card">
                                    <div class="col p-2">
                                        <form class="form-inline">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="fa fa-search"></i></span>
                                                </div>
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="Search" aria-label="Username"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col p-1">
                                        <div class="table-responsive table-responsive-sm">
                                            <table class="table table-striped table-hover" style="font-size: 8pt">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-nowrap pr-4">Aksi</th>
                                                        <th scope="col" class="text-nowrap pr-4">No</th>
                                                        <th scope="col" class="text-nowrap pr-4">Uraian</th>
                                                        <th scope="col" class="text-nowrap pr-4">Pemasok</th>
                                                        <th scope="col" class="text-nowrap pr-4">Jumlah</th>
                                                        <th scope="col" class="text-nowrap pr-4">TKDN %</th>
                                                        <th scope="col" class="text-nowrap pr-4">Biaya Per Bulan</th>
                                                        <th scope="col" class="text-nowrap pr-4">Alokasi %</th>
                                                        <th scope="col" class="text-nowrap pr-4">KDN</th>
                                                        <th scope="col" class="text-nowrap pr-4">KLN</th>
                                                        <th scope="col" class="text-nowrap pr-4">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody-8">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row card">
                                    <div class="d-flex justify-content-end">
                                        <div class="w-100 p-1">
                                            <div class="w-100">
                                                <table class="table table-bordered table-hover" style="font-size: 8pt">
                                                    <tr class="bg-dark text-light">
                                                        <th rowspan="2"
                                                            class="text-nowrap h-auto align-bottom w-50 bg-white text-dark"
                                                            style="font-size: 10pt">Total</th>
                                                        <th scope="col" class="text-nowrap pr-4">Jumlah</th>
                                                        <th scope="col" class="text-nowrap pr-4">KDN</th>
                                                        <th scope="col" class="text-nowrap pr-4">KLN</th>
                                                        <th scope="col" class="text-nowrap pr-4">Total</th>
                                                    </tr>
                                                    <tr>
                                                        <td id="1-8-sumJumlah">0</td>
                                                        <td id="1-8-sumKdn">Rp.0</td>
                                                        <td id="1-8-sumKln">Rp.0</td>
                                                        <td id="1-8-sumTotal">Rp.0</td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2"
                                                            class="text-nowrap h-auto align-middle w-50 bg-white text-dark"
                                                            style="font-size: 10pt">Kapasitas Normal Perbulan</th>
                                                        <td colspan="3">
                                                            <input type="text"
                                                                class="form-control trigger-enter kapasitasNormalPerbulan kapasitasNormalPerbulan-1-8"
                                                                placeholder="" name="kapasitasNormalPerbulan"
                                                                value="0">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2"
                                                            class="text-nowrap h-auto align-middle w-50 bg-white text-dark"
                                                            style="font-size: 10pt">Biaya Satuan Product</th>
                                                        <td scope="col" class="text-nowrap pr-4"
                                                            id="kdn-biaya-satuan-product-1-8">KDN</td>
                                                        <td scope="col" class="text-nowrap pr-4"
                                                            id="kln-biaya-satuan-product-1-8">KLN</td>
                                                        <td scope="col" class="text-nowrap pr-4"
                                                            id="total-biaya-satuan-product-1-8">Total
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- tab content 1.9 TINGKAT KOMPONEN DALAM NEGERI RANGKA, DAN/ATAU BODI  --}}
                            <div class="tab-pane fade" id="v-rekapitulasi" role="tabpanel"
                                aria-labelledby="v-rekapitulasi">
                                <div class="row">
                                    <div class="col">
                                        <h5>Form 1.9 : Tingkat Komponen Dalam Negeri Rekapitulasi Penilaian</h5>
                                        <p style="font-size: 13px; opacity: 60%;">List data rekapitulasi penilaian</p>
                                    </div>
                                </div>
                                <div class="row card">
                                    <div class="col p-2">
                                        <form class="form-inline">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="fa fa-search"></i></span>
                                                </div>
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="Search" aria-label="Username"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col p-1">
                                        <div class="table-responsive table-responsive-sm">
                                            <table class="table table-striped table-hover" style="font-size: 8pt">
                                                <thead class="bg-dark text-light">
                                                    <tr>
                                                        <th scope="col" class="text-nowrap pr-4 border align-middle"
                                                            colspan="2" rowspan="2">Uraian</th>
                                                        <th colspan="3" class="border text-center">Biaya</th>
                                                        <th scope="col" class="text-nowrap pr-4 border align-middle"
                                                            rowspan="2">TKDN %</th>
                                                    </tr>
                                                    <tr>
                                                        <th class="border">KDN</th>
                                                        <th class="border">KLN</th>
                                                        <th class="border">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody-9">
                                                    <tr>
                                                        <td>
                                                            1.1
                                                        </td>
                                                        <td>
                                                            Bahan Baku
                                                        </td>
                                                        <td>
                                                            Rp 0,00
                                                        </td>
                                                        <td>
                                                            Rp 0,00
                                                        </td>
                                                        <td>
                                                            Rp 0,00
                                                        </td>
                                                        <td>
                                                            0%
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot class="bg-dark text-light">
                                                    <tr>
                                                        <td colspan="2" class="border">
                                                            Biaya Produksi
                                                        </td>
                                                        <td id="sumKdn-1-9" class="border">
                                                            Rp 0,00
                                                        </td>
                                                        <td id="sumKln-1-9" class="border">
                                                            Rp 0,00
                                                        </td>
                                                        <td id="sumTotal-1-9" class="border">
                                                            Rp 0,00
                                                        </td>
                                                        <td id="sumTkdn-1-9" class="border">
                                                            0%
                                                        </td>
                                                    </tr>
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
            <div class="col-4">
                {{-- button selanjutnya dan hapus --}}
                <div class="card">
                    <div class="button-submit d-none">
                        <div class="p-2 pt-0 pb-2">
                            <button class="btn btn-primary btn-block"
                                onclick="submit('{{ route('calculation-results.submit') }}', '{{ route('computation.index') }}', '{{ $computation->id }}')">Submit</button>
                        </div>
                    </div>
                    {{-- <div class="p-2">
                        <a href="#" class="btn btn-danger flex-grow-1 btn-block">Hapus </a>
                    </div> --}}
                    <div class="p-2 pb-0">
                        <a href="#" class="btn btn-success btn-block" id="buttonSelanjutnya">Selanjutnya <span
                                class="pl-2">></span></a>
                    </div>
                    <div class="p-2 pb-0">
                        <a href="#" class="btn btn-danger btn-block d-none" id="buttonKembali">
                            Kembali <span class="pl-2"><</span>
                        </a>
                    </div>
                </div>
                {{-- header tab panel --}}
                <div class="card">
                    <div class="nav flex-column nav-pills position-relative" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
                        <div class="position-absolute w-100" style="height: 100%"></div>
                        <a class="nav-link text-dark active" id="v-bahan-baku-tab" data-toggle="pill"
                            href="#v-bahan-baku" role="tab" aria-controls="v-bahan-baku" aria-selected="true">
                            <button class="btn-primary">1.1</button>
                            Bahan Baku
                        </a>
                        <a class="nav-link text-dark" id="v-jasa-bahan-baku-tab" data-toggle="pill"
                            href="#v-jasa-bahan-baku" role="tab" aria-controls="v-jasa-bahan-baku"
                            aria-selected="false">
                            <button class="btn-primary">1.2</button>
                            Jasa Terkait Bahan Baku
                        </a>
                        <a class="nav-link text-dark" id="v-tenaga-kerja-langsung-tab" data-toggle="pill"
                            href="#v-tenaga-kerja-langsung" role="tab" aria-controls="v-tenaga-kerja-langsung"
                            aria-selected="false">
                            <button class="btn-primary">1.3</button>
                            Tenaga Kerja Langsung
                        </a>
                        <a class="nav-link text-dark" id="v-biaya-tenaga-langsung-tab" data-toggle="pill"
                            href="#v-biaya-tenaga-langsung" role="tab" aria-controls="v-biaya-tenaga-langsung"
                            aria-selected="false">
                            <button class="btn-primary">1.4</button>
                            Biaya Tenaga Kerja Langsung
                        </a>
                        <a class="nav-link text-dark" id="v-tenaga-kerja-tidak-langsung-tab" data-toggle="pill"
                            href="#v-tenaga-kerja-tidak-langsung" role="tab"
                            aria-controls="v-tenaga-kerja-tidak-langsung" aria-selected="false">
                            <button class="btn-primary">1.5</button>
                            Tenaga Kerja Tidak Langsung
                        </a>
                        <a class="nav-link text-dark" id="v-mesin-sendiri-tab" data-toggle="pill"
                            href="#v-mesin-sendiri" role="tab" aria-controls="v-mesin-sendiri"
                            aria-selected="false">
                            <button class="btn-primary">1.6</button>
                            Mesin Yang Dimiliki Sendiri
                        </a>
                        <a class="nav-link text-dark" id="v-mesin-sewa-tab" data-toggle="pill" href="#v-mesin-sewa"
                            role="tab" aria-controls="v-mesin-sewa" aria-selected="false">
                            <button class="btn-primary">1.7</button>
                            Mesin Yang Sewa
                        </a>
                        <a class="nav-link text-dark" id="v-overhead-tab" data-toggle="pill" href="#v-overhead"
                            role="tab" aria-controls="v-overhead" aria-selected="false">
                            <button class="btn-primary">1.8</button>
                            Overhead Yang Lainnya
                        </a>
                        <a class="nav-link text-dark" id="v-rekapitulasi-tab" data-toggle="pill"
                            href="#v-rekapitulasi" role="tab" aria-controls="v-rekapitulasi"
                            aria-selected="false">
                            <button class="btn-primary">1.9</button>
                            Rekapitulasi
                        </a>
                    </div>
                </div>
                <div class="card px-3 py-3 d-none" id="table-biaya-produksi-1-9">
                    <table class="table">
                        <thead class="bg-dark text-light border">
                            <tr>
                                <th class="d-flex justify-content-center">TKDN</th>
                            </tr>
                        </thead>
                        <tbody id="tbody-10">
                            <tr>
                                <th class="d-flex justify-content-center">
                                    <h2 id="BiayaProduksiFinalTkdn">0%</h2>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="editCalculation-1" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Form 1.1 : Tingkat Komponen Dalam Negeri Bahan Baku
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editForm-1" method="post">
                    <input type="hidden" name="id">
                    <div class="modal-body" id="modal-edit-calculation">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="bahan_baku">Nama Bahan Baku <i data-toggle="tooltip" data-placement="top"
                                        title="Nama bahan baku adalah nama yang ditunjukkan pada nama material bahan baku dalam pembuatan produk. Contoh : Biji besi, Bracket dll"
                                        class="fas fa-info-circle">
                                    </i></label>
                                <input type="text" name="bahan_baku"
                                    class="form-control form-control-sm trigger-enter" id="bahan_baku" placeholder="">
                            </div>
                            <div class="form-group col-6">
                                <label for="spesifikasi">Spesifikasi <i class="fas fa-info-circle"
                                        data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                    </i></label>
                                <input type="text" name="spesifikasi"
                                    class="form-control form-control-sm trigger-enter" id="spesifikasi"
                                    placeholder="">
                            </div>
                            <div class="form-group col-6">
                                <label for="satuan_bahan_baku">Satuan bahan baku <i class="fas fa-info-circle"
                                        data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                    </i></label>
                                <select class="form-control form-control-sm trigger-enter" id="satuan_bahan_baku"
                                    name="satuan_bahan_baku">
                                    <option></option>
                                    <option value="Pcs">Pcs</option>
                                    <option value="Pack">Pack</option>
                                    <option value="Kg">Kg</option>
                                    <option value="Liter">Liter</option>
                                    <option value="Meter">Meter</option>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="negara_asal">Negara asal <i class="fas fa-info-circle"
                                        data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                    </i></label>
                                <select class="form-control form-control-sm trigger-enter" id="negara_asal"
                                    name="negara_asal">
                                    <option></option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country }}" {{ $country == "Indonesia" ? "selected" : "" }}>{{ $country }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="pemasok">Pemasok / Produsen Tingkat 2 <i class="fas fa-info-circle"
                                        data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                    </i></label>
                                <input type="text" name="pemasok"
                                    class="form-control form-control-sm trigger-enter" id="pemasok" placeholder="">
                            </div>
                            <div class="form-group col-6">
                                <label for="tkdn">TKDN % <i class="fas fa-info-circle" data-toggle="tooltip"
                                        data-placement="top" title="Tooltip on top">
                                    </i></label>
                                <input type="text"
                                    class="form-control form-control-sm trigger-enter replaceDot currencyInputFormatter"
                                    id="tkdn" name="tkdn" placeholder="">
                            </div>
                            <div class="form-group col-6">
                                <label for="jumlah">Jumlah / Satuan Bahan Baku <i class="fas fa-info-circle"
                                        data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                    </i></label>
                                <input type="text" name="jumlah"
                                    class="form-control form-control-sm trigger-enter currencyInputFormatter"
                                    id="jumlah" placeholder="">
                            </div>
                            <div class="form-group col-6">
                                <label for="harga_satuan">Harga Satuan Material <i class="fas fa-info-circle"
                                        data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                    </i></label>
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                    </div>
                                    <input type="text"
                                        class="form-control rupiahInput trigger-enter currencyInputFormatter"
                                        placeholder="" id="harga_satuan" name="harga_satuan" required
                                        autocomplete="off" value="0,00">
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <div class="card p-2">
                                    <div class="col">
                                        <div class="row">
                                            <label for="" class="mx-auto">
                                                Lokal
                                                <i class="fas fa-info-circle" data-toggle="tooltip"
                                                    data-placement="top" title="Tooltip on top"></i>
                                            </label>
                                        </div>
                                        <div>
                                            <div class="form-group-sm" style="font-size: 7pt;">
                                                <label for="ppn">PPN %</label>
                                                <input type="text" name="ppn"
                                                    class="w-100 form-control form-control-sm replaceDot trigger-enter currencyInputFormatter"
                                                    id="ppn" placeholder="" value="0">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <div class="card p-2">
                                    <div class="col">
                                        <div class="row">
                                            <label for="" class="mx-auto">PDRI <i class="fas fa-info-circle"
                                                    data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                                </i></label>
                                        </div>
                                        <div class="d-flex">
                                            <div class="form-group-sm flex-fill ml-2" style="font-size: 7pt;">
                                                <label for="bm">BM %</label>
                                                <input type="text" name="bm" style="width: 5rem"
                                                    class="form-control form-control-sm replaceDot trigger-enter currencyInputFormatter"
                                                    id="bm" placeholder="" value="0">
                                            </div>
                                            <div class="form-group-sm flex-fill ml-2" style="font-size: 7pt;">
                                                <label for="pdri_ppn">PPN %</label>
                                                <input type="text" name="pdri_ppn" style="width: 5rem"
                                                    class="form-control form-control-sm replaceDot trigger-enter currencyInputFormatter"
                                                    id="pdri_ppn" placeholder="" value="0">
                                            </div>
                                            <div class="form-group-sm flex-fill ml-2" style="font-size: 7pt;">
                                                <label for="pph">PPH %</label>
                                                <input type="text" name="pph" style="width: 5rem"
                                                    class="form-control form-control-sm replaceDot trigger-enter currencyInputFormatter"
                                                    id="pph" placeholder="" value="0">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editCalculation-2" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Form 1.2 : Tingkat Komponen Dalam Negeri Bahan Baku
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editForm-2" method="post">
                    <input type="hidden" name="id">
                    <div class="modal-body" id="modal-edit-calculation">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="uraian">Jasa Terkait <i data-toggle="tooltip" data-placement="top"
                                        title="Nama bahan baku adalah nama yang ditunjukkan pada nama material bahan baku dalam pembuatan produk. Contoh : Biji besi, Bracket dll"
                                        class="fas fa-info-circle">
                                    </i></label>
                                <input type="text" name="uraian"
                                    class="form-control form-control-sm trigger-enter" id="uraian" placeholder="">
                            </div>
                            <div class="form-group col-6">
                                <label for="produsen_tingkat_dua">Pemasok / Produsen Tingkat 2 <i
                                        class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                                        title="Tooltip on top">
                                    </i></label>
                                <input type="text" name="produsen_tingkat_dua"
                                    class="form-control form-control-sm trigger-enter" id="produsen_tingkat_dua"
                                    placeholder="">
                            </div>
                            <div class="form-group col-6">
                                <label for="jumlah">Jumlah <i class="fas fa-info-circle" data-toggle="tooltip"
                                        data-placement="top" title="Tooltip on top">
                                    </i></label>
                                <input type="text"
                                    class="form-control form-control-sm trigger-enter currencyInputFormatter"
                                    id="jumlah" name="jumlah" placeholder="">
                            </div>
                            <div class="form-group col-6">
                                <label for="tkdn">TKDN % <i class="fas fa-info-circle" data-toggle="tooltip"
                                        data-placement="top" title="Tooltip on top">
                                    </i></label>
                                <input type="text"
                                    class="form-control form-control-sm trigger-enter replaceDot currencyInputFormatter"
                                    id="tkdn" name="tkdn" placeholder="">
                            </div>
                            <div class="form-group col-6">
                                <label for="biaya">Biaya <i class="fas fa-info-circle" data-toggle="tooltip"
                                        data-placement="top" title="Tooltip on top">
                                    </i></label>
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                    </div>
                                    <input type="text"
                                        class="form-control rupiahInput trigger-enter currencyInputFormatter"
                                        placeholder="" id="biaya" name="biaya" required autocomplete="off"
                                        value="0,00">
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label for="alokasi">Alokasi Biaya % <i class="fas fa-info-circle"
                                        data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                    </i></label>
                                <input type="text"
                                    class="form-control form-control-sm trigger-enter replaceDot currencyInputFormatter"
                                    id="alokasi" name="alokasi" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editCalculation-3" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Form 1.3 : Tingkat Komponen Dalam Tenaga Kerja
                        Langsung
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editForm-3" method="post">
                    <input type="hidden" name="id">
                    <div class="modal-body" id="modal-edit-calculation">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="uraian_posisi">Uraian Posisi <i data-toggle="tooltip" data-placement="top"
                                        title="Nama bahan baku adalah nama yang ditunjukkan pada nama material bahan baku dalam pembuatan produk. Contoh : Biji besi, Bracket dll"
                                        class="fas fa-info-circle">
                                    </i></label>
                                <input type="text" class="form-control trigger-enter form-control-sm"
                                    id="uraian_posisi" placeholder="" name="uraian_posisi">
                            </div>
                            <div class="form-group col-6">
                                <label for="">Kewarganegaraan <i class="fas fa-info-circle"
                                        data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                    </i></label>
                                <select class="form-control trigger-enter form-control-sm setTkdn" id=""
                                    name="kewarganegaraan">
                                    <option></option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country }}" {{ $country == "Indonesia" ? "selected" : "" }}>{{ $country }}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" id="editTkdn-1-3" value="" name="tkdn">
                            </div>
                            <div class="form-group col-6">
                                <label for="">Jumlah Orang <i class="fas fa-info-circle" data-toggle="tooltip"
                                        data-placement="top" title="Tooltip on top">
                                    </i></label>
                                <input type="number" class="form-control trigger-enter form-control-sm"
                                    id="" placeholder="" name="jumlah_orang" value="">
                            </div>
                            <div class="form-group col-6">
                                <label for="">Gaji Perbulan<i class="fas fa-info-circle" data-toggle="tooltip"
                                        data-placement="top" title="Tooltip on top">
                                    </i></label>
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                    </div>
                                    <input type="text" class="form-control trigger-enter currencyInputFormatter"
                                        placeholder="" id="1-2-gaji_perbulan" name="gaji_perbulan" required
                                        autocomplete="off" value="0,00">
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label for="">Alokasi Gaji % <i class="fas fa-info-circle"
                                        data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                    </i></label>
                                <input type="text"
                                    class="form-control trigger-enter form-control-sm replaceDot currencyInputFormatter"
                                    id="" placeholder="" name="alokasi_gaji" value="0,00">
                            </div>
                            <div class="form-group col-6">
                                <div class="card p-2">
                                    <div class="col">
                                        <div class="row">
                                            <label for="" class="mx-auto">Biaya (Rp.) <i
                                                    class="fas fa-info-circle" data-toggle="tooltip"
                                                    data-placement="top" title="Tooltip on top">
                                                </i></label>
                                        </div>
                                        <div class="row">
                                            <div class="form-group-sm ml-2" style="font-size: 7pt;">
                                                <label for="">BPJS</label>
                                                <div class="input-group input-group-sm mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control trigger-enter form-control-sm currencyInputFormatter"
                                                        placeholder="" id="bpjs" name="bpjs" required
                                                        autocomplete="off" value="0,00">
                                                </div>
                                            </div>
                                            <div class="form-group-sm ml-2" style="font-size: 7pt;">
                                                <label for="">Tunjangan Lainnya</label>
                                                <div class="input-group input-group-sm mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control trigger-enter form-control-sm currencyInputFormatter"
                                                        placeholder="" id="currency_tunjangan_lainnya"
                                                        name="currency_tunjangan_lainnya" required autocomplete="off"
                                                        value="0,00">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editCalculation-4" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Form 1.4 : Tingkat Komponen Dalam Negeri Jasa
                        Tenaga Kerja Langsung
                        Langsung
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editForm-4" method="post">
                    <input type="hidden" name="id">
                    <div class="modal-body" id="modal-edit-calculation">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="uraian_posisi">Uraian Posisi <i data-toggle="tooltip" data-placement="top"
                                        title="Nama bahan baku adalah nama yang ditunjukkan pada nama material bahan baku dalam pembuatan produk. Contoh : Biji besi, Bracket dll"
                                        class="fas fa-info-circle">
                                    </i></label>
                                <input type="text" class="form-control trigger-enter form-control-sm "
                                    id="uraian_posisi" name="uraian_posisi" placeholder="">
                            </div>
                            <div class="form-group col-6">
                                <label for="produsen_tingkat_dua">Pemasok / Produsen Tingkat 2 <i
                                        class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                                        title="Tooltip on top">
                                    </i></label>
                                <input type="text" class="form-control trigger-enter form-control-sm"
                                    id="produsen_tingkat_dua" name="produsen_tingkat_dua" placeholder="">
                            </div>
                            <div class="form-group col-6">
                                <label for="tkdn">TKDN % <i class="fas fa-info-circle" data-toggle="tooltip"
                                        data-placement="top" title="Tooltip on top">
                                    </i></label>
                                <input type="text"
                                    class="form-control trigger-enter form-control-sm replaceDot currencyInputFormatter"
                                    id="tkdn" name="tkdn" placeholder="" value="0,00">
                            </div>
                            <div class="form-group col-6">
                                <label for="jumlah_orang">Jumlah Orang <i class="fas fa-info-circle"
                                        data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                    </i></label>
                                <input type="number" class="form-control trigger-enter form-control-sm"
                                    id="jumlah_orang" name="jumlah_orang" placeholder="" value="">
                            </div>
                            <div class="form-group col-6">
                                <label for="biaya_pengurusan_per_bulan">Biaya Pengurusan Per Bulan <i
                                        class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                                        title="Tooltip on top">
                                    </i></label>
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                    </div>
                                    <input type="text" class="form-control trigger-enter currencyInputFormatter"
                                        placeholder="" id="biaya_pengurusan_per_bulan"
                                        name="biaya_pengurusan_per_bulan" required autocomplete="off" value="0,00">
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label for="alokasi">Alokasi % <i class="fas fa-info-circle" data-toggle="tooltip"
                                        data-placement="top" title="Tooltip on top">
                                    </i></label>
                                <input type="text"
                                    class="form-control trigger-enter form-control-sm replaceDot currencyInputFormatter"
                                    id="alokasi" name="alokasi" placeholder="" value="0,00">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editCalculation-5" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Form 1.5 : Tingkat Komponen Dalam Negeri Biaya
                        Tidak Langsung Pabrik
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editForm-5" method="post">
                    <input type="hidden" name="id">
                    <div class="modal-body" id="modal-edit-calculation">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="uraian_posisi">Uraian Posisi <i data-toggle="tooltip" data-placement="top"
                                        title="Nama bahan baku adalah nama yang ditunjukkan pada nama material bahan baku dalam pembuatan produk. Contoh : Biji besi, Bracket dll"
                                        class="fas fa-info-circle">
                                    </i></label>
                                <input type="text" class="form-control trigger-enter form-control-sm"
                                    id="uraian_posisi" placeholder="" name="uraian_posisi">
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label for="">Kewarganegaraan <i class="fas fa-info-circle" data-toggle="tooltip"
                                    data-placement="top" title="Tooltip on top">
                                </i></label>
                            <select class="form-control trigger-enter form-control-sm setTkdn" id=""
                                name="kewarganegaraan">
                                <option></option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country }}" {{ $country == "Indonesia" ? "selected" : "" }}>{{ $country }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" id="editTkdn-1-3" value="" name="tkdn">
                        </div>
                        <div class="form-group col-6">
                            <label>
                                Jumlah Orang
                                <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                                    title="Tooltip on top"></i>
                            </label>
                            <input type="number" class="form-control trigger-enter form-control-sm" id="jumlah_orang"
                                name="jumlah_orang" value="">
                        </div>
                        <div class="form-group col-6">
                            <label>
                                Gaji Per Bulan
                                <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                                    title="Tooltip on top"></i>
                            </label>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                                </div>
                                <input type="text" class="form-control trigger-enter currencyInputFormatter"
                                    placeholder="" id="gaji_perbulan" name="gaji_perbulan" required
                                    autocomplete="off" value="0,00">
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label>
                                Alokasi Gaji %
                                <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                                    title="Tooltip on top"></i>
                            </label>
                            <input type="text"
                                class="form-control trigger-enter form-control-sm replaceDot currencyInputFormatter"
                                placeholder="" id="alokasi" name="alokasi" value="0,00">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editCalculation-6" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Form 1.6 : Tingkat Komponen Dalam Biaya Tidak
                        Langsung Pabrik
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editForm-6" method="post">
                    <input type="hidden" name="id">
                    <div class="modal-body" id="modal-edit-calculation">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="">Uraian <i data-toggle="tooltip" data-placement="top"
                                        title="Nama bahan baku adalah nama yang ditunjukkan pada nama material bahan baku dalam pembuatan produk. Contoh : Biji besi, Bracket dll"
                                        class="fas fa-info-circle">
                                    </i></label>
                                <input type="text" class="form-control trigger-enter form-control-sm "
                                    id="" placeholder="" name="uraian">
                            </div>
                            <div class="form-group col-6">
                                <label for="">Spesifikasi <i class="fas fa-info-circle" data-toggle="tooltip"
                                        data-placement="top" title="Tooltip on top">
                                    </i></label>
                                <input type="text" class="form-control trigger-enter form-control-sm"
                                    id="" placeholder="" name="spesifikasi" name="spesifikasi">
                            </div>
                            <div class="form-group col-6">
                                <label for="">Jumlah Unit <i class="fas fa-info-circle" data-toggle="tooltip"
                                        data-placement="top" title="Tooltip on top">
                                    </i></label>
                                <input type="number" class="form-control trigger-enter form-control-sm"
                                    id="" placeholder="" name="jumlah_unit" value="">
                            </div>
                            <div class="form-group col-6">
                                <label for="">Biaya Depresiasi Per Bulan<i class="fas fa-info-circle"
                                        data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                    </i></label>
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                    </div>
                                    <input type="text" class="form-control trigger-enter currencyInputFormatter"
                                        placeholder="" id="biaya_depresiasi_perbulan" name="biaya_depresiasi_perbulan"
                                        required autocomplete="off" value="0,00">
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label for="">Alokasi Mesin % <i class="fas fa-info-circle"
                                        data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                    </i></label>
                                <input type="text"
                                    class="form-control trigger-enter form-control-sm replaceDot currencyInputFormatter"
                                    id="" placeholder="" name="alokasi" value="0,00">
                            </div>
                            <div class="form-group col-6">
                                <div class="card p-2">
                                    <div class="col">
                                        <div class="row">
                                            <label for="" class="mx-auto">Alat Kerja<i
                                                    class="fas fa-info-circle" data-toggle="tooltip"
                                                    data-placement="top" title="Tooltip on top">
                                                </i></label>
                                        </div>
                                        <div class="row">
                                            <div class="form-group-sm ml-2" style="font-size: 7pt;">
                                                <label for="">Dibuat</label>
                                                <select name="dibuat" id="editDibuat-1-6"
                                                    class="form-control trigger-enter form-control-sm"
                                                    style="width: 8rem">
                                                    <option value="Dalam Negeri">Dalam Negeri</option>
                                                    <option value="Luar Negeri">Luar Negeri</option>
                                                </select>
                                            </div>
                                            <div class="form-group-sm ml-2" style="font-size: 7pt;">
                                                <label for="">Dimiliki</label>
                                                <select name="dimiliki" id="editDimiliki-1-6"
                                                    class="form-control trigger-enter form-control-sm"
                                                    style="width: 8rem">
                                                    <option value="Dalam Negeri">Dalam Negeri</option>
                                                    <option value="Luar Negeri">Luar Negeri</option>
                                                    <option value="DN + LN">DN + LN</option>
                                                </select>
                                            </div>
                                            <div class="form-group-sm ml-2 d-none" id="edit-form-group-saham-1-6"
                                                style="font-size: 7pt;">
                                                <label for="">Komposisi Saham</label>
                                                <input type="text"
                                                    class="form-control trigger-enter form-control-sm currencyInputFormatter"
                                                    name="saham" id="editSaham-1-6">
                                                <p class="text-danger d-none" id="edit-is-invalid-saham-1-6"
                                                    style="font-size: 10pt; width: 12rem">Nilai Komposisi
                                                    Saham Tidak Boleh Lebih Dari 75% Jika Dibuat Di Luar
                                                    Negeri</p>
                                            </div>
                                            <input type="hidden" name="tkdn" id="editTkdn-1-6" value="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editCalculation-7" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Form 1.3 : Tingkat Komponen Dalam Tenaga Kerja
                        Langsung
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editForm-7" method="post">
                    <input type="hidden" name="id">
                    <div class="modal-body" id="modal-edit-calculation">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="">Uraian <i data-toggle="tooltip" data-placement="top"
                                        title="Nama bahan baku adalah nama yang ditunjukkan pada nama material bahan baku dalam pembuatan produk. Contoh : Biji besi, Bracket dll"
                                        class="fas fa-info-circle">
                                    </i></label>
                                <input type="text" class="form-control trigger-enter form-control-sm "
                                    id="" placeholder="" name="uraian">
                            </div>
                            <div class="form-group col-6">
                                <label for="">Spesifikasi <i class="fas fa-info-circle" data-toggle="tooltip"
                                        data-placement="top" title="Tooltip on top">
                                    </i></label>
                                <input type="text" class="form-control trigger-enter form-control-sm"
                                    id="" placeholder="" name="spesifikasi" name="spesifikasi">
                            </div>
                            <div class="form-group col-6">
                                <label for="">Produsen Tingkat 2 <i class="fas fa-info-circle"
                                        data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                    </i></label>
                                <input type="text" class="form-control trigger-enter form-control-sm"
                                    id="" placeholder="" name="produsen_tingkat_dua">
                            </div>
                            <div class="form-group col-6">
                                <label for="">Jumlah Unit <i class="fas fa-info-circle" data-toggle="tooltip"
                                        data-placement="top" title="Tooltip on top">
                                    </i></label>
                                <input type="number" class="form-control trigger-enter form-control-sm"
                                    id="" placeholder="" name="jumlah_unit" value="">
                            </div>
                            <div class="form-group col-6">
                                <label for="">Biaya Sewa Per Bulan<i class="fas fa-info-circle"
                                        data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                    </i></label>
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                    </div>
                                    <input type="text" class="form-control trigger-enter currencyInputFormatter"
                                        placeholder="" id="biaya_sewa_perbulan" name="biaya_sewa_perbulan" required
                                        autocomplete="off" value="0,00">
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label for="">Alokasi Mesin % <i class="fas fa-info-circle"
                                        data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                    </i></label>
                                <input type="text"
                                    class="form-control trigger-enter form-control-sm replaceDot currencyInputFormatter"
                                    id="" placeholder="" name="alokasi" value="0,00">
                            </div>
                            <div class="form-group col-6">
                                <div class="card p-2">
                                    <div class="col">
                                        <div class="row">
                                            <label for="" class="mx-auto">Alat Kerja<i
                                                    class="fas fa-info-circle" data-toggle="tooltip"
                                                    data-placement="top" title="Tooltip on top">
                                                </i></label>
                                        </div>
                                        <div class="row">
                                            <div class="form-group-sm ml-2" style="font-size: 7pt;">
                                                <label for="">Dibuat</label>
                                                <select name="dibuat" id="editDibuat-1-7"
                                                    class="form-control trigger-enter form-control-sm"
                                                    style="width: 8rem">
                                                    <option value="Dalam Negeri">Dalam Negeri</option>
                                                    <option value="Luar Negeri">Luar Negeri</option>
                                                </select>
                                            </div>
                                            <div class="form-group-sm ml-2" style="font-size: 7pt;">
                                                <label for="">Dimiliki</label>
                                                <select name="dimiliki" id="editDimiliki-1-7"
                                                    class="form-control trigger-enter form-control-sm"
                                                    style="width: 8rem">
                                                    <option value="Dalam Negeri">Dalam Negeri</option>
                                                    <option value="Luar Negeri">Luar Negeri</option>
                                                    <option value="DN + LN">DN + LN</option>
                                                </select>
                                            </div>
                                            <div class="form-group-sm ml-2 d-none" id="edit-form-group-saham-1-7"
                                                style="font-size: 7pt;">
                                                <label for="">Komposisi Saham</label>
                                                <input type="text"
                                                    class="form-control trigger-enter form-control-sm currencyInputFormatter"
                                                    name="saham" id="editSaham-1-7">
                                                <p class="text-danger d-none" id="edit-is-invalid-saham-1-7"
                                                    style="font-size: 10pt; width: 12rem">Nilai Komposisi
                                                    Saham Tidak Boleh Lebih Dari 75% Jika Dibuat Di Luar
                                                    Negeri</p>
                                            </div>
                                            <input type="hidden" name="tkdn" id="editTkdn-1-7" value="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editCalculation-8" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Form 1.3 : Tingkat Komponen Dalam Tenaga Kerja
                        Langsung
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editForm-8" method="post">
                    <input type="hidden" name="id">
                    <div class="modal-body" id="modal-edit-calculation">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="">Uraian <i data-toggle="tooltip" data-placement="top"
                                        title="Nama bahan baku adalah nama yang ditunjukkan pada nama material bahan baku dalam pembuatan produk. Contoh : Biji besi, Bracket dll"
                                        class="fas fa-info-circle">
                                    </i></label>
                                <input type="text" class="form-control trigger-enter form-control-sm "
                                    id="" placeholder="" name="uraian">
                            </div>
                            <div class="form-group col-6">
                                <label for="">Pemasok <i class="fas fa-info-circle" data-toggle="tooltip"
                                        data-placement="top" title="Tooltip on top">
                                    </i></label>
                                <input type="text" class="form-control trigger-enter form-control-sm"
                                    id="" placeholder="" name="pemasok">
                            </div>
                            <div class="form-group col-6">
                                <label for="">Jumlah <i class="fas fa-info-circle" data-toggle="tooltip"
                                        data-placement="top" title="Tooltip on top">
                                    </i></label>
                                <input type="number" class="form-control trigger-enter form-control-sm"
                                    id="" placeholder="" name="jumlah" value="">
                            </div>
                            <div class="form-group col-6">
                                <label for="tkdn">TKDN % <i class="fas fa-info-circle" data-toggle="tooltip"
                                        data-placement="top" title="Tooltip on top">
                                    </i></label>
                                <input type="text"
                                    class="form-control trigger-enter form-control-sm replaceDot currencyInputFormatter"
                                    id="tkdn" name="tkdn" placeholder="" value="0,00">
                            </div>
                            <div class="form-group col-6">
                                <label for="">Biaya Per Bulan<i class="fas fa-info-circle"
                                        data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                    </i></label>
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                    </div>
                                    <input type="text" class="form-control trigger-enter currencyInputFormatter"
                                        placeholder="" id="biaya_perbulan" name="biaya_perbulan" required
                                        autocomplete="off" value="0,00">
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label for="">Alokasi Pengguna % <i class="fas fa-info-circle"
                                        data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                    </i></label>
                                <input type="text"
                                    class="form-control trigger-enter form-control-sm replaceDot currencyInputFormatter"
                                    id="" placeholder="" name="alokasi" value="0,00">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('library/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/autonumeric/4.10.0/autoNumeric.min.js"></script>
    <script>
        $(() => {
            var currencyInputFormatter = new AutoNumeric.multiple('.currencyInputFormatter', 0, {
                digitGroupSeparator: '.',
                decimalCharacter: ',',
                decimalPlaces: 2,
                minimumValue: '0',
                watchExternalChanges: true,
            })
        })
    </script>
    <script>
        var baseUrl = "http://127.0.0.1:8000";
        var url = new URL(window.location.href);
        var path = url.pathname;
        var match = path.match(/\/(\d+)$/);
        let computationId = match[1];
        let draftCalculations = localStorage.getItem("draftCalculations") != null ? localStorage.getItem(
            "draftCalculations") : null;

        let calculations = null;

        init();

        function init() {
            calculations = null;
            if (draftCalculations != null) {
                if (typeof(draftCalculations) == 'string') {
                    draftCalculations = JSON.parse(draftCalculations);
                }
                let draftCalculation = draftCalculations.find(f => f.computationId == computationId);
                if (draftCalculation != null) { // ada tpi id computation tidak ditemukan
                    calculations = draftCalculation.calculations;
                    return calculations;
                } else {
                    $.ajax({
                        type: 'GET',
                        url: '{{ $computation->calculation_result != null ? route('calculation-results.show', $computation->calculation_result->id) : 'fail' }}',
                        async: false,
                        success: function(response) {
                            draftCalculation = response.calculationResult.results;
                            draftCalculations.push(draftCalculation);

                            init();
                        },
                        error: function(error) {
                            calculations = [{
                                    "id": "1",
                                    "no": "1.1",
                                    "nama": "Bahan Baku Material Langsung",
                                    "slug": "bahan-baku-material-langsung",
                                    "formulas": {
                                        kdn: "{tkdn}% * {jumlah} * {harga_satuan}",
                                        kln: "(100% - {tkdn}%) * {jumlah} * {harga_satuan}",
                                        total: "{formulas.kdn} + {formulas.kln}",
                                        ppnCalc: "{ppn}% * ({formulas.kdn} + {formulas.kln})",
                                        bmCalc: "{bm}% * ({formulas.kdn} + {formulas.kln})",
                                        pdriPpnCalc: "{pdri_ppn}% * ({formulas.bmCalc} + ({formulas.kdn} + {formulas.kln}))",
                                        pphCalc: "{pph}% * ({formulas.bmCalc} + ({formulas.kdn} + {formulas.kln}))",
                                        sumKdn: "sum:kdn",
                                        sumKln: "sum:kln",
                                        sumTotal: "sum:total",
                                        sumPpn: "sum:ppnCalc",
                                        sumBm: "sum:bmCalc",
                                        sumPph: "sum:pphCalc",
                                        sumPajakTotal: "sum:bmCalc + sum:ppnCalc + sum:pphCalc",
                                    },
                                    "data": []
                                },
                                {
                                    "id": "2",
                                    "no": "1.2",
                                    "nama": "Bahan Baku Material Tidak Langsung",
                                    "slug": "bahan-baku-material-tidak-langsung",
                                    "formulas": {
                                        kdn: "{tkdn}% * {jumlah} * {biaya} * {alokasi}%",
                                        kln: "(100% - {tkdn}%) * {jumlah} * {biaya} * {alokasi}%",
                                        total: "{formulas.kdn} + {formulas.kln}",
                                        sumKdn: "sum:kdn",
                                        sumKln: "sum:kln",
                                        sumTotal: "sum:total",
                                    },
                                    "data": [{
                                            "uraian": "BM",
                                            "produsen_tingkat_dua": "Pajak",
                                            "jumlah": "1,00",
                                            "tkdn": "100,00",
                                            "biaya": "0,00",
                                            "alokasi": "100,00",
                                            "id": new Date().getTime(),
                                            "kdn": 0,
                                            "kln": 0,
                                            "total": 0,
                                        },
                                        {
                                            "uraian": "PPN",
                                            "produsen_tingkat_dua": "Pajak",
                                            "jumlah": "1,00",
                                            "tkdn": "100,00",
                                            "biaya": "0,00",
                                            "alokasi": "100,00",
                                            "id": new Date().getTime(),
                                            "kdn": 0,
                                            "kln": 0,
                                            "total": 0,
                                        },
                                        {
                                            "uraian": "PPH",
                                            "produsen_tingkat_dua": "Pajak",
                                            "jumlah": "1,00",
                                            "tkdn": "100,00",
                                            "biaya": "0,00",
                                            "alokasi": "100,00",
                                            "id": new Date().getTime(),
                                            "kdn": 0,
                                            "kln": 0,
                                            "total": 0,
                                        }
                                    ]
                                },
                                {
                                    "id": "3",
                                    "no": "1.3",
                                    "nama": "Tenaga Kerja Langsung",
                                    "slug": "tenaga-kerja-langsung",
                                    "formulas": {
                                        kdn: "{tkdn}% * {jumlah_orang} * {gaji_perbulan} * {alokasi_gaji}%",
                                        kln: "(100% - {tkdn}%) * {jumlah_orang} * {gaji_perbulan} * {alokasi_gaji}%",
                                        total: "{formulas.kdn} + {formulas.kln}",
                                        bpjs: "{bpjs}",
                                        tunjangan_lainnya: "{currency_tunjangan_lainnya}",
                                        sumJumlahOrang: "sum:jumlah_orang",
                                        sumKdn: "sum:kdn",
                                        sumKln: "sum:kln",
                                        sumTotal: "sum:total",
                                        sumBpjs: "sum:bpjs",
                                        sumTunjanganLainnya: "sum:tunjangan_lainnya",
                                    },
                                    "data": []
                                },
                                {
                                    "id": "4",
                                    "no": "1.4",
                                    "nama": "Tenaga Kerja Langsung Untuk Biaya Terkait Lainnya",
                                    "slug": "tenaga-kerja-langsung-untuk-biaya-terkait-lainnya",
                                    "formulas": {
                                        kdn: "{tkdn}% * {jumlah_orang} * {biaya_pengurusan_per_bulan} * {alokasi}%",
                                        kln: "(100% - {tkdn}%) * {jumlah_orang} * {biaya_pengurusan_per_bulan} * {alokasi}%",
                                        total: "{formulas.kdn} + {formulas.kln}",
                                        sumJumlahOrang: "sum:jumlah_orang",
                                        sumKdn: "sum:kdn",
                                        sumKln: "sum:kln",
                                        sumTotal: "sum:total",
                                    },
                                    "data": [{
                                            "uraian_posisi": "BPJS",
                                            "produsen_tingkat_dua": "-",
                                            "tkdn": "100,00",
                                            "jumlah_orang": 1,
                                            "biaya_pengurusan_per_bulan": "0,00",
                                            "alokasi": "100,00",
                                            "id": new Date().getTime(),
                                            "kdn": 0,
                                            "kln": 0,
                                            "total": 0
                                        },
                                        {
                                            "uraian_posisi": "Tunjangan Lainnya",
                                            "produsen_tingkat_dua": "-",
                                            "tkdn": "100,00",
                                            "jumlah_orang": 1,
                                            "biaya_pengurusan_per_bulan": "0,00",
                                            "alokasi": "100,00",
                                            "id": new Date().getTime(),
                                            "kdn": 0,
                                            "kln": 0,
                                            "total": 0
                                        }
                                    ]
                                },
                                {
                                    "id": "5",
                                    "no": "1.5",
                                    "nama": "Tenaga Kerja Tidak Langsung",
                                    "slug": "tenaga-kerja-tidak-langsung",
                                    "formulas": {
                                        kdn: "{tkdn}% * {jumlah_orang} * {gaji_perbulan} * {alokasi}%",
                                        kln: "(100% - {tkdn}%) * {jumlah_orang} * {gaji_perbulan} * {alokasi}%",
                                        total: "{formulas.kdn} + {formulas.kln}",
                                        sumJumlahOrang: "sum:jumlah_orang",
                                        sumKdn: "sum:kdn",
                                        sumKln: "sum:kln",
                                        sumTotal: "sum:total",
                                    },
                                    "data": []
                                },
                                {
                                    "id": "6",
                                    "no": "1.6",
                                    "nama": "Mesin Yang Dimiliki",
                                    "slug": "mesin-yang-dimiliki",
                                    "formulas": {
                                        kdn: "{tkdn}% * {jumlah_unit} * {biaya_depresiasi_perbulan} * {alokasi}%",
                                        kln: "(100% - {tkdn}%) * {jumlah_unit} * {biaya_depresiasi_perbulan} * {alokasi}%",
                                        total: "{formulas.kdn} + {formulas.kln}",
                                        sumJumlahUnit: "sum:jumlah_unit",
                                        sumKdn: "sum:kdn",
                                        sumKln: "sum:kln",
                                        sumTotal: "sum:total",
                                    },
                                    "data": []
                                },
                                {
                                    "id": "7",
                                    "no": "1.7",
                                    "nama": "Mesin Yang Disewa",
                                    "slug": "mesin-yang-disewa",
                                    "formulas": {
                                        kdn: "{tkdn}% * {jumlah_unit} * {biaya_sewa_perbulan} * {alokasi}%",
                                        kln: "(100% - {tkdn}%) * {jumlah_unit} * {biaya_sewa_perbulan} * {alokasi}%",
                                        total: "{formulas.kdn} + {formulas.kln}",
                                        sumJumlahUnit: "sum:jumlah_unit",
                                        sumKdn: "sum:kdn",
                                        sumKln: "sum:kln",
                                        sumTotal: "sum:total",
                                    },
                                    "data": []
                                },
                                {
                                    "id": "8",
                                    "no": "1.8",
                                    "nama": "Biaya Tidak Langsung Terkait Lainnya",
                                    "slug": "biaya-tidak-langsung-terkait-lainnya",
                                    "formulas": {
                                        kdn: "{tkdn}% * {jumlah} * {biaya_perbulan} * {alokasi}%",
                                        kln: "(100% - {tkdn}%) * {jumlah} * {biaya_perbulan} * {alokasi}%",
                                        total: "{formulas.kdn} + {formulas.kln}",
                                        sumJumlah: "sum:jumlah",
                                        sumKdn: "sum:kdn",
                                        sumKln: "sum:kln",
                                        sumTotal: "sum:total",
                                    },
                                    "data": []
                                },
                            ];
                            draftCalculation = {
                                computationId: computationId,
                                calculations: calculations,
                                kapasitasNormalPerbulan: 1,
                            }
                            draftCalculations.push(draftCalculation);
                            init();
                        }
                    });
                    localStorage.setItem("draftCalculations", JSON.stringify(draftCalculations))
                }
            } else {
                draftCalculations = [];
                init();
            }
            return calculations;
        }

        reloadAllTable()

        $(() => {
            $(window).on('beforeunload', function() {
                localStorage.removeItem("draftCalculations");
            });

            $("#form-1").on("submit", (event) => {
                event.preventDefault();
                let serializedArray = $("#form-1").serializeArray();
                let formResult = {};

                for (let i = 0; i < serializedArray.length; i++) {
                    let input = serializedArray[i];
                    formResult[input.name] = input.value;
                }

                formResult["id"] = new Date().getTime()

                let storeCalculation = calculateAndBind(formResult, 1);

                reloadAllTable()

                $("#form-1")[0].reset();

                swal({
                    title: "Success",
                    text: "Success to add new calculation",
                    icon: "success",
                })
            })

            $("#form-2").on("submit", (event) => {
                event.preventDefault();
                let serializedArray = $("#form-2").serializeArray();
                let formResult = {};

                for (let i = 0; i < serializedArray.length; i++) {
                    let input = serializedArray[i];
                    formResult[input.name] = input.value;
                }

                formResult["id"] = new Date().getTime()

                let storeCalculation = calculateAndBind(formResult, 2);

                reloadAllTable()

                $("#form-2")[0].reset();

                swal({
                    title: "Success",
                    text: "Success to add new calculation",
                    icon: "success",
                })
            })

            $("#form-3").on("submit", (event) => {
                event.preventDefault();
                let serializedArray = $("#form-3").serializeArray();
                let formResult = {};

                for (let i = 0; i < serializedArray.length; i++) {
                    let input = serializedArray[i];
                    formResult[input.name] = input.value;
                }

                formResult["id"] = new Date().getTime()

                let storeCalculation = calculateAndBind(formResult, 3);

                reloadAllTable()

                $("#form-3")[0].reset();

                swal({
                    title: "Success",
                    text: "Success to add new calculation",
                    icon: "success",
                })
            })

            $("#form-4").on("submit", (event) => {
                event.preventDefault();
                let serializedArray = $("#form-4").serializeArray();
                let formResult = {};

                for (let i = 0; i < serializedArray.length; i++) {
                    let input = serializedArray[i];
                    formResult[input.name] = input.value;
                }

                formResult["id"] = new Date().getTime()

                let storeCalculation = calculateAndBind(formResult, 4);

                reloadAllTable()

                $("#form-4")[0].reset();

                swal({
                    title: "Success",
                    text: "Success to add new calculation",
                    icon: "success",
                })
            })

            $("#form-5").on("submit", (event) => {
                event.preventDefault();
                let serializedArray = $("#form-5").serializeArray();
                let formResult = {};

                for (let i = 0; i < serializedArray.length; i++) {
                    let input = serializedArray[i];
                    formResult[input.name] = input.value;
                }

                formResult["id"] = new Date().getTime()

                let storeCalculation = calculateAndBind(formResult, 5);

                reloadAllTable()

                $("#form-5")[0].reset();

                swal({
                    title: "Success",
                    text: "Success to add new calculation",
                    icon: "success",
                })
            })

            $("#form-6").on("submit", (event) => {
                event.preventDefault();
                let serializedArray = $("#form-6").serializeArray();
                let formResult = {};

                for (let i = 0; i < serializedArray.length; i++) {
                    let input = serializedArray[i];
                    formResult[input.name] = input.value;
                }

                formResult["id"] = new Date().getTime()

                let storeCalculation = calculateAndBind(formResult, 6);

                reloadAllTable()

                $("#form-6")[0].reset();
                $("#tkdn-1-6").val("100");
                $("#form-group-saham-1-6").addClass("d-none");

                swal({
                    title: "Success",
                    text: "Success to add new calculation",
                    icon: "success",
                })
            })

            $("#form-7").on("submit", (event) => {
                event.preventDefault();
                let serializedArray = $("#form-7").serializeArray();
                let formResult = {};

                for (let i = 0; i < serializedArray.length; i++) {
                    let input = serializedArray[i];
                    formResult[input.name] = input.value;
                }

                formResult["id"] = new Date().getTime()

                let storeCalculation = calculateAndBind(formResult, 7);

                reloadAllTable()

                $("#form-7")[0].reset();
                $("#tkdn-1-7").val("100");
                $("#form-group-saham-1-7").addClass("d-none");

                swal({
                    title: "Success",
                    text: "Success to add new calculation",
                    icon: "success",
                })
            })

            $("#form-8").on("submit", (event) => {
                event.preventDefault();
                let serializedArray = $("#form-8").serializeArray();
                let formResult = {};

                for (let i = 0; i < serializedArray.length; i++) {
                    let input = serializedArray[i];
                    formResult[input.name] = input.value;
                }

                formResult["id"] = new Date().getTime()

                let storeCalculation = calculateAndBind(formResult, 8);

                reloadAllTable()

                $("#form-8")[0].reset();

                swal({
                    title: "Success",
                    text: "Success to add new calculation",
                    icon: "success",
                })
            })
        })

        function calculateAndBind(formResult, id, calculationId = null) {
            const sumRegex = /sum:(\w+)/g
            let calculation = calculations.find(f => f.id == id);
            let results = calculation.data;
            let formulas = calculation.formulas;
            let finalResult = {
                ...formResult
            };

            let replacedFormulas = replaceFormulas(formulas, formResult);

            for (let key in replacedFormulas) {
                sumRegex.lastIndex = 0;
                if (!sumRegex.test(replacedFormulas[key]) === true) {
                    finalResult[key] = eval(replacedFormulas[key]);
                }
            }

            if (calculationId != null) {
                // Temukan indeks objek yang memiliki ID sesuai
                const index = calculation.data.findIndex(item => item.id == calculationId);

                // Perbarui data jika indeks ditemukan
                if (index !== -1) {
                    calculation.data[index] = {
                        ...calculation.data[index],
                        ...finalResult
                    };
                    console.log('Data berhasil diupdate:', calculation.data[index]);
                } else {
                    console.log('ID tidak ditemukan:', id);
                }
            } else {
                calculation.data.push(finalResult);
            }

            calculateSumFormula();
            if (id == 1) {
                let calculation2 = calculations.find(f => f.id == 2);

                calculation2.data[0].kdn = calculation.sumBm;
                calculation2.data[0].total = calculation.sumBm;
                calculation2.data[0].biaya = formatToCurrency(calculation.sumBm);
                calculation2.data[1].kdn = calculation.sumPpn;
                calculation2.data[1].total = calculation.sumPpn;
                calculation2.data[1].biaya = formatToCurrency(calculation.sumPpn);
                calculation2.data[2].kdn = calculation.sumPph;
                calculation2.data[2].total = calculation.sumPph;
                calculation2.data[2].biaya = formatToCurrency(calculation.sumPph);

                calculateSumFormula();
            }

            if (id == 3) {
                let calculation4 = calculations.find(f => f.id == 4);

                calculation4.data[0].biaya_pengurusan_per_bulan = formatToCurrency(calculation.sumBpjs);
                calculation4.data[0].kdn = calculation.sumBpjs;
                calculation4.data[0].total = calculation.sumBpjs;
                calculation4.data[1].biaya_pengurusan_per_bulan = formatToCurrency(calculation.sumTunjanganLainnya);
                calculation4.data[1].kdn = calculation.sumTunjanganLainnya;
                calculation4.data[1].total = calculation.sumTunjanganLainnya;

                calculateSumFormula();
            }

            // Mengonversi objek menjadi string JSON
            let jsonDraftCalculations = JSON.stringify(draftCalculations);

            // Menyimpan data di Local Storage dengan kunci tertentu
            localStorage.setItem('draftCalculations', jsonDraftCalculations);

            store(`${baseUrl}/calculation-results`, `${baseUrl}/computation/${computationId}`,
                computationId, false)
        }

        function calculateSumFormula() {
            const sumRegex = /sum:(\w+)/g

            calculations.forEach(calculation => {
                let formulas = calculation.formulas;
                Object.keys(formulas).forEach(formulaKey => {
                    if (sumRegex.test(formulas[formulaKey])) {
                        let sum = 0;
                        sumRegex.lastIndex = 0;
                        formulas[formulaKey].replace(sumRegex, (match, key) => {
                            calculation.data.forEach(calculationResult => {
                                if (typeof calculationResult[key] == "string") {
                                    calculationResult[key] = parseFloat(calculationResult[
                                        key]);
                                }
                                sum += (calculationResult[key] != null ? calculationResult[
                                    key] : 0);
                            });
                        })

                        calculation[formulaKey] = sum;
                    }
                })
            })

            let draftCalculation = draftCalculations.find(f => f.computationId == computationId);

            calculations.forEach((calculation, index) => {
                if (index >= 2) {
                    calculation.bspKdn = (calculation.sumKdn ?? 0) / (draftCalculation.kapasitasNormalPerbulan ??
                        0);
                    calculation.bspKln = (calculation.sumKln ?? 0) / (draftCalculation.kapasitasNormalPerbulan ??
                        0);
                    calculation.bspTotal = (calculation.sumTotal ?? 0) / (draftCalculation
                        .kapasitasNormalPerbulan ?? 0);
                }
            })
        }

        function replaceFormulas(formulas, resultObject) {
            const variableRegex = /{(\w+)}/g;
            const variableRegex2 = /\{formulas\.(\w+)\}/g;
            let result = {};
            let replacedFormulas = {};
            for (let key in formulas) {
                replacedFormulas[key] = formulas[key].replace(variableRegex, function(match, fieldName) {
                    return parseCurrencyOrDecimal(resultObject[fieldName]) || 0;
                });
            }
            for (let key in replacedFormulas) {
                replacedFormulas[key] = replacedFormulas[key].replace(variableRegex2, function(match,
                    formulaName) {
                    return `(${replacedFormulas[formulaName]})` || 0;
                });

                let replacedPercent = replacePercent(replacedFormulas[key]);
                result[key] = replacedPercent;
            }

            return result;
        }

        function replacePercent(expression) {
            let percentageRegex = /(\d+(\.\d+)?)%/;

            for (let i = 0; i < 10; i++) {
                expression = expression.replace(percentageRegex, function(match, p1) {
                    if (p1 == 0) return 0;
                    return parseFloat(match).toFixed(14) / 100 || match;
                })
            }

            for (let i = 0; i < 5; i++) {
                expression = expression.replace(/(\d{1,3}(?:,\d{3})*(?:\.\d+)?)%$/, function(match, p1) {
                    if (p1 == 0) return 0;
                    let float = parseFloat(match).toFixed(14) / 100
                    return float || match;
                })
            }

            return expression;
        }

        function parseCurrencyOrDecimal(input) {
            var cleanedInput = "";
            // Hapus semua karakter titik sebagai pemisah ribuan
            if (input != null) {
                var cleanedInput = input.replace(/\./g, '');
            }

            // Periksa apakah string memiliki format mata uang (misal: 20.000,00)
            if (/^\d+,\d{2}$/.test(cleanedInput)) {
                // Jika iya, replace koma dengan titik dan parse ke float
                return parseFloat(cleanedInput.replace(',', '.'));
            } else if (/^\d+(\.\d+)?$/.test(cleanedInput)) {
                // Jika hanya angka desimal, parse ke float langsung
                return parseFloat(cleanedInput);
            } else {
                // Jika tidak sesuai dengan format yang diharapkan, kembalikan NaN atau penanganan kesalahan sesuai kebutuhan
                return input;
            }
        }

        function formatToCurrency(number) {
            // Format angka menjadi mata uang dengan dua desimal dan pemisah ribuan
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(number ?? 0);
        }


        function store(url, redirectUrl, computationId, willRedirect = true) {
            draftCalculation = draftCalculations.find(f => f.computationId == computationId);

            formData = {
                results: JSON.stringify(draftCalculation),
                computation_id: computationId,
            };

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: url,
                data: formData,
                success: function(response) {
                    // Mengonversi objek menjadi string JSON
                    let jsonDraftCalculations = JSON.stringify(draftCalculations);

                    // Menyimpan data di Local Storage dengan kunci tertentu
                    localStorage.setItem('draftCalculations', jsonDraftCalculations);

                    if (willRedirect) {
                        location.href = redirectUrl;
                    }

                    return true;
                },
                error: function(error) {
                    // Handle kesalahan di sini
                    console.log(error);
                }
            });
        }

        function submit(url, redirectUrl, computationId) {
            draftCalculation = draftCalculations.find(f => f.computationId == computationId);

            formData = {
                results: JSON.stringify(draftCalculation),
                computation_id: computationId,
            };

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: url,
                data: formData,
                success: function(response) {
                    // Mengonversi objek menjadi string JSON
                    let jsonDraftCalculations = JSON.stringify(draftCalculations);

                    // Menyimpan data di Local Storage dengan kunci tertentu
                    localStorage.setItem('draftCalculations', jsonDraftCalculations);

                    location.href = redirectUrl;

                    return true;
                },
                error: function(error) {
                    // Handle kesalahan di sini
                    console.log(error);
                }
            });
        }

        function edit(computation_id, calculation_id) {
            let computation = calculations.find(f => f.id == computation_id)
            let calculation = computation.data.find(f => f.id == calculation_id);

            Object.keys(calculation).forEach(key => {
                form = $(`#editCalculation-${computation_id} form`);

                form.find(`[name="${key}"]`).val(calculation[key]);
            });
        }

        calculations.forEach(item => {
            $(`#editForm-${item.id}`).on("submit", (event) => {
                event.preventDefault();

                let serializedArray = $(`#editForm-${item.id}`).serializeArray();

                calculation = {};

                for (let i = 0; i < serializedArray.length; i++) {
                    let input = serializedArray[i];
                    if (input.value != "") {
                        calculation[input.name] = input.value;
                    }
                }

                // formResult["id"] = new Date().getTime()

                let storeCalculation = calculateAndBind(calculation, item.id, calculation["id"]);

                reloadAllTable()

                swal({
                    title: "Success",
                    text: "Success to add new calculation",
                    icon: "success",
                })

                $(`#editForm-${item.id}`)[0].reset();
                $(`#editCalculation-${item.id}`).modal("hide")
            })
        })

        function destroy(computation_id, calculation_id) {
            let computation = calculations.find(f => f.id == computation_id);
            let calculationIndex = computation.data.findIndex(f => f.id == calculation_id);

            // Jika calculation dengan id yang diberikan ditemukan
            if (calculationIndex !== -1) {
                // Hapus calculation dari array computation.data
                computation.data.splice(calculationIndex, 1);

                calculateSumFormula();
                // Mengonversi objek menjadi string JSON
                let jsonDraftCalculations = JSON.stringify(draftCalculations);

                // Menyimpan data di Local Storage dengan kunci tertentu
                localStorage.setItem('draftCalculations', jsonDraftCalculations);

                store(`${baseUrl}/calculation-results`, `${baseUrl}/computation/${computationId}`,
                computationId, false);

                reloadAllTable();

                swal({
                    title: "Success",
                    text: "Success to delete the calculation",
                    icon: "success",
                })
            } else {
                console.log("Calculation tidak ditemukan");
            }
        }

        function reloadTable(tbodyId, calculationId) {
            let calculation = null;
            if (tbodyId == 'tbody-1') {
                const tbody = $(`#${tbodyId}`);
                tbody.empty();
                calculation = calculations.find(f => f.id == calculationId);
                let sumKdn = formatToCurrency(calculation.sumKdn);
                let sumKln = formatToCurrency(calculation.sumKln);
                let sumTotal = formatToCurrency(calculation.sumTotal);
                let sumPpn = formatToCurrency(calculation.sumPpn);
                let sumBm = formatToCurrency(calculation.sumBm);
                let sumPph = formatToCurrency(calculation.sumPph);
                let sumPajakTotal = formatToCurrency(calculation.sumPajakTotal);
                $('#sum-kdn').text(`${sumKdn}`)
                $('#sum-kln').text(`${sumKln}`)
                $('#sum-total').text(`${sumTotal}`)
                $('#sum-bm').text(`${sumBm}`)
                $('#sum-ppn').text(`${sumPpn}`)
                $('#sum-pph').text(`${sumPph}`)
                $('#sum-pajak-total').text(`${sumPajakTotal}`)
                calculation.data.forEach(function(item, index) {
                    let row = "<tr>" +
                        `<td>
                            <div class="dropdown text-secondary">
                                <div id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">
                                    <svg xmlns="http://www.w3.org/2000/svg" stroke="gray" height="16" width="4" viewBox="0 0 128 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/></svg>
                            </div>
                                <div class="dropdown-menu"
                                    aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item buttonEditNews" data-toggle="modal" data-target="#editCalculation-${calculationId}"
                                        onclick="edit(${calculation.id}, ${item.id})"><i class="fa fa-edit"></i> Edit
                                    </a>
                                    <button class="dropdown-item" type="submit" onclick="destroy(${calculation.id}, ${item.id})"><i
                                            class="fa fa-trash"></i> Delete</button>
                                </div>
                            </div>
                        </td>` +
                        "<td>" + (index + 1) + "</td>" +
                        "<td class='text-nowrap'>" + item.bahan_baku + "</td>" +
                        "<td>" + item.spesifikasi + "</td>" +
                        "<td>" + item.satuan_bahan_baku + "</td>" +
                        "<td>" + item.negara_asal + "</td>" +
                        "<td>" + item.pemasok + "</td>" +
                        "<td>" + item.tkdn + "%</td>" +
                        "<td>" + item.jumlah + "</td>" +
                        "<td class='text-nowrap'>" + "Rp " + item.harga_satuan + "</td>" +
                        "<td class='text-nowrap'>" + formatToCurrency(item.kdn) + "</td>" +
                        "<td class='text-nowrap'>" + formatToCurrency(item.kln) + "</td>" +
                        "<td class='text-nowrap'>" + formatToCurrency(item.total) + "</td>" +
                        "<td class='text-nowrap'>" + formatToCurrency(item.ppnCalc) + "</td>" +
                        "<td class='text-nowrap'>" + formatToCurrency(item.bmCalc) + "</td>" +
                        "<td class='text-nowrap'>" + formatToCurrency(item.pphCalc) + "</td>" +
                        "</tr>";

                    tbody.append(row);
                });
            } else if (tbodyId == "tbody-2") {
                const tbody = $(`#${tbodyId}`);
                tbody.empty();
                calculation = calculations.find(f => f.id == calculationId);
                let sumKdn = formatToCurrency(calculation.sumKdn)
                let sumKln = formatToCurrency(calculation.sumKln)
                let sumTotal = formatToCurrency(calculation.sumTotal)
                $(`#sumKdn-1-2`).text(formatToCurrency((calculation.sumKdn ?? 0)))
                $(`#sumKln-1-2`).text(formatToCurrency((calculation.sumKln ?? 0)))
                $(`#sumTotal-1-2`).text(formatToCurrency((calculation.sumTotal ?? 0)));
                calculation.data.forEach(function(item, index) {
                    let row = "";
                    if (index <= 2) {
                        row = `
                            <tr>
                                <td></td>
                                <td>${(index + 1)}</td>
                                <td class='text-nowrap'>${item.uraian}</td>
                                <td>${item.produsen_tingkat_dua}</td>
                                <td>${item.jumlah}</td>
                                <td>${item.tkdn}%</td>
                                <td class='text-nowrap'>${item.biaya}</td>
                                <td>${item.alokasi}%</td>
                                <td class='text-nowrap'>${formatToCurrency(item.kdn)}</td>
                                <td class='text-nowrap'>${formatToCurrency(item.kln)}</td>
                                <td class='text-nowrap'>${formatToCurrency(item.total)}</td>
                            </tr>
                        `
                    } else {
                        row = `
                            <tr>
                                <td>
                                    <div class="dropdown">
                                        <div id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="4" viewBox="0 0 128 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/></svg>
                                        </div>
                                        <div class="dropdown-menu"
                                            aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item buttonEditNews" data-toggle="modal" data-target="#editCalculation-${calculationId}"
                                                onclick="edit(${calculation.id}, ${item.id})"><i class="fa fa-edit"></i> Edit
                                            </a>
                                            <button class="dropdown-item" type="submit" onclick="destroy(${calculation.id}, ${item.id})"><i
                                                    class="fa fa-trash"></i> Delete</button>
                                        </div>
                                    </div>
                                </td>
                                <td>${(index + 1)}</td>
                                <td class='text-nowrap'>${item.uraian}</td>
                                <td>${item.produsen_tingkat_dua}</td>
                                <td>${item.jumlah}</td>
                                <td>${item.tkdn}%</td>
                                <td class='text-nowrap'>Rp ${item.biaya}</td>
                                <td>${item.alokasi}%</td>
                                <td class='text-nowrap'>${formatToCurrency(item.kdn)}</td>
                                <td class='text-nowrap'>${formatToCurrency(item.kln)}</td>
                                <td class='text-nowrap'>${formatToCurrency(item.total)}</td>
                            </tr>
                        `
                    }

                    tbody.append(row);
                });
            } else if (tbodyId == "tbody-3") {
                const tbody = $(`#${tbodyId}`);
                tbody.empty();
                calculation = calculations.find(f => f.id == calculationId);
                let sumKdn = formatToCurrency(calculation.sumKdn);
                let sumKln = formatToCurrency(calculation.sumKln);
                let sumTotal = formatToCurrency(calculation.sumTotal);
                $(`#1-3-sumJumlahOrang`).text(calculation.sumJumlahOrang)
                $(`#1-3-sumKdn`).text(sumKdn)
                $(`#1-3-sumKln`).text(sumKln)
                $(`#1-3-sumTotal`).text(sumTotal)
                $(`#kdn-biaya-satuan-product-1-3`).text(formatToCurrency(calculation.bspKdn != null ? calculation.bspKdn :
                    0))
                $(`#kln-biaya-satuan-product-1-3`).text(formatToCurrency(calculation.bspKln != null ? calculation.bspKln :
                    0))
                $(`#total-biaya-satuan-product-1-3`).text(formatToCurrency(calculation.bspTotal != null ? calculation
                    .bspTotal : 0))
                calculation.data.forEach(function(item, index) {
                    let row = `
                    <tr>
                        <td>
                            <div class="dropdown">
                                <div id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="4" viewBox="0 0 128 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/></svg>
                                </div>
                                <div class="dropdown-menu"
                                    aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item buttonEditNews" data-toggle="modal" data-target="#editCalculation-${calculationId}"
                                        onclick="edit(${calculation.id}, ${item.id})"><i class="fa fa-edit"></i> Edit
                                    </a>
                                    <button class="dropdown-item" type="submit" onclick="destroy(${calculation.id}, ${item.id})"><i
                                            class="fa fa-trash"></i> Delete</button>
                                </div>
                            </div>
                        </td>
                        <td>${(index + 1)}</td>
                        <td class="text-nowrap">${item.uraian_posisi}</td>
                        <td>${item.kewarganegaraan}</td>
                        <td>${item.kewarganegaraan == "Indonesia" ? "100%" : "0%"}</td>
                        <td>${item.jumlah_orang}</td>
                        <td class="text-nowrap">Rp ${item.gaji_perbulan}</td>
                        <td>${item.alokasi_gaji}%</td>
                        <td class="text-nowrap">${formatToCurrency(item.kdn)}</td>
                        <td class="text-nowrap">${formatToCurrency(item.kln)}</td>
                        <td class="text-nowrap">${formatToCurrency(item.total)}</td>
                        <td class="text-nowrap">${formatToCurrency(item.bpjs)}</td>
                        <td class="text-nowrap">${formatToCurrency(item.tunjangan_lainnya)}</td>
                        </tr>
                        `;

                    tbody.append(row);
                });
            } else if (tbodyId == "tbody-4") {
                const tbody = $(`#${tbodyId}`);
                tbody.empty();
                calculation = calculations.find(f => f.id == calculationId);
                calculation3 = calculations.find(f => f.id == 3);
                let sumKdn = formatToCurrency(calculation.sumKdn)
                let sumKln = formatToCurrency(calculation.sumKln)
                let sumTotal = formatToCurrency(calculation.sumTotal)
                $(`#1-4-sumJumlahOrang`).text((calculation.sumJumlahOrang != null) ? calculation.sumJumlahOrang : 0)
                $(`#1-4-sumKdn`).text(formatToCurrency((calculation.sumKdn != null ? calculation.sumKdn : 0)))
                $(`#1-4-sumKln`).text(sumKln)
                $(`#1-4-sumTotal`).text(formatToCurrency((calculation.sumTotal != null ? calculation.sumTotal : 0)))
                $(`#kdn-biaya-satuan-product-1-4`).text(formatToCurrency(calculation.bspKdn != null ? calculation.bspKdn :
                    0))
                $(`#kln-biaya-satuan-product-1-4`).text(formatToCurrency(calculation.bspKln != null ? calculation.bspKln :
                    0))
                $(`#total-biaya-satuan-product-1-4`).text(formatToCurrency(calculation.bspTotal != null ? calculation
                    .bspTotal : 0))
                calculation.data.forEach(function(item, index) {
                    let row = "";
                    if (index <= 1) {
                        row = `
                        <tr>
                            <td></td>
                            <td>${(index + 1)}</td>
                            <td class="text-nowrap"> ${item.uraian_posisi} </td>
                            <td> ${item.produsen_tingkat_dua} </td>
                            <td> ${item.tkdn}% </td>
                            <td> ${(item.jumlah_orang != null) ? item.jumlah_orang : "-"} </td>
                            <td class="text-nowrap"> ${item.biaya_pengurusan_per_bulan} </td>
                            <td> ${item.alokasi}%</td>
                            <td class="text-nowrap"> ${formatToCurrency(item.kdn)} </td>
                            <td class="text-nowrap"> ${formatToCurrency(item.kln)} </td>
                            <td class="text-nowrap"> ${formatToCurrency(item.total)} </td>
                        </tr>`;
                    } else {
                        row = `
                            <tr>
                                <td>
                                    <div class="dropdown">
                                        <div id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="4" viewBox="0 0 128 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/></svg>
                                        </div>
                                        <div class="dropdown-menu"
                                            aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item buttonEditNews" data-toggle="modal" data-target="#editCalculation-${calculationId}"
                                                onclick="edit(${calculation.id}, ${item.id})"><i class="fa fa-edit"></i> Edit
                                            </a>
                                            <button class="dropdown-item" type="submit" onclick="destroy(${calculation.id}, ${item.id})"><i
                                                    class="fa fa-trash"></i> Delete</button>
                                        </div>
                                    </div>
                                </td>
                                <td>${(index + 1)}</td>
                                <td class="text-nowrap"> ${item.uraian_posisi} </td>
                                <td> ${item.produsen_tingkat_dua} </td>
                                <td> ${item.tkdn}% </td>
                                <td> ${item.jumlah_orang ?? 0} </td>
                                <td class="text-nowrap"> Rp ${item.biaya_pengurusan_per_bulan} </td>
                                <td> ${item.alokasi}%</td>
                                <td class="text-nowrap"> ${formatToCurrency(item.kdn)} </td>
                                <td class="text-nowrap"> ${formatToCurrency(item.kln)} </td>
                                <td class="text-nowrap"> ${formatToCurrency(item.total)} </td>
                            </tr>`;
                    }

                    tbody.append(row);
                });
            } else if (tbodyId == "tbody-5") {
                const tbody = $(`#${tbodyId}`);
                tbody.empty();
                calculation = calculations.find(f => f.id == calculationId);
                let sumKdn = formatToCurrency(calculation.sumKdn);
                let sumKln = formatToCurrency(calculation.sumKln);
                let sumTotal = formatToCurrency(calculation.sumTotal);
                $(`#1-5-sumJumlahOrang`).text(calculation.sumJumlahOrang)
                $(`#1-5-sumKdn`).text(sumKdn)
                $(`#1-5-sumKln`).text(sumKln)
                $(`#1-5-sumTotal`).text(sumTotal)
                $(`#kdn-biaya-satuan-product-1-5`).text(formatToCurrency(calculation.bspKdn ?? 0))
                $(`#kln-biaya-satuan-product-1-5`).text(formatToCurrency(calculation.bspKln ?? 0))
                $(`#total-biaya-satuan-product-1-5`).text(formatToCurrency(calculation.bspTotal ?? 0))
                calculation.data.forEach(function(item, index) {
                    let row = "<tr>" +
                        `<td>
                            <div class="dropdown">
                                <div id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="4" viewBox="0 0 128 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/></svg>
                                </div>
                                <div class="dropdown-menu"
                                    aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item buttonEditNews" data-toggle="modal" data-target="#editCalculation-${calculationId}"
                                        onclick="edit(${calculation.id}, ${item.id})"><i class="fa fa-edit"></i> Edit
                                    </a>
                                    <button class="dropdown-item" type="submit" onclick="destroy(${calculation.id}, ${item.id})"><i
                                            class="fa fa-trash"></i> Delete</button>
                                </div>
                            </div>
                        </td>` +
                        "<td>" + (index + 1) + "</td>" +
                        "<td class='text-nowrap'>" + item.uraian_posisi + "</td>" +
                        "<td>" + item.kewarganegaraan + "</td>" +
                        "<td>" + item.tkdn + "%" + "</td>" +
                        "<td>" + item.jumlah_orang + "</td>" +
                        "<td class='text-nowrap'>" + "Rp " + item.gaji_perbulan + "</td>" +
                        "<td>" + item.alokasi + "%</td>" +
                        "<td class='text-nowrap'>" + formatToCurrency(item.kdn) + "</td>" +
                        "<td class='text-nowrap'>" + formatToCurrency(item.kln) + "</td>" +
                        "<td class='text-nowrap'>" + formatToCurrency(item.total) + "</td>" +
                        "</tr>";

                    tbody.append(row);
                });
            } else if (tbodyId == "tbody-6") {
                const tbody = $(`#${tbodyId}`);
                tbody.empty();
                calculation = calculations.find(f => f.id == calculationId);
                let sumKdn = formatToCurrency(calculation.sumKdn)
                let sumKln = formatToCurrency(calculation.sumKln)
                let sumTotal = formatToCurrency(calculation.sumTotal)
                $(`#1-6-sumJumlahUnit`).text(calculation.sumJumlahUnit)
                $(`#1-6-sumKdn`).text(sumKdn)
                $(`#1-6-sumKln`).text(sumKln)
                $(`#1-6-sumTotal`).text(sumTotal)
                $(`#kdn-biaya-satuan-product-1-6`).text(formatToCurrency(calculation.bspKdn ?? 0))
                $(`#kln-biaya-satuan-product-1-6`).text(formatToCurrency(calculation.bspKln ?? 0))
                $(`#total-biaya-satuan-product-1-6`).text(formatToCurrency(calculation.bspTotal ?? 0))
                calculation.data.forEach(function(item, index) {
                    let row = `<tr> +
                        <td>
                            <div class="dropdown">
                                <div id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="4" viewBox="0 0 128 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/></svg>
                                </div>
                                <div class="dropdown-menu"
                                    aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item buttonEditNews" data-toggle="modal" data-target="#editCalculation-${calculationId}"
                                        onclick="edit(${calculation.id}, ${item.id})"><i class="fa fa-edit"></i> Edit
                                    </a>
                                    <button class="dropdown-item" type="submit" onclick="destroy(${calculation.id}, ${item.id})"><i
                                            class="fa fa-trash"></i> Delete</button>
                                </div>
                            </div>
                        </td>
                        <td>${(index + 1)}</td>
                        <td class="text-nowrap"> ${item.uraian} </td>
                        <td> ${item.spesifikasi} </td>
                        <td> ${item.jumlah_unit} </td>
                        <td> ${item.dibuat} </td>
                        <td> ${item.dimiliki} </td>
                        <td> ${item.tkdn}% </td>
                        <td class="text-nowrap"> Rp ${item.biaya_depresiasi_perbulan} </td>
                        <td> ${item.alokasi}%</td>
                        <td class="text-nowrap"> ${formatToCurrency(item.kdn)} </td>
                        <td class="text-nowrap"> ${formatToCurrency(item.kln)} </td>
                        <td class="text-nowrap"> ${formatToCurrency(item.total)} </td>
                        </tr>`;

                    tbody.append(row);
                });
            } else if (tbodyId == "tbody-7") {
                const tbody = $(`#${tbodyId}`);
                tbody.empty();
                calculation = calculations.find(f => f.id == calculationId);
                let sumKdn = formatToCurrency(calculation.sumKdn)
                let sumKln = formatToCurrency(calculation.sumKln)
                let sumTotal = formatToCurrency(calculation.sumTotal)
                $(`#1-7-sumJumlahUnit`).text(calculation.sumJumlahUnit)
                $(`#1-7-sumKdn`).text(sumKdn)
                $(`#1-7-sumKln`).text(sumKln)
                $(`#1-7-sumTotal`).text(sumTotal)
                $(`#kdn-biaya-satuan-product-1-7`).text(formatToCurrency(calculation.bspKdn ?? 0))
                $(`#kln-biaya-satuan-product-1-7`).text(formatToCurrency(calculation.bspKln ?? 0))
                $(`#total-biaya-satuan-product-1-7`).text(formatToCurrency(calculation.bspTotal ?? 0))
                calculation.data.forEach(function(item, index) {
                    let row = `<tr> +
                        <td>
                            <div class="dropdown">
                                <div id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="4" viewBox="0 0 128 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/></svg>
                                </div>
                                <div class="dropdown-menu"
                                    aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item buttonEditNews" data-toggle="modal" data-target="#editCalculation-${calculationId}"
                                        onclick="edit(${calculation.id}, ${item.id})"><i class="fa fa-edit"></i> Edit
                                    </a>
                                    <button class="dropdown-item" type="submit" onclick="destroy(${calculation.id}, ${item.id})"><i
                                            class="fa fa-trash"></i> Delete</button>
                                </div>
                            </div>
                        </td>
                        <td>${(index + 1)}</td>
                        <td class="text-nowrap"> ${item.uraian} </td>
                        <td> ${item.spesifikasi} </td>
                        <td> ${item.jumlah_unit} </td>
                        <td> ${item.dibuat} </td>
                        <td> ${item.dimiliki} </td>
                        <td> ${item.tkdn}% </td>
                        <td class="text-nowrap"> Rp ${item.biaya_sewa_perbulan} </td>
                        <td> ${item.alokasi}%</td>
                        <td class="text-nowrap"> ${formatToCurrency(item.kdn)} </td>
                        <td class="text-nowrap"> ${formatToCurrency(item.kln)} </td>
                        <td class="text-nowrap"> ${formatToCurrency(item.total)} </td>
                        </tr>`;

                    tbody.append(row);
                });
            } else if (tbodyId == "tbody-8") {
                const tbody = $(`#${tbodyId}`);
                tbody.empty();
                calculation = calculations.find(f => f.id == calculationId);
                let sumKdn = formatToCurrency(calculation.sumKdn)
                let sumKln = formatToCurrency(calculation.sumKln)
                let sumTotal = formatToCurrency(calculation.sumTotal)
                $(`#1-8-sumJumlah`).text(calculation.sumJumlah)
                $(`#1-8-sumKdn`).text(sumKdn)
                $(`#1-8-sumKln`).text(sumKln)
                $(`#1-8-sumTotal`).text(sumTotal)
                $(`#kdn-biaya-satuan-product-1-8`).text(formatToCurrency(calculation.bspKdn ?? 0))
                $(`#kln-biaya-satuan-product-1-8`).text(formatToCurrency(calculation.bspKln ?? 0))
                $(`#total-biaya-satuan-product-1-8`).text(formatToCurrency(calculation.bspTotal ?? 0))
                calculation.data.forEach(function(item, index) {
                    let row = `<tr> +
                        <td>
                            <div class="dropdown">
                                <div id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="4" viewBox="0 0 128 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/></svg>
                                </div>
                                <div class="dropdown-menu"
                                    aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item buttonEditNews" data-toggle="modal" data-target="#editCalculation-${calculationId}"
                                        onclick="edit(${calculation.id}, ${item.id})"><i class="fa fa-edit"></i> Edit
                                    </a>
                                    <button class="dropdown-item" type="submit" onclick="destroy(${calculation.id}, ${item.id})"><i
                                            class="fa fa-trash"></i> Delete</button>
                                </div>
                            </div>
                        </td>
                        <td>${(index + 1)}</td>
                        <td class="text-nowrap"> ${item.uraian} </td>
                        <td> ${item.pemasok} </td>
                        <td> ${item.jumlah} </td>
                        <td> ${item.tkdn}% </td>
                        <td class="text-nowrap"> Rp ${item.biaya_perbulan} </td>
                        <td> ${item.alokasi}%</td>
                        <td class="text-nowrap"> ${formatToCurrency(item.kdn)} </td>
                        <td class="text-nowrap"> ${formatToCurrency(item.kln)} </td>
                        <td class="text-nowrap"> ${formatToCurrency(item.total)} </td>
                        </tr>`;

                    tbody.append(row);
                });
            } else if (tbodyId == "tbody-9") {
                const tbody = $(`#${tbodyId}`);
                tbody.empty();
                let sumKdn19 = 0;
                let sumKln19 = 0;
                let sumTotal19 = 0;
                calculations.forEach(function(item, index) {
                    if (index <= 1) {
                        sumKdn19 += item.sumKdn ?? 0;
                        sumKln19 += item.sumKln ?? 0;
                        sumTotal19 += item.sumTotal ?? 0;
                    } else {
                        sumKdn19 += item.bspKdn ?? 0;
                        sumKln19 += item.bspKln ?? 0;
                        sumTotal19 += item.bspTotal ?? 0;
                    }
                })

                calculations.forEach(function(item, index) {
                    let row = "";
                    if (index <= 1) {
                        row = `<tr>
                            <td class="text-nowrap"> ${item.no} </td>
                            <td class="text-nowrap"> ${item.nama} </td>
                            <td class="text-nowrap"> ${formatToCurrency(item.sumKdn) ?? ("Rp " + 0 + ",00")} </td>
                            <td class="text-nowrap"> ${formatToCurrency(item.sumKln) ?? ("Rp " + 0 + ",00")} </td>
                            <td class="text-nowrap"> ${formatToCurrency(item.sumTotal) ?? ("Rp " + 0 + ",00")} </td>
                            <td class="text-nowrap"> ${(sumTotal19 != null) && (sumTotal19 != 0) ? (((item.sumKdn ?? 0) / (sumTotal19 ?? 0) * 100).toFixed(2)) : 0}% </td>
                            </tr>`;
                    } else {
                        row = `<tr>
                            <td class="text-nowrap"> ${item.no} </td>
                            <td class="text-nowrap"> ${item.nama} </td>
                            <td class="text-nowrap"> ${formatToCurrency(item.bspKdn ?? 0)} </td>
                            <td class="text-nowrap"> ${formatToCurrency(item.bspKln ?? 0)} </td>
                            <td class="text-nowrap"> ${formatToCurrency(item.bspTotal ?? 0)} </td>
                            <td class="text-nowrap"> ${(sumTotal19 != null) && (sumTotal19 != 0) ? (((item.bspKdn ?? 0) / (sumTotal19 ?? 0) * 100).toFixed(2)) : 0}% </td>
                            </tr>`;
                    }

                    tbody.append(row);
                });

                $("#sumKdn-1-9").text(formatToCurrency(sumKdn19));
                $("#sumKln-1-9").text(formatToCurrency(sumKln19));
                $("#sumTotal-1-9").text(formatToCurrency(sumTotal19));
                $("#sumTkdn-1-9").text(
                    `${(sumTotal19 != null) && (sumTotal19 != 0) ? (((sumKdn19 ?? 0) / (sumTotal19 ?? 0) * 100).toFixed(2)) : 0}%`
                );
            } else if (tbodyId == "tbody-10") {
                const tbody = $(`#${tbodyId}`);
                let sumKdn19 = 0;
                let sumKln19 = 0;
                let sumTotal19 = 0;
                calculations.forEach(function(item, index) {
                    if (index <= 1) {
                        sumKdn19 += item.sumKdn ?? 0;
                        sumKln19 += item.sumKln ?? 0;
                        sumTotal19 += item.sumTotal ?? 0;
                    } else {
                        sumKdn19 += item.bspKdn ?? 0;
                        sumKln19 += item.bspKln ?? 0;
                        sumTotal19 += item.bspTotal ?? 0;
                    }
                })

                $("#BiayaProduksiFinalTkdn").text(((sumKdn19 != null) && (sumKdn19 != 0) ? sumKdn19 / sumTotal19 * 100 : 0)
                    .toFixed(2) + "%");
            }
        }

        function reloadAllTable() {
            $(".kapasitasNormalPerbulan").val(draftCalculations.find(f => f.computationId == computationId)
                .kapasitasNormalPerbulan);

            reloadTable("tbody-1", 1);
            reloadTable("tbody-2", 2);
            reloadTable("tbody-3", 3);
            reloadTable("tbody-4", 4);
            reloadTable("tbody-5", 5);
            reloadTable("tbody-6", 6);
            reloadTable("tbody-7", 7);
            reloadTable("tbody-8", 8);
            reloadTable("tbody-9", 9);
            reloadTable("tbody-10", 9);
        }

        $(() => {
            $(".setTkdn").on("change", (event) => {
                if (event.currentTarget.value == "Indonesia") {
                    event.currentTarget.nextElementSibling.value = 100;
                } else {
                    event.currentTarget.nextElementSibling.value = 0;
                }
            })

            $(".kapasitasNormalPerbulan").on("change", () => {
                let kapasitasNormalPerbulan = $(event.currentTarget).val();
                $(".kapasitasNormalPerbulan").val(kapasitasNormalPerbulan);
                let draftCalculation = draftCalculations.find(f => f.computationId == computationId);
                draftCalculation.kapasitasNormalPerbulan = kapasitasNormalPerbulan;

                calculations.forEach((calculation, index) => {
                    if (index >= 2) {
                        calculation.bspKdn = (calculation.sumKdn ?? 0) / (draftCalculation
                            .kapasitasNormalPerbulan ?? 0);
                        calculation.bspKln = (calculation.sumKln ?? 0) / (draftCalculation
                            .kapasitasNormalPerbulan ?? 0);
                        calculation.bspTotal = (calculation.sumTotal ?? 0) / (draftCalculation
                            .kapasitasNormalPerbulan ?? 0);
                    }
                })
                // Mengonversi objek menjadi string JSON
                let jsonDraftCalculations = JSON.stringify(draftCalculations);

                // Menyimpan data di Local Storage dengan kunci tertentu
                localStorage.setItem('draftCalculations', jsonDraftCalculations);

                reloadAllTable();
            });

            $("#dimiliki-1-6").on("change", () => {
                let dimilikiValue = $("#dimiliki-1-6").val();
                let dibuatValue = $("#dibuat-1-6").val();

                if (dimilikiValue == "Dalam Negeri" && dibuatValue == "Dalam Negeri") {
                    $("#tkdn-1-6").val("100");
                    $("#form-group-saham-1-6").addClass("d-none");
                } else if (dimilikiValue == "Luar Negeri" && dibuatValue == "Luar Negeri") {
                    $("#tkdn-1-6").val("0");
                    $("#form-group-saham-1-6").addClass("d-none");
                } else if (dimilikiValue == "DN + LN" && dibuatValue == "Dalam Negeri") {
                    $("#form-group-saham-1-6").removeClass("d-none");

                    $("#saham-1-6").on("change", (event) => {
                        let saham = parseCurrencyOrDecimal($(event.currentTarget).val());
                        saham = ((0.75 + (0.25 * (saham / 100))) * 100).toFixed(2).toString();
                        if (/\./g.test(saham)) {
                            saham = saham.replace(/\./g, ",");
                        }

                        $("#tkdn-1-6").val(saham);
                    })
                } else if (dimilikiValue == "DN + LN" && dibuatValue == "Luar Negeri") {
                    $("#form-group-saham-1-6").removeClass("d-none");

                    $("#saham-1-6").on("change", (event) => {
                        let saham = $(event.currentTarget).val();
                        let floatSaham = parseCurrencyOrDecimal($(event.currentTarget).val());

                        saham = floatSaham.toFixed(2).toString();
                        if (/\./g.test(saham)) {
                            saham = saham.replace(/\./g, ",");
                        }

                        if (floatSaham > 75) {
                            $("#saham-1-6").addClass("is-invalid");
                            $("#is-invalid-saham-1-6").removeClass("d-none");
                        } else {
                            if ($("#saham-1-6").hasClass("is-invalid")) {
                                $("#saham-1-6").removeClass("is-invalid");
                                $("#is-invalid-saham-1-6").addClass("d-none");
                            }
                        }

                        if (floatSaham <= 75) {
                            $("#tkdn-1-6").val(saham);
                        }
                    })
                } else {
                    $("#tkdn-1-6").val("75");
                    $("#form-group-saham-1-6").addClass("d-none");
                }
            });

            $("#dibuat-1-6").on("change", () => {
                let dimilikiValue = $("#dimiliki-1-6").val();
                let dibuatValue = $("#dibuat-1-6").val();

                if (dimilikiValue == "Dalam Negeri" && dibuatValue == "Dalam Negeri") {
                    $("#tkdn-1-6").val("100");
                } else if (dimilikiValue == "Luar Negeri" && dibuatValue == "Luar Negeri") {
                    $("#tkdn-1-6").val("0");
                } else if (dimilikiValue == "DN + LN" && dibuatValue == "Dalam Negeri") {
                    $("#form-group-saham-1-6").removeClass("d-none");

                    $("#saham-1-6").on("change", (event) => {
                        let saham = parseCurrencyOrDecimal($(event.currentTarget).val());
                        saham = ((0.75 + (0.25 * (saham / 100))) * 100).toFixed(2).toString();
                        if (/\./g.test(saham)) {
                            saham = saham.replace(/\./g, ",");
                        }

                        $("#tkdn-1-6").val(saham);
                    })
                } else if (dimilikiValue == "DN + LN" && dibuatValue == "Luar Negeri") {
                    $("#form-group-saham-1-6").removeClass("d-none");

                    $("#saham-1-6").on("change", (event) => {
                        let saham = $(event.currentTarget).val();
                        let floatSaham = parseCurrencyOrDecimal($(event.currentTarget).val());

                        saham = floatSaham.toFixed(2).toString();
                        if (/\./g.test(saham)) {
                            saham = saham.replace(/\./g, ",");
                        }

                        if (floatSaham > 75) {
                            $("#saham-1-6").addClass("is-invalid");
                            $("#is-invalid-saham-1-6").removeClass("d-none");
                        } else {
                            if ($("#saham-1-6").hasClass("is-invalid")) {
                                $("#saham-1-6").removeClass("is-invalid");
                                $("#is-invalid-saham-1-6").addClass("d-none");
                            }
                        }

                        if (floatSaham <= 75) {
                            $("#tkdn-1-6").val(saham);
                        }
                    })
                } else {
                    $("#tkdn-1-6").val("75");
                }
            });

            $("#editDimiliki-1-6").on("change", () => {
                let dimilikiValue = $("#editDimiliki-1-6").val();
                let dibuatValue = $("#editDibuat-1-6").val();

                if (dimilikiValue == "Dalam Negeri" && dibuatValue == "Dalam Negeri") {
                    $("#editTkdn-1-6").val("100");
                    $("#edit-form-group-saham-1-6").addClass("d-none");
                } else if (dimilikiValue == "Luar Negeri" && dibuatValue == "Luar Negeri") {
                    $("#editTkdn-1-6").val("0");
                    $("#edit-form-group-saham-1-6").addClass("d-none");
                } else if (dimilikiValue == "DN + LN" && dibuatValue == "Dalam Negeri") {
                    $("#edit-form-group-saham-1-6").removeClass("d-none");

                    $("#editSaham-1-6").on("change", (event) => {
                        let saham = parseCurrencyOrDecimal($(event.currentTarget).val());
                        saham = ((0.75 + (0.25 * (saham / 100))) * 100).toFixed(2).toString();
                        if (/\./g.test(saham)) {
                            saham = saham.replace(/\./g, ",");
                        }

                        $("#editTkdn-1-6").val(saham);
                    })
                } else if (dimilikiValue == "DN + LN" && dibuatValue == "Luar Negeri") {
                    $("#edit-form-group-saham-1-6").removeClass("d-none");

                    $("#editSaham-1-6").on("change", (event) => {
                        let saham = $(event.currentTarget).val();
                        let floatSaham = parseCurrencyOrDecimal($(event.currentTarget).val());

                        saham = floatSaham.toFixed(2).toString();
                        if (/\./g.test(saham)) {
                            saham = saham.replace(/\./g, ",");
                        }

                        if (floatSaham > 75) {
                            $("#editSaham-1-6").addClass("is-invalid");
                            $("#edit-is-invalid-saham-1-6").removeClass("d-none");
                        } else {
                            if ($("#editSaham-1-6").hasClass("is-invalid")) {
                                $("#editSaham-1-6").removeClass("is-invalid");
                                $("#edit-is-invalid-saham-1-6").addClass("d-none");
                            }
                        }

                        if (floatSaham <= 75) {
                            $("#editTkdn-1-6").val(saham);
                        }
                    })
                } else {
                    $("#editTkdn-1-6").val("75");
                    $("#edit-form-group-saham-1-6").addClass("d-none");
                }
            });

            $("#editDibuat-1-6").on("change", () => {
                let dimilikiValue = $("#editDimiliki-1-6").val();
                let dibuatValue = $("#editDibuat-1-6").val();

                if (dimilikiValue == "Dalam Negeri" && dibuatValue == "Dalam Negeri") {
                    $("#editTkdn-1-6").val("100");
                } else if (dimilikiValue == "Luar Negeri" && dibuatValue == "Luar Negeri") {
                    $("#editTkdn-1-6").val("0");
                } else if (dimilikiValue == "DN + LN" && dibuatValue == "Dalam Negeri") {
                    $("#edit-form-group-saham-1-6").removeClass("d-none");

                    $("#editSaham-1-6").on("change", (event) => {
                        let saham = parseCurrencyOrDecimal($(event.currentTarget).val());
                        saham = ((0.75 + (0.25 * (saham / 100))) * 100).toFixed(2).toString();
                        if (/\./g.test(saham)) {
                            saham = saham.replace(/\./g, ",");
                        }

                        $("#editTkdn-1-6").val(saham);
                    })
                } else if (dimilikiValue == "DN + LN" && dibuatValue == "Luar Negeri") {
                    $("#edit-form-group-saham-1-6").removeClass("d-none");

                    $("#editSaham-1-6").on("change", (event) => {
                        let saham = $(event.currentTarget).val();
                        let floatSaham = parseCurrencyOrDecimal($(event.currentTarget).val());

                        saham = floatSaham.toFixed(2).toString();
                        if (/\./g.test(saham)) {
                            saham = saham.replace(/\./g, ",");
                        }

                        if (floatSaham > 75) {
                            $("#editSaham-1-6").addClass("is-invalid");
                            $("#edit-is-invalid-saham-1-6").removeClass("d-none");
                        } else {
                            if ($("#editSaham-1-6").hasClass("is-invalid")) {
                                $("#editSaham-1-6").removeClass("is-invalid");
                                $("#edit-is-invalid-saham-1-6").addClass("d-none");
                            }
                        }

                        if (floatSaham <= 75) {
                            $("#editTkdn-1-6").val(saham);
                        }
                    })
                } else {
                    $("#editTkdn-1-6").val("75");
                }
            });

            $("#dimiliki-1-7").on("change", () => {
                let dimilikiValue = $("#dimiliki-1-7").val();
                let dibuatValue = $("#dibuat-1-7").val();

                if (dimilikiValue == "Dalam Negeri" && dibuatValue == "Dalam Negeri") {
                    $("#tkdn-1-7").val("100");
                } else if (dimilikiValue == "Luar Negeri" && dibuatValue == "Luar Negeri") {
                    $("#tkdn-1-7").val("0");
                } else if (dimilikiValue == "DN + LN" && dibuatValue == "Dalam Negeri") {
                    $("#form-group-saham-1-7").removeClass("d-none");

                    $("#saham-1-7").on("change", (event) => {
                        let saham = parseCurrencyOrDecimal($(event.currentTarget).val());
                        saham = ((0.75 + (0.25 * (saham / 100))) * 100).toFixed(2).toString();
                        if (/\./g.test(saham)) {
                            saham = saham.replace(/\./g, ",");
                        }

                        $("#tkdn-1-7").val(saham);
                    })
                } else if (dimilikiValue == "DN + LN" && dibuatValue == "Luar Negeri") {
                    $("#form-group-saham-1-7").removeClass("d-none");

                    $("#saham-1-7").on("change", (event) => {
                        let saham = $(event.currentTarget).val();
                        let floatSaham = parseCurrencyOrDecimal($(event.currentTarget).val());

                        saham = floatSaham.toFixed(2).toString();
                        if (/\./g.test(saham)) {
                            saham = saham.replace(/\./g, ",");
                        }

                        if (floatSaham > 75) {
                            $("#saham-1-7").addClass("is-invalid");
                            $("#is-invalid-saham-1-7").removeClass("d-none");
                        } else {
                            if ($("#saham-1-7").hasClass("is-invalid")) {
                                $("#saham-1-7").removeClass("is-invalid");
                                $("#is-invalid-saham-1-7").addClass("d-none");
                            }
                        }

                        if (floatSaham <= 75) {
                            $("#tkdn-1-7").val(saham);
                        }
                    })
                } else {
                    $("#tkdn-1-7").val("75");
                }
            });

            $("#dibuat-1-7").on("change", () => {
                let dimilikiValue = $("#dimiliki-1-7").val();
                let dibuatValue = $("#dibuat-1-7").val();

                if (dimilikiValue == "Dalam Negeri" && dibuatValue == "Dalam Negeri") {
                    $("#tkdn-1-7").val("100");
                } else if (dimilikiValue == "Luar Negeri" && dibuatValue == "Luar Negeri") {
                    $("#tkdn-1-7").val("0");
                } else if (dimilikiValue == "DN + LN" && dibuatValue == "Dalam Negeri") {
                    $("#form-group-saham-1-7").removeClass("d-none");

                    $("#saham-1-7").on("change", (event) => {
                        let saham = parseCurrencyOrDecimal($(event.currentTarget).val());
                        saham = ((0.75 + (0.25 * (saham / 100))) * 100).toFixed(2).toString();
                        if (/\./g.test(saham)) {
                            saham = saham.replace(/\./g, ",");
                        }

                        $("#tkdn-1-7").val(saham);
                    })
                } else if (dimilikiValue == "DN + LN" && dibuatValue == "Luar Negeri") {
                    $("#form-group-saham-1-7").removeClass("d-none");

                    $("#saham-1-7").on("change", (event) => {
                        let saham = $(event.currentTarget).val();
                        let floatSaham = parseCurrencyOrDecimal($(event.currentTarget).val());

                        saham = floatSaham.toFixed(2).toString();
                        if (/\./g.test(saham)) {
                            saham = saham.replace(/\./g, ",");
                        }

                        if (floatSaham > 75) {
                            $("#saham-1-7").addClass("is-invalid");
                            $("#is-invalid-saham-1-7").removeClass("d-none");
                        } else {
                            if ($("#saham-1-7").hasClass("is-invalid")) {
                                $("#saham-1-7").removeClass("is-invalid");
                                $("#is-invalid-saham-1-7").addClass("d-none");
                            }
                        }

                        if (floatSaham <= 75) {
                            $("#tkdn-1-7").val(saham);
                        }
                    })
                } else {
                    $("#tkdn-1-7").val("75");
                }
            });

            $("#editDimiliki-1-7").on("change", () => {
                let dimilikiValue = $("#editDimiliki-1-7").val();
                let dibuatValue = $("#editDibuat-1-7").val();

                if (dimilikiValue == "Dalam Negeri" && dibuatValue == "Dalam Negeri") {
                    $("#editTkdn-1-7").val("100");
                } else if (dimilikiValue == "Luar Negeri" && dibuatValue == "Luar Negeri") {
                    $("#editTkdn-1-7").val("0");
                } else if (dimilikiValue == "DN + LN" && dibuatValue == "Dalam Negeri") {
                    $("#edit-form-group-saham-1-7").removeClass("d-none");

                    $("#editSaham-1-7").on("change", (event) => {
                        let saham = parseCurrencyOrDecimal($(event.currentTarget).val());
                        saham = ((0.75 + (0.25 * (saham / 100))) * 100).toFixed(2).toString();
                        if (/\./g.test(saham)) {
                            saham = saham.replace(/\./g, ",");
                        }

                        $("#editTkdn-1-7").val(saham);
                    })
                } else if (dimilikiValue == "DN + LN" && dibuatValue == "Luar Negeri") {
                    $("#edit-form-group-saham-1-7").removeClass("d-none");

                    $("#editSaham-1-7").on("change", (event) => {
                        let saham = $(event.currentTarget).val();
                        let floatSaham = parseCurrencyOrDecimal($(event.currentTarget).val());

                        saham = floatSaham.toFixed(2).toString();
                        if (/\./g.test(saham)) {
                            saham = saham.replace(/\./g, ",");
                        }

                        if (floatSaham > 75) {
                            $("#editSaham-1-7").addClass("is-invalid");
                            $("#edit-is-invalid-saham-1-7").removeClass("d-none");
                        } else {
                            if ($("#editSaham-1-7").hasClass("is-invalid")) {
                                $("#editSaham-1-7").removeClass("is-invalid");
                                $("#edit-is-invalid-saham-1-7").addClass("d-none");
                            }
                        }

                        if (floatSaham <= 75) {
                            $("#editTkdn-1-7").val(saham);
                        }
                    })
                } else {
                    $("#editTkdn-1-7").val("75");
                }
            });

            $("#editDibuat-1-7").on("change", () => {
                let dimilikiValue = $("#editDimiliki-1-7").val();
                let dibuatValue = $("#editDibuat-1-7").val();

                if (dimilikiValue == "Dalam Negeri" && dibuatValue == "Dalam Negeri") {
                    $("#editTkdn-1-7").val("100");
                } else if (dimilikiValue == "Luar Negeri" && dibuatValue == "Luar Negeri") {
                    $("#editTkdn-1-7").val("0");
                } else if (dimilikiValue == "DN + LN" && dibuatValue == "Dalam Negeri") {
                    $("#edit-form-group-saham-1-7").removeClass("d-none");

                    $("#editSaham-1-7").on("change", (event) => {
                        let saham = parseCurrencyOrDecimal($(event.currentTarget).val());
                        saham = ((0.75 + (0.25 * (saham / 100))) * 100).toFixed(2).toString();
                        if (/\./g.test(saham)) {
                            saham = saham.replace(/\./g, ",");
                        }

                        $("#editTkdn-1-7").val(saham);
                    })
                } else if (dimilikiValue == "DN + LN" && dibuatValue == "Luar Negeri") {
                    $("#edit-form-group-saham-1-7").removeClass("d-none");

                    $("#editSaham-1-7").on("change", (event) => {
                        let saham = $(event.currentTarget).val();
                        let floatSaham = parseCurrencyOrDecimal($(event.currentTarget).val());

                        saham = floatSaham.toFixed(2).toString();
                        if (/\./g.test(saham)) {
                            saham = saham.replace(/\./g, ",");
                        }

                        if (floatSaham > 75) {
                            $("#editSaham-1-7").addClass("is-invalid");
                            $("#edit-is-invalid-saham-1-7").removeClass("d-none");
                        } else {
                            if ($("#editSaham-1-7").hasClass("is-invalid")) {
                                $("#editSaham-1-7").removeClass("is-invalid");
                                $("#edit-is-invalid-saham-1-7").addClass("d-none");
                            }
                        }

                        if (floatSaham <= 75) {
                            $("#editTkdn-1-7").val(saham);
                        }
                    })
                } else {
                    $("#editTkdn-1-7").val("75");
                }
            });

            // $(".replaceDot").on("keyup", (event) => {
            //     let number = $(event.currentTarget).val();
            //     let output = number.replace(/\./g, ",");

            //     $(event.currentTarget).val(output);
            // })

            $(".nav-link").on("click", (event) => {
                if ($(event.currentTarget).attr("id") == "v-rekapitulasi-tab") {
                    $("#table-biaya-produksi-1-9").removeClass("d-none");
                    $(".button-submit").removeClass("d-none");
                } else {
                    $("#table-biaya-produksi-1-9").addClass("d-none");
                    $(".button-submit").addClass("d-none");
                }
            })

            var isButtonClickable = true;
            $("#buttonSelanjutnya").click(function() {
                if (isButtonClickable) {
                    isButtonClickable = false;
                    var activeTab = $(".nav-link.active");
                    var nextTab = activeTab.next();

                    var activeTabId = nextTab.attr("id");
                    if (activeTabId === "v-bahan-baku-tab") {
                        $("#buttonKembali").addClass("d-none");
                    } else {
                        $("#buttonKembali").removeClass("d-none");
                    }

                    if (nextTab.length > 0) {
                        nextTab.click();
                    }

                    setTimeout(function() {
                        isButtonClickable = true;
                    }, 150);
                }
            });

            $("#buttonKembali").click(function() {
                if (isButtonClickable) {
                    isButtonClickable = false;
                    var activeTab = $(".nav-link.active");
                    var prevTab = activeTab.prev();

                    var activeTabId = prevTab.attr("id");
                    if (activeTabId === "v-bahan-baku-tab") {
                        $("#buttonKembali").addClass("d-none");
                    } else {
                        $("#buttonKembali").removeClass("d-none");
                    }

                    if (prevTab.length > 0) {
                        prevTab.click();

                    }
                    setTimeout(function() {
                        isButtonClickable = true;
                    }, 150);
                }
            });
        })

        $(document).on('keydown', '.trigger-enter', function(event) {
            // Jika tombol Enter ditekan
            if (event.key === 'Enter') {
                // Mencegah perilaku default tombol Enter
                event.preventDefault();

                // Mendapatkan elemen yang sedang dalam fokus
                const focusedElement = $(this);

                // Mendapatkan daftar semua elemen input dalam urutan tertentu
                const inputElements = $('.trigger-enter');

                // Menentukan elemen berikutnya yang akan menerima fokus
                const currentIndex = inputElements.index(focusedElement);
                const nextIndex = (currentIndex + 1) % inputElements.length;

                // Memberikan fokus ke elemen berikutnya
                inputElements.eq(nextIndex).focus();
            }
        });
    </script>
    // {{-- <script src="{{ asset('dist/js/users/script.js') }}"></script> --}}
@endpush
