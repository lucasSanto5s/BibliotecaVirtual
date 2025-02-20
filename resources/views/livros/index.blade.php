@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Livros</h1>
    <a href="{{ route('livros.create') }}" class="btn btn-primary">Novo Livro</a>
    
    @if(session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Categoria</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($livros as $livro)
            <tr>
                <td>{{ $livro->titulo }}</td>
                <td>{{ $livro->autor->nome }}</td>
                <td>{{ $livro->categoria->nome }}</td>
                <td>{{ $livro->status }}</td>
                <td>
                    <a href="{{ route('livros.edit', $livro->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('livros.destroy', $livro->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
