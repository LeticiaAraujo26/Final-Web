<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $this->authorize('viewAny', Produto::class);
        $produtos = Produto::all();
        return view('produtos.index', ['produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $this->authorize('create', Produto::class);
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->authorize('create', Produto::class);
        $produto = new Produto();
        $produto->fill($request->validate(Produto::$rules));
        $produto->save();
        return redirect()->action([ProdutoController::class, 'show'], ['produto' => $produto]);
    }

    /**
     * Display the specified resource.
     *
     * @param Produto $produto
     * @return View
     */
    public function show(Produto $produto)
    {
        $this->authorize('view', $produto);
        return view('produtos.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Produto $produto
     * @return View
     */
    public function edit(Produto $produto)
    {
        $this->authorize('update', $produto);
        return view('produtos.edit', ['produto' => $produto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Produto $produto
     * @return Response
     */
    public function update(Request $request, Produto $produto)
    {
        $this->authorize('update', $produto);
        $produto->fill($request->validate(Produto::$rules));
        $produto->save();
        return redirect()->action([ProdutoController::class, 'show'], ['produto' => $produto->refresh()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Produto $produto
     * @return Response
     */
    public function destroy(Produto $produto)
    {
        $this->authorize('delete', $produto);
        $produto->delete();
        return redirect()->action([ProdutoController::class, 'index']);
    }
}
