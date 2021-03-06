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


// Get cartid (Gibt es in der Session schon eine Cart-ID, wenn nicht setzt eine Neue.)
if (isset($_SESSION['cart_id'])) {
    $cartid = $_SESSION['cart_id'];
} else {
    $userid = (isset($_SESSION['uid'])) ? $_SESSION['uid'] : 'NULL'; // Ist der User bereits angemeldet, speicher gleich auch User-ID.
    $sql = "INSERT INTO cart (id, user_id) VALUES ( NULL, $userid )";
    $res = mysqli_query($dblink, $sql);

    $cartid = mysqli_insert_id($dblink);
    $_SESSION['cart_id'] = $cartid;
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


// Ist der Angemeldete berechtigt die Seite zu sehen?
if ($page == 'checkout' && $myusergroup == -1) {
    header('Location: index.php?page=login&frompage=checkout');
    exit();
}


// Login Abfrage mit Fehlermeldungen sowie Passwordhash
if (isset($_POST['do-login'])) {
    $sql = "SELECT id, username, password, usergroup FROM users WHERE username = '{$_POST['username']}'";
    $res = mysqli_query($dblink, $sql);

    if (mysqli_num_rows($res) == 1) {
        $user = mysqli_fetch_assoc($res);

        $pw_hash = explode(":", $user['password']);

        if ($pw_hash[0] == sha1($_POST['password'] . $pw_hash[1])) {
            $_SESSION['login'] = 1;
            $_SESSION['uname'] = $user['username'];
            $_SESSION['uid'] = $user['id'];
            $_SESSION['usergroup'] = $user['usergroup'];

            // Ergänzen von Username im Cart wenn man sich im nachhinein anmeldet!
            if (isset($_SESSION['cart_id'])) {
                $thisUser = $user['id'];
                $thiscartid = $_SESSION['cart_id'];
                $sql = "UPDATE cart SET user_id = '$thisUser' WHERE id = '$thiscartid'";
                $res = mysqli_query($dblink, $sql);
            }

            if (isset($_GET['frompage'])) {
                header('Location: ' . ((isset($_GET['from'])) ? ($_GET['from'] . '/') : '') . 'index.php?page=' . $_GET['frompage']);
                exit();
            } elseif ($user['usergroup'] == 1) {
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


//Funktion zur Steigerung oder Minderung der Warenkorbitems

if (isset($_POST['update-cart'])) {
    $prodId = mysqli_real_escape_string($dblink, $_POST['prodId']);

    // Suche Produktpreis
    $sql = "SELECT prodPreis FROM products WHERE id = '$prodId'";
    $res = mysqli_query($dblink, $sql);
    while ($row = mysqli_fetch_assoc($res)) {
        $prodPriceNow = $row['prodPreis'];
    }

    // Ist dieses Produkt schon in meinem Warenkorb?
    $sql = "SELECT id, qty FROM cartitems WHERE cart_id = '$cartid' AND prod_id = '$prodId'";
    $res = mysqli_query($dblink, $sql);

    while ($row = mysqli_fetch_assoc($res)) {
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
    $sql = "INSERT INTO cartitems (cart_id, prod_id, qty, prodPriceNow) VALUES ('$cartid', '$prodId', '$qty', '$prodPriceNow')";
    mysqli_query($dblink, $sql);

    header('Location: index.php?page=products&cart=open');
    exit();
}

if (isset($_POST['finish-order'])) {
    $createdOrder = time();

    $sql = "UPDATE cart SET order_finished = true, cartDatum = '$createdOrder' WHERE id = '$cartid' ";
    mysqli_query($dblink, $sql);

    unset($cartid);
    unset($_SESSION["cart_id"]);

    header('Location: index.php?page=finish');
    exit();
}

// Registrierung
// Formularvaliderung mit PHP(serverseitig) als auch mit requiered und type (clientseitig) mit diversen css stylings.
// Error Benachrichtigung werden durch requiered unterdrückt, außer PHP ist gescheiter--> siehe e-mail dann erscheint die Error Nachricht.
$show_form = true;

if (isset($_POST['send-contact'])) {
    // Vorname
    if (strlen($_POST['firstname']) < 3) {
        $error = true;
        $error_msg['firstname'] = "Der Vorname ist zu kurz!";
    }

    // Nachname
    if (strlen($_POST['lastname']) < 2) {
        $error = true;
        $error_msg['lastname'] = "Der Nachname ist zu kurz!";
    }

    // E-Mail
    $email_parts = explode("@", $_POST['email']);

    if (count($email_parts) == 2) {
        $email_parts_second = explode(".", $email_parts[1]);

        if (count($email_parts_second) != 2) {
            $error = true;
            $error_msg['email'] = "Deine Email ist nicht korrekt!";
        }
    } else {
        $error = true;
        $error_msg['email'] = "Deine Email ist nicht korrekt!";
    }

    // Straße
    if (strlen($_POST['street']) < 2) {
        $error = true;
        $error_msg['street'] = "Deine Straße ist nicht korrekt!";
    }

    // Tür
    if (strlen($_POST['door']) < 1) {
        $error = true;
        $error_msg['door'] = "Deine Hausnummer ist nicht korrekt";
    }

    // PLZ
    if (strlen($_POST['plz']) < 4) {
        $error = true;
        $error_msg['plz'] = "Deine PLZ ist zu kurz!";
    }

    // Ort
    if (strlen($_POST['ort']) < 4) {
        $error = true;
        $error_msg['ort'] = "Dein Ort ist nicht korrekt!";
    }

    // Username
    if (strlen($_POST['user']) < 4) {
        $error = true;
        $error_msg['user'] = "Dein User name muss min. 7 Stellen haben!";
    }

    // Passwort

    if ($_POST['password-one'] != $_POST['password-two']) {
        $error = true;
        $error_msg['password'] = "Dein Passwort stimmt nicht überein!";
    }

    if (strlen($_POST['password-one']) < 7) {
        $error = true;
        $error_msg['password-one'] = "Dein Passwort ist zu kurz!";
    }

    if (strlen($_POST['password-two']) < 7) {
        $error = true;
        $error_msg['password-two'] = "Dein Passwort ist zu kurz!";
    }

    if ($error === false) {
        $show_form = false;

        $fname = mysqli_real_escape_string($dblink, $_POST['firstname']);
        $lname = mysqli_real_escape_string($dblink, $_POST['lastname']);
        $email = mysqli_real_escape_string($dblink, $_POST['email']);
        $street = mysqli_real_escape_string($dblink, $_POST['street']);
        $door = mysqli_real_escape_string($dblink, $_POST['door']);
        $plz = mysqli_real_escape_string($dblink, $_POST['plz']);
        $ort = mysqli_real_escape_string($dblink, $_POST['ort']);
        $username = mysqli_real_escape_string($dblink, $_POST['user']);

        $password = mysqli_real_escape_string($dblink, $_POST['password-one']);
        $pw_hash = sha1($password.'1234').':1234';


        $sql = "INSERT INTO users (fname, lname, email, street, door, plz, ort, username, password, usergroup)
                VALUES ('$fname', '$lname', '$email', '$street', '$door', '$plz', '$ort', '$username', '$pw_hash', '0')";

        mysqli_query($dblink, $sql);


        // Einloggen
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $res = mysqli_query($dblink, $sql);

        if (mysqli_num_rows($res) == 1) {
            $user = mysqli_fetch_assoc($res);

            $_SESSION['login'] = 1;
            $_SESSION['uname'] = $user['username'];
            $_SESSION['uid'] = $user['id'];
            $_SESSION['usergroup'] = $user['usergroup'];

            if (isset($_SESSION['cart_id'])) {
                $thisUser = $user['id'];
                $thiscartid = $_SESSION['cart_id'];
                $sql = "UPDATE cart SET user_id = '$thisUser' WHERE id = '$thiscartid'";
                $res = mysqli_query($dblink, $sql);
            }

            if (isset($_SESSION['cart_id'])) {
                $cartid = $_SESSION['cart_id'];
            } else {
                $userid = (isset($_SESSION['uid'])) ? $_SESSION['uid'] : null; // Ist der User angemeldet, speicher gleich auch User-ID.
                $sql = "INSERT INTO cart (id, user_id) VALUES( NULL, '$userid' ) ";
                $res = mysqli_query($dblink, $sql);

                $cartid = mysqli_insert_id($dblink);
                $_SESSION['cart_id'] = $cartid;
            }

            if (isset($_GET['frompage'])) {
                header('Location: ' . ((isset($_GET['from'])) ? ($_GET['from'] . '/') : '') . 'index.php?page=' . $_GET['frompage']);
                exit();
            } else {
                header('Location: user-account/index.php?page=account');
                exit();
            }
        }
    }
}
