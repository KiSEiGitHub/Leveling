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
    <title>Jeux</title>
</head>

<body>
<!--Image de couverture DEBUT -->
<style>
    #cover-image {
        background-image: linear-gradient(to bottom, transparent 30%, black 150%), url("../../assets/img/UserProfilBanner/<?= $user['img_banner'] ?>");
        height: 250px;
    }
</style>
<!--Image de couverture FIN -->

<header>
    <nav>
        <div class="logo">
            <img src="../../images/leveling-logo.png" alt="leveling-logo">
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

<main>
    <div class="profil-grid">
        <div id="cover-image">
            <div class="nav">
                <div class="pseudo">
                    <h1 class="title white">@KiSEi</h1>
                </div>
                <div class="li">
                    <ul>
                        <li>
                            <a href="index.php">Description</a>
                        </li>
                        <li>
                            <a href="jeux.php">Jeux</a>
                        </li>
                        <li>
                            <a href="groupes.php">Groupes</a>
                        </li>
                        <li>
                            <a href="amis.php">Amis</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="bio">
                <span class="bold">Bio :</span>
                <span class="bold"><?= $user['bio'] ?></span>
            </div>
        </div>
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
</main>
<script src="../../js/main.js"></script>
</body>

</html>