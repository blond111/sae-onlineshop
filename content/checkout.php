<?php

if (!isset($_SESSION['usergroup']) || $_SESSION['usergroup'] == -1) {
    header('Location: index.php?page=login&frompage=checkout');
    exit();
}

?>

<div class="checkout-page wrapper">
    <section class="section order-summary">
        <div class="container">
            <div class="row order-summary-container">
                <h1>Bestellung </h1>
                <div class="cart-item">
                    <div class="cart-thumbnail">
                        <div class="thumbnail">
                            <img alt="Flasche" src="assets/img/Flasche.jpg">
                        </div>
                    </div>
                    <div class="cart-details">
                        <span class="cart-produ-title">SHINE &amp; FINE 250g</span>
                        <span class="cart-produ-qty">Anzahl:1</span>
                        <span class="cart-produ-price">55 €</span>
                    </div>
                </div>

                <div class="cart-item">
                    <div class="cart-thumbnail">
                        <div class="thumbnail">
                            <img alt="Flasche plus Pinsel" src="assets/img/Flaschpluspinsel.jpg">
                        </div>
                    </div>

                    <div class="cart-details">
                        <span class="cart-produ-title">SHINE &amp; FINE 250g</span>
                        <span class="cart-produ-qty">Anzahl:1</span>
                        <span class="cart-produ-price">85 €</span>
                    </div>
                </div>

                <div class="cart-total">
                    <div class="grand-total">
                        <span>Total</span>
                        <span class="cart-total-price">100 €</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section checkout-address">
        <div class="container">
            <div class="row">
                <div class="checkout-address-summary">
                    <?php
                    $sql = "SELECT * FROM users WHERE  id='{$_SESSION['uid']}'";
                    $res = mysqli_query($dblink, $sql);

                    while($row = mysqli_fetch_assoc($res)){
                    ?>
                        <a href="user-account/index.php?page=address&action=edit&frompage=checkout" class="link-edit link-edit-account">Bearbeiten </a>
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

    <section class="section checkout-address">
        <div class="container">
            <div class="row">
                <form method="post" action="">
                    <input class="btn btn-custom" type="submit" name="finish-order" value="BESTELLEN">
                </form>
            </div>
        </div>
    </section>
</div>