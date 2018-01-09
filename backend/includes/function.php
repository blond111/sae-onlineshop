<?php

//Produktverwaltung

if (isset($_POST['insert-prod'])) {

    $prod_title = mysqli_real_escape_string($dblink, $_POST['prodtitle']);
    $prod_content = mysqli_real_escape_string($dblink, $_POST['prodcontent']);
    $prod_price = mysqli_real_escape_string($dblink, $_POST['prodprice']);
    $created_at = time();
    $user_id = $_SESSION['uid'];

    $prod_img = "uploads/" . $_FILES['prodimg']['name'];

    move_uploaded_file($_FILES['prodimg']['tmp_name'], "../" . $prod_img);

    $sql = "INSERT INTO products (prodName, prodBeschreibung,prodPreis, prodBild, user_id, prodDatum)
            VALUES ('$prod_title', '$prod_content', '$prod_price', '$prod_img', '$user_id', '$created_at')";

    mysqli_query($dblink, $sql);

    header('Location: index.php?page=product');
    exit();
}

if (isset($_POST['update-prod'])) {
    $prod_title = mysqli_real_escape_string($dblink, $_POST['prodtitle']);
    $prod_content = mysqli_real_escape_string($dblink, $_POST['prodcontent']);
    $prod_price = mysqli_real_escape_string($dblink, $_POST['prodprice']);

    $prod_img = "uploads/" . $_FILES['prodimg']['name'];

    move_uploaded_file($_FILES['prodimg']['tmp_name'], "../" . $prod_img);

    $sql = "UPDATE products SET prodName = '$prod_title', prodBeschreibung = '$prod_content', prodPreis = '$prod_price', prodBild = '$prod_img' WHERE id = '{$_GET['id']}'";

    mysqli_query($dblink, $sql);

    header('Location: index.php?page=product');
    exit();


}



//USERVERWALTUNG

if (isset($_POST['insert-users'])) {

    $fname = mysqli_real_escape_string($dblink, $_POST['firstname']);
    $lname = mysqli_real_escape_string($dblink, $_POST['lastname']);
    $email = mysqli_real_escape_string($dblink, $_POST['email']);
    $street = mysqli_real_escape_string($dblink, $_POST['street']);
    $door = mysqli_real_escape_string($dblink, $_POST['door']);
    $plz = mysqli_real_escape_string($dblink, $_POST['plz']);
    $ort = mysqli_real_escape_string($dblink, $_POST['ort']);
    $username = mysqli_real_escape_string($dblink, $_POST['user']);
    $password = mysqli_real_escape_string($dblink, $_POST['password-one']);

    $sql = "INSERT INTO users (fname, lname, email, street, door, plz, ort, username, password) 
                VALUES ('$fname', '$lname', '$email', '$street', '$door', '$plz', '$ort', '$username', '$password')";

    mysqli_query($dblink, $sql);

    header('Location: index.php?page=users');
    exit();
}

if (isset($_POST['update-users'])) {

    $fname = mysqli_real_escape_string($dblink, $_POST['firstname']);
    $lname = mysqli_real_escape_string($dblink, $_POST['lastname']);
    $email = mysqli_real_escape_string($dblink, $_POST['email']);
    $street = mysqli_real_escape_string($dblink, $_POST['street']);
    $door = mysqli_real_escape_string($dblink, $_POST['door']);
    $plz = mysqli_real_escape_string($dblink, $_POST['plz']);
    $ort = mysqli_real_escape_string($dblink, $_POST['ort']);
    $username = mysqli_real_escape_string($dblink, $_POST['user']);
    $password = mysqli_real_escape_string($dblink, $_POST['password-one']);

    $sql = "UPDATE users SET fname = '$fname', lname = '$lname', email = '$email', street = '$street', door = '$door', plz = '$plz', ort = '$ort', username = '$username', password = '$password' WHERE id = '{$_GET['id']}'";

    mysqli_query($dblink, $sql);

    header('Location: index.php?page=users');
    exit();


}



?>