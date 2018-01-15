<div class="checkout-page wrapper">
    <section class="section order-summary">
        <div class="container">
            <div class="row order-summary-container">
                <h1>Bestellung </h1>
                <?php
                //Selektieren Cartitems und Produkte um diese zu erhöhen und zu vermindern !
                $sql = "SELECT * FROM cartitems LEFT JOIN products ON cartitems.prod_id = products.id WHERE cartitems.cart_id = $cartid";
                $res = mysqli_query($dblink, $sql);

                $totalSum = 0;

                while ($row = mysqli_fetch_assoc($res)) {
                ?>
                    <div class="cart-item">
                        <div class="cart-thumbnail">
                            <div class="thumbnail">
                                <img alt="<?php echo $row['prodName']; ?>" src="<?php echo $row['prodBild']; ?>">
                            </div>
                        </div>

                        <div class="cart-details">
                            <span class="cart-produ-title"><?php echo $row['prodName']; ?></span>
                            <span class="cart-produ-qty"><?php echo $row['qty']; ?></span>

                            <?php $prodSum = $row['prodPriceNow'] * $row['qty']; ?>
                            <?php $totalSum += $prodSum; ?>

                            <p class="cart-produ-price"><?php echo $prodSum;?> €</p>
                        </div>
                    </div>

                <?php } ?>

                <div class="cart-total">
                    <div class="grand-total">
                        <span>Total</span>
                        <p class="cart-total-price"><?php echo $totalSum;?> €</p>
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
                    // Auslesen der Users Tabelle, wo die id der Tabelle der "Get id" entspricht
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
