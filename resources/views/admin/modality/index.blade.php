@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Modalidades</h1>
    <a class="btn btn-success" href="{{ route('modality.create') }}">Nova Modalidade</a>
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
            @if(count($modalities) > 0)
            @foreach($modalities as $modality)
            <tr>
                <th>{{ $modality->id }}</th>
                <td>{{ $modality->nome }}</td>
                <td>
                    <div class="btn-group" role="group">
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
                            <button class="btn btn-danger" onclick="return confirm('Deseja mesmo excluir a modalidade {{ $modality->nome }}?')">
                                Apagar
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td class="text-center" colspan="3">Nenhuma modalidade encontrada!</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
</div>
@endsection
