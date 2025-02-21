<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor; // Importando o model Autor

class AutorController extends Controller
{
    /**
     * Exibe uma lista de autores.
     */
    public function index()
    {
        $autores = Autor::all(); // Recupera todos os autores
        return view('autores.index', compact('autores'));
    }

    /**
     * Exibe o formulário para criar um novo autor.
     */
    public function create()
    {
        return view('autores.create');
    }

    /**
     * Armazena um novo autor no banco de dados.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'biografia' => 'nullable|string',
            'data_nascimento' => 'nullable|date',
        ]);

        Autor::create($request->all());

        return redirect()->route('autores.index')->with('success', 'Autor criado com sucesso!');
    }

    /**
     * Exibe os detalhes de um autor específico.
     */
    public function show($id)
    {
        $autor = Autor::findOrFail($id);
        return view('autores.show', compact('autor'));
    }

    /**
     * Exibe o formulário para editar um autor existente.
     */
    public function edit($id)
    {
        $autor = Autor::findOrFail($id);
        return view('autores.edit', compact('autor'));
    }

    /**
     * Atualiza um autor no banco de dados.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'biografia' => 'nullable|string',
            'data_nascimento' => 'nullable|date',
        ]);

        $autor = Autor::findOrFail($id);
        $autor->update($request->all());

        return redirect()->route('autores.index')->with('success', 'Autor atualizado com sucesso!');
    }

    /**
     * Remove um autor do banco de dados.
     */
    public function destroy($id)
    {
        $autor = Autor::findOrFail($id);
        $autor->delete();

        return redirect()->route('autores.index')->with('success', 'Autor excluído com sucesso!');
    }
}