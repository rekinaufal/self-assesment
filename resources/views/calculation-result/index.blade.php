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
                                                <input type="text" class="form-control form-control-sm replaceDot" id="tkdn"
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
                                                <div class="input-group input-group-sm mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                                    </div>
                                                    <input type="text" class="form-control rupiahInput" placeholder=""
                                                        id="harga_satuan" name="harga_satuan" required autocomplete="off" value="0,00">
                                                </div>
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
                                                                <input type="text" name="ppn"
                                                                    style=" width : 15rem"
                                                                    class="form-control form-control-sm replaceDot" id="ppn"
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
                                                                <input type="text" name="bm" style="width: 5rem"
                                                                    class="form-control form-control-sm replaceDot" id="bm"
                                                                    placeholder="" value="0">
                                                            </div>
                                                            <div class="form-group-sm ml-2" style="font-size: 7pt;">
                                                                <label for="pdri_ppn">PPN %</label>
                                                                <input type="text" name="pdri_ppn" style="width: 5rem"
                                                                    class="form-control form-control-sm replaceDot" id="pdri_ppn"
                                                                    placeholder="" value="0">
                                                            </div>
                                                            <div class="form-group-sm ml-2" style="font-size: 7pt;">
                                                                <label for="pph">PPH %</label>
                                                                <input type="text" name="pph" style="width: 5rem"
                                                                    class="form-control form-control-sm replaceDot" id="pph"
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
                                                        <th scope="col" class="text-nowrap pr-4">Aksi</th>
                                                        <th scope="col" class="text-nowrap pr-4">No</th>
                                                        <th style="width:70%" scope="col" class="text-nowrap pr-4">Nama Bahan Baku</th>
                                                        <th scope="col" class="text-nowrap pr-4">Spesifikasi</th>
                                                        <th scope="col" class="text-nowrap pr-4">Satuan Bahan Baku</th>
                                                        <th scope="col" class="text-nowrap pr-4">Negara Asal</th>
                                                        <th scope="col" class="text-nowrap pr-4">Pemasok / Produsen Tingkat 2</th>
                                                        <th scope="col" class="text-nowrap pr-4">TKDN %</th>
                                                        <th scope="col" class="text-nowrap pr-4">Jumlah / Satuan Bahan Baku</th>
                                                        <th scope="col" class="text-nowrap pr-4">Harga Satuan Material (Rp)</th>
                                                        <th scope="col" class="text-nowrap pr-4">KDN</th>
                                                        <th scope="col" class="text-nowrap pr-4">KLN</th>
                                                        <th scope="col" class="text-nowrap pr-4">Total</th>
                                                        <th scope="col" class="text-nowrap pr-4">Lokal PPN</th>
                                                        <th scope="col" class="text-nowrap pr-4">PDRI BM</th>
                                                        <th scope="col" class="text-nowrap pr-4">PDRI PPN</th>
                                                        <th scope="col" class="text-nowrap pr-4">PDRI PPH</th>
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
                                        <div class="col">
                                            <p class="mt-5 text-right">Total</p>
                                        </div>
                                        <div class="col-9 p-1">
                                            <div class="table-responsive table-responsive-sm">
                                                <table class="table table-bordered table-hover" style="font-size: 8pt">
                                                    <thead style="text-align: center"class="thead-dark">
                                                        <tr>
                                                            <th scope="col" class="text-nowrap pr-4" rowspan="2" class="align-middle">Lokal
                                                                PPN</th>
                                                            <th scope="col" class="text-nowrap pr-4" colspan="4">PDRI</th>
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
                                                <input type="text" class="form-control form-control-sm replaceDot" id=""
                                                    placeholder="" name="tkdn">
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
                                                    <input type="text" class="form-control biaya12" placeholder=""
                                                        id="1-2-biaya" name="biaya" required autocomplete="off" value="0,00">
                                                </div>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Alokasi Biaya % <i class="fas fa-info-circle replaceDot"
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
                                                        <th scope="col" class="text-nowrap pr-4">Aksi</th>
                                                        <th scope="col" class="text-nowrap pr-4">No</th>
                                                        <th scope="col" class="text-nowrap pr-4">Uraian</th>
                                                        <th scope="col" class="text-nowrap pr-4">Pemasok / Produsen Tingkat 2</th>
                                                        <th scope="col" class="text-nowrap pr-4">Jumlah</th>
                                                        <th scope="col" class="text-nowrap pr-4">TKDN %</th>
                                                        <th scope="col" class="text-nowrap pr-4">Biaya (Rp)</th>
                                                        <th scope="col" class="text-nowrap pr-4">Alokasi</th>
                                                        <th scope="col" class="text-nowrap pr-4">KDN</th>
                                                        <th scope="col" class="text-nowrap pr-4">KLN</th>
                                                        <th scope="col" class="text-nowrap pr-4">Total</th>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            {{-- <div class="dropdown">
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
                                                            </div> --}}
                                                        </td>
                                                        <th scope="row">1</th>
                                                        <td class="text-nowrap">Local PPN</td>
                                                        <td class="text-nowrap">Dirjen Pajak</td>
                                                        <td>1</td>
                                                        <td>100%</td>
                                                        <td class="text-nowrap" id="sumLocalPpn-1-2">0</td>
                                                        <td>100%</td>
                                                        <td class="text-nowrap" id="sumLocalKdn-1-2">0</td>
                                                        <td class="text-nowrap">Rp 0,00</td>
                                                        <td class="text-nowrap" id="sumLocalTotal-1-2">0</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            {{-- <div class="dropdown">
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
                                                            </div> --}}
                                                        </td>
                                                        <th scope="row">2</th>
                                                        <td class="text-nowrap">PDRI</td>
                                                        <td class="text-nowrap">Bea Cukai</td>
                                                        <td>1</td>
                                                        <td>100%</td>
                                                        <td class="text-nowrap" id="sumPdriTotal-1-2">0</td>
                                                        <td>100%</td>
                                                        <td class="text-nowrap" id="sumPdriKln-1-2"></td>
                                                        <td class="text-nowrap">Rp 0,00</td>
                                                        <td class="text-nowrap" id="sumPdri-1-2">0</td>
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
                                                <input type="text" class="form-control form-control-sm "
                                                    id="" placeholder="" name="uraian_posisi">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Kewarganegaraan <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <select class="form-control form-control-sm setTkdn" id=""
                                                    name="kewarganegaraan">
                                                    <option></option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country }}">{{ $country }}</option>
                                                    @endforeach
                                                </select>
                                                <input type="hidden" id="tkdn-1-3" value="" name="tkdn">
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
                                                <label for="">Gaji Perbulan<i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <div class="input-group input-group-sm mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                                    </div>
                                                    <input type="text" class="form-control gaji_perbulan13"
                                                        placeholder="" id="1-2-gaji_perbulan" name="gaji_perbulan" required autocomplete="off" value="0,00">
                                                </div>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="">Alokasi Gaji % <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm replaceDot" id=""
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
                                                                <label for="">BPJS %</label>
                                                                <input type="text" style="width: 8rem"
                                                                    class="form-control form-control-sm replaceDot" id="" value="0" name="bpjs_percent">
                                                            </div>
                                                            <div class="form-group-sm ml-2" style="font-size: 7pt;">
                                                                <label for="">Tunjangan Lainnya</label>
                                                                <div class="input-group input-group-sm mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                                                    </div>
                                                                    <input type="text" class="form-control form-control-sm tunjanganLainnya13"
                                                                        placeholder="" id="currency_tunjangan_lainnya"
                                                                        name="currency_tunjangan_lainnya" required autocomplete="off" value="0,00">
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
                                                        <th scope="col" class="text-nowrap pr-4">Gaji Per Bulan (Rp)</th>
                                                        <th scope="col" class="text-nowrap pr-4">Alokasi %</th>
                                                        <th scope="col" class="text-nowrap pr-4">KDN</th>
                                                        <th scope="col" class="text-nowrap pr-4">KLN</th>
                                                        <th scope="col" class="text-nowrap pr-4">Total</th>
                                                        <th scope="col" class="text-nowrap pr-4">BPJS</th>
                                                        <th scope="col" class="text-nowrap pr-4">Tunjangan Lainnya</th>
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
                                                            <th scope="col" class="text-nowrap pr-4">Jumlah Orang</th>
                                                            <th scope="col" class="text-nowrap pr-4">KDN</th>
                                                            <th scope="col" class="text-nowrap pr-4">KLN</th>
                                                            <th scope="col" class="text-nowrap pr-4">Total</th>
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
                                    <div class="d-flex align-items-center">
                                        <div class="col">
                                            <p class="mr-2 text-right">Kapasitas Normal Perbulan</p>
                                        </div>
                                        <div class="col-6 p-1">
                                            <div class="table-responsive table-responsive-sm">
                                                <table class="table table-bordered table-hover" style="font-size: 8pt">
                                                    <thead class="">
                                                        <tr>
                                                            <th scope="col" class="text-nowrap pr-4">
                                                                <input type="text"
                                                                    class="form-control kapasitasNormalPerbulan kapasitasNormalPerbulan-1-3"
                                                                    placeholder="" name="kapasitasNormalPerbulan" value="0">
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="col">
                                            <p class="mr-2 text-right">Biaya Satuan Product</p>
                                        </div>
                                        <div class="col-6 p-1">
                                            <div class="table-responsive table-responsive-sm">
                                                <table class="table table-bordered table-hover" style="font-size: 8pt">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" class="text-nowrap pr-4" id="kdn-biaya-satuan-product-1-3">KDN</th>
                                                            <th scope="col" class="text-nowrap pr-4" id="kln-biaya-satuan-product-1-3">KLN</th>
                                                            <th scope="col" class="text-nowrap pr-4" id="total-biaya-satuan-product-1-3">Total
                                                            </th>
                                                        </tr>
                                                    </thead>
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
                                                <input type="text" class="form-control form-control-sm replaceDot" id="tkdn"
                                                    name="tkdn" placeholder="">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="jumlah_orang">Jumlah Orang <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm"
                                                    id="jumlah_orang" name="jumlah_orang" placeholder="">
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
                                                    <input type="text" class="form-control biaya_pengurusan_perbulan14"
                                                        placeholder="" id="biaya_pengurusan_per_bulan"
                                                        name="biaya_pengurusan_per_bulan" required autocomplete="off" value="0,00">
                                                </div>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="alokasi">Alokasi % <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm replaceDot" id="alokasi"
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
                                                        <th scope="col" class="text-nowrap pr-4">Aksi</th>
                                                        <th scope="col" class="text-nowrap pr-4">No</th>
                                                        <th scope="col" class="text-nowrap pr-4">Uraian</th>
                                                        <th scope="col" class="text-nowrap pr-4">Pemasok / Produsen Tingkat 2</th>
                                                        <th scope="col" class="text-nowrap pr-4">TKDN %</th>
                                                        <th scope="col" class="text-nowrap pr-4">Jumlah</th>
                                                        <th scope="col" class="text-nowrap pr-4">Biaya Pengurusan Per Bulan</th>
                                                        <th scope="col" class="text-nowrap pr-4">Alokasi %</th>
                                                        <th scope="col" class="text-nowrap pr-4">KDN</th>
                                                        <th scope="col" class="text-nowrap pr-4">KLN</th>
                                                        <th scope="col" class="text-nowrap pr-4">Total</th>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            {{-- <div class="dropdown">
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
                                                            </div> --}}
                                                        </td>
                                                        <th scope="row">1</th>
                                                        <td class="text-nowrap">BPJS</td>
                                                        <td>-</td>
                                                        <td>100%</td>
                                                        <td>-</td>
                                                        <td class="text-nowrap" id="sumBpjs-1-4-3">Rp 0,00</td>
                                                        <td>100%</td>
                                                        <td class="text-nowrap" id="sumBpjsKdn-1-4-3">Rp 0,00</td>
                                                        <td class="text-nowrap">Rp 0,00</td>
                                                        <td class="text-nowrap" id="sumBpjsTotal-1-4-3">Rp 0,00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            {{-- <div class="dropdown">
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
                                                            </div> --}}
                                                        </td>
                                                        <th scope="row">2</th>
                                                        <td class="text-nowrap">Tunjangan Lainnya</td>
                                                        <td>-</td>
                                                        <td>100%</td>
                                                        <td>-</td>
                                                        <td class="text-nowrap" id="sumTunjanganLainnya-1-4-3">Rp 0,00</td>
                                                        <td>100%</td>
                                                        <td class="text-nowrap" id="sumTunjanganLainnyaKdn-1-4-3">Rp 0,00</td>
                                                        <td class="text-nowrap">Rp 0,00</td>
                                                        <td class="text-nowrap" id="sumTunjanganLainnyaTotal-1-4-3">Rp 0,00</td>
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
                                                            <th scope="col" class="text-nowrap pr-4">Jumlah Orang</th>
                                                            <th scope="col" class="text-nowrap pr-4">KDN</th>
                                                            <th scope="col" class="text-nowrap pr-4">KLN</th>
                                                            <th scope="col" class="text-nowrap pr-4">Total</th>
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
                                    <div class="d-flex align-items-center">
                                        <div class="col">
                                            <p class="mr-2 text-right">Kapasitas Normal Perbulan</p>
                                        </div>
                                        <div class="col-6 p-1">
                                            <div class="table-responsive table-responsive-sm">
                                                <table class="table table-bordered table-hover" style="font-size: 8pt">
                                                    <thead class="">
                                                        <tr>
                                                            <th scope="col" class="text-nowrap pr-4">
                                                                <input type="text"
                                                                    class="form-control kapasitasNormalPerbulan kapasitasNormalPerbulan-1-4"
                                                                    placeholder="" name="kapasitasNormalPerbulan" value="0">
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="col">
                                            <p class="mr-2 text-right">Biaya Satuan Product</p>
                                        </div>
                                        <div class="col-6 p-1">
                                            <div class="table-responsive table-responsive-sm">
                                                <table class="table table-bordered table-hover" style="font-size: 8pt">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" class="text-nowrap pr-4" id="kdn-biaya-satuan-product-1-4">KDN</th>
                                                            <th scope="col" class="text-nowrap pr-4" id="kln-biaya-satuan-product-1-4">KLN</th>
                                                            <th scope="col" class="text-nowrap pr-4" id="total-biaya-satuan-product-1-4">Total
                                                            </th>
                                                        </tr>
                                                    </thead>
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
                                                <select class="form-control form-control-sm setTkdn" id=""
                                                    name="kewarganegaraan">
                                                    <option></option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country }}">{{ $country }}</option>
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
                                                <input type="text" class="form-control form-control-sm"
                                                    id="jumlah_orang" name="jumlah_orang">
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
                                                    <input type="text" class="form-control gaji_perbulan15"
                                                        placeholder="" id="gaji_perbulan" name="gaji_perbulan" required autocomplete="off" value="0,00">
                                                </div>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label>
                                                    Alokasi Gaji %
                                                    <i class="fas fa-info-circle" data-toggle="tooltip"
                                                        data-placement="top" title="Tooltip on top"></i>
                                                </label>
                                                <input type="text" class="form-control form-control-sm replaceDot" placeholder=""
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
                                                            <th scope="col" class="text-nowrap pr-4">Jumlah Orang</th>
                                                            <th scope="col" class="text-nowrap pr-4">KDN</th>
                                                            <th scope="col" class="text-nowrap pr-4">KLN</th>
                                                            <th scope="col" class="text-nowrap pr-4">Total</th>
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
                                    <div class="d-flex align-items-center">
                                        <div class="col">
                                            <p class="mr-2 text-right">Kapasitas Normal Perbulan</p>
                                        </div>
                                        <div class="col-6 p-1">
                                            <div class="table-responsive table-responsive-sm">
                                                <table class="table table-bordered table-hover" style="font-size: 8pt">
                                                    <thead class="">
                                                        <tr>
                                                            <th scope="col" class="text-nowrap pr-4">
                                                                <input type="text"
                                                                    class="form-control kapasitasNormalPerbulan kapasitasNormalPerbulan-1-5"
                                                                    placeholder="" name="kapasitasNormalPerbulan" value="0">
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="col">
                                            <p class="mr-2 text-right">Biaya Satuan Product</p>
                                        </div>
                                        <div class="col-6 p-1">
                                            <div class="table-responsive table-responsive-sm">
                                                <table class="table table-bordered table-hover" style="font-size: 8pt">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" class="text-nowrap pr-4" id="kdn-biaya-satuan-product-1-5">KDN
                                                            </th>
                                                            <th scope="col" class="text-nowrap pr-4" id="kln-biaya-satuan-product-1-5">KLN
                                                            </th>
                                                            <th scope="col" class="text-nowrap pr-4" id="total-biaya-satuan-product-1-5">Total
                                                            </th>
                                                        </tr>
                                                    </thead>
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

                                            <div class="form-group-sm mx-2 mt-2 "
                                                style="font-size: 10pt; width : 13rem">
                                                <label for="">Spesifikasi <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm"
                                                    id="" placeholder="" name="spesifikasi"
                                                    name="spesifikasi">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 "
                                                style="font-size: 10pt; width : 13rem">
                                                <label for="">Jumlah Unit <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm"
                                                    id="" placeholder="" name="jumlah_unit">
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
                                                    <input type="text" class="form-control biayaDepresiasiPerbulan16"
                                                        placeholder="" id="biaya_depresiasi_perbulan"
                                                        name="biaya_depresiasi_perbulan" required autocomplete="off" value="0,00">
                                                </div>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 "
                                                style="font-size: 10pt; width : 13rem">
                                                <label for="">Alokasi Mesin % <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm replaceDot"
                                                    id="" placeholder="" name="alokasi">
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
                                                                    class="form-control form-control-sm"
                                                                    style="width: 8rem">
                                                                    <option value="Dalam Negeri">Dalam Negeri</option>
                                                                    <option value="Luar Negeri">Luar Negeri</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group-sm ml-2" style="font-size: 7pt;">
                                                                <label for="">Dimiliki</label>
                                                                <select name="dimiliki" id="dimiliki-1-6"
                                                                    class="form-control form-control-sm"
                                                                    style="width: 8rem">
                                                                    <option value="Dalam Negeri">Dalam Negeri</option>
                                                                    <option value="Luar Negeri">Luar Negeri</option>
                                                                </select>
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
                                                        <th scope="col" class="text-nowrap pr-4">TKDN %</th>
                                                        <th scope="col" class="text-nowrap pr-4">Biaya Per Bulan</th>
                                                        <th scope="col" class="text-nowrap pr-4">Alokasi %</th>
                                                        <th scope="col" class="text-nowrap pr-4">KDN</th>
                                                        <th scope="col" class="text-nowrap pr-4">KLN</th>
                                                        <th scope="col" class="text-nowrap pr-4">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody-6">
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
                                <div class="d-flex">
                                    <div class="col">
                                        <p class="mt-5 mr-2 text-right">Total</p>
                                    </div>
                                    <div class="col-6 p-1">
                                        <div class="table-responsive table-responsive-sm">
                                            <table class="table table-bordered table-hover" style="font-size: 8pt">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col" class="text-nowrap pr-4">Jumlah Unit</th>
                                                        <th scope="col" class="text-nowrap pr-4">KDN</th>
                                                        <th scope="col" class="text-nowrap pr-4">KLN</th>
                                                        <th scope="col" class="text-nowrap pr-4">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td id="1-6-sumJumlahUnit">0</td>
                                                        <td id="1-6-sumKdn">Rp.0</td>
                                                        <td id="1-6-sumKln">Rp.0</td>
                                                        <td id="1-6-sumTotal">Rp.0</td>
                                                    </tr>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="col">
                                        <p class="mr-2 text-right">Kapasitas Normal Perbulan</p>
                                    </div>
                                    <div class="col-6 p-1">
                                        <div class="table-responsive table-responsive-sm">
                                            <table class="table table-bordered table-hover" style="font-size: 8pt">
                                                <thead class="">
                                                    <tr>
                                                        <th scope="col" class="text-nowrap pr-4">
                                                            <input type="text"
                                                                class="form-control kapasitasNormalPerbulan kapasitasNormalPerbulan-1-6"
                                                                placeholder="" name="kapasitasNormalPerbulan">
                                                        </th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="col">
                                        <p class="mr-2 text-right">Biaya Satuan Product</p>
                                    </div>
                                    <div class="col-6 p-1">
                                        <div class="table-responsive table-responsive-sm">
                                            <table class="table table-bordered table-hover" style="font-size: 8pt">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-nowrap pr-4" id="kdn-biaya-satuan-product-1-6">KDN</th>
                                                        <th scope="col" class="text-nowrap pr-4" id="kln-biaya-satuan-product-1-6">KLN</th>
                                                        <th scope="col" class="text-nowrap pr-4" id="total-biaya-satuan-product-1-6">Total
                                                        </th>
                                                    </tr>
                                                </thead>
                                            </table>
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
                                                <input type="text" class="form-control form-control-sm "
                                                    id="" placeholder="" name="uraian">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 "
                                                style="font-size: 10pt; width : 13rem">
                                                <label for="">Spesifikasi <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm"
                                                    id="" placeholder="" name="spesifikasi"
                                                    name="spesifikasi">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 "
                                                style="font-size: 10pt; width : 13rem">
                                                <label for="">Produsen Tingkat 2 <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm"
                                                    id="" placeholder="" name="produsen_tingkat_dua">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 "
                                                style="font-size: 10pt; width : 13rem">
                                                <label for="">Jumlah Unit <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm"
                                                    id="" placeholder="" name="jumlah_unit">
                                            </div>


                                            <div class="form-group-sm mx-2 mt-2 "
                                                style="font-size: 10pt; width : 13rem">
                                                <label for="">Biaya Sewa Per Bulan<i
                                                        class="fas fa-info-circle" data-toggle="tooltip"
                                                        data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <div class="input-group input-group-sm mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                                    </div>
                                                    <input type="text" class="form-control biayaSewaPerbulan17"
                                                        placeholder="" id="biaya_sewa_perbulan"
                                                        name="biaya_sewa_perbulan" required autocomplete="off" value="0,00">
                                                </div>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 "
                                                style="font-size: 10pt; width : 13rem">
                                                <label for="">Alokasi Mesin % <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm replaceDot"
                                                    id="" placeholder="" name="alokasi">
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
                                                                    class="form-control form-control-sm"
                                                                    style="width: 8rem">
                                                                    <option value="Dalam Negeri">Dalam Negeri</option>
                                                                    <option value="Luar Negeri">Luar Negeri</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group-sm ml-2" style="font-size: 7pt;">
                                                                <label for="">Dimiliki</label>
                                                                <select name="dimiliki" id="dimiliki-1-7"
                                                                    class="form-control form-control-sm"
                                                                    style="width: 8rem">
                                                                    <option value="Dalam Negeri">Dalam Negeri</option>
                                                                    <option value="Luar Negeri">Luar Negeri</option>
                                                                </select>
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
                                                        <th scope="col" class="text-nowrap pr-4">TKDN %</th>
                                                        <th scope="col" class="text-nowrap pr-4">Biaya Per Bulan</th>
                                                        <th scope="col" class="text-nowrap pr-4">Alokasi %</th>
                                                        <th scope="col" class="text-nowrap pr-4">KDN</th>
                                                        <th scope="col" class="text-nowrap pr-4">KLN</th>
                                                        <th scope="col" class="text-nowrap pr-4">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody-7">
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
                                <div class="d-flex">
                                    <div class="col">
                                        <p class="mt-5 mr-2 text-right">Total</p>
                                    </div>
                                    <div class="col-6 p-1">
                                        <div class="table-responsive table-responsive-sm">
                                            <table class="table table-bordered table-hover" style="font-size: 8pt">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col" class="text-nowrap pr-4">Jumlah Unit</th>
                                                        <th scope="col" class="text-nowrap pr-4">KDN</th>
                                                        <th scope="col" class="text-nowrap pr-4">KLN</th>
                                                        <th scope="col" class="text-nowrap pr-4">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td id="1-7-sumJumlahUnit">0</td>
                                                        <td id="1-7-sumKdn">Rp.0</td>
                                                        <td id="1-7-sumKln">Rp.0</td>
                                                        <td id="1-7-sumTotal">Rp.0</td>
                                                    </tr>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="col">
                                        <p class="mr-2 text-right">Kapasitas Normal Perbulan</p>
                                    </div>
                                    <div class="col-6 p-1">
                                        <div class="table-responsive table-responsive-sm">
                                            <table class="table table-bordered table-hover" style="font-size: 8pt">
                                                <thead class="">
                                                    <tr>
                                                        <th scope="col" class="text-nowrap pr-4">
                                                            <input type="text"
                                                                class="form-control kapasitasNormalPerbulan kapasitasNormalPerbulan-1-7"
                                                                placeholder="" name="kapasitasNormalPerbulan">
                                                        </th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="col">
                                        <p class="mr-2 text-right">Biaya Satuan Product</p>
                                    </div>
                                    <div class="col-6 p-1">
                                        <div class="table-responsive table-responsive-sm">
                                            <table class="table table-bordered table-hover" style="font-size: 8pt">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-nowrap pr-4" id="kdn-biaya-satuan-product-1-7">KDN</th>
                                                        <th scope="col" class="text-nowrap pr-4" id="kln-biaya-satuan-product-1-7">KLN</th>
                                                        <th scope="col" class="text-nowrap pr-4" id="total-biaya-satuan-product-1-7">Total
                                                        </th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- tab content 1.8 List data untuk jasa jasa terkait --}}
                            <div class="tab-pane fade" id="v-overhead" role="tabpanel"
                                aria-labelledby="v-overhead">
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
                                                <input type="text" class="form-control form-control-sm "
                                                    id="" placeholder="" name="uraian">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 "
                                                style="font-size: 10pt; width : 13rem">
                                                <label for="">Pemasok <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm"
                                                    id="" placeholder="" name="pemasok">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 "
                                                style="font-size: 10pt; width : 13rem">
                                                <label for="">Jumlah <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm"
                                                    id="" placeholder="" name="jumlah">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 " style="font-size: 10pt; width : 13rem">
                                                <label for="tkdn">TKDN % <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm replaceDot" id="tkdn"
                                                    name="tkdn" placeholder="">
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 "
                                                style="font-size: 10pt; width : 13rem">
                                                <label for="">Biaya Per Bulan<i
                                                        class="fas fa-info-circle" data-toggle="tooltip"
                                                        data-placement="top" title="Tooltip on top">
                                                    </i></label>
                                                <div class="input-group input-group-sm mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                                    </div>
                                                    <input type="text" class="form-control biayaPerbulan18"
                                                        placeholder="" id="biaya_perbulan"
                                                        name="biaya_perbulan" required autocomplete="off" value="0,00">
                                                </div>
                                            </div>

                                            <div class="form-group-sm mx-2 mt-2 "
                                                style="font-size: 10pt; width : 13rem">
                                                <label for="">Alokasi Pengguna % <i class="fas fa-info-circle"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top">
                                                    </i></label>
                                                <input type="text" class="form-control form-control-sm replaceDot"
                                                    id="" placeholder="" name="alokasi">
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
                                <div class="d-flex">
                                    <div class="col">
                                        <p class="mt-5 mr-2 text-right">Total</p>
                                    </div>
                                    <div class="col-6 p-1">
                                        <div class="table-responsive table-responsive-sm">
                                            <table class="table table-bordered table-hover" style="font-size: 8pt">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col" class="text-nowrap pr-4">Jumlah</th>
                                                        <th scope="col" class="text-nowrap pr-4">KDN</th>
                                                        <th scope="col" class="text-nowrap pr-4">KLN</th>
                                                        <th scope="col" class="text-nowrap pr-4">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td id="1-8-sumJumlah">0</td>
                                                        <td id="1-8-sumKdn">Rp.0</td>
                                                        <td id="1-8-sumKln">Rp.0</td>
                                                        <td id="1-8-sumTotal">Rp.0</td>
                                                    </tr>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="col">
                                        <p class="mr-2 text-right">Kapasitas Normal Perbulan</p>
                                    </div>
                                    <div class="col-6 p-1">
                                        <div class="table-responsive table-responsive-sm">
                                            <table class="table table-bordered table-hover" style="font-size: 8pt">
                                                <thead class="">
                                                    <tr>
                                                        <th scope="col" class="text-nowrap pr-4">
                                                            <input type="text"
                                                                class="form-control kapasitasNormalPerbulan kapasitasNormalPerbulan-1-8"
                                                                placeholder="" name="kapasitasNormalPerbulan">
                                                        </th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="col">
                                        <p class="mr-2 text-right">Biaya Satuan Product</p>
                                    </div>
                                    <div class="col-6 p-1">
                                        <div class="table-responsive table-responsive-sm">
                                            <table class="table table-bordered table-hover" style="font-size: 8pt">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-nowrap pr-4" id="kdn-biaya-satuan-product-1-8">KDN</th>
                                                        <th scope="col" class="text-nowrap pr-4" id="kln-biaya-satuan-product-1-8">KLN</th>
                                                        <th scope="col" class="text-nowrap pr-4" id="total-biaya-satuan-product-1-8">Total
                                                        </th>
                                                    </tr>
                                                </thead>
                                            </table>
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
                                                        <th scope="col" class="text-nowrap pr-4 border align-middle" colspan="2" rowspan="2">Uraian</th>
                                                        <th colspan="3" class="border text-center">Biaya</th>
                                                        <th scope="col" class="text-nowrap pr-4 border align-middle" rowspan="2">TKDN %</th>
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
                <div class="card px-3 py-3 d-none" id="table-biaya-produksi-1-9">
                    <table class="table">
                        <thead class="bg-dark text-light border">
                            <tr>
                                <th colspan="2">Biaya Produksi</th>
                            </tr>
                        </thead>
                        <tbody id="tbody-10">
                            <tr>
                                <th><h4>TKDN %</h4></th>
                                <th><h3 id="BiayaProduksiFinalTkdn">0%</h3></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
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
            var rupiahInput = new AutoNumeric('.rupiahInput', {
                digitGroupSeparator: '.',
                decimalCharacter: ',',
                decimalPlaces: 2,
                minimumValue: '0'
            });

            var rupiahInput12 = new AutoNumeric('.biaya12', {
                digitGroupSeparator: '.',
                decimalCharacter: ',',
                decimalPlaces: 2,
                minimumValue: '0'
            });

            var rupiahInput13 = new AutoNumeric('.gaji_perbulan13', {
                digitGroupSeparator: '.',
                decimalCharacter: ',',
                decimalPlaces: 2,
                minimumValue: '0'
            });

            var rupiahInput14 = new AutoNumeric('.biaya_pengurusan_perbulan14', {
                digitGroupSeparator: '.',
                decimalCharacter: ',',
                decimalPlaces: 2,
                minimumValue: '0'
            });

            var rupiahInput15 = new AutoNumeric('.gaji_perbulan15', {
                digitGroupSeparator: '.',
                decimalCharacter: ',',
                decimalPlaces: 2,
                minimumValue: '0'
            });
            var biayaDepresiasiPerbulan16 = new AutoNumeric('.biayaDepresiasiPerbulan16', {
                digitGroupSeparator: '.',
                decimalCharacter: ',',
                decimalPlaces: 2,
                minimumValue: '0'
            });
            var biayaSewaPerbulan17 = new AutoNumeric('.biayaSewaPerbulan17', {
                digitGroupSeparator: '.',
                decimalCharacter: ',',
                decimalPlaces: 2,
                minimumValue: '0'
            });
            var biayaPerbulan18 = new AutoNumeric('.biayaPerbulan18', {
                digitGroupSeparator: '.',
                decimalCharacter: ',',
                decimalPlaces: 2,
                minimumValue: '0'
            });
            var tunjanganLainnya13 = new AutoNumeric('.tunjanganLainnya13', {
                digitGroupSeparator: '.',
                decimalCharacter: ',',
                decimalPlaces: 2,
                minimumValue: '0'
            });
        })
    </script>
    <script>
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
                                    "data": []
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
                                        bpjs: "{bpjs_percent}% * ({gaji_perbulan} >= 12000000 ? 12000000 : {gaji_perbulan}) * {jumlah_orang}",
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
                                    "data": []
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
                                calculations: calculations
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
            // $(window).on('beforeunload', function() {
            //     return "save terlebih dahulu data anda!";
            // });

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
            let jsonDraftCalculations = JSON.stringify(draftCalculations);

            // Menyimpan data di Local Storage dengan kunci tertentu
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

        function destroy(computation_id, calculation_id) {
            let computation = calculations.find(f => f.id == computation_id);
            let calculationIndex = computation.data.findIndex(f => f.id == calculation_id);

            // Jika calculation dengan id yang diberikan ditemukan
            if (calculationIndex !== -1) {
                // Hapus calculation dari array computation.data
                computation.data.splice(calculationIndex, 1);

                // Mengonversi objek menjadi string JSON
                let jsonDraftCalculations = JSON.stringify(draftCalculations);

                // Menyimpan data di Local Storage dengan kunci tertentu
                localStorage.setItem('draftCalculations', jsonDraftCalculations);

                reloadAllTable()

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
                let sumPdriPpn = formatToCurrency(calculation.sumPdriPpn);
                let sumPph = formatToCurrency(calculation.sumPph);
                let sumPdriTotal = formatToCurrency(calculation.sumPdriTotal);
                $('#sum-kdn').text(`${sumKdn}`)
                $('#sum-kln').text(`${sumKln}`)
                $('#sum-total').text(`${sumTotal}`)
                $('#sum-ppn').text(`${sumPpn}`)
                $('#sum-bm').text(`${sumBm}`)
                $('#sum-pdri-ppn').text(`${sumPdriPpn}`)
                $('#sum-pph').text(`${sumPph}`)
                $('#sum-pdri-total').text(`${sumPdriTotal}`)
                calculation.data.forEach(function(item, index) {
                    let row = "<tr>" +
                        `<td>
                            <div class="dropdown text-secondary">
                                <div id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">
                                    <svg xmlns="http://www.w3.org/2000/svg" stroke="gray" height="16" width="4" viewBox="0 0 128 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/></svg>
                            </div>
                                <div class="dropdown-menu"
                                    aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item buttonEditNews"
                                        onclick="edit(${item.id})"><i class="fa fa-edit"></i> Edit
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
                        "<td class='text-nowrap'>" + formatToCurrency(item.pdriPpnCalc) + "</td>" +
                        "<td class='text-nowrap'>" + formatToCurrency(item.pphCalc) + "</td>" +
                        "</tr>";

                    tbody.append(row);
                });
            } else if (tbodyId == "tbody-2") {
                const tbody = $(`#${tbodyId}`);
                tbody.empty();
                calculation = calculations.find(f => f.id == calculationId);
                calculation1 = calculations.find(f => f.id == 1);
                let sumLocalPpn12 = formatToCurrency(calculation1.sumPpn)
                let sumLocalKdn12 = formatToCurrency(calculation1.sumPpn)
                let sumLocalTotal12 = formatToCurrency(calculation1.sumPpn)
                let sumPdriTotal12 = formatToCurrency(calculation1.sumPdriTotal)
                let sumPdriKln12 = formatToCurrency(calculation1.sumPdriTotal)
                let sumPdri12 = formatToCurrency(calculation1.sumPdriTotal)
                let sumKdn = formatToCurrency(calculation.sumKdn)
                let sumKln = formatToCurrency(calculation.sumKln)
                let sumTotal = formatToCurrency(calculation.sumTotal)
                // let sumPpn = parseInt(calculation.sumPpn).toLocaleString()
                // let sumBm = parseInt(calculation.sumBm).toLocaleString()
                // let sumPdriPpn = parseInt(calculation.sumPdriPpn).toLocaleString()
                // let sumPph = parseInt(calculation.sumPph).toLocaleString()
                // let sumPdriTotal = parseInt(calculation.sumPdriTotal).toLocaleString()
                $(`#sumLocalPpn-1-2`).text(sumLocalPpn12)
                $(`#sumLocalKdn-1-2`).text(sumLocalKdn12)
                $(`#sumLocalTotal-1-2`).text(sumLocalTotal12)
                $(`#sumPdriTotal-1-2`).text(sumPdriTotal12)
                $(`#sumPdriKln-1-2`).text(sumPdriKln12)
                $(`#sumPdri-1-2`).text(sumPdri12)
                $(`#sumKdn-1-2`).text(formatToCurrency(((calculation.sumKdn ?? 0) + (calculation1.sumPpn ?? 0) + (
                    calculation1.sumPdriTotal ?? 0))))
                $(`#sumKln-1-2`).text(formatToCurrency((calculation.sumKln ?? 0)))
                $(`#sumTotal-1-2`).text(formatToCurrency(((calculation.sumKdn ?? 0) + (calculation1.sumPpn ?? 0)) + ((
                        calculation.sumKln ?? 0) +
                    (calculation1.sumPdriTotal ?? 0))));
                calculation.data.forEach(function(item, index) {
                    index = index + 2;
                    let row = "<tr>" +
                        `<td>
                            <div class="dropdown">
                                <div id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="4" viewBox="0 0 128 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/></svg>
                                </div>
                                <div class="dropdown-menu"
                                    aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item buttonEditNews"
                                        onclick="edit(${item.id})"><i class="fa fa-edit"></i> Edit
                                    </a>
                                    <button class="dropdown-item" type="submit" onclick="destroy(${calculation.id}, ${item.id})"><i
                                            class="fa fa-trash"></i> Delete</button>
                                </div>
                            </div>
                        </td>` +
                        "<td>" + (index + 1) + "</td>" +
                        "<td class='text-nowrap'>" + item.uraian + "</td>" +
                        "<td>" + item.produsen_tingkat_dua + "</td>" +
                        "<td>" + item.jumlah + "</td>" +
                        "<td>" + item.tkdn + "%</td>" +
                        "<td class='text-nowrap'>" + "Rp " + item.biaya + "</td>" +
                        "<td>" + item.alokasi + "%</td>" +
                        "<td class='text-nowrap'>" + formatToCurrency(item.kdn) + "</td>" +
                        "<td class='text-nowrap'>" + formatToCurrency(item.kln) + "</td>" +
                        "<td class='text-nowrap'>" + formatToCurrency(item.total) + "</td>" +
                        "</tr>";

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
                $(`#kdn-biaya-satuan-product-1-3`).text(formatToCurrency(calculation.sumKdn / parseCurrencyOrDecimal(
                    draftCalculations.find(f => f.computationId == computationId).kapasitasNormalPerbulan)))
                $(`#kln-biaya-satuan-product-1-3`).text(formatToCurrency(calculation.sumKln / parseCurrencyOrDecimal(
                    draftCalculations.find(f => f.computationId == computationId).kapasitasNormalPerbulan)))
                $(`#total-biaya-satuan-product-1-3`).text(formatToCurrency(calculation.sumTotal / parseCurrencyOrDecimal(
                    draftCalculations.find(f => f.computationId == computationId).kapasitasNormalPerbulan)))
                console.log(calculation);
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
                                    <a class="dropdown-item buttonEditNews"
                                        onclick="edit(${item.id})"><i class="fa fa-edit"></i> Edit
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
                $(`#1-4-sumJumlahOrang`).text(calculation.sumJumlahOrang)
                $(`#1-4-sumKdn`).text(formatToCurrency((calculation.sumKdn ?? 0) + (calculation3.sumBpjs ?? 0) + (calculation3.sumTunjanganLainnya ?? 0)))
                $(`#1-4-sumKln`).text(sumKln)
                $(`#1-4-sumTotal`).text(formatToCurrency((calculation.sumTotal ?? 0) + (calculation3.sumBpjs ?? 0) + (calculation3.sumTunjanganLainnya ?? 0)))
                $(`#sumBpjs-1-4-3`).text(formatToCurrency(calculation3.sumBpjs ?? 0))
                $(`#sumBpjsKdn-1-4-3`).text(formatToCurrency(calculation3.sumBpjs ?? 0))
                $(`#sumBpjsTotal-1-4-3`).text(formatToCurrency(calculation3.sumBpjs ?? 0))
                $(`#sumTunjanganLainnya-1-4-3`).text(formatToCurrency(calculation3.sumTunjanganLainnya ?? 0))
                $(`#sumTunjanganLainnyaKdn-1-4-3`).text(formatToCurrency(calculation3.sumTunjanganLainnya ?? 0))
                $(`#sumTunjanganLainnyaTotal-1-4-3`).text(formatToCurrency(calculation3.sumTunjanganLainnya ?? 0))
                $(`#kdn-biaya-satuan-product-1-4`).text(formatToCurrency(calculation.sumKdn / parseCurrencyOrDecimal(
                    draftCalculations.find(f => f.computationId == computationId).kapasitasNormalPerbulan)))
                $(`#kln-biaya-satuan-product-1-4`).text(formatToCurrency(calculation.sumKln / parseCurrencyOrDecimal(
                    draftCalculations.find(f => f.computationId == computationId).kapasitasNormalPerbulan)))
                $(`#total-biaya-satuan-product-1-4`).text(formatToCurrency(calculation.sumTotal / parseCurrencyOrDecimal(
                    draftCalculations.find(f => f.computationId == computationId).kapasitasNormalPerbulan)))
                console.log(calculation);
                calculation.data.forEach(function(item, index) {
                    let row = `<tr> +
                        <td>
                            <div class="dropdown">
                                <div id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="4" viewBox="0 0 128 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/></svg>
                                </div>
                                <div class="dropdown-menu"
                                    aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item buttonEditNews"
                                        onclick="edit(${item.id})"><i class="fa fa-edit"></i> Edit
                                    </a>
                                    <button class="dropdown-item" type="submit" onclick="destroy(${calculation.id}, ${item.id})"><i
                                            class="fa fa-trash"></i> Delete</button>
                                </div>
                            </div>
                        </td>
                        <td>${(index + 3)}</td>
                        <td class="text-nowrap"> ${item.uraian_posisi} </td>
                        <td> ${item.produsen_tingkat_dua} </td>
                        <td> ${item.tkdn}% </td>
                        <td> ${item.jumlah_orang} </td>
                        <td class="text-nowrap"> Rp ${item.biaya_pengurusan_per_bulan} </td>
                        <td> ${item.alokasi} "%</td>
                        <td class="text-nowrap"> ${formatToCurrency(item.kdn)} </td>
                        <td class="text-nowrap"> ${formatToCurrency(item.kln)} </td>
                        <td class="text-nowrap"> ${formatToCurrency(item.total)} </td>
                        </tr>`;

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
                $(`#kdn-biaya-satuan-product-1-5`).text(formatToCurrency(calculation.sumKdn / parseCurrencyOrDecimal(
                    draftCalculations.find(f => f.computationId == computationId).kapasitasNormalPerbulan)))
                $(`#kln-biaya-satuan-product-1-5`).text(formatToCurrency(calculation.sumKln / parseCurrencyOrDecimal(
                    draftCalculations.find(f => f.computationId == computationId).kapasitasNormalPerbulan)))
                $(`#total-biaya-satuan-product-1-5`).text(formatToCurrency(calculation.sumTotal / parseCurrencyOrDecimal(
                    draftCalculations.find(f => f.computationId == computationId).kapasitasNormalPerbulan)))
                console.log(calculation);
                calculation.data.forEach(function(item, index) {
                    let row = "<tr>" +
                        `<td>
                            <div class="dropdown">
                                <div id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="4" viewBox="0 0 128 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/></svg>
                                </div>
                                <div class="dropdown-menu"
                                    aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item buttonEditNews"
                                        onclick="edit(${item.id})"><i class="fa fa-edit"></i> Edit
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
                $(`#kdn-biaya-satuan-product-1-6`).text(formatToCurrency(calculation.sumKdn / parseCurrencyOrDecimal(
                    draftCalculations.find(f => f.computationId == computationId).kapasitasNormalPerbulan)))
                $(`#kln-biaya-satuan-product-1-6`).text(formatToCurrency(calculation.sumKln / parseCurrencyOrDecimal(
                    draftCalculations.find(f => f.computationId == computationId).kapasitasNormalPerbulan)))
                $(`#total-biaya-satuan-product-1-6`).text(formatToCurrency(calculation.sumTotal / parseCurrencyOrDecimal(
                    draftCalculations.find(f => f.computationId == computationId).kapasitasNormalPerbulan)))
                console.log(calculation);
                calculation.data.forEach(function(item, index) {
                    let row = `<tr> +
                        <td>
                            <div class="dropdown">
                                <div id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="4" viewBox="0 0 128 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/></svg>
                                </div>
                                <div class="dropdown-menu"
                                    aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item buttonEditNews"
                                        onclick="edit(${item.id})"><i class="fa fa-edit"></i> Edit
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
                $(`#kdn-biaya-satuan-product-1-7`).text(formatToCurrency(calculation.sumKdn / parseCurrencyOrDecimal(
                    draftCalculations.find(f => f.computationId == computationId).kapasitasNormalPerbulan)))
                $(`#kln-biaya-satuan-product-1-7`).text(formatToCurrency(calculation.sumKln / parseCurrencyOrDecimal(
                    draftCalculations.find(f => f.computationId == computationId).kapasitasNormalPerbulan)))
                $(`#total-biaya-satuan-product-1-7`).text(formatToCurrency(calculation.sumTotal / parseCurrencyOrDecimal(
                    draftCalculations.find(f => f.computationId == computationId).kapasitasNormalPerbulan)))
                console.log(calculation);
                calculation.data.forEach(function(item, index) {
                    let row = `<tr> +
                        <td>
                            <div class="dropdown">
                                <div id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="4" viewBox="0 0 128 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/></svg>
                                </div>
                                <div class="dropdown-menu"
                                    aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item buttonEditNews"
                                        onclick="edit(${item.id})"><i class="fa fa-edit"></i> Edit
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
                $(`#kdn-biaya-satuan-product-1-8`).text(formatToCurrency(calculation.sumKdn / parseCurrencyOrDecimal(
                    draftCalculations.find(f => f.computationId == computationId).kapasitasNormalPerbulan)))
                $(`#kln-biaya-satuan-product-1-8`).text(formatToCurrency(calculation.sumKln / parseCurrencyOrDecimal(
                    draftCalculations.find(f => f.computationId == computationId).kapasitasNormalPerbulan)))
                $(`#total-biaya-satuan-product-1-8`).text(formatToCurrency(calculation.sumTotal / parseCurrencyOrDecimal(
                    draftCalculations.find(f => f.computationId == computationId).kapasitasNormalPerbulan)))
                console.log(calculation);
                calculation.data.forEach(function(item, index) {
                    let row = `<tr> +
                        <td>
                            <div class="dropdown">
                                <div id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="4" viewBox="0 0 128 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/></svg>
                                </div>
                                <div class="dropdown-menu"
                                    aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item buttonEditNews"
                                        onclick="edit(${item.id})"><i class="fa fa-edit"></i> Edit
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
                let sumPpn12 = 0;
                let sumPdriTotal12 = 0;
                let sumBpjs13 = 0;
                let sumTunjanganLainnya13 = 0;
                calculations.forEach(function(item, index) {
                    if(index == 0) {
                        sumPpn12 = item.sumPpn;
                        sumPdriTotal12 = item.sumPdriTotal;
                    } else if(index == 2) {
                        sumBpjs13 = item.sumBpjs;
                        sumTunjanganLainnya13 = item.sumTunjanganLainnya;
                    }

                    if(index == 1) {
                        sumKdn19 += (item.sumKdn ?? 0) + (sumPpn12 ?? 0) + (sumPdriTotal12 ?? 0)
                    } else if(index == 3) {
                        sumKdn19 += (item.sumKdn ?? 0) + (sumBpjs13 ?? 0) + (sumTunjanganLainnya13 ?? 0)
                    } else {
                        sumKdn19 += item.sumKdn ?? 0;
                    }

                    sumKln19 += item.sumKln ?? 0;

                    if(index == 1) {
                        sumTotal19 += (item.sumTotal ?? 0) + (item.sumKdn ?? 0) + (sumPpn12 ?? 0) + (sumPdriTotal12 ?? 0);
                    } else if(index == 3) {
                        sumTotal19 += (item.sumTotal ?? 0) + (item.sumKdn ?? 0) + (sumBpjs13 ?? 0) + (sumTunjanganLainnya13 ?? 0);
                    } else {
                        sumTotal19 += item.sumTotal ?? 0;
                    }
                })

                calculations.forEach(function(item, index) {
                    if(index == 1) {
                        item.sumTotal = (item.sumKdn ?? 0) + (item.sumKln ?? 0) + (sumPpn12 ?? 0) + (sumPdriTotal12 ?? 0);
                        item.sumKdn = (item.sumKdn ?? 0) + (sumPpn12 ?? 0) + (sumPdriTotal12 ?? 0);
                    } else if(index == 3) {
                        item.sumTotal = (item.sumKdn ?? 0) + (item.sumKln ?? 0) + (sumBpjs13 ?? 0) + (sumTunjanganLainnya13 ?? 0);
                        item.sumKdn = (item.sumKdn ?? 0) + (sumBpjs13 ?? 0) + (sumTunjanganLainnya13 ?? 0);
                    }
                    let row = `<tr>
                        <td class="text-nowrap"> ${item.no} </td>
                        <td class="text-nowrap"> ${item.nama} </td>
                        <td class="text-nowrap"> ${formatToCurrency(item.sumKdn) ?? ("Rp " + 0 + ",00")} </td>
                        <td class="text-nowrap"> ${formatToCurrency(item.sumKln) ?? ("Rp " + 0 + ",00")} </td>
                        <td class="text-nowrap"> ${formatToCurrency(item.sumTotal) ?? ("Rp " + 0 + ",00")} </td>
                        <td class="text-nowrap"> ${((item.sumKdn ?? 0) / sumTotal19 * 100).toFixed(2)}% </td>
                        </tr>`;

                    tbody.append(row);
                });

                $("#sumKdn-1-9").text(formatToCurrency(sumKdn19));
                $("#sumKln-1-9").text(formatToCurrency(sumKln19));
                $("#sumTotal-1-9").text(formatToCurrency(sumTotal19));
                $("#sumTkdn-1-9").text((sumKdn19 / sumTotal19 * 100).toFixed(2) + "%");
            } else if (tbodyId == "tbody-10") {
                const tbody = $(`#${tbodyId}`);
                let sumKdn19 = 0;
                let sumKln19 = 0;
                let sumTotal19 = 0;
                calculations.forEach(function(item, index) {
                    sumKdn19 += item.sumKdn ?? 0;
                    sumKln19 += item.sumKln ?? 0;
                    sumTotal19 += item.sumTotal ?? 0;
                })

                $("#BiayaProduksiFinalTkdn").text((sumKdn19 / sumTotal19 * 100).toFixed(2) + "%");
            }
        }

        function reloadAllTable() {
            $(".kapasitasNormalPerbulan").val(draftCalculations.find(f => f.computationId == computationId).kapasitasNormalPerbulan);

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
                } else if (dimilikiValue == "Luar Negeri" && dibuatValue == "Luar Negeri") {
                    $("#tkdn-1-6").val("0");
                } else {
                    $("#tkdn-1-6").val("75");
                }
            });

            $("#dibuat-1-6").on("change", () => {
                let dimilikiValue = $("#dimiliki-1-6").val();
                let dibuatValue = $("#dibuat-1-6").val();

                if (dimilikiValue == "Dalam Negeri" && dibuatValue == "Dalam Negeri") {
                    $("#tkdn-1-6").val("100");
                } else if (dimilikiValue == "Luar Negeri" && dibuatValue == "Luar Negeri") {
                    $("#tkdn-1-6").val("0");
                } else {
                    $("#tkdn-1-6").val("75");
                }
            });

            $("#dimiliki-1-7").on("change", () => {
                let dimilikiValue = $("#dimiliki-1-7").val();
                let dibuatValue = $("#dibuat-1-7").val();

                if (dimilikiValue == "Dalam Negeri" && dibuatValue == "Dalam Negeri") {
                    $("#tkdn-1-7").val("100");
                } else if (dimilikiValue == "Luar Negeri" && dibuatValue == "Luar Negeri") {
                    $("#tkdn-1-7").val("0");
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
                } else {
                    $("#tkdn-1-7").val("75");
                }
            });

            $(".replaceDot").on("keyup", (event) => {
                let number = $(event.currentTarget).val();
                let output = number.replace(/\./g, ",");

                $(event.currentTarget).val(output);
            })

            $(".nav-link").on("click", (event) => {
                if($(event.currentTarget).attr("id") == "v-rekapitulasi-tab") {
                    $("#table-biaya-produksi-1-9").removeClass("d-none");
                } else {
                    $("#table-biaya-produksi-1-9").addClass("d-none");
                }
            })
        })
    </script>
    // {{-- <script src="{{ asset('dist/js/users/script.js') }}"></script> --}}
@endpush
