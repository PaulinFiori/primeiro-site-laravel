<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedoresService implements FornecedoresServiceInterface
{
    public function getFornecedores() {
        $fornecedores = Fornecedor::withTrashed()->get();
        $fornecedoresDeletados = Fornecedor::onlyTrashed()->get();
        $fornecedorRestaurado = Fornecedor::withTrashed()->get()[1]->restore(); //pega o fornecedor na index 1 e restaura ele
    }

    public function getFornecedorById(int $id) {
        return Fornecedor::find($id);
    }

    public function getAllFornecedores() {
        return Fornecedor::all();
    }

    public function novo(Request $request) {
        if($request->_token != '') {
            $regras = [
                "nome" => "required|min:3|max:50",
                'site' => "required",
                "uf" => "required|min:2|max:2",
                "email" => "email",
            ];
    
            $feedback = [ 
                'nome.min' => 'O mínimo de caracteres para o campo uf é 3',
                'nome.max' => 'O máximo de caracteres para o campo uf é 50', 
                'uf.max' => 'O máximo de caracteres para o campo uf é 2',
                'uf.min' => 'O mínimo de caracteres para o campo uf é 2',
                'email.email' => 'Campo email está no formato errado',
                'required' => 'O campo :attribute é requirido'
            ];
    
            $request->validate($regras, $feedback);

            Fornecedor::create($request->all());

            return "Cadastrado com sucesso";
        }
    }

    public function listar(Request $request) {
        return Fornecedor::with(['produtos'])->where("nome", "like", "%". $request->nome ."%")
            ->where("site", "like", "%". $request->site ."%")
            ->where("uf", "like", "%". $request->uf ."%")
            ->where("email", "like", "%". $request->email ."%")
            ->paginate(5);
    }

    public function update(Fornecedor $fornecedor, Request $request) {
        if($request->_token != '') {
            $fornecedor->update($request->all());
        }
    }

    public function deletar(int $id) {
        $fornecedor = self::getFornecedorById($id);

        $fornecedor->delete();
    }
}