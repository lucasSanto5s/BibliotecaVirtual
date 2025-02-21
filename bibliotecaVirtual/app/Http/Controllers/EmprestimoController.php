<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emprestimo; // Importando o model Emprestimo
use App\Models\Livro; // Importando o model Livro
use App\Models\User; // Importando o model User

class EmprestimoController extends Controller
{
    /**
     * Exibe uma lista de empréstimos.
     */
    public function index()
    {
        $emprestimos = Emprestimo::with(['livro', 'usuario'])->get(); // Recupera todos os empréstimos com relacionamentos
        return view('emprestimos.index', compact('emprestimos'));
    }

    /**
     * Exibe o formulário para criar um novo empréstimo.
     */
    public function create()
    {
        $livros = Livro::all(); // Recupera todos os livros
        $usuarios = User::all(); // Recupera todos os usuários
        return view('emprestimos.create', compact('livros', 'usuarios'));
    }

    /**
     * Armazena um novo empréstimo no banco de dados.
     */
    public function store(Request $request)
    {
        $request->validate([
            'livro_id' => 'required|exists:livros,id',
            'usuario_id' => 'required|exists:users,id',
            'data_emprestimo' => 'required|date',
            'data_devolucao_prevista' => 'required|date',
        ]);

        Emprestimo::create($request->all());

        return redirect()->route('emprestimos.index')->with('success', 'Empréstimo registrado com sucesso!');
    }

    /**
     * Exibe os detalhes de um empréstimo específico.
     */
    public function show($id)
    {
        $emprestimo = Emprestimo::with(['livro', 'usuario'])->findOrFail($id);
        return view('emprestimos.show', compact('emprestimo'));
    }

    /**
     * Exibe o formulário para editar um empréstimo existente.
     */
    public function edit($id)
    {
        $emprestimo = Emprestimo::findOrFail($id);
        $livros = Livro::all(); // Recupera todos os livros
        $usuarios = User::all(); // Recupera todos os usuários
        return view('emprestimos.edit', compact('emprestimo', 'livros', 'usuarios'));
    }

    /**
     * Atualiza um empréstimo no banco de dados.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'livro_id' => 'required|exists:livros,id',
            'usuario_id' => 'required|exists:users,id',
            'data_emprestimo' => 'required|date',
            'data_devolucao_prevista' => 'required|date',
            'data_devolucao_real' => 'nullable|date',
            'devolvido' => 'nullable|boolean',
        ]);

        $emprestimo = Emprestimo::findOrFail($id);
        $emprestimo->update($request->all());

        return redirect()->route('emprestimos.index')->with('success', 'Empréstimo atualizado com sucesso!');
    }

    /**
     * Remove um empréstimo do banco de dados.
     */
    public function destroy($id)
    {
        $emprestimo = Emprestimo::findOrFail($id);
        $emprestimo->delete();

        return redirect()->route('emprestimos.index')->with('success', 'Empréstimo excluído com sucesso!');
    }
}