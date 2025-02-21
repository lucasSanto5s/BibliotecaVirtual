@extends('layouts.app')

@section('titulo', 'Editar Categoria')

@section('conteudo')
    <h1>Editar Categoria</h1>
    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST" class="form-cadastro">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ $categoria->nome }}" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" class="form-control">{{ $categoria->descricao }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
@endsection