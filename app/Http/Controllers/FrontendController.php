<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;


class FrontendController extends Controller
{
    //
    public function index()
    {
        $mangoesProducts = Product::where('cate_id', 12)->get();
        return view('index', compact('mangoesProducts'));
    }
}
