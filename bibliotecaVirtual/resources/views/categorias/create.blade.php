@extends('layouts.app')

@section('titulo', 'Adicionar Categoria')

@section('conteudo')
    <h1>Adicionar Categoria</h1>
    <form action="{{ route('categorias.store') }}" method="POST" class="form-cadastro">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection