<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form action="./controller.php" method="post">
        <input type="hidden" name="action" value="register">
        <input type="text" name="dni" placeholder="Dni">
        <br>
        <input type="text" name="name" placeholder="Nombre">
        <br>
        <input type="text" name="last_name" placeholder="Apellido">
        <br>
        <input type="text" name="age" placeholder="Edad">
        <br>
        <input type="password" name="password" placeholder="Contraseña">
        <br>
        <button>Registrar Usuario</button>
        
    </form>
    <a href="index.php"><button>Atrás</button></a>
</body>
</html>