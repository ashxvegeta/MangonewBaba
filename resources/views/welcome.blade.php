@extends('layouts.master')

@section('title', 'Product Filters')

@section('content')
<div class="row g-0">
    <h5>Fruits & Vegetables</h5>
    <div class="filters d-flex justify-content-between align-items-center mb-3">
        <div class="filter-hide">
            <button class="btn d-flex align-items-center" id="hideFilterBtn">
                <i class="fa-solid fa-filter-circle-xmark me-2"></i> Hide Filter
            </button>
        </div>
        <div class="filter-relevance">
            <button class="btn d-flex align-items-center" id="relevanceBtn">
                <i class="fa-solid fa-ranking-star me-2"></i> Relevance
            </button>
        </div>
    </div>
    <hr class="dotted_line">
    <!-- Filter Sidebar -->
    <aside class="col-md-3">
        <div class="filter-sidebar">
            <!-- Example Filter (Categories) -->
            <div class="mb-3">
                <label class="fw-bold form-label">Shop By Category</label>
                <div class="p-2.5 pt-0 flex flex-col bg-white border shadow-sm rounded-2xs">
                    <ul class="list-unstyled m-2" id="category-navigation">
                        <li class="category-item">
                            <a class="text-decoration-none text-darkkkk" href="/cl/fruits-vegetables/?nc=ct-fa">Fruits & Vegetables</a>
                        </li>
                        <li class="category-item">
                            <a class="text-decoration-none text-darkkkk" href="/pc/fruits-vegetables/cuts-sprouts/?nc=ct-fa">Cuts & Sprouts</a>
                        </li>
                        <li class="category-item">
                            <a class="text-decoration-none text-darkkkk" href="/pc/fruits-vegetables/exotic-fruits-veggies/?nc=ct-fa">Exotic Fruits & Veggies</a>
                        </li>
                        <li class="category-item">
                            <a class="text-decoration-none text-darkkkk" href="/pc/fruits-vegetables/flower-bouquets-bunches/?nc=ct-fa">Flower Bouquets, Bunches</a>
                        </li>
                        <li class="category-item additional-category d-none">
                            <a class="text-decoration-none text-darkkkk" href="/pc/fruits-vegetables/fresh-fruits/?nc=ct-fa">Fresh Fruits</a>
                        </li>
                        <li class="category-item additional-category d-none">
                            <a class="text-decoration-none text-darkkkk" href="/pc/fruits-vegetables/fresh-vegetables/?nc=ct-fa">Fresh Vegetables</a>
                        </li>
                        <li class="category-item additional-category d-none">
                            <a class="text-decoration-none text-darkkkk" href="/pc/fruits-vegetables/herbs-seasonings/?nc=ct-fa">Herbs & Seasonings</a>
                        </li>
                        <li class="category-item additional-category d-none">
                            <a class="text-decoration-none text-darkkkk" href="/pc/fruits-vegetables/organic-fruits-vegetables/?nc=ct-fa">Organic Fruits & Vegetables</a>
                        </li>
                    </ul>
                    <span class="show-more-categories m-2" id="showMoreCategories">Show more +</span>
                </div>
            </div>
            <!-- Product rating Filter -->
            <div class="mb-3">
                <div class="card">
                    <!-- Header for "Product Rating" -->
                    <div class="card-header d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#collapseProductRating" aria-expanded="false">
                        <span class="fw-bold">Product Rating</span>
                        <span class="accicon"><i class="fa fa-angle-down rotate-icon"></i></span>
                    </div>
                    <!-- Collapsible Body for "Product Rating" -->
                    <div id="collapseProductRating" class="collapse show">
                        <div class="card-body">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="5" id="rating5">
                                <label class="form-check-label" for="rating5">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="4" id="rating4">
                                <label class="form-check-label" for="rating4">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="3" id="rating3">
                                <label class="form-check-label" for="rating3">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="2" id="rating2">
                                <label class="form-check-label" for="rating2">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="rating1">
                                <label class="form-check-label" for="rating1">
                                    <i class="fa-solid fa-star text-danger"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Price Filter -->
            <div class="mb-3">
                <div class="card">
                    <!-- Header for "Product Price" -->
                    <div class="card-header d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#collapseProductPrice" aria-expanded="true">
                        <span class="fw-bold">Product Price</span>
                        <span class="accicon"><i class="fa fa-angle-down rotate-icon"></i></span>
                    </div>
                    <!-- Collapsible Body for "Product Price" -->
                    <div id="collapseProductPrice" class="collapse show">
                        <div class="card-body">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="less_than_20" id="priceLessThan20">
                                <label class="form-check-label" for="priceLessThan20">Less than ₹20</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="20_to_50" id="price20To50">
                                <label class="form-check-label" for="price20To50">₹20 to ₹50</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="50_to_100" id="price50To100">
                                <label class="form-check-label" for="price50To100">₹50 to ₹100</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="100_to_200" id="price100To200">
                                <label class="form-check-label" for="price100To200">₹100 to ₹200</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="above_200" id="priceAbove200">
                                <label class="form-check-label" for="priceAbove200">Above ₹200</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Discount Type Filter -->
            <div class="mb-3">
                <div class="card">
                    <!-- Header for "Discount Type" -->
                    <div class="card-header d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#collapseDiscountType" aria-expanded="true">
                        <span class="fw-bold">Discount Type</span>
                        <span class="accicon"><i class="fa fa-angle-down rotate-icon"></i></span>
                    </div>
                    <!-- Collapsible Body for "Discount Type" -->
                    <div id="collapseDiscountType" class="collapse show">
                        <div class="card-body">
                            <div class="form-check">
                                <input class="form-check-input rounded-circle" type="radio" name="discountType" value="upto_5" id="discountUpto5">
                                <label class="form-check-label" for="discountUpto5">Up to 5%</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input rounded-circle" type="radio" name="discountType" value="5_to_10" id="discount5To10">
                                <label class="form-check-label" for="discount5To10">5% to 10%</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input rounded-circle" type="radio" name="discountType" value="10_to_20" id="discount10To20">
                                <label class="form-check-label" for="discount10To20">10% to 20%</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input rounded-circle" type="radio" name="discountType" value="20_to_50" id="discount20To50">
                                <label class="form-check-label" for="discount20To50">20% to 50%</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input rounded-circle" type="radio" name="discountType" value="above_50" id="discountAbove50">
                                <label class="form-check-label" for="discountAbove50">Above 50%</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </aside>

    <!-- Product List -->
    <section class="col-md-7">
        <h5>Products</h5>
        <hr>
        <div class="product-container">
            <div class="col-md-3 col-lg-3 col-12 my-2">
                <div class="product-card">
                    <div class="position-relative product-image">
                        <span class="discount-badge">35% OFF</span>
                        <img src="https://www.bigbasket.com/media/uploads/p/m/40077518_1-fresho-cucumber.jpg?tr=w-154,q-80" alt="Banana">
                    </div>
                    <div class="product-details">
                        <p class="product-title">Banana - Robusta</p>
                        <select class="form-control quantity-select">
                            <option>1 kg</option>
                            <option>2 kg</option>
                        </select>
                        <p class="product-price">₹42 <span class="original-price">₹64.38</span></p>
                        <button class="btn btn-success btn-block add-to-cart">Add</button>
                    </div>
                </div>
            </div>

            <!-- Product Card2 -->
            <div class="col-md-3 col-12 col-lg-3  my-2">
                <div class="product-card">
                    <div class="position-relative product-image">
                        <span class="discount-badge">20% OFF</span>
                        <img src="https://www.bigbasket.com/media/uploads/p/m/10000025_32-fresho-banana-robusta.jpg?tr=w-154,q-80" alt="Chilli">
                    </div>
                    <div class="product-details">
                        <p class="product-title">Chilli - Green Long</p>
                        <select class="form-control quantity-select">
                            <option>1 kg</option>
                            <option>2 kg</option>
                        </select>
                        <p class="product-price">₹99.73 <span class="original-price">₹124.66</span></p>
                        <button class="btn btn-success btn-block add-to-cart">Add</button>
                    </div>
                </div>
            </div>

            <!-- Product Card3 -->
            <div class="col-md-3 col-12 col-lg-3  my-2">
                <div class="product-card">
                    <div class="position-relative product-image">
                        <span class="discount-badge">20% OFF</span>
                        <img src="https://www.bigbasket.com/media/uploads/p/m/10000333_15-fresho-chilli-green-long-medium.jpg?tr=w-154,q-80" alt="Coriander">
                    </div>
                    <div class="product-details">
                        <p class="product-title">Coriander Leaves</p>
                        <select class="form-control quantity-select">
                            <option>1 kg</option>
                            <option>2 kg</option>
                        </select>
                        <p class="product-price">₹101.92 <span class="original-price">₹127.4</span></p>
                        <button class="btn btn-success btn-block add-to-cart">Add</button>
                    </div>
                </div>
            </div>
            <!-- Product Card4 -->
            <div class="col-md-3 col-12 col-lg-3 my-2">
                <div class="product-card">
                    <div class="position-relative product-image">
                        <span class="discount-badge">15% OFF</span>
                        <img src="https://www.bbassets.com/media/uploads/p/s/40316259_3-fresho-snibs-salad-mix-pack.jpg?tr=w-132,h-132,q-80" alt="Potato">
                    </div>
                    <div class="product-details">
                        <p class="product-title">Potato</p>
                        <select class="form-control quantity-select">
                            <option>1 kg</option>
                            <option>2 kg</option>
                        </select>
                        <p class="product-price">₹30 <span class="original-price">₹35.29</span></p>
                        <button class="btn btn-success btn-block add-to-cart">Add</button>
                    </div>
                </div>
            </div>
            <!-- Product Card5 -->
            <div class="col-md-3 col-12 col-lg-3 my-2">
                <div class="product-card">
                    <div class="position-relative product-image">
                        <span class="discount-badge">15% OFF</span>
                        <img src="https://www.bbassets.com/media/uploads/p/s/10000063_21-fresho-broccoli.jpg?tr=w-132,h-132,q-80" alt="Potato">
                    </div>
                    <div class="product-details">
                        <p class="product-title">Potato</p>
                        <select class="form-control quantity-select">
                            <option>1 kg</option>
                            <option>2 kg</option>
                        </select>
                        <p class="product-price">₹30 <span class="original-price">₹35.29</span></p>
                        <button class="btn btn-success btn-block add-to-cart">Add</button>
                    </div>
                </div>
            </div>
            <!-- Product Card6 -->
            <div class="col-md-3 col-12 col-lg-3 my-2">
                <div class="product-card">
                    <div class="position-relative product-image">
                        <span class="discount-badge">15% OFF</span>
                        <img src="https://www.bbassets.com/media/uploads/p/s/40111610_5-tadaa-boiled-sweet-corn-kernel-spice-up-with-lemon-and-pepper-seasoning.jpg?tr=w-132,h-132,q-80" alt="Potato">
                    </div>
                    <div class="product-details">
                        <p class="product-title">Potato</p>
                        <select class="form-control quantity-select">
                            <option>1 kg</option>
                            <option>2 kg</option>
                        </select>
                        <p class="product-price">₹30 <span class="original-price">₹35.29</span></p>
                        <button class="btn btn-success btn-block add-to-cart">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection