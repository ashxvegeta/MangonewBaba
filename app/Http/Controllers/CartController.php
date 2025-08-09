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

    public function viewCart(Request $request)
    {
        
        $cartItems = Cart::where('user_id',session('user')->id)->get();
        return view('cart', compact('cartItems'));
    }

    public function deleteCartItem(Request $request)
    {
        
        $prod_id = $request->input('prod_id');
        $userId = session('user')->id;

        // Find the cart item
        $cartItem = Cart::where('user_id', $userId)->where('prod_id', $prod_id)->first();

        if ($cartItem) {
            // Delete the cart item
            $cartItem->delete();
            return response()->json(['status' => 'success', 'message' => 'Cart item deleted successfully!']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Cart item not found.']);
        }
    }
}
