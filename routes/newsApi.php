<?php

use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'noticias',
], function () {

    Route::get('/', [NewsController::class, 'index'])
        ->name('news.index');

    Route::get('/{slug}', [NewsController::class, 'show'])
        ->name('news.show');
});
