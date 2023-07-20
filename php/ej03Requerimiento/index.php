<h4>En este ejemplo se utiliza la función require().</h4>
<h4>Antes de insertar el require las variables declaradas en el mismo no existen.</h4>
<h4>Las variables son:</h4> 
<?php
    # impresion de acceso a variable sin include()
    echo $varInclude["codigoArticulo"];
    echo $varInclude["descripcionArticulo"];
    echo $varInclude["precioUnitario"];
    echo $varInclude["cantidad"];

    # uso de require() 
    require("./ejemplo2.inc.php");

    # longitud del arreglo
    echo "<h4>La longuitud de los arreglos es: " . count($varInclude) . "</h4>";

    # frase de ejecucion include() y waning
    echo "<h4>Aquí ya se ejecutó la función require().</h4>";

    # frase con cantidad de variables
    echo "<h4>Las " . count($varInclude) . " variables de tipo array asociativo en el inc son:</h4>";

    # tabla
    echo "<div style='width: 40%'><table style='border: solid 2px; border-collapse: collapse; background-color: violet;'><tbody>";
    for($i = 0; $i < 2; $i++)
    {
        echo "<tr>";
        echo "<td style='border: solid 1px; padding-left: 10px;'>" . $varInclude[$i]["codigoArticulo"] . "</td>";
        echo "<td style='border: solid 1px; padding-left: 10px;'>" . $varInclude[$i]["descripcionArticulo"] . "</td>";
        echo "<td style='border: solid 1px; padding-left: 10px;'>" . $varInclude[$i]["precioUnitario"] . "</td>";
        echo "<td style='border: solid 1px; padding-left: 10px;'>" . $varInclude[$i]["cantidad"] . "</td>";
    }
    echo "</tbody></table></div>";

    # frase con longitud de los arreglos
    echo "<p>La longuitud de los arreglos es: " . count($varInclude[0]) . "</p>";
?>
    