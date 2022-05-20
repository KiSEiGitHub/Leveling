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
    <title>Amis</title>
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
                <a href="./profil.php">
                    <img src="assets/img/UserProfilePicture/<?= $user['img'] ?>" class="nav-user" alt="pfp">
                </a>
            <?php
            } else { ?>
                <a href="./profil.php">
                    <img class="nav-user" src="./images/user-circle.png" alt="">
                </a>
            <?php } ?>
            <a href="./settings.php"><img class="nav-user" src="./images/settings.png" alt=""></a>
        </div>
    </div>

    <!--Block principal-->
    <div id="main-block">
        <!--Image de couverture-->
        <style>
            #cover-image {
                background-image: linear-gradient(to bottom, transparent 30%, black 150%), url("./images/cover-image-test.jpg");
            }
        </style>
        <div id="cover-image">
            <p id="username">
                @<?= $user['pseudo'] ?>
            </p>
            <ul>
                <li class="border-white">
                    <a href=" ./profil.php">Description</a>
                </li>
                <li class="border-white">
                    <a href="Jeux/index.php">Jeux</a>
                </li>
                <li class="border-white">
                    <a href=" ./profil_groupes.php">Groupes</a>
                </li>
                <li>
                    <a href="./profil_amis.php">Amis</a>
                </li>
            </ul>


            <!--Photode profil + Rang-->
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


        <!--Icônes Ajouter un ami + Envoyer un message -->
        <div class="icons-friend-message">
            <img src="assets/img/icons/comment-dots-solid.png" alt="" width="30">
            <img src="assets/img/icons/user-plus-solid.png" alt="" width="30">
        </div>


        <!--Block du meilleur ami-->
        <div id="best-friend">
            <div id="share">
                <p>Que souhaitez-vous partager ?</p>
                <div id="icons">
                    <img src="assets/img/icons/file-image-solid.png" alt="" width="15em">
                    <img src="assets/img/icons/file-video-solid.png" alt="" width="15em">
                    <img src="assets/img/icons/calendar-day-solid.png" alt="" width="18em">
                    <img src="assets/img/icons/link-solid.png" alt="" width="25em">
                </div>
            </div>
        </div>

        <!--Block amis-->
        <div id="friends-block">
            <h3>AMIS</h3>

            <div class="left-side">
                <div class="friend">
                    <img src="images/user.png" alt="" width="60px">
                    <a href="">@Lucas</a>
                </div>

                <div class="friend">
                    <img src="images/user.png" alt="" width="60px">
                    <a href="">@Duo_Duck_Hunt</a>
                </div>

                <div class="friend">
                    <img src="images/user.png" alt="" width="60px">
                    <a href="">@Ike</a>
                </div>

                <div class="friend">
                    <img src="images/user.png" alt="" width="60px">
                    <a href="">@Lucina</a>
                </div>

                <div class="friend">
                    <img src="images/user.png" alt="" width="60px">
                    <a href="">@Marth</a>
                </div>

                <div class="friend">
                    <img src="images/user.png" alt="" width="60px">
                    <a href="">@Palutena</a>
                </div>

                <div class="friend">
                    <img src="images/user.png" alt="" width="60px">
                    <a href="">@Dresseur_Pokemon</a>
                </div>

                <div class="friend">
                    <img src="images/user.png" alt="" width="60px">
                    <a href="">@Ness</a>
                </div>

            </div>


            <div class="right-side">
                <div class="friend">
                    <img src="images/user.png" alt="" width="60px">
                    <a href="">@Mr_GameandWatch</a>
                </div>

                <div class="friend">
                    <img src="images/user.png" alt="" width="60px">
                    <a href="">@Peach</a>
                </div>

                <div class="friend">
                    <img src="images/user.png" alt="" width="60px">
                    <a href="">@Link</a>
                </div>

                <div class="friend">
                    <img src="images/user.png" alt="" width="60px">
                    <a href="">@Villager</a>
                </div>

                <div class="friend">
                    <img src="images/user.png" alt="" width="60px">
                    <a href="">@Captain_Falcon</a>
                </div>

                <div class="friend">
                    <img src="images/user.png" alt="" width="60px">
                    <a href="">@Bowser</a>
                </div>

                <div class="friend">
                    <img src="images/user.png" alt="" width="60px">
                    <a href="">@Ganondorf</a>
                </div>

                <div class="friend">
                    <img src="images/user.png" alt="" width="60px">
                    <a href="">@Daisy</a>
                </div>


            </div>


        </div>


</body>

</html>