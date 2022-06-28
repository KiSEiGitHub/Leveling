<?php
session_start();

// import des cosntante
require '../../constante.php';

require '../../BackEnd/modele.php';

// instanciation de notre modele
$modele = new modele(HOST, DB, USER, MDP);

$user = null;

/*
Il faut absolument que l'utilisateur soit connecté pour accéder à son profil
Donc il faut controler ça grâce à une variable de session
*/
if (isset($_SESSION['id'])) {
    // l'utilisateur est connecté
    // on va chercher les informations d'un user avec des requête de jointure
    // pour avoir les tables user, userPreferences, aboutUsers
    $user = $modele->tripleJointure(
        'tblusers',
        'tbluserpreferences',
        'tblaboutusers',
        'PK_Users',
        'FK_Users_UserPreferences',
        'FK_Users_AboutUsers',
        'fetch',
        $_SESSION['id']
    );
} else {
    header('Location: ../../index.php');
}

// Très important elle permet de faire du destructuting de tableau
// (array) permet de convertir en tableau
extract((array)$user);

// notre lvl
$ranks = $modele->getLvl($UQ_Users_Level);

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
    <title>Profil</title>
</head>

<body>

<!--Image de couverture DEBUT -->
<style>
    #cover-image {
        background-image: linear-gradient(to bottom, transparent 30%, black 150%), url("../../assets/img/UserProfilBanner/<?= $UQ_Users_ImgBanner ?>");
        height: 250px;
    }
</style>
<!--Image de couverture FIN -->

<!-- Nav début -->
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
                    <li><a class="dropdown-item" href="../settings/index.php">Paramètres</a></li>
                    <li><a class="dropdown-item" href="../../Deconnexion.php">Se déconnecter</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- Nav Fin -->

<main>
    <!--  Profil bannière + photo + nav only début -->
    <div class="profil-grid">
        <div id="cover-image">
            <div class="nav">
                <div class="pseudo">
                    <h1 class="title white">@<?= $UQ_Users_Pseudo ?></h1>
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
                <span class="bold"><?= $UQ_Users_Bio ?></span>
            </div>
        </div>
        <img src="../../assets/img/UserProfilePicture/<?= $UQ_Users_ProfilePicture ?>" alt="pfp" id="pp">
        <?php
        if ($ranks === null) {
            echo "<p>No ranks</p>";
        } else {

            ?>
            <img id="lvl-icon" src="../../<?= $ranks[0] ?>" alt="rank" width="65px">
            <img id="lvl-rank" src="../../<?= $ranks[1] ?>" alt="ranks" width="400px">
        <?php } ?>
    </div>
    <!--  Profil bannière + photo + nav only fin -->

    <!--  Share block début -->
    <div class="bottom">
        <p style="padding: 10px">Que voulez-vous partager ?</p>
    </div>
    <!--  Share block  fin -->


    <div class="parent">
        <!--  ABOUT BLOCK début  -->
        <div class="div1">
            <h3 class="header-title center grey bold">ABOUT</h3>
            <div class="about-section">
                <div class="enfant">
                        <span class="blue bold">
                            <?= $UQ_Users_Prenom ?>
                            <?= $UQ_Users_Nom ?>
                        </span>
                </div>
                <!-- Si le user n'as pas configuré son about alors on le renvoie sur la page pour le config -->
                <?php if ($UQ_UserPreferences_Discord == ''): ?>
                    <a href="../settings/updateProfile.php">Configuré maintenant</a>
                    <!-- sinon, c'est qu'il en a un alors on l'affiche -->
                <?php else: ?>
                    <div class="enfant">
                        <span class="bold">Discord : </span>
                        <span class="blue bold"><?= $UQ_UserPreferences_Discord ?></span>
                    </div>
                    <div class="enfant">
                        <span class="bold">Steam : </span>
                        <span class="blue bold">@<?= $UQ_UserPreferences_Discord ?></span>
                    </div>
                    <div class="enfant">
                        <span class="bold">Twitch : </span>
                        <span class="blue bold">@<?= $UQ_UserPreferences_Twitch ?></span>
                    </div>
                    <div class="enfant">
                        <span class="bold blue"><?= $UQ_AboutUsers_Exp ?></span>
                        <span class="bold">EXP</span>
                    </div>
                    <div class="enfant">
                        <span class="bold blue"><?= $UQ_AboutUsers_JeuxTermine ?></span>
                        <span class="bold">Jeux terminés</span>
                    </div>
                    <div class="enfant">
                        <span class="bold blue"><?= $UQ_AboutUsers_JeuxPossede ?></span>
                        <span class="bold">Jeux possédés</span>
                    </div>
                    <div class="enfant">
                        <span class="bold blue"><?= $UQ_AboutUsers_JeuxCent ?></span>
                        <span class="bold">Jeux terminés à 100%</span>
                    </div>
                    <div class="enfant">
                        <span class="bold">Jeu favori :</span>
                        <span class="bold blue"><?= $UQ_AboutUsers_JeuFav ?></span>
                    </div>
                    <div class="enfant">
                        <span class="bold">Genre favori :</span>
                        <span class="bold blue"><?= $UQ_AboutUsers_GenreFav ?></span>
                    </div>
                    <div class="enfant">
                        <span class="bold">Plateforme : </span>
                        <span class="bold blue"><?= $UQ_AboutUsers_Plateforme ?></span>
                    </div>
                    <div class="enfant">
                        <span class="bold">Inscris le : </span>
                        <span class="bold blue"><?= $UQ_AboutUsers_DateInscription ?></span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <!--  ABOUT BLOCK Fin  -->
        <div class="div2">
            <h3 class="header-title center grey bold">ACTUALITES</h3>
        </div>
    </div>

</main>

<script src="../../js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
</body>

</html>