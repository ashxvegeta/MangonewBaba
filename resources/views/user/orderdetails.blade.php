

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

  <div class="order-header">
    <h2>Order ID: #OD{{ $order->id }}</h2>
    <span class="order-status">
      @if($order->status == 0) In Process
      @else Delivered on {{ $order->created_at->format('d M Y') }}
      @endif
    </span>
  </div>

  {{-- Show Products inside this order --}}
  <div class="order-products">
      @foreach ($order->orderItems as $item)
          <div class="order-product">
              <img src="{{ asset('images/products/'.$item->product->image) }}" 
                   alt="{{ $item->product->name }}" width="80">
              <div>
                  <h5>{{ $item->product->name }}</h5>
                  <p>Quantity: {{ $item->qty }}</p>
                  <p>Price: ₹{{ $item->price }}</p>
              </div>
          </div>
      @endforeach
  </div>

  <div class="section">
    <h3>Delivery Address</h3>
    <p>{{ $order->name }}</p>
    <p>{{ $order->address }}, {{ $order->city }}, {{ $order->state }}</p>
    <p>Phone: {{ $order->phone }}</p>
  </div>

  <div class="section">
    <h3>Order Summary</h3>
    <p>Total Items: {{ $order->orderItems->count() }}</p>
    <p>Total Price: ₹{{ $order->total_price }}</p>
  </div>

</div>





@endsection


