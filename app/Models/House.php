<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;

class House extends Model
{
    use HasFactory;
    protected $fillable = [
        'city',
        'client_id',
        'type',
        'cep',
        'street',
        'district',
        'number',

    ];

    public function clients(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
