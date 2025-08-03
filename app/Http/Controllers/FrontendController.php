<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;


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
                 return view('product_main', compact('product', 'category'));
            } else {
                return redirect()->route('view-category', $cat_slug)->with('error', 'Product not found');
            }
          
        } else {
            return redirect()->route('category')->with('error', 'Category not found');
        }
    }
}


