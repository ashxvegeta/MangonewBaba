<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Order;

class RatingController extends Controller
{
    //
    public function addRating(Request $request)
{
    $star_rated = $request->input('product_rating');
    $product_id = $request->input('product_id');
    $review =  $request->review;
    $userId = session('user')->id;

    $product_check = Product::where('id', $product_id)->where('status', 1)->first();
    
    if($product_check) {
      
        $verified_purchase = Order::where('orders.user_id', $userId)
            ->join('orders_items', 'orders.id', 'orders_items.order_id')
            ->where('orders_items.prod_id', $product_id)->get();
            
        if($verified_purchase) {
            $existing_rating = Rating::where('user_id', $userId)->where('prod_id', $product_id)->first();
            if($existing_rating) {
                $existing_rating->star_rated = $star_rated; // Fixed variable name
                $existing_rating->review = $review;
                $existing_rating->update();
            } else {
                Rating::create([ // Fixed typo in 'create'
                    'user_id' => $userId,
                    'prod_id' => $product_id,   
                    'star_rated' => $star_rated,
                    'review' => $review
                ]);
            }
            return redirect()->back()->with('success', 'You have successfully rated the product');
        } else {
            return redirect()->back()->with('error', 'You can not rate this product without purchasing a product');
        }
    } else {
        return redirect()->back()->with('error', 'The link you followed was invalid');
    }
}
}
