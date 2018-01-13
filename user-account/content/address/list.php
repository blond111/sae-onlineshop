<section class="section checkout-address">
    <div class="container">
        <div class="row">
            <div class="checkout-address-summary">
                <?php
                ////Auslesen der Tabelle Users, wo die id der Tabelle der "Get id" entspricht.
                $sql = "SELECT * FROM users WHERE id='{$_SESSION['uid']}'";
                $res = mysqli_query($dblink, $sql);

                while($row = mysqli_fetch_assoc($res)){
                ?>
                    <a href="index.php?page=address&action=edit&from=user-account&frompage=address" class="link-edit link-edit-account">Bearbeiten </a>
                    <div class="row">
                        <div class="col-md-4 address-summary">
                            <span><?php echo $row['lname']; ?></span>
                            <span><?php echo $row['fname']; ?></span><br>
                            <span><?php echo $row['street']; ?></span>
                            <span><?php echo $row['door']; ?></span><br>
                            <span><?php echo $row['plz']; ?></span>
                            <span><?php echo $row['ort']; ?></span><br>
                            <span><?php echo $row['email']; ?></span>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>