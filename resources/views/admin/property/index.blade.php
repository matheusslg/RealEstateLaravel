@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Propriedades</h1>
    <a class="btn btn-success" href="{{ route('property.create') }}">Nova Propriedade</a>
</div>
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Categoria</th>
                <th>Modalidade</th>
                <th>Localização</th>
                <th>Valor</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($properties as $property)
            <tr>
                <th><a href="{{ route('property.show', $property->id) }}">{{ $property->id }}</a></th>
                <td>{{ $property->nome }}</td>
                <td>{{ $property->localidade }}</td>
                <td>
                    @foreach($categories as $category)
                        @if ($category->id == $property->id_categoria)
                            {{ $category->nome }}
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($modalities as $modality)
                        @if ($modality->id == $property->id_modalidade)
                            {{ $modality->nome }}
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($locations as $location)
                        @if ($location->id == $property->id_localizacao)
                            {{ $location->nome }}
                        @endif
                    @endforeach
                </td>
                <td>{{ $property->valor }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <form action="{{ route('property.edit', $property->id) }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="GET">
                            <button class="btn btn-info">
                                Editar
                            </button>
                        </form>
                        <form action="{{ route('property.destroy', $property->id) }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger" onclick="return confirm('Deseja mesmo excluir a propriedade {{ $property->nome }}?')">
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
