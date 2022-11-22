@extends('app.layouts.basicLayout')

@section('titulo', 'Super Gestão - Novo Pedido')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Novo Pedido</h1>
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
                <form method="POST" action="{{ route('pedido.store') }}">
                    @csrf
                    <select name="cliente_id" class="mt-2">
                        <option value="">Selecione um cliente</option>
                        @foreach($clientes as $key => $cliente)
                            <option value="{{$cliente->id}}" {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>{{$cliente->nome}}</option>
                        @endforeach
                    </select>
                    {{ $errors->has('cliente_id') ? $errors->first('cliente_id') : '' }}
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