<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function category()
    {
        $categories = Category::all();
        return view('admin.category', compact('categories'));
    }

    public function store(Request $req)
    {
         $req->validate([
            'category' => "required|string",
        ]);

        Category::create([
            'category_name' => $req->category,
        ]);
        return back()->with('success', 'Category created successfully!');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:categories,id', 
            'category' => 'required|string|max:255',
        ]);
        $id = $request->input('id');

        $category = Category::findOrFail($id);
        $category->update([
            'category_name' => $validated['category'],
        ]);
    
        return redirect()->route('admin.category')->with('success', 'Category updated successfully!');
    }
    

    public function delete(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:categories,id', 
        ]);

        $id = $request->input('id');
        $category = Category::find($id);
    
        if (!$category) {
            return redirect()->back()->with('error', 'Data not found.');
        }
    
        $category->delete();
    
        return redirect()->back()->with('success', 'Deleted Successfully');
    }


}
