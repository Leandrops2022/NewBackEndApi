<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;


Route::get('/', function () {
    return view('welcome');
})->middleware('cors');

Route::get('/account-activation', [AuthController::class, 'accountActivation'])->name('account.activation');
