<a href="index.php?page=users&action=new" class="btn btn-custom">Neuen User anlegen</a>
<table class="table">
    <thead>
    <tr>
        <th width="200px">Vorname</th>
        <th width="200px">Nachname</th>
        <th width="200px">E-mail</th>
        <th width="200px">Starße</th>
        <th width="200px">Tür/Appartment</th>
        <th width="200px">PLZ</th>
        <th width="200px">Ort</th>
        <th width="200px">Username</th>
        <th width="200px">Passwort</th>

        <th>Aktionen</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $sql = "SELECT * FROM users ORDER BY id ASC";
    $res = mysqli_query($dblink, $sql);

    while($row = mysqli_fetch_assoc($res)){
        ?>
        <tr>
            <td><?php echo $row['fname']; ?></td>
            <td><?php echo $row['lname']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['street']; ?></td>
            <td><?php echo $row['door']; ?></td>
            <td><?php echo $row['plz']; ?></td>
            <td><?php echo $row['ort']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['password']; ?></td>

            <td>
                <a href="index.php?page=users&action=edit&id=<?php echo $row['id']; ?>">Bearbeiten</a> |
                <a href="includes/delete_users.php?id=<?php echo $row['id']; ?>">Löschen</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>