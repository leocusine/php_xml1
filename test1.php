<?php
header("Content-Type: application/xml; charset=UTF-8");

libxml_use_internal_errors(true);

$xml = simplexml_load_file("info.xml");

if ($xml === false) {
    echo "No se ha podido cargar el XML.";

    foreach (libxml_get_errors() as $error) {
        echo htmlspecialchars($error->message);
    }

    libxml_clear_errors();
    exit;
}

// imprime el titulo del primer libro
// echo $xml->libro[0]->titulo . "<br>" . "<hr>";

// imprime la informacion de todos los libros con un bucle
// foreach ($xml->libro as $libro) {
//     echo $libro->titulo . "<br>";
//     echo $libro->autor . "<br>";
//     echo $libro->precio . " euros<br>";
//     echo "<hr>";
// }

// imprime el segundo libro y su precio
// echo $xml->libro[1]->titulo . ", " . $xml->libro[1]->precio . " euros";

// accede al id del libro
// echo $xml->libro[0]['id'];

// cargar xml desde un string
// $texto = '
// <usuario>
//     <nombre>Ana</nombre>
//     <edad>20</edad>
// </usuario>
// ';
// $xml = simplexml_load_string($texto);
// echo $xml->nombre;
// echo $xml->edad;

// ejercicio de foreach
// foreach ($xml->producto as $producto) {
//     echo $producto->nombre . "<br>";
//     echo $producto->precio . "<br>";
//     echo $producto["id"] . "<br>";
//     echo "<hr>";
// }

// recorre el xml para encontrar el producto con id = 3
// foreach ($xml->producto as $producto) {
//     if ((int) $producto['id'] === 3) {
//         echo $producto->nombre;
//         echo " = ";
//         echo $producto->precio;
//         echo " euros";
//     }
// }

// ejercicio de seleccionar productos que cuestan menos de 30 euros
// foreach ($xml->producto as $producto) {
//     if ($producto->precio <= 30) {
//         echo $producto->nombre;
//         echo " = ";
//         echo $producto->precio;
//         echo " euros" . "<br>";
//     }
// }

// lo mismo que antes pero con xpath
// $resultados = $xml->xpath(
//     'producto[precio >= 30]'
// );

// foreach ($resultados as $producto) {
//     echo $producto->nombre . "<br>";
// }

/////////////////////////////////////////////////

$t_xml = file_get_contents("info.xml");

$exit = new SimpleXMLElement($t_xml);

// echo $exit->asXML();

$result = $exit->xpath('//producto[@id="2"]/nombre');

// echo $result[0]->asXML();

$mesage=<<<XML
       <message>
           {$result[0]}
       </message>
   XML;

$r = new SimpleXMLElement($mesage);

echo $r->asXML();