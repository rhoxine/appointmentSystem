<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;

class InventoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'product_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('product_image')) {
            // $product_imagePath = $request->file('profile')->store('profiles', 'public');
            $product_imagePath = $request->file('product_image')->store('profiles', 'public');

        } else {
            $product_imagePath = null;
        }

        $products = new Inventory();
        $products->product_name = $request->input('product_name');
        $products->description = $request->input('description');
        $products->price = $request->input('price');
        $products->quantity = $request->input('quantity');
        $products->product_image = $product_imagePath;

        $products->save();
        return redirect()->back()->with('success', 'Product added successfully');
    }

    public function get_products()
{
    $products = Inventory::all();
    // dd($products); // Uncomment this line for debugging
    return view('admin_side.inventory', compact('products'));
}



    public function destroy($product_id)
    {
        // Find the category by its ID
        $product = Inventory::find($product_id);

        // Check if the category exists
        if ($product) {
            // Delete the category
            $product->delete();
            return redirect()->back()->with('success', 'Product deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Product not found');
        }
    }

    public function edit($product_id)
    {
        $products = Inventory::find($product_id);
        return view('product.edit', compact('products'));
    }


    public function update(Request $request, $product_id)
    {
        $product = Inventory::find($product_id);

        if ($product) {
            $product->product_name = $request->input('product_name');
            $product->description = $request->input('description');
            $product->price = $request->input('price');
            $product->quantity = $request->input('quantity');


            $product->save();

            return redirect()->back()->with('success', 'Product updated successfully');
        } else {
            return redirect('/inventory')->with('error', 'Product not found');
        }
    }


    // public function updateQuantity(Request $request)
    // {
    //     $productId = $request->input('product_id');
    //     $quantity = $request->input('quantity');
    
    //     $product = Inventory::find($productId);
    
    //     if ($product) {
    //         $product->quantity = $quantity;
    //         $product->save();
    //         return response()->json(['message' => 'Quantity updated successfully']);
    //     } else {
    //         return response()->json(['message' => 'Product not found'], 404);
    //     }
    // }

}
