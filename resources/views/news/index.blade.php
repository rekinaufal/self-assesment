@extends('layouts.app')

@section('title', 'News Data')

@push('style')
@endpush

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card pb-5">
                    <div class="card-body pb-0">
                        <div class="">
                            <div class="title">
                                <h4 class="card-title">{{ $pageTitle }} Data</h4>
                            </div>
                            <div class="content d-flex flex-column flex-md-row pt-3">
                                <div class="form-group d-flex w-100 align-items-center">
                                    <div class="form-input mr-3">
                                        <input type="date" class="h-auto" style="width: 25px; transform: scale(1.3)">
                                    </div>
                                    <div class="input-group w-100 w-md-50 w-xl-25">
                                        <input type="text" class="form-control" placeholder="Search News"
                                            aria-label="Search News" aria-describedby="button-search">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="button-search">
                                                <i data-feather="search" class="feather-icon" style="cursor: pointer;"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="button-group d-flex h-auto align-items-center">
                                    <div class="dropdown mr-2">
                                        <button class="btn btn-light dropdown-toggle d-none" type="button"
                                            id="dropdownSelectedAction" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Selected Action
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownSelectedAction">
                                            <button class="btn-sm px-lg-3 py-lg-2 text-nowrap dropdown-item" id="checkAll">
                                                <i class="fa fa-check mr-3"></i>select all news
                                            </button>
                                            <button class="btn-sm px-lg-3 py-lg-2 text-nowrap dropdown-item"
                                                id="uncheckAll">
                                                <i class="fa fa-times-circle mr-3"></i>unselect news
                                            </button>
                                            <form action="{{ route('news.deletedBatch') }}" method="post"
                                                id="formDeleteBatch">
                                                @csrf
                                                <input type="hidden" name="delete_ids" id="newsWantDelete" />
                                                <button type="button"
                                                    class="btn-sm px-lg-3 py-lg-2 text-nowrap dropdown-item"
                                                    style="height: min-content" id="deleteSelectedNews">
                                                    <i class="fa fa-trash mr-3"></i>delete selected news
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    {{-- <a href="{{ route('roles.create') }}"
                                        class="btn btn-danger btn-sm px-lg-3 py-lg-2 mb-1 mr-2 text-nowrap"
                                        style="height: min-content">
                                        Delete<i class="fa fa-trash ml-3"></i>
                                    </a> --}}
                                    <a href="#"
                                        class="btn btn-primary btn-sm px-lg-3 py-lg-2 mb-1 text-nowrap rounded-circle d-flex justify-content-center align-items-center"
                                        style="height: min-content; aspect-ratio:1" data-toggle="modal"
                                        data-target="#createNewsModal">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="float-right d-flex">
                            @can('user-excel')
                                <div class="input-group">
                                    <a href="{{ url('/exportExcelUsers') }}" class="btn btn-sm btn-success mb-1 mx-2 text-nowrap d-flex align-items-center">
                                        Export Excel
                                        <i class="fas fa-file-excel fa-sm"></i>
                                    </a>
                                </div>
                            @endcan
                        </div> --}}
                    </div>
                    <hr>
                    <div id="news" class="row px-4 pt-3">
                        @foreach ($news as $newsItem)
                            <div class="col-12 col-md-6 col-xl-4">

                                <div class="card" style="box-shadow: 0 0 20px -10px black">
                                    <div class="card-header bg-transparent d-flex h-auto w-100 justify-content-between">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input checkbox-news"
                                                style="transform: scale(1.4); cursor: pointer;"
                                                data-id="{{ $newsItem->id }}">
                                        </div>
                                        <div class="dropdown">
                                            <i data-feather="more-vertical" id="dropdownMenuButton"
                                                class="feather-icon dropdown-toggle" style="cursor: pointer;"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item buttonEditNews"
                                                    onclick="editNews({{ $newsItem->id }})">Edit</a>
                                                <form action="{{ route('news.destroy', $newsItem) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item" type="submit">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ $newsItem->link }}" style="text-decoration: none; color :#7c8798">
                                        <div class="card-body">
                                            <img class="card-img-top w-100 h-auto"
                                                src="{{ asset($newsItem->getThumbnailPath()) }}" alt="Card image cap"
                                                style="width: 100%; aspect-ratio: 16/9; object-fit: cover;">
                                            <div class="card-content d-flex flex-column justify-content-between">
                                                <div class="text" style="max-height: 170px; height:170px">
                                                    <h4 class="card-text pt-2 font-weight-bold text-dark">
                                                        {{ $newsItem->title }}
                                                    </h4>
                                                    <p>
                                                        <small class="card-text pt-2">
                                                            {{ Str::limit($newsItem->description, 100, '...') }}
                                                        </small>
                                                    </p>
                                                </div>
                                                {{-- <div class="button-goto w-100 d-flex justify-content-end">
                                                <a href="#" class="btn btn-primary">Go To News</a>
                                            </div> --}}
                                                <span style="font-size: 0.7rem"
                                                    class="button-goto w-100 d-flex justify-content-end"
                                                    href="{{ $newsItem->link }}">Sumber
                                                    :
                                                    <i>&nbsp;{{ $newsItem->link }}</i></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <nav aria-label="Page navigation example" class="px-4">
                        <form action="{{ route('news.index') }}" id="form-perpage" class="pb-3">
                            <div class="form-group d-flex align-items-center">
                                <select name="perpage" id="perpage" class="form-control" style="width: 7rem">
                                    <option value="9" {{ $perpage == 9 ? 'selected' : '' }}>Default</option>
                                    <option value="15" {{ $perpage == 15 ? 'selected' : '' }}>15</option>
                                    <option value="30" {{ $perpage == 30 ? 'selected' : '' }}>30</option>
                                    <option value="45" {{ $perpage == 45 ? 'selected' : '' }}>45</option>
                                    <option value="60" {{ $perpage == 60 ? 'selected' : '' }}>60</option>
                                </select>
                                <label for="perpage" class="pt-2 pl-2">News per page</label>
                            </div>
                        </form>
                        <ul class="pagination justify-content-center justify-content-md-end">
                            @if ($news->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link">
                                        < </span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $news->previousPageUrl() }}">
                                        < </a>
                                </li>
                            @endif

                            @for ($i = 1; $i <= $news->lastPage(); $i++)
                                <li class="page-item {{ $news->currentPage() == $i ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $news->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            @if ($news->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $news->nextPageUrl() }}">
                                        >
                                    </a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span class="page-link">
                                        >
                                    </span>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="createNewsModal" tabindex="-1" role="dialog" aria-labelledby="createNewsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createNewsModalLabel">News</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('news.store') }}" method="post" enctype="multipart/form-data" id="my-dropzone">
                    @csrf
                    <input type="hidden" id="id" name="id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title"
                                class="form-control @error('title') is-invalid @enderror" id="title"
                                placeholder="Enter News Title" value="{{ old('title') }}">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description <span class="text-danger">*</span></label>
                            <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror"
                                id="description" placeholder="Enter Description" style="height: 4rem; min-height: 4rem; max-height: 8rem">{{ old('description') }}</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="link">Link <span class="text-danger">*</span></label>
                            <input type="text" name="link" class="form-control @error('link') is-invalid @enderror"
                                id="link" placeholder="Enter News Link" value="{{ old('link') }}">
                            @error('link')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group dropzoneArea" style="height: max-content">
                            <label for="thumbnail">Thumbnail</label>
                            <x-input.dropzone name="thumbnail" id="input-thumbnail" customDropzoneId="custom-dropzone"
                                dropzonePreviewId="dropzone-preview" namePreviewId="name-preview"
                                sizePreviewId="size-preview" filePreviewId="file-preview"
                                defaultImage="assets/images/news/illustration1.jpg" defaultName="lorem ipsum"
                                defaultSize="0 Mb" />
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="buttonSubmitNews">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <script src="{{ asset('library/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script src="{{ asset('dist/js/news/script.js') }}"></script>
    <script>
        let originalPerpage;
        originalPerpage = $("#perpage").val();
        $("#perpage").change(() => {
            swal({
                title: "Warning",
                text: "You have checked some news. If you want to change the 'perpage', you will lose any news that you have checked.",
                icon: "warning",
                buttons: true,
                dangerMode: true
            }).then((willChange) => {
                if (willChange) {
                    sessionStorage.removeItem("selectedNews");
                    $("#form-perpage").submit();
                } else {
                    $("#perpage option[value='" + originalPerpage + "']").prop('selected', true);
                }
            });
        })
    </script>
    @if (session('success'))
        <script>
            sessionStorage.removeItem("selectedNews");
        </script>
    @endif
    @if ($errors->any())
        <script>
            swal({
                icon: "error",
                title: "Failed to save news",
                text: "Please try saving again.",
                timer: 2500,
                button: false
            }).then(() => {
                $("#createNewsModal").modal("show");
            });
        </script>
    @endif
@endpush
