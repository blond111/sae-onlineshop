<?php
session_start();

if ($_SESSION['login'] != 1 /* | $_SESSION['usergroup'] != 1*/) {
    header('Location: ../index.php?page=login');
    exit();
}


include '../includes/dbconnect.php';
include 'includes/function.php';

$page = (isset($_GET['page'])) ? $_GET['page'] : "dashboard";

$content = "content/";

if ($page == "dashboard") {
    $title = "Willkommen im Dashboard";
    $content .= "dashboard.php";
} elseif ($page == "users") {
    $title = "Uservewaltung";
    $content .= "users.php";
} elseif ($page == "product") {
    $title = "Produktverwaltung";
    $content .= "product.php";
} elseif ($page == "orders") {
    $title = "Bestellungen";
    $content .= "orders.php";
} elseif($page == "logout") {
    session_destroy();
    header('Location: ../index.php');
    exit();
} else {
    $content .= "404.php";
    $title = "404 Error";
}

require 'header.php';
require $content;
require 'footer.php';
