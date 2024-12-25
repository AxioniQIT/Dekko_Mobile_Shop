<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SparePart;
use Illuminate\Support\Facades\DB;



class SparePartsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all spare parts with brand names
        $spareParts = SparePart::with('brands')->get();
        return view('admin.spareparts.viewspareparts', compact('spareParts'));
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
        // Validate request data
        $validatedData = $request->validate([
            'brand_id' => 'required|integer|exists:brands,brand_id',
            'model_name' => 'required|max:255|exists:brands,model_name',
            'sparepart_name' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer|min:1',
        ]);

        DB::beginTransaction();

        try {

            // Prepare spare part data
            $sparePartData = [
                'name' => $validatedData['sparepart_name'],
                'description' => $validatedData['description'],
                'price' => $validatedData['price'],
                'stock_quantity' => $validatedData['stock_quantity'],
            ];

            // Create the spare part
            $sparePart = SparePart::create($sparePartData);


            // Find the brand by brand_id
            $brandName = Brand::select('brand_name')->where('brand_id', $validatedData['brand_id'])->first();

            $brand = Brand::where('brand_name', $brandName->brand_name)->where('model_name', $validatedData['model_name'])->first();

            if ($brand) {
                DB::commit();
                // Associate the spare part with the brand using the pivot table
                $brand->spareParts()->attach($sparePart->spare_part_id);

                return redirect()->route('admin.spareparts')->with('success', 'Spare part created successfully.');
            } else {
                DB::rollBack();
                // If no brand found, rollback the spare part creation
                $sparePart->delete();
                return redirect()->back()->withErrors(['model_name' => 'The specified model name does not exist for the selected brand.']);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'An error occurred while creating the spare part.']);
        }
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
    public function edit(SparePart $sparePart)
    {
        $brands = Brand::all(); // Assuming you have a Brand model
        // How get spare part unique brand_id in brand_spare_part table
        $brand_id = DB::table('brand_spare_part')->select('brand_id')->where('spare_part_id', $sparePart->spare_part_id)->first();
        // Model name from brand table
        $model_name = Brand::select('model_name')->where('brand_id', $brand_id->brand_id)->first();


        return view('admin.spareparts.editspareparts', compact('sparePart', 'brands', 'brand_id', 'model_name'));
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
