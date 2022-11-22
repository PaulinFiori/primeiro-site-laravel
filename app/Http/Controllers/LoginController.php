<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\LoginServiceInterface;

class LoginController extends Controller
{
    private $loginService;

    public function __construct(LoginServiceInterface  $loginService)
    {
        $this->loginService = $loginService;
    }

    public function index(Request $request) {
        $erro = '';

        if($request->get('erro') == 1) $erro = "Usuario/senha inválidos";
        else if($request->get('erro') == 2) $erro = "Necessário realizar login";

        return view('site.login', ['erro' => $erro]);
    }

    public function fazerLogin(Request $request) {
        $usuario = $this->loginService->fazerLogin($request);

        if(isset($usuario)) {
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;
            return redirect()->route('app.home');
        }
        else return redirect()->route('site.login', ['erro' => 1]);
    }

    public function sair() {
        session_destroy();

        return redirect()->route('site.index');
    }
}
