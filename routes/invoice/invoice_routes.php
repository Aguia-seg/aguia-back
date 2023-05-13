<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\InvoiceController;


Route::get('invoice/{id}', [InvoiceController::class, 'show']);