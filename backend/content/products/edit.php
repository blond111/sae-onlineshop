<?php
$sql = "SELECT * FROM products WHERE id = '{$_GET['id']}' LIMIT 1";
$res = mysqli_query($dblink, $sql);

if(mysqli_num_rows($res) <= 0){
    echo "<p>Es wurde kein Produkt gefunden</p>";
} else {

    $row = mysqli_fetch_assoc($res);
    ?>
    <h1 class="header-backend">Produkt überarbeiten</h1>

    <form method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="title">Name</label>
                    <input type="text" name="prodtitle" class="form-control" value="<?php echo $row['prodName']; ?>">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="title">Bild</label>
                    <input type="file" name="prodimg" class="form-control">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="title">Beschreibung</label>
                    <textarea class="form-control" name="prodcontent" rows="10"><?php echo $row['prodBeschreibung']; ?></textarea>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="title">Preis</label>
                    <textarea class="form-control" name="prodprice" rows="10"><?php echo $row['prodPreis']; ?></textarea>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    <input type="submit" name="update-prod" class="btn btn-custom" value="Produkt Update">
                </div>
            </div>
        </div>
    </form>
<?php } ?>
