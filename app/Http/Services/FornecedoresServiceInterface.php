<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

interface FornecedoresServiceInterface
{
    function getFornecedores();

    function getFornecedorById(int $id);

    function getAllFornecedores();

    function novo(Request $request);

    function listar(Request $request);

    function update(Fornecedor $fornecedor, Request $request);

    function deletar(int $id);
}