<?php 
session_start();
// Lo siguiente es para mostrar los errores
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <h1>DATOS DEL USUARIO: <?= $_SESSION['name'] . " " . $_SESSION['lastname'] ?></h1>
    <a href="./logout.php">Cerrar sesión</a>
</body>
</html>