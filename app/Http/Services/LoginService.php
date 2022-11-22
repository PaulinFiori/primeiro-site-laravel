<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\User;

class LoginService implements LoginServiceInterface
{
    public function fazerLogin(Request $request) {
        $regras = [
            "usuario" => "email",
            'senha' => "required|min:6"
        ];

        $feedback = [ 
            'usuario.email' => 'Campo usuário está no formato errado', 
            'senha.min' => 'O minímo de caracteres para o campo senha é 6',
            'required' => 'O campo :attribute é requirido'
        ];

        $request->validate($regras, $feedback);

        $usuario = User::where("email", $request->usuario)->where("password", $request->senha)->get()->first();

        return $usuario;
    }
}