<?php
require_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AFPA VTC</title>

    <link href="ressources/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <script src="ressources/js/jquery.min.js"></script>
    <script src="ressources/js/script.js"></script>
    <script src="ressources/js/bootstrap.bundle.min.js"></script>
    <script src="ressources/js/fontawesome.all.min.js"></script>

    <style>
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #555 !important;
            color: black;
            text-align: center;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><i class="fas fa-car"></i> AFPA VTC</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link active" href="<?= ROOT . '?action=conducteurs' ?>">Conducteur</a>
            <a class="nav-link" href="<?= ROOT . '?action=vehicules' ?>">Véhicule</a>
            <a class="nav-link" href="<?= ROOT . '?action=emprunts' ?>">Association</a>

        </div>
    </div>
</nav>
</body>
</html>
