<?php

use App\Http\Controllers\ComprarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarrinhoController;
use Illuminate\Support\Facades\Route;

Route::get('/cadastro', function () {
    return view('cadastro');
});

Route::get('index', [App\Http\Controllers\AppController::class, 'index'])->name('index');

//COMPRAR CONTROLLER
Route::get('comprar', [ComprarController::class, 'index'])->name('comprar');
Route::get('/produto/{slug}',[ComprarController::class,'detalheProduto'])->name('produto.detalhe');

//CARRINHO
Route::get('/carrinho',[CarrinhoController::class,'index'])->name('carrinho');
Route::post('/carrinho/store', [CarrinhoController::class, 'addAoCarrinho'])->name('carrinho.store');
Route::put('/carrinho/update', [CarrinhoController::class, 'update'])->name('carrinho.update');
Route::delete('/carrinho/delete', [CarrinhoController::class, 'delete'])->name('carrinho.delete');
Route::delete('/carrinho/limpar', [CarrinhoController::class, 'limpar'])->name('carrinho.limpar');

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/conta', [UserController::class, 'index'])->name('users.index');
});

Route::middleware('auth', 'auth.admin')->group(function(){
    Route::get('/admin', [UserController::class, 'index'])->name('admin.index');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
