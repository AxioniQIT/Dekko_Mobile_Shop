<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SparePart;



class SparePartsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all spare parts with brand names
        $spareParts = SparePart::with('brands')->get();
        return view('admin.spareparts.viewspareparts');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get all unique brand names
        $brands = Brand::all()->unique('brand_name');
        return view('admin.spareparts.addspareparts', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'brand_id' => 'required|max:255',
            'model_name' => 'required|max:255',
            'sparepart_name' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required|numeric',
            'stock_quantity' => 'required',
        ]);
        // dd($validator);

        $validatedData = $validator;

        $data = [
            'name' => $validatedData['sparepart_name'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'stock_quantity' => $validatedData['stock_quantity'],
        ];

        // create sparepart
        $sparePart = SparePart::create($data);

        // get brand by name
        $brand = Brand::where('model_category_id', $validatedData['brand_id'])->where('model_name', $validatedData['model_name'])->first();
        // pivot table
        $brand->spareParts()->attach($brand->model_category_id, $sparePart->spare_part_id);
        return redirect()->route('admin.spareparts')->with('success', 'Sparepart created successfully.');


    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.spareparts.editspareparts');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
