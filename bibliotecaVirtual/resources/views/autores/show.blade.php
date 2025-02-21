@extends('layouts.app')

@section('titulo', 'Detalhes do Autor')

@section('conteudo')
    <h1>Detalhes do Autor</h1>
    <div class="card form-cadastro">
        <div class="card-body">
            <h5 class="card-title">{{ $autor->nome }}</h5>
            <p class="card-text"><strong>Biografia:</strong> {{ $autor->biografia }}</p>
            <p class="card-text"><strong>Data de Nascimento:</strong> {{ $autor->data_nascimento }}</p>
            <a href="{{ route('autores.edit', $autor->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('autores.destroy', $autor->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
        </div>
    </div>
@endsection