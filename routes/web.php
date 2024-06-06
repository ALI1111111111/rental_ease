<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LandlordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [HomeController::class, 'search'])->name('home.search');

Route::get('/category', [CategoryController::class, 'client'])->name('category');
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('categor.show');

Route::view('/about', 'about')->name('about');

Route::get('/dashboard', function () {
    return view('properties.index');
});

Auth::routes();
Route::get('/register', [RegisterController::class, 'createe'])->name('register');

Route::middleware(['auth'])->group(function () {
    Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('roles/{role}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
    Route::resource('properties', PropertyController::class);
Route::resource('categories', CategoryController::class);
});



Route::middleware(['auth'])->group(function () {
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

