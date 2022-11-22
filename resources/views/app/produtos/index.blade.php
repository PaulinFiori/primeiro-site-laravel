@extends('app.layouts.basicLayout')

@section('titulo', 'Super Gestão - Produtos')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Produtos</h1>
        </div>

        <div class="menu">
            <ul>
                <li>
                    <a href="{{ route('produto.index') }}">Produtos</a>
                </li>
                <li>
                    <a href="{{ route('produto.create') }}">Novo</a>
                </li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right:auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Fornecedor</th>
                            <th>Peso</th>
                            <th>Unidade</th>
                            <th>Comprimento</th>
                            <th>Largura</th>
                            <th>Altura</th>
                            <th style="border-right: hidden;"></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <td>
                                    <a href="{{ route('produto.show', ['produto' => $produto->id]) }}" style="color: black !important;">
                                        {{ $produto->nome }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('produto.show', ['produto' => $produto->id]) }}" style="color: black !important;">
                                        {{ $produto->descricao }}
                                    </a>
                                </td>
                                <td>{{ $produto->Fornecedor->nome }}</td>
                                <td>{{ $produto->peso }}</td>
                                <td>{{ $produto->unidade }}</td>
                                <td>{{ $produto->produtoDetalhe->comprimento ?? '' }}</td>
                                <td>{{ $produto->produtoDetalhe->largura ?? '' }}</td>
                                <td>{{ $produto->produtoDetalhe->altura ?? '' }}</td>
                                <td style="border-right: hidden;">
                                    <form method="POST" action="{{ route('produto.destroy', ['produto' => $produto->id]) }}" id="form_{{$produto->id}}">
                                        @csrf
                                        @method("DELETE")
                                        <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ route('produto.edit', ['produto' => $produto->id]) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="11">
                                    Exibir o id do Pedido(s)
                                    <br>
                                    @foreach ($produto->pedidos as $pedido)
                                        <a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id ]) }}">
                                            <i class="fa-solid fa-list"></i>
                                            {{ $pedido->id }}
                                        </a>
                                        <br>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex">
                    <span style="margin-top: 20px; margin-right: 15px;">
                        Total de registro: {{ $produtos->total() }}
                    </span>
                    
                    {{ $produtos->appends($request)->links("pagination::bootstrap-4") }}
                </div>
            </div>
        </div>
    </div>
    
    @if(isset($msg))
        <script>
            $(document).ready(function() {
                toastr.options = {
                    "progressBar": true,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000"
                }

                toastr.success("{{$msg}}");
            });
        </script>
    @endif
@endsection