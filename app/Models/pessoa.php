<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pessoa extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'email', 'senha', 'CPF', 'nascimento', 'telefone'
    ];

    public static $rules = [
        'nome' => 'required|min:5|max:100',
        'CPF' => 'required|cpf',
        'telefone' => 'required',
        'nascimento' => 'required|date'
    ];

    public function endereco()
    {
        return $this->hasOne('App\Models\Endereco');
    }

    public function gerente()
    {
        return $this->hasOne('App\Models\Gerente');
    }

    public function cliente()
    {
        return $this->hasOne('App\Models\Cliente');
    }

    public function funcionario()
    {
        return $this->hasOne('App\Models\Funcionario');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
