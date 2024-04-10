<?php

namespace App\Http\Controllers;

use App\Models\ProducingCompany;
use Illuminate\Http\Request;

class ProducingCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $producingCompanies = ProducingCompany::all();
        return view('backend.dashboard.views.producingCompany.index', compact('producingCompanies'));
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
        ProducingCompany::create([
            'name' => $validatedData['name'],
            'active' => $active
        ]);

        return redirect()->route('producingCompany.index')->with('toast_success', 'تم أضافة شركة توزيع بنجاح');

    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProducingCompany $producingCompany)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'name' => 'required|string',
            'active' => 'nullable|boolean'
        ]);
        $active = $request->boolean('active', false);

        // Update the distribution company with the validated data
        $producingCompany->update([
            'name' => $validatedData['name'],
            'active' => $active,
        ]);

        // Redirect back or return response
        return redirect()->route('producingCompany.index')->with('toast_success', 'تم تحديث شركة توزيع بنجاح');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProducingCompany $producingCompany)
    {
        //
        $producingCompany->delete();

        return redirect()->route('producingCompany.index')->with('toast_success', 'تم حذف شركة توزيع بنجاح');

    }
}