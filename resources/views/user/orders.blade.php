

@extends('layouts.master')

@section('title', 'Basket Cart')



@push('styles')
<link rel="stylesheet" href="{{ asset('css/basketcart.css') }}">
<style>
      body {
      font-family: Arial, sans-serif;
      background-color: #f5f6fa;
      margin: 0;
      padding: 20px;
      padding-bottom: 120px; 
    }

  

    /* Breadcrumb */
    .breadcrumb {
      font-size: 14px;
      margin-bottom: 20px;
      color: #555;
    }

    .breadcrumb a {
      color: #007bff;
    }

    /* Container */
    .container.content-container {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }

    /* Filters Sidebar */
    .filters {
      flex: 1 1 250px;
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 8px rgba(0,0,0,0.05);
    }

    .filters h3 {
      margin-top: 0;
      margin-bottom: 10px;
      font-size: 18px;
    }

    .filters label {
      display: block;
      margin-bottom: 10px;
      font-size: 14px;
      cursor: pointer;
    }

    /* Main Content */
    .orders {
      flex: 3 1 600px;
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    /* Search Bar */
    .search-bar-section {
      display: flex;
      margin-bottom: 20px;
    }

    .search-bar-section input {
      flex: 1;
      padding: 10px 15px;
      border-radius: 5px 0 0 5px;
      border: 1px solid #ccc;
      font-size: 14px;
    }

    .search-bar-section button {
      padding: 10px 20px;
      border: none;
      background-color: #007bff;
      color: white;
      border-radius: 0 5px 5px 0;
      cursor: pointer;
      font-size: 14px;
    }

    /* Order Card */
    .order-card {
      display: flex;
      background: #fff;
      padding: 15px;
      border-radius: 8px;
      box-shadow: 0 0 6px rgba(0,0,0,0.05);
      align-items: center;
      gap: 15px;
      flex-wrap: wrap;
    }

    .order-card img {
      width: 80px;
      height: 80px;
      object-fit: contain;
      border-radius: 5px;
    }

    .order-info {
      flex: 2 1 250px;
    }

    .order-info h4 {
      margin: 0 0 5px 0;
      font-size: 16px;
    }

    .order-info p {
      margin: 0;
      font-size: 14px;
      color: #555;
    }

    .order-price-status {
      flex: 1 1 150px;
      text-align: right;
      font-size: 14px;
    }

    .order-price-status .price {
      font-weight: bold;
      margin-bottom: 5px;
    }

    .order-price-status .delivered {
      display: flex;
      align-items: center;
      color: green;
      font-size: 13px;
    }

    .order-price-status .delivered::before {
      content: '';
      display: inline-block;
      width: 8px;
      height: 8px;
      background: green;
      border-radius: 50%;
      margin-right: 5px;
    }

    .order-price-status a {
      display: block;
      color: #007bff;
      margin-top: 5px;
      font-size: 13px;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .container.content-container {
        flex-direction: column;
      }

      .order-card {
        flex-direction: column;
        text-align: left;
      }

      .order-price-status {
        text-align: left;
      }
    }

    @media (max-width: 480px) {
   .filters{
    display: none;
   }
   .order-card {
     display: ruby;
   }
  }

   @media (min-width: 601px) and (max-width: 1024px) {
 .order-card {
       display: -webkit-inline-box !important;

   }
}
</style>
@endpush

@section('content')

@include('user.header')
@include('user.navbar')

<div class="container p-3">
    <a href="#">Home</a> &gt; <a href="#">My Account</a> &gt; My Orders
  </div>

  <div class="container content-container">
    <!-- Filters Sidebar -->
    <div class="filters">
      <h3>Filters</h3>
      <div>
        <strong>ORDER STATUS</strong>
        <label><input type="checkbox"> On the way</label>
        <label><input type="checkbox"> Delivered</label>
        <label><input type="checkbox"> Cancelled</label>
        <label><input type="checkbox"> Returned</label>
      </div>
      <div style="margin-top: 15px;">
        <strong>ORDER TIME</strong>
        <label><input type="checkbox"> Last 30 days</label>
        <label><input type="checkbox"> 2024</label>
        <label><input type="checkbox"> 2023</label>
        <label><input type="checkbox"> 2022</label>
        <label><input type="checkbox"> 2021</label>
      </div>
    </div>

    <!-- Orders Section -->
    <div class="orders">
      <!-- Search Bar -->
      <div class="search-bar-section">
        <input type="text" placeholder="Search your orders here">
        <button>Search Orders</button>
      </div>

      <!-- Order Card Example -->
  

    

      <div class="order-card">
        <img src="https://mangobaba.in/product_images/1747645043.png" alt="Product Image">
        <div class="order-info">
          <h4>Minutes Basket - 1 Items</h4>
          <p>1 Delivered</p>
        </div>
        <div class="order-price-status">
          <div class="price">₹360 + ⚡8</div>
          <div class="delivered">Delivered on Jul 23</div>
          <p>Your item has been delivered</p>
        </div>
      </div>

    </div>
  </div>




@endsection


