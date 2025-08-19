    <div class="container">
        <div class="row" id="header-logo">
            <!-- Logo -->
            <div class="site_logo">
                <a href="#" class="logo">MangoBaba</a>
            </div>

            <!-- Search Bar (Desktop) -->
            <div class="search-bar">
                <input type="text" placeholder="Search for products..." name="search" class="border border-dark" id="search-input">
                <button class="search-btn" id="search-btn" type="button"> <i class="fa fa-search"></i></button>
                <div id="search-results"></div>
            </div>

            <div class="profile mr-2 bg-secondary" style="border-radius: 50px; cursor: pointer;" id="profileBtn">
    <i class="fa fa-solid fa-user text-white p-2"></i>
</div>


<div id="sidebarMenu" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" id="closeSidebar">&times;</a>
    <a href="#">My Account</a>
    <a href="#">My Basket <span class="stock-label red">3 items</span></a>
    <a href="#">My Orders</a>
    <a href="#">My Smart Basket</a>
    <a href="#">My Wallet <span class="stock-label green">₹0</span></a>
    <a href="#">Contact Us</a>
    <a href="#">Logout</a>
</div>
            <!-- Login/Signup Buttons -->
            <div>
                @if(!session('user'))
                <button class="login-signup-btn">Login/Sign Up</button>
               @else
               <button class="login-signup-btn"><a class="text-white" href="{{ route('logout') }}">Logout</a></button>
                @endif
            </div>
                @php
                use App\Http\Controllers\CartController;
                $total = 0;
                if(Session::has('user')){
                $cartCount =  CartController::countcartproduct();
                }
                @endphp

            <!-- Add to Cart Icon -->
            <div class="addtocartlogo px-2">
                <a href="{{ route('view_cart') }}" class="addtocart-btn">
                    <i class="fa fa-shopping-cart"></i>
                    <span class="cart-count-badge text-success">@if( session('user') && $cartCount > 0) {{ $cartCount }} @endif</span>
                </a>
            </div>
        </div>
    </div>
</div>