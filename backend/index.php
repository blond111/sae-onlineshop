<?php
session_start();

// DB und Funktionen includieren, sowie Seiten per PhP zusammenstellen und Prüfen ob der Angemeldete eine Berechtigung für diese Seite hat.

include '../includes/dbconnect.php';
include 'includes/function.php';

$page = (isset($_GET['page'])) ? $_GET['page'] : "dashboard";

if (!isset($_SESSION['usergroup']) || $_SESSION['usergroup'] != 1) {
    header('Location: ../index.php?page=login&from=backend&frompage=' . $page);
    exit();
}

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
