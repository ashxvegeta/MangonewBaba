@extends('layouts.master')

@section('title', 'MangoBaba')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/wishlist.css') }}">
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
            <input type="text" placeholder="Search for products..." name="search" class="border border-dark"
                id="search-input">
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
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                            <a class="nav-link dropdown-toggle bg-success text-white rounded" href="#"
                                id="categoriesDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                Shop By Category
                            </a>
                            <div class="dropdown-menu" aria-labelledby="categoriesDropdown">
                                <a class="dropdown-item" href="#">Fruits & Vegetables</a>
                                <a class="dropdown-item" href="#">Dairy & Bakery</a>
                                <a class="dropdown-item" href="#">Snacks</a>
                                <a class="dropdown-item" href="#">Beverages</a>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('category') }}">Category</a></li>
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
<!-- product list section start here -->
<div class="container my-5" >
    <!-- Product Section -->
    <!-- Continue Shopping Section -->
<div class="continue-shopping-section text-center my-5">
    <div class="empty-basket">
        <img src="{{ asset('images/basket.png') }}" alt="Empty Basket" class="img-fluid mb-3" style="max-width: 180px;height:100px;">
        <h4 class="mb-3">Let's fill the empty <span class="text-success">Basket</span></h4>
        <a href="" class="btn btn-danger px-4 py-2 fw-bold">
            Continue Shopping
        </a>
    </div>
</div>


    <!-- Product List -->
<div class="wishlist" id="wishlist">
<!-- product list section start here -->
<div class="container my-5" style="background-color: rgb(247 247 247);padding-top: 5px;padding-bottom: 30px;">
    <!-- Product Section -->
    <div class="product-section-title d-flex justify-content-between align-items-center">
        <h2>Saved For Later</h2>
        <div class="d-flex align-items-center">
            <a href="{{ route('product.filter_product_list') }}" class="view-all me-3">View All</a>
            <div class="d-flex align-items-center">
                <button id="slider-left" class="btn btn-light me-2" style="padding: 5px;">
                    <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M13.829 19a.998.998 0 0 1-.78-.373l-4.828-6a1 1 0 0 1 .01-1.267l5-6a1 1 0 1 1 1.536 1.28l-4.474 5.371 4.315 5.362a1 1 0 0 1-.78 1.627Z"
                            fill="#231F20"></path>
                        <mask id="arrow-ios-left_svg__a" mask-type="alpha" maskUnits="userSpaceOnUse" x="8" y="5"
                            width="7" height="14">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M13.829 19a.998.998 0 0 1-.78-.373l-4.828-6a1 1 0 0 1 .01-1.267l5-6a1 1 0 1 1 1.536 1.28l-4.474 5.371 4.315 5.362a1 1 0 0 1-.78 1.627Z"
                                fill="#fff"></path>
                        </mask>
                        <g mask="url(#arrow-ios-left_svg__a)">
                            <path fill="#606060" d="M0 0h24v24H0z"></path>
                        </g>
                    </svg>
                </button>
                <button id="slider-right" class="btn btn-light" style="padding: 5px;">
                    <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M10 19a1 1 0 0 1-.768-1.64l4.476-5.371-4.316-5.362a1 1 0 0 1 1.56-1.254l4.828 6a1 1 0 0 1-.011 1.267l-5 6a1 1 0 0 1-.77.36Z"
                            fill="#231F20"></path>
                        <mask id="arrow-ios-right_svg__a" mask-type="alpha" maskUnits="userSpaceOnUse" x="9" y="5"
                            width="8" height="14">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M10 19a1 1 0 0 1-.768-1.64l4.476-5.371-4.316-5.362a1 1 0 0 1 1.56-1.254l4.828 6a1 1 0 0 1-.011 1.267l-5 6a1 1 0 0 1-.77.36Z"
                                fill="#fff"></path>
                        </mask>
                        <g mask="url(#arrow-ios-right_svg__a)">
                            <path fill="#606060" d="M0 0h24v24H0z"></path>
                        </g>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Product List -->
    <div id="product-slider" class="overflow-hidden">
        <div class="d-flex min-w-full duration-300" style="transform: translateX(0%);"  id="sliderTrack">
            <ul class="d-flex justify-start p-0 m-0" style="list-style: none;">
               


                </li>
            </ul>
        </div>
    </div>
</div>




</div>
    

</div>






</div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('js/index.js') }}"></script>
<script src="{{ asset('js/filter_product_list.js') }}"></script>
@endpush