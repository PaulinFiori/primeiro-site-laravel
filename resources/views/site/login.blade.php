@extends('site.layouts.basicLayout', ['login' => true])

@section('titulo', 'Login')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>

        <div class="informacao-pagina">
            <div style="width:30%; margin-left: auto; margin-right: auto;">
                {{ isset($erro) && $erro != '' ? $erro : '' }}

                <form action="{{route('site.login')}}" method="POST">
                    @csrf
                    <input name="usuario" id="usuario" type="email" placeholder="Usuário" class="borda-preta">
                    <br>
                    <input name="senha" id="senha" type="password" placeholder="senha" class="borda-preta" style="margin-top: 10px;">
                    <br>
                    <button type="submit" class="borda-preta" style="margin-top: 10px;">LOGAR</button>
                </form>
            </div>
        </div>  
    </div>
    
@endsection