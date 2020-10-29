@extends('layouts.app')

@section('content')

    <form action="{{route('gerentes.update', $gerente)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label>Nome</label>
            <input class="form-control" type="text" placeholder="Nome" name="nome" value="{{ $gerente->pessoa->nome }}">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email"
                   name="email" value="{{ $gerente->pessoa->user->email }}">
        </div>
        <div class="form-row mt-3">
            <div class="col-md-6">
                <label>Telefone</label>
                <input type="number" class="form-control" placeholder="Telefone" name="telefone"
                       value="{{ $gerente->pessoa->telefone }}">
            </div>
        </div>
        <div class="form-row mt-3">
            <div class="col-md-6">
                <label>Rua</label>
                <input type="text" class="form-control" id="rua" name="rua" placeholder="Rua"
                       value="{{ $gerente->pessoa->endereco->rua }}">
            </div>
            <div class="col-md-4">
                <label>Bairro</label>
                <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro"
                       value="{{ $gerente->pessoa->endereco->bairro }}">
            </div>
            <div class="col-md-2">
                <label>Número</label>
                <input type="text" class="form-control" id="numero" name="numero" placeholder="Ex: 20"
                       value="{{ $gerente->pessoa->endereco->numero }}">
            </div>
        </div>
        <div class="form-row mt-3">
            <div class="form-group col-md-6">
                <label>Cidade</label>
                <input type="text" class="form-control" id="cidade" placeholder="Cidade" name="cidade"
                       value="{{ $gerente->pessoa->endereco->cidade }}">
            </div>
            <div class="form-group col-md-2">
                <label>CEP</label>
                <input type="text" class="form-control" name="CEP" id="CEP" placeholder="Ex: 55158-400"
                       value="{{ $gerente->pessoa->endereco->cep }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
