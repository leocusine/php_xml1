<?php

require './config.php';

session_start();

$xml = simplexml_load_file("./users.xml");






if (isset($_POST['action'])) {
    if ($_POST['action'] === 'login') {

        $userDni = $_POST['dni'] ?? '';
        $userName = $_POST['name'] ?? '';
        $userLastName = $_POST['last_name'] ?? '';
        $userAge = $_POST['age'] ?? '';
        $userPassword = $_POST['password'] ?? '';

        $existingUser = $xml->xpath("user[dni='{$userDni}']");

        // echo var_dump($existingUser);
        // echo $existingUser[0];

        if (empty($existingUser)) {

            echo "El usuario no existe";
            echo "<a href='./login.php'><button>Volver</button></a>";

        } else {

            $user = $existingUser[0];

            if ($userPassword !== (string)$user->password) { // Igualdad Estricta
                echo "Contraseña incorrecta";
                echo "<a href='./login.php'><button>Volver</button></a>";
            } else {
                    // Creación de la session

                    $_SESSION['dni'] = (string)$user->dni;
                    $_SESSION['name'] = (string)$user->name;
                    $_SESSION['last_name'] = (string)$user->last_name;
                    $_SESSION['age'] = (string)$user->age;


                    // Registro de la session

                    $xmlConnections = simplexml_load_file("./connections.xml");

                    $newConnection = $xmlConnections->addChild("connection");
                    $newConnection->addChild('dni', (string)$user->dni);
                    $newConnection->addChild('login_time', date('Y-m-d H:i:s'));
                    $newConnection->addChild('logout_time', '');
                    $newConnection->addChild('status', 'active');


                    // Guardo el formato
                    xmlFormater($xmlConnections, "./connections.xml");




                    header('location: ./home.php');
                    exit();
            }

        }




        // 1. Validar si el usuario y contraseña coinciden en users.xml
        // 2. Si es correcto: crear sesión y registrar en connections.xml
        // 3. Redirigir a home.php

    } elseif ($_POST['action'] === 'register') {

        $userDni = $_POST['dni'] ?? '';
        $userName = $_POST['name'] ?? '';
        $userLastName = $_POST['last_name'] ?? '';
        $userAge = $_POST['age'] ?? '';
        $userPassword = $_POST['password'] ?? '';

        if (empty($userDni) || empty($userName) || empty($userLastName) || empty($userAge) || empty($userPassword)) {
            echo "Todos los campos deben ser rellenados.";
            echo "<a href='./register.php'><button>Volver</button></a>";
        } else {


            $existingUser = $xml->xpath("user[dni='{$userDni}']");

            if (!empty($existingUser)) {
                echo "El DNI ya está registrado.";
                echo "<a href='./register.php'><button>Volver</button></a>";
            } else {

                

                $newUser = $xml->addChild('user');
                $newUser->addChild('dni', ($_POST['dni'] ?? ''));
                $newUser->addChild('name', ($_POST['name'] ?? ''));
                $newUser->addChild('last_name', ($_POST['last_name'] ?? ''));
                $newUser->addChild('age', ($_POST['age'] ?? ''));
                $newUser->addChild('password', ($_POST['password'] ?? ''));




                $usersRoute = "./users.xml";

                xmlFormater($xml, $usersRoute);

                header('location: ./login.php');
                exit();



            }
            
        

        }
    
    }

}



?>