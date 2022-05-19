<?php
session_start();

require_once("../Config/controller.php");
require_once("../Config/setup.php");
$controler = new controller("localhost", "leveling", "root", "");
$setup = new setup();

if (isset($_SESSION['pseudo'])) {
    $user = $controler->getUser($_SESSION['id']);
} else {
    $user = null;
}

$OneGame = $controler->OneGame($_GET['gameid']);

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
    <title>Game - <?= $OneGame['name'] ?></title>

    <link rel="stylesheet" href="../scss/styles.css">
</head>
<body>
<div id="green-bar">
    <h1>
        <a href="index.php">LEVELING</a>
    </h1>
    <div class="nav-icons">
        <input type="text" name="search" placeholder="Rechercher" id="search">
        <?php
        if (isset($_SESSION['pseudo'])) {
            ?>
            <a href="../profil.php">
                <img src="../assets/img/UserProfilePicture/<?= $user['img'] ?>" class="nav-user" alt="pfp">
            </a>
            <?php
        } else { ?>
            <a href="../profil.php">
                <img class="nav-user" src="../images/user-circle.png" alt="">
            </a>
        <?php } ?>
        <a href="settings.php">
            <img class="nav-user" src="../images/settings.png" alt="">
        </a>
    </div>
</div>

<main id="OneGame-block">
    <div id="frontDescription">
        <div class="img-container tagert-block-game">
            <img src="../assets/img/insert_games/pp/<?= $OneGame['img_pp'] ?>" alt="">
        </div>
        <div class="Desc-Container tagert-block-game">
            <h1><?= $OneGame['name'] ?></h1>
            <div id="DescriptionGame">
                <div class="description-text">
                    <p>
                        <?= $OneGame['description'] ?>
                    </p>
                </div>
                <hr>
                <div class="description-note">
                    <div class="description-cercle">
                        <p>
                            <?= $OneGame['note_test'] ?>/20
                        </p>
                    </div>
                    <div class="descrioption-cercle-text">
                        <h2>Note de test</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="bottomDescription">
        <div id="about">
            <h2>About</h2>
            <hr>
            <div class="flex-item-about">
                <div class="circle"></div>
                <p>Prix :</p>
                <p>
                    <?= $OneGame['prix'] ?>€
                </p>
            </div>
            <div class="flex-item-about">
                <div class="circle"></div>
                <p>Sorti le :</p>
                <p>
                    <?= $OneGame['date_sortie'] ?>
                </p>
            </div>
            <div class="flex-item-about">
                <div class="circle"></div>
                <p>Genre :</p>
                <p>
                    <?= $OneGame['genre'] ?>
                </p>
            </div>
            <div class="flex-item-about">
                <div class="circle"></div>
                <p>Platformes :</p>
                <p>
                    <?= $OneGame['plateforme'] ?>
                </p>
            </div>
        </div>

        <div id="img-container">
            <img src="../assets/img/insert_games/banner/<?= $OneGame['img_banner'] ?>" alt="">
        </div>
    </div>
</main>


</body>
</html>
