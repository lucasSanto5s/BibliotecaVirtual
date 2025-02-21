@extends('layouts.app')

@section('titulo', 'Lista de Empréstimos')

@section('conteudo')
    <h1>Lista de Empréstimos</h1>
    <a href="{{ route('emprestimos.create') }}" class="btn btn-primary">Registrar Empréstimo</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Livro</th>
                <th>Usuário</th>
                <th>Data do Empréstimo</th>
                <th>Data de Devolução Prevista</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($emprestimos as $emprestimo)
                <tr>
                    <td>{{ $emprestimo->id }}</td>
                    <td>{{ $emprestimo->livro->titulo }}</td>
                    <td>{{ $emprestimo->usuario->name }}</td>
                    <td>{{ $emprestimo->data_emprestimo }}</td>
                    <td>{{ $emprestimo->data_devolucao_prevista }}</td>
                    <td>{{ $emprestimo->devolvido ? 'Devolvido' : 'Pendente' }}</td>
                    <td>
                        <a href="{{ route('emprestimos.show', $emprestimo->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('emprestimos.edit', $emprestimo->id) }}" class="btn btn-warning">Editar</a>
                       