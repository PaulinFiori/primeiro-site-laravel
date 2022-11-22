@extends('app.layouts.basicLayout')

@section('titulo', 'Super Gestão - Novo Pedido Detalhe')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Novo Pedido Detalhe</h1>
        </div>

        <div class="menu">
            <ul>
                <li>
                    <a href="{{ route('pedido.index') }}">Voltar</a>
                </li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right:auto;">
                <form method="POST" action="{{ route('pedido-produto.store', ['pedido' => $pedido->id]) }}">
                    @csrf
                    <p> Cliente: {{ $pedido->cliente->nome }} </p>
                    <br>
                    <select name="produto_id" class="mt-2">
                        <option value="">Selecione um produto</option>
                        @foreach($produtos as $key => $produto)
                            <option value="{{$produto->id}}" {{ old('produto_id') == $produto->id ? 'selected' : '' }}>{{$produto->nome }}</option>
                        @endforeach
                    </select>
                    {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}
                    <br>
                    <input type="number" name="quantidade" value="{{ old('quantidade') }}" placeholder="Quantidade" class="mt-2">
                    {{ $errors->has('quantidade') ? $errors->first('quantidade') : '' }}
                    <br>
                    <button type="submit" class="borda-preta" style="margin-top: 10px;">ADICIONAR</button>
                </form>
            </div>

            <h4>Itens do pedido</h4>
            @foreach($pedido->produtos as $key => $pedidoProduto)
                <hr>
                <p>Nome do produto: {{ $pedidoProduto->nome }} </p>
                <p>Data de criação do produto no pedido: {{ $pedidoProduto->pivot->created_at->format('d/m/Y') }} </p>
                <p>
                    <form method="POST" action="{{ route('pedido-produto.destroy', ['pedidoProduto' => $pedidoProduto->pivot->id, 'pedido_id' => $pedido->id]) }}" id="form_{{$pedidoProduto->pivot->id}}">
                        @csrf
                        @method("DELETE")
                        <a href="#" onclick="document.getElementById('form_{{$pedidoProduto->pivot->id}}').submit()">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </form>
                </p>
                <hr>
            @endforeach
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