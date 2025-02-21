@extends('layouts.app')

@section('titulo', 'Detalhes da Categoria')

@section('conteudo')
    <h1>Detalhes da Categoria</h1>
    <div class="card form-cadastro">
        <div class="card-body">
            <h5 class="card-title">{{ $categoria->nome }}</h5>
            <p class="card-text"><strong>Descrição:</strong> {{ $categoria->descricao }}</p>
            <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
        </div>
    </div>
@endsection