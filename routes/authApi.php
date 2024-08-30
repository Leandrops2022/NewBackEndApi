<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;



Route::post('/register', [AuthController::class, 'register'])->name('auth.register');

Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('/forgot-password', [AuthController::class, 'forgot-password'])->name('auth.forgot-password');


