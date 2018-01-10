<?php
$error = false;
$error_msg = array();

// Nur eine Pseude-security: Nicht production ready, da Sessions jederzeit neu gestartet werden können (z.B.Brute Force-Attacke)
if ($_SESSION['login_counter'] >= 3) {
    if (($_SESSION['timeout'] + 60) < time()) {
        $_SESSION['login_counter'] = 0;
    }
}


if (isset($_POST['do-login'])) {
    $sql = "SELECT id, username, password, usergroup FROM users WHERE username = '{$_POST['username']}'";
    $res = mysqli_query($dblink, $sql);

    if (mysqli_num_rows($res) == 1 ) {
        $user = mysqli_fetch_assoc($res);

        $pw_hash = explode(":", $user['password']);

        if ($pw_hash[0] == sha1($_POST['password'] . $pw_hash[1])) {

            $_SESSION['login'] = 1;
            $_SESSION['uname'] = $user['username'];
            $_SESSION['uid'] = $user['id'];

            // Ergänzen von Username im Cart wenn man sich im nachhinein anmedlet!
            if (isset($_SESSION['cart_id'])) {
                $thisUser = $user['id'];
                $thisCartId = $_SESSION['cart_id'];
                $sql = "UPDATE cart SET user_id = '$thisUser' WHERE id = '$thisCartId'";
                $res = mysqli_query($dblink, $sql);
            }


            if ($user['usergroup'] == 1) {

                header('Location: backend/index.php?page=dashboard');
                exit();
            } else {

                header('Location: user-account/index.php?page=account');
                exit();
            }


        } else {
            // Fehler - Passwort falsch
            $error = true;
            array_push($error_msg, "Die Eingaben sind fehlerhaft");
            $_SESSION['login_counter']++;
        }

    } else {
        // Fehler - Username nicht gefunden
        $error = true;
        array_push($error_msg, "Die Eingaben sind fehlerhaft");
        $_SESSION['login_counter']++;
    }

    if ($_SESSION['login_counter'] >= 3) {
        $_SESSION['timeout'] = time();
    }
}




if (isset($_POST['update-cart'])) {


    $cartId = $_SESSION['cart_id'];
    $prodId = mysqli_real_escape_string($dblink, $_POST['prodId']);

    // Suche Produktpreis
    $sql = "SELECT prodPreis FROM products WHERE id = '$prodId'";
    $res = mysqli_query($dblink, $sql);
    while($row = mysqli_fetch_assoc($res)){
        $prodPriceNow = $row['prodPreis'];
    }

    // Ist dieses Produkt schon in meinem Warenkorb?
    $sql = "SELECT id, qty FROM cartitems WHERE cart_id = '$cartId' AND prod_id = '$prodId'";
    $res = mysqli_query($dblink, $sql);

    var_dump($res);

    while($row = mysqli_fetch_assoc($res)){
        // Wenn es das Produkt schon im Warenkorb gibt
        if (isset($row['id'])) {
            echo('produkt im warenkorb!');
            $cartitems_id = $row['id'];
            $qty = $row['qty'] + 1;
            $sql = "UPDATE cartitems SET qty = '$qty', prodPriceNow = '$prodPriceNow' WHERE id = '$cartitems_id'";
            mysqli_query($dblink, $sql);
        }
        echo('alles okay, update gemacht!');
        exit();
    }
            
    // $qty = '1';
    // $sql = "INSERT INTO cartitems (cart_id, prod_id, qty, prodPriceNow) VALUES ('$cartId', '$prodId', '$qty', '$prodPriceNow')";
    // echo('KEIN produkt im warenkorb :/');

    // mysqli_query($dblink, $sql);

    // exit();

    // $qty = mysqli_real_escape_string($dblink, $_POST['qty']);
    // $prodPriceNow = '99';

    // $sql = "INSERT INTO cartitems (cart_id, prod_id, qty, prodPriceNow) VALUES ('$cartId', '$prodId', '$qty', '$prodPriceNow')";
    // mysqli_query($dblink, $sql);
}
