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
                                                    class="form-control form-control-sm " id="bahan_baku" placeholder=""
                                                    required>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="spesifikasi">Spesifikasi <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" name="spesifikasi"
                                                    class="form-control form-control-sm" id="spesifikasi" placeholder=""
                                                    required>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="satuan_bahan_baku">Satuan bahan baku <i
                                                        class="fas fa-info-circle" data-toggle="tooltip"
                                                        data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <select class="form-control form-control-sm" id="satuan_bahan_baku"
                                                    name="satuan_bahan_baku" required>
                                                    <option></option>
                                                    <option>Pcs</option>
                                                    <option>Pack</option>
                                                    <option>Kg</option>
                                                    <option>Wakwau</option>
                                                    <option>Cukrukuk</option>
                                                </select>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="negara_asal">Negara asal <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <select class="form-control form-control-sm" id="negara_asal"
                                                    name="negara_asal" required>
                                                    <option></option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country }}">{{ $country }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="pemasok">Pemasok / Produsen Tingkat 2 <i
                                                        class="fas fa-info-circle" data-toggle="tooltip"
                                                        data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" name="pemasok" class="form-control form-control-sm"
                                                    id="pemasok" placeholder="" required>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="tkdn">TKDN % <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <input type="number" class="form-control form-control-sm" id="tkdn"
                                                    name="tkdn" placeholder="" required>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="jumlah">Jumlah / Satuan Bahan Baku <i
                                                        class="fas fa-info-circle" data-toggle="tooltip"
                                                        data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <input type="number" name="jumlah" class="form-control form-control-sm"
                                                    id="jumlah" placeholder="" required>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="harga_satuan">Harga Satuan Material <i
                                                        class="fas fa-info-circle" data-toggle="tooltip"
                                                        data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <input type="number" name="harga_satuan"
                                                    class="form-control form-control-sm" id="harga_satuan" placeholder=""
                                                    required>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt;">
                                                <div class="card p-2">
                                                    <div class="col">
                                                        <div class="row">
                                                            <label for="" class="mx-auto">
                                                                Lokal
                                                                <i class="fas fa-info-circle" data-toggle="tooltip"
                                                                    data-placement="top" title="Tooltip on top"></i>
                                                            </label>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group-sm" style="font-size: 7pt;">
                                                                <label for="ppn">PPN %</label>
                                                                <input type="number" name="ppn"
                                                                    style=" width : 15rem"
                                                                    class="form-control form-control-sm" id="ppn"
                                                                    placeholder="" value="0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt;">
                                                <div class="card p-2">
                                                    <div class="col">
                                                        <div class="row">
                                                            <label for="" class="mx-auto">PDRI <i
                                                                    class="fas fa-info-circle" data-toggle="tooltip"
                                                                    data-placement="top" title="Tooltip on top">
                                                                </i></label>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group-sm ml-2" style="font-size: 7pt;">
                                                                <label for="bm">BM %</label>
                                                                <input type="number" name="bm" style="width: 5rem"
                                                                    class="form-control form-control-sm" id="bm"
                                                                    placeholder="" value="0">
                                                            </div>
                                                            <div class="form-group-sm ml-2" style="font-size: 7pt;">
                                                                <label for="pdri_ppn">PPN %</label>
                                                                <input type="number" name="pdri_ppn" style="width: 5rem"
                                                                    class="form-control form-control-sm" id="pdri_ppn"
                                                                    placeholder="" value="0">
                                                            </div>
                                                            <div class="form-group-sm ml-2" style="font-size: 7pt;">
                                                                <label for="pph">PPH %</label>
                                                                <input type="number" name="pph" style="width: 5rem"
                                                                    class="form-control form-control-sm" id="pph"
                                                                    placeholder="" value="0">
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
                                                        <th scope="col">Aksi</th>
                                                        <th scope="col">No</th>
                                                        <th style="width:70%" scope="col">Nama Bahan Baku</th>
                                                        <th scope="col">Spesifikasi</th>
                                                        <th scope="col">Satuan Bahan Baku</th>
                                                        <th scope="col">Negara Asal</th>
                                                        <th scope="col">Pemasok / Produsen Tingkat 2</th>
                                                        <th scope="col">TKDN %</th>
                                                        <th scope="col">Jumlah / Satuan Bahan Baku</th>
                                                        <th scope="col">Harga Satuan Material (Rp)</th>
                                                        <th scope="col">KDN</th>
                                                        <th scope="col">KLN</th>
                                                        <th scope="col">Total</th>
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
                                        <div class="col">
                                            <p class="mt-5 mr-2 text-right">Total</p>
                                        </div>
                                        <div class="col-6 p-1">
                                            <div class="table-responsive table-responsive-sm">
                                                <table class="table table-bordered table-hover" style="font-size: 8pt">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th scope="col">KDN</th>
                                                            <th scope="col">KLN</th>
                                                            <th scope="col">Total</th>
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
                                        <div class="col">
                                            <p class="mt-5 text-right">Total</p>
                                        </div>
                                        <div class="col-9 p-1">
                                            <div class="table-responsive table-responsive-sm">
                                                <table class="table table-bordered table-hover" style="font-size: 8pt">
                                                    <thead style="text-align: center"class="thead-dark">
                                                        <tr>
                                                            <th scope="col" rowspan="2" class="align-middle">Lokal
                                                                PPN</th>
                                                            <th scope="col" colspan="4">PDRI</th>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">BM</th>
                                                            <th scope="col">PPN</th>
                                                            <th scope="col">PPH</th>
                                                            <th scope="col">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td id="sum-ppn">Rp.0</td>
                                                            <td id="sum-bm">Rp.0</td>
                                                            <td id="sum-pdri-ppn">Rp.0</td>
                                                            <td id="sum-pph">Rp.0</td>
                                                            <td id="sum-pdri-total">Rp.0</td>
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
                                                    class="form-control form-control-sm " id="" placeholder="">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Pemasok / Produsen Tingkat 2 <i
                                                        class="fas fa-info-circle" data-toggle="tooltip"
                                                        data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" name="produsen_tingkat_dua"
                                                    class="form-control form-control-sm" id="" placeholder="">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Jumlah <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm" id=""
                                                    placeholder="" name="jumlah">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">TKDN % <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm" id=""
                                                    placeholder="" name="tkdn">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Biaya <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm" id=""
                                                    placeholder="" name="biaya">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Alokasi Biaya <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm" id=""
                                                    placeholder="" name="alokasi">
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
                                                        <th scope="col">Aksi</th>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Uraian</th>
                                                        <th scope="col">Pemasok / Produsen Tingkat 2</th>
                                                        <th scope="col">Jumlah</th>
                                                        <th scope="col">TKDN %</th>
                                                        <th scope="col">Biaya (Rp)</th>
                                                        <th scope="col">Alokasi</th>
                                                        <th scope="col">KDN</th>
                                                        <th scope="col">KLN</th>
                                                        <th scope="col">Total</th>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="dropdown">
                                                                <i data-feather="more-vertical" id="dropdownMenuButton"
                                                                    class="feather-icon dropdown-toggle"
                                                                    style="cursor: pointer;" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false"></i>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item buttonEditNews"
                                                                        onclick=""><i class="fa fa-edit"></i> Edit</a>
                                                                    <form action="" method="post">
                                                                        <button class="dropdown-item" type="submit"><i
                                                                                class="fa fa-trash"></i> Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <th scope="row">1</th>
                                                        <td>Local PPN</td>
                                                        <td>Dirjen Pajak</td>
                                                        <td>1</td>
                                                        <td>100%</td>
                                                        <td class="1-2-sumLocalPpn">0</td>
                                                        <td>100%</td>
                                                        <td class="1-2-sumKdn">0</td>
                                                        <td class="1-2-sumKln">0</td>
                                                        <td class="1-2-sumTotal">0</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="dropdown">
                                                                <i data-feather="more-vertical" id="dropdownMenuButton"
                                                                    class="feather-icon dropdown-toggle"
                                                                    style="cursor: pointer;" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false"></i>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item buttonEditNews"
                                                                        onclick=""><i class="fa fa-edit"></i> Edit</a>
                                                                    <form action="" method="post">
                                                                        <button class="dropdown-item" type="submit"><i
                                                                                class="fa fa-trash"></i> Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <th scope="row">1</th>
                                                        <td>PDRI</td>
                                                        <td>Bea Cukai</td>
                                                        <td>1</td>
                                                        <td>100%</td>
                                                        <td class="1-2-sumPdriPpn">0</td>
                                                        <td>100%</td>
                                                        <td class="1-2-sumKdn">0</td>
                                                        <td class="1-2-sumKln">0</td>
                                                        <td class="1-2-sumTotal">0</td>
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
                                        <div class="col">
                                            <p class="mt-5 mr-2 text-right">Total</p>
                                        </div>
                                        <div class="col-6 p-1">
                                            <div class="table-responsive table-responsive-sm">
                                                <table class="table table-bordered table-hover" style="font-size: 8pt">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th scope="col">KDN</th>
                                                            <th scope="col">KLN</th>
                                                            <th scope="col">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td id="1-2-sumKdn">Rp.0</td>
                                                            <td id="1-2-sumKln">Rp.0</td>
                                                            <td id="1-2-sumTotal">Rp.0</td>
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
                                                <input type="text" class="form-control form-control-sm "
                                                    id="" placeholder="" name="uraian_posisi">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Kewarganegaraan <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <select class="form-control form-control-sm" id=""
                                                    name="kewarganegaraan">
                                                    <option></option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country }}">{{ $country }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Jumlah Orang <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm" id=""
                                                    placeholder="" name="jumlah_orang" value="0">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Jumlah <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm" id=""
                                                    placeholder="" name="jumlah" value="0">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Gaji Perbulan<i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm" id=""
                                                    placeholder="Rp." name="gaji_perbulan" value="0">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Alokasi Gaji % <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm" id=""
                                                    placeholder="" name="alokasi_gaji" value="0">
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
                                                                <label for="">BPJS </label>
                                                                <input type="text" style="width: 8rem"
                                                                    class="form-control form-control-sm" id=""
                                                                    placeholder="Rp" value="0" name="bpjs">
                                                            </div>
                                                            <div class="form-group-sm ml-2" style="font-size: 7pt;">
                                                                <label for="">Tunjangan Lainnya</label>
                                                                <input type="text" style="width: 8rem"
                                                                    class="form-control form-control-sm" id=""
                                                                    placeholder="Rp" value="0"
                                                                    name="tunjangan_lainnya">
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
                                                        <th scope="col">Aksi</th>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Uraian Posisi</th>
                                                        <th scope="col">Kewarganegaraan</th>
                                                        <th scope="col">TKDN %</th>
                                                        <th scope="col">Jumlah Orang</th>
                                                        <th scope="col">Gaji Per Bulan (Rp)</th>
                                                        <th scope="col">Alokasi %</th>
                                                        <th scope="col">KDN</th>
                                                        <th scope="col">KLN</th>
                                                        <th scope="col">Total</th>
                                                        <th scope="col">BPJS</th>
                                                        <th scope="col">Tunjangan Lainnya</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody-3">
                                                    <tr>
                                                        <td>
                                                            <div class="dropdown">
                                                                <i data-feather="more-vertical" id="dropdownMenuButton"
                                                                    class="feather-icon dropdown-toggle"
                                                                    style="cursor: pointer;" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false"></i>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item buttonEditNews"
                                                                        onclick=""><i class="fa fa-edit"></i> Edit</a>
                                                                    <form action="" method="post">
                                                                        <button class="dropdown-item" type="submit"><i
                                                                                class="fa fa-trash"></i> Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <th scope="row">1</th>
                                                        <td>Center Back</td>
                                                        <td>Brazil</td>
                                                        <td>45.5</td>
                                                        <td>12</td>
                                                        <td>13.000.000</td>
                                                        <td>Unit unitan</td>
                                                        <td>3</td>
                                                        <td>8</td>
                                                        <td>780.000.000.00</td>
                                                        <td>122.000</td>
                                                        <td>45.000.000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="dropdown">
                                                                <i data-feather="more-vertical" id="dropdownMenuButton"
                                                                    class="feather-icon dropdown-toggle"
                                                                    style="cursor: pointer;" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false"></i>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item buttonEditNews"
                                                                        onclick=""><i class="fa fa-edit"></i> Edit</a>
                                                                    <form action="" method="post">
                                                                        <button class="dropdown-item" type="submit"><i
                                                                                class="fa fa-trash"></i> Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <th scope="row">2</th>
                                                        <td>Striker</td>
                                                        <td>Pantai Gading</td>
                                                        <td>25.5</td>
                                                        <td>12</td>
                                                        <td>13.000.000</td>
                                                        <td>Unit unitan</td>
                                                        <td>3</td>
                                                        <td>8</td>
                                                        <td>780.000.000.00</td>
                                                        <td>122.000</td>
                                                        <td>45.000.000</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row card">
                                    <div class="d-flex">
                                        <div class="col">
                                            <p class="mt-5 mr-2 text-right">Total</p>
                                        </div>
                                        <div class="col-6 p-1">
                                            <div class="table-responsive table-responsive-sm">
                                                <table class="table table-bordered table-hover" style="font-size: 8pt">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th scope="col">Jumlah Orang</th>
                                                            <th scope="col">KDN</th>
                                                            <th scope="col">KLN</th>
                                                            <th scope="col">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td id="1-3-sumJumlahOrang">0</td>
                                                            <td id="1-3-sumKdn">Rp.0</td>
                                                            <td id="1-3-sumKln">Rp.0</td>
                                                            <td id="1-3-sumTotal">Rp.0</td>
                                                        </tr>
                                                    </tbody>

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
                                                <input type="text" class="form-control form-control-sm "
                                                    id="uraian_posisi" name="uraian_posisi" placeholder="">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="produsen_tingkat_dua">Pemasok / Produsen Tingkat 2 <i
                                                        class="fas fa-info-circle" data-toggle="tooltip"
                                                        data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm"
                                                    id="produsen_tingkat_dua" name="produsen_tingkat_dua" placeholder="">
                                            </div>


                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="tkdn">TKDN % <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm" id="tkdn"
                                                    name="tkdn" placeholder="">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="jumlah_orang">Jumlah Orang <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm"
                                                    id="jumlah_orang" name="jumlah_orang" placeholder="Rp.">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="biaya_pengurusan_per_bulan">Biaya Pengurusan Per Bulan <i
                                                        class="fas fa-info-circle" data-toggle="tooltip"
                                                        data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm"
                                                    id="biaya_pengurusan_per_bulan" name="biaya_pengurusan_per_bulan"
                                                    placeholder="">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="alokasi">Alokasi % <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm" id="alokasi"
                                                    name="alokasi" placeholder="">
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
                                                        <th scope="col">Aksi</th>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Uraian</th>
                                                        <th scope="col">Pemasok / Produsen Tingkat 2</th>
                                                        <th scope="col">TKDN %</th>
                                                        <th scope="col">Jumlah</th>
                                                        <th scope="col">Biaya Pengurusan Per Bulan</th>
                                                        <th scope="col">Alokasi %</th>
                                                        <th scope="col">KDN</th>
                                                        <th scope="col">KLN</th>
                                                        <th scope="col">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody-4">
                                                    <tr>
                                                        <td>
                                                            <div class="dropdown">
                                                                <i data-feather="more-vertical" id="dropdownMenuButton"
                                                                    class="feather-icon dropdown-toggle"
                                                                    style="cursor: pointer;" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false"></i>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item buttonEditNews"
                                                                        onclick=""><i class="fa fa-edit"></i> Edit</a>
                                                                    <form action="" method="post">
                                                                        <button class="dropdown-item" type="submit"><i
                                                                                class="fa fa-trash"></i> Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <th scope="row">1</th>
                                                        <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</td>
                                                        <td>Lorem, ipsum dolor.</td>
                                                        <td>45.5</td>
                                                        <td>12</td>
                                                        <td>13.000.000</td>
                                                        <td>32.1</td>
                                                        <td>3</td>
                                                        <td>8</td>
                                                        <td>780.000.000.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="dropdown">
                                                                <i data-feather="more-vertical" id="dropdownMenuButton"
                                                                    class="feather-icon dropdown-toggle"
                                                                    style="cursor: pointer;" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false"></i>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item buttonEditNews"
                                                                        onclick=""><i class="fa fa-edit"></i> Edit</a>
                                                                    <form action="" method="post">
                                                                        <button class="dropdown-item" type="submit"><i
                                                                                class="fa fa-trash"></i> Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <th scope="row">2</th>
                                                        <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</td>
                                                        <td>Lorem, ipsum dolor.</td>
                                                        <td>45.5</td>
                                                        <td>12</td>
                                                        <td>13.000.000</td>
                                                        <td>32.1</td>
                                                        <td>3</td>
                                                        <td>8</td>
                                                        <td>780.000.000.00</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row card">
                                    <div class="d-flex">
                                        <div class="col">
                                            <p class="mt-5 mr-2 text-right">Total</p>
                                        </div>
                                        <div class="col-6 p-1">
                                            <div class="table-responsive table-responsive-sm">
                                                <table class="table table-bordered table-hover" style="font-size: 8pt">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th scope="col">Jumlah Orang</th>
                                                            <th scope="col">KDN</th>
                                                            <th scope="col">KLN</th>
                                                            <th scope="col">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td id="1-4-sumJumlahOrang">0</td>
                                                            <td id="1-4-sumKdn">Rp.0</td>
                                                            <td id="1-4-sumKln">Rp.0</td>
                                                            <td id="1-4-sumTotal">Rp.0</td>
                                                        </tr>
                                                    </tbody>

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
                                                        class="fas fa-info-circle">
                                                    </i>
                                                </label>
                                                <input type="text" class="form-control form-control-sm"
                                                    id="uraian_posisi" name="uraian_posisi">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="kewarganegaraan">Kewarganegaraan <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <select class="form-control form-control-sm" id="kewarganegaraan"
                                                    name="kewarganegaraan">
                                                    <option></option>
                                                    <option>Indonesia</option>
                                                    <option>Zimbabwe</option>
                                                    <option>Asoy</option>
                                                    <option>Geboy</option>
                                                    <option>Tabrak tabrak masuk</option>
                                                </select>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label>
                                                    Jumlah Orang
                                                    <i class="fas fa-info-circle" data-toggle="tooltip"
                                                        data-placement="top" title="Tooltip on top"></i>
                                                </label>
                                                <input type="text" class="form-control form-control-sm"
                                                    id="jumlah_orang" name="jumlah_orang">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label>
                                                    Gaji Per Bulan
                                                    <i class="fas fa-info-circle" data-toggle="tooltip"
                                                        data-placement="top" title="Tooltip on top"></i>
                                                </label>
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="Rp." id="gaji_perbulan" name="gaji_perbulan">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label>
                                                    Alokasi Gaji %
                                                    <i class="fas fa-info-circle" data-toggle="tooltip"
                                                        data-placement="top" title="Tooltip on top"></i>
                                                </label>
                                                <input type="text" class="form-control form-control-sm" placeholder=""
                                                    id="alokasi" name="alokasi">
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
                                                        <th scope="col">Aksi</th>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Uraian Posisi</th>
                                                        <th scope="col">Kewarganegaraan</th>
                                                        <th scope="col">TKDN %</th>
                                                        <th scope="col">Jumlah Orang</th>
                                                        <th scope="col">Gaji Per Bulan</th>
                                                        <th scope="col">Alokasi %</th>
                                                        <th scope="col">KDN</th>
                                                        <th scope="col">KLN</th>
                                                        <th scope="col">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody-5">
                                                    <tr>
                                                        <td>
                                                            <div class="dropdown">
                                                                <i data-feather="more-vertical" id="dropdownMenuButton"
                                                                    class="feather-icon dropdown-toggle"
                                                                    style="cursor: pointer;" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false"></i>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item buttonEditNews"
                                                                        onclick="">
                                                                        <i class="fa fa-edit"></i>
                                                                        Edit
                                                                    </a>
                                                                    <form action="" method="post">
                                                                        <button class="dropdown-item" type="submit"><i
                                                                                class="fa fa-trash"></i> Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <th scope="row">1</th>
                                                        <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</td>
                                                        <td>Lorem, ipsum dolor.</td>
                                                        <td>45.5</td>
                                                        <td>12</td>
                                                        <td>13.000.000</td>
                                                        <td>32.1</td>
                                                        <td>3</td>
                                                        <td>8</td>
                                                        <td>780.000.000.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="dropdown">
                                                                <i data-feather="more-vertical" id="dropdownMenuButton"
                                                                    class="feather-icon dropdown-toggle"
                                                                    style="cursor: pointer;" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false"></i>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item buttonEditNews"
                                                                        onclick=""><i class="fa fa-edit"></i> Edit</a>
                                                                    <form action="" method="post">
                                                                        <button class="dropdown-item" type="submit"><i
                                                                                class="fa fa-trash"></i> Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <th scope="row">2</th>
                                                        <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</td>
                                                        <td>Lorem, ipsum dolor.</td>
                                                        <td>45.5</td>
                                                        <td>12</td>
                                                        <td>13.000.000</td>
                                                        <td>32.1</td>
                                                        <td>3</td>
                                                        <td>8</td>
                                                        <td>780.000.000.00</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row card">
                                    <div class="d-flex">
                                        <div class="col">
                                            <p class="mt-5 mr-2 text-right">Total</p>
                                        </div>
                                        <div class="col-6 p-1">
                                            <div class="table-responsive table-responsive-sm">
                                                <table class="table table-bordered table-hover" style="font-size: 8pt">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th scope="col">Jumlah Orang</th>
                                                            <th scope="col">KDN</th>
                                                            <th scope="col">KLN</th>
                                                            <th scope="col">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td id="1-5-sumJumlahOrang">0</td>
                                                            <td id="1-5-sumKdn">Rp.0</td>
                                                            <td id="1-5-sumKln">Rp.0</td>
                                                            <td id="1-5-sumTotal">Rp.0</td>
                                                        </tr>
                                                    </tbody>

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
                                                        class="fas fa-info-circle">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm "
                                                    id="" placeholder="" name="uraian">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Spesifikasi <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm" id=""
                                                    placeholder="" name="spesifikasi">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Jumlah Unit <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm" id=""
                                                    placeholder="" name="jumlah_unit">
                                            </div>


                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Biaya Depresiasi Per Bulan<i
                                                        class="fas fa-info-circle" data-toggle="tooltip"
                                                        data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm" id=""
                                                    placeholder="Rp." name="biaya_depresiasi_perbulan">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Alokasi Mesin % <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm" id=""
                                                    placeholder="" name="alokasi_mesin">
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
                                                                <select name="alat_kerja" id=""
                                                                    class="form-control form-control-sm"
                                                                    style="width: 8rem">
                                                                    <option value="Dalam Negeri">Dalam Negeri</option>
                                                                    <option value="Luar Negeri">Luar Negeri</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group-sm ml-2" style="font-size: 7pt;">
                                                                <label for="">Dimiliki</label>
                                                                <select name="dimiliki" id=""
                                                                    class="form-control form-control-sm"
                                                                    style="width: 8rem">
                                                                    <option value="Dalam Negeri">Dalam Negeri</option>
                                                                    <option value="Luar Negeri">Luar Negeri</option>
                                                                </select>
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
                                                        <th scope="col">Aksi</th>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Uraian</th>
                                                        <th scope="col">Spesifikasi</th>
                                                        <th scope="col">Jumlah Unit</th>
                                                        <th scope="col">Dibuat</th>
                                                        <th scope="col">TKDN %</th>
                                                        <th scope="col">Biaya Per Bulan</th>
                                                        <th scope="col">Alokasi %</th>
                                                        <th scope="col">KDN</th>
                                                        <th scope="col">KLN</th>
                                                        <th scope="col">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="dropdown">
                                                                <i data-feather="more-vertical" id="dropdownMenuButton"
                                                                    class="feather-icon dropdown-toggle"
                                                                    style="cursor: pointer;" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false"></i>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item buttonEditNews"
                                                                        onclick=""><i class="fa fa-edit"></i>
                                                                        Edit</a>
                                                                    <form action="" method="post">
                                                                        <button class="dropdown-item" type="submit"><i
                                                                                class="fa fa-trash"></i> Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <th scope="row">1</th>
                                                        <td>Center Back</td>
                                                        <td>Brazil</td>
                                                        <td>45.5</td>
                                                        <td>12</td>
                                                        <td>13.000.000</td>
                                                        <td>Unit unitan</td>
                                                        <td>3</td>
                                                        <td>8</td>
                                                        <td>122.000</td>
                                                        <td>45.000.000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="dropdown">
                                                                <i data-feather="more-vertical" id="dropdownMenuButton"
                                                                    class="feather-icon dropdown-toggle"
                                                                    style="cursor: pointer;" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false"></i>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item buttonEditNews"
                                                                        onclick=""><i class="fa fa-edit"></i>
                                                                        Edit</a>
                                                                    <form action="" method="post">
                                                                        <button class="dropdown-item" type="submit"><i
                                                                                class="fa fa-trash"></i> Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <th scope="row">2</th>
                                                        <td>Striker</td>
                                                        <td>Pantai Gading</td>
                                                        <td>25.5</td>
                                                        <td>12</td>
                                                        <td>13.000.000</td>
                                                        <td>Unit unitan</td>
                                                        <td>3</td>
                                                        <td>8</td>
                                                        <td>122.000</td>
                                                        <td>45.000.000</td>
                                                    </tr>
                                                </tbody>
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
                    <div class="save-draft">
                        <div class="form-group p-2 pt-0 pb-2">
                            <button class="btn btn-success btn-block"
                                onclick="store('{{ route('calculation-results.store') }}', calculations, '{{ route('computation.index') }}', '{{ $computation->id }}')">Save
                                Draft</button>
                        </div>
                    </div>
                    <div class="form-group p-2 pb-0">
                        <a href="#" class="btn btn-success btn-block">Selanjutnya ></a>
                    </div>
                    <div class="form-group p-2">
                        <a href="#" class="btn btn-danger flex-grow-1 btn-block">Hapus </a>
                    </div>
                </div>
                {{-- header tab panel --}}
                <div class="card">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
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
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('library/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <script>
        var url = new URL(window.location.href);
        var path = url.pathname;
        var match = path.match(/\/(\d+)$/);
        let computationId = match[1];
        let draftCalculations = localStorage.getItem("draftCalculations") != null ? localStorage.getItem("draftCalculations") : null;

        function init() {
            let calculations = null;
            if(draftCalculations != null) {
                if(typeof(draftCalculations) == 'string') {
                    draftCalculations = JSON.parse(draftCalculations);
                }
                let draftCalculation = draftCalculations.find(f => f.computationId == computationId);
                if(draftCalculation != null) { // ada tpi id computation tidak ditemukan
                    calculations = draftCalculation.calculations;
                } else {
                    $.ajax({
                        type: 'GET',
                        url: '{{ $computation->calculation_result != null ? route('calculation-results.show', $computation->calculation_result->id) : 'fail' }}',
                        async: false,
                        success: function(response) {
                            calculations = response.calculationResult.results;
                            draftCalculation = {
                                computationId: computationId,
                                calculations: calculations
                            }
                            draftCalculations.push(draftCalculation);
                        },
                        error: function(error) {
                            calculations = [{
                                    "id": "1",
                                    "no": "1.1",
                                    "nama": "Bahan Baku",
                                    "slug": "bahan-baku",
                                    "formulas": {
                                        kdn: "{tkdn}% * {jumlah} * {harga_satuan}",
                                        kln: "(100% - {tkdn}%) * {jumlah} * {harga_satuan}",
                                        total: "{formulas.kdn} + {formulas.kln}",
                                        ppnCalc: "{ppn}% * ({formulas.kdn} + {formulas.kln})",
                                        bmCalc: "{bm}% * ({formulas.kdn} + {formulas.kln})",
                                        pdriPpnCalc: "{pdri_ppn}% * ({formulas.kdn} + {formulas.kln})",
                                        pphCalc: "{pph}% * ({formulas.kdn} + {formulas.kln})",
                                        sumKdn: "sum:kdn",
                                        sumKln: "sum:kln",
                                        sumTotal: "sum:total",
                                        sumPpn: "sum:ppnCalc",
                                        sumBm: "sum:bmCalc",
                                        sumPdriPpn: "sum:pdriPpnCalc",
                                        sumPph: "sum:pphCalc",
                                        // sumPdriTotal: "{formulas.sumBm} + {formulas.sumPdriPpn} + {formulas.sumPph}"
                                        sumPdriTotal: "sum:bmCalc + sum:pdriPpnCalc + sum:pphCalc"
                                    },
                                    "data": []
                                },
                                {
                                    "id": "2",
                                    "no": "1.2",
                                    "nama": "Jasa Terkait Bahan Baku",
                                    "slug": "jasa-terkait-bahan-baku",
                                    "formulas": {
                                        kdn: "{tkdn}% * {jumlah} * {biaya} * {alokasi}%",
                                        kln: "(100% - {tkdn}%) * {jumlah} * {biaya} * {alokasi}%",
                                        total: "{formulas.kdn} + {formulas.kln}",
                                        sumKdn: "sum:kdn",
                                        sumKln: "sum:kln",
                                        sumTotal: "sum:total",
                                    },
                                    "data": []
                                },
                                {
                                    "id": "3",
                                    "no": "1.3",
                                    "nama": "Jasa Terkait Bahan Baku",
                                    "slug": "jasa-terkait-bahan-baku",
                                    "formulas": {
                                        kdn: "{tkdn}% * {jumlah_orang} * {gaji_per_bulan} * {alokasi}%",
                                        kln: "(100% - {tkdn}%) * {jumlah_orang} * {gaji_per_bulan} * {alokasi}%",
                                        total: "{formulas.kdn} + {formulas.kln}",
                                        sumJumlahOrang: "sum:jumlah_orang",
                                        sumKdn: "sum:kdn",
                                        sumKln: "sum:kln",
                                        sumTotal: "sum:total",
                                    },
                                    "data": []
                                },
                                {
                                    "id": "4",
                                    "no": "1.4",
                                    "nama": "Jasa Terkait Bahan Baku",
                                    "slug": "jasa-terkait-bahan-baku",
                                    "formulas": {
                                        kdn: "{tkdn}% * {jumlah_orang} * {biaya_pengurusan_per_bulan} * {alokasi}%",
                                        kln: "(100% - {tkdn}%) * {jumlah_orang} * {biaya_pengurusan_per_bulan} * {alokasi}%",
                                        total: "{formulas.kdn} + {formulas.kln}",
                                        sumJumlahOrang: "sum:jumlah_orang",
                                        sumKdn: "sum:kdn",
                                        sumKln: "sum:kln",
                                        sumTotal: "sum:total",
                                    },
                                    "data": []
                                },
                                {
                                    "id": "5",
                                    "no": "1.5",
                                    "nama": "Jasa Terkait Bahan Baku",
                                    "slug": "jasa-terkait-bahan-baku",
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
                            ];
                            draftCalculation = {
                                computationId: computationId,
                                calculations: calculations
                            }
                            draftCalculations.push(draftCalculation);
                        }
                    });
                    localStorage.setItem("draftCalculations", JSON.stringify(draftCalculations))
                }
            } else {
                draftCalculations = [];
                init();
            }
            // let calculations = draftCalculations.find(f => f.calculationId == calculationId);
            // let calculations = localStorage.getItem('calculations');
            // if (calculations != null) {
            //     calculations = JSON.parse(calculations);
            // } else {
            //     $.ajax({
            //         type: 'GET',
            //         url: '{{ $computation->calculation_result != null ? route('calculation-results.show', $computation->calculation_result->id) : 'fail' }}',
            //         async: false,
            //         success: function(response) {
            //             calculations = response.calculationResult.results;
            //         },
            //         error: function(error) {
            //             calculations = [{
            //                     "id": "1",
            //                     "no": "1.1",
            //                     "nama": "Bahan Baku",
            //                     "slug": "bahan-baku",
            //                     "formulas": {
            //                         kdn: "{tkdn}% * {jumlah} * {harga_satuan}",
            //                         kln: "(100% - {tkdn}%) * {jumlah} * {harga_satuan}",
            //                         total: "{formulas.kdn} + {formulas.kln}",
            //                         ppnCalc: "{ppn}% * ({formulas.kdn} + {formulas.kln})",
            //                         bmCalc: "{bm}% * ({formulas.kdn} + {formulas.kln})",
            //                         pdriPpnCalc: "{pdri_ppn}% * ({formulas.kdn} + {formulas.kln})",
            //                         pphCalc: "{pph}% * ({formulas.kdn} + {formulas.kln})",
            //                         sumKdn: "sum:kdn",
            //                         sumKln: "sum:kln",
            //                         sumTotal: "sum:total",
            //                         sumPpn: "sum:ppnCalc",
            //                         sumBm: "sum:bmCalc",
            //                         sumPdriPpn: "sum:pdriPpnCalc",
            //                         sumPph: "sum:pphCalc",
            //                         // sumPdriTotal: "{formulas.sumBm} + {formulas.sumPdriPpn} + {formulas.sumPph}"
            //                         sumPdriTotal: "sum:bmCalc + sum:pdriPpnCalc + sum:pphCalc"
            //                     },
            //                     "data": []
            //                 },
            //                 {
            //                     "id": "2",
            //                     "no": "1.2",
            //                     "nama": "Jasa Terkait Bahan Baku",
            //                     "slug": "jasa-terkait-bahan-baku",
            //                     "formulas": {
            //                         kdn: "{tkdn}% * {jumlah} * {biaya} * {alokasi}%",
            //                         kln: "(100% - {tkdn}%) * {jumlah} * {biaya} * {alokasi}%",
            //                         total: "{formulas.kdn} + {formulas.kln}",
            //                     },
            //                     "data": []
            //                 },
            //                 {
            //                     "id": "3",
            //                     "no": "1.3",
            //                     "nama": "Jasa Terkait Bahan Baku",
            //                     "slug": "jasa-terkait-bahan-baku",
            //                     "formulas": {
            //                         kdn: "{tkdn}% * {jumlah_orang} * {gaji_per_bulan} * {alokasi}%",
            //                         kln: "(100% - {tkdn}%) * {jumlah_orang} * {gaji_per_bulan} * {alokasi}%",
            //                         total: "{formulas.kdn} + {formulas.kln}",
            //                     },
            //                     "data": []
            //                 },
            //                 {
            //                     "id": "4",
            //                     "no": "1.4",
            //                     "nama": "Jasa Terkait Bahan Baku",
            //                     "slug": "jasa-terkait-bahan-baku",
            //                     "formulas": {
            //                         kdn: "{tkdn}% * {jumlah_orang} * {biaya_pengurusan_per_bulan} * {alokasi}%",
            //                         kln: "(100% - {tkdn}%) * {jumlah_orang} * {biaya_pengurusan_per_bulan} * {alokasi}%",
            //                         total: "{formulas.kdn} + {formulas.kln}",
            //                     },
            //                     "data": []
            //                 },
            //                 {
            //                     "id": "5",
            //                     "no": "1.5",
            //                     "nama": "Jasa Terkait Bahan Baku",
            //                     "slug": "jasa-terkait-bahan-baku",
            //                     "formulas": {
            //                         kdn: "{tkdn}% * {jumlah_orang} * {gaji_perbulan} * {alokasi}%",
            //                         kln: "(100% - {tkdn}%) * {jumlah_orang} * {gaji_perbulan} * {alokasi}%",
            //                         total: "{formulas.kdn} + {formulas.kln}",
            //                     },
            //                     "data": []
            //                 },
            //             ];
            //         }
            //     });
            // }
            return calculations
        }

        let calculations = init();
        reloadAllTable()

        $(() => {
            $(window).on('beforeunload', function() {
                return "save terlebih dahulu data anda!";
            });

            $(document).keydown(function(e) {
                // Mendeteksi kombinasi tombol "F5"
                if (e.which === 116 || (e.ctrlKey && e.which === 82) || (e.ctrlKey && e.which === 116) || (e
                        .ctrlKey && e.shiftKey && e.which === 82)) {
                    e.preventDefault();
                    swal({
                        title: "Warning",
                        text: "You haven't save the calculation. If you want to refresh the page, you will lose any change that you have made.",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true
                    }).then((willReload) => {
                        if (willReload) {
                            location.reload()
                        } else {
                            return false;
                        }
                    });
                }
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
        })

        function calculateAndBind(formResult, id) {
            const sumRegex = /sum:(\w+)/g
            let calculation = calculations.find(f => f.id == id);
            let results = calculation.data;
            let formulas = calculation.formulas;
            let finalResult = {
                ...formResult
            };

            let replacedFormulas = replaceFormulas(formulas, formResult);

            for (let key in replacedFormulas) {
                let hasSum = false;
                replacedFormulas[key] = replacedFormulas[key].replace(sumRegex, function(match, formulaName) {
                    if (formulaName) {
                        let sum = 0;
                        if (results.length > 0) {
                            for (let i = 0; i < results.length; i++) {
                                sum += (parseFloat(results[i][formulaName]))
                                if (i == 0) {
                                    sum = sum + parseFloat(finalResult[formulaName]);
                                }
                            }
                        } else {
                            sum = parseFloat(finalResult[formulaName]);
                        }

                        calculation[key] = eval(sum);

                        hasSum = true;
                        return `(${sum})`;
                    }
                });


                if (!sumRegex.test(replacedFormulas[key])) {
                    finalResult[key] = eval(replacedFormulas[key]);
                }
                // else {
                //     console.log("sum");
                //     finalResult[key] = replacedFormulas[key];
                // }

                if (hasSum) {
                    calculation[key] = finalResult[key];
                    hasSum = false;
                }
            }

            calculation.data.push(finalResult);


            // Mengonversi objek menjadi string JSON
            // var jsonCalculations = JSON.stringify(calculations);
            let jsonDraftCalculations = JSON.stringify(draftCalculations);

            // Menyimpan data di Local Storage dengan kunci tertentu
            // localStorage.setItem('calculations', jsonCalculations);
            localStorage.setItem('draftCalculations', jsonDraftCalculations);
        }

        function replaceFormulas(formulas, resultObject) {
            const variableRegex = /{(\w+)}/g;
            const variableRegex2 = /\{formulas\.(\w+)\}/g;
            let result = {};
            let replacedFormulas = {};
            console.log(formulas)
            for (let key in formulas) {
                replacedFormulas[key] = formulas[key].replace(variableRegex, function(match, fieldName) {
                    return resultObject[fieldName] || 0;
                });
            }
            for (let key in replacedFormulas) {
                replacedFormulas[key] = replacedFormulas[key].replace(variableRegex2, function(match, formulaName) {
                    return `(${replacedFormulas[formulaName]})` || 0;
                });

                let replacedPercent = replacePercent(replacedFormulas[key]);
                result[key] = replacedPercent;
            }

            return result;
        }

        function replacePercent(expression) {
            let percentageRegex = /(\d+(\.\d+)?)%/;

            expression = expression.replace(/(\d+)%/g, function(match, p1) {
                if (p1 == 0) return 0;
                return parseFloat(p1) / 100 || match;
            })

            return expression;
        }

        function store(url, formData, redirectUrl, computationId) {
            formData = {
                results: JSON.stringify(formData),
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
                    // Handle respons sukses di sini
                    swal({
                        title: "Success",
                        text: response.success,
                        icon: "success",
                        buttons: true,
                        dangerMode: false
                    }).then((willRedirect) => {
                        if (willRedirect) {
                            location.href = redirectUrl
                        } else {
                            calculations = JSON.parse(response.calculationResult.results);
                        }
                    });
                },
                error: function(error) {
                    // Handle kesalahan di sini
                    console.log(error);
                }
            });
        }

        function edit(calculation_id) {
            alert(`edit ${calculation_id}`)
        }

        function destroy(calculation_id) {
            let computation = calculations.find(f => f.id == 1);
            let calculationIndex = computation.data.findIndex(f => f.id == calculation_id);

            // Jika calculation dengan id yang diberikan ditemukan
            if (calculationIndex !== -1) {
                // Hapus calculation dari array computation.data
                computation.data.splice(calculationIndex, 1);

                reloadTable("tbody-1", 1);
                reloadTable("tbody-2", 2);
                reloadTable("tbody-3", 3);

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
                let sumKdn = parseInt(calculation.sumKdn).toLocaleString()
                let sumKln = parseInt(calculation.sumKln).toLocaleString()
                let sumTotal = parseInt(calculation.sumTotal).toLocaleString()
                let sumPpn = parseInt(calculation.sumPpn).toLocaleString()
                let sumBm = parseInt(calculation.sumBm).toLocaleString()
                let sumPdriPpn = parseInt(calculation.sumPdriPpn).toLocaleString()
                let sumPph = parseInt(calculation.sumPph).toLocaleString()
                let sumPdriTotal = parseInt(calculation.sumPdriTotal).toLocaleString()
                $('#sum-kdn').text(`Rp.${sumKdn}`)
                $('#sum-kln').text(`Rp.${sumKln}`)
                $('#sum-total').text(`Rp.${sumTotal}`)
                $('#sum-ppn').text(`Rp.${sumPpn}`)
                $('#sum-bm').text(`Rp.${sumBm}`)
                $('#sum-pdri-ppn').text(`Rp.${sumPdriPpn}`)
                $('#sum-pph').text(`Rp.${sumPph}`)
                $('#sum-pdri-total').text(`Rp.${sumPdriTotal}`)
                calculation.data.forEach(function(item, index) {
                    let row = "<tr>" +
                        `<td>
                            <div class="dropdown">
                                <div class="btn btn-secondary btn-sm" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">!</div>
                                <div class="dropdown-menu"
                                    aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item buttonEditNews"
                                        onclick="edit(${item.id})"><i class="fa fa-edit"></i> Edit
                                    </a>
                                    <button class="dropdown-item" type="submit" onclick="destroy(${item.id})"><i
                                            class="fa fa-trash"></i> Delete</button>
                                </div>
                            </div>
                        </td>` +
                        "<td>" + (index + 1) + "</td>" +
                        "<td>" + item.bahan_baku + "</td>" +
                        "<td>" + item.spesifikasi + "</td>" +
                        "<td>" + item.satuan_bahan_baku + "</td>" +
                        "<td>" + item.negara_asal + "</td>" +
                        "<td>" + item.pemasok + "</td>" +
                        "<td>" + item.tkdn + "</td>" +
                        "<td>" + item.jumlah + "</td>" +
                        "<td>" + item.harga_satuan + "</td>" +
                        "<td>" + item.kdn + "</td>" +
                        "<td>" + item.kln + "</td>" +
                        "<td>" + item.total + "</td>" +
                        "</tr>";

                    tbody.append(row);
                });
            } else if (tbodyId == "tbody-2") {
                const tbody = $(`#${tbodyId}`);
                tbody.empty();
                calculation = calculations.find(f => f.id == calculationId);
                calculation1 = calculations.find(f => f.id == 1);
                let sumKdnCalc1 = parseInt(calculation1.sumKdn).toLocaleString()
                let sumKlnCalc1 = parseInt(calculation1.sumKln).toLocaleString()
                let sumTotalCalc1 = parseInt(calculation1.sumTotal).toLocaleString()
                let sumKdn = parseInt(calculation.sumKdn).toLocaleString()
                let sumKln = parseInt(calculation.sumKln).toLocaleString()
                let sumTotal = parseInt(calculation.sumTotal).toLocaleString()
                // let sumPpn = parseInt(calculation.sumPpn).toLocaleString()
                // let sumBm = parseInt(calculation.sumBm).toLocaleString()
                // let sumPdriPpn = parseInt(calculation.sumPdriPpn).toLocaleString()
                // let sumPph = parseInt(calculation.sumPph).toLocaleString()
                // let sumPdriTotal = parseInt(calculation.sumPdriTotal).toLocaleString()
                $(`.1-2-sumKdn`).text(sumKdnCalc1)
                $(`.1-2-sumKln`).text(sumKlnCalc1)
                $(`.1-2-sumTotal`).text(sumTotalCalc1)
                $(`#1-2-sumKdn`).text("Rp." + sumKdn)
                $(`#1-2-sumKln`).text("Rp." + sumKln)
                $(`#1-2-sumTotal`).text("Rp." + sumTotal)
                console.log(calculation);
                calculation.data.forEach(function(item, index) {
                    index = index + 2;
                    let row = "<tr>" +
                        `<td>
                            <div class="dropdown">
                                <div class="btn btn-secondary btn-sm" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">!</div>
                                <div class="dropdown-menu"
                                    aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item buttonEditNews"
                                        onclick="edit(${item.id})"><i class="fa fa-edit"></i> Edit
                                    </a>
                                    <button class="dropdown-item" type="submit" onclick="destroy(${item.id})"><i
                                            class="fa fa-trash"></i> Delete</button>
                                </div>
                            </div>
                        </td>` +
                        "<td>" + (index + 1) + "</td>" +
                        "<td>" + item.uraian + "</td>" +
                        "<td>" + item.produsen_tingkat_dua + "</td>" +
                        "<td>" + item.jumlah + "</td>" +
                        "<td>" + item.tkdn + "</td>" +
                        "<td>" + item.biaya + "</td>" +
                        "<td>" + item.alokasi + "%</td>" +
                        "<td>" + item.kdn + "</td>" +
                        "<td>" + item.kln + "</td>" +
                        "<td>" + item.total + "</td>" +
                        "</tr>";

                    tbody.append(row);
                });
            } else if (tbodyId == "tbody-3") {
                const tbody = $(`#${tbodyId}`);
                tbody.empty();
                calculation = calculations.find(f => f.id == calculationId);
                let sumKdn = parseInt(calculation.sumKdn).toLocaleString()
                let sumKln = parseInt(calculation.sumKln).toLocaleString()
                let sumTotal = parseInt(calculation.sumTotal).toLocaleString()
                $(`#1-3-sumJumlahOrang`).text(calculation.sumJumlahOrang)
                $(`#1-3-sumKdn`).text(sumKdn)
                $(`#1-3-sumKln`).text(sumKln)
                $(`#1-3-sumTotal`).text(sumTotal)
                console.log(calculation);
                calculation.data.forEach(function(item, index) {
                    let row = `
                    <tr>
                        <td>
                            <div class="dropdown">
                                <div class="btn btn-secondary btn-sm" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">!</div>
                                <div class="dropdown-menu"
                                    aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item buttonEditNews"
                                        onclick="edit(${item.id})"><i class="fa fa-edit"></i> Edit
                                    </a>
                                    <button class="dropdown-item" type="submit" onclick="destroy(${item.id})"><i
                                            class="fa fa-trash"></i> Delete</button>
                                </div>
                            </div>
                        </td>
                        <td>${(index + 1)}</td>
                        <td>${item.uraian_posisi}</td>
                        <td>${item.kewarganegaraan}</td>
                        <td>${item.kewarganegaraan == "Indonesia" ? "100%" : "0%"}</td>
                        <td>${item.jumlah_orang}</td>
                        <td>${item.gaji_perbulan}</td>
                        <td>${item.alokasi_gaji}%</td>
                        <td>${item.kdn}</td>
                        <td>${item.kln}</td>
                        <td>${item.total}</td>
                        <td>${item.bpjs}</td>
                        <td>${item.tunjangan_lainnya}</td>
                        </tr>
                        `;

                    tbody.append(row);
                });
            } else if (tbodyId == "tbody-4") {
                const tbody = $(`#${tbodyId}`);
                tbody.empty();
                calculation = calculations.find(f => f.id == calculationId);
                let sumKdn = parseInt(calculation.sumKdn).toLocaleString()
                let sumKln = parseInt(calculation.sumKln).toLocaleString()
                let sumTotal = parseInt(calculation.sumTotal).toLocaleString()
                $(`#1-4-sumJumlahOrang`).text(calculation.sumJumlahOrang)
                $(`#1-4-sumKdn`).text(sumKdn)
                $(`#1-4-sumKln`).text(sumKln)
                $(`#1-4-sumTotal`).text(sumTotal)
                console.log(calculation);
                calculation.data.forEach(function(item, index) {
                    let row = "<tr>" +
                        `<td>
                            <div class="dropdown">
                                <div class="btn btn-secondary btn-sm" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">!</div>
                                <div class="dropdown-menu"
                                    aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item buttonEditNews"
                                        onclick="edit(${item.id})"><i class="fa fa-edit"></i> Edit
                                    </a>
                                    <button class="dropdown-item" type="submit" onclick="destroy(${item.id})"><i
                                            class="fa fa-trash"></i> Delete</button>
                                </div>
                            </div>
                        </td>` +
                        "<td>" + (index + 1) + "</td>" +
                        "<td>" + item.uraian_posisi + "</td>" +
                        "<td>" + item.produsen_tingkat_dua + "</td>" +
                        "<td>" + item.kewarganegaraan == "Indonesia" ? "100%" : "0%" + "</td>" +
                        "<td>" + item.jumlah_orang + "</td>" +
                        "<td>" + item.biaya_pengurusan_per_bulan + "</td>" +
                        "<td>" + item.alokasi + "%</td>" +
                        "<td>" + item.kdn + "</td>" +
                        "<td>" + item.kln + "</td>" +
                        "</tr>";

                    tbody.append(row);
                });
            } else if (tbodyId == "tbody-5") {
                const tbody = $(`#${tbodyId}`);
                tbody.empty();
                calculation = calculations.find(f => f.id == calculationId);
                let sumKdn = parseInt(calculation.sumKdn).toLocaleString()
                let sumKln = parseInt(calculation.sumKln).toLocaleString()
                let sumTotal = parseInt(calculation.sumTotal).toLocaleString()
                $(`#1-5-sumJumlahOrang`).text(calculation.sumJumlahOrang)
                $(`#1-5-sumKdn`).text(sumKdn)
                $(`#1-5-sumKln`).text(sumKln)
                $(`#1-5-sumTotal`).text(sumTotal)
                console.log(calculation);
                calculation.data.forEach(function(item, index) {
                    let row = "<tr>" +
                        `<td>
                            <div class="dropdown">
                                <div class="btn btn-secondary btn-sm" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">!</div>
                                <div class="dropdown-menu"
                                    aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item buttonEditNews"
                                        onclick="edit(${item.id})"><i class="fa fa-edit"></i> Edit
                                    </a>
                                    <button class="dropdown-item" type="submit" onclick="destroy(${item.id})"><i
                                            class="fa fa-trash"></i> Delete</button>
                                </div>
                            </div>
                        </td>` +
                        "<td>" + (index + 1) + "</td>" +
                        "<td>" + item.uraian_posisi + "</td>" +
                        "<td>" + item.kewarganegaraan + "</td>" +
                        "<td>" + item.tkdn + "%" + "</td>" +
                        "<td>" + item.jumlah_orang + "</td>" +
                        "<td>" + item.gaji_perbulan + "</td>" +
                        "<td>" + item.alokasi + "%</td>" +
                        "<td>" + item.kdn + "</td>" +
                        "<td>" + item.kln + "</td>" +
                        "<td>" + item.total + "</td>" +
                        "</tr>";

                    tbody.append(row);
                });
            }
        }

        function reloadAllTable() {
            reloadTable("tbody-1", 1);
            reloadTable("tbody-2", 2);
            reloadTable("tbody-3", 3);
            reloadTable("tbody-4", 4);
            reloadTable("tbody-5", 5);
        }
    </script>
    {{-- <script src="{{ asset('dist/js/users/script.js') }}"></script> --}}
@endpush
