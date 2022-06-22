<?php
session_start();
if ($_SESSION['pseudo'] == null) {
    header('Location: ../../Connexion.php');
}

require_once("../../BackEnd/controller.php");
require_once("../../BackEnd/setup.php");
$controler = new controller("localhost", "leveling", "root", "");
$setup = new setup();

$user = $controler->getUser($_SESSION['id']);
$userAbout = $controler->getUserAbout($_SESSION['id']);
$userPreference = $controler->getUserPreference($_SESSION['id']);
$ranks = $setup->getLvl($user->lvl);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS !-->
    <link rel="stylesheet" href="../../scss/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap');
    </style>
    <title>Profil</title>
</head>

<body>

<!--Image de couverture DEBUT -->
<style>
    #cover-image {
        background-image: linear-gradient(to bottom, transparent 30%, black 150%), url("../../assets/img/UserProfilBanner/<?= $user->img_banner ?>");
        height: 250px;
    }
</style>
<!--Image de couverture FIN -->

<!-- Nav début -->
<header>
    <nav>
        <div class="logo">
            <a href="../../index.php">
                <img src="../../images/leveling-logo.png" alt="leveling-logo">
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
                    <img src="../../assets/img/UserProfilePicture/<?= $user->img ?>" class="nav-user" alt="pfp"
                         style="width: 40px; border-radius: 50%;">
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="index.php">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Paramètres</a></li>
                    <li><a class="dropdown-item" href="../../Deconnexion.php">Se déconnecter</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- Nav Fin -->

<main>
    <!--  Profil bannière + photo + nav only début -->
    <div class="profil-grid">
        <div id="cover-image">
            <div class="nav">
                <div class="pseudo">
                    <h1 class="title white">@<?= $user->pseudo ?></h1>
                </div>
                <div class="li">
                    <ul>
                        <li>
                            <a href="index.php">Description</a>
                        </li>
                        <li>
                            <a href="jeux.php">Jeux</a>
                        </li>
                        <li>
                            <a href="groupes.php">Groupes</a>
                        </li>
                        <li>
                            <a href="amis.php">Amis</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="bio">
                <span class="bold">Bio :</span>
                <span class="bold"><?= $user->bio ?></span>
            </div>
        </div>
        <img src="../../assets/img/UserProfilePicture/<?= $user->img ?>" alt="pfp" id="pp">
        <?php
        if ($ranks === null) {
            echo "<p>No ranks</p>";
        } else {

            ?>
            <img id="lvl-icon" src="../../<?= $ranks[0] ?>" alt="rank" width="65px">
            <img id="lvl-rank" src="../../<?= $ranks[1] ?>" alt="ranks" width="400px">
        <?php } ?>
    </div>
    <!--  Profil bannière + photo + nav only fin -->

    <!--  Share block début -->
    <div class="bottom">
        <p style="padding: 10px">Que voulez-vous partager ?</p>
    </div>
    <!--  Share block  fin -->


    <div class="parent">
        <!--  ABOUT BLOCK début  -->
        <div class="div1">
            <h3 class="header-title center grey bold">ABOUT</h3>
            <div class="about-section">
                <div class="enfant">
                    <span class="blue bold">
                        <?= $user->prenom ?>
                        <?= $user->nom ?>
                    </span>
                </div>
                <div class="enfant">
                    <span class="bold">Discord : </span>
                    <span class="blue bold"><?= $userPreference->discord ?></span>
                </div>
                <div class="enfant">
                    <span class="bold">Steam : </span>
                    <span class="blue bold">@<?= $userPreference->steam ?></span>
                </div>
                <div class="enfant">
                    <span class="bold">Twitch : </span>
                    <span class="blue bold">@<?= $userPreference->twitch ?></span>
                </div>
                <div class="enfant">
                    <span class="bold blue"><?= $userAbout->exp ?></span>
                    <span class="bold">EXP</span>
                </div>
                <div class="enfant">
                    <span class="bold blue"><?= $userAbout->jeux_termine ?></span>
                    <span class="bold">Jeux terminés</span>
                </div>
                <div class="enfant">
                    <span class="bold blue"><?= $userAbout->jeux_possede ?></span>
                    <span class="bold">Jeux possédés</span>
                </div>
                <div class="enfant">
                    <span class="bold blue"><?= $userAbout->jeux_cent ?></span>
                    <span class="bold">Jeux terminés à 100%</span>
                </div>
                <div class="enfant">
                    <span class="bold">Jeu favori :</span>
                    <span class="bold blue"><?= $userAbout->jeu_fav ?></span>
                </div>
                <div class="enfant">
                    <span class="bold">Genre favori :</span>
                    <span class="bold blue"><?= $userAbout->genre_fav ?></span>
                </div>
                <div class="enfant">
                    <span class="bold">Plateforme : </span>
                    <span class="bold blue"><?= $userAbout->plateforme_fav ?></span>
                </div>
                <div class="enfant">
                    <span class="bold">Inscris le : </span>
                    <span class="bold blue"><?= $userAbout->inscription ?></span>
                </div>
            </div>
        </div>
        <!--  ABOUT BLOCK Fin  -->
        <div class="div2">
            <h3 class="header-title center grey bold">ACTUALITES</h3>
        </div>
    </div>

</main>

<script src="../../js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</script>
</body>

</html>