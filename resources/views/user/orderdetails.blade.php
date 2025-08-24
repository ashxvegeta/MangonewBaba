

@extends('layouts.master')

@section('title', 'Order Details')



@push('styles')
<link rel="stylesheet" href="{{ asset('css/orderdetails.css') }}">
<style>

</style>
@endpush

@section('content')

@include('user.header')
@include('user.navbar')

<div class="order-details-container mt-4">

  <!-- Order Header -->
  <div class="order-header">
    <h2>Order ID: #OD431115829671049200</h2>
    <span class="order-status">Delivered on Apr 29, 2024</span>
  </div>

  <!-- Products -->
  <div class="section">
    <h3>Items in this order</h3>
    <div class="order-products">
      <div class="order-product">
        <img src="https://mangobaba.in/product_images/1747645043.png" alt="Product Image">
        <div class="product-info">
          <h4>Kilos Basket</h4>
          <p>Qty: 2</p>
          <p>₹720</p>
        </div>
      </div>
      <div class="order-product">
        <img src="https://mangobaba.in/product_images/1747645043.png" alt="Product Image">
        <div class="product-info">
          <h4>Minutes Basket</h4>
          <p>Qty: 1</p>
          <p>₹360</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Delivery Details -->
  <div class="section">
    <h3>Delivery Address</h3>
    <p>Ashish Kumar Yadav</p>
    <p>356/340/1134 Ashok Nagar, Lucknow</p>
    <p>Phone: 82995792</p>
  </div>

  <!-- Price Details -->
  <div class="section price-details">
    <h3>Price Details</h3>
    <table>
      <tr><td>List Price</td><td>₹1959</td></tr>
      <tr><td>Selling Price</td><td>₹1640</td></tr>
      <tr><td>Handling Fee</td><td>₹9</td></tr>
      <tr><td>Promotion Discount</td><td>- ₹144</td></tr>
      <tr class="total"><td>Total Amount</td><td>₹1505</td></tr>
    </table>
    <p>Payment Mode: Flipkart UPI</p>
  </div>

</div>




@endsection


