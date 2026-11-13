<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>BIENVENIDO</h1>
    <h2>Datos del usuario:</h2>
    <ul>
        <li>DNI: <?= $_SESSION['dni']?></li>
        <li>Nombre: <?= $_SESSION['name']?></li>
        <li>Apellido: <?= $_SESSION['last_name']?></li>
        <li>Edad: <?= $_SESSION['age']?></li>
    </ul>
    <a href="./logout.php">Cerrar sesión</a>
</body>
</html>