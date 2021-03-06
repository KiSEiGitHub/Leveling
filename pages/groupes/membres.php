<?php
session_start();
if ($_SESSION['pseudo'] == null) {
    header('Location: Connexion.php');
}

require_once("../../BackEnd/controller.php");
require_once("../../BackEnd/setup.php");
$controler = new controller("localhost", "leveling", "root", "");
$setup = new setup();

$user = $controler->getUserById($_SESSION['id']);
$ranks = $setup->getLvl($user->lvl);

$groups = $controler->getOneGroups($_GET['idgroup']);
$creator = $controler->getUserById($groups->creator)
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
        background-image: linear-gradient(to bottom, transparent 30%, black 150%), url("../../assets/img/groupesBanner/<?= $groups->banner ?>");
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
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false"
                        style="border: none; outline: none; background: none;">
                    <img src="../../assets/img/UserProfilePicture/<?= $UQ_Users_ProfilePicture ?>" class="nav-user"
                         alt="pfp" style="width: 40px; border-radius: 50%;">
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="index.php">Profile</a></li>
                    <li><a class="dropdown-item" href="../settings/index.php">Param??tres</a></li>
                    <li><a class="dropdown-item" href="../../Deconnexion.php">Se d??connecter</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!--Barre de navigation DEBUT -->
<main>
    <a href="preference.php?idgroup=<?= $groups->id ?>">
        <img src="../../images/settings.png"
             style="position: absolute; z-index: 9999; width: 40px; right: 10px; top:10px" alt="">
    </a>
    <div class="profil-grid">
        <div id="groupe-cover-image">
            <div class="nav">
                <div class="pseudo">
                    <h3 class="sous-title white" style="position: relative; top: 5px">@<?= $groups->nom ?></h3>
                </div>
                <div class="li">
                    <ul>
                        <li>
                            <a href="index.php?idgroup=<?= $groups->id ?>">Description</a>
                        </li>
                        <li>
                            <a href="dicussion.php?idgroup=<?= $groups->id ?>">Discussion</a>
                        </li>
                        <li>
                            <a href="membres.php?idgroup=<?= $groups->id ?>">Membres</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <img src="../../assets/img/groupesPP/<?= $groups->img ?>" style="border-radius: 0" alt="pfp" id="pp">
    </div>

    <div class="bottom">
        <p style="padding: 10px">Rejoingez notre serveur discord !</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>