<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PlanController;

Route::post('plans', [PlanController::class, 'store']);
Route::get('plans', [PlanController::class, 'index']);
