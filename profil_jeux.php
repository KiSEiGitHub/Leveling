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
    <link rel="stylesheet" href="scss/styles.css">
    <title>Jeux</title>
</head>

<body>
<?php require_once 'components/greenbar.php' ?>

<!--Block principal-->
<div id="main-block">
    <!--Image de couverture-->
    <style>
        #cover-image {
            background-image: linear-gradient(to bottom, transparent 30%, black 150%), url("./images/cover-image-test.jpg");
        }
    </style>
        <?php require_once 'components/header_profil.php'?>
</div>


<!--Icônes Ajouter un ami + Envoyer un message -->
<div class="icons-friend-message">
    <img src="assets/img/icons/comment-dots-solid.png" alt="" width="30">
    <img src="assets/img/icons/user-plus-solid.png" alt="" width="30">
</div>


<!--Block du meilleur jeu-->
<div id="best-game">
    <div id="share">
        <img src="assets/img/icons/game.png" alt="" width="70px">
        <div id="text">
            <h1><a href="">Game</a></h1>
            <p><span>0</span> Heures de jeu et <span>0</span> Achievements</p>
        </div>
    </div>
</div>

<!--Block jeux-->
<div id="games-block">
    <h3>JEUX</h3>

    <div class="games-gallery">
        <div class="game">
            <a href=""><img src="assets/img/icons/game.png" alt="" width="120px"></a>
        </div>

        <div class="game">
            <a href=""><img src="assets/img/icons/game.png" alt="" width="120px"></a>
        </div>

        <div class="game">
            <a href=""><img src="assets/img/icons/game.png" alt="" width="120px"></a>
        </div>

        <div class="game">
            <a href=""><img src="assets/img/icons/game.png" alt="" width="120px"></a>
        </div>

        <div class="game">
            <a href=""><img src="assets/img/icons/game.png" alt="" width="120px"></a>
        </div>

        <div class="game">
            <a href=""><img src="assets/img/icons/game.png" alt="" width="120px"></a>
        </div>

        <div class="game">
            <a href=""><img src="assets/img/icons/game.png" alt="" width="120px"></a>
        </div>

        <div class="game">
            <a href=""><img src="assets/img/icons/game.png" alt="" width="120px"></a>
        </div>

    </div>

</div>

</div>

</div>

<div id="wishlist-block">
    <h3>LISTE DE SOUHAIT</h3>

    <div class="games-gallery">
        <div class="game">
            <a href=""><img src="assets/img/icons/game.png" alt="" width="120px"></a>
        </div>

        <div class="game">
            <a href=""><img src="assets/img/icons/game.png" alt="" width="120px"></a>
        </div>

        <div class="game">
            <a href=""><img src="assets/img/icons/game.png" alt="" width="120px"></a>
        </div>

        <div class="game">
            <a href=""><img src="assets/img/icons/game.png" alt="" width="120px"></a>
        </div>

        <div class="game">
            <a href=""><img src="assets/img/icons/game.png" alt="" width="120px"></a>
        </div>

        <div class="game">
            <a href=""><img src="assets/img/icons/game.png" alt="" width="120px"></a>
        </div>

        <div class="game">
            <a href=""><img src="assets/img/icons/game.png" alt="" width="120px"></a>
        </div>

        <div class="game">
            <a href=""><img src="assets/img/icons/game.png" alt="" width="120px"></a>
        </div>

    </div>

</div>

</div>


</div>


</body>

</html>