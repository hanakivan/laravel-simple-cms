<?php

use Illuminate\Support\Facades\Route;

Route::middleware("web")->prefix("hanakivan/cms")->group(function () {
    Route::any('login', [\hanakivan\LaravelSimpleCms\app\Http\Controllers\LaravelSimpleCMSAuthController::class, "login"])->name("hanakivan.cms.auth.login");

    Route::get('/', [\hanakivan\LaravelSimpleCms\app\Http\Controllers\LaravelSimpleCMSAuthController::class, "home"])->name("hanakivan.cms.auth.home");
});
