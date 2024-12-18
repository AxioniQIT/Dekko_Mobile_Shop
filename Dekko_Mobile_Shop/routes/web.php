<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SparePartsController;
use App\Http\Controllers\Admin\RepairController;


use App\Http\Controllers\SuperAdmin\SuperAdminController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


 // *** GROUP ROUTES FOR ADMIN ***//
Route::prefix('Admin')->as('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');


    Route::get('/product', [ProductController::class, 'index'])->name('product');


    Route::get('/spareparts', [SparePartsController::class, 'index'])->name('spareparts');


    Route::get('/repairs', [RepairController::class, 'index'])->name('repairs');


});

// *** GROUP ROUTES FOR SUPERADMIN ***//
Route::prefix('Superadmin')->as('superadmin.')->group(function () {
    Route::get('/dashboard', [SuperadminController::class, 'index'])->name('dashboard');
});

// *** GROUP ROUTES FOR EMPLOYEE ***//
Route::prefix('Employee')->as('employee.')->group(function () {
    Route::get('/dashboard', [EmployeeController::class, 'index'])->name('dashboard');
});



});

require __DIR__ . '/auth.php';
