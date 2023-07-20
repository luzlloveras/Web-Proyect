<!DOCTYPE html>

<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>PHP13: Formulario ABM </title>    
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <script src="../jquery-3.6.0.js" type="text/javascript"></script>
    <script src="./clases.json"></script>


</head>

<body>

    <div id="ModalFormularioAlta" >
        <div class="encabezado">
            <h1> Formulario para ALTA</h1>
            <div class="cerrar" id="alta_cerrar">X</div> 
        </div>       

        <div class="cuerpo">

            <form enctype="multipart/form-data"   method="post" id="alta_formulario">
                <div class="columna">
                    <label> ID: </label>

                    <input type="number" id="alta_id" name="alta_id" required />

                    <label> Empresa: </label>

                    <input type="text" id="alta_empresa" name="alta_empresa" required />

                    <label> Cantidad </label>
                    
                    <input type="number" id="alta_cantidad" name="alta_cantidad" required />

                </div>
                <div class="columna">                  

                    <label> Clase: </label>

                    <select id="alta_clase" name="alta_clase" required    >
                         <option value=""></option>
                    </select>

                    <label> Fecha Contratacion: </label>

                    <input type="date" id="alta_fecha" name="alta_fecha" required />                    


                </div>
                <div class="columna2">
                    <label> Archivo PDF: </label>

                    <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />

                    <input type="file" id="alta_DocPdf" name="idPdf" />
                    
                    <button type="button"  id="alta_enviar">Enviar</button> 
                </div>
                    

            </form>
        </div>

    </div>

    <div id="ModalFormularioModi" >
        <div class="encabezado">
            <h1> Formulario para la modificación</h1>
            <div class="cerrar" id="modi_cerrar">X</div> 
        </div>       

        <div class="cuerpo">

            <form enctype="multipart/form-data"   method="post" id="modi_formulario">
                <div class="columna">
                    <label> ID: </label>

                    <input type="number" id="modi_id" name="modi_id" required />

                    <label> Empresa: </label>

                    <input type="text" id="modi_empresa" name="modi_empresa" required />

                    <label> Cantidad </label>
                    
                    <input type="number" id="modi_cantidad" name="modi_cantidad" required />

                </div>
                <div class="columna">                  

                    <label> Clase: </label>

                    <select value="" id="modi_clase" name="modi_clase" required>
                        <option value=""></option>
                    </select>

                    <label> Fecha Contratacion: </label>

                    <input type="date" id="modi_fecha" name="modi_fecha" required />  
                </div>

                <div class="columna2">
                    <label> Archivo PDF: </label>

                    <input type="file" id="modi_DocPdf" name="idPdf" />
                    
                    <button type="button" id="modi_enviar">Enviar</button> 
                </div>
            </form>
        </div>

    </div>  

    <div id="ModalRespuesta">
        <div class="encabezado">
            <h1> Respuesta del servidor</h1>
            <div class="cerrar" id="resp_cerrar">X</div> 
        </div>
        <div id="contRespuesta">
           
        </div>
    </div>

    <div id="contenedor">
    
        <div class="titulo">
            <h1>Proveedores</h1>
            <form>
            <label>Orden: <input type="text" name="orden" id="orden"  required/></label>

            </form>

            <button id="cargar">Cargar</button>
            <button id="vaciar">Vaciar</button>
            <button id="alta">Alta</button>
        </div>    

        <table>
            <thead>
                <tr class="cursor">
                    <th campo-dato='id' id="th_id" >ID</th>
                    <th campo-dato='empresa' id="th_empresa">Empresa</th>                
                    <th campo-dato='clase' id="th_clase">Clase</th>
                    <th campo-dato='cantidad' id="th_cantidad">Cantidad</th>
                    <th campo-dato='fecha' id="th_fecha">Entrada</th>
                    <th campo-dato='pdf' id="th_pdf">PDF</th>
                    <th campo-dato='modis' id="th_modis">Modis</th>
                    <th campo-dato='bajas' id="th_bajas">Baja</th>
                </tr>
        
                <tr>
                  <th campo-dato='id' class="head"><input type="number" id="f_id" name="f_id" ></th>
                  <th campo-dato='empresa' class="head"><input type="text" id="f_empresa" name="f_empresa"></th>
                  <th campo-dato='clase'class="head"> <select type="text" id="f_clase" name="f_clase"> 
                        <option value=""></option>
                        </select> </th>
                  <th  campo-dato='cantidad' class="head"><input type="number" id="f_cantidad" name="f_cantidad"></th>
                  <th  campo-dato='fecha' class="head"><input type="date" id="f_fecha" name="f_fecha"></th>
                    <th class="head"></th>
                    <th class="head"></th>
                    <th class="head"></th>
                </tr>
            </thead>

            <tfoot>
                <tr>
                
                </tr>
            </tfoot>
            <tbody id="cuerpoTabla">
            
            </tbody>
        </table>

        <div class="pie" id="registros">
            <h1>Pie</h1>
        </div>
    </div>
    

    
    <script src="./jquery-3.6.0.js" type="text/javascript"></script>
    <script type="text/javascript">

        $(function() {
            creaOpciones();
        });


        var objTabla = document.getElementById("cuerpoTabla");

        var objFormAlta = document.getElementById("alta_formulario");
        var objFormModi = document.getElementById("modi_formulario");
       
        var objProv = JSON.parse(textoProv);



            $("#cargar").click(function () {
                cargaTabla();                
            });

            $("#vaciar").click(function () {
                $("#cuerpoTabla").empty(); 
                $("#registros").html("Nro de registros: 0"); 
            });
            
            $("#modi_enviar").click(function() {
                modi();
            });

            $("#alta_enviar").click(function() {
                alta();
            });


            $("#contenedor").addClass("contenedorON");

            $("#ModalFormularioAlta").css("visibility","hidden");
            $("#ModalFormularioModi").css("visibility","hidden");
            $("#ModalRespuesta").css("visibility","hidden");

            $("#alta_enviar").attr("disabled",true);
            $("#modi_enviar").attr("disabled",true);

            // KEY UP
            $("#alta_formulario").keyup(function() {
                todoListoParaAlta();
            });

            $("#alta_formulario").change(function () {
                todoListoParaAlta();
            });

            $("#modi_formulario").keyup(function() {
                todoListoParaModif();
            });

            $("#modi_formulario").change(function () {
                todoListoParaModif();
            });



        function cargaTabla() {
            $("#cuerpoTabla").empty();
            $("#cuerpoTabla").html("<p>Esperando respuesta ..</p>");
            var objAjax = $.ajax({
                type: "GET",
                url: "./salidaJsonPersonas.php",
                data: {
                    orden: $("#orden").val(),
                    f_id: $("#f_id").val(),
                    f_empresa: $("#f_empresa").val(),   
                    f_clase: $("#f_clase").val(),
                    f_cantidad: $("#f_cantidad").val(),
                    f_fecha:$("#f_fecha").val()
                },
                success: function (respuestaDelServer, estado) {                    
                    $("#cuerpoTabla").empty();
                    $("#cuerpoTabla").html("<p>Conexión exitosa!</p>");
                    
                    $("#cuerpoTabla").empty();
                    var objJson =JSON.parse(respuestaDelServer);
                    

                    objJson.personas.forEach(function (argValor, argIndice) {
                        var objTr = document.createElement("tr");

                        var objTd = document.createElement("td");                        
                        objTd.setAttribute("campo-dato","id");
                        objTd.innerHTML=argValor.id;
                        objTr.appendChild(objTd);

                        var objTd = document.createElement("td");                        
                        objTd.setAttribute("campo-dato","empresa");
                        objTd.innerHTML=argValor.empresa;
                        objTr.appendChild(objTd);

                        var objTd=document.createElement("td");                        
                        objTd.setAttribute("campo-dato","clase");
                        objTd.innerHTML=argValor.clase;
                        objTr.appendChild(objTd);

                        var objTd=document.createElement("td");
                        objTd.setAttribute("campo-dato","cantidad");
                        objTd.innerHTML=argValor.cantidad;
                        objTr.appendChild(objTd);

                        var objTd = document.createElement("td");                        
                        objTd.setAttribute("campo-dato","fecha");
                        objTd.innerHTML=argValor.fecha;
                        objTr.appendChild(objTd);

                        var objPDF=document.createElement("td");
                        objPDF.setAttribute("campo-dato","pdf");
                        objPDF.innerHTML = "<button class='btCeldaPDF'>Doc.PDF</button>";



                        objTr.appendChild(objPDF);

                        var objModi=document.createElement("td");
                        objModi.setAttribute("campo-dato","modis");
                        objModi.innerHTML = "<button class='btCeldaModi'>Modi</button>";



                        objTr.appendChild(objModi);

                        var objBaja=document.createElement("td");
                        objBaja.setAttribute("campo-dato","bajas");
                        objBaja.innerHTML = "<button class='btCeldaDelete'>Baja</button>";



                        objTr.appendChild(objBaja);

                        


                        objTabla.appendChild(objTr);
                    });

                    $("#registros").html("Nro de registros: " + objJson.personas.length);
                }
            }); 
        }//cierra funcion cargaTabla

        function modi() {
            var confirma = confirm("Esta seguro de modificar el registro?");
            if (confirma) {
                var data = new FormData($("#modi_formulario")[0]);
                var objAjax = $.ajax({
                    type: 'post',
                    method: 'post',
                    enctype: 'multipart/form-data',
                    url: "./modi.php",
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: data,
                    success: function (respuestaDelServer) {
                        var objDati = JSON.parse(respuestaDelServer);                        
                        limpiarForm();
                        $("#ModalFormularioModi").css("visibility","hidden");
                        $("#contModalRespuesta").empty();
                        MostrarRespModal();
                        $("#contRespuesta").html(objDati.respuesta_estado);
                        cargaTabla();
                    }
                });
            }
            
        }

        function alta() {
            var confirma = confirm("Esta seguro de registrar al proveedor?");
            if (confirma) {                
                var data = new FormData($("#alta_formulario")[0]);                
                var objAjax = $.ajax({
                    type: 'post',
                    method: 'post',
                    enctype: 'multipart/form-data',
                    url: "./alta.php",
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: data,
                    success: function (respuestaDelServer, estado) {
                        var objDato = JSON.parse(respuestaDelServer);                        
                        limpiarForm();
                        $("#ModalFormularioAlta").css("visibility","hidden");
                        $("#contModalRespuesta").empty();
                        MostrarRespModal();
                        $("#contRespuesta").html(objDato.respuesta_estado);
                        cargaTabla();
                    }

                });
            }
            
        }

        function baja(doc) {
            var confirma = confirm("Esta seguro que desea borrar al proveedor?");
            if (confirma) {
                var objAjax = $.ajax({
                    type: "get",
                    url: "./delete.php",
                    data: { id: doc },

                    success: function (respuestaDelServer, estado) {
                       
                        var objDato = JSON.parse(respuestaDelServer);                        
                        limpiarForm();
                        $("#contModalRespuesta").empty();
                        MostrarRespModal();
                        $("#contRespuesta").html(objDato.respuesta_estado);
                        cargaTabla();
                    }
                });
            }
        }

        function CargarPDF(art){
            console.log(art);
            var request = $.ajax({
                type: "GET",
                url: "./verPDF.php",
                data: {id: art},
                success: function (respuestaDelServer, estado) {
                    var objetoDato = JSON.parse(respuestaDelServer);
                    $("#contModalRespuesta").empty();
                    alert(objetoDato.respuesta_estado);
                    console.log(objetoDato);
                    $("#contRespuesta").html("<iframe id='iframePDF' width='100%' height='100%' src='data:application/pdf;base64,"+objetoDato.documentoPDF+"'></iframe>");
                    
                }//cierra funcion asignada al success
            });//cierra ajax
        }

        
        //COMPLETAR CAMPOS

        $("#th_id").click(function() {
            $("#orden").val("id"); 
        });

        $("#th_empresa").click(function() {
            $("#orden").val("empresa"); 
        });

        $("#th_clase").click(function() {
            $("#orden").val("clase"); 
        });

        $("#th_cantidad").click(function() {
            $("#orden").val("cantidad"); 
        });

        $("#th_fecha").click(function() {
            $("#orden").val("fecha"); 
        });

        //ENVIO DATOS

        $("#alta").click(function () {
            MostrarAlta();
        });
               

        $("#alta_cerrar").click(function () {
            $("#ModalFormularioAlta").css("visibility","hidden");
            $("#contenedor").attr("class", "contenedorON");
            limpiarForm();
        });

        $("#modi_cerrar").click(function () {
            $("#ModalFormularioModi").css("visibility","hidden");
            $("#contenedor").attr("class", "contenedorON");
            limpiarForm();
        });

        $("#resp_cerrar").click(function () {
            $("#ModalRespuesta").css("visibility", "hidden");            
            $("#contenedor").attr("class", "contenedorON"); 
        });
       
        
        /*validacion*/
        function todoListoParaAlta() {
            if (objFormAlta.checkValidity() == true){
                $("#alta_enviar").attr("disabled",false);
            }
            else { 
                $("#alta_enviar").attr("disabled",true);
            }
        }

        function todoListoParaModif() {
            if ((objFormModi.checkValidity() == true)){
                $("#modi_enviar").attr("disabled",false);
            }
            else { 
                $("#modi_enviar").attr("disabled",true);
            }
        }

        /*AJAX*/
        function llenaOpciones() {
            var objAjax = $.ajax({
                type: "GET",
                
                url: "./salidaJsonNac.php",
                data: {         

                },
                success: function (respuestaDelServer, estado) {                   
                   
                    var objJson =JSON.parse(respuestaDelServer);                    

                    objJson.clasees.forEach(function (argValor, argIndice) {
                        var objOpcion = document.createElement("option");
                        objOpcion.setAttribute("value", argValor.codClase);
                        objOpcion.innerHTML = argValor.empresa;
                        document.getElementById("modi_clase").appendChild(objOpcion);                        
                    });
                }
            });  
        }


        //TEMPORAL
         function creaOpciones() {
            objProv.clases.forEach(function (argValor, argIndice) {
                var objOpcion = document.createElement("option");
                objOpcion.setAttribute("value", argValor.nombre);
                objOpcion.innerHTML = argValor.nombre;
                document.getElementById("f_clase").appendChild(objOpcion);                
            });
            objProv.clases.forEach(function (argValor, argIndice) {
                var objOpcion = document.createElement("option");
                objOpcion.setAttribute("value", argValor.nombre);
                objOpcion.innerHTML = argValor.nombre;                
                document.getElementById("alta_clase").appendChild(objOpcion);               
            });

            objProv.clases.forEach(function (argValor, argIndice) {
                var objOpcion = document.createElement("option");
                objOpcion.setAttribute("value", argValor.nombre);
                objOpcion.innerHTML = argValor.nombre;                
                document.getElementById("modi_clase").appendChild(objOpcion);
            });

        };

        function limpiarForm(){
            document.getElementById("alta_id").value = "";
            document.getElementById("alta_empresa").value = "";
            document.getElementById("alta_clase").value = "";
            document.getElementById("alta_cantidad").value = "";
            document.getElementById("alta_fecha").value = "";
            document.getElementById("alta_DocPdf").value = "";
            document.getElementById("modi_id").value = "";
            document.getElementById("modi_empresa").value = "";
            document.getElementById("modi_clase").value = "";
            document.getElementById("modi_cantidad").value = "";
            document.getElementById("modi_fecha").value = "";
            document.getElementById("modi_DocPdf").value = "";
        
        }

        // Event Listener para botones de Modi, PDF y Delete
        if (window.addEventListener) {
            document.addEventListener('click', function (e) {
              if (e.target.getAttribute("class") != null){
                if (e.target.getAttribute("class").indexOf("btCeldaModi") === 0) {
                    CargarVentanaModi(e.target.parentElement.parentElement);
                    MostrarModi();
                   
                }
                if (e.target.getAttribute("class").indexOf("btCeldaPDF") === 0) {
                    CargarPDF(e.target.parentElement.parentElement.querySelector('[campo-dato^="id"]').innerHTML);
                    MostrarRespModal();
                }
                if (e.target.getAttribute("class").indexOf("btCeldaDelete") === 0) {
                    baja(e.target.parentElement.parentElement.querySelector('[campo-dato^="id"]').innerHTML);
                }
              }
            });
        }

        
        function CargarVentanaModi(doc){
            document.querySelector("#modi_id").value = doc.querySelector('[campo-dato^="id"]').innerHTML;
            document.querySelector("#modi_empresa").value = doc.querySelector('[campo-dato^="empresa"]').innerHTML;
            document.querySelector("#modi_clase").value = doc.querySelector('[campo-dato^="clase"]').innerHTML
            document.querySelector("#modi_cantidad").value = doc.querySelector('[campo-dato^="cantidad"]').innerHTML
            document.querySelector("#modi_fecha").value = doc.querySelector('[campo-dato^="fecha"]').innerHTML

        }

        function MostrarRespModal(){
            $("#ModalRespuesta").css("visibility", "visible");  
        }

        function MostrarModi(){
            $("#ModalFormularioModi").css("visibility", "visible");
            $("#contenedor").attr("class", "contenedorOFF");
        }

        function MostrarAlta(){
            $("#ModalFormularioAlta").css("visibility", "visible");
            $("#contenedor").attr("class", "contenedorOFF");
        }

    </script>



</body>
</html>