<?php
session_start();
if ($_SESSION['pseudo'] == null) {
    header('Location: Connexion.php');
}

require_once("../../BackEnd/controller.php");
require_once("../../BackEnd/setup.php");
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
    <link rel="stylesheet" href="../../scss/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap');
    </style>
    <title>Préférences</title>
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

<main id="account-preferences">
    <h3>Préférences du compte</h3>
    <div class="preference">
        <form action="#" method="post">
            <div class="flex-input">
                <label for="discord">
                    Compte discord
                    <input type="text" name="discord" placeholder="">
                </label>
            </div>
            <div class="flex-input">
                <label for="steam">
                    Compte steam
                    <input type="text" name="steam" placeholder="">
                </label>
            </div>
            <div class="flex-input">
                <label for="twitch">
                    Compte twitch
                    <input type="text" name="twitch" placeholder="">
                </label>
            </div>
            <div class="flex-input">
                <label for="submit">
                    <input type="submit" class="btn btn-outline-info" name="btn-pref" value="Valider">
                </label>
            </div>
            <?php
            // back-end

            // On contrôle si on à appuyer sur le bouton valider
            if (isset($_POST['btn-pref'])) {
                // on contrôle maintenant les champs, si ils sont remplis ou pas
                if (!empty($_POST['discord']) && !empty($_POST['steam']) && !empty($_POST['twitch'])) {
                    $controler->InsertPreference($_SESSION['id'], $_POST);
                } else {
                    echo "<p style='color: red'>Veuillez remplir les champs</p>";
                }
            }
            ?>
        </form>
    </div>
</main>

</body>
</html>