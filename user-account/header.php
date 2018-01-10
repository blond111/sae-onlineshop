<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backend</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,300,400,700">
    <link rel="stylesheet" href="../assets/css/Navigation-with-Search1.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="css/style.css">
    <script defer src="../assets/js/main.js"></script>
</head>
<body>
    <div>
        <nav class="navbar navbar-default navigation-clean-search">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand header-logo" href="../index.php?page=home">
                        <img src="../assets/img/logo.png">
                    </a>
                    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div
                        class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav">
                        <li role="presentation">
                            <a href="index.php?page=account">Account </a>
                        </li>
                        <li role="presentation">
                            <a href="index.php?page=address">Adresse </a>
                        </li>
                        <li role="presentation">
                            <a href="index.php?page=orders">Bestellungen </a>
                        </li>
                        <li role="presentation">
                            <a href="../index.php?page=products">Zurück zum Shop</a>
                        </li>
                    </ul>
                    <a class="btn btn-default navbar-btn navbar-right action-button" role="button" href="../index.php?page=logout">LOGOUT </a>
                </div>
            </div>
        </nav>
    </div>