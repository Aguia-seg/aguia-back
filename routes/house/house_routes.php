<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HouseController;

Route::get('houses', [HouseController::class, 'index']);
Route::get('houses/filtered', [HouseController::class, 'filter']);
Route::get('houses/district', [HouseController::class, 'showDistinctDistrict']);
Route::get('houses/street/{district}', [HouseController::class, 'showDistinctStreet']);