<?php

use Illuminate\Support\Facades\Route;

Route::prefix(config("hanakivan.route.prefix"))->group(function () {
    Route::get('/', [\hanakivan\LaravelSimpleCms\LaravelSimpleCMSController::class, "index"])->name("hanakivan.cms.index");
    Route::get('/{slug}', [\hanakivan\LaravelSimpleCms\LaravelSimpleCMSController::class, "detail"])->name("hanakivan.cms.detail");
});
