<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_en',
        'name_ar',
        'bar_code',
        'code',
        'international_code',
        'effective_material_id',
        'manufacturing',
        'distribution_company_id',
        'producing_company_id',
        'product_category_id',
        'product_group_id',
        'product_type_id',
        'selling_price',
        'cost_price',
        'discount_percentage',
        'big_unit',
        'intermediate_unit',
        'small_unit',
        'maximum_order',
        'limit_order',
        'product_properties',
    ];

    protected $casts = [
        'product_settings' => 'array', // Tells Laravel to automatically cast product_properties to an array
    ];

    // Define relationships if needed
    public function effectiveMaterial()
    {
        return $this->belongsTo(EffectiveMaterial::class);
    }

    public function distributionCompany()
    {
        return $this->belongsTo(DistributionCompany::class);
    }

    public function producingCompany()
    {
        return $this->belongsTo(ProducingCompany::class);
    }

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function productGroup()
    {
        return $this->belongsTo(ProductGroup::class);
    }

    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }

}