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
$groups = $controler->getOneGroups($_GET['idgroup']);
$groups_about = $controler->getGroupAbout($_GET['idgroup']);
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
    <title>Préférences du compte</title>
</head>

<body>

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
                <img src="../../assets/img/UserProfilePicture/<?= $user->img ?>" alt="pfp">
            </a>
            <a href="#">
                <img src="../../images/settings.png" alt="settings">
            </a>
        </div>
    </nav>
</header>

<!--Block principal-->
<div id="main-block">

    <!--Block amis-->
    <div id="settings-block">
        <h3>PRÉFÉRENCES DU PROFIL</h3>
        <form action="#" method="post" enctype="multipart/form-data">

            <label for="pfp">
                <span>Photo de profil</span>
                <img class="pfp-user" src="../../assets/img/groupesPP/<?= $groups->img ?>"
                     alt="photo de profil de l'utilisateur">
                <input type="file" name="pfp" value="Bonjour">
            </label>

            <label for="banner">
                <span>Image de couverture</span>
                <img class="banner-user" src="../../assets/img/groupesBanner/<?= $groups->banner ?>"
                     alt="bannière de l'utilisateur">
                <input type="file" name="banner" value="../../assets/img/groupesBanner/<?= $groups->banner ?>">
            </label>

            <label for="nom">
                <span>Nom du groupe</span>
                <input class="inputtext" type="text" name="nom" value="<?= $groups->nom ?>">
            </label>


            <label for="jeu">
                <span>Jeu</span>
                <select class="inputtext" name="jeu" id="jeu">
                    <option value="<?= $groups_about->jeu ?>"><?= $groups_about->jeu ?></option>
                    <?php
                    $AllGames = $controler->getAllGames();
                    foreach ($AllGames as $One) { ?>
                        <option value="<?= $One->name ?>"><?= $One->name ?></option>
                    <?php } ?>
                </select>
            </label>


            <label for="privacy">
                <span>Privacy</span>
                <select class="inputtext" name="privacy" id="privacy">
                    <option value="PUBLIC">Public</option>
                    <option value="PRIVE">Privé</option>
                </select>
            </label>

            <label for="submit">
                <input class="inputtext" type="submit" id="btn_pref" name="btn" value="Valider">
            </label>

        </form>
    </div>
</div>
<?php
if (isset($_POST['btn'])) {
    $controler->updateGroupPeference($_POST, $_GET['idgroup']);
    header('Location: index.php?idgroup=' . $_GET['idgroup']);
}
?>
<script src="../../js/main.js"></script>
</body>

</html>