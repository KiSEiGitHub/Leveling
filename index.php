<?php
session_start();

require_once("BackEnd/controller.php");
require_once("BackEnd/setup.php");
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
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false"
                        style="border: none; outline: none; background: none;">
                    <?php if (isset($_SESSION['id'])): ?>
                        <img src="assets/img/UserProfilePicture/<?= $user['img'] ?>" class="nav-user" alt="pfp"
                             style="width: 40px; border-radius: 50%;">
                    <?php else: ?>
                        <img src="images/user-circle.png" class="nav-user" alt="pfp"
                             style="width: 40px; border-radius: 50%;">
                    <?php endif; ?>
                </button>
                <?php if (isset($_SESSION['id'])): ?>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="./pages/profil/index.php">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Paramètres</a></li>
                        <li><a class="dropdown-item" href="Deconnexion.php">Se déconnecter</a></li>
                    </ul>
                <?php else: ?>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="inscription.php">S'inscrire</a></li>
                        <li><a class="dropdown-item" href="Connexion.php">Se connecter</a></li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</header>

<a href="./pages/jeux/index.php">jeux</a>

<!-- Javascript -->
<script src="js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>