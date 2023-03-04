<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'contract_id',
        'expiration',
        'value',
        'off',
        'status',
    ];

    protected $casts = [
        'expiration' => 'datetime:d/m/Y',
    ];
}
