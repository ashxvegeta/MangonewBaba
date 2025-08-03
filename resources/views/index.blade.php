@extends('layouts.master')

@section('title', 'MangoBaba')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/product_list.css') }}">
<link rel="stylesheet" href="{{ asset('css/home_category.css') }}">
<link rel="stylesheet" href="{{ asset('css/filter_product_list.css') }}">
<link rel="stylesheet" href="{{ asset('css/topoffers.css') }}">
<!-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> -->
@endpush

@section('content')
<!-- <div class="container-fluid"> -->


<@include('user.header')
@include('user.navbar')

<!-- Carousel -->
<!-- <div class="container-fluid"> -->
    <div class="container my-3">
        <div class="row">
            <div class="carousel">
                <div class="timer"></div>
                <div class="slide active"><img src="https://picsum.photos/800/450?random=1" alt="Image 1"></div>
                <div class="slide"><img src="https://picsum.photos/800/450?random=2" alt="Image 2"></div>
                <div class="slide"><img src="https://picsum.photos/800/450?random=3" alt="Image 3"></div>
                <div class="dots"></div>
                <a href="#" class="nav-arrow prev">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.70312 11.2031L14.2031 3.75C14.625 3.28125 15.3281 3.28125 15.7969 3.75C16.2188 4.17188 16.2188 4.875 15.7969 5.29688L9.04688 12L15.75 18.75C16.2188 19.1719 16.2188 19.875 15.75 20.2969C15.3281 20.7656 14.625 20.7656 14.2031 20.2969L6.70312 12.7969C6.23438 12.375 6.23438 11.6719 6.70312 11.2031Z" />
                    </svg>
                </a>
                <a href="#" class="nav-arrow next">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.2969 11.2031C17.7188 11.6719 17.7188 12.375 17.2969 12.7969L9.79688 20.2969C9.32812 20.7656 8.625 20.7656 8.20312 20.2969C7.73438 19.875 7.73438 19.1719 8.20312 18.75L14.9062 12.0469L8.20312 5.29688C7.73438 4.875 7.73438 4.17188 8.20312 3.75C8.625 3.28125 9.32812 3.28125 9.75 3.75L17.2969 11.2031Z" />
                    </svg>
                </a>
                <button class="pause-play-button" aria-label="Pause carousel">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M6 4h4v16H6zm8 0h4v16h-4z" />
                    </svg>
                    <span>Pause</span>
                </button>
            </div>
        </div>
    </div>
<!-- </div> -->

@include('product')

@include('home_category')

@include('topoffers')
 
@endsection

@push('scripts')
<!-- <script src="{{ asset('js/index.js') }}"></script> -->
<script src="{{ asset('js/filter_product_list.js') }}"></script>
@endpush
