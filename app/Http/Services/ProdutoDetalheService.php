<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\ProdutoDetalhe;
use App\Models\ItemDetalhe;

class ProdutoDetalheService implements ProdutoDetalheServiceInterface
{
    public function getProdutoById($id) {
        return ItemDetalhe::find($id)->with(["produto"]);
    }

    public function getProdutoDetalheByProduto(int $produtoId) {
        return ProdutoDetalhe::where("produto_id", $produtoId)->first();
    }

    public function salvar(Request $request) {
        if($request->_token != '') {
            $regras = [
                "comprimento" => "required",
                'largura' => "required",
                "altura" => "required",
                "produto_id" => "exists:produtos,id",
                "unidade_id" => "exists:unidades,id",
            ];
    
            $feedback = [ 
                'produto_id.exists' => 'O produto informado não existe',
                'unidade_id.exists' => 'A unidade de medida informada não existe',
                'required' => 'O campo :attribute é requirido'
            ];
    
            $request->validate($regras, $feedback);

            ProdutoDetalhe::create($request->all());

            return "Cadastrado com sucesso";
        }
    }

    public function update(Request $request, ProdutoDetalhe $produtoDetalhe) {
        if($request->_token != '') {
            $regras = [
                "comprimento" => "required",
                'largura' => "required",
                "altura" => "required",
                "produto_id" => "exists:produtos,id",
                "unidade_id" => "exists:unidades,id",
            ];
    
            $feedback = [ 
                'produto_id.exists' => 'O produto informado não existe',
                'unidade_id.exists' => 'A unidade de medida informada não existe',
                'required' => 'O campo :attribute é requirido'
            ];
    
            $request->validate($regras, $feedback);

            $produtoDetalhe->update($request->all());

            return "Alterado com sucesso";
        }
    }
}