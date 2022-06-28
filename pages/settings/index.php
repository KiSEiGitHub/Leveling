<?php
session_start();

// import des cosntante
require '../../constante.php';


// appel de la classe
require '../../BackEnd/modele.php';

// instanciation de la class query
$modele = new modele(HOST, DB, USER, MDP);


/*
l'utilisateur peut naviguer sur le site sans être connecter,
si il s'est connecté, alors on a forcément une variable de session
sinon, pas grave user = null;
*/
if (isset($_SESSION['id'])) {
    $user = $modele->findById('tblUsers', 'PK_Users', (int)$_SESSION['id'], 'fetch');
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
            <h3>Information personnelle de <?= $user->UQ_Users_Prenom ?></h3>
            <div class="display-info">
                <h4>Nom :&ensp;</h4>
                <h4><?= $user->UQ_Users_Nom ?></h4>
            </div>
            <div class="display-info">
                <h4>Prénom :&ensp;</h4>
                <h4><?= $user->UQ_Users_Prenom ?></h4>
            </div>
            <div class="display-info">
                <h4>Email :&ensp;</h4>
                <h4><?= $user->UQ_Users_Mail ?></h4>
            </div>
            <div class="display-info">
                <h4>Age :&ensp;</h4>
                <h4><?= $user->UQ_Users_Age ?></h4>
            </div>
            <div class="display-info">
                <h4>Date de naissance :&ensp;</h4>
                <h4><?= $user->UQ_Users_DateNaissance ?></h4>
            </div>
            <a href="updateUser.php" class="bold grey">Modifier vos informations</a>
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
