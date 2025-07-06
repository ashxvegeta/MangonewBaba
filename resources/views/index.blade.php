@extends('layouts.master')

@section('title', 'MangoBaba')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/product_list.css') }}">
<link rel="stylesheet" href="{{ asset('css/filter_product_list.css') }}">
<link rel="stylesheet" href="{{ asset('css/topoffers.css') }}">
<!-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> -->
@endpush

@section('content')
<!-- <div class="container-fluid"> -->
    <div class="container">
        <div class="row" id="header-logo">
            <!-- Logo -->
            <div class="site_logo">
                <a href="#" class="logo">MangoBaba</a>
            </div>

            <!-- Search Bar (Desktop) -->
            <div class="search-bar">
                <input type="text" placeholder="Search for products..." name="search" class="border border-dark" id="search-input">
                <button class="search-btn" id="search-btn" type="button"> <i class="fa fa-search"></i></button>
                <div id="search-results"></div>
            </div>

            <!-- Login/Signup Buttons -->
            <div>
                <button class="login-signup-btn">Login/Sign Up</button>
            </div>

            <!-- Add to Cart Icon -->
            <div class="addtocartlogo px-2">
                <a href="#" class="addtocart-btn">
                    <i class="fa fa-shopping-cart"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Navbar -->
<div class="container" id="container-mobile">
    <div class="nav_mobile_full">
        <div class="nav-full-width">
            <nav class="navbar navbar-expand-lg navbar-light px-1 w-100">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="profile-dropdown">
                    <a class="nav-link text-secondary" href="#" id="profileDropdown">
                        <i class="fa fa-solid fa-user"></i>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle bg-success text-white rounded" href="#" id="categoriesDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                Shop By Category
                            </a>
                            <div class="dropdown-menu" aria-labelledby="categoriesDropdown">
                                <a class="dropdown-item" href="#">Fruits & Vegetables</a>
                                <a class="dropdown-item" href="#">Dairy & Bakery</a>
                                <a class="dropdown-item" href="#">Snacks</a>
                                <a class="dropdown-item" href="#">Beverages</a>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#">Deals</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Local For Vocal</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Tea</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Plants</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Beverages</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>

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

@include('topoffers')
 
@endsection

@push('scripts')
<script src="{{ asset('js/index.js') }}"></script>
<!-- <script src="{{ asset('js/filter_product_list.js') }}"></script> -->
@endpush
