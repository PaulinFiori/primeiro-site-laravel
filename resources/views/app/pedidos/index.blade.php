@extends('app.layouts.basicLayout')

@section('titulo', 'Super Gestão - Pedidos')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Pedidos</h1>
        </div>

        <div class="menu">
            <ul>
                <li>
                    <a href="{{ route('pedido.create') }}">Novo</a>
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
                            <th>Código</th>
                            <th>Cliente</th>
                            <th style="border-right: hidden;"></th>
                            <th style="border-right: hidden;"></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($pedidos as $pedido)
                            <tr>
                                <td>{{ $pedido->id }}</td>
                                <td>{{ $pedido->cliente->nome }}</td>
                                <td style="border-right: hidden;">
                                    <form method="POST" action="{{ route('pedido.destroy', ['pedido' => $pedido->id]) }}" id="form_{{$pedido->id}}">
                                        @csrf
                                        @method("DELETE")
                                        <a href="#" onclick="document.getElementById('form_{{$pedido->id}}').submit()">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </form>
                                </td>
                                <td style="border-right: hidden;">
                                    <a href="{{ route('pedido.edit', ['pedido' => $pedido->id]) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}">
                                        <i class="fa-solid fa-plus"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex">
                    <span style="margin-top: 20px; margin-right: 15px;">
                        Total de registro: {{ $pedidos->total() }}
                    </span>
                    
                    {{ $pedidos->appends($request)->links("pagination::bootstrap-4") }}
                </div>
            </div>
        </div>
    </div>
@endsection