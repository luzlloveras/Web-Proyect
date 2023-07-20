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
            if(isset($errorLogin)){
                echo $errorLogin;
            }
        ?>
        <h2>Iniciar sesión</h2>
        <br>
        <br>
        <p>Nombre de usuario: <br>
        <input type="text" name="username"></p>
        <p>Contraseña: <br>
        <input type="password" name="password"></p>
        <br>
        <p class="center"><input type="submit" value="Iniciar Sesión"></p>
        <br>
        <p class="center">Usuario: gustavo.wittbecker</p>
        <p class="center">Contraseña: gustavo123</p>
    </form>
</body>
</html>