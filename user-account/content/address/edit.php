<?php
$sql = "SELECT * FROM users WHERE id = '{$_SESSION['uid']}'";
$res = mysqli_query($dblink, $sql);

if(mysqli_num_rows($res) <= 0){
    echo "<p>Es wurde kein Kunde gefunden</p>";
} else {

    $row = mysqli_fetch_assoc($res);
    ?>

<h1 style="font-size: 17px;">Adresse überarbeiten</h1>
    <div class="container regist-container">
        <form id="myform" action="" method="post">
            <div class="row">

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Ihr Vorame*</label><br>
                        <input class="form-control" id="firstname" type="text" name="firstname" placeholder="Name" value="<?php echo $row['fname']; ?>">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Ihr Nachname*</label><br>
                        <input class="form-control" id="lastname" type="text" name="lastname" placeholder="Nachname" value="<?php echo $row['lname']; ?>">
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Ihre E-mail*</label><br>
                        <input class="form-control" id="email" type="text" name="email" placeholder="E-mail" value="<?php echo $row['email']; ?>">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Straße*</label><br>
                        <input class="form-control" id="street" type="text" name="street" placeholder="" value="<?php echo $row['street']; ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Tür/Appartment*</label><br>
                        <input class="form-control" id="door" type="text" name="door" placeholder="" value="<?php echo $row['door']; ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>PLZ*</label><br>
                        <input class="form-control" id="plz" type="text" name="plz" placeholder="" value="<?php echo $row['plz']; ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Ort*</label><br>
                        <input class="form-control" id="ort" type="text" name="ort" placeholder="" value="<?php echo $row['ort']; ?>">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <input id="submit_btn" class="btn btn-custom" type="submit" name="update-address" value="Update">
                    </div>
                </div>
            </div>
        </form>
<?php } ?>
    </div>