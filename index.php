<?php
session_start();

if ($_SESSION['pseudo'] == null) {
    header('Location: Connexion.php');
    exit;
}

require_once("Config/controller.php");
require_once("Config/setup.php");
$controler = new controller("localhost", "leveling", "root", "");
$setup = new setup();

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Leveling</title>

    <!--  CSS  -->
    <link rel="stylesheet" href="scss/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<h3>Bonjour <?= $_SESSION['pseudo'] ?></h3>
<a href="Deconnexion.php">deco</a>
<a href="profil.php">profil</a>
<script src="js/main.js"></script>
</body>
</html>