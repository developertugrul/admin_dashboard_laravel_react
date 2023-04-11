<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "v1"], function () {
    Route::group(["prefix" => "auth"], function () {
        Route::post("register", [\App\Http\Controllers\APIS\v1\Auth\IndexController::class, "register"])->name("api.v1.auth.register")->middleware("auth:api");
        Route::post("login", [\App\Http\Controllers\APIS\v1\Auth\IndexController::class, "login"])->name("api.v1.auth.login");
        Route::post("authorize", [\App\Http\Controllers\APIS\v1\Auth\IndexController::class, "authentication"])->name("api.v1.auth.authentication")->name("api.v1.auth.authentication");
        Route::post("token/refresh", [\App\Http\Controllers\APIS\v1\Auth\IndexController::class, "checkToken"])->name("api.v1.auth.refreshToken")->name("api.v1.auth.refreshToken");
        Route::post("token", [\App\Http\Controllers\APIS\v1\Auth\IndexController::class, "checkToken"])->name("api.v1.auth.checkToken")->name("api.v1.auth.checkToken");
        Route::post("logout", [\App\Http\Controllers\APIS\v1\Auth\IndexController::class, "logout"])->name("api.v1.auth.logout")->middleware("auth:api");
    });

    Route::group(["middleware" => "auth:api"], function () {
        Route::group(["prefix" => "user"], function () {
            Route::controller(\App\Http\Controllers\APIS\v1\Management\User\ListController::class)->group(function () {
                Route::get("list", "list")->name("api.v1.user.list");
            });
        });
    });
});

