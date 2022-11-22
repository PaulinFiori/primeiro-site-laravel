<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Item;

interface ProdutoServiceInterface
{
    function getAllProdutos();
    
    function listar();

    function salvar(Request $request);

    function update(Request $request, Item $produto);

    function deletar(Item $produto);
}