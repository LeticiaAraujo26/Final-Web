@extends('layouts.app')

@section('content')
    <div class="form-group">
        <label for="nome">nome:</label>
        <input class="form-control" type="text" name="nome" id="nome" value="{{ $cliente->pessoa->nome }}" readonly>
    </div>
    <div class="form-group">
        <label for="email">email:</label>
        <input class="form-control" type="email" name="email" id="email" value="{{ $cliente->pessoa->user->email }}" readonly>
    </div>
    <div class="form-row">
        <div class="col-md-4">
            <label for="telefone">telefone:</label>
            <input class="form-control" type="text" name="telefone" id="telefone" value="{{ $cliente->pessoa->telefone }}"
                   readonly>
        </div>
        <div class="col-md-4">
            <label for="CPF">CPF:</label>
            <input class="form-control" type="text" name="CPF" id="CPF" value="{{ $cliente->pessoa->CPF }}" readonly>
        </div>
        <div class="col-md-4">
            <label for="nascimento">nascimento:</label>
            <input class="form-control" type="date" name="nascimento" id="nascimento"
                   value="{{ $cliente->pessoa->nascimento }}" readonly>
        </div>
    </div>
    <div class="form-group">
        <label for="tipo">tipo</label>
        <div class="radio">
            <label><input type="radio" name="tipo" value="consumidor" id="consumidor"
                          disabled {{ ( $cliente->tipo == 'consumidor' ) ? 'checked' : ''}}>consumidor</label>
        </div>
        <div class="radio">
            <label><input type="radio" name="tipo" value="revendedor" id="revendedor"
                          disabled {{ ( $cliente->tipo == 'revendedor' ) ? 'checked' : ''}}>revendedor</label>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-4">
            <label for="cidade">cidade:</label>
            <input class="form-control" type="text" name="cidade" id="cidade"
                   value="{{ $cliente->pessoa->endereco->cidade }}" readonly>
        </div>
        <div class="col-md-4">
            <label for="bairro">bairro:</label>
            <input class="form-control" type="text" name="bairro" id="bairro"
                   value="{{ $cliente->pessoa->endereco->bairro }}" readonly>
        </div>
        <div class="col-md-4">
            <label for="CEP">CEP:</label>
            <input class="form-control" type="text" name="CEP" id="CEP"
                   value="{{ $cliente->pessoa->endereco->CEP }}" readonly>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-8">
            <label for="rua">rua:</label>
            <input class="form-control" type="text" name="rua" id="rua"
                   value="{{ $cliente->pessoa->endereco->rua }}" readonly>
        </div>
        <div class="col-md-4">
            <label for="numero">numero:</label>
            <input class="form-control" type="text" name="numero" id="numero"
                   value="{{ $cliente->pessoa->endereco->numero }}" readonly>
        </div>
    </div>
@endsection
