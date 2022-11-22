<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteService implements ClienteServiceInterface
{
    public function buscarClientes() {
        return Cliente::paginate(10);
    }

    public function getAllClientes() {
        return Cliente::all();
    }

    public function salvar(Request $request) {
        if($request->_token != '') {
            $regras = [
                "nome" => "required|min:3|max:50"
            ];
    
            $feedback = [ 
                'nome.min' => 'O mínimo de caracteres para o campo nome é 3',
                'nome.max' => 'O máximo de caracteres para o campo nome é 50', 
                'required' => 'O campo :attribute é requirido'
            ];
    
            $request->validate($regras, $feedback);

            Cliente::create($request->all());

            return "Cadastrado com sucesso";
        }
    }
}