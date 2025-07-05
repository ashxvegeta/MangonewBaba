<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Ensure you import the Product model
use App\Models\Category; // Import Category model if needed

class ProductController extends Controller
{
     public function AdminviewProduct()
    {

        $products = Product::orderBy('created_at', 'desc')->paginate(5); // ✅ Correct
        return view('admin.view_product', compact('products'));
    }

    public function AdminaddProduct()
    {
        $categories = Category::all(); // Fetch all categories if needed
        return view('admin.add_product', compact('categories')); // Ensure this view exists
    }
    public function AdminStoreProduct(Request $request)
    {
        //  return $request->all();  // Uncomment this line for debugging
         $request->validate([
        'cate_id' => 'required|exists:categories,id',
    'name' => 'required|string|max:255',
    'slug' => 'required|string|max:255|unique:products,slug',
    'small_description' => 'required|string|max:1000',
    'description' => 'required|string',
    'original_price' => 'required|numeric',
    'selling_price' => 'required|numeric',
    'qty' => 'required|integer|min:0',
    'tax' => 'required|numeric|min:0',
    'status' => 'required|boolean',
    'trending' => 'required|boolean',
    'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         ]);
         $imageName = null;

            if ($request->hasFile('image')) {
                $image = $request->file('image');    
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                
                // ✅ Use move() on the uploaded file instance
                $image->move(public_path('images/products'), $imageName);
            }

            // If `id` is present, it's an update
            if ($request->filled('id')) {
                $product = Product::findOrFail($request->id);

                $product->update([
                    'cate_id' => $request->cate_id,
                    'name' => $request->name,
                    'slug' => $request->slug,
                    'small_description' => $request->small_description,
                    'description' => $request->description,
                    'original_price' => $request->original_price,
                    'selling_price' => $request->selling_price,
                    'image' => $imageName, // assuming image is uploaded
                    'qty' => $request->qty,
                    'tax' => $request->tax,
                    'status' => $request->status,
                    'trending' => $request->trending,
                ]);
            } else {
                // Create new product
                Product::create([
                    'cate_id' => $request->cate_id,
                    'name' => $request->name,
                    'slug' => $request->slug,
                    'small_description' => $request->small_description,
                    'description' => $request->description,
                    'original_price' => $request->original_price,
                    'selling_price' => $request->selling_price,
                    'image' => $imageName, // assuming image is uploaded
                    'qty' => $request->qty,
                    'tax' => $request->tax,
                    'status' => $request->status,
                    'trending' => $request->trending,
                ]);
            }

            return redirect()->back()->with('success', 'Product saved successfully!');

    }
}
