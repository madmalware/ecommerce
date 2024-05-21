<?php

use App\Http\Controllers\ComprarController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::get('/cadastro', function () {
    return view('cadastro');
});

Route::get('index', [App\Http\Controllers\AppController::class, 'index'])->name('index');

//COMPRAR CONTROLLER
Route::get('/comprar', [ComprarController::class, 'index'])->name('comprar');
Route::get('/produto/{slug}',[ComprarController::class,'detalheProduto'])->name('produto.detalhe');

//CARRINHO
Route::get('/carrinho',[CarrinhoController::class,'index'])->name('carrinho');
Route::post('/carrinho/store', [CarrinhoController::class, 'addAoCarrinho'])->name('carrinho.store');
Route::put('/carrinho/update', [CarrinhoController::class, 'update'])->name('carrinho.update');
Route::delete('/carrinho/delete', [CarrinhoController::class, 'delete'])->name('carrinho.delete');
Route::delete('/carrinho/limpar', [CarrinhoController::class, 'limpar'])->name('carrinho.limpar');

//CATEGORIA CADASTRO
Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria');

//PRODUTOS CRUD
Route::get('/cadastro/produto', [ProdutoController::class, 'index'])->name('produto');


Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/conta', [UserController::class, 'index'])->name('users.index');
});

Route::middleware('auth', 'auth.admin')->group(function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    // MARCA
    Route::get('/marcas',[MarcaController::class,'index'])->name('marcas.index');
    Route::post('/marcas', [MarcaController::class, 'store'])->name('marcas.store');
    Route::put('/marcas', [MarcaController::class, 'update'])->name('marcas.update');
    Route::delete('/marcas', [MarcaController::class, 'destroy'])->name('marcas.destroy');
});

Route::get('', [App\Http\Controllers\AppController::class, 'index'])->name('home');
