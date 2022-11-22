<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidoService implements PedidoServiceInterface
{
    public function listarPedidos() {
        return Pedido::paginate(10);
    }

    public function salvar(Request $request) {
        if($request->_token != '') {
            $regras = [
                "cliente_id" => "exists:clientes,id"
            ];
    
            $feedback = [ 
                'cliente_id.exists' => 'O cliente selecionado não existe'
            ];
    
            $request->validate($regras, $feedback);

            Pedido::create($request->all());

            return "Cadastrado com sucesso";
        }
    }
}