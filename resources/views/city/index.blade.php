@extends('layouts.app') @section('content')
<div class="container">
    <p>
        <a class="btn btn-info" href="{{ route('city.create') }}">Criar Cidade</a>
    </p>
    <h1 class="page-header">Cidades</h1>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Estado</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cities as $city)
                <tr>
                    <th>{{ $city->id }}</th>
                    <td>{{ $city->nome }}</td>
                    <td>{{ $city->estado }}</td>
                    <td>
                        <form action="{{ route('city.edit', $city->id) }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="GET">
                            <button class="btn btn-info">
                                Editar
                            </button>
                        </form>
                        <form action="{{ route('city.destroy', $city->id) }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger" onclick="return confirm('Deseja mesmo excluir a cidade {{ $city->nome }}?')">
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
