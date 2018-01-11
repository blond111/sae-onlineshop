<h1 class="header-backend">Neuen User erstellen</h1>

<form method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="title">Vorname</label>
                <input type="text" name="firstname" class="form-control">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="title">Nachname</label>
                <input type="text" name="lastname" class="form-control">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="title">Email</label>
                <input type="text" name="email" class="form-control">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="title">Straße</label>
                <input type="text" name="street" class="form-control">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="title">Tür/Appartment</label>
                <input type="text" name="door" class="form-control">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="title">PLZ</label>
                <input type="text" name="plz" class="form-control">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="title">Ort</label>
                <input type="text" name="ort" class="form-control">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="title">Username</label>
                <input type="text" name="user" class="form-control">
            </div>
        </div><div class="col-sm-6">
            <div class="form-group">
                <label for="title">Passwort</label>
                <input type="text" name="password-one" class="form-control">
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <input type="submit" name="insert-users" class="btn btn-custom" value="User Erstellen">
            </div>
        </div>
    </div>
</form>