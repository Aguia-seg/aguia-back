<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClientsController;

Route::post('clients', [ClientsController::class, 'store']);
Route::get('clients', [ClientsController::class, 'index']);
Route::get('clients/{id}', [ClientsController::class, 'show']);
