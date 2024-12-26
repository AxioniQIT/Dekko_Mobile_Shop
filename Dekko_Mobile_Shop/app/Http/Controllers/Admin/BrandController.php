<?php


namespace App\Http\Controllers\Admin;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all brands
        $brands = Brand::all();
        return view('admin.brand.viewbrand', compact('brands'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.addbrand');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand_name' => 'required|max:255',
            'model_name' => 'required|max:255',
            'description' => 'nullable|max:255',
        ]);

        DB::beginTransaction();

        try {
            Brand::create([
                'brand_name' => $request->brand_name,
                'model_name' => $request->model_name,
                'description' => $request->description,
            ]);

            DB::commit();

            return redirect()->route('admin.brands')->with('success', 'Brand added successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.editbrand', compact('brand'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'brand_name' => 'required|max:255',
            'model_name' => 'required|max:255',
            'description' => 'nullable|max:255',
        ]);

        DB::beginTransaction();

        try {
            $brand = Brand::findOrFail($id);

            $brand->update([
                'brand_name' => $request->brand_name,
                'model_name' => $request->model_name,
                'description' => $request->description,
            ]);

            DB::commit();

            return redirect()->route('admin.brands')->with('success', 'Brand updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('admin.brands')->with('success', 'Brand deleted successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function getModels(Brand $brand)
    {
        // Get all models for the given brand
        $models = Brand::where('brand_name', $brand->brand_name)
            ->get(['brand_id', 'model_name']);
        return response()->json($models);
    }



}
