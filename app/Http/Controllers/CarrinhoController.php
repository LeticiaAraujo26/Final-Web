<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\Array_;

class CarrinhoController extends Controller
{
    public function store(Request $request)
    {
        if ($request->session()->has('itens')) $carrinho = $request->session()->get('itens');
        else $carrinho = array();
        $id = $request->produto_id;
        $produto = Produto::find($id);
        if (array_key_exists($id, $carrinho)) {
            $carrinho[$id]['quantidade'] += $request->quantidade;
            $carrinho[$id]['subtotal'] = $produto->preco * $request->quantidade;
            Validator::make(
                ['quantidade' => $carrinho[$id]['quantidade']],
                ['quantidade' => "required|numeric|max:" . $produto->quantidade_em_estoque,]
            )->validate();
        } else {
            $dados = array();
            $dados['quantidade'] = $request->quantidade;
            $dados['produto'] = $produto;
            $dados['subtotal'] = $produto->preco * $request->quantidade;
            $carrinho[$id] = $dados;
            Validator::make(
                ['quantidade' => $dados['quantidade']],
                ['quantidade' => "required|numeric|max:" . $produto->quantidade_em_estoque,]
            )->validate();
        }
        $request->session()->put('itens', $carrinho);
        $this->calcultar_total($request);
        return view('carrinho');
    }

    public function update(Request $request, $produto_id)
    {
        $carrinho = $request->session()->get('itens');
        $carrinho[$produto_id]['quantidade'] = $request->quantidade;
        $carrinho[$produto_id]['subtotal'] = $request->quantidade * $carrinho[$produto_id]['produto']->preco;
        $request->session()->put('itens', $carrinho);
        $this->calcultar_total($request);
        return view('carrinho');
    }

    public function destroy(Request $request, $produto_id)
    {
        if ($request->session()->has('itens')) {
            $carrinho = $request->session()->get('itens');
        }
        if (array_key_exists($produto_id, $carrinho)) {
            unset($carrinho[$produto_id]);
        }
        $request->session()->put('itens', $carrinho);
        $this->calcultar_total($request);
        return view('carrinho');
    }

    public function index()
    {
        return view('carrinho');
    }

    /**
     * @param Request $request
     */
    public function calcultar_total(Request $request): void
    {
        $itens = $request->session()->get('itens');
        $total = array_sum(array_map(function ($item) {
            return $item['subtotal'];
        }, $itens));
        $request->session()->put('total', $total);
    }
}
