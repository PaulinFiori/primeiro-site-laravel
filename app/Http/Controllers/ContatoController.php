<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Http\Services\ContatoServiceInterface;
use App\Http\Services\MotivoContatoServiceInterface;

class ContatoController extends Controller
{
    private $contatoService;
    private $motivoContatoService;

    public function __construct(ContatoServiceInterface  $contatoService,
    MotivoContatoServiceInterface $motivoContatoService)
    {
        //$this->middleware(['auth', SetDefaultLayoutForUrls::class]);
        $this->contatoService = $contatoService;
        $this->motivoContatoService = $motivoContatoService;
    }

    public function getContatos() {
        $motivo_contatos = $this->motivoContatoService->getAllMotivoContato();
        $contatos = $this->contatoService->getContatosByNomeAndMotivoAndId();

        return view('site.contato')->with([
            'contatos' => $contatos,
            'motivo_contatos' => $motivo_contatos
        ]);
    }

    public function salvarContatos(Request $request) {
        $this->contatoService->salvarContato($request);

        return redirect()->route('site.index');
    }
}
