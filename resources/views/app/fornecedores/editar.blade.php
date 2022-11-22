@extends('app.layouts.basicLayout')

@section('titulo', 'Super Gestão - Fornecedores')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Editar Fornecedor</h1>
        </div>

        <div class="menu">
            <ul>
                <li>
                    <a href="{{ route('app.fornecedor.novo') }}">Novo</a>
                </li>
                <li>
                    <a href="{{ route('app.fornecedor') }}">Consulta</a>
                </li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right:auto;">
                <form method="POST" action="{{ route('app.fornecedor.editar') }}">
                    <input name="id" id="id" type="hidden" value="{{$fornecedor->id}}">
                    @csrf
                    <input name="nome" id="nome" type="text" value="{{$fornecedor->nome}}" placeholder="nome" class="borda-preta">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                    <br>
                    <input name="site" id="site" type="text" value="{{$fornecedor->site}}" placeholder="site" class="borda-preta" style="margin-top: 10px;">
                    {{ $errors->has('site') ? $errors->first('site') : '' }}
                    <br>
                    <input name="uf" id="uf" type="text" value="{{$fornecedor->uf}}" placeholder="uf" class="borda-preta" style="margin-top: 10px;">
                    {{ $errors->has('uf') ? $errors->first('uf') : '' }}
                    <br>
                    <input name="email" id="email" type="email" value="{{$fornecedor->email}}" placeholder="email" class="borda-preta" style="margin-top: 10px;">
                    {{ $errors->has('email') ? $errors->first('email') : '' }}
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