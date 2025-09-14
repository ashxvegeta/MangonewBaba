<?php

namespace App\Http\Controllers;

use App\Models\cr;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Product;

class WishlistController extends Controller
{
    
    public function addToWishlist(Request $request)
    {

        
        $user_id = session('user')['id'];
         $product_id = $request->input('prod_id');

        // Check if the item is already in the wishlist
        $existingWishlistItem = Wishlist::where('user_id', $user_id)
            ->where('product_id', $product_id)
            ->first();

        if ($existingWishlistItem) {
            return response()->json(['message' => 'Item already in wishlist'], 200);
        }

        // Add the item to the wishlist
        $wishlistItem = new Wishlist();
        $wishlistItem->user_id = $user_id;
        $wishlistItem->product_id = $product_id;
        $wishlistItem->save();

        return response()->json(['status' => 'success', 'message' => 'Item added to wishlist'], 201);
    }

    public function mywishlist()
    {
        $user_id = session('user')['id'];

    // Get wishlist items for the user
    $wishlistItems = Wishlist::where('user_id', $user_id)->get();

    // Fetch products details based on wishlist product_ids
    $products = Product::whereIn('id', $wishlistItems->pluck('product_id'))->get();

    return view('wishlist', compact('wishlistItems', 'products'));
}

 
}
