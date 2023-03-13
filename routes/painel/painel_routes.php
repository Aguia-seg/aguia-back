<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PainelController;


Route::get('painel/clients', [PainelController::class, 'index']);