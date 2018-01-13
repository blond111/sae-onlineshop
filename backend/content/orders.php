<section class="main">
    <div class="container">
        <h1 class="header-main"><?php echo $title; ?></h1>
        <?php
        // Wenn "action=edit" dann öffne die Seite edit.php ansonst die list.php
        
        if (isset($_GET['action']) && $_GET['action'] == "edit") {
            include "content/orders/edit.php";
        } else {
            include "content/orders/list.php";
        }
        ?>
    </div>
</section>