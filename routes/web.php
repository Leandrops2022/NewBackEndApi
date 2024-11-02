<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;


Route::get('/', function () {
    return view('welcome');
})->middleware('cors');

Route::get('/account-activation', [AuthController::class, 'accountActivation'])->name('account.activation');


Route::get('/policy', function () {
    $markdown = File::get(resource_path('markdown/policy.md'));

    $policyHtml = Str::markdown($markdown);

    return view('policy')->with(['policy' => $policyHtml]);
});

Route::get('/terms', function () {
    $markdown = File::get(resource_path('markdown/terms.md'));

    $termsHtml = Str::markdown($markdown);

    return view('terms')->with(['terms' => $termsHtml]);
});
