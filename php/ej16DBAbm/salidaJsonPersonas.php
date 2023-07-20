
<?php

sleep(2);

$dbname="bjyfvmfsdrrw88lhnxil";
$host= "bjyfvmfsdrrw88lhnxil-mysql.services.clever-cloud.com";
$user ="uu3vhgor3wenxsfs";
$password = "rtAlXVGiAKq9ZElwLD1b";



$respuesta_estado = "";
$orden = "";


$objPersona= new stdclass;
$objPersona->orden=$_GET["orden"];
$objPersona->f_id=$_GET["f_id"];
$objPersona->f_empresa=$_GET["f_empresa"];
$objPersona->f_clase=$_GET["f_clase"];
$objPersona->f_cantidad=$_GET["f_cantidad"];
$objPersona->f_fecha=$_GET["f_fecha"];

try {
    $dsn = "mysql:host=$host;dbname=$dbname";
    $dbh = new PDO($dsn, $user, $password); /*Database Handle*/
    $respuesta_estado = $respuesta_estado . "\nconexion exitosa";
}
catch (PDOException $e) {
    $respuesta_estado = $respuesta_estado . "\n" . $e->getMessage();
}

$sql="SELECT * FROM Proveedores WHERE ";
$sql = $sql . "id like CONCAT('%',:id,'%') and ";
$sql = $sql . "empresa like CONCAT('%',:empresa,'%') and ";
$sql = $sql . "clase like CONCAT('%',:clase,'%') and ";
$sql = $sql . "cantidad like CONCAT('%',:cantidad,'%') and ";
$sql = $sql . "fecha like CONCAT('%',:fecha,'%') ";

if ($objPersona->orden != NULL){
   $sql = $sql . "order by "  . $objPersona->orden; 
}


$stmt = $dbh->prepare($sql);

//Vinculacion de sentencia

$stmt->bindParam(':id', $objPersona->f_id);
$stmt->bindParam(':empresa', $objPersona->f_empresa);
$stmt->bindParam(':clase', $objPersona->f_clase);
$stmt->bindParam(':cantidad', $objPersona->f_cantidad);
$stmt->bindParam(':fecha', $objPersona->f_fecha);

$stmt->setFetchMode(PDO::FETCH_ASSOC);

$stmt->execute();

$personas=[];

While($fila = $stmt->fetch()) {
    $objPers = new stdClass();
    $objPers->id=$fila['id'];
    $objPers->empresa=$fila['empresa'];
    $objPers->clase=$fila['clase'];
    $objPers->cantidad=$fila['cantidad'];    
    $objPers->fecha=$fila['fecha'];
    array_push($personas,$objPers);

}

$objPersonas = new stdClass();

$objPersonas->personas=$personas;

$objPersonas->cuenta = count($personas);

$salidaJson = json_encode($objPersonas);

$dbh = null;


echo $salidaJson;

?>