<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\Funcionario;
use App\Models\Gerente;
use App\Models\Pessoa;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $this->authorize('viewAny', Funcionario::class);
        $funcionarios = Funcionario::all();
        return view('funcionarios.index', ['funcionarios' => $funcionarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $this->authorize('create', Funcionario::class);
        return view('funcionarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->authorize('create', Funcionario::class);
        $funcionario = new Funcionario();
        $pessoa = new Pessoa();
        $endereco = new Endereco();
        $user = new User();
        $funcionario->fill($request->validate(Funcionario::$rules));
        $pessoa->fill($request->validate(Pessoa::$rules));
        $endereco->fill($request->validate(Endereco::$rules));
        $request->merge(['tipo' => 'funcionario']);
        $user->fill($request->validate(User::$rules));
        $user->password = Hash::make($user->password);
        $user->save();
        $pessoa->user()->associate($user);
        $pessoa->save();
        $funcionario->pessoa()->associate($pessoa);
        $pessoa->endereco()->save($endereco);
        $funcionario->save();
        return redirect()->action([FuncionarioController::class, 'show'], ['funcionario' => $funcionario]);
    }

    /**
     * Display the specified resource.
     *
     * @param Funcionario $funcionario
     * @return View
     */
    public function show(Funcionario $funcionario)
    {
        $this->authorize('view', $funcionario);
        return view('funcionarios.show', ['funcionario' => $funcionario]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Funcionario $funcionario
     * @return View
     */
    public function edit(Funcionario $funcionario)
    {
        $this->authorize('update', $funcionario);
        return view('funcionarios.edit', ['funcionarios' => $funcionario]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Funcionario $funcionario
     * @return RedirectResponse
     */
    public function update(Request $request, Funcionario $funcionario)
    {
        $this->authorize('update', $funcionario);
        $funcionario->fill($request->validate(Funcionario::$rules));
        $funcionario->save();
        $rules = Pessoa::$rules;
        unset($rules['senha']);
        $funcionario->pessoa->fill($request->validate($rules));
        $funcionario->pessoa->save();
        $funcionario->pessoa->endereco->fill($request->validate(Endereco::$rules));
        $funcionario->pessoa->endereco->save();
        $funcionario->pessoa->user->fill($request->validate(User::$rules));
        $funcionario->pessoa->user->save();
        return redirect()->action([FuncionarioController::class, 'show'], ['cliente' => $funcionario->refresh()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Funcionario $funcionario
     * @return RedirectResponse
     */
    public function destroy(Funcionario $funcionario)
    {
        $this->authorize('delete', $funcionario);
        $funcionario->pessoa()->endereco()->delete();
        $funcionario->delete();
        $funcionario->pessoa()->delete();
        return redirect()->action([FuncionarioController::class, 'index']);
    }
}
