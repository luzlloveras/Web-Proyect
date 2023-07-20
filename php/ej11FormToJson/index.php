<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Ejercicio 11 - PHP</title>
		<link rel="stylesheet" type="text/css" href="./estilos.css">
	</head>
    
<body>
    <div id="encabezado-pie">Encabezado</div>
    <div id="contenedor">
        <button id="abrir">Ventana modal</button>
    </div>
    <div id="encabezado-pie">Pie de página</div>
    <div id="modal">
        <div class="encabezadoModal">
            Encabezado modal
            <button class="cerrar" id="cerrar">X</button>
        </div>
        <div id="formulario">
            <label>ID usuario:</label>
            <input type="text" name="usuario_id" id="usuario_id" required><br /><br />
            <label>Login:</label>
            <input type="text" name="login" id="login" required><br /><br />
            <label>Apellido:</label>
            <input type="text" name="apellido" id="apellido" required><br /><br />
            <label>Nombre:</label>
            <input type="text" name="nombre" id="nombre" required><br /><br />
            <label>Fecha de nacimiento:</label>
            <input type="date" name="fecha" id="fecha" required><br /><br />
            <button type="submit" id="enviar">Enviar</button>
        </div>
        <div id="respuesta"></div>
    </div>
</body>
<script src="../jquery.js" type="text/javascript"></script>
<script src="./ajax.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        document.getElementById("modal").className = "modalApagado";
        document.getElementById("contenedor").className = "contenedorAct";
    });
    document.getElementById("abrir").onclick = function() {
        document.getElementById("modal").className = "modalPrendido";
        document.getElementById("contenedor").className = "contenedorBloq";
    }
    document.getElementById("cerrar").onclick = function() {
        document.getElementById("modal").className = "modalApagado";
        document.getElementById("contenedor").className = "contenedorAct";
    }
</script>

</html>