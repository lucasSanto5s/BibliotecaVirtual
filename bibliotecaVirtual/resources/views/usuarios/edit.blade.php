@extends('layouts.app')

@section('titulo', 'Editar Usuário')

@section('conteudo')
    <h1>Editar Usuário</h1>
    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST" class="form-cadastro">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" class="form-control" value="{{ $usuario->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $usuario->email }}" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Nova Senha (deixe em branco para manter a atual)</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo de Usuário</label>
            <select name="tipo" class="form-control" required>
                <option value="admin" {{ $usuario->tipo == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="funcionario" {{ $usuario->tipo == 'funcionario' ? 'selected' : '' }}>Funcionário</option>
                <option value="usuario" {{ $usuario->tipo == 'usuario' ? 'selected' : '' }}>Usuário</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
@endsection