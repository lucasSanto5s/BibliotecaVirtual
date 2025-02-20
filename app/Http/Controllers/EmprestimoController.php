<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emprestimo;
use App\Models\User;
use App\Models\Livro;

class EmprestimoController extends Controller
{
    public function index()
    {
        $emprestimos = Emprestimo::with('usuario', 'livro')->get();
        return view('emprestimos.index', compact('emprestimos'));
    }

    public function create()
    {
        $usuarios = User::all();
        $livros = Livro::where('status', 'Disponível')->get();
        return view('emprestimos.create', compact('usuarios', 'livros'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|exists:users,id',
            'livro_id' => 'required|exists:livros,id',
            'data_emprestimo' => 'required|date',
            'data_devolucao' => 'required|date|after:data_emprestimo'
        ]);

        Emprestimo::create($request->all());
        return redirect()->route('emprestimos.index')->with('success', 'Empréstimo registrado com sucesso!');
    }

    public function destroy(Emprestimo $emprestimo)
    {
        $emprestimo->delete();
        return redirect()->route('emprestimos.index')->with('success', 'Empréstimo removido!');
    }
}
