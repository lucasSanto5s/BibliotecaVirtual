<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria; // Importando o model Categoria

class CategoriaController extends Controller
{
    /**
     * Exibe uma lista de categorias.
     */
    public function index()
    {
        $categorias = Categoria::all(); // Recupera todas as categorias
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Exibe o formulário para criar uma nova categoria.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Armazena uma nova categoria no banco de dados.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        Categoria::create($request->all());

        return redirect()->route('categorias.index')->with('success', 'Categoria criada com sucesso!');
    }

    /**
     * Exibe os detalhes de uma categoria específica.
     */
    public function show($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categorias.show', compact('categoria'));
    }

    /**
     * Exibe o formulário para editar uma categoria existente.
     */
    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Atualiza uma categoria no banco de dados.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        $categoria = Categoria::findOrFail($id);
        $categoria->update($request->all());

        return redirect()->route('categorias.index')->with('success', 'Categoria atualizada com sucesso!');
    }

    /**
     * Remove uma categoria do banco de dados.
     */
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return redirect()->route('categorias.index')->with('success', 'Categoria excluída com sucesso!');
    }
}