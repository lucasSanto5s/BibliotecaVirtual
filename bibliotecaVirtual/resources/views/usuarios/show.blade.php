@extends('layouts.app')

@section('titulo', 'Detalhes do Usuário')

@section('conteudo')
    <h1>Detalhes do Usuário</h1>
    <div class="card form-cadastro">
        <div class="card-body">
            <h5 class="card-title">{{ $usuario->name }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $usuario->email }}</p>
            <p class="card-text"><strong>Tipo:</strong> {{ $usuario->tipo }}</p>
            <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
        </div>
    </div>
@endsection