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
</head>

<body>
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
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">
                            <i class="glyphicon glyphicon-user icon icon-log"></i>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation">
                                <a href="index.php?page=login">Einloggen</a>
                            </li>

                            <li role="presentation">
                                <a href="index.php?page=registrierung">Registrieren</a>
                            </li>
                        </ul>
                    </li>

                    <li class="shop-cart">
                        <a href="index.php?page=login">
                            <div class="mycart-container pull-right js-open-cart">
                                <img src="assets/img/shopping_bag1600.png" class="bag-pic">
                                <span class="mycart-counter" style="width: 20px;">1</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    