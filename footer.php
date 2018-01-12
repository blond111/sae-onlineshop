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
                <span class="mycart-counter">1 </span>
            </div>
        </div>

        <!-- //TODO: LEFT JOIN FREMDKEY MIT PRIMÄRKEY will nicht  -->
        <div class="cart-window-body">
            <?php
            // $sql = "SELECT cartitems.prodPriceNow, products.* FROM cartitems LEFT JOIN products ON cartitems.prod_id = cartitems.id";
            $sql = "SELECT *, cartitems.prodPriceNow FROM products LEFT JOIN cartitems ON cartitems.prod_id = cartitems.id ";
            // $sql = "SELECT * FROM products";
            $res = mysqli_query($dblink, $sql);

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
                                <!-- <button class="btn btn-default qty-btn js-qty-plus" type="button">+</button>
                                <input min="0" max="99" class="input-sm qty-text" size="5" value="0" type="number"> -->
                                <!-- //HIER BIN ICH  -->
                                <input type="hidden" name= "prodId" value="<?php echo $row['id']; ?>">
                                <input type="hidden" name= "minus">
                                <input class="btn btn-warning active btn-lg" type="submit" name="update-cart" value="MINUS">
                                <!-- <button class="btn btn-default qty-btn js-qty-minus" type="button">-</button> -->
                            </form>
                        </div>
                        <?php
                        $sql = "SELECT prodPriceNow FROM cartitems";
                        $res = mysqli_query($dblink, $sql);

                        while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                            <p class="cart-produ-price"><?php echo $row['prodPriceNow'];?><span>€</span></p>
                        <?php }?>
                    </div>
                </div>
            <?php } ?>

            <!-- <div class="cart-item">
                <div class="cart-thumbnail">
                    <div class="thumbnail">
                        <img "Flasche plus Pinsel" src="assets/img/Flaschpluspinsel.jpg">
                    </div>
                </div>

                <div class="cart-details">
                    <span class="cart-produ-title">SHINE &amp; FINE 250g</span>
                    <div class="cart-produ-qty">
                        <button class="btn btn-default qty-btn" type="button">+</button>
                        <input min="0" max="99" class="input-sm qty-text" size="5" value="0" type="number">
                        <button class="btn btn-default qty-btn" type="button">-</button>
                    </div>

                    <span class="cart-produ-price">85 €</span>
                </div>
            </div> -->

            <div class="cart-total">
                <div class="grand-total">
                    <span>Total</span>
                    <span class="cart-total-price">100 €</span>
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