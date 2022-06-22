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
$ranks = $setup->getLvl($user['lvl']);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Création groupes</title>
    <link rel="stylesheet" href="../../scss/styles.css">
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

<main id="creategroups">

    <div class="create-groupe-block">
        <h3>Création d'un groupe</h3>

        <form action="#" method="post" enctype="multipart/form-data">
            <label for="pfp">
                Photo de profil
                <input type="file" name="imggroupes">
            </label>
            <label for="pfp-cover">
                Photo de couverture
                <input type="file" name="imggroupecover">
            </label>
            <label for="nomgroupe">
                Nom du groupe
                <input type="text" name="nomgroupe">
            </label>
            <label for="privacy">
                Visibilité
                <select name="privacy" id="privacy">
                    <option value="public">Public</option>
                    <option value="prive">privé</option>
                </select>
            </label>
            <label for="jeux">
                jeux associé
                <select name="jeux" id="jeux">
                    <option value="test">jeux</option>
                </select>
            </label>
            <label for="description">
                Description du groupe
                <input type="text" name="description" placeholder="300 caractère maximum">
            </label>
            <label for="submit">
                <input type="submit" class="btn btn-primary" name="btn-grp" value="Valider">
            </label>
            <?php
            if (isset($_POST['btn-grp']) && isset($_FILES)) {
                echo $setup->checkCreateGroups($_POST, $_FILES['imggroupes'], $_FILES['imggroupecover']);
            }
            ?>
        </form>
    </div>
</main>
</body>
</html>