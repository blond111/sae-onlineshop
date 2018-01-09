<section style="margin-top: 81px;">

            <?php


            if ($_SESSION['login_counter'] >= 3) {

                $time_to_login = $_SESSION['timeout'] + 60;
                $seconds_to_login = $time_to_login - time();

                echo "<div style='display=flex; justify-content: center;'><p style='font-size: 16px; text-align: center; margin:20%; '>Bitte warte noch $seconds_to_login Sekunden bis du dich einloggen darfst!</p></div>";
            } else {
                ?>
    <div class="container">
        <div style="max-width: 400px; margin: 0 auto;">
                <h1 class="login-header"><?php echo $title?></h1>
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

                        if($error === true){
                            echo "<div class=\"error\">";
                            foreach($error_msg as $msg) {
                                echo '<p style="color: indianred">'.$msg.'</p>';
                            }
                            echo "</div>";
                        }

                        if($_SESSION['login'] == 1){
                        echo "<p style=\"color: darkseagreen; margin: 30px 0; font-weight: bold; text-align: center; \">Du bist eingeloggt!</p>";
                        }?>

                    </form>
                </div>
            <?php } ?>
        </div>
    </div>
</section>