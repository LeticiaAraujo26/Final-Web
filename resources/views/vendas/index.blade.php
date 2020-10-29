@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>Cliente</th>
            <th>Data</th>
            <th>Forma de pagamento</th>
            <th>Opção</th>
        </tr>
        </thead>
        <tbody>
        @foreach($vendas as $venda)
            <tr>
                <td>{{ $venda->cliente->pessoa->nome }}</td>
                <td>{{ $venda->created_at }}</td>
                <td>{{ $venda->forma_pagamento }}</td>
                <td>
                    <a href="{{route("vendas.show", [$venda])}}">visualizar</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
