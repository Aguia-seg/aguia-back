<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

Route::post('register', [AuthController::class, 'registerUser']);
Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('logout', [AuthController::class, 'logout']);
});

// Route::get('logout', [AuthController::class, 'logout']);
