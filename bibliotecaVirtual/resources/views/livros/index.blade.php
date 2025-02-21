@extends('layouts.app')

@section('titulo', 'Lista de Livros')

@section('conteudo')
    <h1>Lista de Livros</h1>
    <a href="{{ route('livros.create') }}" class="btn btn-primary">Adicionar Livro</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Categoria</th>
                <th>ISBN</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($livros as $livro)
                <tr>
                    <td>{{ $livro->id }}</td>
                    <td>{{ $livro->titulo }}</td>
                    <td>{{ $livro->autor->nome }}</td>
                    <td>{{ $livro->categoria->nome }}</td>
                    <td>{{ $livro->isbn }}</td>
                    <td>
                        <a href="{{ route('livros.show', $livro->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('livros.edit', $livro->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('livros.destroy', $livro->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection