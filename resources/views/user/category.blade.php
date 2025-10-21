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
@include('user.header')
@include('user.navbar')
<!-- Navbar -->
<!-- <div class="container" id="container-mobile">
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
</div> -->

<!-- Carousel -->
<!-- <div class="container-fluid"> -->
<div class="container my-3">
    <h2>All Categories</h2>
<div class="row mt-4 rounded">
    @foreach($categories as $category)
    <div class="col-6 col-sm-6 col-md-4 col-lg-3 mb-4">
        <div class="card h-100 p-2 cat-card">
            <a href="{{ route('view-category', $category->slug) }}">
                <img src="{{ asset('images/categories/' . $category->image) }}"
                     alt="{{ $category->name }}"
                     class="card-img-top"
                     style="height: 200px; object-fit: cover;">
            </a>
            <div class="card-body text-center">
                <h5 class="card-title">{{ $category->name }}</h5>
                <p class="card-title m-0" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100%;">
                    {{ $category->description }}
                </p>
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