<?php

namespace App\Validator;

use App\Models\Venda;

class VendaValidator{
    
    public static function validate($data){
        if(!isset($data['cliente_id'])) {
            $id = \Auth::id();
               if(isset($id))
                $data['cliente_id'] = $id;
        }

        if(!isset($data['produto_id'])) {
            $id = \Auth::id();
               if(isset($id))
                $data['produto_id'] = $id;
        }
        

        if(isset($data['quantidade_em_estoque']) && isset($data['quantidade_de_pedidos']) && $data['quantidade_em_estoque'] < $data['quantidade_de_pedidos'] )
			$validator->errors()->add('quantidade_em_estoque', 'A quantidade de pedidos não pode ser maior que a quantidade em estoque' );

        $validator = \Validator::make($data, \App\Models\Venda::$rules, \App\Models\Venda::$messages);
        if(!$validator -> errors() -> isEmpty ())
            throw new ValidationException ($validator, "Erro na validação da Venda");
     }
}