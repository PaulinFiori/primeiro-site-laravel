@extends('app.layouts.basicLayout')

@section('titulo', 'Super Gestão - Editar Produto Detalhe')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Editar Produto Detalhe</h1>
        </div>

        <div class="menu">
            <ul>
                <li>
                    <a href="{{ route('produto-detalhe.index') }}">Voltar</a>
                </li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div>Nome do Produto: {{ $produto_detalhe->produto->nome }}<div>
            <div>Descrição do Produto: {{ $produto_detalhe->produto->descricao }}<div>
            
            <div style="width: 30%; margin-left: auto; margin-right:auto;">
                <form method="POST" action="{{ route('produto-detalhe.update', ['produto_detalhe' => $produto_detalhe->id]) }}">
                    @csrf
                    @method("PUT")
                    <input name="comprimento" id="comprimento" type="text" value="{{$produto_detalhe->comprimento}}" placeholder="comprimento" class="borda-preta">
                    {{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}
                    <br>
                    <input name="largura" id="largura" type="text" value="{{$produto_detalhe->largura}}" placeholder="largura" class="borda-preta" style="margin-top: 10px;">
                    {{ $errors->has('largura') ? $errors->first('largura') : '' }}
                    <br>
                    <input name="altura" id="altura" type="text" value="{{$produto_detalhe->altura}}" placeholder="altura" class="borda-preta" style="margin-top: 10px;">
                    {{ $errors->has('altura') ? $errors->first('altura') : '' }}
                    <br>
                    <select name="produto_id" class="mt-2">
                        <option value="">Selecione a unidade de medida</option>
                        @foreach($produtos as $key => $produto)
                            <option value="{{$produto->id}}" {{ $produto_detalhe->produto_id == $produto->id ? 'selected' : '' }}>{{$produto->nome}}</option>
                        @endforeach
                    </select>
                    {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}
                    <br>
                    <select name="unidade_id" class="mt-2">
                        <option value="">Selecione a unidade de medida</option>
                        @foreach($unidades as $key => $unidade)
                            <option value="{{$unidade->id}}" {{ $produto_detalhe->unidade_id == $unidade->id ? 'selected' : '' }}>{{$unidade->descricao}}</option>
                        @endforeach
                    </select>
                    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
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