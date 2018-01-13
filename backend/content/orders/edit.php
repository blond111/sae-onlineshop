<?php

$sql = "SELECT cartitems.*, products.prodName FROM cartitems LEFT JOIN cart ON cartitems.cart_id = cart.id JOIN products ON products.id = prod_id WHERE cart.user_id = '{$_GET['id']}' ";
$res = mysqli_query($dblink, $sql);

if (mysqli_num_rows($res) <= 0){
    echo "<p>Es wurde keine Bestellung gefunden</p>";
} else {

    while($row = mysqli_fetch_assoc($res)){
    ?>
        <h1 class="header-backend">Bestellung überarbeiten</h1>

        <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="title">Produkt</label>
                        <input type="text" name="prod_id" class="form-control" value="<?php echo $row['prodName']; ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="title">Anzahl</label>
                        <input type="text" name="qty" class="form-control" value="<?php echo $row['qty']; ?>">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="title">Einzel Preis</label>
                        <input type="text" class="form-control" name="prodPriceNow" value="<?php echo $row['prodPriceNow']; ?>">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="title">Preis Total</label>
                        <input type="text" class="form-control" name="totalPreis" value="<?php echo $row['qty'] * $row['prodPriceNow']; ?>">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <input type="submit" name="update-orders" class="btn btn-custom" value="Bestellung Update">
                    </div>
                </div>
            </div>
        </form>
    <?php } ?>
<?php } ?>
