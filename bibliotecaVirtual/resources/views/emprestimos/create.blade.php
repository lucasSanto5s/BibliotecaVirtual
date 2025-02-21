@extends('layouts.app')

@section('titulo', 'Registrar Empréstimo')

@section('conteudo')
    <h1>Registrar Empréstimo</h1>
    <form action="{{ route('emprestimos.store') }}" method="POST" class="form-cadastro">
        @csrf
        <div class="mb-3">
            <label for="livro_id" class="form-label">Livro</label>
            <select name="livro_id" class="form-control" required>
                @foreach ($livros as $livro)
                    <option value="{{ $livro->id }}">{{ $livro->titulo }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="usuario_id" class="form-label">Usuário</label>
            <select name="usuario_id" class="form-control" required>
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="data_emprestimo" class="form-label">Data do Empréstimo</label>
            <input type="date" name="data_emprestimo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="data_devolucao_prevista" class="form-label">Data de Devolução Prevista</label>
            <input type="date" name="data_devolucao_prevista" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection