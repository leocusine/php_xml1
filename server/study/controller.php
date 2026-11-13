<?php
session_start();

if ($_POST['user'] == "risk" && $_POST['password'] == "123") {
    $_SESSION['name'] = "risk";
    $_SESSION['lastname'] = "ksir";
    header("location: home.php");

} else {
    echo "Los datos no son correctos";
}

?>