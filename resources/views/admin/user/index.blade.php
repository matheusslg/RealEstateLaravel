@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Usuários</h1>
    <a class="btn btn-success" href="{{ route('user.create') }}">Novo Usuário</a>
</div>
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <th><a href="{{ route('user.show', $user->id) }}">{{ $user->id }}</a></th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <div class="btn-group" role="group">
                    <form action="{{ route('user.edit', $user->id) }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="GET">
                        <button class="btn btn-info">
                                Editar
                            </button>
                    </form>
                    <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger" onclick="return confirm('Deseja mesmo excluir a cidade {{ $user->name }}?')">
                                Apagar
                            </button>
                    </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
