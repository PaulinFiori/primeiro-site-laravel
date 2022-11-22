<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;
use App\Http\Services\FornecedoresServiceInterface;

class FornecedoresController extends Controller
{
    private $fornecedoresService;

    public function __construct(FornecedoresServiceInterface $fornecedoresService) {
        $this->fornecedoresService = $fornecedoresService;
    }

    public function index() {
        return view('app.fornecedores.index');
    }

    public function novo(Request $request) {
        $msg = $this->fornecedoresService->novo($request);

        return view('app.fornecedores.adicionar', ["msg" => $msg]);
    }

    public function listar(Request $request) {
        $fornecedores = $this->fornecedoresService->listar($request);

        return view('app.fornecedores.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function editar(Request $request) {
        $fornecedor = $this->fornecedoresService->getFornecedorById($request->id);

        return view('app.fornecedores.editar', ['fornecedor' => $fornecedor]);
    }

    public function update(Request $request) {
        $fornecedor = $this->fornecedoresService->getFornecedorById($request->id);

        $this->fornecedoresService->update($fornecedor, $request);

        return view('app.fornecedores.index', ['msg' => "Fornecedor atualizado com sucesso"]);
    }

    public function deletar(Request $request) {
        $this->fornecedoresService->deletar($request->id);

        return view('app.fornecedores.index', ['msg' => "Fornecedor removido com sucesso"]);
    }
}