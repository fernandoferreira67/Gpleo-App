<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'fullname', 'cpf', 'rg', 'phone','cellphone','address', 'district', 'cep', 'city', 'description', 'active'
    ];

    public function orderService()
    {
       return $this->hasMany(OrderService::class);
    }

   
}
