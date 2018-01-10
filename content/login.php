<section class="login-section">
    <div class="container">
        <div>
            <h1 class="login-header">
                <?php echo $title?>
            </h1>

            <div class="login-container">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control login-label">
                    </div>
                    <div class="form-group">
                        <label for="password">Passwort</label>
                        <input type="password" name="password" class="form-control login-label">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-custom" name="do-login" value="Jetzt einloggen">
                    </div>
                    <?php

                    if ($error === true) {
                        echo "<div class=\"error\">";
                        foreach ($error_msg as $msg) {
                            echo '<p class="loginerror">'.$msg.'</p>';
                        }
                        echo "</div>";
                    } ?>
                    <div class="loginsuccess"><a href="index.php?page=registrierung">Neuen Account erstellen</a></div>
                </form>
            </div>
        </div>
    </div>
</section>
