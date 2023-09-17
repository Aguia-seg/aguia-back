<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ContractController;

Route::post('contract', [ContractController::class, 'store']);

