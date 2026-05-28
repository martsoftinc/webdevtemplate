<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForgotPasswordController;

Route::get('/', function () {
    return view('welcome');
})->name('login');

Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::get('/admin/profile', function () {
    return view('admin.profile');
});

Route::get('/home', function () {
    return view('users.dashboard');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

//Password reset route
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotForm'])->name('password.request');
Route::post('/forgot-password/send-code', [ForgotPasswordController::class, 'sendResetCode'])->name('password.send-code');
Route::get('/verify-code', [ForgotPasswordController::class, 'showVerifyCodeForm'])->name('password.verify-code');
Route::post('/verify-code', [ForgotPasswordController::class, 'verifyCode'])->name('password.verify');
Route::get('/reset-password', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset-form');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');
Route::post('/resend-code', [ForgotPasswordController::class, 'resendCode'])->name('password.resend');
