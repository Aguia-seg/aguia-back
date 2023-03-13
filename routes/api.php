<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

require __DIR__.'/auth/auth_routes.php';
require __DIR__.'/user/user_routes.php';
require __DIR__.'/client/client_routes.php';
require __DIR__.'/plan/plan_routes.php';
require __DIR__.'/painel/painel_routes.php';

