<!-- 
- Cockies -> Guarda información en el navegador
- Sesiones -> Guarda la información en el servidor web 
-->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="controller.php" method="post">
        <input type="text" name="user" placeholder="Usuario">
        <br>
        <input type="password" name="password" placeholder="Contraseña">
        <br>
        <button>Iniciar Sesión</button>
        <!-- <input type="submit" value="Iniciar sesión"> -->
    </form>
</body>
</html>