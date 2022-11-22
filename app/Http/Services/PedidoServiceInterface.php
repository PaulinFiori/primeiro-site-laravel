<?php

namespace App\Http\Services;

use Illuminate\Http\Request;

interface PedidoServiceInterface
{
    function listarPedidos();

    function salvar(Request $request);
}