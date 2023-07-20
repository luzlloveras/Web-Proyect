<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 20 - ESPECIALES</title>
    <link rel="stylesheet" type="text/css" href="./estilo.css">
</head>


    <div id="cont">
        <div class="encabezado">
            <div>
                <br>
                <br>
                <h2 class="titulo">Productos</h2><br><br>            
            </div>
            <div class="ordena">
                <label for='ordena'>Orden: </label>
                <input type="text" name="orden" id="orden" readonly>
                <br>
            </div>
                <button id="cargar">Cargar datos</button>
                <button id="vaciar">Vaciar datos</button>
        </div>
        <div class="clear"></div>
            <tr>
                <div class="columnaIni">
                    <th campo-dato="Id"><p id="ordenId">ID</p></th>
                </div>
                <div class="columnaIni">
                    <th campo-dato="Empresa"><p id="ordenEmpresa">Empresa</p></th>
                </div>
                <div class="columnaIni">
                    <th campo-dato="Clase"><p id="ordenClase">Clase</p></th>
                </div>
                <div class="columnaIni">
                    <th campo-dato="Descripcion" ><p id="ordenDescripcion">Descripcion</p></th>
                </div>
                <div class="columnaIni">
                    <th campo-dato="Fecha"><p id="ordenFecha">Contratación</p></th>
                </div>
                <div class="columnaIni">
                    <th campo-dato="Cantidad"><p id="ordenCantidad">N° Entregas</p></th>
                </div>
            </tr>
        
        <div class="clear"></div>

		<div class="clear"></div>
        <body>
        <div class="contenedor">
            <table >
                <tbody id="cuerpoTabla">
                    
                </tbody>
            </table>
        </div>
    </div>
    <div class="th" id="sumadores">
			<div class="columna" id="Id">
				ID<br />
			</div>
			<div class="columna" id="Empresa">
				Empresa<br />
			</div>
			<div class="columna" id="Clase">
				Clase<br />
			</div>
			<div class="columna" id="Descripcion">
                Descripcion<br />
			</div>	
            <div class="columna" id="Fecha">
                Contratacion<br />
			</div>	
            <div class="columna" id="Cantidad">
                N° Entregas<br />
			</div>	
		</div>
        <div class="pie" id="totalRegistros">   
            <h3>Pie de pagina</h3>
        </div>
</body>
<script src="../jquery.js" type="text/javascript"></script>
<script type="text/javascript">

// llenar tabla
var url_orden; 
function LlenarTabla() {

var request = $.ajax({
    type: "GET",
    url: url_orden,
    data: {
        orden: $("#orden").val(),
        filtroId: $("#filtroId").val(),
        filtroEmpresa: $("#filtroEmpresa").val(),
        filtroClase: $("#filtroClase").val(),
        filtroDescripcion: $("#filtroDescripcion").val(),
        filtroFecha: $("#filtroFecha").val(),
        filtroCantidad: $("#filtroCantidad").val(),
    },
    success: function(respuestaDelServer, estado) {
            $("#cuerpoTabla").empty();
            $("#cuerpoTabla").html("<br /><br /><br /><h3>Conexion exitosa. </h3><br />");
            $("#cuerpoTabla").empty(); 
            var objJson = JSON.parse(respuestaDelServer);
            objJson.articulos.forEach(element => {

                newRow = document.createElement("tr");

                newCell = document.createElement("td");
                newCell.setAttribute("campo-dato", "Id")
                newCell.innerHTML = element.Id;
                newRow.appendChild(newCell)

                newCell = document.createElement("td");
                newCell.setAttribute("campo-dato", "Empresa")
                newCell.innerHTML = element.Empresa;
                newRow.appendChild(newCell)

                newCell = document.createElement("td");
                newCell.setAttribute("campo-dato", "Clase")
                newCell.innerHTML = element.Clase;
                newRow.appendChild(newCell)

                newCell = document.createElement("td");
                newCell.setAttribute("campo-dato", "Descripcion")
                newCell.innerHTML = element.Descripcion;
                newRow.appendChild(newCell)

                newCell = document.createElement("td");
                newCell.setAttribute("campo-dato", "Fecha")
                newCell.innerHTML = element.Fecha;
                newRow.appendChild(newCell)

                newCell = document.createElement("td");
                newCell.setAttribute("campo-dato", "Cantidad")
                newCell.innerHTML = element.Cantidad;
                newRow.appendChild(newCell)            


                tblBody.appendChild(newRow);
            }); //cierra for each
            $("#totalRegistros").html("Cantidad de registros: " + objJson.cuenta);
            $("#footerValor").html(objJson.totalValor);
            $("#footerStock").html(objJson.totalStock);
        } //cierra funcion asignada al success
}); //cierra ajax
}
//// vaciar
    $("#vaciar").click(function () {
        $("#totalRegistros").html("Cantidad de registros: 0");
        $("#cuerpoTabla").empty();           

    });

    // cargar
    var tblBody = document.getElementById("cuerpoTabla");
    var newRow;
    var newCell;
    var cargado = 0;


    $("#cargar").click(function () {
        url_orden = "./conexion.php";
        $("#orden").val("Id");
        $("#cuerpoTabla").empty();
        $("#cuerpoTabla").html("<br /><br /><br /><h3>Esperando respuesta...</h3>");
        LlenarTabla();
    });


    ////ordenamientos
    

    // llenar tabla ordenada por ID

    $("#ordenId").click(function () {
        $("#orden").val("Id");
		url_orden = "./ordenId.php";
        $("#cuerpoTabla").empty();
        $("#cuerpoTabla").html("<br /><br /><br /><h3>Esperando ordenamiento por ID...</h3>");
        LlenarTabla();
    });

    $("#ordenEmpresa").click(function () {
        $("#orden").val("Empresa");
		url_orden = "./ordenEmpresa.php";
        $("#cuerpoTabla").empty();
        $("#cuerpoTabla").html("<br /><br /><br /><h3>Esperando ordenamiento por Empresa...</h3>");
        LlenarTabla();
    });

    $("#ordenClase").click(function () {
        $("#orden").val("Clase");
		url_orden = "./ordenClase.php";
        $("#cuerpoTabla").empty();
        $("#cuerpoTabla").html("<br /><br /><br /><h3>Esperando ordenamiento por Clase...</h3>");
        LlenarTabla();
    });

    $("#ordenDescripcion").click(function () {
        $("#orden").val("Descripcion");
		url_orden = "./ordenDescripcion.php";
        $("#cuerpoTabla").empty();
        $("#cuerpoTabla").html("<br /><br /><br /><h3>Esperando ordenamiento por Descripcion...</h3>");
        LlenarTabla();
    });

    $("#ordenFecha").click(function () {
        $("#orden").val("Fecha");
		url_orden = "./ordenFecha.php";
        $("#cuerpoTabla").empty();
        $("#cuerpoTabla").html("<br /><br /><br /><h3>Esperando ordenamiento por Fecha de contratacion...</h3>");
        LlenarTabla();
    });

    $("#ordenCantidad").click(function () {
        $("#orden").val("Cantidad");
		url_orden = "./ordenCantidad.php";
        $("#cuerpoTabla").empty();
        $("#cuerpoTabla").html("<br /><br /><br /><h3>Esperando ordenamiento por Cantidad de Entregas...</h3>");
        LlenarTabla();
    });

</script>

</html>