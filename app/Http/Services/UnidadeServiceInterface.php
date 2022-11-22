<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\Unidade;

interface UnidadeServiceInterface
{
    function getTodasUnidades();

    function getUnidadeByProduto(int $id);
}