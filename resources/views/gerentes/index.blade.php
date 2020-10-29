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
        @foreach($gerentes as $gerente)
            <tr>
                <td>{{ $gerente->pessoa->nome }}</td>
                <td>{{ $gerente->pessoa->CPF }}</td>
                <td>{{ $gerente->pessoa->user->email }}</td>
                <td>
                    <a href="{{route("gerentes.edit", [$gerente])}}">editar</a>
                    <a href="{{route("gerentes.show", [$gerente])}}">visualizar</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
