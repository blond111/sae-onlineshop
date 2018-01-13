<section id="main">
    <div class="container">
        <h1 class="header-main"><?php echo $title; ?></h1>
        <section class="section order-summary">
            <?php
            //Auslesen diverser Spalten aus 3 Tabellen Cart, Cartitems und Products
            
            $sql = "SELECT cart.*, cartitems.prod_id, cartitems.qty, cartitems.prodPriceNow, products.prodName, products.prodBild FROM cart JOIN cartitems ON cart.id = cartitems.cart_id JOIN products ON products.id = prod_id WHERE cart.user_id = '{$_SESSION['uid']}'";
            $res = mysqli_query($dblink, $sql);

            while($row = mysqli_fetch_assoc($res)){
            ?>
                <div class="container">
                    <div class="row order-summary-container">
                        <div class="cart-item">
                        <div class="">
                                <span class="cart-produ-title"><?php echo $row['id']; ?></span>
                                <span class="cart-produ-qty"><?php echo $row['user_id']; ?></span>
                                <span class="cart-produ-price"><?php echo ($row['qty']* $row['prodPriceNow']); ?> €</span>
                            </div>
                            <div class="cart-thumbnail">
                                <div class="thumbnail">
                                    <img alt="<?php echo $row['prodName']; ?>" src="../<?php echo $row['prodBild']; ?>">
                                </div>
                            </div>
                            <div class="cart-details">
                                <span class="cart-produ-title"><?php echo $row['prodName']; ?></span>
                                <span class="cart-produ-qty"><?php echo $row['qty']; ?></span>
                                <span class="cart-produ-price"><?php echo $row['prodPriceNow']; ?> €</span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </section>
    </div>   
</section>