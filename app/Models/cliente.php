<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'tipo'
    ];

    public static $rules = [ 
        'tipo' => 'required|in:revendedor:consumidor',
    ];

    public function vendas(){
        return $this->hasMany('App\Models\Venda');
    }

    public function pessoa(){
        return $this->belongsTo('App\Models\Pessoa');
    }
}
