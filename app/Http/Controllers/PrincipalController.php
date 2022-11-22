<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\MotivoContatoServiceInterface;

class PrincipalController extends Controller
{
    private $motivoContatoService;

    public function __construct(MotivoContatoServiceInterface $motivoContatoService)
    {
        //$this->middleware(['auth', SetDefaultLayoutForUrls::class]);
        $this->motivoContatoService = $motivoContatoService;
    }

    public function principal() {
        $motivo_contatos = $this->motivoContatoService->getAllMotivoContato();
        return view('site.principal', [
            'motivo_contatos' => $motivo_contatos
        ]);
    }
}
