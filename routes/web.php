<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminDashboardController;

Route::get('/', [FrontendController::class, 'index']);
Route::get('/category', [FrontendController::class, 'Category'])->name('category');
Route::get('/view-category/{slug}', [FrontendController::class, 'ViewCategory'])->name('view-category');
Route::get('/category/{cat_slug}/{product_slug}', [FrontendController::class, 'ViewProduct']);
Route::get('/signup', function () {
return view('user.signup');
});
Route::get('/signin', function () {
    return view('user.signin');
})->name('signin');
Route::get('/logout', function () {
     Session::forget('user');
    return redirect()->route('signin');
});
Route::get('/no-access', function () {
    return 'You are not authorized to access this page.';
});
Route::post('/register', [UserController::class, 'Register'])->name('register');
Route::post('/login', [UserController::class, 'Login'])->name('login');
Route::get('/logout', function () {
    Session::forget('user');
    return redirect()->route('signin');
})->name('logout');
// Route::get('admin/home', [AdminController::class, 'AdminDashboard']) ->middleware('admin')->name('admin.home');
Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/home', [AdminController::class, 'AdminDashboard'])->name('admin.home');
    Route::get('/view-admin-category', [CategoryController::class, 'AdminviewCategory'])->name('view-admin-category');
    Route::get('/add-admin-category', [CategoryController::class, 'AdminaddCategory'])->name('add-admin-category');
    Route::post('/store-admin-category', [CategoryController::class, 'AdminStoreCategory'])->name('categories.store');
    Route::get('categories/{id}/delete', [CategoryController::class, 'AdminCategorydestroy'])->name('categories.delete');
    Route::get('categories/{id}/edit', [CategoryController::class, 'AdmineditCategory'])->name('categories.edit');
    // products route
    Route::get('/view-admin-product', [ProductController::class, 'AdminviewProduct'])->name('view-admin-product');
    Route::get('/add-admin-product', [ProductController::class, 'AdminaddProduct'])->name('add-admin-product');
    Route::post('/store-admin-product', [ProductController::class, 'AdminStoreProduct'])->name('product.store');
    Route::get('products/{id}/delete', [ProductController::class, 'AdminProductdestroy'])->name('products.delete');
    Route::get('products/{id}/edit', [ProductController::class, 'AdmineditProduct'])->name('products.edit');
    Route::get('/view-admin-orders', [AdminController::class, 'AdminviewOrders'])->name('view-admin-orders');
    Route::get('/admin-order-details/{id}', [AdminController::class, 'AdminOrderDetails'])->name('admin.order.details');
    Route::get('/view-admin-users', [AdminDashboardController::class, 'AdminviewUsers'])->name('view-admin-users');
    
});
Route::middleware(['user'])->group(function () {
    Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
    Route::get('/basketcart', [CartController::class, 'viewCart'])->name('view_cart');
    Route::post('/delete-cart-item', [CartController::class, 'deleteCartItem'])->name('delete-cart-item');
    Route::post('/update-cart', [CartController::class, 'updateCartItem'])->name('update-cart');
    Route::get('/checkout', [CheckoutController::class, 'Checkout'])->name('checkout');
    Route::post('/checkout/place-order', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');
    Route::get('/my-orders', [UserController::class, 'userOrders'])->name('user.orders');
    Route::get('/orders/fetch', [UserController::class, 'fetchOrders'])->name('orders.fetch');
    Route::get('/order/details/{id}', [UserController::class, 'orderDetails'])->name('order.details');
});
Route::get('/details', [ProductController::class, 'showDetails'])->name('product.details');
Route::get('/filter_product_list', [ProductController::class, 'filter_product_list'])->name('product.filter_product_list');