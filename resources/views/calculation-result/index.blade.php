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
                            <button class="badge badge-{{ $computation->permenperin_category->color }}">{{ $computation->permenperin_category->name }}</button>
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
                                        <form class="d-flex flex-wrap" style="width: 100%" id="form-1">
                                            <div class="form-group-sm mx-2 mt-2" style="font-size: 10pt; width : 13rem">
                                                <label for="bahan_baku">Nama Bahan Baku <i data-toggle="tooltip" data-placement="top" title="Nama bahan baku adalah nama yang ditunjukkan pada nama material bahan baku dalam pembuatan produk. Contoh : Biji besi, Bracket dll" class="fas fa-info-circle">
                                                    </i></label>
                                                <input type="text" name="bahan_baku" class="form-control form-control-sm " id="bahan_baku"
                                                    placeholder="">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="spesifikasi">Spesifikasi <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" name="spesifikasi" class="form-control form-control-sm" id="spesifikasi"
                                                    placeholder="">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="satuan_bahan_baku">Satuan bahan baku <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <select class="form-control form-control-sm" id="satuan_bahan_baku" name="satuan_bahan_baku">
                                                    <option></option>
                                                    <option>Pcs</option>
                                                    <option>Pack</option>
                                                    <option>Kg</option>
                                                    <option>Wakwau</option>
                                                    <option>Cukrukuk</option>
                                                </select>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="negara_asal">Negara asal <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <select class="form-control form-control-sm" id="negara_asal" name="negara_asal">
                                                    <option></option>
                                                    <option>Indonesia</option>
                                                    <option>Zimbabwe</option>
                                                    <option>Asoy</option>
                                                    <option>Geboy</option>
                                                    <option>Tabrak tabrak masuk</option>
                                                </select>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="pemasok">Pemasok / Produsen Tingkat 2 <i
                                                        class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" name="pemasok" class="form-control form-control-sm" id="pemasok"
                                                    placeholder="">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="tkdn">TKDN % <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <input type="number" class="form-control form-control-sm" id="tkdn" name="tkdn"
                                                    placeholder="">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="jumlah">Jumlah / Satuan Bahan Baku <i
                                                        class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <input type="number" name="jumlah" class="form-control form-control-sm" id="jumlah"
                                                    placeholder="">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="harga_satuan">Harga Satuan Material <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <input type="number" name="harga_satuan" class="form-control form-control-sm" id="harga_satuan"
                                                    placeholder="">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt;">
                                                <div class="card p-2">
                                                    <div class="col">
                                                        <div class="row">
                                                            <label for="" class="mx-auto">
                                                                Lokal
                                                                <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></i>
                                                            </label>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group-sm" style="font-size: 7pt;">
                                                                <label for="ppn">PPN %</label>
                                                                <input type="number" name="ppn" style=" width : 15rem" class="form-control form-control-sm"
                                                                    id="ppn" placeholder="">
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
                                                                    class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                                                </i></label>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group-sm ml-2" style="font-size: 7pt;">
                                                                <label for="bm">BM %</label>
                                                                <input type="number" name="bm" style="width: 5rem" class="form-control form-control-sm"
                                                                    id="bm" placeholder="">
                                                            </div>
                                                            <div class="form-group-sm ml-2" style="font-size: 7pt;">
                                                                <label for="pdri_ppn">PPN %</label>
                                                                <input type="number" name="pdri_ppn" style="width: 5rem" class="form-control form-control-sm"
                                                                    id="pdri_ppn" placeholder="">
                                                            </div>
                                                            <div class="form-group-sm ml-2" style="font-size: 7pt;">
                                                                <label for="pph">PPH %</label>
                                                                <input type="number" name="pph" style="width: 5rem" class="form-control form-control-sm"
                                                                    id="pph" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end" style="font-size: 10pt; width : 100%;">
                                                <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-save"></i> Simpan</button>
                                            </div>
                                        </form><br>
                                    </div>
                                </div>

                                <div class="row card">
                                    <div class="col p-2">
                                        <form class="form-inline">
                                            <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1">
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
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="dropdown">
                                                                <i data-feather="more-vertical" id="dropdownMenuButton"
                                                                    class="feather-icon dropdown-toggle" style="cursor: pointer;"
                                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item buttonEditNews" onclick=""><i class="fa fa-edit"></i> Edit
                                                                    </a>
                                                                    <form action="" method="post">
                                                                        <button class="dropdown-item" type="submit"><i class="fa fa-trash"></i> Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <th scope="row">1</th>
                                                        <td>Niku niku Nomi</td>
                                                        <td>AMD RYZEN 7000</td>
                                                        <td>Kg</td>
                                                        <td>Zimbabwe</td>
                                                        <td>Bambang</td>
                                                        <td>32 %</td>
                                                        <td>120</td>
                                                        <td>Rp.345.000.000</td>
                                                        <td>1</td>
                                                        <td>0</td>
                                                        <td>780.000.000.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="dropdown">
                                                                <i data-feather="more-vertical" id="dropdownMenuButton"
                                                                    class="feather-icon dropdown-toggle" style="cursor: pointer;"
                                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item buttonEditNews" onclick="">
                                                                        <i class="fa fa-edit"></i> Edit
                                                                    </a>
                                                                    <form action="" method="post">
                                                                        <button class="dropdown-item" type="submit"><i class="fa fa-trash"></i> Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td scope="row">2</td>
                                                        <td>Niku niku Nomi</td>
                                                        <td>AMD RYZEN 7000</td>
                                                        <td>Kg</td>
                                                        <td>Zimbabwe</td>
                                                        <td>Bambang</td>
                                                        <td>32 %</td>
                                                        <td>120</td>
                                                        <td>Rp.345.000.000</td>
                                                        <td>1</td>
                                                        <td>0</td>
                                                        <td>780.000.000.00</td>
                                                    </tr>
                                                </tbody>
                                            </table>
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
                                        <p style="font-size: 13px; opacity: 60%;">List data bahan baku untuk jasa jasa terkait</p>
                                    </div>
                                </div>
                                <div class="row card">
                                    <div class="col ">
                                        <form class="d-flex flex-wrap" style="width: 100%">
                                            <div class="form-group-sm mx-2 mt-2" style="font-size: 10pt; width : 13rem">
                                                <label for="">Jasa Terkait <i data-toggle="tooltip" data-placement="top" title="Nama bahan baku adalah nama yang ditunjukkan pada nama material bahan baku dalam pembuatan produk. Contoh : Biji besi, Bracket dll" class="fas fa-info-circle">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm " id=""
                                                    placeholder="">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Pemasok / Produsen Tingkat 2 <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm" id=""
                                                    placeholder="">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Jumlah <i
                                                        class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm" id=""
                                                    placeholder="">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">TKDN % <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm" id=""
                                                    placeholder="">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Biaya <i
                                                        class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm" id=""
                                                    placeholder="">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Alokasi Biaya <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm" id=""
                                                    placeholder="">
                                            </div>

                                            <div class="d-flex justify-content-end mt-2" style="font-size: 10pt; width : 100%;">
                                                <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-save"></i> Simpan</button>
                                            </div>
                                        </form><br>

                                    </div>
                                </div>
                                <div class="row card">
                                    <div class="col p-2">
                                        <form class="form-inline">
                                            <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1">
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col p-1">
                                        <div class="table-responsive table-responsive-sm">
                                            <table class="table table-striped table-hover"  style="font-size: 8pt">
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
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="dropdown">
                                                                <i data-feather="more-vertical" id="dropdownMenuButton"
                                                                    class="feather-icon dropdown-toggle" style="cursor: pointer;"
                                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item buttonEditNews"
                                                                        onclick=""><i class="fa fa-edit"></i> Edit</a>
                                                                    <form action="" method="post">
                                                                        <button class="dropdown-item" type="submit"><i class="fa fa-trash"></i> Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <th scope="row">1</th>
                                                        <td>Niku niku Nomi</td>
                                                        <td>AMD RYZEN 7000</td>
                                                        <td>23</td>
                                                        <td>45.5</td>
                                                        <td>543.000.000</td>
                                                        <td>Unit unitan</td>
                                                        <td>3</td>
                                                        <td>8</td>
                                                        <td>780.000.000.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="dropdown">
                                                                <i data-feather="more-vertical" id="dropdownMenuButton"
                                                                    class="feather-icon dropdown-toggle" style="cursor: pointer;"
                                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item buttonEditNews"
                                                                        onclick=""><i class="fa fa-edit"></i> Edit</a>
                                                                    <form action="" method="post">
                                                                        <button class="dropdown-item" type="submit"><i class="fa fa-trash"></i> Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <th scope="row">2</th>
                                                        <td>Niku niku Nomi</td>
                                                        <td>AMD RYZEN 7000</td>
                                                        <td>23</td>
                                                        <td>45.5</td>
                                                        <td>543.000.000</td>
                                                        <td>Unit unitan</td>
                                                        <td>3</td>
                                                        <td>8</td>
                                                        <td>780.000.000.00</td>
                                                    </tr>
                                                </tbody>
                                            </table>
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
                                        <form class="d-flex flex-wrap" style="width: 100%">
                                            <div class="form-group-sm mx-2 mt-2" style="font-size: 10pt; width : 13rem">
                                                <label for="">Uraian Posisi <i data-toggle="tooltip" data-placement="top" title="Nama bahan baku adalah nama yang ditunjukkan pada nama material bahan baku dalam pembuatan produk. Contoh : Biji besi, Bracket dll" class="fas fa-info-circle">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm " id=""
                                                    placeholder="">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Kewarganegaraan <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <select class="form-control form-control-sm" id="">
                                                    <option></option>
                                                    <option>Indonesia</option>
                                                    <option>Zimbabwe</option>
                                                    <option>Asoy</option>
                                                    <option>Geboy</option>
                                                    <option>Tabrak tabrak masuk</option>
                                                </select>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Jumlah Orang <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm" id=""
                                                    placeholder="">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Jumlah <i
                                                        class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm" id=""
                                                    placeholder="">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Gaji Perbulan<i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm" id=""
                                                    placeholder="Rp.">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Alokasi Gaji % <i
                                                        class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm" id=""
                                                    placeholder="">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt;">
                                                <div class="card p-2">
                                                        <div class="col">
                                                            <div class="row">
                                                                <label for="" class="mx-auto">Biaya (Rp.) <i
                                                                        class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                                                    </i></label>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group-sm ml-2" style="font-size: 7pt;">
                                                                    <label for="">BPJS </label>
                                                                    <input type="text" style="width: 8rem" class="form-control form-control-sm"
                                                                        id="" placeholder="Rp">
                                                                </div>
                                                                <div class="form-group-sm ml-2" style="font-size: 7pt;">
                                                                    <label for="">Tunjangan Lainnya</label>
                                                                    <input type="text" style="width: 8rem" class="form-control form-control-sm"
                                                                        id="" placeholder="Rp">
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-end" style="font-size: 10pt; width : 100%;">
                                                <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-save"></i> Simpan</button>
                                            </div>
                                        </form><br>

                                    </div>
                                </div>
                                <div class="row card">
                                    <div class="col p-2">
                                        <form class="form-inline">
                                            <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1">
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col p-1">
                                        <div class="table-responsive table-responsive-sm">
                                            <table class="table table-striped table-hover"  style="font-size: 8pt">
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
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="dropdown">
                                                                <i data-feather="more-vertical" id="dropdownMenuButton"
                                                                    class="feather-icon dropdown-toggle" style="cursor: pointer;"
                                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item buttonEditNews"
                                                                        onclick=""><i class="fa fa-edit"></i> Edit</a>
                                                                    <form action="" method="post">
                                                                        <button class="dropdown-item" type="submit"><i class="fa fa-trash"></i> Delete</button>
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
                                                                    class="feather-icon dropdown-toggle" style="cursor: pointer;"
                                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item buttonEditNews"
                                                                        onclick=""><i class="fa fa-edit"></i> Edit</a>
                                                                    <form action="" method="post">
                                                                        <button class="dropdown-item" type="submit"><i class="fa fa-trash"></i> Delete</button>
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
                                        <form class="d-flex flex-wrap" style="width: 100%">
                                            <div class="form-group-sm mx-2 mt-2" style="font-size: 10pt; width : 13rem">
                                                <label for="">Uraian Posisi <i data-toggle="tooltip" data-placement="top" title="Nama bahan baku adalah nama yang ditunjukkan pada nama material bahan baku dalam pembuatan produk. Contoh : Biji besi, Bracket dll" class="fas fa-info-circle">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm " id=""
                                                    placeholder="">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Pemasok / Produsen Tingkat 2 <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm" id=""
                                                    placeholder="">
                                            </div>


                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">TKDN % <i
                                                        class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm" id=""
                                                    placeholder="">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Jumlah Orang <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm" id=""
                                                    placeholder="Rp.">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Biaya Pengurusan Per Bulan <i
                                                        class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm" id=""
                                                    placeholder="">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Alokasi % <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm" id=""
                                                    placeholder="">
                                            </div>


                                            <div class="d-flex justify-content-end mt-2" style="font-size: 10pt; width : 100%;">
                                                <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-save"></i> Simpan</button>
                                            </div>
                                        </form><br>

                                    </div>
                                </div>
                                <div class="row card">
                                    <div class="col p-2">
                                        <form class="form-inline">
                                            <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1">
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col p-1">
                                        <div class="table-responsive table-responsive-sm">
                                            <table class="table table-striped table-hover"  style="font-size: 8pt">
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
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="dropdown">
                                                                <i data-feather="more-vertical" id="dropdownMenuButton"
                                                                    class="feather-icon dropdown-toggle" style="cursor: pointer;"
                                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item buttonEditNews"
                                                                        onclick=""><i class="fa fa-edit"></i> Edit</a>
                                                                    <form action="" method="post">
                                                                        <button class="dropdown-item" type="submit"><i class="fa fa-trash"></i> Delete</button>
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
                                                                    class="feather-icon dropdown-toggle" style="cursor: pointer;"
                                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item buttonEditNews"
                                                                        onclick=""><i class="fa fa-edit"></i> Edit</a>
                                                                    <form action="" method="post">
                                                                        <button class="dropdown-item" type="submit"><i class="fa fa-trash"></i> Delete</button>
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

                            </div>

                            {{-- tab content 1.5 tenaga kerja tidak langsung --}}
                            <div class="tab-pane fade" id="v-tenaga-kerja-tidak-langsung" role="tabpanel"
                                aria-labelledby="v-tenaga-kerja-tidak-langsung-tab">

                                <div class="row">
                                    <div class="col">
                                        <h5>Form 1.5 : Tingkat Komponen Dalam Negeri Biaya Tidak Langsung Pabrik</h5>
                                        <p style="font-size: 13px; opacity: 60%;">List data tenaga kerja tidak langsung / manajemen</p>
                                    </div>
                                </div>
                                <div class="row card">
                                    <div class="col ">
                                        <form class="d-flex flex-wrap" style="width: 100%">
                                            <div class="form-group-sm mx-2 mt-2" style="font-size: 10pt; width : 13rem">
                                                <label for="">
                                                    Uraian Posisi
                                                    <i data-toggle="tooltip" data-placement="top" title="Nama bahan baku adalah nama yang ditunjukkan pada nama material bahan baku dalam pembuatan produk. Contoh : Biji besi, Bracket dll" class="fas fa-info-circle">
                                                    </i>
                                                </label>
                                                <input type="text" class="form-control form-control-sm">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Kewarganegaraan <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <select class="form-control form-control-sm" id="">
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
                                                    <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></i>
                                                </label>
                                                <input type="text" class="form-control form-control-sm">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label>
                                                    Gaji Per Bulan
                                                    <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></i>
                                                </label>
                                                <input type="text" class="form-control form-control-sm" placeholder="Rp.">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label>
                                                    Alokasi Gaji %
                                                    <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></i>
                                                </label>
                                                <input type="text" class="form-control form-control-sm" placeholder="">
                                            </div>

                                            <div class="d-flex justify-content-end mt-2" style="font-size: 10pt; width : 100%;">
                                                <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-save"></i> Simpan</button>
                                            </div>
                                        </form><br>

                                    </div>
                                </div>
                                <div class="row card">
                                    <div class="col p-2">
                                        <form class="form-inline">
                                            <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1">
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col p-1">
                                        <div class="table-responsive table-responsive-sm">
                                            <table class="table table-striped table-hover"  style="font-size: 8pt">
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
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="dropdown">
                                                                <i data-feather="more-vertical" id="dropdownMenuButton" class="feather-icon dropdown-toggle" style="cursor: pointer;"
                                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item buttonEditNews" onclick="">
                                                                        <i class="fa fa-edit"></i>
                                                                        Edit
                                                                    </a>
                                                                    <form action="" method="post">
                                                                        <button class="dropdown-item" type="submit"><i class="fa fa-trash"></i> Delete</button>
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
                                                                    class="feather-icon dropdown-toggle" style="cursor: pointer;"
                                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item buttonEditNews"
                                                                        onclick=""><i class="fa fa-edit"></i> Edit</a>
                                                                    <form action="" method="post">
                                                                        <button class="dropdown-item" type="submit"><i class="fa fa-trash"></i> Delete</button>
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

                            </div>

                            {{-- tab content 1.6 mesin yang dimiliki sendiri --}}
                            <div class="tab-pane fade" id="v-mesin-sendiri" role="tabpanel" aria-labelledby="v-mesin-sendiri-tab">
                                <div class="row">
                                    <div class="col">
                                        <h5>Form 1.6 : Tingkat Komponen Dalam Biaya Tidak Langsung Pabrik</h5>
                                        <p style="font-size: 13px; opacity: 60%;">List data untuk mesin / alat kerja yang dimiliki sendiri</p>
                                    </div>
                                </div>
                                <div class="row card">
                                    <div class="col ">
                                        <form class="d-flex flex-wrap" style="width: 100%">
                                            <div class="form-group-sm mx-2 mt-2" style="font-size: 10pt; width : 13rem">
                                                <label for="">Uraian <i data-toggle="tooltip" data-placement="top" title="Nama bahan baku adalah nama yang ditunjukkan pada nama material bahan baku dalam pembuatan produk. Contoh : Biji besi, Bracket dll" class="fas fa-info-circle">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm " id=""
                                                    placeholder="">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Spesifikasi <i
                                                        class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm" id=""
                                                    placeholder="">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Jumlah Unit <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm" id=""
                                                    placeholder="">
                                            </div>


                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Biaya Depresiasi Per Bulan<i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm" id=""
                                                    placeholder="Rp.">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Alokasi Mesin % <i
                                                        class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm" id=""
                                                    placeholder="">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt;">
                                                <div class="card p-2">
                                                        <div class="col">
                                                            <div class="row">
                                                                <label for="" class="mx-auto">Alat Kerja<i
                                                                        class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                                                    </i></label>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group-sm ml-2" style="font-size: 7pt;">
                                                                    <label for="">Dibuat</label>
                                                                    <select name="" id="" class="form-control form-control-sm" style="width: 8rem">
                                                                        <option value="">Dalam Negeri</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group-sm ml-2" style="font-size: 7pt;">
                                                                    <label for="">Dimiliki</label>
                                                                    <select name="" id="" class="form-control form-control-sm" style="width: 8rem">
                                                                        <option value="">Dalam Negeri</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-end" style="font-size: 10pt; width : 100%;">
                                                <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-save"></i> Simpan</button>
                                            </div>
                                        </form><br>

                                    </div>
                                </div>
                                <div class="row card">
                                    <div class="col p-2">
                                        <form class="form-inline">
                                            <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1">
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col p-1">
                                        <div class="table-responsive table-responsive-sm">
                                            <table class="table table-striped table-hover"  style="font-size: 8pt">
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
                                                                    class="feather-icon dropdown-toggle" style="cursor: pointer;"
                                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item buttonEditNews"
                                                                        onclick=""><i class="fa fa-edit"></i> Edit</a>
                                                                    <form action="" method="post">
                                                                        <button class="dropdown-item" type="submit"><i class="fa fa-trash"></i> Delete</button>
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
                                                                    class="feather-icon dropdown-toggle" style="cursor: pointer;"
                                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item buttonEditNews"
                                                                        onclick=""><i class="fa fa-edit"></i> Edit</a>
                                                                    <form action="" method="post">
                                                                        <button class="dropdown-item" type="submit"><i class="fa fa-trash"></i> Delete</button>
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
                    <div class="form-group p-2">
                        <a href="#" class="btn btn-success btn-block">Selanjutnya ></a>
                    </div>
                    <div class="form-group p-2">
                        <a href="#" class="btn btn-danger flex-grow-1 btn-block">Hapus </a>
                    </div>
                </div>
                {{-- header tab panel --}}
                <div class="card">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link text-dark active" id="v-bahan-baku-tab" data-toggle="pill" href="#v-bahan-baku"
                            role="tab" aria-controls="v-bahan-baku" aria-selected="true">
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
                            href="#v-tenaga-kerja-tidak-langsung" role="tab" aria-controls="v-tenaga-kerja-tidak-langsung"
                            aria-selected="false">
                            <button class="btn-primary">1.5</button>
                            Tenaga Kerja Tidak Langsung
                        </a>
                        <a class="nav-link text-dark" id="v-mesin-sendiri-tab" data-toggle="pill"
                            href="#v-mesin-sendiri" role="tab" aria-controls="v-mesin-sendiri"
                            aria-selected="false">
                            <button class="btn-primary">1.6</button>
                            Mesin Yang Dimiliki Sendiri
                        </a>
                        <a class="nav-link text-dark" id="v-mesin-sewa-tab" data-toggle="pill"
                            href="#v-mesin-sewa" role="tab" aria-controls="v-mesin-sewa"
                            aria-selected="false">
                            <button class="btn-primary">1.7</button>
                            Mesin Yang Sewa
                        </a>
                        <a class="nav-link text-dark" id="v-overhead-tab" data-toggle="pill"
                            href="#v-overhead" role="tab" aria-controls="v-overhead"
                            aria-selected="false">
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
        let calculations = [
            {
                "no": "1.1",
                "nama": "Bahan Baku",
                "slug": "bahan-baku",
                "data" : []
            },
            {
                "no": "1.2",
                "nama": "Jasa Terkait Bahan Baku",
                "slug": "jasa-terkait-bahan-baku",
                "data" : []
            },
        ];

        $(() => {
            $("#form-1").on("submit", (event) => {
                event.preventDefault();
                let serializedArray = $("#form-1").serializeArray();
                let resultObject = {};

                for (let i = 0; i < serializedArray.length; i++) {
                    let input = serializedArray[i];
                    resultObject[input.name] = input.value;
                }

                console.log(resultObject);
            })
        })
    </script>
    {{-- <script src="{{ asset('dist/js/users/script.js') }}"></script> --}}
@endpush
