<?php
$sql = "SELECT * FROM users WHERE id = '{$_GET['id']}' LIMIT 1";
$res = mysqli_query($dblink, $sql);

if(mysqli_num_rows($res) <= 0){
    echo "<p>Es wurde kein User gefunden</p>";
} else {

    $row = mysqli_fetch_assoc($res);
    ?>
    <h1 style="font-size: 17px;">User überarbeiten</h1>

    <form method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="title">Vorname</label>
                    <input type="text" name="firstname" class="form-control" value="<?php echo $row['fname']; ?>">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="title">Nachname</label>
                    <input type="text" name="lastname" class="form-control" value="<?php echo $row['lname']; ?>">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="title">Email</label>
                    <input type="text" name="email" class="form-control" value="<?php echo $row['email']; ?>">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="title">Straße</label>
                    <input type="text" name="street" class="form-control" value="<?php echo $row['street']; ?>">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="title">Tür/Appartment</label>
                    <input type="text" name="door" class="form-control" value="<?php echo $row['door']; ?>">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="title">PLZ</label>
                    <input type="text" name="plz" class="form-control" value="<?php echo $row['plz']; ?>">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="title">Ort</label>
                    <input type="text" name="ort" class="form-control" value="<?php echo $row['ort']; ?>">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="title">Username</label>
                    <input type="text" name="user" class="form-control" value="<?php echo $row['username']; ?>">
                </div>
            </div><div class="col-sm-6">
                <div class="form-group">
                    <label for="title">Passwort</label>
                    <input type="text" name="password-one" class="form-control" value="<?php echo $row['password']; ?>">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <input type="submit" name="update-users" class="btn btn-custom" value="User Update">
                </div>
            </div>
        </div>
    </form>
<?php } ?>