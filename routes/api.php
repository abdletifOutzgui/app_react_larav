<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\ProductsController;

Route::post("/register", [AuthController::class, "register"])->name("register");
Route::post("/login", [AuthController::class, "login"])->name("login");

Route::group(['middleware' => 'auth.jwt'], function () {
    Route::post("/logout", [AuthController::class, "logout"])->name("logout");

    Route::apiResource("/products", ProductsController::class);
});

