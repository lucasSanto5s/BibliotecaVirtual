@extends('layouts.app')

@section('titulo', 'Lista de Autores')

@section('conteudo')
    <h1>Lista de Autores</h1>
    <a href="{{ route('autores.create') }}" class="btn btn-primary">Adicionar Autor</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Biografia</th>
                <th>Data de Nascimento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($autores as $autor)
                <tr>
                    <td>{{ $autor->id }}</td>
                    <td>{{ $autor->nome }}</td>
                    <td>{{ Str::limit($autor->biografia, 50) }}</td>
                    <td>{{ $autor->data_nascimento }}</td>
                    <td>
                        <a href="{{ route('autores.show', $autor->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('autores.edit', $autor->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('autores.destroy', $autor->id) }}" method="POST" style="display:inline;">
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