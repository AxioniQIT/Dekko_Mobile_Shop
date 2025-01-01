<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.product.viewproduct', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.addproduct', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'brand' => 'nullable|string|max:255',
            'model' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'reorder_threshold' => 'nullable|integer|min:0',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,category_id',
        ]);

        Product::create([
            'product_name' => $request->product_name,
            'brand' => $request->brand,
            'model' => $request->model,
            'price' => $request->price,
            'stock_quantity' => $request->stock_quantity,
            'reorder_threshold' => $request->reorder_threshold,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'user_id' => auth()->id(), // Fallback to default user ID
        ]);

        return redirect()->route('admin.product')->with('success', 'Product created successfully.');
    }


    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.product.editproduct', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'brand' => 'nullable|string|max:255',
            'model' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'reorder_threshold' => 'nullable|integer|min:0',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,category_id',
        ]);

        $product->update($request->all());
        return redirect()->route('admin.product')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.product')->with('success', 'Product deleted successfully.');
    }
}