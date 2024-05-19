<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Http\Requests\StoreProdutoRequest;
use App\Http\Requests\UpdateProdutoRequest;

class ProdutoController extends Controller
{
    protected $fillable = ['nome', 'preco'];
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::all();
        return view('/admin/cadastroProdutos', ['produto' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProdutoRequest $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'preco_regular' => 'required|numeric',
            'preco_venda' => 'required|numeric',
            'quantidade' => 'required|integer',
            'descricao' => 'required|string',
            'categoria_id' => 'required|integer',
            'marca_id' => 'required|integer',
        ]);

        $produto = new Produto($request->all());
        $produto->save();

        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdutoRequest $request, Produto $produto)
    {
        $request->validate([
            'nome' => 'required|string',
            'preco_regular' => 'required|numeric',
            'preco_venda' => 'required|numeric',
            'quantidade' => 'required|integer',
            'descricao' => 'required|string',
            'categoria_id' => 'required|integer',
            'marca_id' => 'required|integer',
        ]);

        $produto->update($request->all());

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->route('produtos.index')->with('success', 'Produto deletado com sucesso.');
    }
}
