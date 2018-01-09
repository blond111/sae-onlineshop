<h1 style="font-size: 16px;">Neues Produkt erstellen</h1>

<form method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="title">Name</label>
                <input type="text" name="prodtitle" class="form-control">
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
                <textarea class="form-control" name="prodcontent" rows="10"></textarea>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label for="title">Preis</label>
                <textarea class="form-control" name="prodprice" rows="10"></textarea>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <input type="submit" name="insert-prod" class="btn btn-custom" value="Produkt Erstellen">
            </div>
        </div>
    </div>
</form>