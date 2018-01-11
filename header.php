<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Onlineshop</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,300,400,700">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button1.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script defer src="assets/js/main.js"></script> <!-- Best practise in 2018: JS in header & defer/async, damit der Browser preloaden kann. -->
</head>

<body class="body-<?php echo $page; ?>">
    <nav class="navbar navbar-default navbar-fixed-top navigation-clean-button">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php?page=home">
                    <img alt="Logo Shine & Fine" src="assets/img/logo.png" class="logo">
                </a>

                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="navcol-1">
                <p class="navbar-text navbar-left actions">
                    <a class="btn btn-default action-button" role="button" href="index.php?page=products">SHOP NOW</a>
                </p>

                <ul class="nav navbar-nav">
                    <li role="presentation">
                        <a href="index.php?page=detail">Unser Produkt</a>
                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#">
                            <i class="glyphicon glyphicon-user icon <?php if ($myusergroup != -1) echo 'icon-log' ?>"></i>
                        </a>

                        <?php if ($myusergroup >= 0) { ?>
                        <ul class="dropdown-menu" role="menu">

                            <li role="presentation">
                                <a href="user-account/index.php?page=account">Account</a>
                            </li>

                            <li role="presentation">
                                <a href="user-account/index.php?page=address">Adresse</a>
                            </li>

                            <li role="presentation">
                                <a href="user-account/index.php?page=orders">Bestellungen</a>
                            </li>

                            <?php if ($myusergroup == 1) { ?>
                            <li role="presentation">
                                <a href="backend/index.php?page=dashboard">Admin-Dashboard</a>
                            </li>
                            <?php }?>

                            <li role="presentation">
                                <a href="index.php?page=logout">Logout</a>
                            </li>
                            
                        </ul>
                        <?php }
                        
                        else { ?>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation">
                                <a href="index.php?page=login">Einloggen</a>
                            </li>

                            <li role="presentation">
                                <a href="index.php?page=registrierung">Registrieren</a>
                            </li>
                        </ul>
                        <?php } ?>
                    </li>

                    <li class="shop-cart">
                        <a href="#">
                            <div class="mycart-container pull-right <?php if($_GET['cart'] === 'open') echo 'mycart-container--hidden' ?>">
                                <img src="assets/img/shopping_bag1600.png" class="bag-pic cart-pic-header">
                                <span class="mycart-counter-header">1</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>