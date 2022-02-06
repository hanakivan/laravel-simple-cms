<?php

use Illuminate\Support\Facades\Route;

Route::middleware(["web"])->prefix("hanakivan/cms")->group(function () {
    Route::any('login', [\hanakivan\LaravelSimpleCms\app\Http\Controllers\LaravelSimpleCMSAuthController::class, "login"])->name("hanakivan.cms.auth.login");
    Route::post('logout', [\hanakivan\LaravelSimpleCms\app\Http\Controllers\LaravelSimpleCMSAuthController::class, "logout"])->name("hanakivan.cms.auth.logout");

    Route::middleware("auth")->group(function () {
        Route::get('/', [\hanakivan\LaravelSimpleCms\app\Http\Controllers\LaravelSimpleCMSAuthController::class, "home"])->name("hanakivan.cms.auth.home");
        Route::get('/articles', [\hanakivan\LaravelSimpleCms\app\Http\Controllers\LaravelSimpleCMSAuthController::class, "articles"])->name("hanakivan.cms.auth.articles.list");

        Route::get('/articles/{id}', [\hanakivan\LaravelSimpleCms\app\Http\Controllers\LaravelSimpleCMSAuthController::class, "editArticle"])->name("hanakivan.cms.auth.articles.edit")->whereNumber("id");
        Route::post('/articles/{id}/delete', [\hanakivan\LaravelSimpleCms\app\Http\Controllers\LaravelSimpleCMSAuthController::class, "deleteArticle"])->name("hanakivan.cms.auth.articles.delete")->whereNumber("id");
        Route::get('/articles/form', [\hanakivan\LaravelSimpleCms\app\Http\Controllers\LaravelSimpleCMSAuthController::class, "createArticle"])->name("hanakivan.cms.auth.articles.create");

        Route::post('/articles/form/submit', [\hanakivan\LaravelSimpleCms\app\Http\Controllers\LaravelSimpleCMSAuthController::class, "articleSubmit"])->name("hanakivan.cms.auth.articles.submit");
    });
});
