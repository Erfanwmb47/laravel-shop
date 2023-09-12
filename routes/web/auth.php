<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);


    Route::post('loginWithPhone', [AuthenticatedSessionController::class, 'storePhone'])->name('loginWithPhone');

    Route::get('/auth/smsToken',[AuthenticatedSessionController::class,'SmsTokenCreate'])->name('SMS.token');
    Route::post('/auth/smsToken',[AuthenticatedSessionController::class,'SmsVerifyToken']);



    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.update');

    Route::post('check-email-phone', [AuthenticatedSessionController::class, 'checkInputIsEmailOrPhone'])
        ->name('checkInputIsEmailOrPhone');
    Route::get('enter-password', [AuthenticatedSessionController::class, 'enterPassword'])
        ->name('enterPassword');

    // ویرایش نام و نام خانوادگی بعد از ثبت نام
    Route::get('set-information/{user}',[AuthenticatedSessionController::class,'setInformation'])->name('setInformation');
    Route::post('siar/{user}',[AuthenticatedSessionController::class,'setInformationAfterRegister'])->name('setInformationAfterRegister');
    // ربیست کردن پسور با شماره تلفن همراه
    Route::post('resetPasswordPhone', [PasswordResetLinkController::class, 'storePhone'])->name('resetWithPhone');
    Route::get('/auth/resetPasswordToken',[PasswordResetLinkController::class,'SmsTokenCreate'])->name('resetPassword.token');
    Route::post('/auth/resetPasswordToken',[PasswordResetLinkController::class,'SmsVerifyToken']);
    Route::get('rp', [NewPasswordController::class, 'resetPasswordWithPhone'])
        ->name('resetPasswordWithPhone');
    Route::post('rp', [NewPasswordController::class, 'storePassword'])
        ->name('updatePasswordWithPhone');

});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');



});
