<?php
session_start();

if ($_POST['user'] == "risk" && $_POST['password'] == "123") {
    $_SESSION['name'] = "asdgsg";
    $_SESSION['lastname'] = "sdgsg sdg";
    header("location: home.php");

} else {
    echo "Los datos no son correctos";
}

?>