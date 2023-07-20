<?php

    # tabla variables del servidor
    echo "<h2>Variables del servidor</h2>";
    echo "<div style='width: 40%'><table style='border: solid 2px; border-collapse: collapse; background-color: violet;'><tbody>";
        echo "<tr>";
        echo "<td style='border: solid 1px; padding-left: 10px;'>SERVER_ADDR</td>";
        echo "<td style='border: solid 1px; padding-left: 10px;'>" . $_SERVER["SERVER_ADDR"] . "</td>";
        echo "</tr>";
        echo "<td style='border: solid 1px; padding-left: 10px;'>SERVER_PORT</td>";
        echo "<td style='border: solid 1px; padding-left: 10px;'>" . $_SERVER["SERVER_PORT"] . "</td>";
        echo "</tr>";
        echo "<td style='border: solid 1px; padding-left: 10px;'>SERVER_NAME</td>";
        echo "<td style='border: solid 1px; padding-left: 10px;'>" . $_SERVER["SERVER_NAME"] . "</td>";
        echo "</tr>";
        echo "<td style='border: solid 1px; padding-left: 10px;'>DOCUMENT_ROOT</td>";
        echo "<td style='border: solid 1px; padding-left: 10px;'>" . $_SERVER["DOCUMENT_ROOT"] . "</td>";
        echo "</tr>";
    echo "</tbody></table></div>";

    # tabla variables del cliente
    echo "<h2>Variables del cliente</h2>";
    echo "<div style='width: 40%'><table style='border: solid 2px; border-collapse: collapse; background-color: violet;'><tbody>";
        echo "<tr>";
        echo "<td style='border: solid 1px; padding-left: 10px;'>REMOTE_ADDR</td>";
        echo "<td style='border: solid 1px; padding-left: 10px;'>" . $_SERVER["REMOTE_ADDR"] . "</td>";
        echo "</tr>";
        echo "<td style='border: solid 1px; padding-left: 10px;'>REMOTE_PORT</td>";
        echo "<td style='border: solid 1px; padding-left: 10px;'>" . $_SERVER["REMOTE_PORT"] . "</td>";
        echo "</tr>";
    echo "</tbody></table></div>";


    # tabla de variables del requerimiento
    echo "<h2>Variables del requerimiento</h2>";
    echo "<div style='width: 40%'><table style='border: solid 2px; border-collapse: collapse; background-color: violet;'><tbody>";
        echo "<tr>";
        echo "<td style='border: solid 1px; padding-left: 10px;'>SCRIPT_NAME</td>";
        echo "<td style='border: solid 1px; padding-left: 10px;'>" . $_SERVER["SCRIPT_NAME"] . "</td>";
        echo "</tr>";
        echo "<td style='border: solid 1px; padding-left: 10px;'>REQUEST_METHOD</td>";
        echo "<td style='border: solid 1px; padding-left: 10px;'>" . $_SERVER["REQUEST_METHOD"] . "</td>";
        echo "</tr>";
    echo "</tbody></table></div>";

    # impresion de todas las variables
    echo "<h2>TODAS</h2>";
    foreach($_SERVER as $key_name => $key_value)
        echo $key_name . " " . $key_value . "</br>";

?>