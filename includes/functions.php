<?php
$error = false;
$error_msg = array();

if (! isset($_SESSION['login'])) {
    $_SESSION['login'] = 0;
}

if (! isset($_SESSION['login_counter'])) {
    $_SESSION['login_counter'] = 0;
}

if (! isset($_SESSION['timeout'])) {
    $_SESSION['timeout'] = false;
}

// Login Counter: Nur eine Pseude-security: Nicht production ready, da Sessions jederzeit neu gestartet werden können (z.B.Brute Force-Attacke)
if ($_SESSION['login_counter'] >= 3) {
    if (($_SESSION['timeout'] + 60) < time()) {
        $_SESSION['login_counter'] = 0;
    }
}


// Zu welcher Usergroup gehöre ich? 1: Admin, 0: User, -1 = Besucher
if (isset($_SESSION['usergroup'])) {
    $myusergroup = $_SESSION['usergroup'];
} else {
    $myusergroup = -1;
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
            $_SESSION['usergroup'] = $user['usergroup'];

            // Ergänzen von Username im Cart wenn man sich im nachhinein anmedlet!
            if (isset($_SESSION['cart_id'])) {
                $thisUser = $user['id'];
                $thisCartId = $_SESSION['cart_id'];
                $sql = "UPDATE cart SET user_id = '$thisUser' WHERE id = '$thisCartId'";
                $res = mysqli_query($dblink, $sql);
            }

            if (isset($_GET['frompage'])) {
                header('Location: ' . ((isset($_GET['from'])) ? ($_GET['from'] . '/') : '') . 'index.php?page=' . $_GET['frompage']);
                exit();
            }

            elseif ($user['usergroup'] == 1) {
                header('Location: backend/index.php?page=dashboard');
                exit();
            } 
            
            else {
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

    while($row = mysqli_fetch_assoc($res)){
            $cartitems_id = $row['id'];

            // Hinzufügen oder abziehen?
            if (isset($_POST['minus'])) {

                // Wenn abziehen: Letztes Produkt?
                if ($row['qty'] <= 1) {
                    $sql = "DELETE FROM cartitems WHERE id = '$cartitems_id'";
                    mysqli_query($dblink, $sql);

                    header('Location: index.php?page=products&cart=open');
                    exit();
                }

                $qty = $row['qty'] - 1;
            } else {
                $qty = $row['qty'] + 1;
            }

            $sql = "UPDATE cartitems SET qty = '$qty', prodPriceNow = '$prodPriceNow' WHERE id = '$cartitems_id'";
            mysqli_query($dblink, $sql);

            header('Location: index.php?page=products&cart=open');
            exit();
    }

    // Wenn es noch nicht im Warenkorb ist...
    $qty = '1';
    $sql = "INSERT INTO cartitems (cart_id, prod_id, qty, prodPriceNow) VALUES ('$cartId', '$prodId', '$qty', '$prodPriceNow')";
    mysqli_query($dblink, $sql);

    header('Location: index.php?page=products&cart=open');
    exit();
}




















// /////babsi shit 


// if (isset($_POST['minus-cartitem'])) {

//     $cartId = $_SESSION['cart_id'];
//     $prodId = mysqli_real_escape_string($dblink, $_POST['prodId']);

//     // Ist dieses Produkt schon in meinem Warenkorb?
//     $sql = "SELECT id, qty FROM cartitems WHERE cart_id = '$cartId' AND prod_id = '$prodId'";
//     $res = mysqli_query($dblink, $sql);

//     while($row = mysqli_fetch_assoc($res)){
//             echo('produkt im warenkorb!');
//             $cartitems_id = $row['id'];
//             $qty = $row['qty'] - 1;
//             $sql = "UPDATE cartitems SET qty = '$qty', prodPriceNow = '$prodPriceNow' WHERE id = '$cartitems_id'";
//             mysqli_query($dblink, $sql);

//             echo('Produkt wurde abgezogen!');
//             exit();

//             var_dump($qty);
//     }

//     // Wenn nur mehr eins vorhanden lösche es

//     $qty = '1';
//     $sql = "DELETE FROM cartitems WHERE id = '$cartitems_id'";
//     echo('KEIN produkt im warenkorb :/');
//     mysqli_query($dblink, $sql);

//     echo('alles okay, produkt wurde gelöscht');
//     exit();
// }