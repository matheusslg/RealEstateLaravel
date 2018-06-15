@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Localizações</h1>
    <a class="btn btn-success" href="{{ route('location.create') }}">Nova Localização</a>
</div>
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
@endsection
