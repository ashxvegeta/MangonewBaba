<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CheckoutController extends Controller
{
    //

    public function Checkout()
    {
        
        $cartItems = Cart::where('user_id', session('user')->id)->get();
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.view')->with('error', 'Your cart is empty. Please add items to your cart before proceeding to checkout.');
        }
        return view('checkout', compact('cartItems'));
    }
}
