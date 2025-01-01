<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product.categories.viewcategory', ['categories' => Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.categories.addcategory');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories,category_name',
            'description' => 'nullable|string',
        ]);

        Category::create($request->all());
        return redirect()->route('admin.product.categories.store')->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        return view('admin.product.categories.editcategory', compact('category'));
    }


    /**
     * Update the specified category in the database.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category_name' => 'required|unique:categories,category_name,' . $category->category_id . ',category_id',
            'description' => 'nullable|string',
        ]);

        $category->update($request->only('category_name', 'description'));

        return redirect()->route('admin.product.categories.view')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.product.categories.view')->with('success', 'Category deleted successfully.');
    }
}