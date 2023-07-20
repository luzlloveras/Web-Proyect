<?php
    session_start();
    $usuario =  $_SESSION['username'];
    if(!isset($usuario)){
        header('location: ./login.php');
    }

    $conn = mysqli_connect("bjyfvmfsdrrw88lhnxil-mysql.services.clever-cloud.com", "uu3vhgor3wenxsfs", "rtAlXVGiAKq9ZElwLD1b", "bjyfvmfsdrrw88lhnxil");
    //print if not connected
    if (!$conn) echo 'conection error ' . mysqli_connect_error();

    $id = ($_POST['modi_id']);
    $empresa = ($_POST['modi_empresa']);
    $clase = ($_POST['modi_clase']);
    $fecha = ($_POST['modi_fecha']);
    $cantidad = ($_POST['modi_cantidad']);


    if (empty($_FILES['idPdf']['name'])){
        $sql = "UPDATE `Proveedores` SET `id`='{$id}',`empresa`='{$empresa}',`clase`='{$clase}',`fecha`='{$fecha}',`cantidad`='{$cantidad}' WHERE `id`= '{$id}'";
        $respuesta_estado = "Proveedor modificado exitosamente!</br>Sin archivo PDF!";
    }
    else
    {
        $pdf = base64_encode(file_get_contents($_FILES['idPdf']['tmp_name']));
        $sql = "UPDATE `Proveedores` SET `id`='{$id}',`empresa`='{$empresa}',`clase`='{$clase}',`fecha`='{$fecha}',`cantidad`='{$cantidad}',`pdf`='{$pdf}' WHERE `id`= '{$id}'";
        $respuesta_estado = "Proveedor modificado exitosamente!</br>Con archivo PDF!";
    }
    
    $result = $conn->query($sql);
    $objArticulos = new stdClass();

    if ($result === TRUE) 
    {
        $objArticulos->success = TRUE;
    } 
    else 
    {
        $respuesta_estado = "Error al modificar el proveedor: " . $objArticulos->id = $_POST['f_id'];
    }
    mysqli_close($conn);
    $objArticulos->respuesta_estado = $respuesta_estado;

    echo json_encode($objArticulos);
?>  