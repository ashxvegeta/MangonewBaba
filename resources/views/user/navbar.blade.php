<div class="container" id="container-mobile">
    <div class="nav_mobile_full">
        <div class="nav-full-width">
            <nav class="navbar navbar-expand-lg navbar-light px-1 w-100">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="profile-dropdown">
                    <a class="nav-link text-secondary" href="#" id="profileDropdown">
                        <i class="fa fa-solid fa-user"></i>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle bg-success text-white rounded" href="#" id="categoriesDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                Shop By Category
                            </a>
                            <div class="dropdown-menu" aria-labelledby="categoriesDropdown">
                                <a class="dropdown-item" href="{{ route('category') }}">Category</a>
                                <a class="dropdown-item" href="#">Dairy & Bakery</a>
                                <a class="dropdown-item" href="#">Snacks</a>
                                <a class="dropdown-item" href="#">Beverages</a>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('category') }}">Demo</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Local For Vocal</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Tea</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Plants</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Beverages</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
