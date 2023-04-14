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
        'badget_id',
        'type',
        'cep',
        'street',
        'district',
        'number',
        'veicle',

    ];

    public function badgets(): BelongsTo
    {
        return $this->belongsTo(Badget::class, 'badget_id');
    }

    public function clients(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    function scopeWithClients($query) 
    {
        return $query->with([
            'clients',
            'badgets'

        ]);
    }
}
