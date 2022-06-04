<?php
session_start();
if ($_SESSION['pseudo'] == null) {
    header('Location: Connexion.php');
}

require_once("../../Config/controller.php");
require_once("../../Config/setup.php");
$controler = new controller("localhost", "leveling", "root", "");
$setup = new setup();

$user = $controler->getUser($_SESSION['id']);
$ranks = $setup->getLvl($user['lvl']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap');
    </style>
    <link rel="stylesheet" href="../../scss/styles.css">
    <title>Préférences du compte</title>
</head>

<body>

<!--Barre de navigation DEBUT -->
<div id="green-bar">
    <h1>
        <a href="../../index.php">LEVELING</a>
    </h1>
    <div class="nav-icons">
        <input type="text" name="search" placeholder="Rechercher" id="search">
        <?php
        if (isset($_SESSION['pseudo'])) {
            ?>
            <a href="../../pages/profil/index.php">
                <img src="../../assets/img/UserProfilePicture/<?= $user['img'] ?>" class="nav-user" alt="pfp">
            </a>
            <?php
        } else { ?>
            <a href="../../pages/profil/index.php">
                <img class="nav-user" src="../../images/user-circle.png" alt="">
            </a>
        <?php } ?>
        <a href="./preferences.php">
            <img class="nav-user" src="../../images/settings.png" alt="">
        </a>
    </div>
</div>
<!--Barre de navigation FIN -->

<!--Block principal-->
<div id="main-block">

    <!--Block amis-->
    <div id="settings-block">
        <h3>PRÉFÉRENCES DU PROFIL</h3>
        <form action="#" method="post">

            <label for="pfp">
                <span>Photo de profil</span>
                <img class="pfp-user" src="../../assets/img/UserProfilePicture/<?= $user['img'] ?>"
                     alt="photo de profil de l'utilisateur">
                <input type="file" name="pfp">
            </label>

            <label for="banner">
                <span>Image de couverture</span>
                <img class="banner-user" src="../../assets/img/UserProfilBanner/<?= $user['img_banner'] ?>"
                     alt="bannière de l'utilisateur">
                <input type="file" name="banner">
            </label>

            <label for="pseudo">
                <span>Pseudo</span>
                <input class="inputtext" type="text" name="pseudo">
            </label>

            <label for="prenom">
                <span>Prénom</span>
                <input class="inputtext" type="text" name="prenom">
            </label>

            <label for="nom">
                <span>Nom</span>
                <input class="inputtext" type="text" name="nom">
            </label>

            <label for="DateNaissance">
                <span>Date de naissance</span>
                <input class="inputtext" type="date" name="DateNaissance">
            </label>

            <label for="age">
                <span>Age</span>
                <input class="inputtext" type="number" name="age">
            </label>

            <label for="pays">
                <span>Pays</span>
                <select class="inputtext" name="pays" id="pays">
                    <option value="france">France</option>
                </select>
            </label>

            <label for="JeuFav">
                <span>Jeu favori</span>
                <select class="inputtext" name="jeux" id="jeux">
                    <option value="Valorant">Valorant</option>
                </select>
            </label>

            <label for="GenreFav">
                <span>Genre favori</span>
                <select class="inputtext" name="genre" id="genre">
                    <option value="aventure">Aventure</option>
                </select>
            </label>

            <label for="platforme">
                <span>Platforme favorite</span>
                <select class="inputtext" name="platforme" id="#">
                    <option value="PC">PC</option>
                </select>
            </label>

            <label for="Bio">
                <span>Biographie</span>
                <input class="inputtext" type="text" name="bio">
            </label>

            <label for="submit">
                <input class="inputtext" type="submit" name="btn" value="Valider">
            </label>
        </form>
    </div>
</div>
</body>

</html>