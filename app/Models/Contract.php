<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{hasMany, BelongsTo, hasOne};

class Contract extends Model
{
    use HasFactory; 
    protected $fillable = [
        'client_id',
        'plan_id',
        'expiration',
        'payday',
        'value',
        'off',
    ];

    public function plan() : BelongsTo
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }
}
