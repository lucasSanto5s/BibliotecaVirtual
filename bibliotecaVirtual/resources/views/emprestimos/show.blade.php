@extends('layouts.app')

@section('titulo', 'Detalhes do Empréstimo')

@section('conteudo')
    <h1>Detalhes do Empréstimo</h1>
    <div class="card form-cadastro">
        <div class="card-body">
            <h5 class="card-title">Livro: {{ $emprestimo->livro->titulo }}</h5>
            <p class="card-text"><strong>Usuário:</strong> {{ $emprestimo->usuario->name }}</p>
            <p class="card-text"><strong>Data do Empréstimo:</strong> {{ $emprestimo->data_emprestimo }}</p>
            <p class="card-text"><strong>Data de Devolução Prevista:</strong> {{ $emprestimo->data_devolucao_prevista }}</p>
            <p class="card-text"><strong>Data de Devolução Real:</strong> {{ $emprestimo->data_devolucao_real ?? 'Não devolvido' }}</p>
            <p class="card-text"><strong>Status:</strong> {{ $emprestimo->devolvido ? 'Devolvido' : 'Pendente' }}</p>
            <a href="{{ route('emprestimos.edit', $emprestimo->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('emprestimos.destroy', $emprestimo->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
        </div>
    </div>
@endsection