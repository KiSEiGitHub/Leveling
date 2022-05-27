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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap');
    </style>
    <title>Profil</title>
</head>

<body>

<!--Barre de navigation-->
<?php require_once 'components/greenbar.php' ?>

<!--Block principal-->
<div id="main-block">
    <!--Image de couverture-->
    <style>
        #cover-image {
            background-image: linear-gradient(to bottom, transparent 30%, black 150%), url("./images/cover-image-test.jpg");
        }
    </style>

    <!--  Le header profil  -->
    <?php require_once 'components/header_profil.php' ?>
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
    <a class="btn btn-primary btn-styled" data-bs-toggle="offcanvas" href="#offcanvasScrolling" role="button"
       aria-controls="offcanvasExample">
        <img src="assets/img/icons/comment-dots-solid.png" alt="" width="30">
    </a>
    <img src="assets/img/icons/user-plus-solid.png" alt="" width="30">
</div>


<!--Block actualités -->
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
            <img src="images/user-circle.png" alt="" width="35px"> <img src="images/user-circle.png" alt=""
                                                                        width="35px">
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
            <img src="images/user-circle.png" alt="" width="35px"> <img src="images/user-circle.png" alt=""
                                                                        width="35px">
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

<!--chat-->
<div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
     id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">MESSAGERIE</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <p style="font-size: 14px">Discussions</p>
        <?php
        $AllUser = $controler->getAllUsers();
        foreach ($AllUser as $UnUser) { ?>
            <div class="user-message-block">
                <img src="assets/img/UserProfilePicture/<?= $UnUser['img'] ?>" class="profil-picture-message"
                     alt="pfp"/>
                <p>@<?= $UnUser['pseudo'] ?></p>
            </div>
        <?php } ?>
        <p class="header-title-message" style="font-size: 14px">Démarrer une discussion avec...</p>
        <?php
        $AllUser = $controler->getAllUsers();
        foreach ($AllUser as $UnUser) { ?>
            <div class="user-message-block">
                <img src="assets/img/UserProfilePicture/<?= $UnUser['img'] ?>" class="profil-picture-message"
                     alt="pfp"/>
                <p>@<?= $UnUser['pseudo'] ?></p>
            </div>
        <?php } ?>
    </div>
</div>


</body>

</html>