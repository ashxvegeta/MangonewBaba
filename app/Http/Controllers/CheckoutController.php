<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CheckoutController extends Controller
{
    //

    public function Checkout()
    {
        $cartItems = Cart::where('user_id', auth()->id())->get();
        return view('checkout', compact('cartItems'));
    }
}
