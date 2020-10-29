<?php

namespace App\Http\Controllers;

use App\Models\Gerente;
use App\Models\Pessoa;
use App\Models\Endereco;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\View\View;

class GerenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $this->authorize('viewAny', Gerente::class);
        $gerentes = Gerente::all();
        return view('gerentes.index', ['gerentes' => $gerentes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $this->authorize('create', Gerente::class);
        return view('gerentes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->authorize('create', Gerente::class);
        $gerente = new Gerente();
        $pessoa = new Pessoa();
        $endereco = new Endereco();
        $user = new User();
        $gerente->fill($request->validate(Gerente::$rules));
        $pessoa->fill($request->validate(Pessoa::$rules));
        $endereco->fill($request->validate(Endereco::$rules));
        $request->merge(['tipo' => 'gerente']);
        $user->fill($request->validate(User::$rules));
        $user->password = Hash::make($user->password);
        $user->save();
        $pessoa->user()->associate($user);
        $pessoa->save();
        $gerente->pessoa()->associate($pessoa);
        $pessoa->endereco()->save($endereco);
        $gerente->save();
        return redirect()->action([GerenteController::class, 'show'], ['gerente' => $gerente]);
    }

    /**
     * Display the specified resource.
     *
     * @param Gerente $gerente
     * @return View
     */
    public function show(Gerente $gerente)
    {
        $this->authorize('view', $gerente);
        return view('gerentes.show', ['gerente' => $gerente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Gerente $gerente
     * @return View
     */
    public function edit(Gerente $gerente)
    {
        $this->authorize('update', $gerente);
        return view('gerentes.edit', ['gerente' => $gerente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Gerente $gerente
     * @return RedirectResponse
     */
    public function update(Request $request, Gerente $gerente)
    {
        $this->authorize('update', $gerente);
        $gerente->fill($request->validate(Gerente::$rules));
        $gerente->save();
        $rules = Pessoa::$rules;
        unset($rules['senha']);
        $gerente->pessoa->fill($request->validate($rules));
        $gerente->pessoa->save();
        $gerente->pessoa->endereco->fill($request->validate(Endereco::$rules));
        $gerente->pessoa->endereco->save();
        $gerente->pessoa->user->fill($request->validate(User::$rules));
        $gerente->pessoa->user->save();
        return redirect()->action([GerenteController::class, 'show'], ['gerente' => $gerente->refresh()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Gerente $gerente
     * @return RedirectResponse
     */
    public function destroy(Gerente $gerente)
    {
        $this->authorize('delete', $gerente);
        $gerente->pessoa()->endereco()->delete();
        $gerente->delete();
        $gerente->pessoa()->delete();
        return redirect()->action([GerenteController::class, 'index']);
    }
}
