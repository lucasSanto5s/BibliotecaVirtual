@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Autores</h1>
    <a href="{{ route('autores.create') }}" class="btn btn-primary">Novo Autor</a>

    @if(session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($autores as $autor)
            <tr>
                <td>{{ $autor->nome }}</td>
                <td>
                    <a href="{{ route('autores.edit', $autor->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('autores.destroy', $autor->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
