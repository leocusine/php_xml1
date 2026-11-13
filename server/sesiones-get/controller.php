<?php

require './config.php';

session_start();

$xml = simplexml_load_file("./users.xml");

if (isset($_GET['action'])) {
    if ($_GET['action'] === 'login') {

        $userDni = $_GET['dni'] ?? '';
        // $userName = $_GET['name'] ?? '';
        // $userLastName = $_GET['last_name'] ?? '';
        // $userAge = $_GET['age'] ?? '';
        $userPassword = $_GET['password'] ?? '';

        $existingUser = $xml->xpath("user[dni='{$userDni}']");

        if (empty($existingUser)) {
            echo "El usuario no existe";
            echo "<a href='./login.php'><button>Volver</button></a>";
        } else {
            $user = $existingUser[0];

            if ($userPassword !== (string)$user->password) { 
                echo "Contraseña incorrecta";
                echo "<a href='./login.php'><button>Volver</button></a>";
            } else {
                // Creación de la sesión
                $_SESSION['dni'] = (string)$user->dni;
                $_SESSION['name'] = (string)$user->name;
                $_SESSION['last_name'] = (string)$user->last_name;

                // Registro de la sesión
                $xmlConnections = simplexml_load_file("./connections.xml");
                $new_id = new_conn_id("./connections.xml");

                $newConnection = $xmlConnections->addChild("connection");
                $newConnection->addAttribute('id', $new_id);
                $newConnection->addChild('dni', (string)$user->dni);
                $newConnection->addChild('login_time', date('Y-m-d H:i:s'));
                $newConnection->addChild('logout_time', '');
                $newConnection->addChild('total_loged_time', '');
                $newConnection->addChild('status', 'active');

                xmlFormater($xmlConnections, "./connections.xml");

                echo "registrado usuario " . $_SESSION['name'];

                // header('location: ./home.php');
                // exit();
            }
        }

    } elseif ($_GET['action'] === 'register') {

        $userDni = $_GET['dni'] ?? '';
        $userName = $_GET['name'] ?? '';
        $userLastName = $_GET['last_name'] ?? '';
        $userAge = $_GET['age'] ?? '';
        $userPassword = $_GET['password'] ?? '';

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
                $newUser->addChild('dni', ($_GET['dni'] ?? ''));
                $newUser->addChild('name', ($_GET['name'] ?? ''));
                $newUser->addChild('last_name', ($_GET['last_name'] ?? ''));
                $newUser->addChild('age', ($_GET['age'] ?? ''));
                $newUser->addChild('password', ($_GET['password'] ?? ''));

                $usersRoute = "./users.xml";
                xmlFormater($xml, $usersRoute);

                // header('location: ./login.php');
                // exit();
            }
        }
    }

    elseif ($_GET['action'] === 'logout') {
        $xmlConnections = simplexml_load_file("./connections.xml");
        $dni = $_SESSION['dni'] ?? '';

        $activeConnection = $xmlConnections->xpath("connection[dni='{$dni}' and status='active']");

        if (!empty($activeConnection)) {


            $current = $activeConnection[0];
            $current->logout_time = date('Y-m-d H:i:s');
            // $current->total_loged_time = floor($tiempo_sesion);
            $current->status = "expired";

            $tiempo_sesion = calcularTiempoTotal($dni, "./connections.xml");
            echo $tiempo_sesion;


            xmlFormater($xmlConnections, "./connections.xml");
            // $xmlConnections->asXML("./connections.xml");
        }


        // header("Location: index.php");
        // header("Location: home.php");
        session_destroy();

    }
}
?>