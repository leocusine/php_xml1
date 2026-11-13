<?php


date_default_timezone_set('Europe/Madrid');


// funcion para formatear resultados xml
function xmlFormater($xmlData, $route) {


    $dom = new DOMDocument('1.0', 'UTF-8');
    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;
    $dom->loadXML($xmlData->asXML());
    $dom->save($route);


}


// funcion para emitir mensajes de error
function sendXmlError($message) {


    $xml = new SimpleXMLElement('<errorMessage/>');


    $xml[0] = $message;

    
    echo $xml->asXML();


}


// funcion para pedir datos
function user_data_get($data) {


    switch ($data) {


        case 'dni':


            $userDni = $_GET['dni'] ?? '';


            return $userDni;


        case 'name':
            

            $userName = $_GET['name'] ?? '';


            return $userName;


        case 'last_name':
            

            $userLastName = $_GET['last_name'] ?? '';


            return $userLastName;


        case 'age':
            

            $userAge = $_GET['age'] ?? '';


            return $userAge;


        case 'password':
            

            $userPassword = $_GET['password'] ?? '';


            return $userPassword;


    }


}


?>