@extends('layouts.app')

@section('title', 'News Detail')

@push('style')
    <style>
        .news_detail {
            font-family: 'Arial', sans-serif;
            margin: 20px;
        }

        .news_detail h1 {
            color: #333;
        }

        .news_detail p {
            color: #555;
            line-height: 1.6;
        }

        .news_detail img {
            max-width: 100%;
            height: auto;
            margin-top: 20px;
        }

        .news_detail a {
            color: #007BFF;
        }
    </style>
@endpush

@section('main')
    <div id="news_detail" class="container-fluid" style="min-height: 70%">
        <h1>{{ $news['title'] }}</h1>
        <p>{{ $news['description'] }}</p>
        <p>Published on : {{ date('F j, Y', strtotime($news['created_at'])) }}</p>
        <img class="card-img-top" style="border-radius:8px; object-fit: cover;" height="150" width="100"
            src="uploads/news/news-thumbnail-20231026061428.gif" alt="Card image cap">
        <img src="{{ $news->getThumbnailPath() }}" alt="Thumbnail">
        <p>{{ $news['description'] }}</p>
        <p>Read more: <a href="{{ $news['link'] }}">{{ $news['link'] }}</a></p>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <script src="{{ asset('library/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script src="{{ asset('dist/js/news/script.js') }}"></script>
@endpush
