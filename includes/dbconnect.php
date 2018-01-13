<?php

$dblink = mysqli_connect("localhost", "root", "", "onlineshop");
mysqli_query($dblink, "SET names UTF8");

if(!$dblink){
    die('Nicht korrekt!');
}

?>