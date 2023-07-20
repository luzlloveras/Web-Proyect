    
<?php

    # variables tipo objeto renglon pedido
    echo "<h2>Variables tipo objeto en PHP. Objeto renglon pedido</h2>";

    # objeto renglon pedido
    echo "<h2><span style='color: blue'>\$objRenglonPedido</span></h2>";

    # instanciacion de una clase estandar de PHP
    $objRenglonPedido = new stdclass;

    # asignacion del codigo del articulo
    $objRenglonPedido->codArt = " cp001 ";

    # asignacion de la descripcion del articulo
    $objRenglonPedido->descrip = " Jaguel 800gr ";
    
    # asignacion del codigo del precio unitario del articulo
    $objRenglonPedido->precioUnitario = 30;
    
    # asignacion de la cantidad del articulo 
    $objRenglonPedido->cant = 2;

    # impresion del objeto y sus propiedades
    echo "Código del artículo: " . $objRenglonPedido->codArt . "</br>";
    echo "Descripción del artículo: " . $objRenglonPedido->descrip . "</br>";
    echo "Precio Unitario: " . $objRenglonPedido->precioUnitario . "</br>";
    echo "Cantidad: " . $objRenglonPedido->cant . "</br>";

    # impresion del type del objeto renglon pedido
    echo "<h2> Tipo de <span style='color: blue'>\$objRenglonPedido:</span> " . gettype($objRenglonPedido) . "</h2>" ;
    
    # variable del tipo array 
    $renglonesPedido = [];

    # agrego nuevo elemento al array renglonesPedido
    array_push($renglonesPedido,$objRenglonPedido);

    # instanciacion de una clase estandar de PHP
    $objRenglonPedido2 = new stdclass;

    # asignacion de las propiedades de la clase
    $objRenglonPedido2->codArt = " cp002 ";
    $objRenglonPedido2->descrip = " Jaguel 800gr ";
    $objRenglonPedido2->precioUnitario = 24;
    $objRenglonPedido2->cant = 3;

    # agrego nuevo elemento al array renglonesPedidos2
    array_push($renglonesPedido,$objRenglonPedido2);

    echo "<h2>Definamos arreglo de pedidos:</h2>";
    
    # impresion $renglonesPedidos
    echo "<h2><span style='color: blue'>\$renglonesPedido</span></h2>";

    # impresion Tabula $renglonesPedidos
    echo "<h2>Tabula <span style='color: blue'>\$renglonesPedido</span>. Recorrer el arreglo de renglones y tabularlos con html:</h2>";

    # impresion de renglones de  $objRenglonPedido
    foreach ($renglonesPedido as $objRenglonPedido)
        echo "<p>" . $objRenglonPedido2->codArt . $objRenglonPedido2->descrip . $objRenglonPedido2->precioUnitario . $objRenglonPedido2->cant . "</p>";

    # impresion cantidad de renglones de echo $renglonesPedido
    echo "<h4>Cantidad de renglones: " . count($renglonesPedido) . "</h4>";

    # instanciacion de una clase estandar de PHP
    $objRenglonesPedido = new stdClass();

    # declaro el arreglo completo de renglones de pedidos
    $objRenglonesPedido->renglonesPedido = $renglonesPedido;

    # declaro solo un numero. El numero de renglones del array
    $objRenglonesPedido->cantidadDeRenglones = count($renglonesPedido);

    # impresion del objeto $objRenglonesPedido
    echo "<h2>Producción de un objeto <span style='color: blue'>\$objRenglonesPedido</span> con dos atributos array renglonesPedido y catidadDeRenglones</h2>";

    # impresion cantidad de renglones de echo $renglonesPedido
    echo "<h4>Cantidad de renglones: " . count($renglonesPedido) . "</h4>";

    # el objeto $objRenglonesPedido es como dificado como texto JSON para ser enviado al navegador remoto
    $jsonRenglonesPedido = json_encode($objRenglonesPedido);

    echo "<h2>Producción de un JSON jsonRenglones: </h2>";

    # Se realiza entrega que podría ser utilizada por el navegador remoto
    echo $jsonRenglonesPedido;
    
?>