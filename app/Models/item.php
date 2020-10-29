<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantidade', 'preco'
    ];

    public static $rules = [
    ];

    public function produto()
    {
        return $this->belongsTo('App\Models\Produto');
    }

    public function venda()
    {
        return $this->belongsTo('App\Models\Venda');
    }
}
