<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Endereco;
use App\Models\Pessoa;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $this->authorize('viewAny', Cliente::class);
        $clientes = Cliente::all();
        return view('clientes.index', ['clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $this->authorize('create', Cliente::class);
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->authorize('create', Cliente::class);
        $cliente = new Cliente();
        $pessoa = new Pessoa();
        $endereco = new Endereco();
        $user = new User();
        $cliente->fill($request->validate(Cliente::$rules));
        $pessoa->fill($request->validate(Pessoa::$rules));
        $endereco->fill($request->validate(Endereco::$rules));
        $request->merge(['tipo' => 'cliente']);
        $user->fill($request->validate(User::$rules));
        $user->password = Hash::make($user->password);
        $user->save();
        $pessoa->user()->associate($user);
        $pessoa->save();
        $cliente->pessoa()->associate($pessoa);
        $pessoa->endereco()->save($endereco);
        $cliente->save();
        $request->session()->flash('message', 'Cliente salvo com sucesso');
        return redirect(route('login'));
    }

    /**
     * Display the specified resource.
     *
     * @param Cliente $cliente
     * @return View
     */
    public function show(Cliente $cliente)
    {
        $this->authorize('view', $cliente);
        return view('clientes.show', ['cliente' => $cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Cliente $cliente
     * @return Application|Factory|View
     */
    public function edit(Cliente $cliente)
    {
        $this->authorize('update', $cliente);
        return view('clientes.edit', ['cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Cliente $cliente
     * @return RedirectResponse|View
     */
    public function update(Request $request, Cliente $cliente)
    {
        $this->authorize('update', $cliente);
        $cliente->fill($request->validate(Cliente::$rules));
        $cliente->save();
        $rules = Pessoa::$rules;
        unset($rules['senha']);
        $cliente->pessoa->fill($request->validate($rules));
        $cliente->pessoa->save();
        $cliente->pessoa->endereco->fill($request->validate(Endereco::$rules));
        $cliente->pessoa->endereco->save();
        $cliente->pessoa->user->fill($request->validate(User::$rules));
        $cliente->pessoa->user->save();
        return redirect()->action([ClienteController::class, 'show'], ['cliente' => $cliente->refresh()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Cliente $cliente
     * @return RedirectResponse
     */
    public function destroy(Cliente $cliente)
    {
        $this->authorize('delete', $cliente);
        $cliente->pessoa()->endereco()->delete();
        $cliente->delete();
        $cliente->pessoa()->delete();
        return redirect()->action([ClienteController::class, 'index']);
    }
}
