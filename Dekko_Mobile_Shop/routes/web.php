<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SparePartsController;
use App\Http\Controllers\Admin\RepairController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\OrderHistoryController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\SuperAdmin\SuperAdminController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('/login');
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

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



        //Admin -> Product Routes
        Route::get('/product', [ProductController::class, 'index'])->name('product');




        //Admin -> Brands Routes
        Route::get('/brands', [BrandController::class, 'index'])->name('brands');
        Route::get('/brand/create', [BrandController::class, 'create'])->name('brand.create');
        Route::post('/brands', [BrandController::class, 'store'])->name('brand.store');
        Route::get('/brand/{brand}/edit', [BrandController::class, 'edit'])->name('brand.edit');
        Route::put('/brand/{brand}', [BrandController::class, 'update'])->name('brand.update');
        Route::delete('/brand/{brand}', [BrandController::class, 'destroy'])->name('brand.destroy');





        //Admin -> Spare Parts Routes
        Route::get('/spareparts', [SparePartsController::class, 'index'])->name('spareparts');
        Route::get('/spareparts/create', [SparePartsController::class, 'create'])->name('spareparts.create');
        Route::post('/spareparts', [SparePartsController::class, 'store'])->name('spareparts.store');
        Route::get('/spareparts/{sparePart}/edit', [SparePartsController::class, 'edit'])->name('spareparts.edit');
        Route::put('/spareparts/{sparePart}', [SparePartsController::class, 'update'])->name('spareparts.update');
        Route::delete('/spareparts/{sparePart}', [SparePartsController::class, 'destroy'])->name('spareparts.destroy');

        // Find Brand Models
        Route::get('/api/get-models/{brand}', [BrandController::class, 'getModels'])->name('getModels');





     //Admin -> Repairs Routes
     Route::get('/repairs', [RepairController::class, 'index'])->name('repairs');
     Route::get('/repairs_Management', [RepairController::class, 'repairsmanagement'])->name('repairs.management');
     Route::get('/repairs_add', [RepairController::class, 'addRepair'])->name('repairs.addrepair');
     Route::get('/repairUpdates', [RepairController::class, 'repairUpdates'])->name('repairs.repairUpdates');
     Route::get('/posRepair', [RepairController::class, 'posRepair'])->name('repairs.posRepair');





        //Admin -> Employee Routes
        Route::get('/employee', [EmployeeController::class, 'index'])->name('employees');



        //Admin -> Customers Routes
        Route::get('/customer', [CustomerController::class, 'index'])->name('customers');




        //Admin -> Order History Routes
        Route::get('/orderhistory', [OrderHistoryController::class, 'index'])->name('orderhistory');





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