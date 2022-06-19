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
<style>
    #groupe-cover-image {
        background-image: linear-gradient(to bottom, transparent 30%, black 150%), url("../../assets/img/groupesBanner/<?= $groups['banner'] ?>");
        height: 250px;
    }
</style>
<!--Barre de navigation DEBUT -->
<header>
    <nav>
        <div class="logo">
            <a href="../../index.php">
                <img src="../../images/leveling-logo.png" alt="leveling-logo">
            </a>
        </div>
        <div class="right">
            <label for="search">
                <input type="search" name="search">
            </label>
            <a href="../../pages/profil/index.php">
                <img src="../../assets/img/UserProfilePicture/<?= $user['img'] ?>" alt="pfp">
            </a>
            <a href="#">
                <img src="../../images/settings.png" alt="settings">
            </a>
        </div>
    </nav>
</header>
<!--Barre de navigation DEBUT -->

<main>
    <a href="preference.php?idgroup=<?= $groups['id'] ?>">
        <img src="../../images/settings.png"
             style="position: absolute; z-index: 9999; width: 40px; right: 10px; top:10px" alt="">
    </a>
    <div class="profil-grid">

        <div id="groupe-cover-image">
            <div class="nav">
                <div class="pseudo">
                    <h3 class="sous-title white" style="position: relative; top: 5px">@<?= $groups['nom'] ?></h3>
                </div>
                <div class="li">
                    <ul>
                        <li>
                            <a href="index.php?idgroup=<?= $groups['id'] ?>">Description</a>
                        </li>
                        <li>
                            <a href="dicussion.php?idgroup=<?= $groups['id'] ?>">Discussion</a>
                        </li>
                        <li>
                            <a href="membres.php?idgroup=<?= $groups['id'] ?>">Membres</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <img src="../../assets/img/groupesPP/<?= $groups['img'] ?>" style="border-radius: 0" alt="pfp" id="pp">
    </div>
    <!--  Profil bannière + photo + nav only fin -->

    <div class="bottom">
        <p style="padding: 10px">Rejoingez notre serveur discord !</p>
    </div>

    <div class="parent">
        <!--  ABOUT BLOCK début  -->
        <div class="div1">
            <h3 class="header-title center grey bold">ABOUT</h3>
            <div class="about-section">
                <div class="enfant">
                    <span class="bold">Jeu : </span>
                    <span class="blue bold"><?= $group_about['jeu'] ?></span>
                </div>
                <div class="enfant">
                    <span class="blue bold"><?= $group_about['membres'] ?></span>
                    <span class="bold">: membres</span>
                </div>
                <div class="enfant">
                    <span class="bold">Fondé le : </span>
                    <span class="bold blue"><?= $group_about['fondation'] ?></span>
                </div>
                <div class="enfant">
                    <span class="bold">Administrateur : </span>
                    <span class="bold blue"><?= $creator['pseudo'] ?></span>
                    <img src="../../assets/img/UserProfilePicture/<?= $creator['img'] ?>"
                         style="width: 40px; border-radius: 50%" alt="">
                </div>
            </div>
        </div>
        <!--  ABOUT BLOCK Fin  -->
        <div class="div2">
            <h3 class="header-title center grey bold">DERNIERS MEMBRES</h3>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</body>

</html>