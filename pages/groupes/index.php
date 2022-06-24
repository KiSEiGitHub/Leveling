<?php
session_start();

// import & instanciation de la classe modele
require '../../BackEnd/modele.php';
$modele = new modele('localhost', 'leveling', 'root', '');

// Si l'utlisateur change lui même l'url et qu'il n'est pas connecté alors on le renvoie sur Connexion.php
if ($_SESSION['pseudo'] == null) {
    header('Location: Connexion.php');
}

// on définit notre user à null uniquempent pour le définir
$user = null;

/*
 * La première fois que l'utlisateur crée un groupe, il faut lui créer aussi un `aboutGroup`
 * 1. on contrôle si le groupe a déjà un about, on passe une variable type bool
 */

// on définit la varible qui va nous servir de test
$aboutTest = $modele->getUserGroupsAbout($_SESSION['id'], $_GET['idgroup']);

if ($aboutTest) {
    // on rentre dans le if si le groupe possède un about
    // et du coup on exécute la requête qui va récupérer notre user, le groupe associé et le about
    $user = $modele->getUserGroupsAbout($_SESSION['id'], $_GET['idgroup']);
} else {
    /*
     * On rentre dans le else si le groupe ne possède pas de about
     * Du coup on sait qu'il vient de le créer
     * Si il ne possède pas de about, alors on doit lui en créer un en attendant qu'il le configure lui même
     */
    $modele->insertBaseAboutGroups($_GET['idgroup']);
}

// destructuring de notre variable user
extract((array)$user);
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
    <title>Groupe <?= $UQ_UserGroups_Nom ?></title>
</head>

<body>
<style>
    #groupe-cover-image {
        background-image: linear-gradient(to bottom, transparent 30%, black 150%), url("../../assets/img/groupesBanner/<?= $UQ_UserGroups_ImgBanner?>");
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
            <a href="../../pages/profil/index.php">
                <img src="../../assets/img/UserProfilePicture/<?= $UQ_Users_ProfilePicture ?>" alt="pfp">
            </a>
            <a href="#">
                <img src="../../images/settings.png" alt="settings">
            </a>
        </div>
    </nav>
</header>
<!--Barre de navigation DEBUT -->

<main>
    <a href="preference.php?idgroup=<?= $PK_UserGroups ?>">
        <img src="../../images/settings.png"
             style="position: absolute; z-index: 9999; width: 40px; right: 10px; top:10px" alt="">
    </a>
    <div class="profil-grid">

        <div id="groupe-cover-image">
            <div class="nav">
                <div class="pseudo">
                    <h3 class="sous-title white" style="position: relative; top: 5px">@<?= $UQ_UserGroups_Nom ?></h3>
                </div>
                <div class="li">
                    <ul>
                        <li>
                            <a href="index.php?idgroup=<?= $PK_UserGroups ?>">Description</a>
                        </li>
                        <li>
                            <a href="dicussion.php?idgroup=<?= $PK_UserGroups ?>">Discussion</a>
                        </li>
                        <li>
                            <a href="membres.php?idgroup=<?= $PK_UserGroups ?>">Membres</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <img src="../../assets/img/groupesPP/<?= $UQ_UserGroups_ProfilePicture ?>" style="border-radius: 0" alt="pfp"
             id="pp">
    </div>
    <!--  Profil bannière + photo + nav only fin -->

    <div class="bottom">
        <p style="padding: 10px" class="bold">
            <?= $UQ_UserGroups_Description ?>
        </p>
    </div>

    <div class="parent">
        <!--  ABOUT BLOCK début  -->
        <div class="div1">
            <h3 class="header-title center grey bold">ABOUT</h3>
            <div class="about-section">
                <div class="enfant">
                    <span class="bold">Jeu : </span>
                    <span class="blue bold"><?= $UQ_AboutGroups_Game ?></span>
                </div>
                <div class="enfant">
                    <span class="blue bold"><?= $UQ_UserGroups_Membres ?></span>
                    <span class="bold">: membres</span>
                </div>
                <div class="enfant">
                    <span class="bold">Fondé le : </span>
                    <span class="bold blue"><?= $UQ_AboutGroups_Fondation ?></span>
                </div>
                <div class="enfant">
                    <span class="bold">Administrateur : </span>
                    <span class="bold blue"><?= $UQ_Users_Pseudo ?></span>
                    <img src="../../assets/img/UserProfilePicture/<?= $UQ_Users_ProfilePicture ?>"
                         style="width: 40px; border-radius: 50%" alt="pfp user">
                </div>
            </div>
        </div>
        <!--  ABOUT BLOCK Fin  -->
        <div class="div2">
            <h3 class="header-title center grey bold">DERNIERS MEMBRES</h3>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</body>

</html>