<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function addToCart(Request $request)
    {
        
        $productId = $request->input('prod_id');
        $quantity = $request->input('prod_qty');

        // Get the authenticated user
        $user = $request->session()->get('user');
        // Check if the user is authenticated
        if (!$user) {
            return response()->json(['status' => 'error', 'message' => 'You need to be logged in to add items to the cart.']);
        }
        // Create or update the cart item
        $cartItem = Cart::updateOrCreate(
            ['user_id' => $user->id, 'prod_id' => $productId],
            ['prod_qty' => $quantity]
        );
        return response()->json(['status' => 'success', 'message' => 'An item has been added to cart successfully!']);
    }
}
