$(document).ready(function () {
    console.log("ready!");

    $("#standardInputs").hide();
});

var enviroment = "http://localhost:8000/api/";

var property_onCategoryChange = function () {
    var categorySelected = $("#categoriaSelect option:selected").text();
    if (categorySelected == 'Casa' || categorySelected == 'Apartamento' || categorySelected == 'Kitnet') {
        $("#standardInputs").show();
    } else {
        $("#standardInputs").hide();
    }
}

var property_onStateChange = function () {
    var state = $('#estadoSelect').val();
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
