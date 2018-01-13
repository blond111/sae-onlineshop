<?php
// Formularvaliderung mit PHP(serverseitig) als auch mit requiered und type (clientseitig) mit diversen css stylings.
// Error Benachrichtigung werden durch requiered unterdrückt, außer PHP ist gescheiter--> siehe e-mail dann erscheint die Error Nachricht. 
$error = false;
$error_msg = array();
$agb = false;
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

        
        // // // Einloggen
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $res = mysqli_query($dblink, $sql);
    
        if (mysqli_num_rows($res) == 1 ) {
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
                $userid = (isset($_SESSION['uid'])) ? $_SESSION['uid'] : NULL; // Ist der User angemeldet, speicher gleich auch User-ID.
                $sql = "INSERT INTO cart (id, user_id) VALUES( NULL, '$userid' ) ";
                $res = mysqli_query($dblink, $sql);
        
                $cartid = mysqli_insert_id($dblink);
                $_SESSION['cart_id'] = $cartid;
            }    

            if (isset($_GET['frompage'])) {
                header('Location: ' . ((isset($_GET['from'])) ? ($_GET['from'] . '/') : '') . 'index.php?page=' . $_GET['frompage']);
                exit();
            } 
        
            else {
                header('Location: user-account/index.php?page=account');
                exit();
            }
        }
    }
}
?>

    <div class="regist-content">
        <h1>
            <?php echo $title ?>
        </h1>
        <p class="regist-text">Bitte registrieren Sie sich um Ihre
            <span class="highlight">Bestellung</span> abzuschicken !</p>
    </div>

    <section>
        <?php if ($show_form === true) { ?>
        <div class="container regist-container">
            <form id="myform" action="" method="post">
                <div class="row">

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Vorname*</label>
                            <br>
                            <?php if (isset($error_msg['firstname'])) echo "<p class=\"error_message\">{$error_msg['firstname']}</p>"; ?>
                            <input class="form-control" id="firstname" type="text" required name="firstname" placeholder="Name" value="<?php if (isset($_POST['send-contact'])) echo $_POST['firstname']; ?>">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nachname*</label>
                            <br>
                            <?php if (isset($error_msg['lastname'])) echo "<p class=\"error_message\">{$error_msg['lastname']}</p>"; ?>
                            <input class="form-control" id="lastname" type="text" required name="lastname" placeholder="Nachname" value="<?php if (isset($_POST['send-contact'])) echo $_POST['lastname']; ?>">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>E-mail*</label>
                            <br>
                            <?php if (isset($error_msg['email'])) echo "<p class=\"error_message\">{$error_msg['email']}</p>"; ?>
                            <input class="form-control" id="email" type="email" required name="email" placeholder="E-mail" value="<?php if (isset($_POST['send-contact'])) echo $_POST['email']; ?>">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Straße*</label>
                            <br>
                            <?php if (isset($error_msg['street'])) echo "<p class=\"error_message\">{$error_msg['street']}</p>"; ?>
                            <input class="form-control" id="street" type="text" required name="street" placeholder="" value="<?php if (isset($_POST['send-contact'])) echo $_POST['street']; ?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Tür/Appartment*</label>
                            <br>
                            <?php if (isset($error_msg['door'])) echo "<p class=\"error_message\">{$error_msg['door']}</p>"; ?>
                            <input class="form-control" id="door" type="text" required name="door" placeholder="" value="<?php if (isset($_POST['send-contact'])) echo $_POST['door']; ?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>PLZ*</label>
                            <br>
                            <?php if (isset($error_msg['plz'])) echo "<p class=\"error_message\">{$error_msg['plz']}</p>"; ?>
                            <input class="form-control" id="plz" type="text" required name="plz" placeholder="" value="<?php if (isset($_POST['send-contact'])) echo $_POST['plz']; ?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Ort*</label>
                            <br>
                            <?php if (isset($error_msg['ort'])) echo "<p class=\"error_message\">{$error_msg['ort']}</p>"; ?>
                            <input class="form-control" id="ort" type="text" required name="ort" placeholder="" value="<?php if (isset($_POST['send-contact'])) echo $_POST['ort']; ?>">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Username*</label>
                            <br>
                            <?php if (isset($error_msg['user'])) echo "<p class=\"error_message\">{$error_msg['user']}</p>"; ?>
                            <input class="form-control" id="user" type="text" required name="user" placeholder="" value="<?php if (isset($_POST['send-contact'])) echo $_POST['user']; ?>">

                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Passwort*</label>
                            <br>
                            <?php if (isset($error_msg['password-one'])) echo "<p class=\"error_message\">{$error_msg['password-one']}</p>"; ?>
                            <?php if (isset($error_msg['password-two'])) echo "<p class=\"error_message\">{$error_msg['password-two']}</p>"; ?>
                            <?php if (isset($error_msg['password'])) echo "<p class=\"error_message\">{$error_msg['password']}</p>"; ?>
                            <input class="form-control" id="password-one" type="password" required minlength="7" name="password-one" placeholder="" value="<?php if (isset($_POST['send-contact'])) echo $_POST['password-one']; ?>">

                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Passwort wiederholen*</label>
                            <br>
                            <input class="form-control" id="password-two" type="password" required minlength="7" name="password-two" placeholder="" value="<?php if (isset($_POST['send-contact'])) echo $_POST['password-two']; ?>">

                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input id="submit_btn" class="btn btn-custom" type="submit" name="send-contact" value="JETZT ANMELDEN">
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <?php } else { ?>

        <div class="done_message">
            <h2>Danke</h2>
            <p>Regestrierung war erfolgreich!
                <br>Du bist eingeloggt!
        </div>
        <?php } ?>

    </section>
    