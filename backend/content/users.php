<section class="main">
    <div class="container">
        <h1 class="header-main"><?php echo $title; ?></h1>
        <?php
        // Wenn "action=edit" dann öffne die Seite edit.php. Wenn "action=new" dann öffne die Seite new.php ansonst die list.php.
        
        if (isset($_GET['action']) && $_GET['action'] == "edit") {
            include "content/users/edit.php";
        } elseif(isset($_GET['action']) && $_GET['action'] == "new" ) {
            include "content/users/new.php";
        } else {
            include "content/users/list.php";
        }
        ?>
    </div>
</section>