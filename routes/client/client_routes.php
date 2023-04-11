<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClientsController;

Route::post('clients', [ClientsController::class, 'store']);
Route::get('clients', [ClientsController::class, 'index']);
Route::get('clients/{id}', [ClientsController::class, 'show']);
Route::delete('clients/{id}', [ClientsController::class, 'destroy']);
Route::delete('clients/delete/{id}', [ClientsController::class, 'forceDestroy']);
Route::get('clients/edit/{id}', [ClientsController::class, 'edit']);
Route::post('clients/search', [ClientsController::class, 'search']);
Route::put('clients/{id}', [ClientsController::class, 'update']);
Route::get('clients/bin/show', [ClientsController::class, 'trashedOnly']);
Route::get('clients/restore/{id}', [ClientsController::class, 'restoreTrashed']);
