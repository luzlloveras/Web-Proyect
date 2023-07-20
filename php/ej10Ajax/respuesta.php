<?php
    sleep(3); 
    echo "<p>Clave: " . $_POST['clave'] . "</p>";
    $claveEncriptadaMD5 = md5($_POST['clave']);
    echo "<br>";
    echo "<p>Clave encriptada en md5:". $claveEncriptadaMD5 ."</p>";
    $claveEncriptadaSHA1 = sha1($_POST['clave']);
    echo "<br>";
    echo "<p>Clave encriptada en sha1:". $claveEncriptadaSHA1 ."</p>";
?>