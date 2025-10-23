<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductVariant;


class CartController extends Controller
{
    //
    public function addToCart(Request $request)
    {
        
        $productId = $request->input('prod_id');
        $quantity = $request->input('prod_qty');
        $variantId = $request->input('variant_id');

        // Get the authenticated user
        $user = $request->session()->get('user');
        // Check if the user is authenticated
        if (!$user) {
            return response()->json(['status' => 'error', 'message' => 'You need to be logged in to add items to the cart.']);
        }
        // Create or update the cart item
        $cartItem = Cart::updateOrCreate(
    [
        'user_id' => $user->id,
        'prod_id' => $productId,
        'variant_id' => $variantId  // include variant here
    ],
    [
        'prod_qty' => $quantity
    ]
);
        $cartcount = Cart::where('user_id',session('user')->id)->get()->count();
        return response()->json([
        'status' => 'success',
        'message' => 'An item has been added to cart successfully!',
        'cart_count' => $cartcount
    ]);
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
            $cartcount = Cart::where('user_id',session('user')->id)->get()->count();
            return response()->json(['status' => 'success', 'message' => 'Cart item deleted successfully!', 'cart_count' => $cartcount]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Cart item not found.']);
        }
    }

public function updateCartItem(Request $request)
{
    $userId = session('user')->id;
    $prod_id = $request->input('prod_id');
    $variant_id = $request->input('variant_id');
    $quantity = $request->input('prod_qty');

    // ✅ find the exact cart item (product + variant)
    $cartItem = Cart::where('user_id', $userId)
        ->where('prod_id', $prod_id)
        ->where('variant_id', $variant_id)
        ->first();

    if (!$cartItem) {
        return response()->json(['status' => 'error', 'message' => 'Cart item not found']);
    }

    // ✅ update quantity
    $cartItem->prod_qty = $quantity;
    $cartItem->save();

    // ✅ fetch variant price or fallback to product price
    $variant = ProductVariant::find($variant_id);
    $sellingPrice = $variant ? $variant->price : $cartItem->product->selling_price;
    $originalPrice = $variant ? $variant->original_price : $cartItem->product->original_price;

    // ✅ calculate item subtotal
    $itemSubtotal = $sellingPrice * $quantity;

    // ✅ calculate cart total and savings
    $cartItems = Cart::where('user_id', $userId)->get();
    $cartTotal = 0;
    $totalSavings = 0;

    foreach ($cartItems as $item) {
        $v = ProductVariant::find($item->variant_id);
        $price = $v ? $v->price : $item->product->selling_price;
        $orig = $v ? $v->original_price : $item->product->original_price;
        $cartTotal += $price * $item->prod_qty;
        $totalSavings += ($orig - $price) * $item->prod_qty;
    }

    return response()->json([
        'status' => 'success',
        'item_subtotal' => number_format($itemSubtotal, 2),
        'cart_total' => number_format($cartTotal, 2),
        'total_savings' => number_format($totalSavings, 2),
        'message' => 'Cart updated successfully!'
    ]);
}



    static function countcartproduct(){
    $userId = session('user')->id;
    return Cart::where('user_id',$userId)->count();
    }


}
