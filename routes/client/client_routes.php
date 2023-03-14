<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClientsController;

Route::post('clients', [ClientsController::class, 'store']);
Route::get('clients', [ClientsController::class, 'index']);
Route::get('clients/{id}', [ClientsController::class, 'show']);
Route::get('clients/edit/{id}', [ClientsController::class, 'edit']);
Route::post('clients/search', [ClientsController::class, 'search']);
