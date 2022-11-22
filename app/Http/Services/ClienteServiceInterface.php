<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\Cliente;

interface ClienteServiceInterface
{
    function buscarClientes();

    function getAllClientes();

    function salvar(Request $request);
}