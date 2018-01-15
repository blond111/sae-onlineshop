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
