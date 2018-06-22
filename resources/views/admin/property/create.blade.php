@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Nova Propriedade</h1>
</div>
<div class="table-responsive">
    <form method="post" action="{{ route('property.store') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="text">Nome</label>
            <input type="text" class="form-control" name="nome" placeholder="Nome da propriedade">
        </div>
        <div class="form-group">
            <label for="descricaoTextArea">Descrição</label>
            <textarea name="descricao" class="form-control" id="descricaoTextArea" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label for="text">Endereço</label>
            <input type="text" class="form-control" name="localidade" placeholder="Endereço da propriedade">
        </div>
        <div class="form-group">
            <label for="categoriaSelect">Categoria</label>
            <select name="id_categoria" class="form-control" id="categoriaSelect" onchange="property_onCategoryChange()">
                        <option value="empty">Selecione uma categoria</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->nome }}</option>
                        @endforeach
                    </select>
        </div>

        <div id="standardInputs">
            <div class="form-group">
                <label for="text">Quartos</label>
                <input type="number" class="form-control" name="quartos" placeholder="Quartos da propriedade">
            </div>
            <div class="form-group">
                <label for="text">Banheiros</label>
                <input type="number" class="form-control" name="banheiros" placeholder="Banheiros da propriedade">
            </div>
            <div class="form-group">
                <label for="text">Vagas na garagem</label>
                <input type="number" class="form-control" name="garagens" placeholder="Vagas na garagem da propriedade">
            </div>
        </div>

        <div class="form-group">
            <label for="modalidadeSelect">Modalidade</label>
            <select name="id_modalidade" class="form-control" id="modalidadeSelect">
                        <option value="empty">Selecione uma modalidade</option>
                        @foreach($modalities as $modality)
                        <option value="{{ $modality->id }}">{{ $modality->nome }}</option>
                        @endforeach
                    </select>
        </div>
        <div class="form-group">
            <label for="localizacaoSelect">Localização</label>
            <select name="id_localizacao" class="form-control" id="localizacaoSelect">
                        <option value="empty">Selecione uma localização</option>
                        @foreach($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->nome }}</option>
                        @endforeach
                    </select>
        </div>

        <div class="form-group">
            <label for="estadoSelect">Estado</label>
            <select name="id_estado" class="form-control" id="estadoSelect" onchange="property_onStateChange()">
                        <option value="empty">Selecione um estado</option>
                        @foreach($states as $state)
                        <option value="{{ $state->id }}">{{ $state->uf }}</option>
                        @endforeach
                    </select>
        </div>

        <div class="form-group">
            <label for="cidadeSelect">Cidade</label>
            <select name="id_cidade" class="form-control" id="cidadeSelect">
                        <option value="empty">Selecione uma cidade</option>
                        {{-- property.js --}}
                    </select>
        </div>

        <div class="form-group">
            <label for="text">Geolocalização</label>
            <input type="text" id="geolocalizacaoInput" class="form-control" name="geolocalizacao" placeholder="Geolocalização da propriedade">
            <small id="geolocalizacaoHelp" class="form-text text-muted">Este campo pode ser preenchido com as coordenadas do Google Maps.</small>
        </div>

        {{--  <div id="map"></div>
        <br />  --}}

        <div class="form-group">
            <label for="text">Área</label>
            <input type="number" class="form-control" name="area" placeholder="Área da propriedade">
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="tipo_area" id="tipoArea1" value="metros_quadrados" checked>
            <label class="form-check-label" for="tipoArea1">
                        Metros Quadrados
                    </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="tipo_area" id="tipoArea2" value="hectares">
            <label class="form-check-label" for="tipoArea2">
                        Hectares
                    </label>
        </div>
        <br />
        <div class="form-group">
            <label for="text">Valor</label>
            <input type="number" class="form-control" name="valor" placeholder="Valor da propriedade">
            <small id="geolocalizacaoHelp" class="form-text text-muted">Somente números na moeda Real.</small>
        </div>
        <div class="form-group" style="padding-bottom: 50px">
            <button class="btn btn-info">Enviar</button>
        </div>
    </form>
</div>

{{--  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFxqoJT-UimQJgznKztWWbY9A_XYxVUCY&callback=initMap"></script>  --}}
@endsection
