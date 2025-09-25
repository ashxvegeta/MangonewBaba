@extends('layouts.master')

@section('title', $product->name . ($product->slug ? ' - ' . $product->slug : ''))



@push('styles')
<link rel="stylesheet" href="{{ asset('css/product_main.css') }}">
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



<div class="container pt-5" style="display:flex:justify-content-center;width:50%;">

<div class="modal-container" >
<div   class="modal fade   "  id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $product->name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="rating-css">
    <div class="star-icon">
        <input type="radio" value="1" name="product_rating" checked id="rating1">
        <label for="rating1" class="fa fa-star"></label>
        <input type="radio" value="2" name="product_rating" id="rating2">
        <label for="rating2" class="fa fa-star"></label>
        <input type="radio" value="3" name="product_rating" id="rating3">
        <label for="rating3" class="fa fa-star"></label>
        <input type="radio" value="4" name="product_rating" id="rating4">
        <label for="rating4" class="fa fa-star"></label>
        <input type="radio" value="5" name="product_rating" id="rating5">
        <label for="rating5" class="fa fa-star"></label>
    </div>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>

        <div class="row g-0  product-data">
            <div class="col-sm-12 col-lg-5 product-main-image-col">
                <div class="product-main-image-box">
                    <img class="product-main-image" rel="zoom"
                        src="{{ asset('images/products/' . $product->image) }}"
                        data-type="image" style="width: 500px;"
                        alt="Main Product Image" style="width: 500px;">
                </div>

                <div class="product-more-image-container m-2">
                    <div class="m-1">
                        <img class="product-more-image"
                            src="{{ asset('images/products/' . $product->image) }}"
                            data-type="image"
                            data-src="{{ asset('images/products/' . $product->image) }}
                            alt="Thumbnail 1" width="43" height="40">
                    </div>
                    <div class="m-1">
                        <img class="product-more-image"
                               src="{{ asset('images/products/' . $product->image) }}"
                            data-type="image"
                            data-src="{{ asset('images/products/' . $product->image) }}"
                            alt="Thumbnail 2" width="43" height="40">
                    </div>
                    <div class="m-1">
                        <img class="product-more-image"
                             src="{{ asset('images/products/' . $product->image) }}"
                            data-type="image"
                            data-src="{{ asset('images/products/' . $product->image) }}"
                            alt="Thumbnail 2" width="43" height="40">
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="image_modal" role="dialog">
                    <div class="modal-dialog modal-dialog-centered" id="modal-dialog_id">
                        <div class="modal-content" id="modal-content_id">
                            <div class="modal-header">
                                <div class="select_format_header_img_text d-flex" data-dismiss="modal">
                                    <div class="select_format_header_img_text d-flex" data-bs-dismiss="modal">
                                        <div class="select_format_header_img">
                                            <i class="fa fa-angle-left"></i>
                                            <span class="select_format_header_back"> Back</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="new-modal" id="full-image-modal-body">
                                <div class="modal-body" id="image_modal_body"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- here the right side of the code started -->
            <div class="col-sm-12 col-lg-6 product-details-col">
                <div class="p-0">
                    <h3 class="fw-bold mb-2">{{ $product->name }} </h3> <small class="text-white badge badge-danger">{{ $product->trending==1 ? 'Trending' : '' }}</small>

                    <div class="d-flex align-items-center my-0">
                        <div class="text-muted">MRP: <span class="price_was">{{ $product->original_price }}</span></div>
                    </div>

                    <div class="mb-4">
                        <div class="text-secondary fw-bold price_now"> Price: ₹{{ $product->selling_price }}
                            <!-- <span class="price_weight">(&#8377; 0.06 / g)</span> -->
                        </div>
                        <div class="text-success fw-bold"> You Save: {{ round((($product->original_price - $product->selling_price) / $product->original_price) * 100) }}% OFF</div>
                      
                       @if($product->qty > 0)
                            <small class="text-white badge badge-success">{{ 'In Stock' }}</small>
                        @else
                            <small class="text-white badge badge-danger">{{ 'Out of Stock' }}</small>
                        @endif
                     
                        
                        
                        <div class="text-muted">( Inclusive of all taxes )</div>

                        <input type="text" class="prod_id" value="{{ $product->id }}" hidden>
                        <label for="Quantity">Quantity</label>
                        <div class="input-group text-center mb-3" style="width: 130px;">
                        <span class="input-group-text decrement-btn" style="cursor: pointer;    background:#dc3545;color: #fff;">-</span>
                        @php
                        $existingQty = 1;
                        // Get existing cart item quantity for this product (if exists)
                        if(session('user')){
                        $cartItem = \App\Models\Cart::where('user_id', session('user')->id)
                        ->where('prod_id', $product->id)->first();
                        $existingQty = $cartItem ? $cartItem->prod_qty : 1;
                        }
                        @endphp
                        <input type="text" name="quantity" class="form-control text-center qty-input" value="{{ $existingQty }} " >
                        <span class="input-group-text increment-btn" style="cursor: pointer;    background:#dc3545;;
    color: #fff;
">+</span>
                        </div>
                    </div>

                    <div class="mb-2">
                        <h5 class="mb-3">Pack sizes</h5>
                        <div class="row g-3">
                            <div class="col-6 col-md-6">
                                <div class="card_resize p-2 border-primary">
                                    <div class="fw-bold">1 kg</div>
                                    <div class=" align-items-center">
                                        <span class="text-danger fw-bold">₹40</span>
                                        <small class="text-muted ms-2"><del>₹64</del></small>
                                    </div>
                                    <small class="text-success">38% OFF</small>
                                </div>
                            </div>

                            <div class="col-6 col-md-6">
                                <div class="card_resize p-2">
                                    <div class="fw-bold">250 g</div>
                                    <div class="d-flex align-items-center">
                                        <span class="text-danger fw-bold">₹16.44</span>
                                        <small class="text-muted ms-2"><del>₹30.95</del></small>
                                    </div>
                                    <small class="text-success">20% OFF</small>
                                </div>
                            </div>

                            <div class="col-6 col-md-6">
                                <div class="card_resize p-2">
                                    <div class="fw-bold">500 g</div>
                                    <div class="d-flex align-items-center">
                                        <span class="text-danger fw-bold">₹31.78</span>
                                        <small class="text-muted ms-2"><del>₹39.73</del></small>
                                    </div>
                                    <small class="text-success">20% OFF</small>
                                </div>
                            </div>

                            <div class="col-6 col-md-6">
                                <div class="card_resize p-2 bg-light">
                                    <div class="fw-bold text-muted">5 kg</div>
                                    <div class="text-muted small">Not available</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-column flex-md-row button-group">
                    @if($product->qty > 0)
                    <button class="btn btn-danger addToCartBtn flex-grow-1 py-3 mb-3 mb-md-0 mr-md-3">
                    <i class="fas fa-shopping-basket mr-2"></i>Add to basket
                    </button>
                    @endif
                    <button class="btn btn-outline-secondary flex-grow-1 py-3 wishlistBtn">
                    <i class="fas fa-bookmark mr-2"></i>Save for later
                    </button>
                    </div>


                    <div class="border-top pt-3">
                        <a href="#" class="text-decoration-none text-primary">
                            <i class="fas fa-chevron-down me-2"></i>2 More Compos
                        </a>
                    </div>
                </div>
            </div>



        </div>
    </div>


    <!-- here is third section started  -->
    <div class="container">
        <div class="row g-0">
            <div class="mt-5">
                <!-- Why Choose Bigbasket Section -->
                <h3 class="text-center mb-4">Why choose Mango baba?</h3>
                <div class="row text-center">
                    <div class="col-6 col-md-3 py-1">
                        <div class="p-3 why_choose">
                            <span class="icons_circle">
                                <i class="fas fa-check-circle fa-2x"></i>
                            </span>
                            <h5>Quality</h5>
                            <p>You can trust</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 py-1">
                        <div class="p-3 why_choose">
                            <span class="icons_circle">
                                <i class="fas fa-clock fa-2x"></i>
                            </span>
                            <h5>On time</h5>
                            <p>Guarantee</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 py-1">
                        <div class="p-3 why_choose">

                            <span class="icons_circle">
                                <i class="fas fa-truck fa-2x"></i>
                            </span>
                            <h5>Free Delivery</h5>
                            <p>Free</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 py-1">
                        <div class="p-3 why_choose">

                            <span class="icons_circle">
                                <i class="fas fa-undo fa-2x"></i>
                            </span>
                            <h5>Return Policy</h5>
                            <p>No Question asked</p>
                        </div>

                    </div>
                </div>
                <!-- Product Details Section -->
                <div class="mt-5">
                    <div class="card module">
                        <!-- Header for "About the Product" -->
                        <div class="card-header d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#collapseAboutProduct" aria-expanded="true">
                            <h5 class="mb-0">About the Product</h5>
                            <span class="accicon"><i class="fa fa-angle-down rotate-icon"></i></span>
                        </div>
                        <!-- Body for "About the Product" -->
                        <div id="collapseAboutProduct" class="collapse show">
                            <div class="card-body">
                                <p>
                           {{ $product->description }}
                                </p>
                            </div>
                        </div>

                        <!-- Header for "Other Product Info" -->
                        <div class="card-header d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#collapseOtherInfo" aria-expanded="false">
                            <h6>Other Product Info</h6>
                            <span class="accicon"><i class="fa fa-angle-down rotate-icon"></i></span>
                        </div>
                        <!-- Body for "Other Product Info" -->
                        <div id="collapseOtherInfo" class="collapse">
                            <div class="card-body">
                                <p>EAN Code: 10000070</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    

        <!-- here is fourth section started  -->
        <div class="container mt-4">
        <div class="row g-0">
        <h4 class="fw-bold">Rating and Reviews</h4>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Write a Review
</button>
        <div class="alert alert-light d-flex align-items-center" role="alert">

            <i class="fas fa-comment-alt me-2"></i> Want to rate this product? You can rate or review this product only after purchasing from bigbasket
        </div>
            <div class="col-12 p-1 col-md-5">
                <div class="p-3 border rounded rating_box">
                    <h2 class="text-success fw-bold">4.1 <i class="fas fa-star text-success"></i></h2>
                    <p class="mb-2">444 ratings & 1 review</p>
                    
                    <div>
                        <div class="d-flex align-items-center">
                            <span>5 <i class="fas fa-star"></i></span>
                            <div class="progress w-75 mx-2">
                                <div class="progress-bar bg-success" style="width: 60%"></div>
                            </div>
                            <span>240</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <span>4 <i class="fas fa-star"></i></span>
                            <div class="progress w-75 mx-2">
                                <div class="progress-bar bg-success" style="width: 25%"></div>
                            </div>
                            <span>93</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <span>3 <i class="fas fa-star"></i></span>
                            <div class="progress w-75 mx-2">
                                <div class="progress-bar bg-success" style="width: 15%"></div>
                            </div>
                            <span>57</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <span>2 <i class="fas fa-star"></i></span>
                            <div class="progress w-75 mx-2">
                                <div class="progress-bar bg-warning" style="width: 10%"></div>
                            </div>
                            <span>22</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <span>1 <i class="fas fa-star"></i></span>
                            <div class="progress w-75 mx-2">
                                <div class="progress-bar bg-danger" style="width: 8%"></div>
                            </div>
                            <span>32</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-7 p-1">
                <div class="p-3 border rounded review_box">
                    <h5 class="fw-bold">Product Reviews</h5>
                    <div class="p-3 border rounded bg-light mt-2">
                        <span class="badge bg-success">3 <i class="fas fa-star"></i></span>
                        <strong class="ms-2">Very low quantity as per the price.</strong>
                        <p class="mb-1">Very low quantity as per the price. Taste was good.</p>
                        <small class="text-muted">Abhinav, (2 years ago)</small>
                        <div class="mt-2">
                            <i class="far fa-thumbs-up"></i> <span class="me-3">1</span>
                            <i class="far fa-flag"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
    </div>
@endsection

