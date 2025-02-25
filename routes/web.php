<?php

use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\Frontend\HomeController;
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
