<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\Produto;
use Gloudemans\Shoppingcart\Facades\Cart; 
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carrinhoItems = Cart::instance('carrinho')->content();
        return view('carrinho', compact('carrinhoItems'));
    }

    public function addAoCarrinho(Request $request)
    {
        $produto = Produto::find($request->id);
        $preco = $produto->preco_venda ? $produto->preco_venda : $produto->preco_regular;
        Cart::instance('carrinho')->add($produto->id,$produto->nome,$request->quantidade, $preco)->associate('App\Models\Produto');
        return redirect()->back()->with('mensagem','Sucesso ! O item foi adicionado com sucesso!');
    }  

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function limpar()
    {
        Cart::instance('carrinho')->destroy();
        return redirect()->route('carrinho');
    }

    public function update(Request $request)
    {
        Cart::instance('carrinho')->update($request->rowId,$request->quantidade);
        return redirect()->route('carrinho');
    }

    public function delete(Request $request)
    {
        $rowId = $request->rowId;
        Cart::instance('carrinho')->remove($rowId);
        return redirect()->route('carrinho');
    }
}
