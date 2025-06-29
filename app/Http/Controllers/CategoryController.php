<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    //

    public function AdminviewCategory()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(5); // ✅ Correct
        return view('admin.view_category', compact('categories'));
    }


     public function AdminaddCategory()
    {
        
        return view('admin.add_category');
    }


  public function AdminStoreCategory(Request $request)
   {
    $request->validate([
        'name' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:categories,slug',
        'description' => 'nullable|string|max:1000',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'status' => 'required|boolean',
        'popular' => 'required|boolean',
        'meta_title' => 'nullable|string|max:255',
        'meta_keywords' => 'nullable|string|max:255',
        'meta_descrip' => 'nullable|string|max:1000',
    ]);

    $imageName = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/categories'), $imageName);
    }

    Category::create([
        'name' => $request->name,
        'slug' => $request->slug,
        'description' => $request->description,
        'image' => $imageName,
        'status' => $request->status,
        'popular' => $request->popular,
        'meta_title' => $request->meta_title,
        'meta_keywords' => $request->meta_keywords,
        'meta_descrip' => $request->meta_descrip,
    ]);

    return redirect()->back()->with('success', 'Category added successfully!');
}

}
