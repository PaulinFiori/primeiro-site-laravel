@extends('app.layouts.basicLayout')

@section('titulo', 'Super Gestão - Fornecedores')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Fornecedores</h1>
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
                <form method="POST" action="{{ route('app.fornecedor.listar') }}">
                    @csrf
                    <input name="nome" id="nome" type="text" placeholder="nome" class="borda-preta">
                    <br>
                    <input name="site" id="site" type="text" placeholder="site" class="borda-preta" style="margin-top: 10px;">
                    <br>
                    <input name="uf" id="uf" type="text" placeholder="uf" class="borda-preta" style="margin-top: 10px;">
                    <br>
                    <input name="email" id="email" type="email" placeholder="email" class="borda-preta" style="margin-top: 10px;">
                    <br>
                    <button type="submit" class="borda-preta" style="margin-top: 10px;">PESQUISAR</button>
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