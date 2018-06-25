@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Propriedades excluídas</h1>
    <a class="btn btn-primary" href="{{ route('property.index') }}">Ver Propriedades</a>
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
            @if(count($properties) > 0)
            @foreach($properties as $property)
            <tr>
                <th>{{ $property->id }}</th>
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
                        <form action="{{ route('property.restore', $property->id) }}" method="post">
                            {{ csrf_field() }}
                            <button class="btn btn-warning">
                                Restaurar
                            </button>
                        </form>
                        <form action="{{ route('property.delete', $property->id) }}" method="post">
                            {{ csrf_field() }}
                            <button class="btn btn-danger">
                                Deletar
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td class="text-center" colspan="8">Nenhuma propriedade encontrada na lixeira!</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
