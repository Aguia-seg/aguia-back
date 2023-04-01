<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

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
        'days',
        'addition',
    ];

    protected $casts = [
        'expiration' => 'datetime:d/m/Y',
    ];

   public function getTypeAttribute($value)
   {
        if($value == 'pending'){
            $value = 'Pendente';
        }
        else if($value == 'payed'){
            $value = 'Pago';
        }
        else if($value == 'delayed'){
            $value = 'Atrasado';
        }
        else if($value == 'canceled'){
            $value = 'Cancelado';
        }


        return $value;
   }
}
