<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showDetails(Request $request)
    {
        return view('product_main');
    }
    public function filter_product_list(Request $request)
    {
        return view('filter_product_list');
    }
 
}
