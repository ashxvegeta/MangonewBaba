<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Models\Rating;

class FrontendController extends Controller
{
    //
    public function index()
    {
        $mangoesProducts = Product::where('cate_id', 1)->get();
        $categories = Category::where('status', 1)->get();
        return view('index', compact('mangoesProducts', 'categories'));
    }

    public function Category()
    {
        $categories = Category::where('status', 1)->get();
        return view('user.category', compact('categories'));
    }

    public function ViewCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        if (!$category) {
            return redirect()->route('category')->with('error', 'Category not found');
        }
        $products = Product::where('cate_id', $category->id)->where('status', 1)->get();
        return view('view_category', compact('category', 'products'));
    }

    public function ViewProduct($cat_slug, $product_slug)
    {
       if(Category::where('slug', $cat_slug)->exists()) {
            if(Product::where('slug', $product_slug)->exists()) {
                $product = Product::where('slug', $product_slug)->first();
                $category = Category::where('id', $product->cate_id)->first();
                $rating =  Rating::where('prod_id',$product->id)->get();
                $totalRatings = $rating->count();
                $rating_sum =  Rating::where('prod_id',$product->id)->sum('star_rated');
                $averageRating =   $rating_sum/$rating->count();
                $ratingsCounts = [
                    5=>$rating->where('star_rated',5)->count(),
                    4=>$rating->where('star_rated',4)->count(),
                    3=>$rating->where('star_rated',3)->count(),
                    2=>$rating->where('star_rated',2)->count(),
                    1=>$rating->where('star_rated',1)->count(),
                ];
                // $ratingPercent = [];
                // foreach ($ratingsCounts as $star => $count) {
                // $ratingPercent[$star] = $totalRatings > 0 ? round(($count / $totalRatings) * 100, 1) : 0;
                // }
                $ratingPercent = [];
                foreach($ratingsCounts as $star=>$count){
                 $ratingPercent[$star] = $totalRatings > 0  ? round(($count/$totalRatings)*100,1):0;
                }
                $review_count = $rating->whereNotNull('review')->where('review','!=','')->count();
                return view('product_main', compact('product', 'category','averageRating','ratingsCounts','ratingPercent','review_count','totalRatings'));
            } else {
                return redirect()->route('view-category', $cat_slug)->with('error', 'Product not found');
            }
          
        } else {
            return redirect()->route('category')->with('error', 'Category not found');
        }
    }
}


