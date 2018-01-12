<section id="main">
    <div class="container">
        <h1 class="header-main"><?php echo $title; ?></h1>
        <section class="section order-summary">
            <?php
            $sql = "SELECT * FROM cart WHERE  id='{$_SESSION['uid']}'";
            $res = mysqli_query($dblink, $sql);

            while($row = mysqli_fetch_assoc($res)){
            ?>
                <div class="container">
    <!-- TO DO: Cart auslesen mit left JOin und Datenbanken verbinden ! -->
    <!-- Cart -Cartitems- uid verbinden und auslesen -->
                    <div class="row order-summary-container">
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
                    </div>
                </div>
            <?php } ?>
        </section>
    </div>   
</section>