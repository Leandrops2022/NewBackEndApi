<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix'     => 'user',
    'middleware' => ['auth:sanctum'],
], function () {

    Route::get('/account-settings', [UserController::class, 'index'])
        ->name('user.settings');

    Route::post('/upload-avatar', [UserController::class, 'index'])
        ->name('user.upload-avatar');

    Route::post('/update', [UserController::class, 'update'])->name('user.update');

    Route::post('/update', [UserController::class, 'update'])->name('user.update');

});

Route::group([
    'prefix'     => 'user',
    'middleware' => ['auth:sanctum', 'role:admin'],
], function () {

    Route::get('/show/{id}', [UserController::class, 'index'])
        ->name('user.index');

    Route::post('/ban', [UserController::class, 'ban'])
        ->name('user.ban');

    Route::post('/un-ban', [UserController::class, 'unBan'])
        ->name('user.unBan');

});
