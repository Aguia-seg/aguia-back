<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HouseController;

Route::get('houses', [HouseController::class, 'index']);
Route::post('houses/filtered', [HouseController::class, 'filter']);
Route::post('houses', [HouseController::class, 'store']);
Route::get('houses/{id}', [HouseController::class, 'show']);
Route::put('houses/{id}', [HouseController::class, 'update']);

Route::get('houses/filter/{city}/district', [HouseController::class, 'showDistinctDistrict']);
Route::get('houses/street/{district}', [HouseController::class, 'showDistinctStreet']);