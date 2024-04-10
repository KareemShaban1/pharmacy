<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\EffectiveMaterial::factory(10)->create();
        \App\Models\ProducingCompany::factory(10)->create();
        \App\Models\DistributionCompany::factory(10)->create();
        \App\Models\ProductCategory::factory(10)->create();
        \App\Models\ProductGroup::factory(10)->create();
        \App\Models\ProductProperty::factory(10)->create();
        \App\Models\ProductType::factory(10)->create();



        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}