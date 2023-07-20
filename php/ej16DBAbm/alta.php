<?php
    $conn = mysqli_connect("bjyfvmfsdrrw88lhnxil-mysql.services.clever-cloud.com", "uu3vhgor3wenxsfs", "rtAlXVGiAKq9ZElwLD1b", "bjyfvmfsdrrw88lhnxil");
    //print if not connected
    if (!$conn) echo 'conection error ' . mysqli_connect_error();

    $id = ($_POST['alta_id']);
    $empresa = ($_POST['alta_empresa']);
    $clase = ($_POST['alta_clase']);
    $fecha = ($_POST['alta_fecha']);
    $cantidad = ($_POST['alta_cantidad']);

    if (empty($_FILES['idPdf']['name'])){
        $sql = "INSERT INTO `Proveedores` (`id`, `empresa`, `clase`, `fecha`, `cantidad`, `pdf`) VALUES ('{$id}', '{$empresa}', '{$clase}', '{$fecha}', '{$cantidad}', '')";
        $respuesta_estado = "Proveedor añadido exitosamente!</br>Sin archivo PDF!";
    }
    else
    {
        $pdf = base64_encode(file_get_contents($_FILES['idPdf']['tmp_name']));
        $sql = "INSERT INTO `Proveedores` (`id`, `empresa`, `clase`, `fecha`, `cantidad`, `pdf`) VALUES ('{$id}', '{$empresa}', '{$clase}', '{$fecha}', '{$cantidad}', '{$pdf}')";
        $respuesta_estado = "Proveedor añadido exitosamente!</br>Con archivo PDF!";
    }
    
    $result = $conn->query($sql);
    $objArticulos = new stdClass();

    if ($result === TRUE) 
    {
        $objArticulos->success = TRUE;
    } 
    else 
    {
        $respuesta_estado = "Error al agregar el proveedor: " . $objArticulos->id = $_POST['f_id'];
    }
    mysqli_close($conn);
    $objArticulos->respuesta_estado = $respuesta_estado;

    echo json_encode($objArticulos);
?>  