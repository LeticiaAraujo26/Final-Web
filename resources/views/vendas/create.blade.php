@extends('layouts.app')

@section('content')
<form action="/vendas" method="post">
    @csrf
    <div class="form-row">
        <div class="col">
            <label>forma de pagamento</label>
            <select id="forma_pagamento" name="forma_pagamento" class="form-control">
            <option selected disabled value="">Selecionar Pagamento</option>
                <option value="Dinheiro">Dinheiro</option>
                <option value="Credito">Crédito</option>
                <option value="Debito">Débito</option>
            </select>
        </div>
    </div>
    <input class="btn btn-primary" type="submit" value="efetuar compra">
</form>
@endsection
