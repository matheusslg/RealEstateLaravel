@extends('layouts.app') 
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Detalhes da Propriedade</h1>
    <a class="btn btn-success" href="{{ route('property.create') }}">Nova Propriedade</a>
</div>
<div class="table-responsive">
    <div class="card">
        <div class="card-body">
            <strong>Nome:</strong> {{ $property->nome }}</br></br>
            <strong>Descrição:</strong> {{ $property->descricao }}</br></br>
            <strong>Endereço:</strong> {{ $property->localidade }}</br></br>
            <strong>Categoria:</strong> 
            @foreach ($categories as $category) @if ($category->id == $property->id_categoria) {{ $category->nome }} @endif @endforeach
            </br></br>
            <strong>Quartos:</strong> {{ $property->quartos }}</br></br>
            <strong>Banheiros:</strong> {{ $property->banheiros }}</br></br>
            <strong>Garagens:</strong> {{ $property->garagens }}</br></br>
            <strong>Modalidade:</strong> 
            @foreach ($modalities as $modality) @if ($modality->id == $property->id_modalidade) {{ $modality->nome }} @endif @endforeach
            </br></br>
            <strong>Localização:</strong> 
            @foreach ($locations as $location) @if ($location->id == $property->id_localizacao) {{ $location->nome }} @endif @endforeach
            </br></br>
            <strong>Cidade:</strong> 
            @foreach ($cities as $city) @if ($city->id == $property->id_cidade) {{ $city->nome }} @endif @endforeach
            </br></br>
            <strong>Estado:</strong> 
            @foreach ($states as $state) @if ($state->id == $property->id_estado) {{ $state->nome }} @endif @endforeach
            </br></br>
            <strong>Geolocalização:</strong> {{ $property->geolocalizacao }}</br></br>
            <strong>Área:</strong> {{ $property->area }} @if ($property->tipo_area == 'metros_quadrados') m² @elseif ($property->tipo_area
            == 'hectares') ha @endif
            </br></br>
            <strong>Valor:</strong> R$ {{ $property->valor }}</br></br>
        </div>
    </div>
</div>

@endsection