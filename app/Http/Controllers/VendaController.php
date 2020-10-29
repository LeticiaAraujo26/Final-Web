<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use App\Models\Cliente;
use App\Models\Item;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class VendaController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return Application|Factory|View|Response
    */
   public function index()
   {
       $this->authorize('viewAny', Venda::class);
       $vendas = Venda::all();
       return view('vendas.index', ['vendas' => $vendas]);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return Application|Factory|View|Response
    */
   public function create()
   {
       $this->authorize('create', Venda::class);
       $clientes = Cliente::all();
       return view('vendas.create', ['clientes' => $clientes]);
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param Request $request
    * @return RedirectResponse
    * @throws \Illuminate\Auth\Access\AuthorizationException
    */
   public function store(Request $request)
   {
       $this->authorize('create', Venda::class);
       $venda = new Venda();
       $venda->fill($request->validate(Venda::$rules));
       $cliente = $request->user()->pessoa->cliente;
       $venda->cliente()->associate($cliente);
       $venda->save();
       Validator::make(
           ['hi' => $request->session()->get('itens')],
           ['hi' => 'required'],
           ['hi.*' => 'O carrinho não pode estar vazio']
       )->validate();
       foreach ($request->session()->get('itens') as $carrinho )
       {
           $produto = $carrinho['produto'];
           $item = new Item();
           $item->quantidade = $carrinho['quantidade'];
           $item->produto()->associate($produto);
           Validator::make(
               $item->toArray(),
               ['quantidade' => "required|numeric|min:1|max:" . $produto->quantidade_em_estoque,]
           )->validate();
           $produto->remover_de_estoque($item->quantidade);
           $item->preco = $item->quantidade * $produto->preço;
           $venda->items()->save($item);
       }
       $request->session()->put('itens', []);
       $request->session()->put('total', 0);
       return redirect()->action([VendaController::class, 'show'], ['venda' => $venda]);
   }

   /**
    * Display the specified resource.
    *
    * @param Venda $venda
    * @return Application|Factory|View|Response
    */
   public function show(Venda $venda)
   {
       $this->authorize('view', $venda);
       return view('vendas.show', ['venda' => $venda]);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param Venda $venda
    * @return RedirectResponse
    */
   public function destroy(Venda $venda)
   {
       $this->authorize('delete', $venda);
       $venda->venda()->delete();
       $venda->delete();
       return redirect()->action([VendaController::class, 'index']);
   }
}
