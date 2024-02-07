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
                    <h4>Selamat Datang {{ $user->user_profile->fullname }}</h4>
                    <p>Beranda</p>
                </div>
            </div>
            <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <div class="form-group">
                        <label id="news-filter-selected" class="mr-3">No filter</label>
                        <input type="month" id="news-filter" class="h-auto" style="width: 23px; transform: scale(1.3)">
                    </div>
                    {{-- <select disabled id="news-filter-selected"
                        class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius">
                        <option selected>No Filter</option>
                    </select> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- *************************************************************** -->
        <!-- Start First Cards -->
        <!-- *************************************************************** -->
        <div class="news-content">
            <div class="card-group">
                @foreach ($news as $item)
                    <a class="" href="{{ $item->link }}" style="text-decoration: none; color :#7c8798">
                        <div class="card border-right" style="margin-right: 20px; min-width: 300px; max-width: 350px;">
                            <div class="card-body content">
                                <div style="min-height : 50px;">
                                    <p>{{ $item->title }}</p>
                                </div>
                                <img class="card-img-top" style="border-radius:8px; object-fit: cover;" height="150"
                                    width="100" src="{{ asset($item->getThumbnailPath()) }}" alt="Card image cap">
                                <br><br>
                                {{-- <p class="card-text" style="word-wrap:break-all;"> --}}
                                    {!! Str::limit($item->description, 100, ' ...') !!}
                                {{-- </p> --}}
                                <div class="row d-flex align-items-center">
                                    <div class="col-3">
                                        <span style="font-size: 0.7rem" class="">Sumber
                                            :&nbsp;</span>
                                    </div>
                                    <div class="col-9 text-right" style="word-break: break-all"><i class="mt-2"
                                            style="font-size: 0.7rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; display: inline-block; max-width: 100%;">{{ $item->link }}</i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
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
                                                                <th>Jenis Produksi</th>
                                                                <th>Merk & Tipe</th>
                                                                {{-- <th>File</th> --}}
                                                                <th>Aksi</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $i = 1;
                                                            @endphp
                                                            @forelse ($computations as $computation)
                                                                <tr>
                                                                    <td align="center">{{ $i++ }}</td>
                                                                    <td>
                                                                        {{ $computation->product_type }}
                                                                    </td>
                                                                    <td>
                                                                        {{ $computation->brand }}
                                                                    </td>
                                                                    {{-- <td align="center"> <i data-feather="file"></i> <i
                                                                            data-feather="file-text"></i></td> --}}
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
                                                                                <a class="dropdown-item"
                                                                                    href="{{ route('exportPdfComputation', $computation) }}">
                                                                                    <i data-feather="file"></i> Pdf
                                                                                </a>
                                                                                <a class="dropdown-item"
                                                                                    href="{{ url('/exportExcelComputation', $computation) }}">
                                                                                    <i data-feather="file-text"></i> Xlsx
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td align="center">
                                                                        @if ($computation->status == 'Finished')
                                                                            <span class="badge badge-pill badge-success">
                                                                                Finished
                                                                            </span>
                                                                        @else
                                                                            <button class="btn btn-sm btn-warning">
                                                                                Tinjau
                                                                            </button>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            @empty
                                                                <tr>
                                                                    <td colspan="6">
                                                                        <div class="text-center">
                                                                            Belum Ada File Perhitungan!
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforelse
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
    <script src="{{ asset('library/moment/min/moment.min.js') }}"></script>
    <script type="text/javascript">
        var news_data = [];
        var loadedData = [];
        var itemsPerPage = 6;
        // var data = JSON.parse(`{!! $news !!}`);
        var data = {!! json_encode($news) !!};
        console.log('data', data);
        // var dataImage = JSON.parse(`{!! $news !!}`);
        var dataImage = {!! json_encode($news) !!};
        var buttonLoad = document.getElementById('loadMore');

        function convertDateString(dateString) {
            if (!dateString || dateString.trim() === '') {
                return 'No filter';
            }
            const dateArray = dateString.split('-');
            const year = parseInt(dateArray[0], 10);
            const month = parseInt(dateArray[1], 10);
            const dateObject = new Date(year, month - 1);
            const formattedDate = dateObject.toLocaleString('en-us', {
                month: 'long',
                year: 'numeric'
            });

            return formattedDate;
        }

        $('#news-filter').change(function() {
            var selected_item = this.value;

            //set informasi filter yang di set
            var selectElement = $('#news-filter-selected');
            selectElement.empty();
            selectElement.append($('<option>', {
                text: `${convertDateString(selected_item)}`,
                value: ''
            }));

            doAjax(selected_item);
        });

        function doAjax(param) {
            var requestData = {
                filterName: param
            };
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/filter-news-dashboard-user',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(requestData),
                success: function(response) {
                    console.log('Success:', response);
                    data = response;
                    console.log('data suc:', data);
                    news_data = [];
                    console.log('news_data suc:', news_data);
                    loadedData = [];
                    redrawNewsData(response)
                    $('#loadMore').click();
                    //generateCallback();
                    // loadData(news_data);
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        }

        function redrawNewsData(newsList) {
            var parentNewsEls = document.getElementsByClassName('card-group');
            for (var i = 0; i < parentNewsEls.length; i++) {
                var parentNewsEl = parentNewsEls[i];
                while (parentNewsEl.firstChild) {
                    parentNewsEl.removeChild(parentNewsEl.firstChild);
                }
            }
            for (var j = 0; j < newsList.length; j++) {
                console.log(newsList[j]);
                var content = document.createElement('div');
                content.innerHTML = `
                        <a class="" href="${newsList[j].link}" style="text-decoration: none; color :#7c8798">
                        <div class="card border-right" style="margin-right: 20px; min-width: 300px; max-width: 350px;">
                            <div class="card-body content">
                                <div style="min-height : 50px;">
                                    <p>${newsList[j].title}</p>
                                </div>
                                <img class="card-img-top" style="border-radius:8px; object-fit: cover;" height="150"
                                    width="100" src="uploads/${newsList[j].thumbnail}" alt="Card image cap">
                                <br><br>
                                ${newsList[j].description.length > 100 ?
                                    `<p class="card-text" style="word-wrap: break-word;">${newsList[j].description.substring(0, 100)}...</p>` :
                                    `<p class="card-text" style="word-wrap: break-word;">${newsList[j].description}</p>`}
                                <div class="row d-flex align-items-center">
                                    <div class="col-3">
                                        <span style="font-size: 0.7rem" class="" >Sumber
                                            :&nbsp;</span>
                                    </div>
                                    <div class="col-9 text-right" style="max-height: 20px; word-break: break-all"><i class="mt-2"
                                            style="font-size: 0.7rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; display: inline-block; max-width: 100%;">${newsList[j].link} </i></div>
                                </div>
                            </div>
                        </div>
                    </a>
                    `;
                parentNewsEl.appendChild(content);
            }
        }



        function createFilterElement() {
            var date = new Date();
            var latest_date = moment(date);

            var selectElement = $('#news-filter');

            selectElement.empty();
            selectElement.append($('<option>', {
                text: 'No filter',
                value: ''
            }));

            for (var i = 0; i < 3; i++) {
                var optionValue = latest_date.format('YYYY-MM');
                var optionText = latest_date.format('MMM YY');
                selectElement.append($('<option>', {
                    value: optionValue,
                    text: optionText
                }));

                latest_date.subtract(1, 'months');
            }
        };

        function generateCallback() {
            console.log("news", news_data);
            for (var i = 0; i < data.length; i++) {
                var imageUrl = '{{ $news[0]->getThumbnailPath() }}'.replace('[0]', `[${i}]`);
                var items = {
                    "id": data[i].id,
                    "title": data[i].title,
                    "url-image": imageUrl,
                    "desc": data[i].description,
                    "link-detail": data[i].link
                };
                news_data.push(items);
            }
            loadData(news_data);
        }
        document.addEventListener('DOMContentLoaded', function() {
            createFilterElement();
            buttonLoad.addEventListener('click', function() {
                loadData(news_data);
            });
            //generateCallback();
        });

        function loadData(arrData) {
            var parentNewsEls = document.getElementsByClassName('news-content');
            parentNewsEls.innerHTML = '';
            // var elementsArray = Array.from(parentNewsEls);

            // // Remove all child elements for each 'news-content' element
            // elementsArray.forEach(function(element) {
            //     while (element.firstChild) {
            //         element.removeChild(element.firstChild);
            //     }
            // });
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
    </script>
@endpush
