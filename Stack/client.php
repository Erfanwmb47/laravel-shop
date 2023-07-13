<?php


use App\Http\Controllers\Client\CommentController;
use App\Http\Controllers\Auth\AuthTokenController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\Product\ProductController;
use App\Http\Controllers\Client\Profile\ProfileController;
use App\Http\Controllers\Stack\SmsController;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



$domain = 'user.'.parse_url(config('app.url'),PHP_URL_HOST);

Route::domain($domain)->get('/{user}',function ($user){
    //dd($user);
    Auth::loginUsingId($user);
    return redirect()->intended(RouteServiceProvider::HOME);

})->name('loginSubDomain');

Route::domain($domain)->middleware('auth')->group(function (){
    Route::get('/',[ProfileController::class,'index'])->name('profile');
    //TODO حل مشکل لاگین دوباره

        Route::get('/twofactorauth', [ProfileController::class, 'TwofactorAuth'])->name('profile.twoFactorAuth');
        Route::post('/twofactorauth', [ProfileController::class, 'TwofactorAuthpost'])->name('profile.TwoFactorAuthPost');
        Route::get('/twofactorauth/phone', [ProfileController::class, 'getPhoneVerify'])->name('profile.2fa.phone');
        Route::post('/twofactorauth/phone', [ProfileController::class, 'postPhoneVerify']);

});

Route::get('/auth/token',[AuthTokenController::class,'getToken'])->name('2fa.token');
Route::post('/auth/token',[AuthTokenController::class,'postToken']);

require __DIR__ . '/auth.php';

Route::get('/auth/google',[GoogleAuthController::class,'redirect'])->name('auth.google');
Route::get('/auth/google/callback',[GoogleAuthController::class,'callback']);
Route::get('/sms/callback',[SmsController::class,'callback']);

Route::domain(parse_url(config('app.url'),PHP_URL_HOST))->group(function (){
    Route::get('/',[HomeController::class,'index'])->name('home');
});
Route::get('/q',function (){
    Auth::loginUsingId(1);
    return redirect(route('loginSubDomain',Auth::user()->id));
});
Route::get('products',[ProductController::class,'index']);
Route::get('products/{product}',[ProductController::class,'single'])->name('products.single');
Route::post('comments',[CommentController::class,'comment'])->name('send.comment');
