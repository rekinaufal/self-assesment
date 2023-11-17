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

        /* select {
                                                                                                                                                                                                                                    -webkit-appearance: none;
                                                                                                                                                                                                                                    -moz-appearance: none;
                                                                                                                                                                                                                                    text-indent: 1px;
                                                                                                                                                                                                                                    text-overflow: "";
                                                                                                                                                                                                                                } */

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

                        @if (request('type-create') == 'get')
                            <div class="form-gorup">
                                <label>Pilih Perhitungan</label>
                                <select name="computation_id" class="form-control">
                                    @if (count($computation) > 0)
                                        @foreach ($computation as $item)
                                            <option value="">{{ $item->id }}</option>
                                        @endforeach
                                    @else
                                        <option value="">Empty data</option>
                                    @endif
                                </select>
                            </div>
                        @endif
                        <div class="form-gorup">
                            <label>Nama Perusahaan</label>
                            <input type="text" class="form-control" name="company_name"
                                {{ request('type-create') == 'get' ? 'readonly' : '' }}>
                        </div>
                        <div class="form-gorup">
                            <label>Jenis Produk</label>
                            <input type="text" class="form-control" name="type_product"
                                {{ request('type-create') == 'get' ? 'readonly' : '' }}>
                        </div>
                        <div class="form-gorup">
                            <label>Tipe Produk</label>
                            <input type="text" class="form-control" name="type_product"
                                {{ request('type-create') == 'get' ? 'readonly' : '' }}>
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
                    <div class="card-body">
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
                                <ul class="ccontent">
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
                            <div class="tab-pane fade" id="tenaga-kerja" role="tabpanel"
                                aria-labelledby="tenaga-kerja-tab">
                                <div class="form-group addinfo">
                                    <label for="exampleFormControlTextarea1">Write additional info.</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </div>
                            <!-- overhead -->
                            <div class="tab-pane fade third" id="overhead" role="tabpanel"
                                aria-labelledby="overhead-tab">
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
            <div class="col-12">
                <div class="card p-2">
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-warning mr-2">Reset</button>
                        <button class="btn btn-success">Simpan</button>
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
    <script>
        var data = <?= json_encode($needs) ?>;

        $(document).ready(function() {
            if (JSONParser()) {
                renderData(data);
            }
        });

        function JSONParser() {
            if (data) {
                data = '[' + data + ']';
                data = JSON.parse(data);
                console.log(data);
                return true;
            }
            return false;
        }

        function renderData(val) {
            var div = $('#form-content');

            $.each(data[0], function(key, value) {
                var i = 1;
                if (key.includes('form_')) {
                    var formData = value;
                    var hasTabProperty = Object.keys(formData).some(function(prop) {
                        return prop.includes('tab_');
                    });

                    if (!hasTabProperty) {
                        var newDiv = $(
                            '<div class="col-6">' +
                            '</div>');
                        var cardDiv = $(
                            '<div class="card">' +
                            '<div class="card-header bg-transparent">' +
                            '<h4 class="card-title">' + formData.name + '</h4>' +
                            '<p class="h6">PERUSAHAAN PEMOHON (BRAND OWNER)</p>' +
                            '</div>' +
                            '</div>');
                        var cardBody = $('<div class="card-body">' +
                            '</div>');
                        for (var i = 1; formData['data_' + i]; i++) {
                            var data = formData['data_' + i];
                            var isElRequired = data.is_required ?
                                '<button type="button" class="btn btn-outline-danger mr-2 flex-grow-1 text-left">' :
                                '<button type="button" class="btn btn-outline-dark mr-2 flex-grow-1 text-left">';
                            var divContent = $(
                                '<div class="form-group d-flex align-items-center">' + isElRequired +
                                '<i class="' + data.icon + '"> &nbsp;</i>' + data.name +
                                '</button>' +
                                '<div class="mr-2">' +
                                '<a data-toggle="tooltip" title="' + data.tooltip + '">' +
                                '<span class="icon-question"></span>' +
                                '</a>' +
                                '</div>' +
                                '<div class="mr-2">' +
                                '<input type="checkbox" name="profil_perusahaan" class="checkbox-round">' +
                                '</div>'
                            );
                            cardBody.append(divContent);
                        }
                        cardDiv.append(cardBody);
                        newDiv.append(cardDiv);
                        div.append(newDiv);
                    } else {
                        // console.log("has tab :", formData);
                        var newDiv = $(
                            '<div class="col-6">' +
                            '</div>');
                        var cardDiv = $(
                            '<div class="card">' +
                            '<div class="card-header bg-transparent">' +
                            '<h4 class="card-title">' + formData.name + '</h4>' +
                            '</div>' +
                            '</div>');
                        var elListTab = $(` <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist"
                            style="font-size: 11px">
                            
                        </ul>`);
                        var tabContent = $(`<div class="tab-content" id="pills-tabContent p-3">
                            </div>`);
                        for (var i = 1; formData['tab_' + i]; i++) {
                            var tabData = formData['tab_' + i];
                            var listTab = `
                                <li class="nav-item">
                                    <a class="nav-link ${tabData.id === 1? 'active' : '' }" id="${tabData.id}" data-toggle="pill" href="#tab-${tabData.id}"
                                        role="tab" aria-controls="tab-${tabData.id}" aria-selected="true">${tabData.name}</a>
                                </li>
                            `;
                            elListTab.append(listTab);
                            var listContent = $(`
                            <div class="ml-2 tab-pane fade ${tabData.id === 1? 'show active' : '' }" id="tab-${tabData.id}" role="tabpanel"
                                aria-labelledby="bahan-baku-tab">
                            </div>
                            `);
                            var elListContent = $(`
                            <ul class="ccontent">

                            </ul>
                            `);

                            for (var x = 1; tabData['data_' + x]; x++) {
                                var data_value = tabData['data_' + x];
                                console.log(data_value);
                                var dataContent = $(`
                                <div class="form-group d-flex align-items-center">
                                        <button type="button"
                                            class="btn btn-outline-danger mr-2 flex-grow-1 text-left h6">
                                            <i class="far fa-file"></i> ${data_value.name}
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
                                `);
                                elListContent.append(dataContent);
                                listContent.append(elListContent);
                                tabContent.append(listContent);
                            }
                        }
                        cardDiv.append(elListTab);
                        cardDiv.append(tabContent);
                        newDiv.append(cardDiv);
                        div.append(newDiv);
                    }
                }

            });

            console.log(val.length);
        }
    </script>
@endpush
