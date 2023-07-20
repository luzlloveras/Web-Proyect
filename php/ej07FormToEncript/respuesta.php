<?php
    echo "<p>Clave: " . $_GET['clave'] . "</p>";
    $claveEncriptada = md5($_GET['clave']);
    echo "<p>Clave encriptada en md5:". $claveEncriptada ."</p>";
    $claveEncriptada = sha1($_GET['clave']);
    echo "<p>Clave encriptada en sha1:". $claveEncriptada ."</p>";
?>