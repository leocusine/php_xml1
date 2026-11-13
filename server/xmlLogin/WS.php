<?php

require_once __DIR__ . '/com/clsUser.php';
require_once __DIR__ . '/com/utils/clsServerParams.php';


$action = $_GET["action"];
$dni = $_GET["dni"];
$name = $_GET["name"];
$last_name = $_GET["last_name"];
$age = $_GET["age"];
$password = $_GET["password"];


$sp = new clsServerParams();
$user = new clsUser();


$user->set_dni($dni);
$user->set_name($name);
$user->set_last_name($last_name);
$user->set_age($age);
$user->set_password($password);

if ($action === "register"){

    echo $user->register();
    
} elseif ($action === "login") {

    echo $user->login();

}






// echo $user->register() . "<br>";
// echo $user->get_dni() . "<br>";
// echo $user->get_name() . "<br>";
// echo $user->get_last_name() . "<br>";
// echo $user->get_age() . "<br>";
// echo $user->get_password() . "<br>";


// <?php


//    require_once __DIR__ . 'com/clsUser.php';
//    require_once __DIR__ . 'com/utils/clsServerParams.php';


//    // ? action=register&dni=aureT12&name=aure&last_name=perez&age=30&password=aureliano1234


//    $sp= new clsServerParams();
//    $user= new clsUser();




//    $user->setDni($sp->get('dni'))
//    $user->setName($sp->get('name'))
//    $user->setLast_Name($sp->get('last_name'))
//    $user->setPassword($sp->get('password'))
//    $user->setAge($sp->get('age'))


//    $user->Register();




?>