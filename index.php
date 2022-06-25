<?php
session_start();

// appel de la classe
require 'BackEnd/modele.php';

// instanciation de la class query
$modele = new modele("localhost", "leveling", "root", "");


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
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS !-->
    <link rel="stylesheet" href="./scss/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap');
    </style>
    <title>Leveling</title>
</head>

<body>

<header>
    <nav>
        <div class="logo">
            <a href="index.php">
                <img src="./images/leveling-logo.png" alt="leveling-logo">
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
                        <img src="assets/img/UserProfilePicture/<?= $user->UQ_Users_ProfilePicture ?>" class="nav-user"
                             alt="pfp" style="width: 40px; border-radius: 50%;">
                    <?php else : ?>
                        <img src="images/user-circle.png" class="nav-user" alt="pfp"
                             style="width: 40px; border-radius: 50%;">
                    <?php endif; ?>
                </button>
                <?php if (isset($_SESSION['id'])) : ?>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="./pages/profil/index.php">Profile</a></li>
                        <li><a class="dropdown-item" href="settings.php">Paramètres</a></li>
                        <li><a class="dropdown-item" href="Deconnexion.php">Se déconnecter</a></li>
                    </ul>
                <?php else : ?>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="inscription.php">S'inscrire</a></li>
                        <li><a class="dropdown-item" href="Connexion.php">Se connecter</a></li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</header>

<main id="accueil">

    <!--  Titre de bienvenue  -->
    <section id="header-main">
        <!-- Si l'utilisateur n'est pas connecté  -->
        <?php if (isset($_SESSION['id']) == null): ?>
            <h1 class="bold grey" style="display: inline">BIENVENUE </h1>
        <?php else: ?>
            <!-- Si l'utilisateur est connecté -->
            <h1 class="bold grey" style="display: inline">BIENVENUE </h1>
            <span class="bold" style="font-size: 2.4em">@<?= $user->UQ_Users_Pseudo ?> </span>
            <span class="bold grey" style="font-size: 2.4em">!</span>
        <?php endif; ?>
    </section>
    <!--  Titre de bienvenue  -->

    <!--  Suggestion d'amis  -->
    <section id="suggestionFriends" style="margin-top: 20px;">
        <h3 class="grey">Suggestion d'amis</h3>
        <div class="user-section">
            <!-- Je vais pour le moment juste faire un select * pour la suggestion d'amis -->
            <!--
        Futur problème : c'est que si on par exemple 2000 users, le block va être énorme.
        Alors il faudra dans la requête ajouter une limite de selection.
        Par exemple, limiter la selection à 20
        -->
            <?php $users = $modele->all('tblUsers'); ?>

            <!-- foreach pour afficher tous mes users -->
            <?php foreach ($users as $user) : ?>
                <!--
                - je met un lien vers le profil d'un user
                - Pour le moment on a pas la page qui affiche chaque user
                - le href sera le lien vers la page user
                - il faudra passer une variable dans l'url puis la récupérer avec un $_GET
                - exemple : /pages/user/oneUser.php?idUser=4
                - 4 ? faudra mettre l'id de l'utilisateur
                -->
                <a href="#">
                    <img src="assets/img/UserProfilePicture/<?= $user->UQ_Users_ProfilePicture ?>" alt="pfp-user">
                </a>
            <?php endforeach; ?>
        </div>
    </section>
    <!--  Suggestion d'amis  -->

    <!--  Carroussel  -->
    <section id="caroussel" style="margin-top: 20px;">

        <!-- swiper container -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <!-- Slide -->

                <!-- j'en met une vide pour ajouter de l'offset au début -->
                <div class="swiper-slide"></div>

                <!-- On selectionne tous nos jeux pour faire un foreach -->
                <?php $games = $modele->all('tblgames'); ?>

                <!-- foreach de tous nos jeux -->
                <?php foreach ($games as $game) : ?>
                    <div class="swiper-slide">
                        <a href="pages/jeux/OneGame.php?gameid=<?= $game->PK_Games ?>">
                            <img src="assets/img/insert_games/pp/<?= $game->UQ_Games_Img ?>" alt="">
                        </a>
                    </div>
                <?php endforeach; ?>

                <!-- j'en met une vide pour ajouter de l'offset à la fin -->
                <div class="swiper-slide"></div>

            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

    </section>
    <!--  Carroussel  -->

    <!--  Actualités  -->
    <section id="actualite" style="margin-top: 20px;">
        <h3 class="bold grey">Actualités</h3>
        <!--
    Les actualités seront affiché grâce à une requête select *
    En attendant je met tous en dur
     -->
        <div class="actu-item">
            <div class="grid-container">
                <div class="grid-pfp">
                    <img src="assets/img/insert_games/pp/IMG-627c1d61578b82.37357550.jpg" alt="photo">
                </div>
                <div class="grid-actu">
                    <img src="assets/img/UserProfilePicture/IMG-6299d2722a3384.29245626.jpg" alt="photo user">
                    <div class="grid-actu-text">
                        <div class="grid-actu-text-header">
                            <h2 class="bold">@MIYA</h2>
                            <span class="bold grey">a terminé</span>
                            <h2 class="bold">FAR CRY 5</h2>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus commodi, distinctio
                            dolorem et fugiat fugit harum neque nobis nulla odio officia perspiciatis soluta
                            suscipit tenetur unde vitae voluptas voluptate voluptates?
                        </p>
                    </div>
                </div>
                <div class="grid-like">
                    <p style="text-align: center">Pouce</p>
                </div>
            </div>
        </div>
    </section>
    <!--  Actualités  -->

</main>


<!-- Javascript -->
<script src="js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    let swiper = new Swiper(".mySwiper", {
        slidesPerView: 4,
        spaceBetween: 320,
        pagination: {
            el: ".swiper-pagination",
            clickable: false,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>
</body>

</html>