<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'page',
], function () {

    Route::get('/destaques', [SiteController::class, 'getDestaques'])
        ->name('page.destaques');

    Route::get('/sugestoesDeArtigos', [SiteController::class, 'getSugestoesDeArtigos'])
        ->name('page.sugestoesDeArtigos');

    Route::get('/sugestoesDeListas', [SiteController::class, 'getSugestoesDeListas'])
        ->name('page.sugestoesDeListas');

    Route::get('/sugestoesDeTop100', [SiteController::class, 'getSugestoesDeTop100'])
        ->name('page.sugestoesDeTop100');
});
