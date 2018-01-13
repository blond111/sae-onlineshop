<section id="main">
    <div class="container">
        <h1 class="header-main"><?php echo $title; ?></h1>
        <section class="section order-summary">
            <div class="container">
                <div class="row order-summary-container">
                    <div class="cart--item">
                        <?php
                        //Auslesen diverser Spalten aus 3 Tabellen Cart, Cartitems und Products
                        
                        $sql = "SELECT cart.*, cartitems.prod_id, cartitems.qty, cartitems.prodPriceNow, products.prodName, products.prodBild FROM cart JOIN cartitems ON cart.id = cartitems.cart_id JOIN products ON products.id = prod_id WHERE cart.user_id = '{$_SESSION['uid']}' ORDER BY cart.id DESC";
                        $res = mysqli_query($dblink, $sql);

                        $totalSum = 0;

                        while($row = mysqli_fetch_assoc($res)){
                        ?>
                        <?php $cartID = $row['id']; ?>
                        <?php $userID = $row['user_id']; ?>
                        <?php $prodSum = $row['prodPriceNow'] * $row['qty']; ?>
                        <?php $totalSum += $prodSum; ?>

                            <div class="cart-thumbnail">
                                <div class="thumbnail">
                                    <img alt="<?php echo $row['prodName']; ?>" src="../<?php echo $row['prodBild']; ?>">
                                </div>
                            </div>
                            <div class="cart--details">
                                <span class="cart-produ-title">Produkt: <?php echo $row['prodName']; ?></span>
                                <span class="cart-qty">Anzahl: <?php echo $row['qty']; ?></span>
                                <span class="cart-price">Preis pro Stück: <?php echo $row['prodPriceNow']; ?> €</span>
                                <span class="cart-price">Zwischensumme: <?php echo $prodSum; ?> €</span>
                            </div>
                        <?php } ?>
                        <hr>
                        <div class="user--details">
                            <span>Bestellnummer: <?php echo $cartID; ?></span>
                            <span>Kundennummer: <?php echo $userID; ?></span>
                            <span>Total: <?php echo $totalSum; ?> €</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>   
</section>