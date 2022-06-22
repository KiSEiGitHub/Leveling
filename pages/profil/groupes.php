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
$groups = $controler->getGroups($_SESSION['id']);
//$groups = $controler->getGroupandAboutGroupFromUser($_SESSION['id']);
$ranks = $setup->getLvl($user->lvl);
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
    <link rel="stylesheet" href="../../scss/styles.css">
    <title>Groupes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
<!--Image de couverture DEBUT -->
<style>
    #cover-image {
        background-image: linear-gradient(to bottom, transparent 30%, black 150%), url("../../assets/img/UserProfilBanner/<?= $user->img_banner ?>");
        height: 250px;
    }
</style>
<!--Image de couverture FIN -->

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
                    <img src="../../assets/img/UserProfilePicture/<?= $user->img ?>" class="nav-user" alt="pfp"
                         style="width: 40px; border-radius: 50%;">
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="index.php">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Paramètres</a></li>
                    <li><a class="dropdown-item" href="../../Deconnexion.php">Se déconnecter</a></li>
                </ul>
            </div>
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
                <span class="bold"><?= $user->bio ?></span>
            </div>
        </div>
        <img src="../../assets/img/UserProfilePicture/<?= $user->img ?>" alt="pfp" id="pp">
        <?php
        if ($ranks === null) {
            echo "<p>No ranks</p>";
        } else {

            ?>
            <img id="lvl-icon" src="../../<?= $ranks[0] ?>" alt="rank" width="65px">
            <img id="lvl-rank" src="../../<?= $ranks[1] ?>" alt="ranks" width="400px">
        <?php } ?>
    </div>

    <div class="bottom" style="padding: 20px">
        <h2 class="sous-title bold">#REYNA FAN BASE</h2>
        <h3 class="header-title bold grey">269 EXP de contribution</h3>
    </div>

    <section id="groupe" class="UserGames">
        <h4 class="sous-title bold center grey">Groupes</h4>
        <?php
        if ($groups != null) { ?>
            <a href="../groupes/creategroups.php" class="btn btn-info">Créer un nouveau groupe</a>
        <?php } ?>
        <?php if ($groups != null): ?>
            <div class="grp">
                <?php foreach ($groups as $One): ?>
                    <?php $about = $controler->getGroupAbout($One->id) ?>
                    <div class="OneGroupe">
                        <div class="img-container">
                            <img src="../../assets/img/groupesPP/<?= $One->img ?>" alt="">
                        </div>
                        <div class="Text-container">
                            <h2 class="title">
                                <a href="../groupes/index.php?idgroup=<?= $One->id ?>" style="text-decoration: none">
                                    <?= $One->nom ?>
                                </a>
                            </h2>
                            <h3 class="sous-title"><?= $about->membres ?> Membres </h3>
                            <p class="bold grey">groupe <?= $One->privacy ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>
</main>
<script src="../../js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>