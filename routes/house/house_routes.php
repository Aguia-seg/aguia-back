<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HouseController;

Route::get('houses/filter', [HouseController::class, 'showDistinct']);