@extends('layouts.app') @section('content')
<div class="container">
    <p>
        <a class="btn btn-info" href="{{ route('location.create') }}">Criar Localização</a>
    </p>
    <h1 class="page-header">Localizações</h1>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach($locations as $location)
                <tr>
                    <th>{{ $location->id }}</th>
                    <td>{{ $location->nome }}</td>
                    <td>
                        <form action="{{ route('location.edit', $location->id) }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="GET">
                            <button class="btn btn-info">
                                Editar
                            </button>
                        </form>
                        <form action="{{ route('location.destroy', $location->id) }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger" onclick="return confirm('Deseja mesmo excluir a cidade {{ $location->nome }}?')">
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
