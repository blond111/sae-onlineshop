<?php
// Wenn du nicht eingeloggt bist dann gehe zu index.php.

session_start();
if($_SESSION['login'] != 1){
    header('Location: ../../index.php');
    exit();

} else {
    // Löschen eines Users in der Tabelle users, dort wo die id der Tabelle der "Get id" entspricht.

    include "../../includes/dbconnect.php";
    $sql = "DELETE FROM users WHERE id = '{$_GET['id']}'";
    mysqli_query($dblink, $sql);

    header('Location: ../index.php?page=users');
    exit();
}