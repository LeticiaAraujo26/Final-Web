@extends('layouts.app')


@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>Nome do produto</th>
            <th>Marca</th>
            <th>Quantidade</th>
            <th>Forma de pagamento</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($venda->items as $item )
            <tr>
                <td><a href="{{route('produtos.show', $item->produto)}}">{{ $item->produto->nome }}</a></td>
                <td>{{ $item->produto->marca }}</td>
                <td>{{ $item->quantidade }}</td>
                <td>{{ $venda->forma_pagamento }}</td>
            </tr>
        @endforeach
        <tr>
            <td>
                <a href="{{route("vendas.index")}}">voltar</a>
            </td>
        </tr>
        </tbody>
    </table>
@endsection
