<?php

// DB und Funktionen includieren, sowie Seiten per PhP zusammenstellen und Prüfen ob der Angemeldete eine Berechtigung für diese Seite hat.

session_start();


include '../includes/dbconnect.php';

$page = (isset($_GET['page'])) ? $_GET['page'] : "account";

if (!isset($_SESSION['usergroup']) || $_SESSION['usergroup'] == -1) {
    header('Location: ../index.php?page=login&from=user-account&frompage=' . $page);
    exit();
}

$content = "content/";

if ($page == "account") {
    $title = "Willkommen";
    $content .= "account.php";
} elseif ($page == "orders") {
    $title = "Bestellungen";
    $content .= "orders.php";
} elseif ($page == "address") {
    $title = "Adresse";
    $content .= "address.php";
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
