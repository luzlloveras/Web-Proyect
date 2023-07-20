<?php
    $conn = mysqli_connect("bjyfvmfsdrrw88lhnxil-mysql.services.clever-cloud.com", "uu3vhgor3wenxsfs", "rtAlXVGiAKq9ZElwLD1b", "bjyfvmfsdrrw88lhnxil");
    //print if not connected
    if (!$conn) 
    {echo 'conection error ' . mysqli_connect_error();}

    $clase = ($_GET['filtroClase']);
    $sql = "SELECT * FROM `Proveedores` WHERE Clase = '$clase' ";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $articulos=[];
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $objArticulo = new stdclass;
                $objArticulo->Id = $row["Id"];
                $objArticulo->Empresa = $row["Empresa"];
                $objArticulo->Clase = $row["Clase"];
                $objArticulo->Descripcion = $row["Descripcion"];
                $objArticulo->Fecha = $row["Fecha"];
                $objArticulo->Cantidad = $row["Cantidad"];
                array_push($articulos,$objArticulo);
            }
        }

        $objArticulos = new stdClass(); // creo un objeto articulos
        $objArticulos->articulos=$articulos; // meto en objArticulos el array con objetos articulo
        $objArticulos->cuenta=count($articulos); // cuento cantidad de filas en array articulos
        
        echo json_encode($objArticulos); // envio objArticulos como JSON al front
?>