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

            <!-- Login/Signup Buttons -->
            <div>
                <button class="login-signup-btn">Login/Sign Up</button>
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
                    <span class="cart-count-badge text-success">{{ $cartCount > 0 ? $cartCount : '' }}</span>
                </a>
            </div>
        </div>
    </div>
</div>