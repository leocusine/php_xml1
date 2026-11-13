<?php

$products = [
   [
       "id" => 1,
       "name" => "Zapatillas",
       "price" => 90,
       "description" => "Zapatillas de alta competición"
   ],
   [
       "id" => 2,
       "name" => "Plantillas",
       "price" => 120,
       "description" => "Plantillas personalizadas"
   ],
   [
       "id" => 3,
       "name" => "Balón",
       "price" => 40,
       "description" => "Balón Wilson"
   ],
   [
       "id" => 4,
       "name" => "Pantalón",
       "price" => 15,
       "description" => ["Pantalón deportivo",879]
   ],
   [
       "id" => 5,
       "name" => "Camiseta",
       "price" => 25,
       "description" => "Camiseta de entrenamiento"
   ]
];

$xml = new SimpleXMLElement("<products/>");

foreach ($products as $product) {

   $item = $xml->addChild("product");

   foreach ($product as $key => $value) {
       $item->addChild($key, htmlspecialchars((string)$value, ENT_XML1, "UTF-8")
       );
   }
}


header("Content-Type: application/xml; charset=UTF-8");

echo $xml->asXML();

?>