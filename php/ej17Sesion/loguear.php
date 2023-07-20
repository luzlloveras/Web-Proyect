<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sesiones</title>

    <link rel="stylesheet" href="main.css">
</head>
<body>
    <form action="./loguear.php" method="POST">
        <?php

            require 'conexion.php';

            session_start();

            $usuario = $_POST['username'];
            $clave = md5($_POST['password']);


            $q = "SELECT COUNT(*) as contar FROM usuarios WHERE username = '$usuario' AND pass = '$clave'";
            $consulta = mysqli_query($conexion, $q);
            $array = mysqli_fetch_array($consulta);

            if($array['contar']>0){
                $_SESSION['username'] = $usuario;
                header('location: ./index.php');
            }
            else{
                echo "<h3>DATOS INCORRECTOS</h3>";
                echo "<h5>Ingrese Usuario y Contraseña nuevamente</h5>";
            }
        ?>
        <br>
        <br>
        <br>
        <button><a href='./index.php'>Volver a la aplicacion</a></button>
        <br>
        <br>
    </form>
</body>
</html>