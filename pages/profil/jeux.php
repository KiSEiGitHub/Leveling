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
    <title>Jeux</title>
</head>

<body>
<!--Barre de navigation-->
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
<!--Barre de navigation-->

<!--Block principal-->
<div id="main-block">
    <!--Image de couverture-->
    <style>
        #cover-image {
            background-image: linear-gradient(to bottom, transparent 30%, black 150%), url("../../images/cover-image-test.jpg");
        }
    </style>
    <!--Image de couverture-->

    <!--  HEADER PROFIL  -->
    <div id="cover-image">
        <p id="username">
            @<?= $user['pseudo'] ?>
        </p>
        <ul>
            <li class="border-white">
                <a href="../../pages/profil/index.php">Description</a>
            </li>
            <li class="border-white">
                <a href="../../pages/profil/jeux.php">Jeux</a>
            </li>
            <li class="border-white">
                <a href="groupes.php">Groupes</a>
            </li>
            <li>
                <a href="amis.php">Amis</a>
            </li>
        </ul>

        <div id="profile-picture">
            <img src="../../assets/img/UserProfilePicture/<?= $user['img'] ?>" alt="pfp" id="pp">
            <?php
            if ($ranks === null) {
                echo "<p>No ranks</p>";
            } else {

                ?>
                <img id="lvl-icon" src="../../<?= $ranks[0] ?>" alt="rank" width="65px">
                <img id="lvl-rank" src="../../<?= $ranks[1] ?>" alt="ranks" width="400px">
            <?php } ?>
        </div>
    </div>
    <!--  HEADER PROFIL  -->

    <!--Icônes Ajouter un ami + Envoyer un message -->
    <div class="icons-friend-message">
        <a href="settings.php"><img src="../../assets/img/icons/paintbrush-solid.png" alt=""
                                    width="30"></a>
        <img src="../../assets/img/icons/comment-dots-solid.png" alt="" width="30">
        <img src="../../assets/img/icons/user-plus-solid.png" alt="" width="30">
    </div>
    <!--Icônes Ajouter un ami + Envoyer un message -->


    <!--Block du meilleur jeu-->
    <div id="best-game">
        <div id="share">
            <img src="../../assets/img/icons/game.png" alt="" width="70px">
            <div id="text">
                <h1><a href="">Game</a></h1>
                <p><span>0</span> Heures de jeu et <span>0</span> Achievements</p>
            </div>
        </div>
    </div>
    <!--Block du meilleur jeu-->

    <!--Block jeux-->
    <div id="games-block">
        <h3>GALLERIE</h3>

        <div class="game-filter">
            <p>Trier par</p>
            <button id="OuiMonsieur">Date d'acquisition</button>
            <button id="OuiMonsieur">Genre</button>
            <button id="OuiMonsieur">Terminé à 100%</button>
            <button id="OuiMonsieur">Date de sortie</button>
            <button id="OuiMonsieur">Evaluation</button>
            <button id="OuiMonsieur">Dernière utilisation</button>
        </div>

        <div class="games-gallery">
            <?php
            $AllGames = $controler->getAllGames();
            foreach ($AllGames as $OneGames) { ?>
                <div class="Game">
                    <a href="../jeux/OneGame.php?gameid=<?= $OneGames['idinsert_games'] ?>">
                        <img src="../../assets/img/insert_games/pp/<?= $OneGames['img_pp'] ?>" alt="">
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>

    <div id="games-block">
        <h3>LISTE DE SOUHAIT</h3>

        <div class="games-gallery">
            <?php
            $AllGames = $controler->getAllGames();
            foreach ($AllGames as $OneGames) { ?>
                <div class="Game">
                    <a href="../jeux/OneGame.php?gameid=<?= $OneGames['idinsert_games'] ?>">
                        <img src="../../assets/img/insert_games/pp/<?= $OneGames['img_pp'] ?>" alt="">
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
    <!--Block jeux-->

    <script src="../../js/main.js"></script>
</body>

</html>