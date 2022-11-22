<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\Unidade;

class UnidadeService implements UnidadeServiceInterface
{
    public function getTodasUnidades() {
        return Unidade::all();
    }

    public function getUnidadeByProduto(int $id) {
        return Unidade::where("id", $id)->get();
    }
}