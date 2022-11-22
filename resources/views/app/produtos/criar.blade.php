@extends('app.layouts.basicLayout')

@section('titulo', 'Super Gestão - Novo Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Novo Produto</h1>
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
            <div style="width: 30%; margin-left: auto; margin-right:auto;">
                <form method="POST" action="{{ route('produto.store') }}">
                    @csrf
                    <input name="nome" id="nome" type="text" value="{{ old('nome') }}" placeholder="nome" class="borda-preta">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                    <br>
                    <input name="descricao" id="descricao" type="text" value="{{ old('descricao') }}" placeholder="descrição" class="borda-preta" style="margin-top: 10px;">
                    {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}
                    <br>
                    <input name="peso" id="peso" type="text" value="{{ old('peso') }}" placeholder="peso" class="borda-preta" style="margin-top: 10px;">
                    {{ $errors->has('peso') ? $errors->first('peso') : '' }}
                    <br>
                    <select name="unidade_id" class="mt-2">
                        <option value="">Selecione a unidade de medida</option>
                        @foreach($unidades as $key => $unidade)
                            <option value="{{$unidade->id}}" {{ old('unidade_id') == $unidade->id ? 'selected' : '' }}>{{$unidade->descricao}}</option>
                        @endforeach
                    </select>
                    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
                    <br>
                    <select name="fornecedor_id" class="mt-2">
                        <option value="">Selecione um fornecedor</option>
                        @foreach($fornecedores as $key => $fornecedor)
                            <option value="{{$fornecedor->id}}" {{ old('fornecedor_id') == $fornecedor->id ? 'selected' : '' }}>{{$fornecedor->nome}}</option>
                        @endforeach
                    </select>
                    {{ $errors->has('fornecedor_id') ? $errors->first('fornecedor_id') : '' }}
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