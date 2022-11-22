<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Produto;
use App\Models\PedidoProduto;

class PedidoProdutoService implements PedidoProdutoServiceInterface
{
    public function salvar(Request $request, Pedido $pedido) {
        if($request->_token != '') {
            $regras = [
                "produto_id" => "exists:produtos,id",
                "quantidade" => "required"
            ];
    
            $feedback = [ 
                'produto_id.exists' => 'O produto informado não existe',
                'required' => 'O campo :attribute é requirido'
            ];
    
            $request->validate($regras, $feedback);

            /*
            $pedidoProduto = new PedidoProduto();
            $pedidoProduto->pedido_id = $pedido->id;
            $pedidoProduto->produto_id = $request->produto_id;
            $pedidoProduto->quantidade = $request->quantidade;
            $pedidoProduto->save();
            */

            $pedido->produtos()->attach($request->produto_id, 
                ['quantidade' => $request->quantidade]);

            return "Cadastrado com sucesso";
        }
    }

    public function deletar(PedidoProduto $pedidoProduto) {
        /*
        PedidoProduto::where([
            'pedido_id' => $pedido->id,
            'produto_id' => $produto->id
        ])->delete();
        */
        //$pedido->produtos()->detach($produto->id);

        $pedidoProduto->delete();

        return 'Deletado com sucesso';
    }
}