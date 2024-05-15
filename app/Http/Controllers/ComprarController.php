<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ComprarController extends Controller
{
    public function index()
    {
        $produtos = Produto::orderBy('created_at','DESC')->paginate(12);
        return view('comprar',['produtos'=>$produtos]);
    }

    public function detalheProduto($slug)
    {
        $produto = Produto::where('slug',$slug)->first();
        $rprodutos = Produto::where('slug','!=', $slug)->inRandomOrder('id')->get()->take(8);   
        return view('produto',['produto'=>$produto,'rprodutos'=>$rprodutos]);
    }

}
