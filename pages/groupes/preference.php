<?php
session_start();

// import + instanciation de notre modele
require '../../BackEnd/modele.php';
$modele = new modele("localhost", "leveling", "root", "");

// Si l'utilisateur change lui même l'url et qu'il n'estp as connecté alors on le revoie
if ($_SESSION['pseudo'] == null) {
    header('Location: Connexion.php');
}

// on récupére le user, le groupe associé et le about associé au groupe
$user = $modele->getUserGroupsAbout($_SESSION['id'], $_GET['idgroup']);

// destructuring de la variable user
extract((array)$user);

// Pour des soucis de header already sent by
// il que je place ça au dessus du head sinon y'a un problème
if (isset($_POST['btn'])) {
    $modele->updateUserGroup($_POST, $_GET['idgroup']);
    header('Location: index.php?idgroup=' . $PK_UserGroups);
}

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
                <img src="../../assets/img/UserProfilePicture/<?= $UQ_Users_ProfilePicture ?>" alt="pfp">
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
                <img class="pfp-user" src="../../assets/img/groupesPP/<?= $UQ_UserGroups_ProfilePicture ?>"
                     alt="photo de profil de l'utilisateur">
                <input type="file" name="pfp" value="Bonjour">
            </label>

            <label for="banner">
                <span>Image de couverture</span>
                <img class="banner-user" src="../../assets/img/groupesBanner/<?= $UQ_UserGroups_ImgBanner ?>"
                     alt="bannière de l'utilisateur">
                <input type="file" name="banner">
            </label>

            <label for="nom">
                <span>Nom du groupe</span>
                <input class="inputtext" type="text" name="nom" value="<?= $UQ_UserGroups_Nom ?>">
            </label>


            <label for="jeu">
                <span>Jeu</span>
                <select class="inputtext" name="jeu" id="jeu">
                    <option value="<?= $UQ_AboutGroups_Game ?>"><?= $UQ_AboutGroups_Game ?></option>
                    <?php
                    $AllGames = $modele->all('tblGames');
                    foreach ($AllGames as $One) { ?>
                        <option value="<?= $One->UQ_Games_Name ?>"><?= $One->UQ_Games_Name ?></option>
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

            <label for="description">
                <span>Description</span>
                <input type="text" class="inputtext" name="desc" value="<?= $UQ_UserGroups_Description ?>">
            </label>

            <label for="submit">
                <input class="inputtext" type="submit" id="btn_pref" name="btn" value="Valider">
            </label>

        </form>
    </div>
</div>

<script src="../../js/main.js"></script>
</body>

</html>