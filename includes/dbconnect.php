<?php

$dblink = mysqli_connect("localhost", "root", "ZwRTF4547Y%*gZgauVD!3Go0H3&g6FFGEDewZNxHbH%byIai", "onlineshop");
mysqli_query($dblink, "SET names UTF8");

if (!$dblink) {
    die('Nicht korrekt!');
}
