@extends('layouts.app')

@section('titulo', 'Lista de Categorias')

@section('conteudo')
    <h1>Lista de Categorias</h1>
    <a href="{{ route('categorias.create') }}" class="btn btn-primary">Adicionar Categoria</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->nome }}</td>
                    <td>{{ Str::limit($categoria->descricao, 50) }}</td>
                    <td>
                        <a href="{{ route('categorias.show', $categoria->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display:inline;">
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