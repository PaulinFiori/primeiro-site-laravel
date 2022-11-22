@extends('site.layouts.basicLayout')

@section('titulo', 'Super Gestão - Contato')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Entre em contato conosco</h1>
        </div>

        <div class="informacao-pagina">
            <div class="contato-principal">
                @component('site.layouts._components.form_contato', ['classe' => 'borda-preta', 'motivo_contatos' => $motivo_contatos])
                    <p>A nossa equipe analisará a sua mensagem e retornaremos o mais brevemente possível!</p>
                    <p>Nosso tempo médio de resposta é de 48 horas.</p>
                @endcomponent
                
                {{-- @isset($contatos)
                    @foreach ($contatos as $contato)
                        Código: {{ $contato['id'] }} <br>
                        Nome: {{ $contato['nome'] }} <br>
                        Telefone: {{ $fornecedor['telefone'] ?? '' }} <br>
                        Email: {{ $contato['email'] }} <br>
                        Motivo: {{ $contato['motivo'] }} <br>
                        Mensagem: {{ $contato['mensagem'] }} <br><br>
                    @endforeach
                @endisset  --}}
            </div>
        </div>  
    </div>
@endsection
