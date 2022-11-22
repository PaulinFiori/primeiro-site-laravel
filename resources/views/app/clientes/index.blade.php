@extends('app.layouts.basicLayout')

@section('titulo', 'Super Gestão - Clientes')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Clientes</h1>
        </div>

        <div class="menu">
            <ul>
                <li>
                    <a href="{{ route('cliente.create') }}">Novo</a>
                </li>
                <li>
                    <a href="{{ route('app.fornecedor') }}">Consulta</a>
                </li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right:auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->nome }}</td>
                                <td style="border-right: hidden;">
                                    <form method="POST" action="{{ route('cliente.destroy', ['cliente' => $cliente->id]) }}" id="form_{{$cliente->id}}">
                                        @csrf
                                        @method("DELETE")
                                        <a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ route('cliente.edit', ['cliente' => $cliente->id]) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex">
                    <span style="margin-top: 20px; margin-right: 15px;">
                        Total de registro: {{ $clientes->total() }}
                    </span>
                    
                    {{ $clientes->appends($request)->links("pagination::bootstrap-4") }}
                </div>
            </div>
        </div>
    </div>
@endsection