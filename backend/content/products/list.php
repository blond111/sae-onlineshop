<a href="index.php?page=product&action=new" class="btn btn-custom">Neues Produkt anlegen</a>
<table class="table">
    <thead>
    <tr>
        <th width="200px">Produkt Name</th>
        <th width="200px">Admin Name</th>
        <th width="200px">Bild</th>
        <th width="200px">Erstellungsdatum</th>
        <th>Aktionen</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $sql = "SELECT products.*, users.username FROM products LEFT JOIN users ON products.user_id = users.id ORDER BY id DESC";
    $res = mysqli_query($dblink, $sql);

    while($row = mysqli_fetch_assoc($res)){
        ?>
        <tr>
            <td><?php echo $row['prodName']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><img style="width: 30%;" alt="Bild Flasche" src="../<?php echo $row['prodBild']; ?>"></td>
            <td><?php echo date('d.m.Y', $row['prodDatum']); ?></td>
            <td>
                <a href="index.php?page=product&action=edit&id=<?php echo $row['id']; ?>">Bearbeiten</a> |
                <a href="includes/delete_product.php?id=<?php echo $row['id']; ?>">Löschen</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>