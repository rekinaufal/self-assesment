@extends('layouts.app')

@section('title', 'Perhitungan Data')

@push('style')
    <link href="{{ asset('assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
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
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#create-perhitungan">
                                            <i class="fas fa-plus"></i>
                                            Tambah Perhitungan
                                        </a>
                                        
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
    <div class="modal fade" id="create-perhitungan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body m-4">
                    <table class="w-100">
                        <tr>
                            <td>
                                <select name="" id="" class="form-control">
                                    <option value="">-- pilih permenperin --</option>
                                </select>
                            </td>
                        </tr>
                        <tr><td>&nbsp;</td></tr>
                    </table>
                    <table>
                        <tr>
                            <td class="w-25">Hasil Produksi</td>
                            <td>:</td>
                            <td class="w-75">
                                <input type="email" class="form-control flex-grow-1 ml-2" id="hasil_produksi" placeholder="Hasil">
                            </td>
                        </tr>
                        <tr><td>&nbsp;</td></tr>
                        <tr>
                            <td>Jenis Produksi</td>
                            <td>:</td>
                            <td>
                                <input type="email" class="form-control ml-2" id="jenis_produksi" placeholder="Jenis">
                            </td>
                        </tr>
                        <tr><td>&nbsp;</td></tr>
                        <tr>
                            <td>Spesifikasi</td>
                            <td>:</td>
                            <td>
                                <input type="email" class="form-control flex-grow-1 ml-2" id="spesifikasi" placeholder="Spesifikasi">
                            </td>
                        </tr>
                        <tr><td>&nbsp;</td></tr>
                        <tr>
                            <td>Merk & Tipe</td>
                            <td>:</td>
                            <td>
                                <input type="email" class="form-control flex-grow-1 ml-2" id="merk_tipe" placeholder="Merk & Tipe">
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <button class="btn btn-primary btn-md center-block" Style="width: 100px;" class="close" data-dismiss="modal"aria-hidden="true">Batal</button>
                            <a class="btn btn-danger btn-md center-block" Style="width: 100px;" href="{{ route('computation.create') }}">Simpan</a>
                        </div>
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
