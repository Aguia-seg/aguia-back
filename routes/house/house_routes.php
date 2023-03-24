<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HouseController;

Route::get('houses', [HouseController::class, 'index']);
Route::get('houses/district', [HouseController::class, 'showDistinctDistrict']);
Route::get('houses/street', [HouseController::class, 'showDistinctStreet']);