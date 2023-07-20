<link rel="stylesheet" type="text/css" href="./Estilos.css">
<?php
	sleep(3);
	$objPersona= new stdclass;
	$objPersona->id=$_POST["usuario_id"];
	$objPersona->login=$_POST["login"];
	$objPersona->apellido=$_POST["apellido"];
	$objPersona->nombre=$_POST["nombre"];
	$objPersona->fecha=$_POST["fecha"];
	$objJSON=json_encode($objPersona);
	echo $objJSON;
?>  