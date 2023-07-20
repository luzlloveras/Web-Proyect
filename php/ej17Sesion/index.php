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
            session_start();
            $usuario =  $_SESSION['username'];

            if(!isset($usuario)){
                header('location: ./login.php');
            }
        ?>
            <h2>ACCESO PERMITIDO</h2>
        <?php
            echo "<h1>Bienvenido $usuario !</h1>";
        ?>
        <br>
        <br>
        <br>
        <button><a href='./app_modulo1/index.php'>Ingreso a la aplicacion</a></button>
        <br>
        <br>
        <br>
        <button><a href='./salir.php'>Terminar sesion</a></button>
        <br>
        <br>
    </form>
</body>
</html>
