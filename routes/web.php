<?php

use Illuminate\Support\Facades\Route;



Route::get('/cadastro', function () {
    return view('cadastro');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/lojas', function () {
    return view('lojas_all');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

