<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "v1"], function () {
    Route::group(["prefix" => "auth"], function () {
        Route::post("register", [\App\Http\Controllers\APIS\v1\Auth\IndexController::class, "register"])->name("api.v1.auth.register");
        Route::post("login", [\App\Http\Controllers\APIS\v1\Auth\IndexController::class, "login"])->name("api.v1.auth.login");
        Route::post("change-password", [\App\Http\Controllers\APIS\v1\Auth\IndexController::class, "changePassword"])->name("api.v1.auth.changePassword")->middleware("auth:api");
        Route::post("authorize", [\App\Http\Controllers\APIS\v1\Auth\IndexController::class, "authentication"])->name("api.v1.auth.authentication")->name("api.v1.auth.authentication")->middleware("auth:api");
        Route::post("token/refresh", [\App\Http\Controllers\APIS\v1\Auth\IndexController::class, "refreshToken"])->name("api.v1.auth.refreshToken")->name("api.v1.auth.refreshToken")->middleware("auth:api");
        Route::post("token", [\App\Http\Controllers\APIS\v1\Auth\IndexController::class, "checkToken"])->name("api.v1.auth.checkToken")->middleware("auth:api");
        Route::post("logout", [\App\Http\Controllers\APIS\v1\Auth\IndexController::class, "logout"])->name("api.v1.auth.logout")->middleware("auth:api");
    });

    Route::group(["prefix" => "mails"], function () {
        Route::controller(\App\Http\Controllers\APIS\v1\ImapMail\ListController::class)->group(function () {
            Route::get("mail-boxes", "MailBoxes")->name("api.v1.imap.MailBoxes");
        });
    });

    Route::group(["middleware" => "auth:api"], function () {
        Route::group(["prefix" => "user"], function () {
            Route::controller(\App\Http\Controllers\APIS\v1\Management\User\ListController::class)->group(function () {
                Route::get("list", "list")->name("api.v1.user.list");
            });
        });
    });
});

