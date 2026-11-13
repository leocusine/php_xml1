<?php


require_once __DIR__ . '/config_funct.php';


date_default_timezone_set('Europe/Madrid');


// funcion para administrar el logout
function handle_logout($conn_xml) {


    $dni = $_SESSION['dni'] ?? '';


    $activeConnection = $conn_xml->xpath("connection[dni='{$dni}' and status='active']");


    if (!empty($activeConnection)) {


        $current = $activeConnection[0];
        $current->logout_time = date('Y-m-d H:i:s');
        $current->status = "expired";


    } else {


        sendXmlError("El usuario no existe o la session ha finalizado");


    }


}


// funcion para administrar el registro de un usuario
function handle_register($userDni, $userName, $userLastName, $userAge, $userPassword, $user_xml) {


    $newUser = $user_xml->addChild('user');
    $newUser->addChild('dni', $userDni);
    $newUser->addChild('name', $userName);
    $newUser->addChild('last_name', $userLastName);
    $newUser->addChild('age', $userAge);
    $newUser->addChild('password', $userPassword);


    xmlFormater($user_xml, "xml/users.xml");


    $select = new SimpleXMLElement('<newUserCreated/>');


    $select->addChild('dni',$newUser->dni);
    $select->addChild('name',$newUser->name);
    $select->addChild('last_name',$newUser->last_name);
    $select->addChild('age',$newUser->age);
    $select->addChild('password',$newUser->password);


    echo $select->asXML();


}

    
// funcion para la creación de la sesión
function create_session($user, $conn_xml) {


    // creación de la sesión
    $_SESSION['dni'] = (string)$user->dni;
    $_SESSION['name'] = (string)$user->name;
    $_SESSION['last_name'] = (string)$user->last_name;


    // registro de la sesión
    $new_id = new_conn_id("./xml/connections.xml");


    $newConnection = $conn_xml->addChild("connection");
    $newConnection->addAttribute('id', $new_id);
    $newConnection->addChild('dni', (string)$user->dni);
    $newConnection->addChild('login_time', date('Y-m-d H:i:s'));
    $newConnection->addChild('logout_time', '');
    $newConnection->addChild('status', 'active');


    xmlFormater($conn_xml, "./xml/connections.xml");


    $select = new SimpleXMLElement('<user/>');


    $select->addChild('dni',$user->dni);
    $select->addChild('name',$user->name);
    $select->addChild('last_name',$user->last_name);
    $select->addChild('age',$user->age);
    $select->addChild('password',$user->password);


    echo $select->asXML();


}


?>