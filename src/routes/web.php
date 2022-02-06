<?php

use Illuminate\Support\Facades\Route;

Route::prefix(config("hanakivan.route.prefix"))->group(function () {
    Route::get('/{page?}', [\hanakivan\LaravelSimpleCms\app\Http\Controllers\LaravelSimpleCMSController::class, "index"])
        ->whereNumber(["page"])
        ->name("hanakivan.cms.index");
    Route::get('/{slug}', [\hanakivan\LaravelSimpleCms\app\Http\Controllers\LaravelSimpleCMSController::class, "detail"])->name("hanakivan.cms.detail");
});
