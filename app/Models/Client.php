<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'type',
        'cpf_cnpj',
        'active',
        'cellphone',
        'email',
        'city',
        'district',
        'street',
        'complement',
        'number',
        'veicle',
    ];
}
