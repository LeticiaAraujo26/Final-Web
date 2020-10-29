<?php

namespace App\Validator;
use App\Models\Produto;
use Illuminate\Support\Facades\Validator;

class ProdutoValidator{

    public static function validate($data){
        $validator = Validator::make($data, \App\Models\Produto::$rules, \App\Models\Produto::$messages);
        if(!$validator -> errors() -> isEmpty ())
            throw new ValidationException($validator, "Erro na validação do Produto");
        return $validator;
    }
}
