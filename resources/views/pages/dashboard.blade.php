@extends('layouts.app')

@section('title', 'General Dashboard')

@push('style')
    <link href="{{ asset('assets/libs/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <style>
        /* Button style */
        #loadMore {
            background-color: #007bff;
            /* Background color */
            color: #fff;
            /* Text color */
            border: none;
            /* Remove border */
            padding: 10px 20px;
            /* Padding for the button */
            cursor: pointer;
            /* Change cursor to pointer on hover */
        }

        /* Hover effect */
        #loadMore:hover {
            background-color: #0056b3;
            /* Change background color on hover */
        }

        /* Add a box shadow on hover (optional) */
        #loadMore:hover {
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        }

        /* Rounded corners (optional) */
        #loadMore {
            border-radius: 5px;
        }

        /* Disable button style */
        #loadMore:disabled {
            background-color: #ccc;
            /* Change color when disabled */
            cursor: not-allowed;
            /* Change cursor to not-allowed when disabled */
        }
    </style>
@endpush

@section('main')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                {{-- <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Good Morning Jason!</h3> --}}
                <div class="align-items-center">
                    <h4>Selamat Datang {{ $user->fullname }}</h4>
                    <p>Beranda</p>
                </div>
            </div>
            <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <select
                        class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius">
                        <option selected>Aug 19</option>
                        <option value="1">July 19</option>
                        <option value="2">Jun 19</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- *************************************************************** -->
        <!-- Start First Cards -->
        <!-- *************************************************************** -->
        <div class="news-content">
        </div>
        <div class="text-center">
            <button id="loadMore">Load More</button>
        </div>
        <hr>

        {{-- File perhitungan pengguna --}}
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start">
                            <h4 class="card-title mb-0">File perhitungan pengguna</h4>
                            <div class="ml-auto">
                            </div>
                        </div>
                        <div class="pl-4 mb-5">
                            <div class="position-relative" style="height: 315px;">
                                <!-- basic table -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table id="zero_config"
                                                        class="table table-striped table-bordered no-wrap">
                                                        <thead>
                                                            <tr align="center">
                                                                <th>No</th>
                                                                <th>Pengguna</th>
                                                                <th>File</th>
                                                                <th>Aksi</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td align="center">1</td>
                                                                <td>Bambang</td>
                                                                <td align="center"> <i data-feather="file"></i> <i
                                                                        data-feather="file-text"></i></td>
                                                                <td>
                                                                    <div class="dropdown sub-dropdown">
                                                                        <button
                                                                            class="d-flex btn btn-link text-muted dropdown-toggle"
                                                                            type="button" id="dd1"
                                                                            data-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="false">
                                                                            <i data-feather="download"> </i>
                                                                            <p>&nbsp;&nbsp;&nbsp;Unduh</p>
                                                                        </button>
                                                                        <div class="dropdown-menu dropdown-menu-right"
                                                                            aria-labelledby="dd1">
                                                                            <a class="dropdown-item" href="#">
                                                                                <i data-feather="file"></i>&nbsp;&nbsp;
                                                                                Pdf</a>
                                                                            <a class="dropdown-item" href="#">
                                                                                <i data-feather="file-text"></i>&nbsp;&nbsp;
                                                                                Xlsx</a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td align="center"><button
                                                                        class="btn btn-sm btn-warning">Tinjau</button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center">2</td>
                                                                <td>Pamungkas</td>
                                                                <td align="center"> <i data-feather="file"></i> <i
                                                                        data-feather="file-text"></i></td>
                                                                <td>
                                                                    <div class="dropdown sub-dropdown">
                                                                        <button
                                                                            class="d-flex btn btn-link text-muted dropdown-toggle"
                                                                            type="button" id="dd1"
                                                                            data-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="true">
                                                                            <i data-feather="download"></i>
                                                                            <p>&nbsp;&nbsp;&nbsp;Unduh</p>
                                                                        </button>
                                                                        <div class="dropdown-menu dropdown-menu-right"
                                                                            aria-labelledby="dd1">
                                                                            <a class="dropdown-item" href="#">
                                                                                <i
                                                                                    data-feather="file"></i>&nbsp;&nbsp;Pdf</a>
                                                                            <a class="dropdown-item" href="#">
                                                                                <i
                                                                                    data-feather="file-text"></i>&nbsp;&nbsp;Xlsx</a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td align="center"><button
                                                                        class="btn btn-sm btn-warning">Tinjau</button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center">3</td>
                                                                <td>Jamal</td>
                                                                <td align="center"> <i data-feather="file"></i> <i
                                                                        data-feather="file-text"></i></td>
                                                                <td>
                                                                    <div class="dropdown sub-dropdown">
                                                                        <button
                                                                            class="d-flex btn btn-link text-muted dropdown-toggle"
                                                                            type="button" id="dd1"
                                                                            data-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="true">
                                                                            <i data-feather="download"></i>
                                                                            <p>&nbsp;&nbsp;&nbsp;Unduh</p>
                                                                        </button>
                                                                        <div class="dropdown-menu dropdown-menu-right"
                                                                            aria-labelledby="dd1">
                                                                            <a class="dropdown-item" href="#">
                                                                                <i
                                                                                    data-feather="file"></i>&nbsp;&nbsp;Pdf</a>
                                                                            <a class="dropdown-item" href="#">
                                                                                <i
                                                                                    data-feather="file-text"></i>&nbsp;&nbsp;Xlsx</a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td align="center"><button
                                                                        class="btn btn-sm btn-warning">Tinjau</button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot>
                                                            {{-- <tr>
                                                                <th>No</th>
                                                                <th>Pengguna</th>
                                                                <th>File</th>
                                                                <th>Aksi</th>
                                                                <th>Status</th>
                                                            </tr> --}}
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-inline text-center mt-4 mb-0">
                                <li class="list-inline-item text-muted font-italic">Earnings for this month</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@push('scripts')
    <script src="{{ asset('assets/libs/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('dist/js/pages/dashboards/dashboard1.min.js') }}"></script>
    <script type="text/javascript">
        var news_data = [{
            "id": 1,
            "title": "Judul Berita",
            "url-image": "{{ asset('assets/images/big/1.jpg') }}",
            "desc": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sodales non magna lobortis vestibulum. Mauris nec ante vel sapien porttitor viverra. Fusce sit amet ullamcorper mi, a luctus tortor. Cras.",
            "link-detail": "news/id/detail"
        }, ];
        var loadedData = [];
        var itemsPerPage = 6;
        var data = JSON.parse(`{!! $newsData !!}`);
        var dataImage = JSON.parse(`{!! $newsData !!}`);
        document.addEventListener('DOMContentLoaded', function() {
            console.log("data", data)
            for (var i = 0; i < data.length; i++) {
                var imageUrl = '{{ $newsData[0]->getThumbnailPath() }}'.replace('[0]', `[${i}]`);
                var items = {
                    "id": data[i].id,
                    "title": data[i].title,
                    "url-image": imageUrl,
                    "desc": data[i].description,
                    "link-detail": data[i].link
                };
                news_data.push(items);
            }
            console.log("news", news_data)
            loadData(news_data);
            var buttonLoad = document.getElementById('loadMore');
            buttonLoad.addEventListener('click', function() {
                loadData(news_data);
            });


            function loadData(arrData) {
                var parentNewsEls = document.getElementsByClassName('news-content');
                var newsItems = arrData.slice(loadedData.length, loadedData.length + itemsPerPage);
                for (var i = 0; i < parentNewsEls.length; i++) {
                    var parentNewsEl = parentNewsEls[i];

                    if (newsItems.length === 0) {
                        buttonLoad.style.display = 'none';
                        return;
                    }
                    var parentCardGroup = document.createElement('div');
                    parentCardGroup.className = 'card-group ';
                    parentNewsEl.appendChild(parentCardGroup);

                    for (var j = 0; j < newsItems.length; j++) {
                        if (j % 3 === 0) {
                            var parentCardGroup = document.createElement('div');
                            parentCardGroup.className = 'card-group ';
                            parentNewsEl.appendChild(parentCardGroup);
                        }
                        var newsItem = newsItems[j];

                        var card = document.createElement('div');
                        card.className = 'card border-right';
                        card.style.marginRight = '20px';
                        card.style.minWidth = '300px';
                        card.style.maxWidth = '350px';

                        card.innerHTML = `
                            <div class="card-body content">
                                <div style="min-height : 50px;">
                                    <p>${newsItem.title}</p>
                                </div>
                                <img class="card-img-top" style="border-radius:8px; object-fit: cover;" height="150" width="100" src="${newsItem['url-image']}" alt="Card image cap">
                                <br/><br/>
                                <p class="card-text" style="word-wrap:break-all;">
                                ${newsItem.desc}
                                </p>
                                <a class="button-goto w-100 d-flex justify-content-end" href="${newsItem['link-detail']}">Link</a>
                            </div>`;

                        parentCardGroup.appendChild(card);
                    }
                }
                loadedData = loadedData.concat(newsItems);
                $('#loadMore').click();
            }
        });
    </script>
@endpush
