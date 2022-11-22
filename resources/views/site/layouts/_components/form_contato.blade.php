{{ $slot }}

<!--@if($errors->any())
    <div style="background-color: red; position: absolute; top: 0; width: 100%; left: 0%;">
        @foreach ($errors->all() as $erro)
            {{ $erro }}
        @endforeach
    </div>
@endif -->

<form action="{{route('site.salvarContatos')}}" method="POST">
    @csrf
    <input name="nome" id="nome" type="text" placeholder="Nome" class="{{ $classe }}" value="{{ old('nome') }}">
    @if($errors->has('nome'))
        {{ $errors->first('nome') }}
    @endif
    <br>
    <input name="telefone" id="telefone" type="text" placeholder="Telefone" class="{{ $classe }}"  value="{{ old('telefone') }}">
    @if($errors->has('telefone'))
        {{ $errors->first('telefone') }}
    @endif
    <br>

    <input name="email" id="email" type="text" placeholder="E-mail" class="{{ $classe }}"  value="{{ old('email') }}">
    @if($errors->has('email'))
        {{ $errors->first('email') }}
    @endif
    <br>

    <select name="motivo_contatos_id" id="motivo_contatos_id" class="{{ $classe }}">
        <option value="" {{ old('motivo_contatos_id') == "" ? "selected" : "" }}>Qual o motivo do contato?</option>
        @foreach($motivo_contatos as $key => $motivo_contato)

            <option value="{{$motivo_contato->id}}" {{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : '' }}>{{$motivo_contato->motivo_contato}}</option>
        @endforeach
    </select>
    @if($errors->has('motivo_contatos_id'))
        {{ $errors->first('motivo_contatos_id') }}
    @endif
    <br>

    <textarea name="mensagem" id="mensagem" class="{{ $classe }}" placeholder="Preencha aqui a sua mensagem" >
        @if(old('mensagem') != '')
            {{ old('mensagem') }}
        @endif
    </textarea>
    @if($errors->has('mensagem'))
        {{ $errors->first('mensagem') }}
    @endif
    <br>

    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>
