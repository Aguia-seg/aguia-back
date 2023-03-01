<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;


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
        'cep',
        'city',
        'district',
        'street',
        'complement',
        'number',
        'veicle',
    ];

    
    public function contracts(): hasMany
    {
        return $this->hasMany(Contract::class, 'client_id');
    }
}
