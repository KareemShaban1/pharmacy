<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DistributionCompany;
use App\Models\EffectiveMaterial;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductGroup;
use App\Models\ProductProperty;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        return view('backend.dashboard.views.product.index', compact('products'));

    }
    public function create()
    {
        $effectiveMaterials = EffectiveMaterial::all();
        $distributionCompanies = DistributionCompany::all();
        $producingCompanies = DistributionCompany::all();
        $productCategories = ProductCategory::all();
        $productTypes = ProductType::all();
        $productGroups = ProductGroup::all();
        $productProperties = ProductProperty::all();
        return view('backend.dashboard.views.product.create', compact(
            'effectiveMaterials',
            'producingCompanies',
            'distributionCompanies',
            'productCategories',
            'productTypes',
            'productGroups',
            'productProperties'
        ));

    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'name_en' => 'required|string',
            'name_ar' => 'required|string',
            'bar_code' => 'nullable|string',
            'code' => 'nullable|string',
            'international_code' => 'nullable|string',
            'effective_material_id' => 'required|exists:effective_materials,id',
            'manufacturing' => 'nullable|string',
            'distribution_company_id' => 'required|exists:distribution_companies,id',
            'producing_company_id' => 'required|exists:producing_companies,id',
            'product_category_id' => 'nullable|exists:product_categories,id',
            'product_group_id' => 'nullable|exists:product_groups,id',
            'product_type_id' => 'nullable|exists:product_types,id',
            'selling_price' => 'required|numeric',
            'cost_price' => 'required|numeric',
            'discount_percentage' => 'required|numeric',
            'big_unit' => 'nullable|string',
            'intermediate_unit' => 'nullable|string',
            'small_unit' => 'nullable|string',
            'maximum_order' => 'nullable|integer',
            'limit_order' => 'nullable|integer',
            'product_properties' => 'nullable|array',
        ]);


        // Convert product_properties to JSON before storing in the database
        $validatedData['product_properties'] = json_encode($validatedData['product_properties']);

        $product = Product::create($validatedData);

        return redirect()->route('product.index')->with('success', 'Product created successfully!');
    }

    public function edit($id)
    {
        $effectiveMaterials = EffectiveMaterial::all();
        $distributionCompanies = DistributionCompany::all();
        $producingCompanies = DistributionCompany::all();
        $productCategories = ProductCategory::all();
        $productTypes = ProductType::all();
        $productGroups = ProductGroup::all();
        $productProperties = ProductProperty::all();
        $product = Product::findOrFail($id);
        return view('backend.dashboard.views.product.edit', compact(
            'effectiveMaterials',
            'producingCompanies',
            'distributionCompanies',
            'productCategories',
            'productTypes',
            'productGroups',
            'productProperties',
            'product'
        ));

    }

    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name_en' => 'required|string',
            'name_ar' => 'required|string',
            'bar_code' => 'nullable|string',
            'code' => 'nullable|string',
            'international_code' => 'nullable|string',
            'effective_material_id' => 'required|exists:effective_materials,id',
            'manufacturing' => 'nullable|string',
            'distribution_company_id' => 'required|exists:distribution_companies,id',
            'producing_company_id' => 'required|exists:producing_companies,id',
            'product_category_id' => 'nullable|exists:product_categories,id',
            'product_group_id' => 'nullable|exists:product_groups,id',
            'product_type_id' => 'nullable|exists:product_types,id',
            'selling_price' => 'required|numeric',
            'cost_price' => 'required|numeric',
            'discount_percentage' => 'required|numeric',
            'big_unit' => 'nullable|string',
            'intermediate_unit' => 'nullable|string',
            'small_unit' => 'nullable|string',
            'maximum_order' => 'nullable|integer',
            'limit_order' => 'nullable|integer',
            'product_properties' => 'nullable|array',
        ]);


        // Convert product_properties to JSON before storing in the database
        $validatedData['product_properties'] = json_encode($validatedData['product_properties']);


        $product->update($validatedData);

        return redirect()->route('product.index')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully!');

    }
}