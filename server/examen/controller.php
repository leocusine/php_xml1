<?php


require_once __DIR__ . '/utils/config_funct.php';
require_once __DIR__ . '/utils/user_funct.php';
require_once __DIR__ . '/utils/conn_funct.php';


session_start();


$user_xml = simplexml_load_file("./xml/users.xml");
$conn_xml = simplexml_load_file("./xml/connections.xml");


header("Content-Type: application/xml; charset=UTF-8");


if (isset($_GET['action'])) {


// login ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    switch ($_GET['action']) {


        case 'login':


            $userDni = user_data_get('dni');
            $userPassword = user_data_get('password');


            $existingUser = $user_xml->xpath("user[dni='{$userDni}']");


            // verificamos que el dni es correcto y que el usuario existe
            if (empty($existingUser)) {


                sendXmlError("El usuario no existe o el DNI es incorrecto");


            } else {

            
                $user = $existingUser[0];


                // mensaje de error en caso de contraseña incorrecta 
                if ($userPassword !== (string)$user->password) { 


                    sendXmlError("Contraseña incorrecta");


                } else {


                    create_session($user, $conn_xml);


                }


            }


            break;


// register ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


        case 'register':


            $userDni = user_data_get('dni');
            $userName = user_data_get('name');
            $userLastName = user_data_get('last_name');
            $userAge = user_data_get('age');
            $userPassword = user_data_get('password');


            // verificar que todos los campos contienen infomracion
            if (empty($userDni) || empty($userName) || empty($userLastName) || empty($userAge) || empty($userPassword)) {


                sendXmlError("Todos los campos deben ser rellenados");


            } else {


                $existingUser = $user_xml->xpath("user[dni='{$userDni}']");


                // verificar que el usuario no esxistia previamente 
                if (!empty($existingUser)) {


                    sendXmlError("El usuario ya existe");


                } else {


                    handle_register($userDni, $userName, $userLastName, $userAge, $userPassword, $user_xml);


                }


            }


            break;


// logout ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


        case 'logout':


            handle_logout($conn_xml);


            xmlFormater($conn_xml, "./xml/connections.xml");


            session_destroy();

            
            break;


// imprimir todos los usuarios ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


        case 'users':


            echo $user_xml->asXML();


            break;


// ver conexiones ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


        case 'conn':
            

            show_conn($conn_xml, false); 


            break;


// ver conexiones expiradas ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


        case 'exconn':


            show_conn($conn_xml, true); 

            
            break;


// accion no encontrada ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


        default:


            sendXmlError("Accion no encontrada");


    }
    

}
     

?>