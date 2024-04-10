<?php

namespace App\Http\Controllers;

use App\Models\DistributionCompany;
use Illuminate\Http\Request;

class DistributionCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $distributionCompanies = DistributionCompany::all();
        return view('backend.dashboard.views.distributionCompany.index', compact('distributionCompanies'));
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

        DistributionCompany::create([
            'name' => $validatedData['name'],
            'active' => $active
        ]);


        return redirect()->route('distributionCompany.index')->with('toast_success', 'تم أضافة شركة توزيع بنجاح');

    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DistributionCompany $distributionCompany)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'name' => 'required|string',
            'active' => 'nullable|boolean'
        ]);
        $active = $request->boolean('active', false);

        // Update the distribution company with the validated data
        $distributionCompany->update([
            'name' => $validatedData['name'],
            'active' => $active,
        ]);

        // Redirect back or return response
        return redirect()->route('distributionCompany.index')->with('toast_success', 'تم تحديث شركة توزيع بنجاح');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DistributionCompany $distributionCompany)
    {
        //
        $distributionCompany->delete();

        return redirect()->route('distributionCompany.index')->with('toast_success', 'تم حذف شركة توزيع بنجاح');

    }
}