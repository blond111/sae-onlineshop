<section class="main">
    <div class="container">
        <h1 style="font-weight: 300"><?php echo $title; ?></h1>
        <?php
        if (isset($_GET['action']) && $_GET['action'] == "edit") {
            include "content/address/edit.php";
        } else {
            include "content/address/list.php";
        }
        ?>
    </div>
</section>