@extends('app.layouts.basicLayout')

@section('titulo', 'Super Gestão - Novo Cliente')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Novo Cliente</h1>
        </div>

        <div class="menu">
            <ul>
                <li>
                    <a href="{{ route('cliente.index') }}">Voltar</a>
                </li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right:auto;">
                <form method="POST" action="{{ route('cliente.store') }}">
                    @csrf
                    <input name="nome" id="nome" type="text" value="{{ old('nome') }}" placeholder="nome" class="borda-preta">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
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