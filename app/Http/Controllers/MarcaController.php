<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Http\Requests\StoreMarcaRequest;
use App\Http\Requests\UpdateMarcaRequest;

class MarcaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.admin');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marcas = Marca::all();
        return view('admin/marca', compact('marcas'));
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
    public function store(StoreMarcaRequest $request)
    {
        Marca::create($request->validated());
        return redirect()->route('marcas.index')->with('success', 'Marca criada com sucesso.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Marca $marca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Marca $marca)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMarcaRequest $request, Marca $marca)
    {
        $this->authorize('update', $marca);

        $marca->update($request->validated());
        return redirect()->route('marcas.index')->with('success', 'Marca atualizada com sucesso.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marca $marca)
    {
        $this->authorize('delete', $marca);

        $marca->delete();
        return redirect()->route('marcas.index')->with('success', 'Marca excluída com sucesso.');
    }
}
