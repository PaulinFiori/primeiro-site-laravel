<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\SiteContato;

class ContatoService implements ContatoServiceInterface
{
    public function getContatosByNomeAndMotivoAndId() {
        return SiteContato::where(
            function($query) { 
                $query->where('nome', 'Paulo')->orWhere('nome', 'Ana'); 
            })
        ->where(
            function($query) { 
                $query->whereIn('motivo_contatos_id', [1, 2])->orwhereBetween('id', [4,6]); 
        })->get();
    }

    public function salvarContato(Request $request) {
        $contato = new SiteContato();
        
        /*
        if($request->nome) $contato->nome = $request->nome;

        if($request->telefone) $contato->telefone = $request->telefone;

        if($request->email) $contato->email = $request->email;

        if($request->motivo_contatos_id) $contato->motivo = $request->motivo_contato;

        if($request->mensagem) $contato->mensagem = $request->mensagem;
        */

        $request->validate(
            [
                'nome' => 'required|min:3|max:40|unique:site_contatos', 
                'telefone' => 'required|min:3|max:20', 
                'email' => 'email', 
                'motivo_contatos_id' => 'required', 
                'mensagem' => 'required|min:1|max:150'
            ],
            [
                'nome.min' => 'O minímo de caracteres para o campo nome é 3', 
                'nome.max' => 'O maxímo de caracteres para o campo nome é 40', 
                'nome.unique' => 'Nome já cadastrado', 
                'telefone.min' => 'O minímo de caracteres para o campo nome é 3', 
                'telefone.max' => 'O maxímo de caracteres para o campo nome é 420', 
                'email.email' => 'Campo email no formato errado', 
                'mensagem.min' => 'O minímo de caracteres para o campo nome é 1',
                'mensagem.max' => 'O maxímo de caracteres para o campo nome é 150',
                'required' => 'O campo :attribute é requirido'
            ]
        );

        $contato->create($request->all());
    }
}