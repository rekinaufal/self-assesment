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
        <h1>{{ $news['title'] ?? '' }}</h1>
        <p>{{ $news['description'] ?? '' }}</p>
        <p>Published on : {{ date('F j, Y', strtotime($news['created_at'] ?? '')) }}</p>
        @if ($news['thumbnail'] != null)
            <img src="{{ asset($news->getThumbnailPath()) }}" alt="Thumbnail">
        @endif 
        <p>{{ $news['description'] ?? '' }}</p>
        <p>Read more: <a href="{{ $news['link'] }}">{{ $news['link'] ?? '' }}</a></p>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <script src="{{ asset('library/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script src="{{ asset('dist/js/news/script.js') }}"></script>
@endpush
