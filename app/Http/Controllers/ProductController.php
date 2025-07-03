<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Ensure you import the Product model

class ProductController extends Controller
{
     public function AdminviewProduct()
    {

        $products = Product::orderBy('created_at', 'desc')->paginate(5); // ✅ Correct
        return view('admin.view_product', compact('products'));
    }
 
}
