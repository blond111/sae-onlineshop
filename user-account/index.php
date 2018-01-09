<?php
session_start();

if ($_SESSION['login'] != 1) {
    header('Location: ../index.php?page=login');
    exit();
}

include '../includes/dbconnect.php';
include 'includes/functions.php';

$page = (isset($_GET['page'])) ? $_GET['page'] : "dashboard";

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
