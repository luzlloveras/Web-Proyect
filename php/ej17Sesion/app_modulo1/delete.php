<?php

    session_start();
    $usuario =  $_SESSION['username'];
    if(!isset($usuario)){
        header('location: ./login.php');
    }

    $conn = mysqli_connect("bjyfvmfsdrrw88lhnxil-mysql.services.clever-cloud.com", "uu3vhgor3wenxsfs", "rtAlXVGiAKq9ZElwLD1b", "bjyfvmfsdrrw88lhnxil");
    //print if not connected
    if (!$conn) echo 'conection error ' . mysqli_connect_error();

    $id = ($_GET['id']);
    $sql = "DELETE FROM `Proveedores` WHERE `id`='{$id}'";    
    $result = $conn->query($sql);
    $objArticulos = new stdClass();

    if ($result === TRUE) 
    {
        $respuesta_estado = "Eliminó correctamente al proveedor: " . $id;
        $objArticulos->success = TRUE;
    } 
    else 
    {
        $respuesta_estado = "Error al eliminar el proveedor: " . $id;
    }
    mysqli_close($conn);
    $objArticulos->respuesta_estado = $respuesta_estado;

    echo json_encode($objArticulos);
?>  