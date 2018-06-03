@extends('layouts.app') @section('content')
<div class="container">
    <p>
        <a class="btn btn-info" href="{{ route('user.create') }}">Criar Usuário</a>
    </p>
    <h1 class="page-header">Usuários</h1>
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
                    <th>{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
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
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
