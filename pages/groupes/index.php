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

$groups = $controler->getOneGroups($_GET['idgroup']);
$creator = $controler->getUser($groups['creator']);

$group_about = $controler->getGroupAbout($_GET['idgroup']);

if ($group_about['id_groups'] == '') {
    $controler->insertBaseGroupsPreference($_GET['idgroup']);
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS !-->
    <link rel="stylesheet" href="../../scss/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap');
    </style>
    <title>Groupe</title>
</head>

<body>

<!--Barre de navigation DEBUT -->
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
        <a href="/preferences.php">
            <img class="nav-user" src="../../images/settings.png" alt="">
        </a>
    </div>
</div>

<!--Barre de navigation FIN -->

<!--Block principal DEBUT -->
<div id="main-block">

    <!--Image de couverture DEBUT -->
    <style>
        #groupe-cover-image {
            background-image: linear-gradient(to bottom, transparent 30%, black 150%), url("../../assets/img/groupesBanner/<?= $groups['banner'] ?>");
        }
    </style>
    <!--Image de couverture FIN -->

    <!--  Le header profil DEBUT -->
    <div id="groupe-cover-image">
        <p id="username">
            @<?= $groups['nom'] ?>
        </p>
        <ul>
            <li class="border-white">
                <a href="index.php?idgroup=<?= $groups['id'] ?>">Description</a>
            </li>
            <li class="border-white">
                <a href="dicussion.php?idgroup=<?= $groups['id'] ?>">Discussions</a>
            </li>
            <li class="border-white">
                <a href="membres.php?idgroup=<?= $groups['id'] ?>">Membres</a>
            </li>
        </ul>

        <div id="groupe-profile-picture">
            <img src="../../assets/img/groupesPP/<?= $groups['img'] ?>" alt="pfp" id="pp">
        </div>
    </div>
    <!--  Le header profil FIN -->

    <!--Block "About" DEBUT -->
    <div id="groupe-about-block">
        <h3>ABOUT</h3>
        <ul>
            <li>Jeu associé : <?= $group_about['jeu'] ?></li>
            <li><span><?= $group_about['membres'] ?></span> membres</li>
            <li>Fondé le : <span><?= $group_about['fondation'] ?></span></li>
            <li>Administrateur : <img src="../../assets/img/UserProfilePicture/<?= $creator['img'] ?>" alt=""
                                      width="50px"> <span>@<?= $creator['pseudo'] ?></span></li>
        </ul>
    </div>
    <!--Block "About" FIN -->

    <!--Icônes Ajouter un ami + Envoyer un message DEBUT -->
    <div class="groupe-icons-friend-message">
        <a href="preference.php?idgroup=<?=
        $groups['id'] ?>">
            <img src="../../assets/img/icons/paintbrush-solid.png" alt="" width="30">
        </a>
        <img src="../../assets/img/icons/user-plus-solid.png" alt="" width="30">
    </div>
    <!--Icônes Ajouter un ami + Envoyer un message FIN -->


    <!--Block discussions DEBUT-->
    <div id="discussions-block">
        <h3><strong>DERNIERES DISCUSSIONS</strong></h3>
        <ul>
            <li>
                <img src="../../assets/img/icons/envelope-solid.png" alt="" width="30px">
                <span>How local server works ?</span>
            </li>
            <li>
                <img src="../../assets/img/icons/envelope-solid.png" alt="" width="30px">
                <span>Looking for gaming mates</span>
            </li>
            <li>
                <img src="../../assets/img/icons/envelope-solid.png" alt="" width="30px">
                <span>Who is the worst character ?</span>
            </li>
            <li>
                <img src="../../assets/img/icons/envelope-solid.png" alt="" width="30px">
                <span>I need some help</span>
            </li>
        </ul>
    </div>
    <!--Block discussions FIN-->

    <!--Block membres DEBUT-->
    <div id="membres-block">
        <h3>DERNIERS MEMBRES</h3>
        <div class="all-members">
            <div class="members">
                <img src="../../images/user.png" alt="pfp user">
            </div>
            <div class="members">
                <img src="../../images/user.png" alt="pfp user">
            </div>
            <div class="members">
                <img src="../../images/user.png" alt="pfp user">
            </div>
            <div class="members">
                <img src="../../images/user.png" alt="pfp user">
            </div>
            <div class="members">
                <img src="../../images/user.png" alt="pfp user">
            </div>
            <div class="members">
                <img src="../../images/user.png" alt="pfp user">
            </div>
            <div class="members">
                <img src="../../images/user.png" alt="pfp user">
            </div>
            <div class="members">
                <img src="../../images/user.png" alt="pfp user">
            </div>
            <div class="members">
                <img src="../../images/user.png" alt="pfp user">
            </div>
            <div class="members">
                <img src="../../images/user.png" alt="pfp user">
            </div>
            <div class="members">
                <img src="../../images/user.png" alt="pfp user">
            </div>
            <div class="members">
                <img src="../../images/user.png" alt="pfp user">
            </div>
            <div class="members">
                <img src="../../images/user.png" alt="pfp user">
            </div>
            <div class="members">
                <img src="../../images/user.png" alt="pfp user">
            </div>
            <div class="members">
                <img src="../../images/user.png" alt="pfp user">
            </div>
            <div class="members">
                <img src="../../images/user.png" alt="pfp user">
            </div>
            <div class="members">
                <img src="../../images/user.png" alt="pfp user">
            </div>
            <div class="members">
                <img src="../../images/user.png" alt="pfp user">
            </div>
            <div class="members">
                <img src="../../images/user.png" alt="pfp user">
            </div>
            <div class="members">
                <img src="../../images/user.png" alt="pfp user">
            </div>
        </div>
    </div>
</div>
<!--Block membres FIN-->

<!--Block Description du groupe -->
<div id="description-block">
    <div id="share">
        <p>JOIN THE STREET FIGHTER 4 DISCORD SERVER BELOW !
            <br> ➤ https://discord.gg/j6S3PTRe</p>
    </div>
</div>
<!--Block Description du groupe FIN -->

<!-- chat DEBUT -->
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
                <img src="../../assets/img/UserProfilePicture/<?= $UnUser['img'] ?>" class="profil-picture-message"
                     alt="pfp"/>
                <p>@<?= $UnUser['pseudo'] ?></p>
            </div>
        <?php } ?>
        <p class="header-title-message" style="font-size: 14px">Démarrer une discussion avec...</p>
        <?php
        $AllUser = $controler->getAllUsers();
        foreach ($AllUser as $UnUser) { ?>
            <div class="user-message-block">
                <img src="../../assets/img/UserProfilePicture/<?= $UnUser['img'] ?>" class="profil-picture-message"
                     alt="pfp"/>
                <p>@<?= $UnUser['pseudo'] ?></p>
            </div>
        <?php } ?>
    </div>
</div>
<!-- chat FIN -->

<!--Block principal DEBUT -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</body>

</html>