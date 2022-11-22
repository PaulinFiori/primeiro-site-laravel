@extends('app.layouts.basicLayout')

@section('titulo', 'Super Gestão - Produtos')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Editar Produto</h1>
        </div>

        <div class="menu">
            <ul>
                <li>
                    <a href="{{ route('produto.index') }}">Voltar</a>
                </li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right:auto;">
                <form method="POST" action="{{ route('produto.update', ['produto' => $produto->id]) }}">
                    @csrf
                    @method("PUT")
                    <input name="nome" id="nome" type="text" value="{{$produto->nome}}" placeholder="nome" class="borda-preta">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                    <br>
                    <input name="descricao" id="descricao" type="text" value="{{$produto->descricao}}" placeholder="descricao" class="borda-preta" style="margin-top: 10px;">
                    {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}
                    <br>
                    <input name="peso" id="peso" type="text" value="{{$produto->peso}}" placeholder="peso" class="borda-preta" style="margin-top: 10px;">
                    {{ $errors->has('uf') ? $errors->first('uf') : '' }}
                    <br>
                    <select name="unidade_id" class="mt-2">
                        <option value="">Selecione a unidade de medida</option>
                        @foreach($unidades as $key => $unidade)
                            <option value="{{$unidade->id}}" {{ $produto->unidade_id == $unidade->id ? 'selected' : '' }}>{{$unidade->descricao}}</option>
                        @endforeach
                    </select>
                    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
                    <br>
                    <select name="fornecedor_id" class="mt-2">
                        <option value="">Selecione um fornecedor</option>
                        @foreach($fornecedores as $key => $fornecedor)
                            <option value="{{$fornecedor->id}}" {{ $produto->fornecedor_id == $fornecedor->id ? 'selected' : '' }}>{{$fornecedor->nome}}</option>
                        @endforeach
                    </select>
                    {{ $errors->has('fornecedor_id') ? $errors->first('fornecedor_id') : '' }}
                    <br>
                    <button type="submit" class="borda-preta" style="margin-top: 10px;">EDITAR</button>
                </form>
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
        </div>
    </div>
@endsection