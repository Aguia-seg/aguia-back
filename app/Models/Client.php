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
        'cep',
        'city',
        'district',
        'street',
        'complement',
        'number',
        'veicle',
    ];


    // public function getPhoneAttribute($value){
    //     return Str::substrReplace($value, '(', 0) . Str::substrReplace($value, ')', 2) . Str::substrReplace($value, '-', 5, 0);
         
    // }
    
    public function contracts(): hasMany
    {
        return $this->hasMany(Contract::class, 'client_id');
    }

    function scopeGetContract($query) 
    {
        return $query->with([
            'contracts.plan', 
            'contracts.invoices'

        ]);
    }
}
