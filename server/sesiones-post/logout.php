<?php
require './config.php';
session_start();



$xmlConnections = simplexml_load_file("./connections.xml");
$dni = $_SESSION['dni'] ?? '';

$activeConnection = $xmlConnections->xpath("connection[dni='{$dni}' and status='active']");


if (!empty($activeConnection)) {

    $current = $activeConnection[0];
    $current->logout_time = date('Y-m-d H:i:s');
    $current->status = "expired";

    xmlFormater($xmlConnections, "./connections.xml");
    // $xmlConnections->asXML("./connections.xml");
}


// header("Location: index.php");
// header("Location: home.php");
session_destroy();
header("Location: ./login.php");
exit();
?>