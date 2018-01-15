<?php
// DB und Funktionen includieren, sowie Seiten per PhP zusammenstellen.


session_start();

$page = (!isset($_GET['page'])) ? "home" : $_GET['page'];

include "includes/dbconnect.php";
include "includes/functions.php";


$content = "content/";

if ($page == "home") {
    $content .= "home.php";
} elseif ($page == "detail") {
    $content .= "detail.php";
} elseif ($page == "products") {
    $content .= "products.php";
} elseif ($page == "login") {
    $title = "Login";
    $content .= "login.php";
} elseif ($page == "registrierung") {
    $title = "Registrierung";
    $content .= "registrierung.php";
} elseif ($page == "checkout") {
    $title = "Checkout";
    $content .= "checkout.php";
} elseif ($page == "finish") {
    $title = "FERRTIG";
    $content .= "finish.php";
} elseif ($page == "logout") {
    session_destroy();
    header('Location: index.php');
    exit();
} else {
    $content .= "404.php";
    $title = "404 Error";
}

include "header.php";
include $content;
include "footer.php";
