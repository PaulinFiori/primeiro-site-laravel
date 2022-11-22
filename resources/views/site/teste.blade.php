<h3>Teste</h3>

A soma entre {{ $p1 }} e {{ $p2 }} é: {{ $p1 + $p2 }}

{{ 'Texto de texte' }}
<?= "Texto de teste" ?>

{{-- Comentário --}}

Fornecedor: {{ $fornecedores[0]['nome'] }} <br>
Status: {{ $fornecedores[0]['status'] }} <br>

@if (count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem alguns fornecedores cadastrados</h3>
@elseif(count($fornecedores) >= 10)
    <h3>Existem varios fornecedores cadastrados</h3>
    @dd($fornecedores)
@else
    <h3>Ainda não existem alguns fornecedores cadastrados</h3>
@endif

{{-- @unless executa se o retorno for false --}}
@if ( !($fornecedores[0]['status'] == 'S'))
    <p>{{ $fornecedores[0]['nome'] }} está inativo.</p>
@else
    <p>{{ $fornecedores[0]['nome'] }} está ativo.</p>
@endif

@unless($fornecedores[0]['status'] == 'S') <!-- se o retorno da condição for false -->
    <p>{{ $fornecedores[0]['nome'] }} está inativo.</p>
@endunless

@isset($fornecedores)
    Fornecedor: {{ $fornecedores[1]['nome'] }} <br>
    Status: {{ $fornecedores[1]['status'] }} <br>
    @isset($fornecedores[1]['cnpj'])
    CNPJ: {{ $fornecedores[1]['cnpj'] }} <br>
    @endisset
@endisset

@isset($fornecedores)
    Fornecedor: {{ $fornecedores[0]['nome'] }} <br>
    Status: {{ $fornecedores[0]['status'] }} <br>
    @isset($fornecedores[0]['cnpj'])
        CNPJ: {{ $fornecedores[0]['cnpj'] }}
        @empty($fornecedores[0]['cnpj'])
            - Vazio
        @endempty
        <br>
    @endisset
@endisset

@isset($fornecedores)
    Fornecedor: {{ $fornecedores[1]['nome'] }} <br>
    Status: {{ $fornecedores[1]['status'] }} <br>
    CNPJ: {{ $fornecedores[1]['cnpj'] ?? 'Dado não preenchido' }}
    <!-- 
        Se a $variável testada não estiver definida
        ou
        Se a $variável testada possuir o valor null
    -->
@endisset

@isset($fornecedores)
    Fornecedor: {{ $fornecedores[1]['nome'] }} <br>
    Status: {{ $fornecedores[1]['status'] }} <br>
    CNPJ: {{ $fornecedores[1]['cnpj'] ?? 'Dado não preenchido' }} <br>
    Telefone: ({{ $fornecedores[1]['ddd'] ?? '' }}) {{ $fornecedores[1]['telefone'] ?? '' }} <br>
    @switch($fornecedores[1]['ddd'])
        @case ('11')
            São Paulo - SP
            @break
        @case ('34')
            Uberlândia - MG
            @break
        @case ('85')
            Fortaleza - CE
            @break
        @default
            Cidade e estado não encontrado
    @endswitch
@endisset

@isset($fornecedores)
    @for($i = 0; isset($fornecedores[$i]); $i++)
        Fornecedor: {{ $fornecedores[$i]['nome'] }} <br>
        Status: {{ $fornecedores[$i]['status'] }} <br>
        CNPJ: {{ $fornecedores[$i]['cnpj'] ?? 'Dado não preenchido' }} <br>
        Telefone: ({{ $fornecedores[$i]['ddd'] ?? '' }}) {{ $fornecedores[$i]['telefone'] ?? '' }} <br><br>
        <hr>
    @endfor
@endisset

@isset($fornecedores)

    @php $i = 0 @endphp
    @while(isset($fornecedores[$i]))
        Fornecedor: {{ $fornecedores[$i]['nome'] }} <br>
        Status: {{ $fornecedores[$i]['status'] }} <br>
        CNPJ: {{ $fornecedores[$i]['cnpj'] ?? 'Dado não preenchido' }} <br>
        Telefone: ({{ $fornecedores[$i]['ddd'] ?? '' }}) {{ $fornecedores[$i]['telefone'] ?? '' }} <br><br>
        <hr>

        @php $i++ @endphp
    @endwhile
@endisset

@isset($fornecedores)
    @foreach ($fornecedores as $fornecedor)
        Fornecedor: {{ $fornecedor['nome'] }} <br>
        Status: {{ $fornecedor['status'] }} <br>
        CNPJ: {{ $fornecedor['cnpj'] ?? 'Dado não preenchido' }} <br>
        Telefone: ({{ $fornecedor['ddd'] ?? '' }}) {{ $fornecedor['telefone'] ?? '' }} <br><br>
        <hr>
    @endforeach
@endisset

@isset($fornecedores)
    @forelse ($fornecedores as $fornecedor)
        Iteração atual: {{ $loop->iteration}} <br>
        Fornecedor: {{ $fornecedor['nome'] }} <br>
        Status: {{ $fornecedor['status'] }} <br>
        CNPJ: {{ $fornecedor['cnpj'] ?? 'Dado não preenchido' }} <br>
        Telefone: ({{ $fornecedor['ddd'] ?? '' }}) {{ $fornecedor['telefone'] ?? '' }} <br><br>
        <hr>
        @empty
            Não existem fornecedores cadastrados!
    @endforelse
@endisset

@isset($fornecedores)
    @forelse ($fornecedores as $fornecedor)
        Fornecedor: @{{ $fornecedor['nome'] }} <br>
        Status: @{{ $fornecedor['status'] }} <br>
        CNPJ: @{{ $fornecedor['cnpj'] ?? 'Dado não preenchido' }} <br>
        Telefone: (@{{ $fornecedor['ddd'] ?? '' }}) @{{ $fornecedor['telefone'] ?? '' }} <br><br>
        <hr>
        @empty
            Não existem fornecedores cadastrados!
    @endforelse
@endisset

@php
    /*
    if() {

    } elseif() {

    } else {

    }

    if( !condicao ) // executa se o retorno for true

    if(isset($variavel)) // retorna true se a variável estiver definida

    if(empty($variavel)) // retorna true se a variável estiver vazia
    - ''
    - 0
    - 0.0
    - '0'
    - null
    - false
    - array()
    - $var
    */
@endphp