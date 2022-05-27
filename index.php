<?php
session_start();

require_once("Config/controller.php");
require_once("Config/setup.php");
$controler = new controller("localhost", "leveling", "root", "");
$setup = new setup();

if (isset($_SESSION['pseudo'])) {
    $user = $controler->getUser($_SESSION['id']);
} else {
    $user = null;
}

?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- style -->
    <link rel="stylesheet" href="scss/styles.css">

    <!-- CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Leveling</title>
</head>

<body>
<!--Barre de navigation-->
<div id="green-bar">
    <h1>
        <a href="index.php">LEVELING</a>
    </h1>
    <div class="nav-icons">
        <input type="text" name="search" placeholder="Rechercher" id="search">
        <?php
        if (isset($_SESSION['pseudo'])) {
            ?>
            <a href="./profil.php">
                <img src="assets/img/UserProfilePicture/<?= $user['img'] ?>" class="nav-user" alt="pfp">
            </a>
            <?php
        } else { ?>
            <a href="./profil.php">
                <img class="nav-user" src="./images/user-circle.png" alt="">
            </a>
        <?php } ?>
        <a href="./preferences.php"><img class="nav-user" src="./images/settings.png" alt=""></a>
    </div>
</div>

<!-- ça c'est juste pour le dev -->
<!-- on supprimera après -->
<a href="Deconnexion.php">deco</a>
<a href="profil.php">profil</a>
<a href="search.php">search</a>
<a href="insert_games.php">ajouter un jeu</a>
<a href="testpays.php">Pays</a>
<a href="preferences.php"> Préferences</a>

<!-- Javascript -->
<script src="js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>