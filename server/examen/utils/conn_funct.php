<?php


require_once  __DIR__ . '/config_funct.php';
require_once  __DIR__ . '/user_funct.php';


date_default_timezone_set('Europe/Madrid');


// funcion para autoañadir el id de una conexion, similar al identity
function new_conn_id($rutaXml) {


    $xmlConnections = simplexml_load_file($rutaXml);


    $maxId = 0;


    foreach ($xmlConnections->connection as $conn) {


        $id = (int)$conn['id'];


        if ($id > $maxId) {


            $maxId = $id;

            
        }
    
        
    }


    return $maxId + 1;


}


// funcion para mostrar las conexiones
function show_conn($conn_xml, $expired) {


    if ($expired === true) {


        $result = $conn_xml->xpath('//connection[status="expired"]');


    } else {


        $result = $conn_xml->xpath('//connection');


    }


    $select = new SimpleXMLElement('<select/>');

    
    foreach ($result as $connection) {


        $expired_connection = $select->addChild('expired_connection');


        $expired_connection->addAttribute('id',$connection['id']);
        $expired_connection->addChild('dni',$connection->dni);
        $expired_connection->addChild('login_time',$connection->login_time);
        $expired_connection->addChild('logout_time',$connection->logout_time);
        $expired_connection->addChild('status',$connection->status);


    }


    echo $select->asXML();


}


?>