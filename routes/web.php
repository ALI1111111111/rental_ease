<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LandlordController;
use App\Http\Controllers\CustomerController;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    Route::middleware(['is_admin'])->prefix('admin')->group(function () {
        Route::get('/users', [AdminController::class, 'manageUsers']);
        Route::get('/properties', [AdminController::class, 'manageProperties']);
    });

    Route::middleware(['is_landlord'])->prefix('landlord')->group(function () {
        Route::post('/add-property', [LandlordController::class, 'addProperty']);
        Route::get('/feedback', [LandlordController::class, 'viewFeedback']);
    });

    Route::middleware(['is_customer'])->prefix('customer')->group(function () {
        Route::get('/search', [CustomerController::class, 'searchProperties']);
        Route::post('/book/{propertyId}', [CustomerController::class, 'bookProperty']);
    });
});
