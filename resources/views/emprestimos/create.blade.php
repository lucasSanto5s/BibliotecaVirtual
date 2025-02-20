@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Empréstimo</h1>

    <form action="{{ route('emprestimos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="usuario_id" class="form-label">Usuário</label>
            <select name="usuario_id" class="form-control" required>
                <option value="">Selecione um usuário</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="livro_id" class="form-label">Livro</label>
            <select name="livro_id" class="form-control" required>
                <option value="">Selecione um livro</option>
                @foreach($livros as $livro)
                    <option value="{{ $livro->id }}">{{ $livro->titulo }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="data_emprestimo" class="form-label">Data do Empréstimo</label>
            <input type="date" name="data_emprestimo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="data_devolucao" class="form-label">Data de Devolução</label>
            <input type="date" name="data_devolucao" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
</div>
@endsection
