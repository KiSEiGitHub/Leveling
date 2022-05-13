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
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS !-->
    <link rel="stylesheet" href="./scss/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap');
    </style>
    <title>Profil</title>
</head>

<body>

    <!--Barre de navigation-->
    <div id="green-bar">
        <h1>LEVELING</h1>
        <div class="nav-icons">
            <input type="text" name="search" placeholder="Rechercher" id="search">
            <?php
            if (isset($_SESSION['pseudo'])) {
            ?>
                <a href="./profil.php"><img src="assets/img/UserProfilePicture/<?= $user['img'] ?>" class="nav-user alt=" pfp"></a>
            <?php
            } else { ?>
                <a href="./profil.php"><img class="nav-user" src="./images/user-circle.png" alt=""></a>
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
                <li class="border-white"><a href=" ./profil.php">Description</a></li>
                <li class="border-white"><a href=" ./profil_jeux.php">Jeux</a></li>
                <li class="border-white"><a href=" ./profil_groupes.php">Groupes</a></li>
                <li><a href="./profil_amis.php">Amis</a></li>
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

        <!--Block "About"-->
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

        <!--Icônes Ajouter un ami + Envoyer un message -->
        <div class="icons-friend-message">
            <img src="assets/img/icons/comment-dots-solid.png" alt="" width="30">
            <img src="assets/img/icons/user-plus-solid.png" alt="" width="30">
        </div>

        <div id="feed-block">
            <h3>ACTUALITÉS</h3>
            <ul>
                <li>
                    <img src="images/user-circle.png" alt="" width="35px">
                    <span>@Mirinae</span>
                    a rejoint le groupe
                    <span>#SORPlayers</span>
                </li>
                <li>
                    <img src="images/user-circle.png" alt="" width="35px"> <img src="images/user-circle.png" alt="" width="35px">
                    <span>@Mirinae</span> et <span>@KiSei</span>
                    sont devenus amis
                </li>
                <li>
                    <img src="images/user-circle.png" alt="" width="35px">
                    <span>@Mirinae</span> a obtenu <span>Assassin's Creed : Odyssey</span>
                </li>
                <li>
                    <img src="images/user-circle.png" alt="" width="35px">
                    <span>100</span> jeux terminés à 100%
                </li>
                <li>
                    <img src="images/user-circle.png" alt="" width="35px">
                    <span>@Mirinae</span> stream <span>Beyond Good and Evil 2</span>
                </li>
                <li>
                    <img src="images/user-circle.png" alt="" width="35px"> <img src="images/user-circle.png" alt="" width="35px">
                    <span>@Mirinae</span> et <span>@JLSermax</span> jouent à <span>Watch Dogs : Legion</span>
                </li>
                <li>
                    <img src="images/user-circle.png" alt="" width="35px">
                    <span>@Mirinae</span> a rejoint le groupe <span>#Vaporwave</span>
                </li>
                <li>
                    <img src="images/user-circle.png" alt="" width="35px">
                    <span>@Mirinae</span> a terminé <span>For Honor</span> à <span>100%</span>
                </li>
                <li>
                    <img src="images/user-circle.png" alt="" width="35px">
                    <span>@Mirinae</span> a terminé <span>South park : L'annale du destin</span>
                </li>
            </ul>
        </div>

        <!--Bio-->
        <div id="bio">
            <p>
                Bio : <?= $user['bio'] ?>
            </p>
        </div>

        <!--Block pour poster un message-->
        <div id="post-block">
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
    </div>

    <!--Icône du chat-->
    <div id="chat">
        <img src="assets/img/icons/comment-dots-solid.png" alt="" width="50px">
    </div>


</body>

</html>