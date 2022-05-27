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
    <title>Groupes</title>
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
    <?php require_once 'components/header_profil.php' ?>
</div>


<!--Icônes Ajouter un ami + Envoyer un message -->
<div class="icons-friend-message">
    <img src="assets/img/icons/comment-dots-solid.png" alt="" width="30">
    <img src="assets/img/icons/user-plus-solid.png" alt="" width="30">
</div>


<!--Block du meilleur groupe-->
<div id="best-group">
    <div id="share">
        <img src="assets/img/icons/users-solid.png" alt="" width="80px">
        <div id="text">
            <h1><a href="">#Group</a></h1>
            <p><span>0</span> EXP de contribution</p>
        </div>
    </div>
</div>

<!--Block groupes-->
<div id="groups-block">
    <h3>GROUPES</h3>

    <div class="left-side">
        <div class="friend">
            <img src="assets/img/icons/users-solid.png" alt="" width="80px">
            <div class="text">
                <a href="">#Group</a>
                <p><span>0</span> Membres <span>- 0</span> En ligne <span>- 0</span> En jeu</p>
            </div>
        </div>

        <div class="friend">
            <img src="assets/img/icons/users-solid.png" alt="" width="80px">
            <div class="text">
                <a href="">#Group</a>
                <p><span>0</span> Membres <span>- 0</span> En ligne <span>- 0</span> En jeu</p>
            </div>
        </div>

        <div class="friend">
            <img src="assets/img/icons/users-solid.png" alt="" width="80px">
            <div class="text">
                <a href="">#Group</a>
                <p><span>0</span> Membres <span>- 0</span> En ligne <span>- 0</span> En jeu</p>
            </div>
        </div>

        <div class="friend">
            <img src="assets/img/icons/users-solid.png" alt="" width="80px">
            <div class="text">
                <a href="">#Group</a>
                <p><span>0</span> Membres <span>- 0</span> En ligne <span>- 0</span> En jeu</p>
            </div>
        </div>

    </div>


</div>


</body>

</html>