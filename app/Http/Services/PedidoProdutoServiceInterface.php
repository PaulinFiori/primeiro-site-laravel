<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Produto;
use App\Models\PedidoProduto;

interface PedidoProdutoServiceInterface
{
    function salvar(Request $request, Pedido $pedido);

    function deletar(PedidoProduto $pedidoProduto);
}