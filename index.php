<?php
session_start();

require_once("Config/controller.php");
require_once("Config/setup.php");
$controler = new controller("localhost", "leveling", "root", "");
$setup = new setup();
$preference = null;
$userAbout = null;

if (isset($_SESSION['pseudo'])) {
    $user = $controler->getUser($_SESSION['id']);
    $preference = $controler->getUserPreference($_SESSION['id']);
    $userAbout = $controler->getUserAbout($_SESSION['id']);
} else {
    $user = null;
    $_SESSION['id'] = null;
}

if ($userAbout == null) {
    $controler->insertBaseUserAbout($_SESSION['id']);
}

?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS !-->
    <link rel="stylesheet" href="./scss/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap');
    </style>
    <title>Leveling</title>
</head>

<body>

<header>
    <nav>
        <div class="logo">
            <a href="index.php">
                <img src="./images/leveling-logo.png" alt="leveling-logo">
            </a>
        </div>
        <div class="right">
            <label for="search">
                <input type="search" name="search">
            </label>
            <a href="pages/profil/index.php">
                <img src="../../assets/img/UserProfilePicture/<?= $user['img'] ?>" class="nav-user" alt="pfp">
            </a>
            <a href="#">
                <img src="images/settings.png" alt="settings">
            </a>
        </div>
    </nav>
</header>

<a href="inscription.php">inscription</a>
<a href="Deconnexion.php">déco</a>
<a href="./pages/jeux/index.php">jeux</a>

<h1 class="title grey">Bonjour</h1>
<h2 class="sous-title blue">Bonjour</h2>
<h3 class="header-title">Bonjour</h3>
<p class="paragraphe">Bonjour</p>

<!-- Javascript -->
<script src="js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>