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
        $request->validate([
            'category_name' => 'required',
        ]);

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

    public function showCategoryForm()
    {
        $categories = Category::all();
        return view('admin_side.category', compact('categories'));
    }

    public function destroy($category_id)
    {
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


    public function edit($service_id)
    {
        // $service = DB::select("SELECT * FROM services WHERE service_id = ?", [$service_id]);
        $service = Category::find($service_id);
        return view('services.edit', compact('service'));
    }


    public function update(Request $request, $category_id)
    {
        $categories = Category::find($category_id);

        if ($categories) {
            $categories->category_name = $request->input('category_name');

            $categories->save();

            return redirect('/admin/category')->with('success', 'Category updated successfully');
        } else {
            return redirect('/admin/category')->with('error', 'Category not found');
        }
    }

}

