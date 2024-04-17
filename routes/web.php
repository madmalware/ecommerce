<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/cadastro', function () {
    return view('cadastro');
});

Route::get('index', [App\Http\Controllers\AppController::class, 'index'])->name('index');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/lojas', function () {
    return view('lojas_all');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){
    Route::get('/conta', [UserController::class, 'index'])->name('users.index');
});

Route::middleware('auth', 'auth.admin')->group(function(){
    Route::get('/admin', [UserController::class, 'index'])->name('admin.index');
});