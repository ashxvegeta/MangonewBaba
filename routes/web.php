<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('index');
});
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
Route::get('admin/home', [AdminController::class, 'AdminDashboard']) ->middleware('admin')->name('admin.home');
Route::get('/details', [ProductController::class, 'showDetails'])->name('product.details');
Route::get('/filter_product_list', [ProductController::class, 'filter_product_list'])->name('product.filter_product_list');