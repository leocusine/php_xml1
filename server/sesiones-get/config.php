<?php
date_default_timezone_set('Europe/Madrid');


function xmlFormater($xmlData, $route) {

    $dom = new DOMDocument('1.0', 'UTF-8');
    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;
    $dom->loadXML($xmlData->asXML());
    $dom->save($route);

}

function calcularTiempoTotal($dniUsuario, $rutaXml) {
    $xmlConnections = simplexml_load_file($rutaXml);
    $totalSegundos = 0;

    foreach ($xmlConnections->connection as $conn) {
        if ((string)$conn->dni === $dniUsuario && (string)$conn->status === 'expired') {
            $loginTime = strtotime($conn->login_time);
            $logoutTime = strtotime($conn->logout_time);
            $totalSegundos += ($logoutTime - $loginTime);

            $horas = floor($totalSegundos / 3600);
            $minutos = floor(($totalSegundos % 3600) / 60);
            $segundos = ($totalSegundos / 60);
            return "{$segundos}";

        }
    }
}

function new_conn_id($rutaXml) {
    $xmlConnections = simplexml_load_file($rutaXml);
    $i = 0;

    foreach ($xmlConnections->connection as $conn) {
    $i += 1;
    }

    return $i + 1;
}

echo new_conn_id("./connections.xml");

?>