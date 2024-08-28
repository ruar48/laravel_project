<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function product()
    {
        $categories = Category::all();
        $products = Product::all(); 
        return view('admin/products', compact('categories', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,jfif|max:5120',
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric',
            'serial_number' => 'nullable|string|unique:products',
            'parent_id' => 'nullable|exists:products,id'
        ]);

         if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
        } else {
            $imagePath = null;
        }

        $product = Product::create([
            'image' => $imagePath,
            'name' => $request->input('name'),
            'category_id' => $request->input('category_id'),
            'quantity' => $request->input('quantity'),
            'price' => $request->input('price'),
            'serial_number' => $request->input('serial_number'),
            'parent_id' => $request->input('parent_id'),
        ]);

        return redirect()->back()->with('success', 'Product added successfully!');


    }

    public function update(Request $request)
    {
        // Validate the request data
        $request->validate([
            'id' => 'required|exists:products,id',
            'name' => 'required|string|max:255',
            'parent_product_id' => 'nullable|exists:products,id',
            'category_id' => 'required|exists:categories,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'serial_number' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
    
        // Find the product by ID
        $product = Product::findOrFail($request->id);
    
        // Update product attributes
        $product->name = $request->name;
        $product->parent_product_id = $request->parent_id;
        $product->category_id = $request->category_id;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->serial_number = $request->serial_number;
    
        // Handle the image upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($product->image && \Storage::exists($product->image)) {
                \Storage::delete($product->image);
            }
    
            // Store the new image
            $imagePath = $request->file('image')->store('product_images', 'public');
    
            // Update the product's image path
            $product->image = $imagePath;
        }
    
        // Save the updated product
        $product->save();
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Product updated successfully.');
    }


public function delete(Request $request)
{
    $validated = $request->validate([
        'id' => 'required|exists:products,id',  
    ]);

    $id = $request->input('id');
    $product = Product::find($id);

    if (!$product) {
        return redirect()->back()->with('error', 'Data not found.');
    }

    if ($product->image) {
        \Storage::disk('public')->delete($product->image);
    }

    $product->delete();

    return redirect()->back()->with('success', 'Deleted Successfully');
}

}
