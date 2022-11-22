@extends('app.layouts.basicLayout')

@section('titulo', 'Super Gestão - Produto ' .$produto->nome)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Produto {{ $produto->nome }}</h1>
        </div>

        <div class="menu">
            <ul>
                <li>
                    <a href="{{ route('produto.index') }}">Voltar</a>
                </li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right:auto; text-align: start;">
                <p>Nome: {{ $produto->nome }}</p>
                <p>Descrição: {{ $produto->descricao }}</p>
                <p>Peso: {{ $produto->peso . ' ' . $unidade[0]->unidade }}</p>
            </div>
        </div>
    </div>
@endsection