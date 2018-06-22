$(document).ready(function () {
    $("#standardInputs").hide();
});

var enviroment = "http://localhost:8000/api/";

var property_onCategoryChange = function () {
    var categorySelected = $("#categoriaSelect option:selected").text();
    if (categorySelected == 'Casa' || categorySelected == 'Apartamento' || categorySelected == 'Kitnet') {
        $("#standardInputs").show();
        $("#standardInputsEdit").show();
    } else {
        $("#standardInputs").hide();
        $("#standardInputsEdit").hide();
    }
}

var property_onStateChange = function () {
    var state = $('#estadoSelect option:selected').text();
    $.ajax({
        url: enviroment + "cities/" + state,
        dataType: "html",
        type: 'GET',
        success: function (result) {
            var html = '';
            var json = JSON.parse(result);
            html += "<option value='empty' disabled>Selecione uma cidade</option>"
            for (var i = 0; i < json.length; i++) {
                html += "<option value='" + json[i].id + "'>" + json[i].nome + "</option>";
            }
            $("#cidadeSelect").empty();
            $('#cidadeSelect').append(html);
        }
    });
}

function initMap() {
    var myLatlng = {
        lat: -28.406440,
        lng: -54.962853
    };

    var markers = [];

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 14,
        center: myLatlng
    });

    map.addListener('click', function (event) {
        deleteMarkers();
        addMarker(event.latLng);
        $('#geolocalizacaoInput').val(event.latLng);
    });

    function addMarker(location) {
        var marker = new google.maps.Marker({
            position: location,
            map: map
        });
        markers.push(marker);
    }

    // Sets the map on all markers in the array.
    function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(map);
        }
    }

    // Removes the markers from the map, but keeps them in the array.
    function clearMarkers() {
        setMapOnAll(null);
    }

    // Shows any markers currently in the array.
    function showMarkers() {
        setMapOnAll(map);
    }

    // Deletes all markers in the array by removing references to them.
    function deleteMarkers() {
        clearMarkers();
        markers = [];
    }
}

function initMapEdit() {
    var myLatlng = {
        lat: -28.406440,
        lng: -54.962853
    };

    var markers = [];

    var map = new google.maps.Map(document.getElementById('mapEdit'), {
        zoom: 14,
        center: myLatlng
    });

    map.addListener('click', function (event) {
        deleteMarkers();
        addMarker(event.latLng);
        $('#geolocalizacaoInputEdit').val(event.latLng);
    });

    function addMarker(location) {
        var marker = new google.maps.Marker({
            position: location,
            map: map
        });
        markers.push(marker);
    }

    // Sets the map on all markers in the array.
    function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(map);
        }
    }

    // Removes the markers from the map, but keeps them in the array.
    function clearMarkers() {
        setMapOnAll(null);
    }

    // Shows any markers currently in the array.
    function showMarkers() {
        setMapOnAll(map);
    }

    // Deletes all markers in the array by removing references to them.
    function deleteMarkers() {
        clearMarkers();
        markers = [];
    }
}