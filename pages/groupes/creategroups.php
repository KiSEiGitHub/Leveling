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

<form action="#" method="post" enctype="multipart/form-data">
    <label for="nomgroupe">
        nom du groupe :
        <input type="text" name="nomgroupe">
    </label>
    <br>
    <label for="privacy">
        Sélectionner privacy
        <select name="privacy" id="privacy">
            <option value="public">Public</option>
            <option value="private">Privé</option>
        </select>
    </label>
    <br>
    <label for="imggroupes">
        Image du groupe
        <input type="file" name="imggroupes">
    </label>
    <label for="submit">
        <input type="submit" name="btn-grp" value="créer">
    </label>
    <?php
    if (isset($_POST['btn-grp']) && isset($_FILES)) {
        echo $setup->checkCreateGroups($_POST, $_FILES['imggroupes']);
    }
    ?>
</form>
</body>
</html>