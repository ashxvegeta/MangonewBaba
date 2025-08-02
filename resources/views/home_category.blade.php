<div class="container my-5" style="background-color: rgb(247 247 247);padding-top: 5px;padding-bottom: 30px;">
    <!-- HomeCategory Section -->
    <div class="homecategory-section-title d-flex justify-content-between align-items-center">
        <h2>Trending Category</h2>
        <hr>
        <div class="d-flex align-items-center">
            <a href="{{ route('product.filter_product_list') }}" class="view-all me-3">View All</a>
            <div class="d-flex align-items-center">
                <button id="homecategory-slider-left" class="btn btn-light me-2" style="padding: 5px;">
                    <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M13.829 19a.998.998 0 0 1-.78-.373l-4.828-6a1 1 0 0 1 .01-1.267l5-6a1 1 0 1 1 1.536 1.28l-4.474 5.371 4.315 5.362a1 1 0 0 1-.78 1.627Z"
                            fill="#231F20"></path>
                        <mask id="arrow-ios-left_svg__a" mask-type="alpha" maskUnits="userSpaceOnUse" x="8" y="5"
                            width="7" height="14">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M13.829 19a.998.998 0 0 1-.78-.373l-4.828-6a1 1 0 0 1 .01-1.267l5-6a1 1 0 1 1 1.536 1.28l-4.474 5.371 4.315 5.362a1 1 0 0 1-.78 1.627Z"
                                fill="#fff"></path>
                        </mask>
                        <g mask="url(#arrow-ios-left_svg__a)">
                            <path fill="#606060" d="M0 0h24v24H0z"></path>
                        </g>
                    </svg>
                </button>
                <button id="homecategory-slider-right" class="btn btn-light" style="padding: 5px;">
                    <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M10 19a1 1 0 0 1-.768-1.64l4.476-5.371-4.316-5.362a1 1 0 0 1 1.56-1.254l4.828 6a1 1 0 0 1-.011 1.267l-5 6a1 1 0 0 1-.77.36Z"
                            fill="#231F20"></path>
                        <mask id="arrow-ios-right_svg__a" mask-type="alpha" maskUnits="userSpaceOnUse" x="9" y="5"
                            width="8" height="14">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M10 19a1 1 0 0 1-.768-1.64l4.476-5.371-4.316-5.362a1 1 0 0 1 1.56-1.254l4.828 6a1 1 0 0 1-.011 1.267l-5 6a1 1 0 0 1-.77.36Z"
                                fill="#fff"></path>
                        </mask>
                        <g mask="url(#arrow-ios-right_svg__a)">
                            <path fill="#606060" d="M0 0h24v24H0z"></path>
                        </g>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- HomeCategory List -->
    <div id="homecategory-slider" class="overflow-hidden">
        <div class="d-flex min-w-full duration-300" style="transform: translateX(0%);" id="homecategory-slider-track">
            <ul class="d-flex justify-start p-0 m-0" style="list-style: none;">
                @foreach($categories as $category)
                <li class="px-2">
                    <div class="homecategory-card border rounded" style="">
                        <div class="position-relative">
                            <a href="{{ route('product.details') }}">
                                <img src="{{ asset('images/categories/' . ($category->image ?? 'default.jpg')) }}" alt="{{ $category->name }}" class="w-100">
                            </a>
                        </div>
                        <div class="index-homecategory-details p-2">
                            <p class="homecategory-title">{{ $category->name }}</p>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>