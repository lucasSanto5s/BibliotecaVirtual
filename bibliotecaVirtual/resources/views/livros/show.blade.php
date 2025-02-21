@extends('layouts.app')

@section('titulo', 'Detalhes do Livro')

@section('conteudo')
    <h1>Detalhes do Livro</h1>
    <div class="card form-cadastro">
        <div class="card-body">
            <h5 class="card-title">{{ $livro->titulo }}</h5>
            <p class="card-text"><strong>ISBN:</strong> {{ $livro->isbn }}</p>
            <p class="card-text"><strong>Autor:</strong> {{ $livro->autor->nome }}</p>
            <p class="card-text"><strong>Categoria:</strong> {{ $livro->categoria->nome }}</p>
            <p class="card-text"><strong>Ano de Publicação:</strong> {{ $livro->ano_publicacao }}</p>
            <p class="card-text"><strong>Descrição:</strong> {{ $livro->descricao }}</p>
            <a href="{{ route('livros.edit', $livro->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('livros.destroy', $livro->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
        </div>
    </div>
@endsection