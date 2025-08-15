

@extends('layouts.master')

@section('title', 'Basket Cart')



@push('styles')
<link rel="stylesheet" href="{{ asset('css/basketcart.css') }}">
@endpush

@section('content')

@include('user.header')
@include('user.navbar')
 <div id="success-alert" class="alert alert-success alert-dismissible fade show d-none"
     role="alert"
     style="position: fixed; bottom: 30px; left: 50%; transform: translateX(-50%); z-index: 9999; min-width: 300px; max-width: 500px; text-align: center;">
    <span id="success-message">{{ session('success') }}</span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"
            style="position: absolute; top: 0px; right: 15px;">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="container p-4">
    <div class="row fw-bold py-2  mb-2 delivery-div">
        <div class="col-6 fw-bold">Delivery </div>
        <div class="col-6 text-right fw-bold"><span class="product-count">{{ $cartItems->count() }}</span>&nbspProducts</div>

    </div>
 
    
    <div class="row fw-bold py-2 quantity-div">
        <div class="col-md-6">Items</div>
        <div class="col-md-3 text-center">Quantity</div>
        <div class="col-md-3 text-right">Sub-total</div>
    </div>

    @php
        $total = 0;    
        $totasavings=0;
    @endphp
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
                 @php
                $perproduct_saving = $item->prod_qty* ($item->product->original_price - $item->product->selling_price) ;
                @endphp
                <div class="saved">Saved: ₹{{ $perproduct_saving }}</div>
            </div>

            <!-- Quantity -->
            <div class="col-md-3 col-6 text-center mt-3 mt-md-0">
              @if($item->product->qty > $item->prod_qty)
                <div class="quantity-control mx-auto">
                    <button type="button" class="decrement-btn change-quantity" data-action="decrement" data-id="{{ $item->prod_id }}">−</button>
                    <input type="text" value="{{ $item->prod_qty }}" readonly class="qty-input">
                    <button type="button" class="increment-btn change-quantity" data-action="increment" data-id="{{ $item->prod_id }}">+</button>
                </div>
            
                <div class="actions mt-2">
                    <a href="" class="text-danger me-2 delete-cart-item" data-id="{{ $item->prod_id }}">Delete</a> |
                    <a href="#" class="text-secondary ms-2">Save for later</a>
                </div>

                      @php
                      $total += $item->product->selling_price * $item->prod_qty;
        $totasavings += ($item->product->original_price - $item->product->selling_price) * $item->prod_qty;
      @endphp 

      @else
      <div class="out-of-stock text-danger">Out of Stock</div>
                  @endif


            </div>

            <!-- Sub-total -->
            <div class="col-md-3 col-6 text-right mt-3 mt-md-0">
                <span class="item-subtotal">₹{{ $item->product->selling_price * $item->prod_qty }} </span>
            </div>
        </div>
    </div>


        @endforeach

        <!-- Sticky Cart Footer -->
<div class="cart-footer fixed-bottom container">
  <div class="cart-footer-inner">
    <!-- TOP: Subtotal & Savings -->
    <div class="cf-top d-flex align-items-center justify-content-between">
      <div class="cf-subtotal">
        Subtotal: <span class="cf-subtotal-amt total-price">₹{{ $total ?? '0.00' }}</span>
      </div>
      <div class="cf-savings">
        <span class="badge badge-savings">Savings: ₹{{ $totasavings ?? '0.00' }}</span>
      </div>
    </div>

    <!-- BOTTOM: Delivery options (left) + Proceed button (right) -->
    <div class="cf-bottom d-flex align-items-center">
      <div class="delivery-wrap d-flex flex-wrap">
       
       

        <button type="button" class="delivery-btn delivery-schedule ml-2">
          <div class="d-flex align-items-center">
            <i class="fa fa-clock-o fa-lg mr-2"></i>
            <div class="text-left Schedule-delivery">
              <div class="fw-600">Schedule delivery</div>
              <small class="d-block text-muted">Get it in 2 hrs</small>
            </div>
          </div>
        </button>
      </div>

      <div class="ml-auto">
        <a href="{{ route('checkout') }}" class="btn btn-proceed btn-lg">Proceed to Checkout</a>
      </div>
    </div>
  </div>
</div>

<!-- IMPORTANT: add bottom padding to page content so footer doesn't cover page content -->
<style>
  /* quick inline fallback — move to your CSS file instead */
  body { padding-bottom: 120px; } /* ensure content not hidden behind footer */
</style>

    </div>
</div>



@endsection


