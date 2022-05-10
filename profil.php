<?php
session_start();
if ($_SESSION['pseudo'] == null) {
    header('Location: Connexion.php');
}

require_once("Config/controller.php");
require_once("Config/setup.php");
$controler = new controller("localhost", "leveling", "root", "");
$setup = new setup();

$user = $controler->getUser($_SESSION['id']);
$ranks = $setup->getLvl($user['lvl']);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS !-->
    <link rel="stylesheet" href="./scss/styles.css">
    <title>Profil</title>
</head>
<body>

<!--Block principal-->
<div id="main-block">
    <!--Image de couverture-->
    <div id="cover-image">
        <img src="images/cover-image-exemple.png" alt="">
        <p id="username">
            @<?= $user['pseudo'] ?>
        </p>
        <ul>
            <li>Description</li>
            <li>Groupes</li>
            <li>Lives</li>
            <li>Jeux</li>
            <li>Amis</li>
        </ul>
        <div id="profile-picture">
            <img src="assets/img/UserProfilePicture/<?= $user['img'] ?>" alt="pfp" id="pp">
            <?php
            if ($ranks === null) {
                echo "<p>No ranks</p>";
            } else {
                ?>
                <img id="lvl-icon" src="<?= $ranks[0] ?>" alt="rank" width="65px">
                <img id="lvl-rank" src="<?= $ranks[1] ?>" alt="ranks" width="400px">
            <?php } ?>
        </div>
    </div>


    <div id="about-block">
        <h3>ABOUT</h3>
        <ul>
            <li>
                <span>648614</span> EXP
            </li>

            <li><span>198</span> jeux possédés</li>
            <li><span>150</span> jeux terminés</li>
            <li><span>100</span> jeux terminés à 100%</li>
            <li>Jeu favori : <span>Assassin's Creed : Brotherhood</span></li>
            <li>Genre favori : <span>Action, Tactique</span></li>
            <li>Plateforme favorite : <span>PC</span></li>
            <li>Inscrit depuis le : <span>09/05/2022</span></li>
            <li>Dernière connexion le : <span>09/05/2022</span></li>
        </ul>
    </div>

    <div id="feed-block"></div>

</div>


</body>
</html>