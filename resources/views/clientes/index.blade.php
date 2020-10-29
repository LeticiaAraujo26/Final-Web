@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>Email</th>
            <th>Opções</th>
        </tr>
        </thead>
        <tbody>
        @foreach($clientes as $cliente)
            <tr>
                <td>{{ $cliente->pessoa->nome }}</td>
                <td>{{ $cliente->pessoa->CPF }}</td>
                <td>{{ $cliente->pessoa->user->email }}</td>
                <td>
                    <a href="{{route("clientes.edit", [$cliente])}}">editar</a>
                    <a href="{{route("clientes.show", [$cliente])}}">visualizar</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
