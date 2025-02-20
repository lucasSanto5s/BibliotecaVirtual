<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;
use App\Models\Autor;
use App\Models\Categoria;

class LivroController extends Controller
{
    public function index()
    {
        $livros = Livro::with(['autor', 'categoria'])->get();
        return view('livros.index', compact('livros'));
    }

    public function create()
    {
        $autores = Autor::all();
        $categorias = Categoria::all();
        return view('livros.create', compact('autores', 'categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor_id' => 'required|exists:autores,id',
            'categoria_id' => 'required|exists:categorias,id',
            'status' => 'required|in:disponível,emprestado'
        ]);

        Livro::create($request->all());
        return redirect()->route('livros.index')->with('success', 'Livro cadastrado com sucesso!');
    }

    public function edit(Livro $livro)
    {
        $autores = Autor::all();
        $categorias = Categoria::all();
        return view('livros.edit', compact('livro', 'autores', 'categorias'));
    }

    public function update(Request $request, Livro $livro)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor_id' => 'required|exists:autores,id',
            'categoria_id' => 'required|exists:categorias,id',
            'status' => 'required|in:disponível,emprestado'
        ]);

        $livro->update($request->all());
        return redirect()->route('livros.index')->with('success', 'Livro atualizado com sucesso!');
    }

    public function destroy(Livro $livro)
    {
        $livro->delete();
        return redirect()->route('livros.index')->with('success', 'Livro excluído com sucesso!');
    }
}
