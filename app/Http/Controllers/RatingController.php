<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Rating;

class RatingController extends Controller
{
    //
    public function addRating(Request $request){

        $star_rated =  $request->input('product_rating');
        $product_id = $request->input('product_id');
        $userId = session('user')->id;
        $product_check = Product::where('id',$product_id)-where('status',0)->first();
        if($product_check){
            $verified_purchase = Order::where('orders.user_id',$userId)
                                ->join('order_items','orders.id','order_items.order_id')
                                ->where('order_items.prod_id',$product_id )->get();
            if($verified_purchase){
                $existing_rating = Rating::where('user_id', $userId)->where('prod_id', $product_id)->first();
                if($existing_rating){
                    $existing_rating->star_rated =  $stars_rated;
                    $existing_rating->update();
                }else{
                    Rating::creat([
                    'user_id'=>$userId,
                    'prod_id'=>$product_id,
                    'star_rated'=>$star_rated
                    ]);
                }
                 return redirect()->back()->with('status','You have successfully rated the  product');

            }else{
                return redirect()->back()->with('status','You can not rate this product without purchasing a product');
            }
        }else{
            return redirect()->back()->with('status','The link you followed was');
        }

    }
}
