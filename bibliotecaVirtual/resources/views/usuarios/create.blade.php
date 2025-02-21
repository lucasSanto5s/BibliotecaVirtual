@extends('layouts.app')

@section('titulo', 'Adicionar Usuário')

@section('conteudo')
    <h1>Adicionar Usuário</h1>
    <form action="{{ route('usuarios.store') }}" method="POST" class="form-cadastro">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo de Usuário</label>
            <select name="tipo" class="form-control" required>
                <option value="admin">Admin</option>
                <option value="funcionario">Funcionário</option>
                <option value="usuario">Usuário</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection