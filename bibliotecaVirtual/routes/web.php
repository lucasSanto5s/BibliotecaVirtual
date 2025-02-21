<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\EmprestimoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LivroController;


Route::get('/', function () {
    return view('welcome');
});


// Rotas para o UsuarioController
Route::resource('usuarios', UsuarioController::class);



// Rotas para o AutorController
Route::resource('autores', AutorController::class);



// Rotas para o CategoriaController
Route::resource('categorias', CategoriaController::class);


// Rotas para o EmprestimoController
Route::resource('emprestimos', EmprestimoController::class);


// Rotas para o LivroController
Route::resource('livros', LivroController::class);