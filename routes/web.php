<?php

use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\SubcategoryController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\Backend\SizeController;
use App\Http\Controllers\Backend\UnitController;
use App\Http\Controllers\Frontend\HomeController;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('frontend.index');
});


// admin route
Route::group(['prefix' => 'admin', 'controller' => AdminController::class], function () {
    Route::get('/dashboard', 'index')->name('admin.dashboard')->middleware('admin_auth');
    Route::get('/', 'login')->name('admin.login');
    Route::post('/authenticate', 'authenticate')->name('admin.authenticate');
    Route::post('/logout', 'logout')->name('admin.logout');
});

Route::resource('/categories', CategoryController::class)->middleware('admin_auth');
Route::put('/status/{category}', [CategoryController::class, 'change_status'])->name('change_status');

Route::resource('/subcategories', SubcategoryController::class);
Route::put('/status/sub/{subcategory}', [SubcategoryController::class, 'change_status_sub'])->name('change_status_sub');

Route::resource('/brands', BrandController::class);
Route::put('/status/brand/{brand}', [BrandController::class, 'change_status_brand'])->name('change_status_brand');

Route::resource('/unit', UnitController::class);
Route::put('/status/unit/{unit}', [UnitController::class, 'change_status_unit'])->name('change_status_unit');

Route::resource('/size', SizeController::class);
Route::put('/status/size/{size}', [SizeController::class, 'change_status_size'])->name('change_status_size');

