@extends('layouts.app')

@section('content')
    <form action="/clientes" method="post">
        @csrf
        <div class="form-group">
            <label for="nome">nome:</label>
            <input class="form-control" type="text" name="nome" id="nome" value="{{ old('nome') }}">
        </div>
        <div class="form-group">
            <label for="email">email:</label>
            <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}">
        </div>
        <div class="form-row">
            <div class="col-md-4">
                <label for="telefone">telefone:</label>
                <input class="form-control" type="text" name="telefone" id="telefone" value="{{ old('telefone') }}">
            </div>
            <div class="col-md-4">
                <label for="CPF">CPF:</label>
                <input class="form-control" type="text" name="CPF" id="CPF" value="{{ old('CPF') }}">
            </div>
            <div class="col-md-4">
                <label for="nascimento">nascimento:</label>
                <input class="form-control" type="date" name="nascimento" id="nascimento"
                       value="{{ old('nascimento') }}">
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <label for="password">password:</label>
                <input class="form-control" type="password" name="password" id="password">
            </div>
            <div class="col">
                <label for="password_confirmation">password confirmation:</label>
                <input class="form-control" type="password" name="password_confirmation" id="password_confirmation">
            </div>
        </div>
        <div class="form-group">
            <label for="tipo">tipo</label>
            <div class="radio">
                <label><input type="radio" name="tipo" value="consumidor"
                              id="consumidor" {{ ( old('tipo') == 'consumidor' ) ? 'checked' : ''}}>consumidor</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="tipo" value="revendedor"
                              id="revendedor" {{ ( old('tipo') == 'revendedor' ) ? 'checked' : ''}}>revendedor</label>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4">
                <label for="cidade">cidade:</label>
                <input class="form-control" type="text" name="cidade" id="cidade" value="{{ old('cidade') }}">
            </div>
            <div class="col-md-4">
                <label for="bairro">bairro:</label>
                <input class="form-control" type="text" name="bairro" id="bairro" value="{{ old('bairro') }}">
            </div>
            <div class="col-md-4">
                <label for="CEP">CEP:</label>
                <input class="form-control" type="text" name="CEP" id="CEP" value="{{ old('CEP') }}">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-8">
                <label for="rua">rua:</label>
                <input class="form-control" type="text" name="rua" id="rua" value="{{ old('rua') }}">
            </div>
            <div class="col-md-4">
                <label for="numero">numero:</label>
                <input class="form-control" type="text" name="numero" id="numero" value="{{ old('numero') }}">
            </div>
        </div>
        <div>
            <input class="btn btn-primary" type="submit" value="cadastrar">
        </div>
    </form>
@endsection
