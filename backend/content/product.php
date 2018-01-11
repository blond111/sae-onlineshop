<section class="main">
    <div class="container">
        <h1 calss="header-main"><?php echo $title; ?></h1>
        <?php
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