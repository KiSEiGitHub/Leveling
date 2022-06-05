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
$creator = $controler->getUser($groups['creator'])
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
        <a href="./preferences.php">
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
            #<?= $groups['nom'] ?>
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
</div>
<main id="groupes-members">
    <div class="block-member">
        <h3>Membres</h3>
        <div class="btn-group">
            <button class="btn btn-info">Ajouter</button>
            <button class="btn btn-danger">Supprimer</button>
        </div>
        <div class="block-member-2">
            <div class="membre">
                <img src="../../images/user.png" alt="">
                <span>@KiSEI</span>
            </div>
            <div class="membre">
                <img src="../../images/user.png" alt="">
                <span>@KiSEI</span>
            </div>
            <div class="membre">
                <img src="../../images/user.png" alt="">
                <span>@KiSEI</span>
            </div>
            <div class="membre">
                <img src="../../images/user.png" alt="">
                <span>@KiSEI</span>
            </div>
            <div class="membre">
                <img src="../../images/user.png" alt="">
                <span>@KiSEI</span>
            </div>
            <div class="membre">
                <img src="../../images/user.png" alt="">
                <span>@KiSEI</span>
            </div>
            <div class="membre">
                <img src="../../images/user.png" alt="">
                <span>@KiSEI</span>
            </div>
            <div class="membre">
                <img src="../../images/user.png" alt="">
                <span>@KiSEI</span>
            </div>
            <div class="membre">
                <img src="../../images/user.png" alt="">
                <span>@KiSEI</span>
            </div>
            <div class="membre">
                <img src="../../images/user.png" alt="">
                <span>@KiSEI</span>
            </div>
            <div class="membre">
                <img src="../../images/user.png" alt="">
                <span>@KiSEI</span>
            </div>
            <div class="membre">
                <img src="../../images/user.png" alt="">
                <span>@KiSEI</span>
            </div>
            <div class="membre">
                <img src="../../images/user.png" alt="">
                <span>@KiSEI</span>
            </div>
            <div class="membre">
                <img src="../../images/user.png" alt="">
                <span>@KiSEI</span>
            </div>

        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</body>

</html>