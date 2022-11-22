<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\MotivoContato;

class MotivoContatoService implements MotivoContatoServiceInterface
{
    public function getAllMotivoContato() {
        return MotivoContato::all();
    }
}