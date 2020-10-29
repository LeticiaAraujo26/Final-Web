<?php

namespace App\Validator;

use App\Models\Gerente;

class GerenteValidator{
    
    public static function validate($data){
        $validator = \Validator::make($data, \App\Models\Gerente::$rules, \App\Models\Gerente::$messages);
        if(!$validator -> errors() -> isEmpty ())
            throw new ValidationException ($validator, "Erro na validação do Gerente");
        return $validator;
    }
}