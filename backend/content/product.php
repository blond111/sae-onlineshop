<section class="main">
    <div class="container">
        <h1 class="header-main"><?php echo $title; ?></h1>
        <?php
        // Wenn "action=edit" dann öffne die Seite edit.php. Wenn "action=new" dann öffne die Seite new.php ansonst die list.php.

        if (isset($_GET['action']) && $_GET['action'] == "edit") {
            include "content/products/edit.php";
        } elseif(isset($_GET['action']) && $_GET['action'] == "new" ) {
            include "content/products/new.php";
        } else {
            include "content/products/list.php";
        }
        ?>
    </div>
</section>