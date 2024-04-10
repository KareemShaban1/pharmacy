<?php

use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\DistributionCompanyController;
use App\Http\Controllers\EffectiveMaterialController;
use App\Http\Controllers\ProducingCompanyController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductGroupController;
use App\Http\Controllers\ProductPropertyController;
use App\Http\Controllers\ProductSettingController;
use App\Http\Controllers\ProductTypeController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['auth', 'localeCookieRedirect', 'localizationRedirect', 'localeViewPath' ]
    ],
    function () {

        Route::get('/dashboard', function () {
            return view('backend.dashboard.views.index');
        })->name('dashboard');

        Route::controller(EffectiveMaterialController::class)
        ->prefix('effective_materials')
        ->name('effectiveMaterial.')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::post('store', 'store')->name('store');
            Route::put('update/{effectiveMaterial}', 'update')->name('update');
            Route::delete('destroy/{effectiveMaterial}', 'destroy')->name('destroy');
        });

        Route::group([], function () {
            Route::get('distribution_companies', [DistributionCompanyController::class,'index'])->name('distributionCompany.index');
            Route::post('distribution_companies/store', [DistributionCompanyController::class,'store'])->name('distributionCompany.store');
            Route::put('distribution_companies/update/{distributionCompany}', [DistributionCompanyController::class,'update'])->name('distributionCompany.update');
            Route::delete('distribution_companies/destroy/{distributionCompany}', [DistributionCompanyController::class,'destroy'])->name('distributionCompany.destroy');
        });

        Route::controller(ProducingCompanyController::class)
        ->prefix('producing_companies')
        ->name('producingCompany.')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::post('store', 'store')->name('store');
            Route::put('update/{producingCompany}', 'update')->name('update');
            Route::delete('destroy/{producingCompany}', 'destroy')->name('destroy');
        });

        Route::controller(ProductCategoryController::class)
        ->prefix('product_categories')
        ->name('productCategory.')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::post('store', 'store')->name('store');
            Route::put('update/{productCategory}', 'update')->name('update');
            Route::delete('destroy/{productCategory}', 'destroy')->name('destroy');
        });

        Route::controller(ProductGroupController::class)
        ->prefix('product_groups')
        ->name('productGroup.')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::post('store', 'store')->name('store');
            Route::put('update/{productGroup}', 'update')->name('update');
            Route::delete('destroy/{productGroup}', 'destroy')->name('destroy');
        });


        Route::controller(ProductTypeController::class)
        ->prefix('product_types')
        ->name('productType.')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::post('store', 'store')->name('store');
            Route::put('update/{productType}', 'update')->name('update');
            Route::delete('destroy/{productType}', 'destroy')->name('destroy');
        });

        Route::controller(ProductPropertyController::class)
        ->prefix('product_properties')
        ->name('productProperty.')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::post('store', 'store')->name('store');
            Route::put('update/{productType}', 'update')->name('update');
            Route::delete('destroy/{productType}', 'destroy')->name('destroy');
        });


        Route::controller(ProductController::class)
        ->prefix('products')
        ->name('product.')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{product}', 'edit')->name('edit');
            Route::put('update/{product}', 'update')->name('update');
            Route::delete('destroy/{product}', 'destroy')->name('destroy');
        });

        Route::group([], function () {
            Route::get('product_settings', [ProductSettingController::class,'index'])->name('product_settings.index');
            Route::get('product_settings/create', [ProductSettingController::class,'create'])->name('product_settings.create');
            Route::post('product_settings/store', [ProductSettingController::class,'store'])->name('product_settings.store');
            Route::get('product_settings/edit/{id}', [ProductSettingController::class,'edit'])->name('product_settings.edit');
            Route::put('product_settings/update/{id}', [ProductSettingController::class,'update'])->name('product_settings.update');
            Route::delete('product_settings/destroy/{id}', [ProductSettingController::class,'destroy'])->name('product_settings.destroy');
        });
    }
);

// Route::get('{any?}', function() {
//     return view('application');
// })->where('any', '^(?!api).*$');