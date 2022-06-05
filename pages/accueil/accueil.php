<?php
session_start();
if ($_SESSION['pseudo'] == null) {
    header('Location: ../../Connexion.php');
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
    <!-- CSS !-->
    <link rel="stylesheet" href="../../scss/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap');
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <title>LEVELING - Page d'accueil</title>
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
            <a href="../profil/index.php">
                <img src="../../assets/img/UserProfilePicture/<?= $user['img'] ?>" class="nav-user" alt="pfp">
            </a>
            <?php
        } else { ?>
            <a href="../profil/index.php">
                <img class="nav-user" src="../../images/user-circle.png" alt="">
            </a>
        <?php } ?>
        <a href="../profil/preferences.php">
            <img class="nav-user" src="../../images/settings.png" alt="">
        </a>
    </div>
</div>

<!--Barre de navigation FIN -->

<div class="accueil-games-block-bg"></div>

<!--Block principal DEBUT -->
<div id="main-block">

    <h1 class="welcome-user">BIENVENUE <span>@<?= $user['pseudo'] ?></span> !</h1>

    <div class="accueil-all-friends-suggestions">
        <p>Suggestions d'amis</p>
        <?php
        $AllUser = $controler->getAllUsers();
        foreach ($AllUser as $One) { ?>
            <img src="../../assets/img/UserProfilePicture/<?= $One['img'] ?>" alt="pfp user" width="35px">
        <?php } ?>
    </div>


    <div class="accueil-games-block">
        <p>Jeux</p>
        <!--Carousel DEBUT -->
        <div class="container">
            <div id="myCarousel" class="carousel slide" data-ride="carousel" outline="none">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="six-img">
                            <?php
                            $AllGames = $controler->getAllGames();
                            foreach ($AllGames as $One) { ?>
                                <a href="">
                                    <img class="d-block"
                                         src="../../assets/img/insert_games/pp/<?= $One['img_pp'] ?>"
                                         width="50px" alt="img du jeu"
                                    />
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="six-img">
                            <a href=""><img class="d-block"
                                            src="../../assets/img/insert_games/pp/IMG-6277a0b2c5b848.96970598.png"
                                            width="50px"></a>
                            <a href=""><img class="d-block"
                                            src="../../assets/img/insert_games/pp/IMG-6277c1dd81fac1.30807447.png"
                                            width="50px"></a>
                            <a href=""><img class="d-block"
                                            src="../../assets/img/insert_games/pp/IMG-6277c4d6a07249.43984088.png"
                                            width="50px"></a>
                            <a href=""><img class="d-block"
                                            src="../../assets/img/insert_games/pp/IMG-6277c6a22b28e2.44535644.jpg"
                                            width="50px"></a>
                            <a href=""><img class="d-block"
                                            src="../../assets/img/insert_games/pp/IMG-6277c834d664b1.00746124.jpg"
                                            width="50px"></a>
                            <a href=""><img class="d-block"
                                            src="../../assets/img/insert_games/pp/IMG-6277cbba06bf30.27950667.jpg"
                                            width="50px"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>


        <!--Carousel FIN-->
    </div>


    <!--Blocks actualité DEBUT-->
    <p>Actualités</p>
    <div id="obtain-game-block">
        <img src="../../assets/img/icons/game.png" alt="" width="120px">
        <img class="img-pp" src="../../images/user.png" alt="pfp user" width="60px">
        <div class="accueil-game-text">
            <h2><span>@USERNAME</span> a obtenu <span>GAME</span></h2>
            <p><span>GAME</span> Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla quos ullam corrupti et
                eos exercitationem aliquam, debitis quas harum ipsum provident architecto reiciendis ducimus laudantium
                eaque voluptate quod recusandae veniam.</p>
        </div>
    </div>

    <div id="join-group-block">
        <img class="img" src="../../images/user.png" alt="pfp user" width="60px">
        <img class="img-pp" src="../../assets/img/icons/users-solid.png" alt="pfp user" width="60px">
        <div class="accueil-game-text">
            <h2><span>@USERNAME</span> a rejoint <span>GROUP</span></h2>
            <p>[INSERER ICI LA BIO DU GROUPE EN QUESTION] Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum
                ipsum provident architecto reiciendis ducimus laudantium eaque voluptate quod recusandae veniam.</p>
        </div>
    </div>

    <div id="up-rank-block">
        <img class="img" src="../../images/user.png" alt="pfp user" width="60px">
        <img class="img-pp" src="../../assets/img/Ranks/4 - veteran/icon.png" alt="pfp user" width="60px">
        <div class="accueil-game-text">
            <h2><span>@USERNAME</span> est passé <span>RANK</span></h2>
        </div>
    </div>

    <div id="obtain-game-block">
        <img src="../../assets/img/icons/game.png" alt="" width="120px">
        <img class="img-pp" src="../../images/user.png" alt="pfp user" width="60px">
        <div class="accueil-game-text">
            <h2><span>@USERNAME</span> a obtenu <span>GAME</span></h2>
            <p><span>GAME</span> Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla quos ullam corrupti et
                eos exercitationem aliquam, debitis quas harum ipsum provident architecto reiciendis ducimus laudantium
                eaque voluptate quod recusandae veniam.</p>
        </div>
    </div>
    <!--Blocks actualités FIN-->

    <!-- chat DEBUT -->
    <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
         id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">MESSAGERIE</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <p style="font-size: 14px">Discussions</p>
            <?php
            $AllUser = $controler->getAllUsers();
            foreach ($AllUser as $UnUser) { ?>
                <div class="user-message-block">
                    <img src="../../assets/img/UserProfilePicture/<?= $UnUser['img'] ?>" class="profil-picture-message"
                         alt="pfp"/>
                    <p>@<?= $UnUser['pseudo'] ?></p>
                </div>
            <?php } ?>
            <p class="header-title-message" style="font-size: 14px">Démarrer une discussion avec...</p>
            <?php
            $AllUser = $controler->getAllUsers();
            foreach ($AllUser as $UnUser) { ?>
                <div class="user-message-block">
                    <img src="../../assets/img/UserProfilePicture/<?= $UnUser['img'] ?>" class="profil-picture-message"
                         alt="pfp"/>
                    <p>@<?= $UnUser['pseudo'] ?></p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- chat FIN -->

<!--Block principal DEBUT -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>

</html>