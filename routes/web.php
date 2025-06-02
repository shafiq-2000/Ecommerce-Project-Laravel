<?php
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\SubcategoryController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\Backend\ColorController;
use App\Http\Controllers\Backend\SizeController;
use App\Http\Controllers\Backend\UnitController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\ProductController;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// admin route
Route::group(['prefix' => 'admin', 'controller' => AdminController::class], function () {
    Route::get('/dashboard', 'index')->name('admin.dashboard')->middleware('admin_auth');
    Route::get('/', 'login')->name('admin.login');
    Route::post('/authenticate', 'authenticate')->name('admin.authenticate');
    Route::post('/logout', 'logout')->name('admin.logout');
});
Route::get('/login', [AdminController::class, 'login'])->name('login');
//category
Route::resource('/categories', CategoryController::class)->middleware('admin_auth');
Route::put('/status/{category}', [CategoryController::class, 'change_status'])->name('change_status');
// Subcategory
Route::resource('/subcategories', SubcategoryController::class);
Route::put('/status/sub/{subcategory}', [SubcategoryController::class, 'change_status_sub'])->name('change_status_sub');
//brands
Route::resource('/brands', BrandController::class);
Route::put('/status/brand/{brand}', [BrandController::class, 'change_status_brand'])->name('change_status_brand');
//unit
Route::resource('/unit', UnitController::class);
Route::put('/status/unit/{unit}', [UnitController::class, 'change_status_unit'])->name('change_status_unit');
// size
Route::resource('/size', SizeController::class);
Route::put('/status/size/{size}', [SizeController::class, 'change_status_size'])->name('change_status_size');
//color
Route::resource('/color', ColorController::class);
Route::put('/status/color/{color}', [ColorController::class, 'change_status_color'])->name('change_status_color');
// products
Route::resource('/products', ProductController::class);
Route::put('/status/product/{product}', [ProductController::class, 'change_status_product'])->name('change_status_product');
//products-details
Route::get('/product-details/{id}', [HomeController::class, 'products_details'])->name('products_details');
//products by category
Route::get('/product_by_cat/{id}', [HomeController::class, 'product_by_cat'])->name('product_by_cat');

Route::fallback(function () {
    return view('frontend.pages.custom_error_page');
});

