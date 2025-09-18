<!DOCTYPE html>
<html lang="en">
<head>
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
@extends('layouts.master')
@section('title', 'Checkout')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
@endpush
</head>
<body>
<!-- Header -->
<div class="checkout-header">
    <a href="{{ url('/') }}"><img src="http://mangobaba.in/img/applogouu.png" alt="BigBasket"></a>

    <div class="checkout-steps">
        <span>Delivery Address</span>
        <span>Delivery Options</span>
        <span>Payment Options</span>
    </div>
</div>

<!-- Main Content -->
<div class="container">
    <!-- Delivery Options -->
    <div class="delivery-options">
        <h3><i class="fas fa-shopping-basket me-2 text-warning"></i> Order Confirmation</h3>

        <!-- Form -->
        <form action="{{ route('checkout.placeOrder') }}" method="POST" class="checkout-form">
            @csrf
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" value="{{ session('user')->name ?? '' }}">
            <span id="name_error" class="text-danger"></span>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" value="{{ session('user')->email ?? '' }}">
            <span id="email_error" class="text-danger"></span>
            
            <label for="phone">Contact Number</label>
            <input type="phone" id="phone" name="phone" placeholder="Enter your phone number" value="{{ session('user')->phone ?? '' }}">
            <span id="phone_error" class="text-danger"></span>

            <label for="address">Delivery Address</label>
            <textarea id="address" name="address" rows="3" placeholder="Enter your delivery address">{{ session('user')->address ?? '' }}</textarea>
            <span id="address_error" class="text-danger"></span>

            <label for="city">City</label>
            <input type="text" id="city" name="city" placeholder="Enter your city" value="{{ old('city') }}">
            <span id="city_error" class="text-danger"></span>

            <label for="state">State</label>
            <input type="text" id="state" name="state" placeholder="Enter your state" value="{{ old('state') }}">
            <span id="state_error" class="text-danger"></span>


            <button type="submit" class="proceed-btn">Proceed to payment | COD</button>
            <button type="button" class="w-100 p-2 mt-2 btn-rounded rzrpay_btn btn-primary" style="border-radius: 4px;">Proceed to payment | ONLINE</button>
        </form>
    </div>

    <!-- Order Summary -->
  <!-- Order Summary -->
<div class="order-summary">
    <h3>Order Summary</h3>

    <!-- Product List -->
    <div style="margin-bottom: 15px;">
        @php
        $total = 0;
        @endphp
        @foreach($cartItems as $item)
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px;">
            <div style="display: flex; align-items: center; gap: 8px;">
                <img src="{{ asset('images/products/' . $item->product->image) }}" alt="{{ $item->product->name }}" style="border-radius: 4px; width: 32px; height: 32px;">
                <div>
                    <div style="font-weight: bold; font-size: 14px;">{{ $item->product->name }}</div>
                    <div style="font-size: 12px; color: gray;">{{ $item->prod_qty }}kg</div>
                </div>
            </div>
            <div style="font-weight: bold; font-size: 14px;">₹{{ $item->product->selling_price }}</div>
        </div>
        <?php $total += $item->product->selling_price; ?>
        @endforeach
    </div>

    <!-- Price Summary -->
 
    <div class="total-savings">
         <span>Total Amount Payable</span>
        <span>₹{{ $total }}</span>
    </div>
    <div class="note">
        Select your address and delivery slot to know accurate delivery charges.  
        You can save more by applying a voucher!
    </div>
</div>

</div>

</body>
</html>
