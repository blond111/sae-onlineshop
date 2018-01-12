<?php

//ADRESSVERWALTUNG

if (isset($_POST['update-address'])) {
    $fname = mysqli_real_escape_string($dblink, $_POST['firstname']);
    $lname = mysqli_real_escape_string($dblink, $_POST['lastname']);
    $email = mysqli_real_escape_string($dblink, $_POST['email']);
    $street = mysqli_real_escape_string($dblink, $_POST['street']);
    $door = mysqli_real_escape_string($dblink, $_POST['door']);
    $plz = mysqli_real_escape_string($dblink, $_POST['plz']);
    $ort = mysqli_real_escape_string($dblink, $_POST['ort']);

    $sql = "UPDATE users SET fname = '$fname', lname = '$lname', email = '$email', street = '$street', door = '$door', plz = '$plz', ort = '$ort' WHERE id = '{$_SESSION['uid']}'";

    mysqli_query($dblink, $sql);

    if (isset($_GET['frompage'])) {
        header('Location: ../' . ((isset($_GET['from'])) ? ($_GET['from'] . '/') : '') . 'index.php?page=' . $_GET['frompage']);
        exit();
    }

    else {
        header('Location: index.php?page=address');
        exit();
    }
}

?>