<?php
session_start();

require_once("../../Config/controller.php");
require_once("../../Config/setup.php");
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
    <title>Nos Jeux</title>
    <link rel="stylesheet" href="../../scss/styles.css">
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
            <a href="../profil/index.php">
                <img src="../assets/img/UserProfilePicture/<?= $user['img'] ?>" class="nav-user" alt="pfp">
            </a>
            <?php
        } else { ?>
            <a href="../profil/index.php">
                <img class="nav-user" src="../../images/user-circle.png" alt="">
            </a>
        <?php } ?>
    </div>
</div>

<!-- main -->
<main id="games-block">
    <h1>TOUS LES JEUX</h1>
    <div id="AllGames">
        <?php
        $AllGames = $controler->getAllGames();
        foreach ($AllGames as $Games) {
            ?>
            <a href="OneGame.php?gameid=<?= $Games['idinsert_games'] ?>">
                <img src="../../assets/img/insert_games/pp/<?= $Games['img_pp'] ?>" alt="arza">
            </a>
        <?php } ?>
    </div>
</main>
</body>
</html>