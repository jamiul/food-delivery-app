<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RiderLocationController;

// public routes
Route::post('/register', [UserController::class, 'register'])
    ->name('user.register');
Route::post('/login', [LoginController::class, 'login'])
    ->name('user.login');

// protected routes
Route::middleware('auth:sanctum')->group(function () {

    Route::post('/rider/location', [RiderLocationController::class, 'store']);
    Route::get('/restaurant/nearest-riders', [RiderLocationController::class, 'getNearestRiders']);
});
