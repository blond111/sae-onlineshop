<section class="main">
    <div class="container">
        <h1 class="header-main"><?php echo $title; ?></h1>
        <?php
        // Wenn "action=edit" dann öffne die Seite edit.php ansonst die list.php

        if (isset($_GET['action']) && $_GET['action'] == "edit") {
            include "content/address/edit.php";
        } else {
            include "content/address/list.php";
        }
        ?>
    </div>
</section>