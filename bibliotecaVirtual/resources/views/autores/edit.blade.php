@extends('layouts.app')

@section('titulo', 'Editar Autor')

@section('conteudo')
    <h1>Editar Autor</h1>
    <form action="{{ route('autores.update', $autor->id) }}" method="POST" class="form-cadastro">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ $autor->nome }}" required>
        </div>
        <div class="mb-3">
            <label for="biografia" class="form-label">Biografia</label>
            <textarea name="biografia" class="form-control">{{ $autor->biografia }}</textarea>
        </div>
        <div class="mb-3">
            <label for="data_nascimento" class="form-label">Data de Nascimento</label>
            <input type="date" name="data_nascimento" class="form-control" value="{{ $autor->data_nascimento }}">
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
@endsection