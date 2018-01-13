<?php
session_start();
if($_SESSION['login'] != 1){
    header('Location: ../../index.php');
    exit();

} else {
    include "../../includes/dbconnect.php";
    $sql = "DELETE FROM cart WHERE id = '{$_GET['id']}'";
    mysqli_query($dblink, $sql);

    header('Location: ../index.php?page=orders');
    exit();
}