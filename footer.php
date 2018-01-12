<footer>
    <section class="container-garantie">
        <div class="garantie">
            <div>
                <img alt="Gratis Versand" src="assets/img/if_box_1540166.svg">
                <p>gratis Versand</p>
            </div>

            <div>
                <img alt="Gratis Rückversand" src="assets/img/if_arrow-back-outline_216436.svg">
                <p>gratis Rückversand</p>
            </div>

            <div>
                <img alt="24/7 Support" src="assets/img/if_headset_172475.svg">
                <p>24/7 Support</p>
            </div>
        </div>
    </section>

    <section class="container-sozial">
        <p>Folge unserer
            <strong>SHINE &amp; FINE</strong>
            <br> Gemeinschft auf</p>
            
        <div class="sozial">
            <a href="https://www.facebook.com" target="_blank" rel="noopener">
                <img alt="Facebook" src="assets/img/facebook.svg">
            </a>
            <a href="https://www.instagram.com" target="_blank" rel="noopener">
                <img alt="Instagram" src="assets/img/instagram.svg">
            </a>
        </div>
    </section>

    <section class="container-contact">
        <div class="contact">
            <ul>
                <li>
                    <a href="#">Konatkt</a>
                </li>
                <li>
                    <a href="#">Impressum</a>
                </li>
                <li>
                    <a href="#">AGBs</a>
                </li>
            </ul>
        </div>
    </section>
</footer>


<div id="cart_info" <?php if($_GET['cart'] === 'open') echo 'class="cart_info--open"'?> >
    <div class="cart-window-all"></div>
    <div class="cart-window">
        <div class="cart-window-header">
            <a class="close-cart pull-left">
                <i class="glyphicon glyphicon-remove"></i>
            </a>

            <span class="cart-window-title">Warenkorb</span>

            <div class="mycart-container pull-right">
                <img alt="Mein Warenkorb" src="assets/img/shopping_bag1600.png" class="bag-pic">
            </div>
        </div>
        
        <div class="cart-window-body">
            <?php
            //Seletieren Cartitems und Produkte um diese zu erhöhen und zu vermindern !
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
                        <div class="cart-produ-qty">
                            <form action="" method="post">
                                <input type="hidden" name= "prodId" value="<?php echo $row['id']; ?>">
                                <input type="hidden" name= "minus">
                                <input class="btn btn-default qty-btn js-qty-plus" type="submit" name="update-cart" value="-">
                            </form>
                            <span><?php echo $row['qty']; ?></span>
                            <form action="" method="post">
                                <input type="hidden" name= "prodId" value="<?php echo $row['id']; ?>">
                                <input class="btn btn-default qty-btn js-qty-plus" type="submit" name="update-cart" value="+">
                            </form> 
                        </div>

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

        <div class="cart-window-footer">
            <a class="btn btn-custom" type="button" href="index.php?page=checkout">
                <strong>CHECKOUT</strong>
            </a>
        </div>
    </div>
</div>
</body>

</html>