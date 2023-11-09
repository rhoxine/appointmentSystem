<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function show_category()
    {
        return view('admin_side.category');
    }
    public function store(Request $request)
    {
        // Validate the input data (add validation rules as needed)
        $request->validate([
            'category_name' => 'required',
        ]);

        // Create a new appointment record in the database
        $category = new Category();
        $category->category_name = $request->input('category_name');

        $category->save();
        return redirect()->back()->with('success', 'Category added successfully');
    }

    public function get_categories()
    {
        $categories = Category::all();
        return view('admin_side.category', compact('categories'));
    }

    //populate the category field with categories from added categories
    public function showCategoryForm()
    {
        $categories = Category::all();
        return view('admin_side.category', compact('categories'));
    }

    public function destroy($category_id)
    {
        // Find the category by its ID
        $category = Category::find($category_id);

        // Check if the category exists
        if ($category) {
            // Delete the category
            $category->delete();
            return redirect()->back()->with('success', 'Category deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Category not found');
        }
    }

}

