<table class="table">
    <thead>
    <tr>
        <th width="200px">Bestellnummer</th>
        <th width="200px">Kundennummer</th>
        <th width="200px">Bestelldatum</th>
        <th>Aktionen</th>
    </tr>
    </thead>
    <tbody>
    <?php
    // Auslesen von der Tabelle Cart welche als Order definiert sind!
    
    $sql = "SELECT * FROM cart WHERE order_finished = 1";
    $res = mysqli_query($dblink, $sql);

    while($row = mysqli_fetch_assoc($res)){
        ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['user_id']; ?></td>
            <td><?php echo date('d.m.Y', $row['cartDatum']); ?></td>
            <td>
                <a href="index.php?page=orders&action=edit&id=<?php echo $row['id']; ?>">Bearbeiten</a> |
                <a href="includes/delete_orders.php?id=<?php echo $row['id']; ?>">Löschen</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>