<?php

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

use App\Http\Controllers\Client\AddressController;
use Illuminate\Support\Facades\Route;
use Modules\Cart\Http\Controllers\Client\CartController;
use Modules\Cart\Http\Controllers\Client\PaymentController;

Route::prefix('cart')->group(function() {

    Route::post('add',[CartController::class,'addToCart'])->name('cart.add');
    Route::post('/',[CartController::class,'index']);
    Route::get('/',[CartController::class,'index'])->name('cart.index');
    Route::patch('/quantity/change',[CartController::class,'quantityChange']);
    Route::delete('/delete',[CartController::class,'deleteFromCart'])->name('cart.destroy');

});

Route::middleware('auth')->group(function (){
    Route::post('payment',[PaymentController::class,'payment'])->name('cart.payment');
    Route::post('payment',[PaymentController::class,'payment'])->name('cart.payment');

    Route::post('/checkout',[PaymentController::class,'checkout'])->name('cart.checkout');
    Route::get('/payment/payping/callback',[PaymentController::class,'paypingCallback'])->name('payment.payping.callback');
    Route::post('/checkout/add/address',[PaymentController::class,'createNewAddress'])->name('checkout.add.address');
    Route::post('/checkout/select/address',[PaymentController::class,'selectAddress']);
    Route::post('/getprovince_setcounties',[AddressController::class,'getProvince_setCounties']);
    Route::post('/checkout/cpt',[PaymentController::class,'computePriceTransportation']);
});
Route::get('/w',function (){
    \Modules\Cart\Helpers\Cart\Cart::put(['quantity' => '1','id' => '2' ], \App\Models\Product::query()->find('2'));
    \Modules\Cart\Helpers\Cart\Cart::put(['quantity' => '1','id' => '3' ], \App\Models\Product::query()->find('3'));
    \Modules\Cart\Helpers\Cart\Cart::put(['quantity' => '1','id' => '4' ], \App\Models\Product::query()->find('4'));
    \Modules\Cart\Helpers\Cart\Cart::put(['quantity' => '1','id' => '5' ], \App\Models\Product::query()->find('5'));
    return back();
});
