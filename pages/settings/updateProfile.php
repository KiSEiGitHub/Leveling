<?php
session_start();

// appel de la classe
require '../../BackEnd/modele.php';

// instanciation de la class query
$modele = new modele("localhost", "leveling", "root", "");


/*
l'utilisateur peut naviguer sur le site sans être connecter,
si il s'est connecté, alors on a forcément une variable de session
sinon, pas grave user = null;
*/
if (isset($_SESSION['id'])) {
    // attention $user est de type array
    $user = $modele->getUserAboutPreference($_SESSION['id']);
} else {
    $user = null;
}

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
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap');
    </style>
    <title>Paramètre de <?= $user->UQ_Users_Pseudo ?></title>
</head>
<body>
<!-- nav -->
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
                    <?php if (isset($_SESSION['id'])) : ?>
                        <img src="../../assets/img/UserProfilePicture/<?= $user->UQ_Users_ProfilePicture ?>"
                             class="nav-user"
                             alt="pfp" style="width: 40px; border-radius: 50%;">
                    <?php else : ?>
                        <img src="../../images/user-circle.png" class="nav-user" alt="pfp"
                             style="width: 40px; border-radius: 50%;">
                    <?php endif; ?>
                </button>
                <?php if (isset($_SESSION['id'])) : ?>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="../profil/index.php">Profile</a></li>
                        <li><a class="dropdown-item" href="index.php">Paramètres</a></li>
                        <li><a class="dropdown-item" href="../../Deconnexion.php">Se déconnecter</a></li>
                    </ul>
                <?php else : ?>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="../../inscription.php">S'inscrire</a></li>
                        <li><a class="dropdown-item" href="../../Connexion.php">Se connecter</a></li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</header>
<!-- nav -->
<main>
    <div class="setting-container">
        <div class="setting-container-nav">
            <a href="index.php" class="bold setting-link">Utilisateur</a>
            <a href="profile.php" class="bold setting-link">Profile</a>
        </div>
        <div class="setting-container-content">
            <h3>Information de <?= $user->UQ_Users_Pseudo ?></h3>
            <div class="display-info">
                <h4>Bio :&ensp;</h4>
                <label for="Bio">
                    <input type="text" name="bio" value="<?= $user->UQ_Users_Bio ?>">
                </label>
            </div>
            <div class="display-info">
                <h4>Plateforme :&ensp;</h4>
                <label for="plateforme">
                    <!-- Remplacer par un select -->
                    <input type="text" name="plateforme" value="<?= $user->UQ_AboutUsers_Plateforme ?>">
                </label>
            </div>
            <div class="display-info">
                <h4>Discord :&ensp;</h4>
                <label for="discord">
                    <input type="text" name="discord" value="<?= $user->UQ_UserPreferences_Discord ?>">
                </label>
            </div>
            <div class="display-info">
                <h4>Twitch :&ensp;</h4>
                <label for="twitch">
                    <input type="text" name="twitch" value="<?= $user->UQ_UserPreferences_Twitch ?>">
                </label>
            </div>
            <div class="display-info">
                <h4>Steam :&ensp;</h4>
                <label for="steam">
                    <input type="text" name="steam" value="<?= $user->UQ_UserPreferences_Steam ?>">
                </label>
            </div>
            <div class="display-info">
                <h4>Pseudo :&ensp;</h4>
                <label for="pseudo">
                    <input type="text" name="pseudo" value="<?= $user->UQ_Users_Pseudo ?>">
                </label>
            </div>
            <div class="display-info">
                <h4>Jeu favori :&ensp;</h4>
                <label for="jeufav">
                    <!-- Select -->
                    <input type="text" name="jeufav" value="<?= $user->UQ_AboutUsers_JeuFav ?>">
                </label>
            </div>
            <div class="display-info">
                <h4>Genre favori :&ensp;</h4>
                <label for="genrefav">
                    <!--  Select  -->
                    <input type="text" name="genrefav" value="<?= $user->UQ_AboutUsers_GenreFav ?>">
                </label>
            </div>
            <div class="display-info">
                <h4>Photo de profile :&ensp;</h4>
                <img class="setting-pfp"
                     src="../../assets/img/UserProfilePicture/<?= $user->UQ_Users_ProfilePicture ?>"
                     alt="">
            </div>
            <div class="display-info">
                <h4>Bannière :&ensp;</h4>
                <img class="setting-banner" src="../../assets/img/UserProfilBanner/<?= $user->UQ_Users_ImgBanner ?>"
                     alt="">
            </div>
            <label for="submit">
                <input type="submit" name="btn" value="modifier" style="margin-top: 20px;">
            </label>
        </div>
    </div>
</main>


<script src="../../js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</body>
</html>
