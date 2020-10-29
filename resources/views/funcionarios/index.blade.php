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
        @foreach($funcionarios as $funcionario)
            <tr>
                <td>{{ $funcionario->pessoa->nome }}</td>
                <td>{{ $funcionario->pessoa->CPF }}</td>
                <td>{{ $funcionario->pessoa->user->email }}</td>
                <td>
                    <a href="{{route("funcionarios.edit", [$funcionario])}}">editar</a>
                    <a href="{{route("funcionarios.show", [$funcionario])}}">visualizar</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
