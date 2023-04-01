<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;
use illuminate\Support\Str;


class Client extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'type',
        'cpf_cnpj',
        'active',
        'phone',
        'email',
    ];
    
    public function houses(): hasMany
    {
        return $this->hasMany(House::class);
    }
    
    public function contracts(): hasMany
    {
        return $this->hasMany(Contract::class, 'client_id');
    }

    function scopeGetContract($query) 
    {
        return $query->with([
            'contracts.plan', 
            'contracts.invoices',
            'houses'

        ]);
    }
    
}
