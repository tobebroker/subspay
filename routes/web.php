<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::get('/register', [AuthController::class, 'register'])->name('register.form');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/', [SiteController::class, 'index'])->name('dashboard');
    Route::get('/plans', [SiteController::class, 'plans'])->name('plans');
    Route::get('/payment/{plan}', [SiteController::class, 'payment'])->name('payment');
    Route::post('/payment', [SiteController::class, 'paymentProcess'])->name('payment.process');
    Route::get('/success', [SiteController::class, 'successPaymentPage'])->name('success');

    Route::get('/profile', [SiteController::class, 'profile'])->name('profile');
    Route::put('/profile', [SiteController::class, 'profile'])->name('update.profile');

    Route::get('/faq', [SiteController::class, 'faq'])->name('faq');
    Route::get('/contact', [SiteController::class, 'contact'])->name('contact');
});
