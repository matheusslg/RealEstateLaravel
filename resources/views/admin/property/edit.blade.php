@extends('layouts.app') 
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Editar Propriedade</h1>
</div>
<div class="table-responsive">
    <form method="post" action="{{ route('property.update', $property) }}">
        {{ csrf_field() }} {{ method_field('PUT') }}
        <div class="form-group">
            <label for="text">Nome</label>
            <input type="text" class="form-control" name="nome" placeholder="Nome da propriedade" value="{{ $property->nome }}">
        </div>
        <div class="form-group">
            <label for="descricaoTextArea">Descrição</label>
            <textarea name="descricao" class="form-control" id="descricaoTextArea" rows="5">{{ $property->descricao }}</textarea>
        </div>
        <div class="form-group">
            <label for="text">Endereço</label>
            <input type="text" class="form-control" name="localidade" placeholder="Endereço da propriedade" value="{{ $property->localidade }}">
        </div>
        <div class="form-group">
            <label for="categoriaSelect">Categoria</label>
            <select name="id_categoria" class="form-control" id="categoriaSelect" onchange="property_onCategoryChange()">
                <option value="empty">Selecione uma categoria</option>
                @foreach($categories as $category)
                    @if ($category->id == $property->id_categoria)
                        <option value="{{ $category->id }}" selected>{{ $category->nome }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->nome }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div id="standardInputsEdit">
            <div class="form-group">
                <label for="text">Quartos</label>
                <input type="number" class="form-control" name="quartos" placeholder="Quartos da propriedade" value="{{ $property->quartos }}">
            </div>
            <div class="form-group">
                <label for="text">Banheiros</label>
                <input type="number" class="form-control" name="banheiros" placeholder="Banheiros da propriedade" value="{{ $property->banheiros }}">
            </div>
            <div class="form-group">
                <label for="text">Vagas na garagem</label>
                <input type="number" class="form-control" name="garagens" placeholder="Vagas na garagem da propriedade" value="{{ $property->garagens }}">
            </div>
        </div>

        <div class="form-group">
            <label for="modalidadeSelect">Modalidade</label>
            <select name="id_modalidade" class="form-control" id="modalidadeSelect">
                <option value="empty">Selecione uma modalidade</option>
                @foreach($modalities as $modality)
                    @if ($modality->id == $property->id_modalidade)
                        <option value="{{ $modality->id }}" selected>{{ $modality->nome }}</option>
                    @else
                        <option value="{{ $modality->id }}">{{ $modality->nome }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="localizacaoSelect">Localização</label>
            <select name="id_localizacao" class="form-control" id="localizacaoSelect">
                <option value="empty">Selecione uma localização</option>
                @foreach($locations as $location)
                    @if ($location->id == $property->id_localizacao)
                        <option value="{{ $location->id }}" selected>{{ $location->nome }}</option>
                    @else
                        <option value="{{ $location->id }}">{{ $location->nome }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="estadoSelect">Estado</label>
            <select name="id_estado" class="form-control" id="estadoSelect" onchange="property_onStateChange()">
                <option value="empty">Selecione um estado</option>
                @foreach($states as $state)
                    @if ($state->id == $property->id_estado)
                        <option value="{{ $state->id }}" selected>{{ $state->uf }}</option>
                    @else
                        <option value="{{ $state->id }}">{{ $state->uf }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="cidadeSelect">Cidade</label>
            <select name="id_cidade" class="form-control" id="cidadeSelect">
                <option value="empty">Selecione uma cidade</option>
                @foreach($cities as $city)
                    @if ($city->id == $property->id_cidade)
                        <option value="{{ $city->id }}" selected>{{ $city->nome }}</option>
                    @else
                        <option value="{{ $city->id }}">{{ $city->nome }}</option>
                    @endif
                @endforeach
                {{-- property.js --}}
            </select>
        </div>

        <div class="form-group">
            <label for="text">Geolocalização</label>
            <input type="text" id="geolocalizacaoInputEdit" class="form-control" name="geolocalizacao" placeholder="Geolocalização da propriedade" value="{{ $property->geolocalizacao }}">
            <small id="geolocalizacaoHelp" class="form-text text-muted">Este campo pode ser preenchido com as coordenadas do Google Maps.</small>
        </div>

        {{--  <div id="mapEdit"></div>
        <br />  --}}

        <div class="form-group">
            <label for="text">Área</label>
            <input type="number" class="form-control" name="area" placeholder="Área da propriedade" value="{{ $property->area }}">
        </div>
        <div class="form-check">
            @if ($property->tipo_area == 'metros_quadrados')
                <input class="form-check-input" type="radio" name="tipo_area" id="tipoArea1" value="metros_quadrados" checked>
            @else
                <input class="form-check-input" type="radio" name="tipo_area" id="tipoArea1" value="metros_quadrados">
            @endif
            <label class="form-check-label" for="tipoArea1">
                Metros Quadrados
            </label>
        </div>
        <div class="form-check">
            @if ($property->tipo_area == 'hectares')
                <input class="form-check-input" type="radio" name="tipo_area" id="tipoArea2" value="hectares" checked>
            @else
                <input class="form-check-input" type="radio" name="tipo_area" id="tipoArea2" value="hectares">
            @endif
            <label class="form-check-label" for="tipoArea2">
                Hectares
            </label>
        </div>
        <br />
        <div class="form-group">
            <label for="text">Valor</label>
            <input type="number" class="form-control" name="valor" placeholder="Valor da propriedade" value="{{ $property->valor }}">
            <small id="geolocalizacaoHelp" class="form-text text-muted">Somente números na moeda Real.</small>
        </div>
        <div class="form-group" style="padding-bottom: 50px">
            <button class="btn btn-info">Editar</button>
        </div>
    </form>
</div>

{{--  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFxqoJT-UimQJgznKztWWbY9A_XYxVUCY&callback=initMapEdit"></script>  --}}
@endsection