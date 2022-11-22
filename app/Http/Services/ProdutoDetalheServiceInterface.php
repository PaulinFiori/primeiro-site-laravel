<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\ProdutoDetalhe;

interface ProdutoDetalheServiceInterface
{
    function getProdutoById($id);
    
    function getProdutoDetalheByProduto(int $produtoId);

    function salvar(Request $request);

    function update(Request $request, ProdutoDetalhe $produtoDetalhe);
}