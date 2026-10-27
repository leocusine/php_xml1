<?php
header("Content-Type: application/xml; charset=UTF-8");

$read = file_get_contents("pizza.xml");
$xml = new SimpleXMLElement($read);

echo $xml->asXML();