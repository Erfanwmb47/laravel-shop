<?php

use App\Http\Controllers\Admin\AddressController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//

Route::get('/', function () {
    return view('Admin.Dashboard');
})->middleware(['auth'])->middleware();

Route::prefix('dashboard')->middleware(['auth','CheckRole'])->group(function () {

    Route::get('/', function () {
        return view('Admin.Dashboard');
    });
    //Brands
    Route::prefix('brands')->group(function () {

        Route::get('/', [BrandController::class, 'index'])->name('brands.index');
        Route::get('create', [BrandController::class, 'create'])->name('brands.create');
        Route::post('store', [BrandController::class, 'store'])->name('brands.store');
        Route::patch('{brand}', [BrandController::class, 'update'])->name('brands.update');
        Route::delete('{brand}', [BrandController::class, 'destroy'])->name('brands.destroy');
        Route::delete('/', [BrandController::class, 'multiDestroy'])->name('brands.multiDestroy');
        Route::post('/', [BrandController::class, 'indexpaginate'])->name('brands.indexpaginate');

    });
    //Users
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('create', [UserController::class, 'create'])->name('users.create');
        Route::post('store', [UserController::class, 'store'])->name('users.store');
        Route::get('edit/{user}', [UserController::class, 'edit'])->name('users.edit');
        Route::patch('{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('{user}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::delete('/', [UserController::class, 'multiDestroy'])->name('users.multiDestroy');
        Route::post('/', [UserController::class, 'indexpaginate'])->name('users.indexpaginate');
        Route::get('selfEdit', [UserController::class, 'selfEdit'])->name('users.selfEdit');
    });

    //
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('roles', RoleController::class);
    Route::post('/',[RoleController::class,'indexpaginate'])->name('roles.indexpaginate');
    Route::resource('sliders', SliderController::class);


    ////Addresses
    Route::resource('dashboard/address',AddressController::class);
//    Route::resource('users',UserController::class);
    Route::get('login', function () {
        return view('Admin.Users.Login');
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');

    //Gallery
    Route::resource('galleries', GalleryController::class);
    Route::post('/',[GalleryController::class,'indexpaginate'])->name('galleries.indexpaginate');
});
require __DIR__.'/auth.php';


