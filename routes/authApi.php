<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register'])->name('auth.register');

Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('auth.forgot-password');
Route::post('/auth-password-reset', [AuthController::class, 'resetPassword'])->name('auth.password-reset');

Route::get('/password-reset', [AuthController::class, 'resetPasswordView'])->name('password.reset')->middleware('password_token_verification');
Route::get('/invalid-token', [AuthController::class, 'invalidPasswordToken'])->name('invalid.token');
