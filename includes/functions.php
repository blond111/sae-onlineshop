<?php
$error = false;
$error_msg = array();

// Nur eine Pseude-security: Nicht production ready, da Sessions jederzeit neu gestartet werden können (z.B.Brute Force-Attacke)
if ($_SESSION['login_counter'] >= 3) {
    if (($_SESSION['timeout'] + 60) < time()) {
        $_SESSION['login_counter'] = 0;
    }
}

// TODO: Remove pseudo-salt
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

// TODO: add to cart
if (isset($_POST['update-cart'])) {
    // TODO: cartitems-->id
    $cartId = mysqli_real_escape_string($dblink, $_POST['cartId']);
    $prodId = mysqli_real_escape_string($dblink, $_POST['prodId']);
    // TODO: cartitems-->qty
    // TODO: cartitems-->prodPriceNow

    /*$username = mysqli_real_escape_string($dblink, $_POST['user']);
    $password = mysqli_real_escape_string($dblink, $_POST['password-one']);*/

    $sql = "SET cartitems SET cart_id = '$cartId', prod_id = '$prodId' WHERE id = '1'";

    mysqli_query($dblink, $sql);

    header('Location: index.php?page=address');
    exit();
}
