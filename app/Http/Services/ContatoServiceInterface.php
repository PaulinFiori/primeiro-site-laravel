<?php

namespace App\Http\Services;

use Illuminate\Http\Request;

interface ContatoServiceInterface
{
    function getContatosByNomeAndMotivoAndId();

    function salvarContato(Request $request);
}