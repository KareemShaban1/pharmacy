<?php

namespace App\Http\Controllers;

use App\Models\EffectiveMaterial;
use Illuminate\Http\Request;

class EffectiveMaterialController extends Controller
{
    //
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        //
        $effectiveMaterials = EffectiveMaterial::all();
        return view('backend.dashboard.views.effectiveMaterial.index', compact('effectiveMaterials'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'active' => 'nullable|boolean'
        ]);

        $active = $request->boolean('active', false);

        EffectiveMaterial::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'active' => $active
        ]);


        return redirect()->route('effectiveMaterial.index')->with('toast_success', 'تم أضافة شركة توزيع بنجاح');

    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EffectiveMaterial $effectiveMaterial)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'active' => 'nullable|boolean'
        ]);
        $active = $request->boolean('active', false);

        // Update the distribution company with the validated data
        $effectiveMaterial->update([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'active' => $active,
        ]);

        // Redirect back or return response
        return redirect()->route('effectiveMaterial.index')->with('toast_success', 'تم تحديث شركة توزيع بنجاح');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EffectiveMaterial $effectiveMaterial)
    {
        //
        $effectiveMaterial->delete();

        return redirect()->route('effectiveMaterial.index')->with('toast_success', 'تم حذف شركة توزيع بنجاح');

    }
}