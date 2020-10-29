@extends('layouts.app')

@section('content')
    <div class="form-row">
        <div class="col-md-12">
            <label for="nome">nome:</label>
            <input class="form-control" type="text" name="nome" id="nome" value="{{ $produto->nome }}" readonly>
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-4">
            <label for="marca">marca:</label>
            <input class="form-control" type="text" name="marca" id="marca" value="{{ $produto->marca }}" readonly>
        </div>
        <div class="col-md-4">
            <label for="quantidade_em_estoque">quantidade em estoque:</label>
            <input class="form-control" type="number" name="quantidade_em_estoque" id="quantidade_em_estoque"
                   value="{{ $produto->quantidade_em_estoque }}" readonly>
        </div>
        <div class="col-md-4">
            <label for="peso">peso:</label>
            <input class="form-control" type="number" name="peso" id="peso" value="{{ $produto->peso }}" readonly>
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-6">
            <label for="preco">preço:</label>
            <input class="form-control" type="number" name="preco" id="preco" value="{{ $produto->preco }}"
                   readonly>
        </div>
        <div class="col-md-6">
            <label for="preco_revenda">preço de revenda:</label>
            <input class="form-control" type="number" name="preco_revenda" id="preco_revenda"
                   value="{{ $produto->preco_revenda }}" readonly>
        </div>
    </div>
    <form class="form-group" action="/carrinho" method="post">
        @csrf
        <div class="form-row">
            <input type="hidden" name="produto_id" value="{{ $produto->id }}"/>
            <div class="col-md-2">
                <label for="quantidade">quantidade:</label>
                <input class="form-control" type="number" name="quantidade" min='1' max='{{$produto->quantidade_em_estoque}}' value='1'/>
            </div>
        </div>
        <input class="btn btn-primary" type="submit" value="adicionar">

    </form>
@endsection
