<div class="hero-pic hero-products">
    <div class="jumbotron">
        <h1>Regenerierent
            <br>
            <span class="highlight">+</span> Entgiftent</h1>
        <p class="byline">
            <span class="highlight">Neu</span> aus Österreich
            <br>
            <span class="highlight">3</span> in
            <span class="highlight">1</span> Pflege für ihre Haut</p>
        <p>
            <a class="btn btn-warning active btn-lg" role="button" href="index.php?page=detail">mehr Details</a>
        </p>
    </div>
</div>

<div class="row product-row">
    <?php

    $sql = "SELECT * FROM products";
    $res = mysqli_query($dblink, $sql);

    while ($row = mysqli_fetch_assoc($res)) {
    ?>
        <div class="col-md-3 item">
            <img alt="<?php echo $row['prodName']; ?>" src="<?php echo $row['prodBild']; ?>">
            <div class="text-price">
                <p>
                    <?php echo $row['prodName']; ?>
                    <br>
                    <?php echo $row['prodBeschreibung']; ?>
                </p>
            </div>

            <div class="text-price">
                <p>
                    <?php echo $row['prodPreis']; ?>
                </p>
            </div>

            <a class="btn btn-warning active btn-lg" role="button" href="#">BUY</a>
        </div>
    <?php } ?>
</div>
