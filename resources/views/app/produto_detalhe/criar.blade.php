@extends('app.layouts.basicLayout')

@section('titulo', 'Super Gestão - Novo Produto Detalhe')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Novo Produto</h1>
        </div>

        <div class="menu">
            <ul>
                <li>
                    <a href="{{ route('produto-detalhe.index') }}">Produtos</a>
                </li>
                <li>
                    <a href="{{ route('produto-detalhe.create') }}">Novo</a>
                </li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right:auto;">
                <form method="POST" action="{{ route('produto-detalhe.store') }}">
                    @csrf
                    <input name="comprimento" id="comprimento" type="text" value="{{ old('comprimento') }}" placeholder="comprimento" class="borda-preta">
                    {{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}
                    <br>
                    <input name="largura" id="largura" type="text" value="{{ old('largura') }}" placeholder="largura" class="borda-preta" style="margin-top: 10px;">
                    {{ $errors->has('largura') ? $errors->first('largura') : '' }}
                    <br>
                    <input name="altura" id="altura" type="text" value="{{ old('altura') }}" placeholder="altura" class="borda-preta" style="margin-top: 10px;">
                    {{ $errors->has('altura') ? $errors->first('altura') : '' }}
                    <br>
                    <select name="produto_id" class="mt-2">
                        <option value="">Selecione um produto</option>
                        @foreach($produtos as $key => $produto)
                            <option value="{{$produto->id}}" {{ old('produto_id') == $produto->id ? 'selected' : '' }}>{{$produto->descricao}}</option>
                        @endforeach
                    </select>
                    {{$errors->has('produto_id') ? $errors->first('produto_id') : ''}}
                    <br>
                    <select name="unidade_id" class="mt-2">
                        <option value="">Selecione a unidade de medida</option>
                        @foreach($unidades as $key => $unidade)
                            <option value="{{$unidade->id}}" {{ old('unidade_id') == $unidade->id ? 'selected' : '' }}>{{$unidade->descricao}}</option>
                        @endforeach
                    </select>
                    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
                    <br>
                    <button type="submit" class="borda-preta" style="margin-top: 10px;">ADICIONAR</button>
                </form>
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