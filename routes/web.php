<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ComprarController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/cadastro', function () {
    return view('cadastro');
});

Route::get('index', [App\Http\Controllers\AppController::class, 'index'])->name('index');

//COMPRAR CONTROLLER
Route::get('comprar', [ComprarController::class, 'index'])->name('comprar');
Route::get('/produto/{slug}',[ComprarController::class,'detalheProduto'])->name('produto.detalhe');

Route::get('/lojas', function () {
    return view('lojas_all');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){
    Route::get('/conta', [UserController::class, 'index'])->name('users.index');
});

Route::middleware('auth', 'auth.admin')->group(function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
