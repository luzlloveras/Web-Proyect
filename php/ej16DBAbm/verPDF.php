<?php
    $objArticulos = new stdClass();
    $objArticulos->success = FALSE;
    // Connect to DB
    $conn = mysqli_connect("bjyfvmfsdrrw88lhnxil-mysql.services.clever-cloud.com", "uu3vhgor3wenxsfs", "rtAlXVGiAKq9ZElwLD1b", "bjyfvmfsdrrw88lhnxil");
    //print if not connected
    if (!$conn) $respuesta_estado = 'Error al contectar a la base de datos: ' . mysqli_connect_error();

    
    
    if(!isset($_GET['id'])) $respuesta_estado = "No se ha enviado un id de proveedor válido";
    else 
    {
        $objArticulos->id = $_GET['id'];

        $sql = "SELECT `pdf` FROM `Proveedores` WHERE `id`='{$_GET['id']}'";
        
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $objArticulos->documentoPDF = $row["pdf"];
            }
            if (!empty($objArticulos->documentoPDF))
            {
                $objArticulos->success = TRUE;
                $respuesta_estado = "Consulta exitosa!";
            } 
            else $respuesta_estado = "El id enviado no posee archivo PDF";
        }
        else $respuesta_estado = "No se encuentra un proveedor con el id de proveedor: " . $objArticulos->id;
    }
    mysqli_close($conn);
    $objArticulos->respuesta_estado = $respuesta_estado;
    echo json_encode($objArticulos,JSON_INVALID_UTF8_SUBSTITUTE); // envio objArticulos como JSON al front
?>