<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="./controller.php" method="post">
        <input type="hidden" name="action" value="login">
        <input type="text" name="dni" placeholder="Dni">
        <br>
        <input type="password" name="password" placeholder="Contraseña">
        <br>
        <button>Iniciar Sesión</button>            
    </form>
    <a href="index.php"><button>Atrás</button></a>  
</body>
</html>