@extends('layouts.app')

@section('content')
    <form action="{{route('funcionarios.update', $funcionario)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="nome">nome:</label>
            <input class="form-control" type="text" name="nome" id="nome" value="{{ $funcionario->pessoa->nome }}">
        </div>
        <div class="form-group">
            <label for="email">email:</label>
            <input class="form-control" type="email" name="email" id="email" value="{{ $funcionario->pessoa->user->email }}">
        </div>
        <div class="form-row">
            <div class="col-md-6">
                <label for="telefone">telefone:</label>
                <input class="form-control" type="text" name="telefone" id="telefone" value="{{ $funcionario->pessoa->telefone }}">
            </div>
            <div class="col-md-6">
                <label for="CPF">CPF:</label>
                <input class="form-control" type="text" name="CPF" id="CPF" value="{{ $funcionario->pessoa->CPF }}">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6">
                <label for="nascimento">nascimento:</label>
                <input class="form-control" type="date" name="nascimento" id="nascimento"
                       value="{{ old('nascimento') }}">
            </div>
            <div class="col-md-6">
                <label for="admissao">admissao:</label>
                <input class="form-control" type="date" name="admissao" id="admissao"
                       value="{{ old('admissao') }}">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4">
                <label for="cidade">cidade:</label>
                <input class="form-control" type="text" name="cidade" id="cidade"
                       value="{{ $funcionario->pessoa->endereco->cidade }}">
            </div>
            <div class="col-md-4">
                <label for="bairro">bairro:</label>
                <input class="form-control" type="text" name="bairro" id="bairro"
                       value="{{ $funcionario->pessoa->endereco->bairro }}">
            </div>
            <div class="col-md-4">
                <label for="CEP">CEP:</label>
                <input class="form-control" type="text" name="CEP" id="CEP"
                       value="{{ $funcionario->pessoa->endereco->CEP }}">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-8">
                <label for="rua">rua:</label>
                <input class="form-control" type="text" name="rua" id="rua"
                       value="{{ $funcionario->pessoa->endereco->rua }}">
            </div>
            <div class="col-md-4">
                <label for="numero">numero:</label>
                <input class="form-control" type="text" name="numero" id="numero"
                       value="{{ $funcionario->pessoa->endereco->numero }}">
            </div>
        </div>
        <div>
            <input class="btn btn-primary" type="submit" value="cadastrar">
        </div>
    </form>
@endsection
