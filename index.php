<?php

session_start();

//session_destroy();

if (! isset($_SESSION['login'])) {
    $_SESSION['login'] = 0;
}

if (! isset($_SESSION['login_counter'])) {
    $_SESSION['login_counter'] = 0;
}

if (! isset($_SESSION['timeout'])) {
    $_SESSION['timeout'] = false;
}

include "includes/dbconnect.php";
include "includes/functions.php";


$page = (!isset($_GET['page'])) ? "home" : $_GET['page'];

$content = "content/";


if($page == "home") {
    $content .= "home.php";
} elseif($page == "detail") {
    $content .= "detail.php";
} elseif($page == "products") {
    $content .= "products.php";
}elseif ($page == "login"){
    $title = "Login";
    $content .= "login.php";
}elseif ($page == "registrierung"){
    $title = "Registrierung";
    $content .= "registrierung.php";
} elseif ($page == "checkout") {
    $title = "Checkout";
    $content .= "checkout.php";
}elseif ($page == "finish"){
    $title = "FERRTIG";
    $content .= "finish.php";
} elseif($page == "logout") {
    session_destroy();
    header('Location: ../index.php');
    exit();
} else {
    $content .= "404.php";
    $title = "404 Error";
}

include "header.php";
include $content;
include "footer.php";

?>