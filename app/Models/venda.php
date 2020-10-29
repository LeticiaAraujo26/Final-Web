<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class venda extends Model
{
    use HasFactory;

    protected $fillable = [
        'preco', 'forma_pagamento'
    ];

    public static $rules = [
        'forma_pagamento' => 'required'
    ];

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }

    public function funcionario()
    {
        return $this->belongsTo('App\Models\Funcionario');
    }

    public function gerente()
    {
        return $this->belongsTo('App\Models\Gerente');
    }

    public function items()
    {
        return $this->hasMany('App\Models\Item');
    }
}
