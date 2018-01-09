<section class="main">
    <div class="container">
        <h1 style="font-weight: 300"><?php echo $title; ?></h1>
        <?php
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