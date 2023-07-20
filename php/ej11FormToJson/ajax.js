$("#enviar").click(function() {
    $("#respuesta").empty();
    $("#respuesta").addClass("estiloRecibiendo");
    $("#respuesta").html("<br /><br /><br /><h3>Esperando respuesta...</h3>");
    $.ajax({
        type: "post",
        url: "./respuesta.php",
        data: { usuario_id: $("#usuario_id").val(), login: $("#login").val(), apellido: $("#apellido").val(), nombre: $("#nombre").val(), fecha: $("#fecha").val() },
        success: function(respuestaServer, estado) {
            $("#respuesta").removeClass("estiloRecibiendo");
            $("#respuesta").html("<br /><br /><br /><h3>Resultado de la transformación a json en el servidor:</h3><br />" + respuestaServer);
        }
    });
});