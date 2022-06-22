<?php
session_start();

require_once("../../BackEnd/controller.php");
require_once("../../BackEnd/setup.php");
$controler = new controller("localhost", "leveling", "root", "");
$setup = new setup();

if (isset($_SESSION['pseudo'])) {
    $user = $controler->getUserById($_SESSION['id']);
    extract((array)$user);
} else {
    $user = null;
}

$OneGame = $controler->OneGame($_GET['gameid']);

// Très important elle permet de faire du destructuting de tableau
// (array) permet de convertir en tableau
extract((array)$OneGame);

if (!$OneGame) {
    header('Location: ./');
}

?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Game - <?= $name ?></title>

    <link rel="stylesheet" href="../../scss/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
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
            <a href="../../pages/profil/index.php">
                <img src="../../assets/img/UserProfilePicture/<?= $img ?>" class="nav-user" alt="pfp">
            </a>
            <a href="#">
                <img src="../../images/settings.png" alt="settings">
            </a>
        </div>
    </nav>
</header>
<div class="parent">
    <div class="block-photo">
        <img src="../../assets/img/insert_games/pp/<?= $img_pp ?>" alt="photo du jeu">
    </div>
    <div class="block-about-game">
        <h2><?= $name ?></h2>
        <div class="description-block">
            <p id="desc">
                <?= $description ?>
            </p>
            <div class="note-container">
                <div class="circle-note">
                    <p><?= $note_test ?>/20</p>
                </div>
                <h3>Note de test</h3>
            </div>
        </div>
    </div>
    <div class="block-about">
        <h3>ABOUT</h3>
        <div class="about-container">
            <div class="about-item">
                <div class="circle"></div>
                <span>Prix :</span>
                <span class="blue"><?= $prix ?>€</span>
            </div>
            <div class="about-item">
                <div class="circle"></div>
                <span>Sorti le :</span>
                <span class="blue"><?= $date_sortie ?></span>
            </div>
            <div class="about-item">
                <div class="circle"></div>
                <span>Genre :</span>
                <span class="blue"><?= $genre ?></span>
            </div>
            <div class="about-item">
                <div class="circle"></div>
                <span>Plateforme :</span>
                <span class="blue"><?= $plateforme ?></span>
            </div>
            <div class="about-item">
                <div class="circle"></div>
                <span>Classification :</span>
                <span class="blue"><?= $classification ?></span>
            </div>
        </div>
    </div>
    <div class="block-asset-game">
        <img src="../../assets/img/insert_games/banner/<?= $img_banner ?>" alt="">
        <form action="#" method="post">
            <div class="Button-Onegame-wish">
                <input class="btn btn-warning" type="submit" name=onegame-wish value="Ajouter à la liste de souhaits">
            </div>
            <div class="Button-Onegame-insert">
                <input class="btn btn-info" type="submit" name=onegame-user value="Ajouter à la galerie">
            </div>
            <?php
            if (isset($_POST['onegame-wish'])) {
                $controler->insertGamesUser('user_wish', $_SESSION['id'], $_GET['gameid']);
            }
            if (isset($_POST['onegame-user'])) {
                $controler->insertGamesUser('user_games', $_SESSION['id'], $_GET['gameid']);
            }

            ?>
        </form>
    </div>
</div>

</body>

</html>