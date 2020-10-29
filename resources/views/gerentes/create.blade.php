@extends('layouts.app')

@section('content')

    <form action="/gerentes" method="post">
        @csrf
        <div class="form-group">
            <label>Nome</label>
            <input class="form-control" type="text" placeholder="Nome" name="nome" value="{{ old('nome') }}">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email" name="email" value="{{ old('email') }}">
        </div>

        <div class="form-row">
            <div class="col">
                <label>password</label>
                <input class="form-control" type="password" placeholder="password" name="password" id="password">
            </div>
            <div class="col">
                <label>password confirmation</label>
                <input class="form-control" type="password" placeholder="Confirmar password" name="password_confirmation" id="password_confirmation">
            </div>
        </div>

        <div class="form-row mt-3">
            <div class="col-md-4">
                <label>Data de Nascimento</label>
                <input type="date" class="form-control" name="nascimento" value="{{ old('nascimento') }}">
            </div>
            <div class="col-md-4">
                <label>CPF</label>
                <input type="text" class="form-control" placeholder="CPF" name="CPF" value="{{ old('CPF') }}">
            </div>
            <div class="col-md-4">
                <label>Telefone</label>
                <input type="number" class="form-control" placeholder="Telefone" name="telefone" value="{{ old('telefone') }}">
            </div>
        </div>
        <div class="form-row mt-3">
            <div class="col-md-6">
                <label>Rua</label>
                <input type="text" class="form-control" id="rua" name="rua" placeholder="Rua" value="{{ old('rua') }}">
            </div>
            <div class="col-md-4">
                <label>Bairro</label>
                <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro" value="{{ old('bairro') }}">
            </div>
            <div class="col-md-2">
                <label>Número</label>
                <input type="text" class="form-control" id="numero" name="numero" placeholder="Ex: 20" value="{{ old('numero') }}">
            </div>
        </div>

        <div class="form-row mt-3">
            <div class="form-group col-md-6">
                <label>Cidade</label>
                <input type="text" class="form-control" id="cidade" placeholder="Cidade" name="cidade" value="{{ old('cidade') }}">
            </div>
            <div class="form-group col-md-2">
                <label>CEP</label>
                <input type="text" class="form-control" name="CEP" id="CEP" placeholder="Ex: 55158-400" value="{{ old('CEP') }}">
            </div>
        </div>

        <input class="btn btn-primary" type="submit" value="cadastrar">
    </form>
@endsection
