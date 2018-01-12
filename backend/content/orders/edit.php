<?php
// TO: Query richtig setzten!
$sql = "SELECT * FROM products WHERE id = '{$_GET['id']}' LIMIT 1";
$res = mysqli_query($dblink, $sql);

if(mysqli_num_rows($res) <= 0){
    echo "<p>Es wurde keine Bestellung gefunden</p>";
} else {

    $row = mysqli_fetch_assoc($res);
    ?>
    <h1 class="header-backend">Bestellung überarbeiten</h1>

    <form method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="title">Bestellnummer</label>
                    <input type="text" name="ordernumber" class="form-control" value="<?php echo $row['cart_id']; ?>">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="title">Kundennummer</label>
                    <input type="text" name="usernumber" class="form-control" value="<?php echo $row['user_id']; ?>">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="title"><?php echo $row['podName']; ?></label>
                    <input type="text" class="form-control" name="qty" value="<?php echo $row['qty']; ?>">
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
