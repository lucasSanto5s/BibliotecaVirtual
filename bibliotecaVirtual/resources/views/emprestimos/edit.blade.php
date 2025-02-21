@extends('layouts.app')

@section('titulo', 'Editar Empréstimo')

@section('conteudo')
    <h1>Editar Empréstimo</h1>
    <form action="{{ route('emprestimos.update', $emprestimo->id) }}" method="POST" class="form-cadastro">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="livro_id" class="form-label">Livro</label>
            <select name="livro_id" class="form-control" required>
                @foreach ($livros as $livro)
                    <option value="{{ $livro->id }}" {{ $emprestimo->livro_id == $livro->id ? 'selected' : '' }}>{{ $livro->titulo }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="usuario_id" class="form-label">Usuário</label>
            <select name="usuario_id" class="form-control" required>
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ $emprestimo->usuario_id == $usuario->id ? 'selected' : '' }}>{{ $usuario->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="data_emprestimo" class="form-label">Data do Empréstimo</label>
            <input type="date" name="data_emprestimo" class="form-control" value="{{ $emprestimo->data_emprestimo }}" required>
        </div>
        <div class="mb-3">
            <label for="data_devolucao_prevista" class="form-label">Data de Devolução Prevista</label>
            <input type="date" name="data_devolucao_prevista" class="form-control" value="{{ $emprestimo->data_devolucao_prevista }}" required>
        </div>
        <div class="mb-3">
            <label for="data_devolucao_real" class="form-label">Data de Devolução Real</label>
            <input type="date" name="data_devolucao_real" class="form-control" value="{{ $emprestimo->data_devolucao_real }}">
        </div>
        <div class="mb-3">
            <label for="devolvido" class="form-label">Status</label>
            <select name="devolvido" class="form-control" required>
                <option value="0" {{ $emprestimo->devolvido == 0 ? 'selected' : '' }}>Pendente</option>
                <option value="1" {{ $emprestimo->devolvido == 1 ? 'selected' : '' }}>Devolvido</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
@endsection