<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CheckoutController extends Controller
{
    //

    public function Checkout()
    {
        
        $oldcartItems = Cart::where('user_id', session('user')->id)->get();
        //check for out of stock items
        foreach($oldcartItems as $item) {
           if(!Product::where('id', $item->prod_id)->where('qty', '>=', $item->prod_qty)->exists()) {
               $removeItem = Cart::where('user_id', session('user')->id)
                   ->where('prod_id', $item->prod_id)
                   ->first();
                   $removeItem->delete();
           }
        }
        // get the fresh cart items after deletion the out of stock items
        $cartItems = Cart::where('user_id', session('user')->id)->get();
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.view')->with('error', 'Your cart is empty. Please add items to your cart before proceeding to checkout.');
        }
        return view('checkout', compact('cartItems'));
    }
}
