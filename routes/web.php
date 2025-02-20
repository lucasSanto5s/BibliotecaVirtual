<?php

use App\Http\Controllers\EmprestimoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\LivroController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});



Route::resource('livros', LivroController::class);

Route::resource('autores', AutorController::class);

Route::resource('categorias', CategoriaController::class);

Route::resource('usuarios', UsuarioController::class);


Route::resource('emprestimos', EmprestimoController::class);



