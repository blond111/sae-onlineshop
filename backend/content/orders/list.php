<table class="table">
    <thead>
    <tr>
        <th width="200px">Bestellnummer</th>
        <th width="200px">Kundennummer</th>
        <th width="200px">Bestelldatum</th>
        <th width="200px">Produkt</th>
        <th width="200px">Qty</th>
        <th width="200px">Total Preis</th> 
        <th>Aktionen</th>
    </tr>
    </thead>
    <tbody>
    <?php
    // TO Query richtig setzten !!
    $sql = "SELECT products.*, users.username FROM products LEFT JOIN users ON products.user_id = users.id ORDER BY id DESC";
    $res = mysqli_query($dblink, $sql);

    while($row = mysqli_fetch_assoc($res)){
        ?>
        <tr>
            <td><?php echo $row['cart_id']; ?></td>
            <td><?php echo $row['user_id']; ?></td>
            <td><?php echo date('d.m.Y', $row['orderDatum']); ?></td>
            <td><?php echo $row['prod_id']; ?></td>
            <td><?php echo $row['qty']; ?></td>
            <td><?php echo $row['PreisTotal']; ?></td>
            <td>
                <a href="index.php?page=orders&action=edit&id=<?php echo $row['id']; ?>">Bearbeiten</a> |
                <a href="includes/delete_orders.php?id=<?php echo $row['id']; ?>">Löschen</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>