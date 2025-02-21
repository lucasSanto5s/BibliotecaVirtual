@extends('layouts.app')

@section('titulo', 'Adicionar Autor')

@section('conteudo')
    <h1>Adicionar Autor</h1>
    <form action="{{ route('autores.store') }}" method="POST" class="form-cadastro">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="biografia" class="form-label">Biografia</label>
            <textarea name="biografia" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="data_nascimento" class="form-label">Data de Nascimento</label>
            <input type="date" name="data_nascimento" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection