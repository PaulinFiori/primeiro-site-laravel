<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste(int $p1, int $p2) {
        $fornecedores = [
            0 => ['nome' => 'Fornecedor 1', 'status' => 'N'],
            1 => ['nome' => 'Fornecedor 2', 'status' => 'S'],
        ];

        $msg = isset($fornecedores[0]['cnpj']) ? 'CNPJ informado' : 'CNPJ não informado';
        //echo $msg;

        //return view('site.teste', ['p1' => $p1, 'p2' => $p2]); array associativo

        //return view('site.teste', compact('p1', 'p2')); compact

        return view('site.teste')->with('p1', $p1)->with('p2', $p2)->with('fornecedores', $fornecedores); //with
    }
}
