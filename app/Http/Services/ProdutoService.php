<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Item;

class ProdutoService implements ProdutoServiceInterface
{
    public function getAllProdutos() {
        return Item::all();
    }

    public function listar() {
        return Item::select("produtos.*", "unidades.unidade")->join("unidades", "produtos.unidade_id", "=", "unidades.id")->with(["produtoDetalhe", "fornecedor"])->paginate(10);
    }

    public function salvar(Request $request) {
        if($request->_token != '') {
            $regras = [
                "nome" => "required|min:3|max:50",
                'descricao' => "required|min:3|max:2000",
                "peso" => "required|integer",
                "unidade_id" => "exists:unidades,id",
                "fornecedor_id" => "exists:fornecedores,id"
            ];
    
            $feedback = [ 
                'nome.min' => 'O mínimo de caracteres para o campo nome é 3',
                'nome.max' => 'O máximo de caracteres para o campo nome é 50', 
                'descricao.min' => 'O mínimo de caracteres para o campo descricao é 3',
                'descricao.max' => 'O máximo de caracteres para o campo descricao é 2000', 
                'peso.integer' => 'O campo peso tem que ser inteiro', 
                'unidade_id.exists' => 'A unidade de medida informada não existe',
                'required' => 'O campo :attribute é requirido',
                'fornecedor_id.exists' => 'O fornecedor informado não existe',
            ];
    
            $request->validate($regras, $feedback);

            Item::create($request->all());

            return "Cadastrado com sucesso";
        }
    }

    public function update(Request $request, Item $produto) {
        if($request->_token != '') {
            $regras = [
                "nome" => "required|min:3|max:50",
                'descricao' => "required|min:3|max:2000",
                "peso" => "required|integer",
                "unidade_id" => "exists:unidades,id",
                "fornecedor_id" => "exists:fornecedores,id"
            ];
    
            $feedback = [ 
                'nome.min' => 'O mínimo de caracteres para o campo nome é 3',
                'nome.max' => 'O máximo de caracteres para o campo nome é 50', 
                'descricao.min' => 'O mínimo de caracteres para o campo descricao é 3',
                'descricao.max' => 'O máximo de caracteres para o campo descricao é 2000', 
                'peso.integer' => 'O campo peso tem que ser inteiro', 
                'unidade_id.exists' => 'A unidade de medida informada não existe',
                'fornecedor_id.exists' => 'O fornecedor informado não existe',
                'required' => 'O campo :attribute é requirido'
            ];
    
            $request->validate($regras, $feedback);

            $produto->update($request->all());

            return "Alterado com sucesso";
        }
    }

    public function deletar(Item $produto) {
        $produto->delete();
    }
}