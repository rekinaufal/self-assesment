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
                            <button class="btn btn-primary">Permenperin 16</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="text-dark h6">
                            <tr class="spaceUnder">
                                <td>Hasil Produksi</td>
                                <td width="10">:</td>
                                <td></td>
                            </tr>
                            <tr class="spaceUnder">
                                <td>Jenis Produk</td>
                                <td>:</td>
                                <td></td>
                            </tr>
                            <tr class="spaceUnder">
                                <td>Spesifikasi</td>
                                <td>:</td>
                                <td></td>
                            </tr>
                            <tr class="spaceUnder">
                                <td>Merek & Tipe</td>
                                <td>:</td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">.1..</div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">.2..</div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">.3..</div>
                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">.4..</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="form-group p-2">
                        <a href="#" class="btn btn-success btn-block">Selanjutnya ></a>
                    </div>
                    <div class="form-group p-2">
                        <a href="#" class="btn btn-danger flex-grow-1 btn-block">Hapus </a>
                    </div>
                </div>
                <div class="card">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link text-dark" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                            <button class="btn-primary">1.1</button>
                            Bahan Baku
                        </a>
                        <a class="nav-link text-dark" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                            <button class="btn-primary">1.2</button>
                            Jasa Terkait Bahan Baku
                        </a>
                        <a class="nav-link text-dark" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                            <button class="btn-primary">1.3</button>
                            Tenaga Kerja Langsung
                        </a>
                        <a class="nav-link text-dark" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                            <button class="btn-primary">1.4</button>
                            Biaya Tenaga Kerja Langsung
                        </a>
                        <a class="nav-link text-dark" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                            <button class="btn-primary">1.5</button>
                            Tenaga Kerja Tidak Langsung
                        </a>
                        <a class="nav-link text-dark" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                            <button class="btn-primary">1.6</button>
                            Mesin Yang Dimiliki Sendiri
                        </a>
                        <a class="nav-link text-dark" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                            <button class="btn-primary">1.7</button>
                            Mesin Yang Sewa
                        </a>
                        <a class="nav-link text-dark" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                            <button class="btn-primary">1.8</button>
                            Overhead Yang Lainnya
                        </a>
                        <a class="nav-link text-dark" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
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
    {{-- <script src="{{ asset('dist/js/users/script.js') }}"></script> --}}
@endpush