<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\ProductsController;

Route::post("/register", [AuthController::class, "register"])->name("register");
Route::post("/login", [AuthController::class, "login"])->name("login");

Route::group(['middleware' => ['before' => 'jwt.auth', 'after' => 'jwt.refresh']], function () {

    Route::post("/logout", [AuthController::class, "logout"])->name("logout");

    Route::apiResource("/products", ProductsController::class);

    // Route::get('/refresh', [AuthController::class, "refresh"]);
});

