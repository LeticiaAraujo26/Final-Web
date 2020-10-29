<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class endereco extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rua', 'bairro', 'cidade', 'numero', 'CEP'
    ];

    public static $rules = [
        'rua' => 'required|min:5|max:100',
        'bairro' => 'required|min:5|max:100',
        'cidade' => 'required|min:3|max:100',
        'numero' => 'required|min:1|max:5',
        'CEP' => 'required|min:8|max:8'
    ];

    public function pessoa()
    {
        return $this->belongsTo('App\Models\Pessoa');
    }
}
