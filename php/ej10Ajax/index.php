<!DOCTYPE html>
<html lang="es">
<head>
    <title>Ejercicio 10 - PHP</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./estilos.css">
    <script src="../jquery.js" type="text/javascript"></script>
</head>
<body>
    <div id='contenedor'>
        <div id='dato'>
            <label for='clave'>Dato de entrada: </label>
            <br><br>
            <input type='text' name='clave' id='clave'>
        </div>
        <div id='encriptar'>
            <label for='encriptar'>Encriptar</label>
            <br><br>
            <button id='botonDisparador'  type='submit'><img src="flechita.png" class="flecha"></button></div>
        <div id='resultado'>Resultado</div>
        <div id='estado'>Estado del requerimiento:</div>
    </div>
    <script>
        $(document).ready(function() {
            $("#clave").attr("value", "");
        });

        $("#botonDisparador").click(function() {
            $("#resultado").empty(); //vacia el cuadro de resultado
            $("#resultado").addClass("estiloRecibiendo"); //le cambia provisorio de estilo del contenedor
            $("#resultado").html("<h2>Esperando respuesta ..</h2>"); //Escribe mensaje provisorio
            $("#estado").empty(); //Vacía el div que indica el estado el requerimiento
            $("#estado").append("<h4>Estado del requerimiento: </h4"); //adiciona html al div de estado
            $.ajax({
                type: "post",
                url: "./respuesta.php",
                data: { clave: $("#clave").val() },
                success: function(respuestaDelServer, estado) {
                    $("#resultado").removeClass("estiloRecibiendo");
                    $("#resultado").html("<h1)Resultado: </h1><h4>" + respuestaDelServer + "</h4>");
                    $("#estado").append("<h4>" + estado + "</h4>");
                }
            }); //cierr ajax
        }); // cierra click
    </script>
</body>
</html>