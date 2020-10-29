@extends('layouts.app')

@section('content')

<div class="container mx-5">
    <form action="{{route('produtos.update', $produto)}}" method="POST">
        @method('PUT')
        @csrf 
        <div class="form-row">
            <div class="col-md-8">
                <label>Nome</label>
                <input type="text" class="form-control" name="nome" placeholder="Nome" value="{{ $produto->nome }}">
            </div>
        </div>
        
        <div class="form-row">
            <div class="col-md-4">
                <label>Marca</label>
                <input type="text" class="form-control" name="marca" placeholder="Marca" value="{{ $produto->marca }}">
            </div>
            <div class="col-md-2">
                <label>Quantidade em estoque</label>
                <input type="number" class="form-control" name="quantidade_em_estoque" placeholder="Quantidade em estoque" value="{{ $produto->quantidade_em_estoque }}">
            </div>
            <div class="col-md-2">
                <label>Peso</label>
                <input type="number" class="form-control" name="peso" placeholder="Peso" value="{{ $produto->peso }}">
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-4">
                <label>Preço</label>
                <input type="number" class="form-control" name="preco" placeholder="Preco" value="{{ $produto->preco }}">
            </div>
            <div class="col-md-4">
                <label>Preço de revenda</label>
                <input type="number" class="form-control" name="preco_revenda" placeholder="Preco revenda" value="{{ $produto->preco_revenda }}">
            </div>
        </div>

        <input class="btn btn-primary my-5" type="submit" value="cadastrar">    
    </form>
</div>
@endsection
