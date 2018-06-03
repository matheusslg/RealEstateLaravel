@extends('layouts.app') @section('content')
<div class="container">
    <p>
        <a class="btn btn-info" href="{{ route('modality.create') }}">Criar Modalidade</a>
    </p>
    <h1 class="page-header">Modalidades</h1>
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
                @foreach($modalities as $modality)
                <tr>
                    <th>{{ $modality->id }}</th>
                    <td>{{ $modality->nome }}</td>
                    <td>
                        <form action="{{ route('modality.edit', $modality->id) }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="GET">
                            <button class="btn btn-info">
                                Editar
                            </button>
                        </form>
                        <form action="{{ route('modality.destroy', $modality->id) }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger" onclick="return confirm('Deseja mesmo excluir a cidade {{ $modality->nome }}?')">
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
