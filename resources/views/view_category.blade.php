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
    <div class="product-section-title d-flex justify-content-between align-items-center">
        <h2>{{ $category->name }}</h2>
     
    </div>

    <!-- Product List -->
<div class="product-row" id="product-row">
    @foreach($products as $product)
    <div class="product-col mb-3">
        <div class="product-card border rounded">
            <div class="position-relative">
                <a href="{{ route('product.details') }}">
                    <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}" class="w-100">
                </a>
            </div>
            <div class="index-product-details p-2">
                <p class="product-title">{{ $product->name }}</p>
                <select class="form-control quantity-select">
                    <option>1 kg</option>
                    <option>2 kg</option>
                </select>
                <p class="product-price">₹{{ $product->selling_price }}<span
                        class="original-price">₹{{ $product->original_price }}</span></p>
                <button class="btn btn-success btn-block add-to-cart">Add</button>
            </div>
        </div>
    </div>
    @endforeach
</div>
    

</div>






</div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('js/index.js') }}"></script>
<!-- <script src="{{ asset('js/filter_product_list.js') }}"></script> -->
@endpush