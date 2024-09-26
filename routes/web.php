<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/account-activation', [AuthController::class, 'accountActivation'])->name('account.activation');
