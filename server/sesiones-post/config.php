<?php
date_default_timezone_set('Europe/Madrid');


function xmlFormater($xmlData, $route) {

    $dom = new DOMDocument('1.0', 'UTF-8');
    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;
    $dom->loadXML($xmlData->asXML());
    $dom->save($route);

}


// Mi ejemplo: NO IUMPLEMENTAR

// function loginTime($userDni, $routeXml) {

//     $xmlConnections = simplexml_load_file($routeXml);
//     $secTotal = 0;

//     foreach ($xmlConnections->connection as $conn) {
//         // if ((string)$con->dni)
//         echo $xmlConnections;

//     }


// }


// Alternativa: Ejemplo de calcular Tiempo: NO IMPLEMENTAR -> FALTA REVISIÓN

// function calcularTiempoTotal($dniUsuario, $rutaXml) {
//     $xmlConnections = simplexml_load_file($rutaXml);
//     $totalSegundos = 0;

//     foreach ($xmlConnections->connection as $conn) {
//         if ((string)$conn->dni === $dniUsuario && (string)$conn->status === 'expired') {
//             $loginTime = strtotime((string)$conn->login_time);
//             $logoutTime = strtotime((string)$conn->logout_time);
//             $totalSegundos += ($logoutTime - $loginTime);
//         }
//     }
//     $horas = floor($totalSegundos / 3600);
//     $minutos = floor(($totalSegundos % 3600) / 60);
//     return "{$horas} horas y {$minutos} minutos";
// }


?>