@extends('layouts.app')

@section('titulo', 'Editar Livro')

@section('conteudo')
    <h1>Editar Livro</h1>
    <form action="{{ route('livros.update', $livro->id) }}" method="POST" class="form-cadastro">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" class="form-control" value="{{ $livro->titulo }}" required>
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" name="isbn" class="form-control" value="{{ $livro->isbn }}" required>
        </div>
        <div class="mb-3">
            <label for="autor_id" class="form-label">Autor</label>
            <select name="autor_id" class="form-control" required>
                @foreach ($autores as $autor)
                    <option value="{{ $autor->id }}" {{ $livro->autor_id == $autor->id ? 'selected' : '' }}>{{ $autor->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoria</label>
            <select name="categoria_id" class="form-control" required>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $livro->categoria_id == $categoria->id ? 'selected' : '' }}>{{ $categoria->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="ano_publicacao" class="form-label">Ano de Publicação</label>
            <input type="number" name="ano_publicacao" class="form-control" value="{{ $livro->ano_publicacao }}">
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" class="form-control">{{ $livro->descricao }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
@endsection