<?php
header("Content-Type: application/xml; charset=UTF-8");

// $read = file_get_contents("xml/rml.xml");
// $xml = new SimpleXMLElement($read);
$xml = simplexml_load_file("xml/rml.xml");
// $result = $xml->xpath('//mode[1]/title | //mode[2]/title');

// $message = new SimpleXMLElement('<message/>');

// foreach ($result as $title) {
//     $message->addChild(
//         'title',
//         htmlspecialchars((string)$title, ENT_XML1, 'UTF-8')
//     );
// }

// echo $message->asXML();

// echo $xml->mode[9]->asXML();

// añadir
// $newmode = $xml->addChild('mode');
// $newmode->addChild('game','Geometry Dash');
// $newmode->addChild('title','Cataclysm 100%');

// modificar
// $xml->mode[1]->game = 'sdfsdsdg';

// guardar xml
// $dom = new DOMDocument('1.0'); // DOMDocument es una clase de PHP para leer, crear y modificar documentos XML y HTML
// $dom->formatOutput = true; // Añade sangrías y saltos de línea para que el XML sea más fácil de leer.
// $dom->loadXML($xml->asXML()); // Cargar el XML en el documento DOM
// $dom->save('update_xml.xml'); // Guardar el XML en un archivo

// ejercicios

// 1 Utiliza xpath() para seleccionar los modos cuyo juego sea Sister Location Super Custom Night.

// $result = $xml->xpath('//mode[game="Sister Location Super Custom Night"]/title');
// $select = new SimpleXMLElement('<select/>');

// foreach ($result as $title) {
//     $select->addChild(
//         'mode',
//         htmlspecialchars((string)$title, ENT_XML1, 'UTF-8')
//     );
// }

// echo $select->asXML();

// 2 Utiliza xpath() para seleccionar los nodos de un modo. x

// $result = $xml->xpath('//mode/title');
// $select = new SimpleXMLElement('<select/>');

// foreach ($result as $title) {
//     $select->addChild(
//         'mode',
//         htmlspecialchars((string)$title, ENT_XML1, 'UTF-8')
//     );
// }

// echo $select->asXML();

// 3 Cambia las horas del primer modo.

// $xml->mode[0]->stats->hours = '45';
// echo $xml->asXML();

// 4 Cambia las horas del primer modo y guardalo en maquina.

// $xml->mode[0]->stats->hours = '45';
// echo $xml->asXML();

// $dom = new DOMDocument('1.0');
// $dom->formatOutput = true;
// $dom->loadXML($xml->asXML());
// $dom->save('update_xml.xml');

// 5 Mostrar los titulos de los modos con xpath.

// $result = $xml->xpath('//mode/title');
// $select = new SimpleXMLElement('<select/>');

// foreach ($result as $title) {
//     $select->addChild(
//         'mode',
//         htmlspecialchars((string)$title, ENT_XML1, 'UTF-8')
//     );
// }

// echo $select->asXML();

// 6 Modificar archivo xml sobreescribiendo el xml existente.

// $xml->mode[1]["rank"] = '5';

// echo $xml->asXML();

// $dom = new DOMDocument('1.0');
// $dom->formatOutput = true;
// $dom->loadXML($xml->asXML());
// $dom->save('xml/rml.xml');

// 7 Creacion de un nodo entero.

// $newmode = $xml->addChild('mode');
// $newmode->addAttribute('rank','11');
// $newmode->addChild('game','Geometry Dash');
// $newmode->addChild('title','Cataclysm 100%');
// $newmode->addChild('image','img/hp.jpg');
// $newmodestats = $newmode->addChild('stats');
// $newmodestats->addChild('hours','~20');
// $newmodestats->addChild('attempts','+10000');
// $newmode->addChild('description','Very hard extreme demon level.');
// $newmodetags = $newmode->addChild('tags');
// $newmodetags->addChild('tag','strategy');
// $newmodetags->addChild('tag','speed');
// $newmodetags->addChild('tag','keyboard');

// echo $xml->asXML();

// 8 Selecciona el segundo tag del tercer modo.

// $result = $xml->xpath('//mode[3]/tags/tag[2]');

// echo $result[0]->asXML();

// 9 Guardar un modo en un archivo.

// $result = $xml->xpath('//mode[6]');

// $dom = new DOMDocument('1.0');
// $dom->formatOutput = true;
// $dom->loadXML($result[0]->asXML());
// $dom->save('xml/fgvhm.xml');

echo $xml[0]->asXML();