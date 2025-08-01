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
}


