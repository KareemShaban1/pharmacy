<?php

namespace App\Http\Controllers;

use App\Models\ProductProperty;
use Illuminate\Http\Request;

class ProductPropertyController extends Controller
{
    //
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        //
        $productProperties = ProductProperty::all();
        return view('backend.dashboard.views.productProperty.index', compact('productProperties'));
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

        ProductProperty::create([
            'name' => $validatedData['name'],
            'active' => $active
        ]);


        return redirect()->route('productProperty.index')->with('toast_success', 'تم أضافة شركة توزيع بنجاح');

    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductProperty $productProperty)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'name' => 'required|string',
            'active' => 'nullable|boolean'
        ]);
        $active = $request->boolean('active', false);

        // Update the distribution company with the validated data
        $productProperty->update([
            'name' => $validatedData['name'],
            'active' => $active,
        ]);

        // Redirect back or return response
        return redirect()->route('productProperty.index')->with('toast_success', 'تم تحديث شركة توزيع بنجاح');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductProperty $productProperty)
    {
        //
        $productProperty->delete();

        return redirect()->route('productProperty.index')->with('toast_success', 'تم حذف شركة توزيع بنجاح');

    }
}