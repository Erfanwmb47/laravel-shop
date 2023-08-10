<?php


use App\Http\Controllers\Client\AddressController;
use App\Http\Controllers\Client\Cart\CartController;
use App\Http\Controllers\Client\Cart\PaymentController;
use App\Http\Controllers\Client\CommentController;
use App\Http\Controllers\Auth\AuthTokenController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\Client\Discount\DiscountController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\Product\ProductController;
use App\Http\Controllers\Client\Profile\OrderController;
use App\Http\Controllers\Client\Profile\ProfileController;
use App\Http\Controllers\Client\Profile\WishlistController;
use App\Http\Controllers\Stack\SmsController;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



$domain = 'user.'.parse_url(config('app.url'),PHP_URL_HOST);





Route::domain($domain)->middleware('auth')->group(function (){
    Route::get('/',[ProfileController::class,'index'])->name('profile');
    //TODO حل مشکل لاگین دوباره

        Route::get('/security/twofactorauth', [ProfileController::class, 'TwofactorAuth'])->name('profile.twoFactorAuth');
        Route::post('/security/twofactorauth', [ProfileController::class, 'TwofactorAuthpost'])->name('profile.TwoFactorAuthPost');
        Route::get('/security/twofactorauth/phone', [ProfileController::class, 'getPhoneVerify'])->name('profile.2fa.phone');
        Route::post('/security/twofactorauth/phone', [ProfileController::class, 'postPhoneVerify']);

        Route::get('wishlist',[WishlistController::class,'index']);
        Route::post('wishlist',[WishlistController::class,'index'])->name('profile.wishlist.index');

        Route::get('orders',[OrderController::class,'index']);
        Route::post('orders',[OrderController::class,'index'])->name('profile.orders.index');
        Route::get('orders/{order}',[OrderController::class,'showDetails'])->name('profile.orders.detail');
        Route::get('orders/{order}/payment',[OrderController::class,'payment'])->name('profile.orders.payment');
});

Route::get('/auth/token',[AuthTokenController::class,'getToken'])->name('2fa.token');
Route::post('/auth/token',[AuthTokenController::class,'postToken']);

require __DIR__ . '/auth.php';

Route::get('/auth/google',[GoogleAuthController::class,'redirect'])->name('auth.google');
Route::get('/auth/google/callback',[GoogleAuthController::class,'callback']);
Route::get('/sms/callback',[SmsController::class,'callback']);


Route::domain(parse_url(config('app.url'),PHP_URL_HOST))->group(function (){
    Route::get('/',[HomeController::class,'index'])->name('home');
    Route::get('/z',function (){

    });

});
Route::get('/q',function (){
    Auth::loginUsingId(1);
    return redirect()->intended(RouteServiceProvider::HOME);
});

Route::get('products',[ProductController::class,'index']);
Route::get('products/{product}',[ProductController::class,'single'])->name('products.single');
Route::post('/product/view/summery/',[ProductController::class,'summery']);


Route::post('wishlist/add',[WishlistController::class,'store'])->name('wishlist.store');
Route::delete('wishlist/destroy',[WishlistController::class,'destroy'])->name('wishlist.destroy');

Route::post('comments',[CommentController::class,'comment'])->name('send.comment');



Route::prefix('discount')->group(function (){
    Route::post('/check',[DiscountController::class,'check'])->name('client.discount.check');
    Route::delete('/delete/{discount}',[DiscountController::class,'destroy'])->name('client.discount.delete');

});

Route::prefix('search')->group(function (){
    //Route::get('',[]);
});


