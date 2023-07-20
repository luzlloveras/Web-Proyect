
    <p style="font-weight:bold">Texto HTML por fuera de PHP</p> 
    <hr>
    <?php 
        # frase con style
        echo "<p style='font-weight:bold'>Texto HTML <span style='color:blue'>entregado por PHP</span> usando secuencia echo.</p>"; 
        echo "<hr/>";

        # frase sin usar concatenador
        $miVariable="valor1";
        echo "<p style='font-weight:bold'>Sin usar concatenador <span style='color: blue'>\$miVariable</span>: $miVariable</p>";

        # frase usando concatenador
        echo "<p style='font-weight:bold'>Usando concatenador <span style='color: blue'>\$miVariable</span>: " . $miVariable . "</p>";
        echo "<hr>";

        # frase con variable booleana verdadera
        $miVariable=true;
        echo "<p style='font-weight:bold'>Variable tipo booleana o lógica (verdadero) <span style='color: blue'>\$miVariable</span>: " . $miVariable . "</p>";

        # frase con variable booleana falsa
        $miVariable=false;
        echo "<p style='font-weight:bold'>Variable tipo booleana o lógica (falsa) <span style='color: blue'>\$miVariable</span>: " . $miVariable . "</p>";
        echo "<hr>";

        # frase con definicion de constante  y su valor
        define("MICONSTANTE", "valorConstate");
        echo "<p style='font-weight:bold'><span style='color: blue'>MICONSTANTE</span>: " . MICONSTANTE . "</p>";
        
        # frase mostrando el type de la constante
        echo "<p style='font-weight:bold'>Tipo de <span style='color: blue'>MICONSTANTE</span>: " . gettype(MICONSTANTE) . "</p>";
        echo "<hr>";

        # frase arreglos
        echo "<h4>Arreglos:</h4>";
        $aPalabra = ["Hola","Hello"];

        # frase con arreglo en posicion 0
        echo "<p style='font-weight:bold'><span style='color: blue'>\$aPalabra</span>: " . $aPalabra[0] . "</p>";

        # frase con arreglo en posicion 1
        echo "<p style='font-weight:bold'><span style='color: blue'>\$aPalabra</span>: " . $aPalabra[1] . "</p>";

        # agrego dos tipos de hola mas
        array_push($aPalabra,"ciao");
        array_push($aPalabra,"olá");

         # frase con type del arreglo
        echo "<p style='font-weight:bold'>Tipo de <span style='color: blue'>\$aPalabra</span>: " . gettype($aPalabra) . "</p>";

        # frase de tres nuesvos elementos agregados
        echo "<p style='font-weight:bold'>Se agregan por programa tres elementos nuevos<p>";

        # frase cabecera de lista
        echo "<h4>Todos los elementos originales y agregados</h4>";

        # lista
        echo "<ul>";
        foreach($aPalabra as $vPalabra)
            echo "<li>" . $vPalabra . "</li>";
        echo "</ul>";


        # frase arreglo con dos dimensiones
        echo "<h4>Arreglo de dos dimensiones (diccionario)</h4>";

        # arreglo de dos dimensiones
        $aLenguajes = ["Español", "Ingles", "Italiano", "Francés",];
        $aDiccionario = [];
        $aEspañol = ["hola", "adiós", "casa"];
        $aIngles = ["hello","goodbye", "house"];
        $aItaliano = ["ciao","addio", "casa"];
        $aFrances = ["salut","adieu", "maison"];
        array_push($aDiccionario, $aEspañol );
        array_push($aDiccionario, $aIngles);
        array_push($aDiccionario, $aItaliano);
        array_push($aDiccionario, $aFrances);
        

        # tabla con el arreglo de dos dimensiones
        echo "<div style='width: 20%'><table style='border: solid 2px; border-collapse: collapse; background-color: violet'><thead><tr><tbody>";
        for($i = 0; $i < 4; $i++ )
            echo "<th style='width: 200px; height: 35px; border: solid 1px'>" . $aLenguajes[$i] . "</th>";

        for($j = 0; $j < 3; $j++ )
        {
            echo "<tr>";
            for ($i = 0; $i < 4; $i++)
                echo "<td style='border: solid 1px'>" . $aDiccionario[$i][$j] . "</th>";
        }
        echo "</tr></thead></tbody></table></div>";

        # frase con valor del diccionario en posición [1][2]
        echo "<p>También se puede expresar el valor de \$aDiccionario[1][2]: " . $aDiccionario[1][2] . "</p>";

        # frase con cantidad de elementos del diccionario
        echo "<p>Cantidad de elementos del diccionario: " . count($aDiccionario) . "</p>";

        # frase arreglo asociativo
        echo "<h2>Variables tipo arreglo asociativo</h2>";
        
        # arreglo asociativo
        $renglonDeProductos = ["codigoArticulo"=>"c0001","descripcionArticulo"=>"Camiseta","precioUnitario"=>20,"cantidad"=>"2"];
        
        # impresion del arreglo asociativo
        echo "<p>";
        echo "Codigo del Artículo: " . $renglonDeProductos['codigoArticulo'] . "</br>" ;
        echo "Descripción del Artículo: " . $renglonDeProductos['descripcionArticulo'] . "</br>" ;
        echo "Precio Unitario: " . $renglonDeProductos['precioUnitario'] . "</br>" ;
        echo "Cantidad: " . $renglonDeProductos['cantidad'];
        echo "</p>";
        
        # impresion de cantidad de elementos y tipo de datos del arreglo
        echo "<p>";
        echo "Cantidad de elementos: " . count($renglonDeProductos) . "</br>";
        echo "Tipo de dato: " . gettype($renglonDeProductos);
        echo "</p>";
        echo "<hr>";

        # frase expresiones aritmeticas
        echo "<h4>Expresiones aritméticas</h4>";

        # declaro variables aritmeticas y asigno valor
        $x = 10;
        $y = 5;

        # impresion valor variable x
        echo "<p style='font-weight:bold'>La variable \$x tiene el siguiente valor: " . $x . "</p>";

        # impresion valor variable y
        echo "<p style='font-weight:bold'>La variable \$y tiene el siguiente valor: " . $y . "</p>";

       # impresion type variable x
        echo "<p style='font-weight:bold'>La variable \$x tiene el siguiente tipo: " . gettype($x) . "</p>";

        # impresion type variable y
        echo "<p style='font-weight:bold'>La variable \$y tiene el siguiente tipo: " . gettype($y) . "</p>";

        # impresion suma
        echo "<p style='font-weight:bold'>Así se imprime una expresión aritmética, por ejemplo de suma: \$x + \$y = " . $x + $y;
        
        # impresion multiplicacion
        echo "<p style='font-weight:bold'>Así se imprime una expresión aritmética, por ejemplo de multiplicación: \$x * \$y = " . $x * $y;
        
        # impresion división
        echo "<p style='font-weight:bold'>Así se imprime una expresión aritmética, por ejemplo de división: \$x / \$y = " . $x / $y;

    ?>
