<?php

use App\Http\Controllers\Top100Controller;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'top100',
], function () {

    Route::get('/{slug}', [Top100Controller::class, 'show'])
        ->name('top100.show');

});
