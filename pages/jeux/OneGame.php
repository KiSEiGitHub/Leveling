<?php
session_start();

require '../../BackEnd/modele.php';

// instancier notre modele
$modele = new modele("localhost", "leveling", "root", "");

if (isset($_SESSION['pseudo'])) {
    $user = $modele->findById('tblUsers', 'PK_Users', (int)$_SESSION['id'], 'fetch');
    extract((array)$user);
} else {
    $user = null;
}

// va chercher tous nos jeux
$OneGame = $modele->findById('tblGames', 'PK_Games', $_GET['gameid'], 'fetch');

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
    <title>Game - <?= $UQ_Games_Name ?></title>

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
                <img src="../../assets/img/UserProfilePicture/<?= $UQ_Users_ProfilePicture ?>" class="nav-user" alt="pfp">
            </a>
            <a href="#">
                <img src="../../images/settings.png" alt="settings">
            </a>
        </div>
    </nav>
</header>
<div class="parent">
    <div class="block-photo">
        <img src="../../assets/img/insert_games/pp/<?= $UQ_Games_Img ?>" alt="photo du jeu">
    </div>
    <div class="block-about-game">
        <h2><?= $UQ_Games_Name ?></h2>
        <div class="description-block">
            <p id="desc">
                <?= $UQ_Games_Description ?>
            </p>
            <div class="note-container">
                <div class="circle-note">
                    <p><?= $UQ_Games_NoteTest ?>/20</p>
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
                <span class="blue"><?= $UQ_Games_Price ?>€</span>
            </div>
            <div class="about-item">
                <div class="circle"></div>
                <span>Sorti le :</span>
                <span class="blue"><?= $UQ_Games_DateSortie ?></span>
            </div>
            <div class="about-item">
                <div class="circle"></div>
                <span>Genre :</span>
                <span class="blue"><?= $UQ_Games_Genre ?></span>
            </div>
            <div class="about-item">
                <div class="circle"></div>
                <span>Plateforme :</span>
                <span class="blue"><?= $UQ_Games_Plateforme ?></span>
            </div>
        </div>
    </div>
    <div class="block-asset-game">
        <img src="../../assets/img/insert_games/banner/<?= $UQ_Games_ImgBanner ?>" alt="">
        <form action="#" method="post">
            <div class="Button-Onegame-wish">
                <input class="btn btn-warning" type="submit" name=onegame-wish value="Ajouter à la liste de souhaits">
            </div>
            <div class="Button-Onegame-insert">
                <input class="btn btn-info" type="submit" name=onegame-user value="Ajouter à la galerie">
            </div>
            <?php
            if (isset($_POST['onegame-wish'])) {
                $modele->insertUserGames('tblUserWishs', $_SESSION['id'], $_GET['gameid']);
            }
            if (isset($_POST['onegame-user'])) {
                $modele->insertUserGames('tblUserGames', $_SESSION['id'], $_GET['gameid']);
            }

            ?>
        </form>
    </div>
</div>

</body>

</html>