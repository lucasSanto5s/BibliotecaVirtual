<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro; // Importando o model Livro
use App\Models\Autor; // Importando o model Autor
use App\Models\Categoria; // Importando o model Categoria

class LivroController extends Controller
{
    /**
     * Exibe uma lista de livros.
     */
    public function index()
    {
        $livros = Livro::with(['autor', 'categoria'])->get(); // Recupera todos os livros com relacionamentos
        return view('livros.index', compact('livros'));
    }

    /**
     * Exibe o formulário para criar um novo livro.
     */
    public function create()
    {
        $autores = Autor::all(); // Recupera todos os autores
        $categorias = Categoria::all(); // Recupera todas as categorias
        return view('livros.create', compact('autores', 'categorias'));
    }

    /**
     * Armazena um novo livro no banco de dados.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'isbn' => 'required|string|unique:livros,isbn',
            'autor_id' => 'required|exists:autores,id',
            'categoria_id' => 'required|exists:categorias,id',
            'ano_publicacao' => 'nullable|integer',
            'descricao' => 'nullable|string',
        ]);

        Livro::create($request->all());

        return redirect()->route('livros.index')->with('success', 'Livro criado com sucesso!');
    }

    /**
     * Exibe os detalhes de um livro específico.
     */
    public function show($id)
    {
        $livro = Livro::with(['autor', 'categoria'])->findOrFail($id);
        return view('livros.show', compact('livro'));
    }

    /**
     * Exibe o formulário para editar um livro existente.
     */
    public function edit($id)
    {
        $livro = Livro::findOrFail($id);
        $autores = Autor::all(); // Recupera todos os autores
        $categorias = Categoria::all(); // Recupera todas as categorias
        return view('livros.edit', compact('livro', 'autores', 'categorias'));
    }

    /**
     * Atualiza um livro no banco de dados.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'isbn' => 'required|string|unique:livros,isbn,' . $id,
            'autor_id' => 'required|exists:autores,id',
            'categoria_id' => 'required|exists:categorias,id',
            'ano_publicacao' => 'nullable|integer',
            'descricao' => 'nullable|string',
        ]);

        $livro = Livro::findOrFail($id);
        $livro->update($request->all());

        return redirect()->route('livros.index')->with('success', 'Livro atualizado com sucesso!');
    }

    /**
     * Remove um livro do banco de dados.
     */
    public function destroy($id)
    {
        $livro = Livro::findOrFail($id);
        $livro->delete();

        return redirect()->route('livros.index')->with('success', 'Livro excluído com sucesso!');
    }
}