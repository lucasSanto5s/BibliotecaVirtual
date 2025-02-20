@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Autor</h1>
    
    <form action="{{ route('autores.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection
