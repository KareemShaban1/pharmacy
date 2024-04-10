<?php

namespace App\Http\Controllers;

use App\Models\ProductGroup;
use Illuminate\Http\Request;

class ProductGroupController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        //
        $productGroups = ProductGroup::all();
        return view('backend.dashboard.views.productGroup.index', compact('productGroups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required|string',
            'active' => 'nullable|boolean'
        ]);

        $active = $request->boolean('active', false);

        ProductGroup::create([
            'name' => $validatedData['name'],
            'active' => $active
        ]);


        return redirect()->route('productGroup.index')->with('toast_success', 'تم أضافة شركة توزيع بنجاح');

    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductGroup $productGroup)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'name' => 'required|string',
            'active' => 'nullable|boolean'
        ]);
        $active = $request->boolean('active', false);

        // Update the distribution company with the validated data
        $productGroup->update([
            'name' => $validatedData['name'],
            'active' => $active,
        ]);

        // Redirect back or return response
        return redirect()->route('productGroup.index')->with('toast_success', 'تم تحديث شركة توزيع بنجاح');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductGroup $productGroup)
    {
        //
        $productGroup->delete();

        return redirect()->route('productGroup.index')->with('toast_success', 'تم حذف شركة توزيع بنجاح');

    }
}