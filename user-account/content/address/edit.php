<?php
// Formularvaliderung mit PHP(serverseitig) als auch mit requiered und type (clientseitig) mit diversen css stylings.
// Error Benachrichtigung werden durch requiered unterdrückt, außer PHP ist gescheiter--> siehe e-mail dann erscheint die Error Nachricht. 
$error = false;
$error_msg = array();
$agb = false;
$show_form = true;

if (isset($_POST['update-address'])) {

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

    if ($error === false) {
        $show_form = false;

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
}


//Auslesen der Tabelle Users, wo die id der Tabelle der "Get id" entspricht.
$sql = "SELECT * FROM users WHERE id = '{$_SESSION['uid']}'";
$res = mysqli_query($dblink, $sql);

if(mysqli_num_rows($res) <= 0){
    echo "<p>Es wurde kein Kunde gefunden</p>";
} else {

    $row = mysqli_fetch_assoc($res);
?>

<h1 style="font-size: 17px;">Adresse überarbeiten</h1>
    <div class="container regist-container">
        <?php $show_form === true ?>
        <form id="myform" action="" method="post">
            <div class="row">

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Ihr Vorame*</label>
                        <br>
                        <?php if (isset($error_msg['firstname'])) echo "<p class=\"error_message\">{$error_msg['firstname']}</p>"; ?>
                        <input class="form-control" id="firstname" type="text" required name="firstname" placeholder="Name" value="<?php echo $row['fname']; ?>">
                    </div>
                 </div>

                 <div class="col-sm-6">
                    <div class="form-group">
                        <label>Ihr Nachname*</label>
                        <br>
                        <?php if (isset($error_msg['lastname'])) echo "<p class=\"error_message\">{$error_msg['lastname']}</p>"; ?>
                        <input class="form-control" id="lastname" type="text" required name="lastname" placeholder="Nachname" value="<?php echo $row['lname']; ?>">
                    </div>
                 </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Ihre E-mail*</label>
                        <br>
                        <?php if (isset($error_msg['email'])) echo "<p class=\"error_message\">{$error_msg['email']}</p>"; ?>
                        <input class="form-control" id="email" type="email" required name="email" placeholder="E-mail" value="<?php echo $row['email']; ?>">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Straße*</label>
                        <br>
                        <?php if (isset($error_msg['street'])) echo "<p class=\"error_message\">{$error_msg['street']}</p>"; ?>
                        <input class="form-control" id="street" type="text" required name="street" placeholder="" value="<?php echo $row['street']; ?>">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Tür/Appartment*</label>
                        <br>
                        <?php if (isset($error_msg['door'])) echo "<p class=\"error_message\">{$error_msg['door']}</p>"; ?>
                        <input class="form-control" id="door" type="text" required name="door" placeholder="" value="<?php echo $row['door']; ?>">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>PLZ*</label>
                        <br>
                        <?php if (isset($error_msg['plz'])) echo "<p class=\"error_message\">{$error_msg['plz']}</p>"; ?>
                        <input class="form-control" id="plz" type="text" required name="plz" placeholder="" value="<?php echo $row['plz']; ?>">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Ort*</label>
                        <br>
                        <?php if (isset($error_msg['ort'])) echo "<p class=\"error_message\">{$error_msg['ort']}</p>"; ?>
                        <input class="form-control" id="ort" type="text" required name="ort" placeholder="" value="<?php echo $row['ort']; ?>">
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <input id="submit_btn" class="btn btn-custom" type="submit" name="update-address" value="Update">
                    </div>
                </div>
            </div>
        </form>
        <?php } ?>
    </div>