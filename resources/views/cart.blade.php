

@extends('layouts.master')

@section('title', 'Basket Cart')



@push('styles')
<link rel="stylesheet" href="{{ asset('css/basketcart.css') }}">
@endpush

@section('content')

@include('user.header')
@include('user.navbar')





<div class="container p-4">
    <div class="row fw-bold py-2  mb-2 delivery-div">
        <div class="col-6 fw-bold">Delivery </div>
        <div class="col-6 text-right fw-bold">{{ $cartItems->count() }} Products</div>

    </div>
 
    
    <div class="row fw-bold py-2 quantity-div">
        <div class="col-md-6">Items</div>
        <div class="col-md-3 text-center">Quantity</div>
        <div class="col-md-3 text-right">Sub-total</div>
    </div>

    @foreach($cartItems as $item)
    <div class="cart-item mt-2 product-data">
        <div class="row align-items-center">
            <!-- Product Image -->
            <div class="col-md-2 col-4">
                <a href="{{ url('category/'.$item->product->category->slug.'/'.$item->product->slug) }}">
                    <img src="{{ asset('images/products/' . $item->product->image) }}" class="img-fluid rounded" alt="Product">
                </a>
            </div>

            <!-- Product Details -->
            <div class="col-md-4 col-8">
                <div class="seller-info"><i class="fa fa-check-circle"></i> Har Din Sasta!</div>
                <div class="fw-semibold">{{ $item->product->name }}</div>
                <div>
                    <span class="price">₹{{ $item->product->selling_price}}</span>
                    <span class="old-price ms-1">₹{{ $item->product->original_price}}</span>
                </div>
                <div class="saved">Saved: ₹{{ $item->product->original_price - $item->product->selling_price }}</div>
            </div>

            <!-- Quantity -->
            <div class="col-md-3 col-6 text-center mt-3 mt-md-0">
                <div class="quantity-control mx-auto">
                    <button type="button" class="decrement-btn">−</button>
                    <input type="text" value="{{ $item->prod_qty }}" readonly class="qty-input">
                    <button type="button" class="increment-btn">+</button>
                </div>
                <div class="actions mt-2">
                    <a href="#" class="text-danger me-2">Delete</a> | 
                    <a href="#" class="text-secondary ms-2">Save for later</a>
                </div>
            </div>

            <!-- Sub-total -->
            <div class="col-md-3 col-6 text-right mt-3 mt-md-0">
                <span class="price">₹{{ $item->product->selling_price * $item->prod_qty }} </span>
            </div>
        </div>
    </div>

        @endforeach
        
@endsection


