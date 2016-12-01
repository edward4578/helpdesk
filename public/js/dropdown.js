$(document).ready(function () {
    $('#estado').change(function (event) {
        $.get("http://localhost:8000/municipios/" + event.target.value + "", function (response, estado) {
            $('#municipio').empty();
            $('#municipio').append("<option value='0'>Seleccione..</option>");
            $('#parroquia').append("<option value='0'>Seleccione..</option>");
            for (i = 0; i < response.length; i++) {
                $('#municipio').append("<option value='" + response[i].id + "'>" + response[i].municipio + "</option>");
            }
        });

    });

    $('#municipio').change(function (event) {
        $.get("http://localhost:8000/parroquias/" + event.target.value + "", function (response, municipio) {
            $('#parroquia').empty();
            $('#parroquia').append("<option value='0'>Seleccione..</option>");
            for (i = 0; i < response.length; i++) {
                $('#parroquia').append("<option value='" + response[i].id + "'>" + response[i].parroquia + "</option>");
            }
        });
    });
});

