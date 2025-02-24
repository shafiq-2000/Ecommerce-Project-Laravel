<?php

use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('frontend.index');
});


// admin route
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/dashboard', [AdminController::class, 'dashboard']);
