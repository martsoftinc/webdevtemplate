<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\TwoFactorController;



Route::get('/', function () {
    return view('welcome');
});








// Register Routes
Route::get('/register',  [RegisterController::class, 'showRegistrationForm'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'register'])->middleware('guest');

//Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'login'])->name('login');


// Email verification
Route::get('/verify-email',  [EmailVerificationController::class, 'showVerificationForm'])->name('verification.notice')->middleware('auth');
Route::post('/verify-email', [EmailVerificationController::class, 'verify'])->name('verification.verify')->middleware('auth');
Route::post('/verify-email/resend', [EmailVerificationController::class, 'resend'])->name('verification.resend')->middleware('auth');


//Password reset route
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotForm'])->name('password.request');
Route::post('/forgot-password/send-code', [ForgotPasswordController::class, 'sendResetCode'])->name('password.send-code');
Route::get('/verify-code', [ForgotPasswordController::class, 'showVerifyCodeForm'])->name('password.verify-code');
Route::post('/verify-code', [ForgotPasswordController::class, 'verifyCode'])->name('password.verify');
Route::get('/reset-password', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset-form');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');
Route::post('/resend-code', [ForgotPasswordController::class, 'resendCode'])->name('password.resend');


//Users Route

Route::middleware(['auth', 'user','verify'])->group(function () {


Route::get('/user-dashboard', function () {
    return view('users.dashboard');
})->name('dashboard');


Route::get('/user/profile',          [UserProfileController::class, 'show'])->name('user.profile');
Route::put('user/profile',          [UserProfileController::class, 'updateProfile'])->name('user.profile.update');
Route::put('user/profile/password', [UserProfileController::class, 'updatePassword'])->name('user.profile.password');
Route::post('user/profile/2fa',     [UserProfileController::class, 'toggle2FA'])->name('user.profile.2fa');

});


//Admin routes
Route::middleware(['auth', 'admin','verify'])->group(function () {
Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::get('/home', function () {
    return view('users.dashboard');
})->name('home');

//Profile Management
Route::get('/admin/profile',          [ProfileController::class, 'show'])->name('admin.profile');
Route::put('/profile',          [ProfileController::class, 'updateProfile'])->name('admin.profile.update');
Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('admin.profile.password');
Route::post('/profile/2fa',     [ProfileController::class, 'toggle2FA'])->name('admin.profile.2fa');

});


// ── Two-Factor Challenge (guest: user not fully logged in yet) ────────────────
// Note: uses a custom middleware below — NOT the 'auth' middleware

Route::get('/two-factor-challenge',  [TwoFactorController::class, 'showChallenge'])->name('two-factor.challenge');
Route::post('/two-factor-challenge', [TwoFactorController::class, 'verifyChallenge'])->name('two-factor.verify');
Route::post('/two-factor-challenge/resend', [TwoFactorController::class, 'resend'])->name('two-factor.resend');


//Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
