<?php
// Sample product data (replace this with a database query in a real application)
$products = [
    [
        "image" => "https://s3.amazonaws.com/ebcwebstore/images/a-7001.jpg",
        "name" => "V.N. Shukla's Constitution of India",
        "price" => 150,
        "quantity" => "1kg",
    ],
    [
        "image" => "https://s3.amazonaws.com/ebcwebstoretest/images/a-100188.png",
        "name" => "Basic Structure Constitutionalism",
        "price" => 200,
        "quantity" => "1kg",
    ],
    [
        "image" => "https://s3.amazonaws.com/ebcwebstoretest/images/a-875.png",
        "name" => "Introduction to Company Law",
        "price" => 120,
        "quantity" => "1kg",
    ],
    [
        "image" => "https://s3.amazonaws.com/ebcwebstoretest/images/a-822.png",
        "name" => "P. L. Malik's Industrial Law (Covering Labour",
        "price" => 50,
        "quantity" => "1 dozen",
    ],
];

// Get the search query
$query = isset($_GET['query']) ? strtolower(trim($_GET['query'])) : '';

// Filter products based on the search query
$filteredProducts = array_filter($products, function($product) use ($query) {
    return strpos(strtolower($product['name']), $query) !== false;
});

// If no products match the search, return a no results message
if (count($filteredProducts) === 0) {
    echo "<p class='text-center w-100'>No products found.</p>";
} else {
    foreach ($filteredProducts as $product) {
        echo '
        <div class="container border-bottom py-3" id="search-results-container">
            <div class="row align-items-center">
                <div class="col-lg-1 col-2 col-md-1 text-center product_image">
                    <img src="' . $product['image'] . '" class="img-fluid" alt="' . htmlspecialchars($product['name']) . '">
                </div>
                <div class="col-lg-2 col-2 col-md-2 product_name">
                    <p class="m-0 product-title" title="' . htmlspecialchars($product['name']) . '">' . htmlspecialchars($product['name']) . '</p>
                </div>
                <div class="col-lg-1 col-1 col-md-2 text-center product_price">
                    <p class="m-0"> ₹ ' . $product['price'] . '</p>
                </div>      
                <div class="col-lg-2 col-1 col-md-2 product-quantity d-flex align-items-center" id="product-quantity-id">
                    <button class="btn btn-sm btn-outline-secondary quantity-decrease">-</button>
                    <input type="number" class="form-control mx-2 text-center quantity-input" value="1" min="1" style="width: 45px;">
                    <button class="btn btn-sm btn-outline-secondary quantity-increase">+</button>
                </div>
                <div class="col-lg-3 col-2 col-md-3 text-center search-add-to-cart">
                    <button class="btn btn-sm btn-primary mr-2">Add to Cart</button>
                </div>
            </div>
        </div>';
    }
}
?>
