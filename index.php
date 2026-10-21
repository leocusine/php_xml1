<?php
header("Content-Type: application/xml; charset=UTF-8");

$xml = file_get_contents("info.xml");
$exit = new SimpleXMLElement($xml);

echo $exit->asXML();
?>