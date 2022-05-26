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
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS !-->
    <link rel="stylesheet" href="./scss/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap');
    </style>
    <title>Préférences</title>
</head>

<body>

    <!--Barre de navigation-->
    <div id="green-bar">
        <h1>
            <a href="index.php">LEVELING</a>
        </h1>
        <div class="nav-icons">
            <input type="text" name="search" placeholder="Rechercher" id="search">
            <?php
            if (isset($_SESSION['pseudo'])) {
            ?>
                <a href="./profil.php">
                    <img src="assets/img/UserProfilePicture/<?= $user['img'] ?>" class="nav-user" alt="pfp" />
                </a>
            <?php
            } else { ?>
                <a href="./profil.php">
                    <img class="nav-user" src="./images/user-circle.png" alt="">
                </a>
            <?php } ?>
            <a href="./settings.php">
                <img class="nav-user" src="./images/settings.png" alt="">
            </a>
        </div>
    </div>
    <h1 class="title-preference">Entrainement</h1>
    <div class="central-preference">
        <div class="flex-input-preference">
            <div class="left-preference">
                <P>Adresse mail</P>
            </div>
            <div class="right-preference">
                <input type="text" name="mail">
            </div>

        </div>
        <div class="flex-input-preference">
            <div class="left-preference">
                <P>Compte Discord</P>
            </div>
            <div class="right-preference">
                <input type="text" name="discord" placeholder="@">
            </div>
        </div>

        <div class="flex-input-preference">
            <div class="left-preference">
                <P>Compte Steam</P>
            </div>
            <div class="right-preference">
                <input type="text" name="steam">
            </div>
        </div>

        <div class="flex-input-preference">
            <div class="left-preference">
                <P>Compte Twitch</P>
            </div>
            <div class="right-preference">
                <input type="text" name="twitch">
            </div>
        </div>

        <div class="flex-input-preference">
            <div class="left-preference">
                <P>Liste noire</P>
            </div>
            <div class="right-preference">
                <textarea type="text" name="liste-noir" placeholder="Aucun utilisateur sur liste noire"></textarea>
            </div>
        </div>

        <div class="flex-input-preference">
            <div class="right-preference">
                <input class="button-submit-preference" type="submit" name="Valider" value="Valider">
            </div>
        </div>
    </div>









</body>

</html>