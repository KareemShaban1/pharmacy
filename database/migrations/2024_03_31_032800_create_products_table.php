<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name_en')->nullable();
            $table->string('name_ar')->nullable();
            $table->string('bar_code')->nullable();
            $table->string('code')->nullable();
            $table->string('international_code')->nullable();
            $table->foreignId('effective_material_id')->constrained('effective_materials')->cascadeOnDelete();
            $table->string('manufacturing')->nullable();
            $table->foreignId('distribution_company_id')->constrained('distribution_companies')->cascadeOnDelete();
            $table->foreignId('producing_company_id')->constrained('producing_companies')->cascadeOnDelete();
            $table->foreignId('product_category_id')->nullable()->constrained('product_categories')->nullOnDelete();
            $table->foreignId('product_group_id')->nullable()->constrained('product_groups')->nullOnDelete();
            $table->foreignId('product_type_id')->nullable()->constrained('product_types')->nullOnDelete();
            $table->decimal('selling_price', 10, 2)->default(0);
            $table->decimal('cost_price', 10, 2)->default(0);
            $table->decimal('discount_percentage', 5, 2)->default(0);
            $table->string('big_unit')->nullable();
            $table->string('intermediate_unit')->nullable();
            $table->string('small_unit')->nullable();
            $table->unsignedInteger('maximum_order')->nullable();
            $table->unsignedInteger('limit_order')->nullable();
            $table->json('product_properties');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};