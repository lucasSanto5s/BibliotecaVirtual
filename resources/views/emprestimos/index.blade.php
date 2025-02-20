@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Empréstimos</h1>
    <a href="{{ route('emprestimos.create') }}" class="btn btn-primary">Novo Empréstimo</a>

    @if(session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Usuário</th>
                <th>Livro</th>
                <th>Data Empréstimo</th>
                <th>Data Devolução</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($emprestimos as $emprestimo)
            <tr>
                <td>{{ $emprestimo->usuario->name }}</td>
                <td>{{ $emprestimo->livro->titulo }}</td>
                <td>{{ $emprestimo->data_emprestimo }}</td>
                <td>{{ $emprestimo->data_devolucao }}</td>
                <td>
                    <form action="{{ route('emprestimos.destroy', $emprestimo->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Remover</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
