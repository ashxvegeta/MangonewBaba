    <div class="container">
        <div class="row" id="header-logo">
            <!-- Logo -->
            <div class="site_logo">
                <a href="/" class="logo">MangoBaba</a>
            </div>

            <!-- Search Bar (Desktop) -->
            <div class="search-bar">
               <form action="{{ route('search') }}" method="post">
                   @csrf
                   <input type="text" placeholder="Search for products..." name="search" class="border border-success" id="search-input">
                   <button class="search-btn" id="search-btn" type="submit"> <i class="fa fa-search"></i></button>
               </form>
                <div id="search-results"></div>
            </div>

            <div class="profile mr-2 bg-secondary" style="border-radius: 50px; cursor: pointer;" id="profileBtn">
    <i class="fa fa-solid fa-user text-white p-2"></i>
</div>


<div id="sidebarMenu" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" id="closeSidebar">&times;</a>
    <a href="#">My Account</a>
    @php
    use App\Models\Wishlist;
    if(session('user')) {
        $userId = session('user')->id;
        if($userId) {
        $wishlistCount = Wishlist::where('user_id', $userId)->count();
        } else {    
        $wishlistCount = 0;
        }
    } else {
        $userId = null;
    }
    if(!$userId) {
        $wishlistCount = 0;
    }
    @endphp
    @if($wishlistCount > 0)
    <a href="{{ route('view_cart') }}">My Basket <span class="stock-label red">{{ $wishlistCount }} items</span></a>
    @endif
    <a href="{{ route('user.orders') }}">My Orders</a>
    <!-- <a href="#">My Smart Basket</a> -->
    <!-- <a href="#">My Wallet <span class="stock-label green">₹0</span></a> -->
    <a href="#">Contact Us</a>
    <a href="{{ route('logout') }}">Logout</a>
</div>
            <!-- Login/Signup Buttons -->
            <!-- <div>
                @if(!session('user'))
                <button class="login-signup-btn">Login/Sign Up</button>
               @else
               <button class="login-signup-btn"><a class="text-white" href="{{ route('logout') }}">Logout</a></button>
                @endif
            </div> -->
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