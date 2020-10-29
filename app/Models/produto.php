<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produto extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'marca', 'quantidade_em_estoque', 'peso', 'preco', 'preco_revenda'
    ];

    public static $rules = [
        'nome' => 'required|min:5|max:100',
        'marca' => 'required|min:5|max:100',
        'quantidade_em_estoque' => 'required|numeric|min:0',
        'peso' => 'required|numeric|min:13',
        'preco' => 'required|numeric|min:40',
        'preco_revenda' => 'required|numeric|min:30'
    ];

    public function remover_de_estoque($quantidade)
    {
        $this->quantidade_em_estoque -= $quantidade;
        $this->save();
    }
}
